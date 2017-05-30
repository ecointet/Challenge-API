// JavaScript Document
function DisplayGroups()
{
		console.log("Rafraichissement des données...");
		GetDataFromDB("api.php?mode=read");
}

function InitGroups()
{
			GetInitDiv("api.php?mode=read");
}


function GetDataFromDB(url)
{	
	var jqxhr = $.getJSON(url, function(data) {
		var pDiv = '';
		//alert(url);
		 $.each(data, function(key, val) {
			 
			 //CURRENT DIV
			 var current_display = $("#div_"+val.id).html();
			 var current_status = $("#div_"+val.id).prop('class');
			 
			 //CONTENU DU DIV
			 var new_description = val.description;
			 if (new_description.length > 1) new_description = "<br>"+new_description;
			 var new_display = "<p><b>"+ val.nom + new_description + "</b></p>";
			 var new_status = val.status;
			 
			 if (jQuery(current_display).text() != jQuery(new_display).text() || current_status != new_status)
			 	{
					console.log(current_display+"->"+new_display);
					console.log(current_status+"->"+new_status);
					console.log("Changements détectés pour ID "+ val.id);
					$("#div_"+val.id).fadeOut(2500, function() {
					
					$("#div_"+val.id).prop('class', new_status);
					$("#div_"+val.id).html(new_display);
					}).fadeIn(800);
				}
			
			 
			 	
			 	//$(div).html(pDiv);
		 });
	})
	.success(function() { console.log("Refresh DATA: OK"); })
	.error(function() {  alert("Erreur lors du chargement des nouvelles données");  })
	.complete(function() {  });	
}

function GetInitDiv(url)
{	
	var jqxhr = $.getJSON(url, function(data) {
		
		$.each(data, function(key, val) {

		 //CREATION DU DIV
		 var new_div = "<div id='div_"+val.id+"' class='lost'><p>"+val.title+"</p></div>";
		 $("#content").append(new_div);
		
		 });
	})
	.success(function() { console.log("Initialisation des calques: OK"); })
	.error(function() {  alert("Erreur lors de l'initialisation des calques");  })
	.complete(function() {  });	
}
