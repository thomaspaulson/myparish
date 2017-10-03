$(document).foundation();

function baseURL(){
    $base = document.getElementsByTagName('base');
    return $base[0].href;    	
}


$(function() {
    
    $('[name="action_doCancel"]').click(function(event) {    	
    	event.preventDefault;
    	$redirecturl = $('[name="RedirectURL"]').val();
    	window.location.href = $redirecturl;
    	return false;
    });


    var availableRelations = [
      "Wife",
      "Sister",
      "Mother"
    ];
    $( "#EditBirthForm_EditBirthForm_GodMotherRelation" ).autocomplete({
      source: availableRelations
    });
    
});