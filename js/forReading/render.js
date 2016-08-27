$(document).ready(function(){

	$(window).on('hashchange',function(){
		render(decodeURI(window.location.hash));
	}).trigger('hashchange');

	// lists data
	var data = getList(); 
	

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

});