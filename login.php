<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
        
        <script>
            function do_login(){
                var email=$("#emailid").val();
                var pass=$("#password").val();
                if(email!="" && pass!="") {
                    // Fire off the request to /form.php
                    request = $.ajax({
                        url: "do_login.php",
                        type: "post",
                        data:{
                            do_login:"do_login",
                            email:email,
                            password:pass
                        }
                    });

                    // Callback handler that will be called on success
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked!" + response + " was the resp");
                        if(response.includes("gg")) {
                            window.location.href="index.php";
                        }
                        else {
                            alert("Wrong Details");
                        }
                    });

                    // Callback handler that will be called on failure
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error(
                            "The following error occurred: "+
                            textStatus, errorThrown
                        );
                    });
                }
                else {
                    alert("Please Fill All The Details");
                }
                return false;
            }
        </script>
<html>
        <body>
            <div id="wrapper">

<div id="login_form">
 <h1>LOGIN FORM</h1>
 <form method="post" action="do_login.php" onsubmit="return do_login();">
  <input type="text" name="emailid" id="emailid" placeholder="Enter Email">
  <br>
  <input type="password" name="password" id="password" placeholder="***********">
  <br>
  <input type="submit" name="login" value="DO LOGIN" id="login_button">
 </form>
</div>

</div>
        </body>
</html>
