
$(document).ready(function(){
	check();
});


function check(){
		$.ajax({

			type: 'GET',
			url:  '/web/todo/db/checkTime.php?result',
			async: true,
			cache: false,
			
			success:function(data){
			
					addMessage(data);

				setTimeout(check,20000);
			},

			error:function(XMLHttpRequest, textStatus, errorThrown){

				console.log(errorThrown);
			}

		});
	}


function addMessage(data){

	// var alert = '<div class="alert alert-warning" role="alert" >' + data + '</div>';
	// $(".pop").append(alert);
	var x = data;
	if(x.length === 0){
		console.log("empty");
	}
	if(x.length !== 0){
		console.log(data);
		var alert = '<div class="alert alert-warning alert-dismissible" role="alert">'+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					'<span aria-hidden="true">&times;</span>'+
					'</button>'+'<strong>'+'Reminder Of'+'</strong>'+data+'</div>';

		$(".pop").append(alert);
		
	}
	
	
}
