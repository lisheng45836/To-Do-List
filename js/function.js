$(document).ready(function(){

	$(window).on('hashchange',function(){
		render(decodeURI(window.location.hash));
	}).trigger('hashchange');
});

// lists data
var data = getList(); 

//  Render Roots
function render(url){

	var temp = url.split('/')[0];

	$('.main-content .page').removeClass('visible');

	var map = {
		'': function(){

			renderListsPage(data);
		},

		'#note': function() {
			var index = url.split('#note/')[1].trim();
			var note = getToDo(index);
			renderNotesPage(index,note);
		}
	};

	if(map[temp]){
		map[temp]();
	}else{

		renderErrorPage();
	}
}

function renderListsPage(data){
	
	$('.all-lists').addClass('visible');
	$('.all-lists').removeClass('hidden');
	$('#content').append(data);
}

function renderNotesPage(index,note){

	$('.all-lists').addClass('hidden');
	$('.notes').addClass('visible');

	$('a#noteId').attr('value',index); 
	$('#toDoList').empty().html(note);

	
}

function renderErrorPage(){

	alert("Go Back");
}



//  notes trigger 
$(document).on('click','a.list',function(e){
	e.preventDefault();
	var id = $(this).data('index');
	var listName = $(this).html();
	$('a#noteId').attr('value',id);
	$('.label').html(listName); 
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
 				+'<a class="list" data-index="'+list[i].id+'">'+list[i].title + '</a>'
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


// get todo

function getToDo(id){
 	// var id = $("a#noteId").attr("value");
 	var id = id;
  	$.ajax({

 		type: 'GET',
 		url: '/web/todo/db/getToDo.php',
 		data: {id: id,
 				status: 'unchecked'},

 		success:function(data){

 			var list = JSON.parse(data);

 			for(i = 0; i<list.length; i++){
 				var content = '<li class="list-group-item list-group-item-success list">'+ '<input type="checkbox" id="box" value="'+list[i].id+'" '+list[i].status+'>'+
 								'<span class="t">'+ list[i].title +'<strong>'+'Due'+'</strong>' +''+list[i].dueDate+
 								'</sapn>'+'<a class="pull-right" id="del1" value="'+list[i].id+'">'+'<span class="glyphicon glyphicon-trash" >'+'</span>'+'</a>'+
 								'<a class="pull-right editNote" value="'+list[i].id+'" data-toggle="modal" data-target="#myModal2" >'+'<span class="glyphicon glyphicon-cog" aria-hidden="true">'+'</span>'+'</a>'+
 								'</li>';
 				
 				$("#toDoList").append(content);

 			}
 		}
 	});

 }

 // Add todo

 $("#addToDo").click(function(){

	var data = $("#toDo").val();
	var id = $("#noteId").attr("value");

	var status = $("#status").val();
	$.ajax({

		type: 'POST',
		url: '/web/todo/db/addToDo.php',
		data: { pid: id,
			    data: data,
			    status: status },
		
		success:function(data){
			$("#toDoList").empty().html(getToDo(id));
		},
		error: function(xhr,ajaxOptions, thrownError){
			console.log(xhr.status);
			console.log(xhr.responseText);
			console.log(thrownError);
		}
	});

});



 // edit todo

 $(document).on('click','a.editNote',function(){

	var id = $(this).attr("value");
	
	$.ajax({

		type: 'GET',
		url: '/web/todo/db/note.php?id='+id,
		success: function(data){
			var note = JSON.parse(data);
			console.log(data);
			for(i = 0; i < note.length; i++)
			{
				$(".title").html(note[i].title);
				var n  = 'Due Date:' +
						 '<input class="form-control" type="text" id="datepicker" placeholder="Due Date" value="'+note[i].dueDate+'" >'+'<br>'+
						 'Reminder:'+
						 '<input class="form-control" name="reminder" id="reminder" placeholder="Reminder" value="'+note[i].reminder+'" >'+'<br>'+
						 '<input type="hidden" id="note_Id" value="'+note[i].id+'">'+
						 'Note:'+
						 '<textarea class="form-control" name="note" type="text" id="note" >'+ note[i].note + '</textarea>';
						 
				$(".modal-body").html(n);
			}
			
		}
	});

});

// delete todo

$('body').on('click','#del1',function(){
	var id = $(this).attr("value");
	var noteId = $("#noteId").attr("value");
	$.ajax({
		type: 'POST',
		url: '/web/todo/db/delete.php',
		data:{id: id},
		success:function(data){
			console.log(data);
			$("#toDoList").empty().html(getToDo(noteId));
			
		}
	});
});

$('body').on('click','#del2',function(){
	var id = $(this).attr("value");
	var noteId = $("#noteId").attr("value");
	$.ajax({
		type: 'POST',
		url: '/web/todo/db/delete.php',
		data:{id: id},
		success:function(data){
			console.log(data);
			$("#CompletedToDoList").empty().html(getCompleted(noteId));
			
		}
	});
});

// get Completed
function getCompleted(){

		var id = $("#noteId").attr("value");
	  	$.ajax({

 		type: 'GET',
 		url: '/web/todo/db/getToDo.php',
 		data: {id: id,
 				status: 'checked'},

 		success:function(data){

 			var list = JSON.parse(data);

 			for(i = 0; i<list.length; i++){
 				var content = '<li class="list-group-item list-group-item-success list">'+ '<input type="checkbox" id="box" value="'+list[i].id+'" '+list[i].status+'>'+
 								'<sapn class="completed">' + list[i].title +'<strong>'+'-- Due Date'+'</strong>' +''+list[i].dueDate+
 								'</span>'+'<a class="pull-right" id="del2" value="'+list[i].id+'">'+'<span class="glyphicon glyphicon-trash" >'+'</span>'+'</a>'+
 								'<a class="pull-right editNote" value="'+list[i].id+'" data-toggle="modal" data-target="#myModal2" >'+'<span class="glyphicon glyphicon-cog" aria-hidden="true">'+'</span>'+'</a>'+
 								'</li>';
 				
 				$("#CompletedToDoList").append(content);

 			}
 		}
 	});
}

// Show Completed

$("#showCompleted").click(function(){

	getCompleted();
	$('#showCompleted').css({display: 'none'});
	$('#hideCompleted').css({display: 'block'});

});

// Hide Completed

$('#hideCompleted').click(function(){

	$('#CompletedToDoList').empty();
	$('#hideCompleted').css({display: 'none'});
	$('#showCompleted').css({display: 'block'});


});

// Check if is completed 

$(document).on('change','input[type="checkbox"]',function(){
	var id = $("#noteId").attr("value");

    if($(this).prop('checked')==true){
    
    	var nid= $(this).val();
    		
    	$.ajax({

	    	type: 'POST',
	        url: '/web/todo/db/action.php',
	        data:{
	        	nid: nid,
	        	action: 'done'
	        	},
	        success:function(data){
	        	console.log(data);
	        	$("#toDoList").empty().html(getToDo(id));
		        	if($('#showCompleted').css('display') == 'none'){
		        		$("#CompletedToDoList").empty().html(getCompleted());
		        	}
	        	}

	    });

    }else{

  			var nid= $(this).val();
    		
    		$.ajax({

	        	type: 'POST',
	        	url: '/web/todo/db/action.php',
	        	data:{
	        		nid: nid,
	        		action: 'undo'
	        	},
	        	success:function(data){

	        		console.log(data);
	        		$("#toDoList").empty().html(getToDo(id));
	        		$("#CompletedToDoList").empty().html(getCompleted());
	        	}

	        });
    		
    	}
    });


$(document).on('click','#show',function(){
	var id = $("#noteId").attr("value");
	var reminder = $("#reminder").val(); // reminder Date / Time
	            
	var dueDate = $("#datepicker").val(); // Due Date / 
	            
	var noteId = $("#note_Id").val(); // note id

	var note = $("#note").val();

	$.ajax({
		type: 'POST',
		url: '/web/todo/db/reminder.php',
		data:{

				dueDate: dueDate,
                reminder: reminder,
                note: note,
                noteId: noteId
            },

        success:function(data){

			alert(data);

                }

         });
	$("#toDoList").empty().html(getToDo(id));
	$("#CompletedToDoList").empty().html(getCompleted());


});
//  Time Picker

$('.modal-body').on('mouseover','#datepicker',function(){
	$("#datepicker").datetimepicker({
        timepicker:false,
    	format:'d-m-Y',
    	minDate:'-1970/01/02'

    });

});


$('.modal-body').on('mouseover','#reminder',function(){
    $("#reminder").datetimepicker({
	    format:'d-m-Y H:i',
	    startDate:'+1971/05/01'
    });

});




