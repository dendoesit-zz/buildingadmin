<?php
session_start();

if (isset($_POST['logout'])) {
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
        function addUser(){
    var ap = $("#addapnr").val();
    var nume = $("#addname").val();
    var nr_pers = $("#addnrpers").val();
    console.log(ap,nume,nr_pers);
     request = $.ajax({
                    url: "locatari.php",
                    type: "post",
                    data: {
                        action: 'addUser',
                        ap : ap,
                        nume: nume,
                        nr_pers: nr_pers
                    }
                });
                // Callback handler that will be called on success
                request.done(function (response) {
                    // Log a message to the console
                    console.log( response + " was the resp");
                    // refresh table
                    manageRow(data);
                });
     };
        
        
        function do_login() {
            var email = $("#emailid").val();
            var pass = $("#password").val();
            if (email != "" && pass != "") {
                // Fire off the request to /form.php
                request = $.ajax({
                    url: "do_login.php",
                    type: "post",
                    data: {
                        do_login: "do_login",
                        email: email,
                        password: pass
                    }
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR) {
                    // Log a message to the console
                    console.log("Hooray, it worked!" + response + " was the resp");
                    if (response.includes("gg")) {
                        $("#login_form").hide();
                        $("#logged-in").show();
                    }
                    else {
                        alert("Wrong Details");
                    }
                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    // Log the error to the console
                    console.error(
                        "The following error occurred: " +
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
    <script>
        $(document).ready(function () {
            $("#chat-start").click(function () {
                $("#chat").show();
                $("#chat-start").hide();
            });
            $("#close-chat").click(function () {
                $("#chat").hide();
                $("#chat-start").show();
            });
            $("#logout").click(function () {
                $("#login_form").show();
                $("#logged-in").hide();
            })
            var player = "<?php echo $_SESSION['role']; ?>";
            if (player == "admin") {
                $(".admin-view").show()
            }
            $("#crudpage").click(function () {
                $("#crud").show();
                $("#home").hide();
            });
            $("#homepage").click(function () {
                $("#home").show();
                $("#crud").hide();
            });
        });
    </script>

</head>
<body>
<div id="login_form">
    <form id="login" method="post" action="do_login.php" onsubmit="return do_login();">
        <h1>Login</h1>
        <input type="text" name="emailid" id="emailid" placeholder="Enter Name">
        <br>
        <input type="password" name="password" id="password" placeholder="Enter Password">
        <br>
        <input type="submit" name="login" value="LOGIN" id="login_button">
    </form>
</div>
<div id="logged-in">
    <div class="header-container">
        <header class="wrapper clearfix">
            <h1 class="title">Administrarea blocului nr. 15</h1>
            <nav>
                <ul>
                    <li><a href="#" id="homepage">Acasa</a></li>
                    <li><a href="#" id="crudpage" class="admin-view"> Utilizatori</a></li>
                    <li><a href="#" id="logout"> Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="main-container">
        <div class="main wrapper clearfix">
            <section id="crud">
                <h2> Administrate urilizatori </h2>
                <table>
                    <th>Ap.</th>
                    <th>Nume</th>
                    <th>Locatari</th>
                    <th>
                        
                        <button type="button" data-toggle="modal" data-target="addUser" id="addbutton">Adaugare</button>
                    </th>
                    <tbody>
<!--
                    <tr>
                        <td>1</td>
                        <td>Mihai</td>
                        <td>5</td>
                        <td id="buttonstd">
                            <button type="button" data-toggle="modal" data-target="editUser" id="editbutton">Editare
                            </button>
                            <button type="button" id="deletebutton">Stergere</button>
                        </td>
                    </tr>
-->
                    </tbody>
                </table>
                <!-- The Add Modal -->
                <div id="addUser" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close">&times;</span>
                            <h2>Adaugare utilizator</h2>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm" action="addUser" method="post">
                                <label class="control-label" for="apartment">Apartament:</label><input type="number" id="addapnr" name="addapnr" required/>
                                <label class="control-label" for="name">Nume:</label><input type="text" id="addname" name="addname" required/>
                                <label class="control-label" for="persons">Numar de persoane:</label><input type="number" id="addnrpers" name="addnrpers" required/>
                                <input type="submit" name="adduser" value="Add" id="adduser">
                            </form>
                        </div>
                    </div>

                </div>
                <!-- The Edit Modal -->
                <div id="editUser" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close">&times;</span>
                            <h2>Editare utilizator</h2>
                        </div>
                        <div class="modal-body">
                                <form id="editUser" method="post" action="locatari.php" onsubmit="return edit_user();">

                                <label class="control-label" for="apartment">Apartament:</label><input type="text" required/>
                                <label class="control-label" for="name">Nume:</label><input type="number" name="title" required/>
                                <label class="control-label" for="persons">Numar de persoane:</label><input
                                        type="number" name="title" required/>
                                <input type="submit" name="edituser" value="Salvare" id="edituser">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section id="home">
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
                            <button class="dropbtn">Dropdown</button>
                            <div class="dropdown-content">
                                <a href="#">Link 1</a>
                                <a href="#">Link 2</a>
                                <a href="#">Link 3</a>
                            </div>
                        </div>
                        <h2>Graficul activitatii</h2>
                    </div>
                </article>
                <aside>
                    <h3>Videouri informative</h3>
                    <iframe width="300" height="300" src="https://www.youtube.com/embed/2UHzZGm3rRQ" frameborder="0"
                            allowfullscreen></iframe>
                </aside>
            </section>
            <div id="chat-start"> Start Chat</div>
            <div id="chat">
                <p class="welcome">Welcome, <b><?php echo $_SESSION['email']; ?></b></p>
                <div id="chatbox">
                    <?php
                    if (file_exists("log.html") && filesize("log.html") > 0) {
                        $handle = fopen("log.html", "r");
                        $contents = fread($handle, filesize("log.html"));
                        fclose($handle);
                        echo $contents;
                    }
                    ?>
                </div>

                <div id="close-chat">X</div>
                <form name="message" action="" id="sendMessage">
                    <input name="usermsg" type="text" id="usermsg" size="63"/>
                    <input name="submitmsg" type="submit" id="submitmsg" value="Send"/>
                </form>
            </div>
        </div><!-- #main -->
    </div> <!-- #main-container -->
    <div class="footer-container">
        <footer class="wrapper">
            <h3>In atentia tuturor locatarilor, va rugam pastrati curatenia !</h3>
        </footer>
    </div>
</div>
</body>
</html>