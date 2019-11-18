
$(document).ready(function(){
	
	var params = new URLSearchParams(document.location.search);
	var cod_school = params.get("cod_school");
	var name_school = params.get("name_school");
	//alert("CENTRO "+cod_centro);
	
	$.ajax({
       	type:"GET",
       	data:{'cod_school':cod_school},
       	url: "../controller/cOfferSchool.php", 
    	dataType: "json",  //type of the result
       	
    	success: function(result){  
       		
    		console.log(result);
    		$("#schoolName").append( name_school );
    		$("#offerTable").empty(); 
       		var newRow ="<tr>"
     		+"<th colspan=2>Cycle Name</th>"
     		+"<th colspan=2>Family</th>";
       		+"</tr>";
			$.each(result,function(index,info) { 
						
				newRow += "<tr>" +"<td>"+info.objCiclo.nom_ciclo_eu+"</a></td>"
									+"<td>"+info.objCiclo.nom_ciclo_es+"</td>"
									+"<td>"+info.objFamilia.nom_familia_eu+"</td>"
									+"<td>"+info.objFamilia.nom_familia_es+"</td>"	
								+"</tr>";	
			});
       		newRow +="</table>";   
       		
       		$("#offerTable").append(newRow); // add the table to the container
		},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
	});

});