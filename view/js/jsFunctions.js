$(document).ready(function(){
	
	$.ajax({  //loading page
		//Aqui cargamos los diferentes tipos de familias profesionales que hay
       	type:"GET",
       	url: "controller/cIndex.php", 
    	dataType: "json",  //type of the result it is not necessary JSON.parse
       	
    	success: function(result){  
    		console.log("familias");
       		console.log(result);
    	

       		$("#FP").empty(); // removes all the previous content in the container
       		
       		var newRow ="";
       		for(var i=0;i<result.length;i++){
       			newRow += "<option value='"+result[i].Cod_familia+"'>"+result[i].Nom_familia_eu+"/"+result[i].Nom_familia_es+"</option>";		
       		}
			   		
       		$("#FP").append(newRow); // add the new row to the container
       		$("#ciclosFP").hide();
		},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
	});	
	
	
	
	
	
	$("#FP").change(function(){
   		$("#ciclosFP").show();

		var familia=$("#FP").val();
		
//		var familiaEuEs = familia.split('/'); 
//		console.log("Familia Eu: "+familiaEuEs[0]+"  Familia Es: "+familiaEuEs[1]);

		$.ajax({
	       	type:"GET",
	       	data:{'codigoFamilia':familia},
	       	url: "controller/cFamiliaCiclos.php", 
	       	dataType:"text",
	    	success: function(result){  
	       		$("#ciclosFP").empty(); // removes all the previous content in the container
	    		console.log("ciclos");

   		result= JSON.parse(result);
	    		console.log(result);
	       		var newRow="";
	       		for(var i=0;i<result.length;i++){
	       			newRow += "<option value='"+result[i].Cod_ciclo+"'>"+result[i].Nom_ciclo_eu+"/"+result[i].Nom_ciclo_es+"</option>";		
	       		}
	       		$("#ciclosFP").append(newRow); // add the new row to the container

			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});	
	});  //#btnContinent.click
	
	$("#ciclosFP").change(function(){
		var cicloCode=$("#ciclosFP").val();
		
		$.ajax({
	       	type:"GET",
	       	data:{ 'cod_ciclo':cicloCode},
	       	url: "controller/cCicloCentro.php", 
	    	dataType: "json",  //type of the result it is not necessary JSON.parse
	       	
	    	success: function(result){ 
	    		console.log("centros");

	       		console.log(result);
	       		
	    		$("#tablaCentrosPorCiclo").empty(); // removes all the previous content in the container
	       		
	       		var newRow ="<table > ";
				newRow +="<tr><th>School</th><th>Town</th><th>Territory</th><th>Model</th><th>Turn</th></tr>";
	       		
				$.each(result,function(index,info) { 
							
					newRow += "<tr>" +"<td><a href='view/vSchoolOffer.php?cod_school="+info.objCentro.Cod_centro
					                                   +"&name_school="+info.objCentro.Nom_centro+"'>"+info.objCentro.Nom_centro+"</a></td>"
										+"<td>"+info.objCentro.Municipio+"</td>"
										+"<td>"+info.objCentro.Territorio+"</td>"
										+"<td>"+info.Modelo+"</td>"	
										+"<td>"+info.Turno+"</td>"	
									+"</tr>";	
				});
	       		newRow +="</table>";   
	       		
	       		$("#tablaCentrosPorCiclo").append(newRow);
//	    		var countries =result;
//	
//	       		$("#continentCountries").empty(); // removes all the previous content in the container
//	       		
//	       		var newRow ="<h2>Countries with official "+ language+" language</h2>";
//	  			newRow +="<table > ";
//				newRow +="<tr><th>COUNTRY</th><th>CONTINENT</th><th>CODE</th><th>POPULATION</th></tr>";
//	       		
//				$.each(countries,function(index,info) { 
//												
//					newRow += "<tr>" +"<td>"+info.objCountry.Name+"</td>"
//										+"<td>"+info.objCountry.Continent+"</td>"
//										+"<td>"+info.objCountry.Code+"</td>"
//										+"<td>"+info.objCountry.Population+"</td>"
//										
//									+"</tr>";	
//				});
//	       		newRow +="</table>";   
//	       		
//	       		$("#continentCountries").append(newRow); // add the new row to the container
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