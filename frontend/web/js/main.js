/*	loads Bootstrap model to create a group	
	Used in the recipient-list index view
*/
$('#create_groups_button').click(function (){
	$('#create_groups_modal').modal('show')
		.find('#create_groups_modalContent')
		.load($(this).attr('value'));
});

<<<<<<< HEAD
	/*	loads Bootstrap model to create a group
	Used in the recipient-list index view
	*/
	$('#create_groups_button').click(function (){
		$('#create_groups_modal').modal('show')
		.find('#create_groups_modalContent')
		.load($(this).attr('value'));
	});



	/*	redirects to the recipient list
	introduction.php in site view
	*/
	$('#manage_groups_button').click(function (){
		//alert('sdfghj');
		var url = $("#manage_groups_button").val();
		$(location).attr('href', url);
	});
=======



/*	redirects to the recipient list	
	introduction.php in site view
*/
$('#manage_groups_button').click(function (){
	//alert('sdfghj');
	var url = $("#manage_groups_button").val();
	$(location).attr('href', url);
});
>>>>>>> ac88d57dc1544874ee354c1b568b200e612557c6




<<<<<<< HEAD
	/*	loads Bootstrap model to create a recipient
	Used in the recipient-list index view
	*/
	$('#create_recipient_button').click(function (){
		$('#create_recipient_modal').modal('show')
		.find('#create_recipient_modalContent')
		.load($(this).attr('value'));
	});



	$('#msg_send_button').click(function () {
		var message = document.getElementById('user_msg_input').value;

		if (message){
			//alert(message);
			var selected_recipient_id = $('#recipient_list_grid').yiiGridView('getSelectedRows'); // returns an array of pkeys, and #grid is your grid element id
			alert(selected_recipient_id);
		}else{
			//alert('Please Enter a Valid Message');
		}




		/*$.post({
		url: '/site/calculate-total', // your controller action
		dataType: 'json',
		data: {keylist: keys},
		success: function(data) {
		if (data.status === 'success') {
		alert('Total price is ' + data.total);
	}
},
});*/
=======
/*	loads Bootstrap model to create a recipient
	Used in the recipient-list index view 
*/
$('#create_recipient_button').click(function (){
	$('#create_recipient_modal').modal('show')
		.find('#create_recipient_modalContent')
		.load($(this).attr('value'));
});



>>>>>>> ac88d57dc1544874ee354c1b568b200e612557c6

//alert(selected_recipient_id);

});



/*	loads the index page of the user-groups to the <div>
on the recipient-list view (user choose his groups from here)
*/
$("#group_list")
.load("index.php?r=user-group");
return false;

$(function(){


	
});





<<<<<<< HEAD
});
=======

/*	When user clicks the SEND button in the RECIPIENT LIST controller
	#msg_send_button id will get execute & store the message + the id s of the recipients.
	Next an ajax method will pass the data to the 'sent-list/crate' action in SentList Controller
	from that @ keylist array will store into a string which will be append all the elements seperated by a ,
	that sring will be stored in the database (table - sent_list)
*/


$('#msg_send_button').click(
	function (){

		var message = document.getElementById('user_msg_input').value;
		var selected_recipient_id = $('#recipient_list_grid').yiiGridView('getSelectedRows'); // returns an array of pkeys, and #grid is your grid element id
		//alert(selected_recipient_id);

		if (message){

			$.ajax({
				//alert('selected_recipient_id')
				//url: "<?php echo Url::to (['sent-list/test'], true); ?>",
				//url: "?r=sent-list%2Ftest",
				url: "?r=sent-list%2Fcreate",
				type: "POST",
				//dataType: 'Json',
				data: {'keylist': selected_recipient_id},

			   	success: function(data, textStatus, jqXHR) {
			      	alert('Message Sent')
			   	},
			   	error: function(jqXHR, textStatus, errorThrown, data) {
                	alert('error::'+errorThrown+' '+textStatus+' '+jqXHR+data)
                },
			   	
			});


/*
			$.ajax({
				
				url: "?r=message-history%2Fcreate",
				type: "POST",
				//dataType: 'Json',
				data: {'keylist': selected_recipient_id},

			   	success: function(data, textStatus, jqXHR) {
			      	alert('Message Sent')
			   	},
			   	error: function(jqXHR, textStatus, errorThrown, data) {
                	alert('error::'+errorThrown+' '+textStatus+' '+jqXHR+data)
                },
			   	
			});
			*/

		}else{
			alert('Please Enter a Valid Message');
		}
	}
);



>>>>>>> ac88d57dc1544874ee354c1b568b200e612557c6
