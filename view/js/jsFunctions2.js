
$(document).ready(function(){
	
	$.ajax({
       	type:"GET",
       	url: "controller/cFamily.php", 
    	dataType: "json",  //type of the result
       	
    	success: function(result){  
       		
    		console.log(result);
    		
       		$("#cmbFamily").empty(); // removes all the previous content
       		
  			var newRow ="";
			$.each(result,function(index,info) { 
								
				newRow += "<option value='"+info.cod_familia+"'>"+info.nom_familia_eu+" / "+info.nom_familia_es+"</option>";	
			});
       		   
       		
       		$("#cmbFamily").append(newRow); // add the new rowr
		},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
	});
	
	$("#cmbFamily").change(function(){	
		var cod_family=$("#cmbFamily").val();
		
		$.ajax({
	       	type:"GET",
	       	data:{'cod_family':cod_family},
	       	url: "controller/cCycles.php", 
	    	dataType: "json",  //type of the result
	       	
	    	success: function(result){  
	       		
	    		console.log(result);
	    		
	       		$("#cmbCycle").empty(); // removes all the previous content
	       		
	  			var newRow ="";
				$.each(result,function(index,info) { 
									
					newRow += "<option value='"+info.cod_ciclo+"'>"+info.nom_ciclo_eu+" / "+info.nom_ciclo_es+"</option>";	
				});
	       		   
	       		
	       		$("#cmbCycle").append(newRow); // add the new rowr
			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});
	});
	$("#cmbCycle").change(function(){	
		var cod_cycle=$("#cmbCycle").val();
		
		$.ajax({
	       	type:"GET",
	       	data:{'cod_cycle':cod_cycle},
	       	url: "controller/cOfferCycle.php", 
	    	dataType: "json",  //type of the result
	       	
	    	success: function(result){  
	       		
	    		console.log(result);
	    		
	    		$("#schoolOffer").empty(); // removes all the previous content in the container
	       		
	       		var newRow ="<table > ";
				newRow +="<tr><th>School</th><th>Town</th><th>Territory</th><th>Model</th><th>Turn</th></tr>";
	       		
				$.each(result,function(index,info) { 
							
					newRow += "<tr>" +"<td><a href='view/vSchoolOffer.php?cod_school="+info.objCentro.cod_centro
					                                   +"&name_school="+info.objCentro.nom_centro+"'>"+info.objCentro.nom_centro+"</a></td>"
										+"<td>"+info.objCentro.municipio+"</td>"
										+"<td>"+info.objCentro.territorio+"</td>"
										+"<td>"+info.modelo+"</td>"	
										+"<td>"+info.turno+"</td>"	
									+"</tr>";	
				});
	       		newRow +="</table>";   
	       		
	       		$("#schoolOffer").append(newRow); // add the table to the container
			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});
	});

});