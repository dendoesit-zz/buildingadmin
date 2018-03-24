

//If user submits the form
 $(document).ready(function(){
     
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
                    console.log( response + " was the resp");
                    data = $.parseJSON(response);
                    manageRow(data.data);
                });
     
    function manageRow(data) {
        console.log(data);
//        data = $.parseJSON(data);
//        data = data.data
        var rows = '';
        //$.each( data, function( key, value ) {
        data.forEach(function(value){
                console.log(value);
            rows = rows + '<tr>';
            rows = rows + '<td>'+value.ap+'</td>';
            rows = rows + '<td>'+value.nume+'</td>';
            rows = rows + '<td>'+value.nr_pers+'</td>';
            rows = rows + '<td data-id="'+value.user_id+'">';
            rows = rows + '<button type="button" data-toggle="modal" data-target="editUser" class="editUser">Editare </button>';
            rows = rows + '<button type="button" class="deleteUser">Stergere</button>';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });
        console.log(rows);
        $("tbody").append(rows);
        rows = "";
        $("#addbutton").click(function(){
            $("#addUser").show();
        });
        $(".close").click(function(){
            $(".modal").hide();
        })
        $(".deleteUser").click(function(){
            var id = $(this).parent("td").data('id');
            deleteUser(id);
            console.log(id);
        });
        $(".editUser").click(function(){
            $("#editUser").show();
            var id = $(this).parent("td").data('id');
            var ap = $(this).parent("td").prev("td").prev("td").prev("td").text();
            var nume = $(this).parent("td").prev("td").prev("td").text();
            var loc = $(this).parent("td").prev("td").text();
            console.log(id,ap,nume,loc);
            $("#editUser").find("input[name='editapnr']").val(ap);
            $("#editUser").find("input[name='editname']").val(nume);
            $("#editUser").find("input[name='editnrpers']").val(loc);

            $("#saveuser").click(function(){
                var newap = $("#addapnr").val();
                var newnume = $("#editname").val();
                var newloc = $("#editnrpers").val();
                editUser(id,newap,newnume,newloc);
                console.log(id,newap,newnume,newloc);
                console.log('you pressed');
            })
        });
        $("#addUser").click(function(){
            var ap = $("#addapnr").val();
            var nume = $("#addname").val();
            var nr_pers = $("#addnrpers").val();
            console.log(ap,nume,nr_pers);
            addUser(ap,nume,nr_pers);
        })
};
     // ---------------------------------------------> ADD USER
function addUser(ap,nume,nr_pers){
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
        alert('IT WORKED');
        //manageRow(data);
    });
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });
};
function editUser(id,newap,newnume,newloc){
    console.log(id,newap,newnume,newloc);
    request = $.ajax({
            url: "locatari.php",
            type: "post",
            data: {
                action: 'editUser',
                ap:newap,
                nume:newnume,
                nr_pers:newloc,
                id:id
            }
        });
        // Callback handler that will be called on success
    request.done(function (response) {
        // Log a message to the console
        console.log( response + " was the resp");
        // refresh table
        manageRow(data);
    });
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });
};    

function deleteUser(id){
    console.log(id);
     request = $.ajax({
                    url: "locatari.php",
                    type: "post",
                    data: {
                        action: 'deleteUser',
                        id:id
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
     

     
     // ---------------------------------------------> MODAL

// Get the modal


     
          // ---------------------------------------------> CHAT


	$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});				
		$("#usermsg").val('');
        loadLog();
		return false;
	});

     // add timer on loadlog every 5 seconds
     
     
//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
     

 });