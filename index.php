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
                    if (response.includes("admin")) {
                        $(".admin-view").show()
                        $(".user-view").hide()
                        $("#login_form").hide();
                        $("#logged-in").show();
                    } else if (response.includes("user")) {
                        $(".admin-view").hide()
                        $(".user-view").show()
                        $("#login_form").hide();
                        $("#logged-in").show();
                    } else {
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
                window.location.href = "/buildingadmin/index.php";
            });
            $("#crudpage").click(function () {
                $("#crud").show();
                $("#facturiSection").show();
                $("#home").hide();
            });
            $("#homepage").click(function () {
                $("#home").show();
                $("#crud").hide();
                $("#facturiSection").hide();
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
        <!-- The Add Modal -->
        <div id="addUserModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Adaugare utilizator</h2>
                </div>
                <div class="modal-body">
                    <label class="control-label" for="apartment">Apartament:</label><input type="number" id="addapnr" name="addapnr"  required/>
                    <label class="control-label" for="name">Nume:</label><input type="text" id="addname" name="addname" required/>
                    <label class="control-label" for="persons">Numar de persoane:</label><input
                            type="number" id="addnrpers" name="addnrpers" required/>
                    <input type="submit" name="adduser" value="Add" id="adduser">
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
                    <label class="control-label" for="apartment">Apartament:</label><input type="number" id="editapnr" name="editapnr" required/>
                    <label class="control-label" for="name">Nume:</label>
                    <input type="text" id="editname" name="editname" required/>
                    <label class="control-label" for="persons">Numar de persoane:</label><input
                            type="number" id="editnrpers" name="editnrpers" required/>
                    <input type="submit" name="saveuser" value="Salvare" id="saveuser">
                </div>
            </div>
        </div>
        <!-- The Add Factura Modal -->
        <div id="addFactModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Adaugare factura</h2>
                </div>
                <div class="modal-body">
                    <label class="control-label" for="locatar">Locatar:</label><input type="number" id="addloc" name="addloc"  required/>
                    <label class="control-label" for="luna">Luna:</label><input type="number" id="addluna" name="addluna" required/>
                    <label class="control-label" for="an">An:</label><input type="number" id="addAn" name="addAn" required/>
                    <label class="control-label" for="suma">Suma:</label><input type="number" id="addSuma" name="addSuma" required/>
                    <input type="submit" name="addFact" value="Add" id="addFact">
                </div>
            </div>
        </div>
        <!-- The Edit Factura Modal -->
        <div id="editFactModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Editare factura</h2>
                </div>
                <div class="modal-body">
                    <label class="control-label" for="locatar">Locatar:</label><input type="number" id="editloc" name="editloc"  required/>
                    <label class="control-label" for="luna">Luna:</label><input type="number" id="editluna" name="editluna" required/>
                    <label class="control-label" for="an">An:</label><input type="number" id="editAn" name="editAn" required/>
                    <label class="control-label" for="suma">Suma:</label><input type="number" id="editSuma" name="editSuma" required/>
                    <input type="submit" name="editFact" value="Save" id="editFact">
                </div>
            </div>
        </div>
        <div class="main wrapper clearfix">
            <section id="crud">
                <h2> Administrate urilizatori </h2>
                <table>
                    <thead>
                    <tr>
                        <th>Ap.</th>
                        <th>Nume</th>
                        <th>Suma de plata</th>
                        <th>Locatari</th>
                        <th>
                            <button type="button" data-toggle="modal" data-target="addUser" id="addbutton">Adaugare
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="locatari">
                    </tbody>
                </table>
            </section>

            <section id="facturiSection">
                <h2> Facturi </h2>
                <table>
                    <thead>
                    <tr>
                        <th>Locatar</th>
                        <th>Luna</th>
                        <th>An</th>
                        <th>Suma</th>
                        <th>
                            <button type="button" data-toggle="modal" data-target="addFact" id="addfactbtn">Adaugare
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="facturi">
                    </tbody>
                </table>
            </section>
            <section id="home">
                <article>
                    <div class="user-view">
                        <button type="button" id="vezi_fact_user">Vezi facturile tale</button>
                        <p> Facturi </p>
                        <ol id="facturi_user">
                            <!--<li>Apa 5.03.2018</li>
                            <li>Electrictitate 5.04.2018</li>
                            <li>Intretinerea 5.06.2018</li>-->
                        </ol>
                    </div>
                    <div class="admin-view">
                        <h2>Facturi</h2>
                        <div id="ContainerFacturi">
                            <p>Facturi pentru</p>
                            <select id="luna">
                                <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option>
                            </select>
                            <select id="an">
                                <option>2018</option>
                                <option>2017</option>
                                <option>2016</option>
                            </select>
                            <input type="submit" id="seeFact" value="Vezi Factura">
                            <table id="FacturiPeLuna">
                                <thead><th>Locatar</th><th>Suma</th></thead>
                                <tbody id="factluna"></tbody>
                            </table>
                        </div>
                        <div class="admin-view">
                            <h2>Graficul activitatii</h2>
                            <div id="graph">
                            <table id="q-graph">
                                <caption>Vizitatori pe zi</caption>
                                <thead>

                                </thead>
                                <tbody id="graph-values">
                                <!--<tr class="qtr" id="q1">
                                <th scope="row">15.04</th>
                                <td class="sent bar" style="height: 38%;"><p>38</p></td>
                                </tr>
                                <tr class="qtr" id="q2">
                                <th scope="row">16.04</th>
                                <td class="sent bar" style="height: 65%;"><p>65</p></td>
                                </tr>
                                <tr class="qtr" id="q3">
                                <th scope="row">17.04</th>
                                <td class="sent bar" style="height: 82%;"><p>82</p></td>
                                </tr>
                                <tr class="qtr" id="q4">
                                <th scope="row">18.04</th>
                                <td class="sent bar" style="height: 86%;"><p>86</p></td>
                                </tr>
                                <tr class="qtr" id="q5">
                                <th scope="row">19.04</th>
                                <td class="sent bar" style="height: 15%;"><p>15</p></td>
                                </tr>-->
                                </tbody>
                                </table>

                                <div id="ticks">
                                <!--<div class="tick" style="height: 59px;"><p>100</p></div>
                                <div class="tick" style="height: 59px;"><p>80</p></div>
                                <div class="tick" style="height: 59px;"><p>60</p></div>
                                <div class="tick" style="height: 59px;"><p>40</p></div>
                                <div class="tick" style="height: 59px;"><p>20</p></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <aside>
                    <div class="admin-view">
                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                            Select image to upload:
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit" id="upload">
                        </form>
                    </div>

                    <div class="user-view">
                        <img class="tabel_plata" src="uploads/table.jpg"/>
                        <button type="button" id="download_image">Descarca tabel</button>
                    </div>
                    
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