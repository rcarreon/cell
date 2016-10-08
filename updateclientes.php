<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="js/jquery-ui-1.10.3.custom/css/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="style.css"> 
	<title>  Cell City | Actualiza Cliente  </title>
</head>
<body>
<?php
include("connection.php");
mysql_select_db("cellcity",$con2);
if(isset($_GET['id'])){
	$c_id    = $_GET['id'];
	$query1=mysql_query("select * from cliente where id ='$c_id'",$con2);
	$query2=mysql_fetch_array($query1);

?>
<a href=logout.php>Salir sesion</a>
<div id="uupdate">
	
	<form  method="get"  >
		
		<h4 align="center"> Edita Cliente </h4>
		<div>
			Id:
				<div>				 
					<input type="text" name="editid"  disabled="disabled" id="editid" value="<?php echo $c_id ;?>" />
				</div>
			Nombre:
				<div>
					<input type="text" name="editnombre"  id="editnombre" disabled="disabled" value="<?php echo $query2[1]; ?>"/>
				</div>

				<div style="position:absolute;top:27%;left:55%;">	
					Email:
					<div>
						<input type="text" name="editemail"  id="editemail" value="<?php echo $query2[2]; ?>"/>			
					</div>			
				</div>
			Ciudad:
				<div>
					<input type="text" name="editcd"  id="editcd" value="<?php echo $query2[8]; ?>"/>
				</div>

				<div style="position:absolute;top:42%;left:55%;">
				Celular:
					<div>
						<input type="text" name="editcel"  id="editcel" value="<?php echo $query2[3]; ?>"/>
					</div>
				</div>
			RFC:
				<div>
					<input type="text" name="editnrfc"  id="editrfc" value="<?php echo $query2[5]; ?>"/>
				</div>
			
				<div style="position:absolute;top:55%;left:55%;">
				Telefono:
					<div>
						<input type="text" name="edittel"  id="edittel" value="<?php echo $query2[4]; ?>"/>
					</div>
				</div>
			
			Domicilio:	
				<div>		
					<input type="text" name="editdom"  id="editdom" value="<?php echo $query2[6]; ?>"/>
				</div>
				<div style="position:absolute;top:67%;left:55%;">
				Colonia:
					<div>
						<input type="text" name="editcol"  id="editcol" value="<?php echo $query2[7]; ?>"/>
					</div>
				</div>
			
			    
				Codigo Postal:
					<div>
						<input type="text" name="editcp"  id="editcp" value="<?php echo $query2[9]; ?>"/>
					</div>
				
			</strong>	

				
		</div>
			
		<a style="position:absolute;bottom:-10%;right:115%;">
				 <button  class="btn btn-primary" type="button" id="c_editaa" > Guardar cambios </button>
				</a>	

		
		<a  style="position:absolute;bottom:-10%;left:20%;"  href="/">
   				<button type="button" id="regresa">Regresar</button>
				</a>
				
			
	</form>	
</div>
<p id="ceditaste"></p>
<?php 
}
mysql_close($con2);
?>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".datte").datepicker({dateFormat: "yy-mm-dd"});
});
</script>
<script type="text/javascript">
$("#c_editaa").click(function(){	
	var cnombre		= $('#editnombre').val();
	var cemail 	= $('#editemail').val();
	var ccel	= $('#editcel').val();
	var ctel 	= $('#edittel').val();
	var cid 	= $('#editid').val();
	var ccpostal 	= $('#editcp').val();
	var cdom 	= $('#editdom').val();
	var ccol 	= $('#editcol').val();
	var crfc	= $('#editrfc').val();
	var ccd     = $('#editcd').val();
//		return estatus;
	$.ajax({
	type:"GET",
		url:"ins.php?mcliente=1&editemail="+cemail+"&editnombre="+cnombre+"&editcel="+ccel+"&edittel="+ctel+"&editid="+cid+"&editcd="+ccd+"&editcp="+ccpostal+"&editdom="+cdom+"&editcol="+ccol+"&editrfc="+crfc,
		success: function(response){
			$('#ceditaste').html(response);
			alert('Contacto modificado con exito');
			window.location="/";
		},
	});
});

</script>
</body>
</html>


