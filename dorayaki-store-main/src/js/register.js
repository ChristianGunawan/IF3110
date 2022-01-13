$(document).ready(function() {  
     // Check Username
    $('.username').keyup(function (e) { 
        var username = $('.username').val();
        $.ajax({
            type: "POST",
            url: "register.php",
            data: {
                "isUsernameFilled": 1,
                "username_id": username,
            },
            success: function (response) {
                $('#check_user').text(response);
                if (response === "Username available"){
                    $('#username').css("background","#33FF33");
                } else if (response === "Username sudah dipakai"){
                    $('#username').css("background","white");
                } 
            }
        });
    });

    //Check Email
    $('.email').keyup(function (e) {     
          var email = $('.email').val(); 

          $.ajax({
               url:"register.php",
               type: "POST",
               data:{
                    "isEmailFilled":1,
                    "email_id":email,
               },
               success: function (response) {
                    $('#check_email').text(response);
                    if (response === "Email available"){
                        $('#email').css("background","#33FF33");
                    } else if (response === "Email sudah dipakai"){
                        $('#email').css("background","white");
                    } 
                }
          });
     });

});