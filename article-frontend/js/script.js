$(document).ready(function(){

    function setCookie(cname, cvalue) {

        document.cookie = cname + "=" + cvalue + ";";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length).replace(/"/g,'');
            }
        }
        return "";
    }

    function delete_cookie(name) {
        document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }

    var path = window.location.pathname;
    var page = path.split("/").pop();
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var id = urlParams.get('id');
    var url='';
    var data_category;



    $.ajax({
            url: "http://articles-rest-api/category/",
            success: function(result) {
                var classActive='';
                for(var i=0;i<result.length;i++){


                    $(".category-list").append(
                        '<li><a data-category="'+result[i]["id"]+'"  href="#" class="category-item" >'+result[i]["name"]+'</a></li>'
                    )
                    if(page=='create-blog.html' || page=='edit-blog.html'){
                        $("#category").append(new Option(result[i]["name"], result[i]["id"]));
                    }
                }

            }
        }
    );

    if(page=='blog-detail.html'){
        url="http://articles-rest-api/article/view?id="+id;
    }
    if(page=='index.html'){
        url="http://articles-rest-api/article/";
    }

    $.ajax({
        url: "http://articles-rest-api/user/profile?token="+getCookie("token"),
        success: function(result) {
            if(result){

                $('input[name="first_name"]').val(result["first_name"]);
                $('input[name="surname"]').val(result["surname"]);
                $('input[name="email"]').val(result["email"]);
                $('input[name="username"]').val(result["username"]);

                $(".auth-login").remove();
                $(".auth-sign").remove();
                $(".auth-list").append(
                    '<li><a href="profile.html" class="btn btn-success auth-profile">Профиль</a></li>'+
                    '<li><a href="#" class="btn btn-primary auth-logout">Выйти</a></li>'
                );
                if(page=='login.html' || page=='sign.html'){
                    window.location.href="index.html";
                }
            }
        },
        error:function (result) {
            if(page=='profile.html' || page=='blog-list.html' || page=='create-blog.html' || page=='edit-blog.html' || page=='category-list.html' || page=='create-category.html' || page=='edit-category.html'){
                window.location.href="login.html";
            }

        }
    })






    $.ajax({
            url: url,
            success: function(result) {
                if(result && result.length>0){

                    var i = 0;
                    for (i = 0; i < result.length; i++) {
                        $(".blog-list").append(
                            '<div class="col-md-10 blogShort">' +
                            '<h1>' + result[i]['title'] + '</h1>' +
                            '<img src="' + result[i]['image'] + '" alt="' + result[i]['title'] + '" class="pull-left img-responsive thumb margin10 img-thumbnail">' +
                            '<article><p>' + result[i]['description'] + '</p></article>' +
                            '<a class="btn btn-blog pull-right marginBottom10" href="blog-detail.html?id=' + result[i]['id'] + '">ПОДРОБНЕЕ</a>' +
                            '</div>'
                        )
                    }
                }else{
                    $(".blog-list").append(
                        '<div class="alert alert-danger">'+
                        '<strong>СТАТЬЯ НЕ НАЙДЕНА</strong>'+
                        '</div>'
                    );
                }

            }
        }
    );



    $(".category-list").on('click','.category-item',function () {
        data_category=$(this).data("category");
        if(data_category=='all'){
            url='http://articles-rest-api/article/';
        }else{
           url="http://articles-rest-api/article/category?id="+data_category
        }
        $(".blogShort").remove();
        $.ajax({
                url: url,
                success: function(result) {
                    if(result && result.length>0){
                        var i = 0;
                        for (i = 0; i < result.length; i++) {
                            $(".blog-list").append(
                                '<div class="col-md-10 blogShort">' +
                                '<h1>' + result[i]['title'] + '</h1>' +
                                '<img src="' + result[i]['image'] + '" alt="' + result[i]['title'] + '" class="pull-left img-responsive thumb margin10 img-thumbnail">' +
                                '<article><p>' + result[i]['description'] + '</p></article>' +
                                '<a class="btn btn-blog pull-right marginBottom10" href="blog-detail.html?id=' + result[i]['id'] + '">ПОДРОБНЕЕ</a>' +
                                '</div>'
                            )
                        }
                    }else{
                        $(".blog-list").append(
                            '<div class="alert alert-danger">'+
                            '<strong>СТАТЬЯ НЕ НАЙДЕНА</strong>'+
                            '</div>'
                        );
                    }

                }
            }
        );
    })



    $(".auth-list").on('click','.auth-logout',function () {

        $.ajax({
            url: "http://articles-rest-api/user/logout?token="+getCookie("token"),
            type: "GET",
            success: function(response) {
                document.cookie="token=";
                window.location.href="login.html";
            },
        });
    })





    $(".sign-btn").on('click',function (e) {
            $.ajax({
                url:     "http://articles-rest-api/user/sign",
                type:     "POST",
                dataType: "html",
                data: $("#sign_up_form").serialize(),
                success: function(response) {
                    if(response!='false'){

                        window.location.href="login.html";
                    }else{
                        $('#sign_up_result').html('Ошибка. Данные не отправлены.');
                    }
                },
                error: function(response) { // Данные не отправлены
                    $('#sign_up_result').html('Ошибка. Данные не отправлены.');
                }
            });
             e.preventDefault();
    })


    $(".login-btn").on('click',function (e) {
        $.ajax({
            url:     "http://articles-rest-api/user/login",
            type:     "POST",
            dataType: "html",
            data: $("#login_form").serialize(),
            success: function(response) {
                if(response!="null"){
                    setCookie("token",response);
                      window.location.href="index.html";
                }else{

                    $('#login_result').html('Ошибка. Данные не отправлены.');
                }

            }

        });
        e.preventDefault();
    })


    $(".profile-btn").on('click',function (e) {
        $.ajax({
            url:     "http://articles-rest-api/user/profile-edit?token="+getCookie("token"),
            type:     "POST",
            dataType: "html",
            data: $("#profile_form").serialize(),
            success: function(response) {
                console.log(response);
                if(response!=false){
                    if($('.alert-success').length!=0){
                        $(".profile-content").prepend(
                            '<div class="alert alert-success">'+
                            '<strong>ПРОФИЛЬ ИЗМЕНЕН</strong>'+
                            '</div>'
                        );
                    }
                    $('.alert-danger').remove();
                }else{
                    if($('.alert-danger').length!=0){
                        $(".profile-content").prepend(
                            '<div class="alert alert-success">'+
                            '<strong>ПРОФИЛЬ НЕ ИЗМЕНЕН</strong>'+
                            '</div>'
                        );
                    }
                    $('.alert-success').remove();
                }

            },


        });
        e.preventDefault();
    })




         if(page=='blog-list.html'){
             $.ajax({
                 url: "http://articles-rest-api/article/selected?token="+getCookie("token"),
                 success: function(result) {

                     if (result && result.length > 0) {
                         for(var i=0;i<result.length;i++){
                             console.log();
                             $(".table-blog-content").append(
                                 '<tr>' +
                                 '      <th>'+result[i]['title']+'</th>' +
                                 '      <td><img src="'+result[i]['image']+'" class="pull-left img-responsive thumb img-thumbnail"></td>' +
                                 '      <td>'+result[i]["category"]["name"]+'</td>' +
                                 '      <td>'+result[i]["user"]["username"]+'</td>' +
                                 '<td>' +
                                 '<a href="edit-blog.html?id='+result[i]['id']+'">РЕДАКТИРОВАТЬ</a>| '+
                                 '<a href="#" class="blog-delete-btn" data-delete="'+result[i]['id']+'">УДАЛЯТЬ</a>'+
                                 '</td>'+
                                 '    </tr>'
                             );
                         }
                     }else{
                         $(".profile-content").prepend(
                             '<div class="alert alert-danger">'+
                             '<strong>СТАТЬЯ НЕ НАЙДЕНА</strong>'+
                             '</div>'
                         );
                     }
                 }
             })
         }



    var success_message_blog='';
    var error_message_blog='';
    if(page=='create-blog.html'){
        url="http://articles-rest-api/article/create/?token="+getCookie("token");
        success_message_blog='СТАТЬЯ СОЗДАНА';
        error_message_blog='СТАТЬЯ НЕ СОЗДАНА';
    }
    if(page=='edit-blog.html'){
        url="http://articles-rest-api/article/update/?token="+getCookie("token")+"&id="+id;
        success_message_blog='СТАТЬЯ ИЗМЕНЕНА';
        error_message_blog='СТАТЬЯ НЕ ИЗМЕНЕНА';
    }


    $(".blog-create-btn").on('click',function (e) {
        $.ajax({
            url:     url,
            type:     "POST",
            dataType: "html",
            data: $("#blog-create_form").serialize(),
            success: function(response) {
                 if(response!='false'){
                     if($('.alert-success').length==0){
                         $(".profile-content").prepend(
                             '<div class="alert alert-success">'+
                             '<strong>'+success_message_blog+'</strong>'+
                             '</div>'
                         );
                     }
                     $('.alert-danger').remove();
                 }else{
                     if($('.alert-danger').length==0){
                         $(".profile-content").prepend(
                             '<div class="alert alert-danger">'+
                             '<strong>'+error_message_blog+'</strong>'+
                             '</div>'
                         );
                     }
                     $('.alert-success').remove();
                 }

            }
        });
        e.preventDefault();
    })

    if(page=='edit-blog.html'){
        $.ajax({
            url: "http://articles-rest-api/article/edit?token="+getCookie("token")+"&id="+id,
            success: function(result) {

                if(result){

                    $('input[name="title"]').val(result[0]["title"]);
                    $('input[name="article_seo_description"]').val(result[0]["article_seo_description"]);
                    $('input[name="article_seo_keywords"]').val(result[0]["article_seo_keywords"]);
                    $('textarea[name="description"]').val(result[0]["description"]);

                    $( "#category").find('option[value='+result[0]["category_id"]+']').attr('selected','selected')
                    document.title = 'Статья | '+result[0]["title"];

                }else{
                    $(".profile-content").prepend(
                        '<div class="alert alert-danger">'+
                        '<strong>СТАТЬЯ НЕ НАЙДЕНА</strong>'+
                        '</div>'
                    );
                }
            },



        })
    }

     $(".table-blog-content").on('click','.blog-delete-btn',function () {
         $(this).closest('tr').fadeOut();
         $.ajax({
             url: "http://articles-rest-api/article/delete?token="+getCookie("token")+"&id="+$(this).data('delete'),
             success: function(result) {
                 $(".profile-content").prepend(
                     '<div class="alert alert-success">'+
                     '<strong>СТАТЬЯ УДАЛЕНА</strong>'+
                     '</div>'
                 );
             }
         })
     })
     if(page=='category-list.html'){
         $.ajax({
             url: "http://articles-rest-api/category/selected?token="+getCookie("token"),
             success: function(result) {

                 if (result && result.length > 0) {
                     for(var i=0;i<result.length;i++){
                         console.log();
                         $(".table-category-content").append(
                             '<tr>' +
                             '      <th>'+result[i]['name']+'</th>' +
                             '      <td>'+result[i]["user"]["username"]+'</td>' +
                             '<td>' +
                             '<a href="edit-category.html?id='+result[i]['id']+'">РЕДАКТИРОВАТЬ</a>| '+
                             '<a href="#" class="category-delete-btn" data-delete="'+result[i]['id']+'">УДАЛЯТЬ</a>'+
                             '</td>'+
                             '    </tr>'
                         );
                     }
                 }else{
                     $(".profile-content").prepend(
                         '<div class="alert alert-danger">'+
                         '<strong>КАТЕГОРИЯ НЕ НАЙДЕНА</strong>'+
                         '</div>'
                     );
                 }
             }
         })
     }



    var success_message='';
    if(page=='create-category.html'){
        url="http://articles-rest-api/category/create/?token="+getCookie("token");
        success_message='КАТЕГОРИЯ СОЗДАНА';
        error_message='КАТЕГОРИЯ НЕ СОЗДАНА';
    }
    if(page=='edit-category.html'){
        url="http://articles-rest-api/category/update/?token="+getCookie("token")+"&id="+id;
        success_message='КАТЕГОРИЯ ИЗМЕНЕНА';
        error_message='КАТЕГОРИЯ НЕ ИЗМЕНЕНА';
    }


    $(".category-create-btn").on('click',function (e) {

        $.ajax({
            url:     url,
            type:     "POST",
            dataType: "html",
            data: $("#category-create_form").serialize(),
            success: function(response) {
               if (response!='false'){

                   if($(".alert-success").length==0){
                       $(".profile-content").prepend(
                           '<div class="alert alert-success">'+
                           '<strong>'+success_message+'</strong>'+
                           '</div>'
                       );
                       $(".alert-danger").remove();
                   }

               }else{
                   if($(".alert-danger").length==0){

                       $(".profile-content").prepend(
                           '<div class="alert alert-danger">'+
                           '<strong>'+error_message+'</strong>'+
                           '</div>'
                       );
                       $(".alert-success").remove();
                   }

               }

            }
        });
        e.preventDefault();
    })


    if(page=='edit-category.html'){
        $.ajax({
            url: "http://articles-rest-api/category/edit?token="+getCookie("token")+"&id="+id,
            success: function(result) {
                if(result!=false){
                    console.log(result);
                    $('input[name="name"]').val(result[0]["name"]);
                    $('input[name="seo_description"]').val(result[0]["seo_description"]);
                    $('input[name="seo_keywords"]').val(result[0]["seo_keywords"]);
                    document.title = 'Категория | '+result[0]["name"];
                }else{
                    if($(".alert-danger").length==0){
                        $(".profile-content").prepend(
                            '<div class="alert alert-danger">'+
                            '<strong>КАТЕГОРИЯ НЕ НАЙДЕНА</strong>'+
                            '</div>'
                        );
                    }

                }
            },



        })
    }




    $(".table-category-content").on('click','.category-delete-btn',function () {
        $(this).closest('tr').fadeOut();
        $.ajax({
            url: "http://articles-rest-api/category/delete?token="+getCookie("token")+"&id="+$(this).data('delete'),
            success: function(result) {
                $(".profile-content").prepend(
                    '<div class="alert alert-success">'+
                    '<strong>КАТЕГОРИЯ УДАЛЕНА</strong>'+
                    '</div>'
                );
            }
        })
    })


})