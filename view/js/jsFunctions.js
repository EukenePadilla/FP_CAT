$(document).ready(function(){
	
	$.ajax({  //loading page
       	type:"GET",
       	url: "controller/cIndex.php", 
    	dataType: "json",  //type of the result it is not necessary JSON.parse
       	
    	success: function(result){  
       		
    	/*	var languages =result;

       		$("#cmbLanguage").empty(); // removes all the previous content in the container
       		
       		var newRow ="";
			$.each(languages,function(index,info) { 
											
				newRow += "<option>"+info.Language+"</option>";	
								
			});      		
       		$("#cmbLanguage").append(newRow); // add the new row to the container
*/		},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
	});	
	
	
	
	
	
	$("#btnContinent").click(function(){
		
		var continent=$("#cmbContinent").val();
		$.ajax({
	       	type:"GET",
	       	data:{'continent':continent},
	       	url: "controller/cContinentCountries.php", 
	    	dataType: "json",  //type of the result it is not necessary JSON.parse
	       	
	    	success: function(result){  
	       		
	    		console.log(result);
	    		
	       		var countries =result;
	
	       		$("#continentCountries").empty(); // removes all the previous content in the container
	       		
	       		var newRow ="<h2>"+continent+" Countries</h2>";
	  			newRow +="<table > ";
				newRow +="<tr><th>COUNTRY</th><th>CONTINENT</th><th>CODE</th><th>POPULATION</th></tr>";
	       		
				$.each(countries,function(index,info) { 
							
					newRow += "<tr>" +"<td>"+info.Name+"</td>"
										+"<td>"+info.Continent+"</td>"
										+"<td>"+info.Code+"</td>"
										+"<td>"+info.Population+"</td>"									
									+"</tr>";	
				});
	       		newRow +="</table>";   
	       		
	       		$("#continentCountries").append(newRow); // add the table to the container
			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});	
	});  //#btnContinent.click
	
	$("#btnLanguage").click(function(){
		var language=$("#cmbLanguage").val();
		
		$.ajax({
	       	type:"GET",
	       	data:{ 'language':language},
	       	url: "controller/cCountriesLanguages.php", 
	    	dataType: "json",  //type of the result it is not necessary JSON.parse
	       	
	    	success: function(result){  
	       		
	    		var countries =result;
	
	       		$("#continentCountries").empty(); // removes all the previous content in the container
	       		
	       		var newRow ="<h2>Countries with official "+ language+" language</h2>";
	  			newRow +="<table > ";
				newRow +="<tr><th>COUNTRY</th><th>CONTINENT</th><th>CODE</th><th>POPULATION</th></tr>";
	       		
				$.each(countries,function(index,info) { 
												
					newRow += "<tr>" +"<td>"+info.objCountry.Name+"</td>"
										+"<td>"+info.objCountry.Continent+"</td>"
										+"<td>"+info.objCountry.Code+"</td>"
										+"<td>"+info.objCountry.Population+"</td>"
										
									+"</tr>";	
				});
	       		newRow +="</table>";   
	       		
	       		$("#continentCountries").append(newRow); // add the new row to the container
			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});	
	});  //#btnLanguage.click
	$("#countriesLanguage").click(function(){
		
		
		$.ajax({
	       	type:"GET",
	       	url: "controller/cCountriesEnglish.php", 
	    	dataType: "json",  //type of the result it is not necessary JSON.parse
	       	
	    	success: function(result){  
	       		
	    		var countries =result;
	
	       		$("#continentCountries").empty(); // removes all the previous content in the container
	       		
	       		var newRow ="<h2>Countries with official English language</h2>";
	  			newRow +="<table > ";
				newRow +="<tr><th>COUNTRY</th><th>CONTINENT</th><th>CODE</th><th>POPULATION</th></tr>";
	       		
				$.each(countries,function(index,info) { 
												
					newRow += "<tr>" +"<td>"+info.objCountry.Name+"</td>"
										+"<td>"+info.objCountry.Continent+"</td>"
										+"<td>"+info.objCountry.Code+"</td>"
										+"<td>"+info.objCountry.Population+"</td>"
										
									+"</tr>";	
				});
	       		newRow +="</table>";   
	       		
	       		$("#continentCountries").append(newRow); // add the new row to the container
			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});	
	});  //#countriesLanguage.click
	
	$("#cityCard").click(function(){
		
		var idCity=$("#idCity").val();
		
		$.ajax({
	       	type:"GET",
	       	data:{ 'idCity':idCity},
	       	url: "controller/cCityCard.php", 
	    	dataType: "json",   //type of the result it is not necessary JSON.parse
	       	
	    	success: function(result){  
	       		
	    		console.log(result);
	    		
	       		var info =result;

	       		$("#showCityCard").css("display","block");
	       		$("#showCityCard").empty(); // removes all the previous content in the container
	       		
	       		var newRow ="<h2>"+info.Name+"</h2>"
							+"<p>City Population-->"+info.Population+"</p>"
							+"<p>Country Code-->"+info.CountryCode+"</p>"
							+"<p>Country Name-->"+info.countryObject.Name+"</p>"
							+"<p>Country Population-->"+info.countryObject.Population+"</p>"
							+"<p>Continent-->"+info.countryObject.Continent+"</p>"
				
	       		$("#showCityCard").append(newRow); // add the new row to the container
			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});	
	});  //#cityCard.click

}); //document.ready