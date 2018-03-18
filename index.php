<?php
session_start();
echo $_SESSION['role'];

if(isset($_POST['logout']))
{
 unset($_SESSION['email']);
}
?>

<html>
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
          <script>
            $(document).ready(function(){
            var player = "<?php echo $_SESSION['role']; ?>";
            if (player == "admin"){
                $(".admin-view").show()
            }});
          </script>
    </head>
<body>
    
    <div class="header">
            <header class="wrapper clearfix">
                <h1 class="title">Administrarea blocului</h1>
            </header>
        </div>
        <!-- Login form  -->
        
        <div id ="logged-in">
        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Administrarea blocului nr. 15</h1>
                <nav>
                    <ul>
                        <li><a href="login.php"> Logout</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    <div class="user-view">
                        <p> Facturi </p>
                        <ol>
                            <li>Apa 5.03.2018</li>
                            <li>Electrictitate 5.04.2018</li>
                            <li>Intretinerea 5.06.2018</li>
                        </ol>
                    </div>
                    <div class="admin-view">
                        <h2>Restantieri</h2>
                        <div class="dropdown">
  <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
                        <h2>Graficul activitatii</h2>
                    </div>
                </article>

                <aside>
                    <h3>Videouri informative</h3>
                    <iframe width="300" height="300" src="https://www.youtube.com/embed/2UHzZGm3rRQ" frameborder="0" allowfullscreen></iframe>
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->
</div>
        <div class="footer-container">
            <footer class="wrapper">
                <h3>In atentia tuturor locatarilor, va rugam pastrati curatenia !</h3>
            </footer>
        </div>


        
</body>
</html>