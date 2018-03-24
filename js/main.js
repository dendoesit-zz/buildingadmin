// ---------------------------------------------> Chat

//If user submits the form
 $(document).ready(function(){
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
     



// ---------------------------------------------> Modal

// Get the modal
$("#addbutton").click(function(){
    $("#addUser").show();
});
$("#editbutton").click(function(){
    $("#editUser").show();
});
$(".close").click(function(){
    $(".modal").hide();
})

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

 });