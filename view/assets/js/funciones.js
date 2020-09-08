function agregaroc(oc, pais,cliente,finicio,ffin,estatus){
	cadena="oc="+oc+
			"&pais="+pais+
			"&cliente="+cliente+
			"&etapa="+etapa+
			"&finicio="+finicio+
			"&ffin="+ffin+
			"&estatus="+estatus;
	$.ajax({
		type:"POST",
		 url:"procesos/agregaroc.php"
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('index.php');
				alertify.success("OC Agregada con Exito");
			}else{
				alertify.success("OC NO Agregada");
			}
		}
	});
}