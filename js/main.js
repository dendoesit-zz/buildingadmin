//If user submits the form
$(document).ready(function () {
    $('body').on('click', '#addFact', function(){
        var newloc = $("#addloc").val();
        var newluna = $("#addluna").val();
        var newan = $("#addAn").val();
        var newsuma = $("#addSuma").val();
        addFactura(newloc, newluna, newan, newsuma);
        $("#addFactModal").hide();
    })

    $('body').on('click', '#addfactbtn', function() {
        console.log("add fact btn pressed");
        $("#addFactModal").show();
    })
    $("#seeFact").click(function() {

        var an = $('#an').val()
        var luna = $('#luna').val()
        getFactLuna(luna,an);
    });
    getData()
    getFacturi()
    function getData(){
        // ---------------------------------------------> GET ALL USERS
        request = $.ajax({
            url: "locatari.php",
            type: "post",
            data: {
                action: 'getAll',
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            // Log a message to the console
            console.log(response + " was the resp");
            data = $.parseJSON(response);
            data = data.data
//        data = $.parseJSON(data);
//        data = data.data
            var rows = '';
            //$.each( data, function( key, value ) {
            data.forEach(function (value) {
                rows = rows + '<tr>';
                rows = rows + '<td>' + value.ap + '</td>';
                rows = rows + '<td>' + value.nume + '</td>';
                rows = rows + '<td>'  + 100 +  '</td>';
                rows = rows + '<td>' + value.nr_pers + '</td>';
                rows = rows + '<td data-id="' + value.id + '">';
                rows = rows + '<button type="button" data-toggle="modal" data-target="editUser" class="editUser">Editare </button>';
                rows = rows + '<button type="button" class="deleteUser">Stergere</button>';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#locatari").empty();
            $("#locatari").append(rows);
            rows = "";
            $("#addbutton").click(function () {
                $("#addUserModal").show();
            });
            $(".close").click(function () {
                $(".modal").hide();
            })
            $(".deleteUser").click(function () {
                var id = $(this).parent("td").data('id');
                deleteUser(id);
            });
            $(".editUser").click(function () {
                $("#editUser").show();
                var id = $(this).parent("td").data('id');
                var ap = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
                var nume = $(this).parent("td").prev("td").prev("td").prev("td").text();
                var loc = $(this).parent("td").prev("td").text();
                $("#editUser").find("input[name='editapnr']").val(ap);
                $("#editUser").find("input[name='editname']").val(nume);
                $("#editUser").find("input[name='editnrpers']").val(loc);

                $("#saveuser").click(function () {
                    var newap = $("#editapnr").val();
                    var newnume = $("#editname").val();
                    var newloc = $("#editnrpers").val();
                    editUser(id, newap, newnume, newloc);
                })
            });
            $("#adduser").click(function () {
                var ap = $("#addapnr").val();
                var nume = $("#addname").val();
                var nr_pers = $("#addnrpers").val();
                addUser(ap, nume, nr_pers);
            })
        });
    };

    // ---------------------------------------------> ADD USER
    function addUser(ap, nume, nr_pers) {
        request = $.ajax({
            url: "locatari.php",
            type: "post",
            data: {
                action: 'addUser',
                ap: ap,
                nume: nume,
                nr_pers: nr_pers
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            console.log(response + " was the response");
            $("#addUserModal").hide();
            getData();
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status && jqXHR.status == 400) {
                alert(jqXHR.responseText);
            }            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    };

    function editUser(id, newap, newnume, newloc) {
        request = $.ajax({
            url: "locatari.php",
            type: "post",
            data: {
                action: 'editUser',
                ap: newap,
                nume: newnume,
                nr_pers: newloc,
                id: id
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            // Log a message to the console
            console.log(response + " was the resp");
            // refresh table
            $("#editUser").hide();
            getData();
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    };

    function deleteUser(id) {
        request = $.ajax({
            url: "locatari.php",
            type: "post",
            data: {
                action: 'deleteUser',
                id: id
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            // Log a message to the console
            console.log(response + " was the resp");
            // refresh table
            getData();
        });
    };


    // ---------------------------------------------> Facturi

    function getFacturi() {
        request = $.ajax({
            url: "facturi.php",
            type: "post",
            data: {
                action: 'getFacturi',
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            // Log a message to the console
            console.log(response + " was the facturi resp");
            data = $.parseJSON(response);
            data = data.data
//        data = $.parseJSON(data);
//        data = data.data
            var rows = '';
            //$.each( data, function( key, value ) {
            data.forEach(function (value) {
                rows = rows + '<tr>';
                rows = rows + '<td>' + value.id_locatar + '</td>';
                rows = rows + '<td>' + value.luna + '</td>';
                rows = rows + '<td>' + value.an + '</td>';
                rows = rows + '<td>' + value.suma + '</td>';
                rows = rows + '<td data-id="' + value.id_locatar + '">';
                rows = rows + '<button type="button" data-toggle="modal" data-target="editFact" class="editFact">Editare </button>';
                rows = rows + '<button type="button" class="deleteFact">Stergere</button>';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#facturi").empty();
            $("#facturi").append(rows);
            rows = "";

            $('body').on('click', '.deleteFact', function(){
                var id_locatar = $(this).parent("td").data('id');
                var luna = $(this).parent("td").prev("td").prev("td").prev("td").text();
                var an = $(this).parent("td").prev("td").prev("td").text();
                deleteFactura(id_locatar, luna, an);
            })

            $('body').on('click', '.editFact', function(){
                $("#editFactModal").show();
                var loc = $(this).parent("td").data('id');
                var luna = $(this).parent("td").prev("td").prev("td").prev("td").text();
                var an = $(this).parent("td").prev("td").prev("td").text();
                var suma = $(this).parent("td").prev("td").text();
                $("#editFactModal").find("input[name='editloc']").val(loc);
                $("#editFactModal").find("input[name='editluna']").val(luna);
                $("#editFactModal").find("input[name='editAn']").val(an);
                $("#editFactModal").find("input[name='editSuma']").val(suma);

                $("#editFact").click(function () {
                    var newloc = $("#editloc").val();
                    var newluna = $("#editluna").val();
                    var newan = $("#editAn").val();
                    var newsuma = $("#editSuma").val();
                    loc(newloc, newluna, newan, newsuma);
                })
            })
        });
    };

    function getFactLuna(luna,an){
        request = $.ajax({
            url: "facturi.php",
            type: "post",
            data: {
                action: 'getFacturiLuna',
                luna:luna,
                an:an
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            // Log a message to the console
            console.log(response + " was the facturi resp");
            data = $.parseJSON(response);
            data = data.data
            var rows = '';
            data.forEach(function (value) {
                rows = rows + '<tr>';
                rows = rows + '<td>' + value.id_locatar + '</td>';
                rows = rows + '<td>' + value.suma + '</td>';
                rows = rows + '<td data-id="' + value.id_locatar + '">';
                rows = rows + '<button type="button" data-toggle="modal" data-target="editFact" class="editfactbtn">Editare </button>';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#factluna").empty();
            $("#factluna").append(rows);
            rows = "";

            $('body').on('click', '.editfactbtn', function(){
                $("#editFactModal").show();
                var loc = $(this).parent("td").data('id');
                var luna = $('#luna').find(":selected").text();
                var an = $('#an').find(":selected").text();
                var suma = $(this).parent("td").prev("td").text();
                $("#editFactModal").find("input[name='editloc']").val(loc);
                $("#editFactModal").find("input[name='editluna']").val(luna);
                $("#editFactModal").find("input[name='editAn']").val(an);
                $("#editFactModal").find("input[name='editSuma']").val(suma);

                $("#editFact").click(function () {
                    var newloc = $("#editloc").val();
                    var newluna = $("#editluna").val();
                    var newan = $("#editAn").val();
                    var newsuma = $("#editSuma").val();
                    editFactura(newloc, newluna, newan, newsuma);
                })
            })
        });
    };

    function addFactura(loc, luna, an, suma){
        request = $.ajax({
            url: "facturi.php",
            type: "post",
            data: {
                action: 'addFactura',
                id_locatar: loc,
                suma: suma,
                luna: luna,
                an: an
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            $("#addFactModal").hide();
            getFacturi();
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status && jqXHR.status == 400) {
                alert(jqXHR.responseText);
            }            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    };
    function editFactura(newloc, newluna, newan, newsuma){
        request = $.ajax({
            url: "facturi.php",
            type: "post",
            data: {
                action: 'updateFactura',
                id_locatar: newloc,
                suma: newsuma,
                luna: newluna,
                an: newan
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            // Log a message to the console
            console.log(response + " was the resp");
            // refresh table
            $("#editFactModal").hide();
            getFactLuna(newluna, newan);
            getFacturi();
        });
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    }
    function deleteFactura(id_locatar, luna, an) {
        request = $.ajax({
            url: "facturi.php",
            type: "post",
            data: {
                action: 'deleteFact',
                id_locatar:id_locatar,
                luna:luna,
                an:an
            }
        });
        // Callback handler that will be called on success
        request.done(function (response) {
            // Log a message to the console
            console.log(response + " was the resp");
            // refresh table
            getFacturi();
        });
    };



    // ---------------------------------------------> CHAT


    $("#submitmsg").click(function () {
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});
        $("#usermsg").val('');
        loadLog();
        return false;
    });

    // add timer on loadlog every 5 seconds


//Load the file containing the chat log
    function loadLog() {
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        $.ajax({
            url: "log.html",
            cache: false,
            success: function (html) {
                $("#chatbox").html(html); //Insert chat log into the #chatbox div

                //Auto-scroll
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                if (newscrollHeight > oldscrollHeight) {
                    $("#chatbox").animate({scrollTop: newscrollHeight}, 'normal'); //Autoscroll to bottom of div
                }
            },
        });
    }


});