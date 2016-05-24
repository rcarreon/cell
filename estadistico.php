

<html>
<head>
	<title>  Cell City | Estadisticas  </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap.min.css"> <!-- en produccion este parece no cargar averiguar por que...-->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="js/jquery-ui-1.10.3.custom/css/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="style.css"> 
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" >

<script type="text/javascript">





function optionCheck5(){
	var option5 = $('#f_sucur option:selected').val();
	$("#f_por").show();
	$("#mostrar").hide();


}
function optionCheck6(){
		$("#f_submit").show();
		$("#f_fecha").show();
		$("#f_fecha_i").show();
		$("#f_fecha_t").show();
		$("#genera").show();
		$("#mostrar").hide();

}
</script>


</head>
<body >	
	
<div class="container">

<div class="main" style="width:800px;">
	
	<div style="position:relative;left:7.8%;top:25px;">
    	<?php 
		session_start(); 		
		$tipo =$_SESSION['tipouser'];
		$uname =$_SESSION['uname'];
	echo "<p>Bienvenid@<strong> $uname !</strong></p>";
	?>	
	</div>

		<input type="button" style="position:relative;left:10%;top:40px;height:35px;width:80px;"  onclick="location.href='/';"  id="back" value="Regresar" class="btn btn-default"/>		
		<div style="position:relative;left:10%;top:-45px;" ><a  id="logout" href=logout.php >Salir Sesion</a></div>
		

	
	
		<div align="center" >				
				
				
		</div>			
		<div  class= "container" id="sucur" >
			<br>
			<div style="position:relative;left:40%;width:150px;">
				<h2  style="position:relative;left:25%;top:-15px;width:200px;">Estadisticas</h2>
			
			<h4  style="position:relative;right:105%;top:25px;">Elige tus filtros:</h4>
			</div>
                <hr style="position:relative;top:15px;width:700px;">
					<form action="">
						
							   <div style="position:relative;left:25%;">
									<select onchange="optionCheck5();" name="opsearch5" id="f_sucur" class="form-control" style="width:200px;float:left;">
										<option selected="selected" disabled="disabled" value="sucursal">Sucursal</option>
										<option value="Matriz"> Matriz</option>
										<option value="Quiroga"> Colosio - Quiroga</option>
										<Option  value= "Progreso">Progreso </option>
										<Option  value= "Dila">Dila </option>
										<Option  value= "Patio">Patio </option>
										<option  value= "Monteverde">Plaza Monteverde</option>
										<option  value= "P.Maria">Plaza Maria</option>
										<option  value= "PaseoSoli">Paseo Solidaridad</option>
									</select>																					
									<select  onchange="optionCheck6();" id="f_por"   title="Selecciona una de las opciones siguientes para filtrar dispositivos en nuestra base de datos" class="form-control" style="display:none;width:200px;float:left;">
										<option selected="selected" disabled="disabled">--Seleciona  opcion--</option>
							<!--<option value="En reparacion"  > Recibidos  </option>-->
										<option value="Entregado" > Entregados </option>
										<option value="listo" > Listos, no entregados </option>
										<option value="En reparacion" > En reparacion, no listos  </option>	
										<option value="Garantia" > Garantia, en reparacion</option>	
										<option value="GarantiaEn" > Garantia, entregados</option>	
										<option value="GarantiaNoen">Garantia,listos no entregados</option>	
										<option value="Todos">Todos</option>															
									</select>
								</div>
								<div id="f_fecha" style="display:none;position:relative;left:25%;top:20px;width:400px;"> <p>Rango de Fecha</p> 
									<input  type="text" name="f_fecha_i" id="f_fecha_i" placeholder="Inicial" style="display:none;" class="datte">
									<input  type="text" name="f_fecha_t" id="f_fecha_t" placeholder="Final" style="display:none;" class="datte">
									<button type="button" class="btn btn-primary" id="f_submit" style="position:relative;left:89%;top:-28px;display:none;" > Busca </button> 
									<button type="button" id="genera"  style="position:relative;top:-28px;left:90%;display:none;" class="btn btn-success ">Generar Detalles</button>
									<button type="button" id="mostrar"  style="position:relative;top:-28px;left:90%;display:none;" class="btn btn-success detalles">Mostrar</button>
								</div>
							
						
					</form>
		</div>
		              

		<table style="display:inline-block;position:relative;top:30px;left:35%;width:70%;"  id="muestrabla"  name="muestrabla" class="table table-striped table-hover tablesorter" >	

		</table>
		<div id="detalles" style="display: none;" title="Detalles de la busqueda" > 
			<table style="display:inline-block;position:relative;top:70px;left:15%;width:70%;"  id="escondetabla"  name="escondetabla" class="table table-striped table-hover tablesorter " >	

			</table>
		</div>        	
	</div> 	
</div>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8">

$("#f_submit").click(function(){
		$("#muestrabla").show();
});
$("#genera").click(function(){
	$("#genera").hide();
	$("#mostrar").show();

});

///PRIMERO GENERO LOS DETALLES DE LA BUSQUEDA CON EL BOTON #genera LUEGO EL
////DIALOGO PARA MOSTRAR LA TABLA DE DETALLES DEL QUERY


$(".detalles").click(function(){
		var width = (screen.width - 850) / 2;
		$('#detalles').dialog({
			modal: true,
			width: 800,
            position: [width, 75],
            resizable: true,

        });
});


$(document).ready(function() {
	$(".datte").datepicker({dateFormat: "yy-mm-dd"});
});
</script>

<script type="text/javascript">

$(function(){
		$('.s_cliente_auto').autocomplete({
			source: 'ins.php?clienteauto=2',
			minLength: 2
		
		});
		$('.s_imei_auto').autocomplete({

			source: 'ins.php?imeiauto=1',
			minLength: 5
		
		})
	});

///Buscar
 $("#f_submit").click(function() {

 				var fsucur  	=  $('#f_sucur option:selected').val();
 				var fpor 		=  $('#f_por option:selected').val();
 				var ffechai 	=  $('#f_fecha_i').val();
 				var ffechat 	=  $('#f_fecha_t').val();

    $.ajax({    
      type: "GET",
      url: "ins.php?f_submit=1&f_por="+fpor+"&f_sucur="+fsucur+"&f_fecha_i="+ffechai+"&f_fecha_t="+ffechat,
      dataType: "html",   
      //expect html to be returned                
      success: function(response){                    
          $("#muestrabla").html(response);           
      },
      
    });
    
});

$("#genera").click(function() {

 				var fpor 		=  $('#f_por option:selected').val();
 				var fsucur  	=  $('#f_sucur option:selected').val();
 				var ffechai 	=  $('#f_fecha_i').val();
 				var ffechat 	=  $('#f_fecha_t').val();

    $.ajax({    
      type: "GET",
      url: "ins.php?f_submit_es=1&f_por="+fpor+"&f_sucur="+fsucur+"&f_fecha_i="+ffechai+"&f_fecha_t="+ffechat,
      dataType: "html",   
      //expect html to be returned                
      success: function(response){                    
          $("#escondetabla").html(response);           
      },
      
    });
    
});


</script>
</body>
</html>
