	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    var plTagsList = [];
    var validCover = false;
    var tags;

    var activePlID = 0;

    __global.stationBusy = false;

	var data = {
				"request": "latest_playlists"
				};

	var baseDiv = '#published-list';

	getList(data, baseDiv);

	/*data = $.param(data);
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "../api/lists", 
		data: data,
		success: function(data) {
			var list_count = data.results;

			var list_body = '<div class="row">';
			_.each(data, function(playlist, index){
				if(_.isObject(playlist)){
					index++;

					list_body += '<div class="col s3">';
					list_body += '	<div class="card '+playlist.id+'">';
			    	list_body += '		<div class="card-image waves-effect waves-block waves-light">';
					list_body += '			<img class="'+playlist.id+'" src="'+playlist.cover+'">';
			    	list_body += '		</div>';
				    list_body += '		<div class="card-content text-small">';
				    list_body += '  		<div class="center-align"><span class="card-title '+playlist.id+' grey-text text-darken-4 text-small font-125">'+playlist.title+'</span></div>';
				    list_body += '  		<div class="center-align"><p><a href="'+playlist.link+'"><i class="material-icons top-align no-margin-right">perm_identity</i>'+playlist.link_text+'</a></p></div>';
				    list_body += '		</div>';
			  		list_body += '	</div>';
					list_body += '</div>';

					if(index%4==0 && index !== list_count){
						list_body += '</div> <div class="row">'
					}else if(index%4==0 && index === list_count){
						list_body += '</div> <div class="row">'
					}else if(index === list_count){
						list_body += '</div';
					}
					$('#published-list').html(list_body);

				}
			});
		}
	});*/

	var data = {
				"request": "draft_playlists"
				};
	var baseDiv = '#draft-list';

	getList(data, baseDiv);


	$('#plTagTrigger').keyup(function(){

		var tagHTML = '';
		var tagTrigger = $('#plTagTrigger').val();
		var queryLength = tagTrigger.length;
		var found = false;

		if(tagTrigger.length>=0 && tagTrigger.length<=7){
			$('#plTags').css('left','15%');
		}else if(tagTrigger.length>=8 && tagTrigger.length<=15){
			$('#plTags').css('left','25%');
		}else if(tagTrigger.length>=16 && tagTrigger.length<=26){
			$('#plTags').css('left','35%');
		}else if(tagTrigger.length>=27 && tagTrigger.length<=35){
			$('#plTags').css('left','45%');
		}

		_.each(tags, function(tag){
			if(tagTrigger.toLowerCase() == tag.tag.substr(0,queryLength).toLowerCase()){
				tagHTML += '<a href="#!" data-id="'+tag.id+'" data-tag="'+tag.tag+'" class="collection-item tagMatch">'+tag.tag+'</a>';
				found = true;
			}
		});

		if(found==false){
			tagHTML = '<a href="#!" data-tag="" class="collection-item item-not-found">No tags found</a>';
		}

		$('#tagList').html(tagHTML);

	});

	$(document).ready(function(){

		$('body').on("click", "#addPl", function(){
			$('#addPlDiv').show();
			$('body').find('.active').removeClass('active');
			$('.factory-floor').hide();
			$('#factoryAddPlLi').show();
			$('#addPlDiv').addClass('active');
			$('#addPl').hide();
			$('#cancelPL').show();
			$('.collapsible').collapsible({
		      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		});

		$('body').on("click", "i.removeTag", function(){
			var tagToRemove = _.indexOf(plTagsList, $(this).attr('data-id'));
			plTagsList.splice(tagToRemove, 1);

			if(plTagsList.length>0){
				$('#tagLabel').addClass('active');
				$('#tagLabelIcon').addClass('active');
			}else{
				$('#tagLabel').removeClass('active');
				$('#tagLabelIcon').removeClass('active');
			}

			if(plTagsList.length>=3){
				$('#plTagsDone').fadeIn();
				$('#plTagTrigger').removeClass('invalid');
			}else{
				$('#plTagsDone').fadeOut();
				$('#plTagTrigger').addClass('invalid');
			}
		});

		$('body').on("click", "a.tagMatch", function(){
			if(plTagsList.length>=0){
				$('#tagLabel').addClass('active');
				$('#tagLabelIcon').addClass('active');
			}
			if(plTagsList.length<5){
				var id = $(this).attr('data-id');
				var tag = $(this).attr('data-tag');

				if(_.indexOf(plTagsList, id) === -1){
					plTagsList.push(id);
					var addTag = '<div class="chip '+id+'">'+tag+'<i class="material-icons removeTag" data-id="'+id+'">close</i></div>';
					$('#plTags').append(addTag);
					if(plTagsList.length>=3){
						$('#plTagsDone').fadeIn();
						$('#plTagTrigger').removeClass('invalid');
					}else{
						$('#plTagsDone').fadeOut();
						$('#plTagTrigger').addClass('invalid');
					}
				}
			}
		});

		$('body').on("click", "#savePL", function(e){
			
			var plName = $('#plName').val();
			var plDescription = $('#plDescription').val();
			var plCover = $('#plCoverPath').val();
			var plTags = plTagsList;

			if(validateFactory()){

				$('#savePL').attr('disabled','true');

				plRoll = {};

				plRoll.plName = plName;
				plRoll.plDescription = plDescription;
				plRoll.plCover = plCover;
				plRoll.plTags = plTags;

				$.ajax({
					type: "POST",
					dataType: "json",
					url: "../api/factoryRoller", 
					data: plRoll,
					success: function(data) {

						activePlID = data;

						$('#plName').val('');
						$('#plNameDone').fadeOut();
						$('#plDescription').val('');
						$('#plDescriptionDone').fadeOut();
						$('#plCoverPath').val('');
						$('#coverPathDisplay').val('');
						$('#plCoverDone').fadeOut();
						plTagsList = [];
						$('#plTags').html('');
						$('#plTagsDone').fadeOut();

						$('#addPlDiv').removeClass('active');
						$('.factory-floor').show();
						$('#factoryAddPlLi').hide();
						$('#addPl').show();
						$('#cancelPL').hide();


						var data = {
									"request": "draft_playlists"
									};
						var baseDiv = '#draft-list';

						getList(data, baseDiv);
						
						$('#factoryDraftList').addClass('active');
						$('.collapsible').collapsible({
					      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
					    });

						$('#savePL').removeAttr('disabled');
						Materialize.toast('<i class="material-icons">done_all</i>Playlist has been saved', 4000, 'green lighten-2');		
					}
				});


			}else{
				Materialize.toast('<i class="material-icons">error_outline</i>Fill out all required fields', 4000, 'red accent-2');	
			}
			e.preventDefault();
		});

		$('body').on('click', '#cancelPL', function(){
			$('#addPlDiv').removeClass('active');
			$('.factory-floor').show();
			$('#factoryAddPlLi').hide();
			$('#addPl').show();
			$('#cancelPL').hide();
			$('.collapsible').collapsible({
		      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		});

		$('body').on("click",".wrapper-card", function(){
			if(!__global.stationBusy){

				var plID = $(this).attr('data-plid');
			
				$(this).removeClass('s3');
				$(this).addClass('s12');
				$(this).addClass('__activeWrapper');
				$(this).removeClass('wrapper-card');

				$('.wrapper-card').addClass('__inactiveStation');
				$(this).removeClass('__inactiveStation');
				$(this).addClass('__activeStation');
				$(this).addClass(plID);

				$(this).find('.thumb-card').removeClass('s12');
				$(this).find('.thumb-card').addClass('s3');
				$(this).find('.thumb-card').addClass('__activethumb');

				$(this).find('.plStation').show();

				var page_base = $(this).find('.plStation');
		        $.ajax({
		                url: "../templates/partials/draftStation.html",
		                context: page_base

		              }).done(function(data) {
		                $( this ).addClass( "done" );
		                $( this ).html(data);
		                $( this ).append('<input type="hidden" class="__plID" data-plid="'+plID+'">');
		                __global.stationBusy = true;
		              });
		    }
		});

		$('#plName').bind('input propertychange', function() {
			if($(this).val().length>=5){
				$('#plNameDone').fadeIn();
				$('#plName').removeClass('invalid');
			}else{
				$('#plNameDone').fadeOut();
				$('#plName').addClass('invalid');
			}
		});

		$('#plDescription').bind('input propertychange', function() {
			if($(this).val().length>=50){
				$('#plDescriptionDone').fadeIn();
				$('#plDescription').removeClass('invalid');
			}else{
				$('#plDescriptionDone').fadeOut();
				$('#plDescription').addClass('invalid');
			}
		});

		var tagHTML = '';
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "../api/tagList", 
			success: function(data) {
				tags = data;
				_.each(data, function(d){
					tagHTML += '<a href="#!" data-id="'+d.id+'" data-tag="'+d.tag+'" class="collection-item tagMatch">'+d.tag+'</a>';
				});
				$('#tagList').html(tagHTML);
			}
		});

		$(':file').change(function(){
		    var file = this.files[0];
		    var name = file.name;
		    var size = file.size;
		    var type = file.type;
		    var typeArr = type.split('/');
		    //Your validation

		    if(typeArr[0]==='image' && size < 2000000){
		    	validCover = true;
		    }else{
		    	validCover = false;
		    }

		});

	$('input[type=file]').on('change', uploadFiles);

});

function uploadFiles(event)
{
	if(validCover){

	    $('#coverUploadProgress').fadeIn();

	    var files = event.target.files;

	    var data = new FormData();
	    $.each(files, function(key, value)
	    {
	        data.append(key, value);
	    });

	    $.ajax({
	        url: '../api/uploadCover',
	        type: 'POST',
	        data: data,
	        cache: false,
	        dataType: 'json',
	        processData: false,
	        contentType: false,
	        success: function(data, textStatus, jqXHR)
	        {
	            if(typeof data.error === 'undefined')
	            {
	                // Success
	                linkCoverImage(event, data);
	            }
	            else
	            {
	                // Error
	                console.log('ERROR: ' + data.error);
	            }
	        },
	        error: function(jqXHR, textStatus, errorThrown)
	        {
	            // Error
	            console.log('Errors: ' + textStatus);
	            
	        }
	    });
	    $('#coverUploadProgress').fadeOut();
	    $('#plCoverDone').fadeIn();
	    $('.coverPreIcon').css('color','#4db6ac');
	    $('#coverPathDisplay').removeClass('invalid');
	}else{
		event.stopPropagation(); // Stop stuff happening
	    event.preventDefault(); // Totally stop stuff happening
	    Materialize.toast('<i class="material-icons">error_outline</i>Please upload a valid cover image', 4000, 'red accent-2');
	    $('#plCoverDone').fadeOut();
	    $('#plCover').val('');
	    $('.file-path').val('');
	    $('#plCoverPath').val('');
	    $('.coverPreIcon').css('color','#333');
	    $('#coverPathDisplay').addClass('invalid');
	}
}

function linkCoverImage(event, data){
	
	$('#plCoverPath').val(data.files[0]);
}

function validateFactory(){
	var isValid = true;

	var plName = $('#plName').val();
	var plDescription = $('#plDescription').val();
	var plCover = $('#plCoverPath').val();
	var plTags = plTagsList;

	if(plName.length<5){
		$('#plName').addClass('invalid');
		isValid = false;
	}

	if(plDescription.length<50){
		$('#plDescription').addClass('invalid');
		isValid = false;	
	}

	if(plCover.length<=0 && plCover.split('.').length<=1){
		$('#coverPathDisplay').addClass('invalid');
		isValid = false;
	}

	if(plTags.length<3){
		$('#plTagTrigger').addClass('invalid');
		isValid = false;
	}

	return isValid;


}

function getList(data, baseDiv){

	console.log("|| "+activePlID+" ||");

	data = $.param(data);
	
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "../api/lists", 
		data: data,
		success: function(data) {
			var list_count = data.results;

			var list_body = '<div class="row">';
			_.each(data, function(playlist, index){
				if(_.isObject(playlist)){
					var activeClass = '';
					console.log(playlist.id);
					console.log(activePlID);
					if(playlist.id == activePlID){
						activeClass = '__activeDraft';
						activePlID = 0;
					}

					console.log(activeClass);

					index++;

					list_body += '<div data-plid="'+playlist.id+'" class="wrapper-card col s3">';
					list_body += ' <div class="thumb-card col s12">';
					list_body += '	<div id="'+activeClass+'" class="card">';
			    	list_body += '		<div class="card-image waves-effect waves-block waves-light">';
					list_body += '			<img class="" src="http://hemant/playawesome/assets/covers/'+playlist.cover+'" width="200px" height="120px">';
			    	list_body += '		</div>';
				    list_body += '		<div class="card-content text-small">';
				    list_body += '  		<div class="center-align"><span class="card-title '+playlist.id+' grey-text text-darken-4 text-small font-125">'+playlist.title+'</span></div>';
				    list_body += '  		<div class="center-align"><p><a href="'+playlist.link+'"><i class="material-icons top-align no-margin-right">perm_identity</i>'+playlist.link_text+'</a></p></div>';
				    list_body += '		</div>';
			  		list_body += '	</div>';
					list_body += ' </div>';
					list_body += ' <div class="plStation col s9" style="display:none;">';
					list_body += ' </div>';
					list_body += '</div>';

					if(index%4==0 && index !== list_count){
						list_body += '</div> <div class="row">'
					}else if(index%4==0 && index === list_count){
						list_body += '</div> <div class="row">'
					}else if(index === list_count){
						list_body += '</div';
					}
					$(baseDiv).html(list_body);

					_.delay(function(){
					    $('#__activeDraft').click();
					}, 100);

				}
			});
		}
	});
}