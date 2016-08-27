$(document).ready(function(){

	//  notes trigger 
	$(document).on('click','a.list',function(e){
		e.preventDefault();
		var id = $(this).data('index');
		$('a#noteId').attr('value',id); 
		window.location.hash = '#note/' + id;
	 	
	});

	// get List data 
	function getList(){
	 	var uid = $('#uid').val();
	 	$.ajax({

	 		type: 'GET',
	 		url: '/web/todo/db/getList.php',
	 		data:{ user: uid},
	 		
	 		success:function(data){
	 			console.log(data);
	 			var list = JSON.parse(data);
	 			for(i = 0 ; i < list.length; i++)
	 			{
	 				var content = '<li class="list-group-item list-group-item-info list">'
	 				+'<span class="glyphicon glyphicon-list" aria-hidden="true" ></span>'
	 				+'<a class="list" data-index="'+list[i].id+'" >'+list[i].title + '</a>'
	 				+'<a class="delList pull-right" value="'+list[i].id+'">'+'<span class="glyphicon glyphicon-trash" >'+'</span>'+'</a>'
	 				+'<a class="pull-right edit" value="'+list[i].id+'" data-toggle="modal" data-target="#myModal" >'+'<span class="glyphicon glyphicon-cog" aria-hidden="true">'+'</span>'+'</a>'
	 				+'</li>';
	 				$("#content").append(content); 		
	 			}

	 		}
	 	});
	 }


	 //  Add list
	$("#add").click(function(){
		
		var data =  $('#lists').val();
		var uid = $('#uid').val();
		$.ajax({
			
			type: 'POST',
			url: '/web/todo/db/addList.php',
			data: {list: data,
					uid: uid},
			dataType: 'text',

			success:function(data){
				$("#content").empty().html(getList());
			}

		});

	});

	//  delete list
	$(document).on("click","a.delList",function(){
		var id = $(this).attr('value');  
		$.ajax({
			type: 'POST',
			url: '/web/todo/db/deleteList.php',
			data:{id: id},
			success: function(data){
				console.log(data);
				$("#content").empty().html(getList());
			}
		});

	});

	// edit list

	$(document).on("click","a.edit",function(){
		var id = $(this).attr('value');

		$.ajax({
			type: 'GET',
			url: '/web/todo/db/getSingleList.php?id='+id,
			success: function(data){
				console.log(data);
				var list = JSON.parse(data);
				for(i = 0 ; i < list.length; i++)
				{
					var c = '<input class="form-control" name="title" value="'+list[i].title+'">'
							+'<input name="l_id" type="hidden" value="'+list[i].id+'">';
					$(".modal-body1").html(c);
				}
			}
		});
		
	});
});