

<html>
<head>
	<title>  Cell City | Hermosillo  </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap.min.css"> <!-- en produccion este parece no cargar averiguar por que...-->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="js/jquery-ui-1.10.3.custom/css/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="style.css"> 
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" >
	

<script type="text/javascript">


function optionCheck(){
	var option = $('#opsearch option:selected').val();
	if (option == "agregaru"){
		$("#agregau").show();
		$("#mostrar").hide();
	}
	if (option == "mostraru"){
		$("#agregau").hide();
		$("#mostrar").show();
	}

}
function optionCheck2(){
	var option2 = $('#opsearch2 option:selected').val();

switch (option2){
		case "imei":
			$("#s_imei").show();
			$("#s_folio").val('').hide();
			$("#s_modelo").val('').hide();
			$("#s_cliente").val('').hide();
			$("#s_status").val('').hide();
			$("#s_todos").val('').hide();
			$("#s_fecha").val('').hide();
			$("#s_donde").val('').hide(); 
			$("#n_columnas").val('').hide(); 
			$("#s_submit").show();
			$("#s_table").show();
			$('#sestatus').hide();
		break;
		case "folio":
			$("#s_imei").val('').hide();
			$("#s_folio").show();
			$("#s_modelo").val('').hide();
			$("#s_status").val('').hide();
			$("#s_todos").val('').hide();
			$("#s_cliente").val('').hide();
			$("#s_fecha").val('').hide();
			$("#s_donde").val('').hide();
			$("#n_columnas").val('').hide();
			$("#s_submit").show();
			$("#s_table").show();
			$('#sestatus').hide();
		break;
		case "modelo":
			$("#s_imei").val('').hide();
			$("#s_folio").val('').hide();
			$("#s_status").val('').hide();
			$("#s_todos").val('').hide();
			$("#s_modelo").show();
			$("#s_cliente").val('').hide();
			$("#s_fecha").val('').hide();
			$("#s_donde").val('').hide();
			$("#n_columnas").val('').show();
			$("#s_submit").show();
			$("#s_table").show();
			$('#sestatus').hide();
		break;
		case "cliente":
			$("#s_imei").val('').hide();
			$("#s_folio").val('').hide();
			$("#s_modelo").val('').hide();
			$("#s_status").show();
			$("#s_todos").val('').hide();
			$("#s_fecha").val('').hide();
			$("#s_donde").val('').hide();
			$("#n_columnas").val('').show();
			$('#sestatus').show();
			$("#s_cliente").show();
			$("#s_submit").show();
			$("#s_table").show();
		break;
		case "todos":
			$("#s_imei").val('').hide();
			$("#s_folio").val('').hide();
			$("#s_modelo").val('').hide();
			$("#s_cliente").val('').hide();
			$("#s_status").val('').hide();
			$("#s_fecha").val('').hide();
			$("#s_donde").val('').hide();
			$("#n_columnas").val('').show();
			$("#s_todos").show();
			$("#s_submit").show();
			$("#s_table").show();
			$('#sestatus').hide();
		break;
		case "todosclientes":
			$("#s_imei").val('').hide();
			$("#s_folio").val('').hide();
			$("#s_modelo").val('').hide();
			$("#s_cliente").val('').hide();
			$("#s_status").val('').hide();
			$("#s_fecha").val('').hide();
			$("#s_donde").val('').hide();
			$("#n_columnas").val('').show();
			$("#s_todos").show();
			$("#s_submit").show();
			$("#s_table").show();
			$('#sestatus').hide();
		break;
		case "fecha":
			$("#s_imei").val('').hide();
			$("#s_folio").val('').hide();
			$("#s_modelo").val('').hide();
			$("#s_cliente").val('').hide();
			$("#s_status").val('').hide();
			$("#s_donde").val('').hide();
			$("#n_columnas").val('').show();
			$("#s_fecha").show();
			$("#s_todos").show();
			$("#s_submit").show();
			$("#s_table").show();
			$('#sestatus').hide();
		break;
		case "sucursal":
			$("#s_imei").val('').hide();
			$("#s_folio").val('').hide();
			$("#s_modelo").val('').hide();
			$("#s_cliente").val('').hide();
			$("#s_status").val('').hide();
			$("#s_fecha").val('').hide();
			$("#n_columnas").val('').show();
			$("#s_donde").show();
			$("#s_todos").show();
			$("#s_submit").show();
			$("#s_table").show();
			$('#sestatus').hide();
		break;

	}
	
}

function optionCheck3(){
		var option3 = $('#opsearch3 option:selected').val();
		switch (option3) {
			case "agregarf":
		//	alert('Si el campo "Cliente" no puede autocompletar deberas de agregrar cliente primero');
				$("#agregaf").show();
			break;
		}

}
function optionCheck4(){
		var option4 = $('#opsearch4 option:selected').val();
		switch (option4) {
			case "agregarc":
				
				//$("#agregau").hide();
				$("#m_todosclientes").hide();
				$("#agregac").show();
				
			break;
			case "todosclientes":
				$("#agregac").hide();
				$("#m_todosclientes").show();
			break;

		}

}
function optionCheck5(){
		var option5 = $('#opsearch5 option:selected').val();
		switch (option5) {
			case "agregarm":
				
				//$("#agregau").hide();
				$("#agregamarca").show();
				$("#a_marca").show();
				$("#eq_submit").show();
				$("#modelos").hide();				
				$("#mod_submit").hide();
				
				
			break;
			case "agregarmm":
			
				$("#mod_submit").show();
				$("#eq_submit").hide();
				$("#agregamarca").show();
				$("#a_marca").hide();
				$("#modelos").show();
			break;

		}

}



</script>


</head>
<body >	
<div class="container">
	<div class="main">

		<!-- <div id="dialog"  style="width:50em;" title="Dialog Form">
		<form action=""   method="post">
			<label>Folio:</label>
			<input id="efolio" name="efolio" type="text">
			<label>Modelo:</label>
			<input id="emodelo" name="emodelo" type="text">
			<label>Imei:</label>
			<input id="eimei" name="eimei" type="text">
			<label>Cliente:</label>
			<input id="ecliente" name="ecliente" type="text">
			<label>Status:</label>
			<input id="estatus" name="estatus" type="text">
			<label>Repara:</label>
			<input id="erepara" name="erepara" type="text">
			<label>Password:</label>
			<input id="epass" name="epass" type="text">
			<label>Email:</label>
			<input id="email" name="email" type="text">
			<label>Detalles:</label>
			<input id="edetalles" name="edetalles" type="text">
			<label>Fecha:</label>
			<input id="efecha" name="efecha" type="text">
			<label>Email:</label>
			<input id="eemail" name="eemail" type="text">	
			<label>Contacto:</label>
			<input id="econtacto" name="econtacto" type="text">			
			<input id="submit" type="submit" value="Submit">
		</form>
		</div>		
</div> -->

	
<?php
	include "connection.php";
	mysql_select_db("cellcity",$con2);	
	

	$sql = "SELECT usuario FROM usuarios WHERE usuario = 'rob'"; 
    $rec = mysql_query($sql) or die ("Query failed: ".mysql_error()."Actual query:".$query); 
    $rows = mysql_fetch_row($rec);	    
    mysql_close($con2);		
?>
<div class="container"  id="wrapper">	
	<hr>
	<?php 
		session_start(); 		
		$tipo =$_SESSION['tipouser'];
		$uname =$_SESSION['uname'];
	echo "<p>Bienvenid@<strong> $uname !</strong></p>";
	?>			
		<a id="logout" href=logout.php>Salir Sesion</a>  

		<div align="center" >				
				<img src="images/titulocellcity.jpg">
				<hr>
		</div>			
		<div align="center" id="botones">			
			<div>
				<button   type="button" class="btn btn-primary" id="s_submit_b" value="bujcar" >Buscar</button>
				<button   type="button" class="btn btn-primary" id="s_submit_a"  value="folios">Folios</button>
				<button   type="button" class="btn btn-primary" id="s_submit_c"  value="clientela ">Clientes</button>
				<?php if ($tipo != 1){?>
					<br><button  style="display:none;"  class="btn btn-primary" id="s_submit_mu"  value="manejausuario">Manejar Usuarios</button>
				<?php } else { ?>
					<br><br><br /><input type="button" style="position:relative;left: 16.5%;height:50px;width:140px;"  onclick="location.href='/estadistico.php';"  id="f_submit_num" value="Estadisticas"/>
					<br><br /><button type="image"   style="position:relative;right:8%;bottom:70px;" id="s_submit_mu"  value="manejausuario" >Manejar Usuarios</button>					
					<button type="image"   style="position:relative;right:7.5%;bottom:70px;" id="s_submit_eq"  value="manejausuario" >Manejar equipos</button>					

					<?php  } ?>
			</div>
		</div>	
		<div  class= "container" id="bujca"  style="display:none;">
			<h4>Busca Folio por:</h4>
			<form  action="" id="bpor">				
					<select  onchange="optionCheck2();"name="busq" id="opsearch2" title="Selecciona una de las opciones siguientes para buscar
					un equipo en nuestra base de datos" class="form-control" style="width:200px;">
						<option selected="selected" disabled="disabled">--Seleciona  opcion--</option>
						<option value="imei"  > Imei</option>
						<option value="folio" > Folio </option>
						<option value="modelo" > Marca </option>
						<option value="cliente" > Cliente</option>	
						<option value="fecha" > Fecha</option>
						<option value="sucursal"> Recibido en </option>	
						<option value="todos">Todos los Equipos</status>
					</select>
				</form>
		</div>
		<div class="container" style="display:none;" id="manageagre">
				<h4>Agregar por:</h4>
				<form >
					<select onchange="optionCheck3();" name="maneja" id="opsearch3"  class="form-control" style="width:200px;">
						<option selected="selected" disabled="disabled">--Selecciona Opcion--</option>						
						<option value="agregarf">Agregar Folio</option>						
					</select>
				</form>
		</div>
		<div class="container" style="display:none;" id="manageclien" >
				<h4>Busca/Agrega Clientes:</h4>
				<form>
					<select onchange="optionCheck4();" name="maneja" id="opsearch4"  class="form-control" style="width:200px;">
						<option selected="selected" disabled="disabled">--Selecciona Opcion--</option>
						<option value="agregarc">Agregar Cliente </option> 
						<option value="todosclientes" >Todos los Clientes</option>
					</select>
				</form>
		</div>




		<div class="container" style="display:none;" id="manageeq" >
				<h4>Agregar marca/modelo:</h4>
				<form>
					<select onchange="optionCheck5();" name="manejaeq" id="opsearch5"  class="form-control" style="width:200px;">
						<option selected="selected" disabled="disabled">--Selecciona Opcion--</option>
						<option value="agregarm">Agregar Marca </option> 
						<option value="agregarmm" >Agregar Modelo</option>
					</select>

				</form>
		</div>
		<div id="agregamarca" style="display:none;position:relative;bottom:50px;left:250px;">
				<form name="busqueda" method="get" >
					<input  type="text" name="a_marca" id="a_marca"  placeholder="Nueva Marca"  style="display:none;text-transform:uppercase;" >
					<input  type="text" name="modelos" id="modelos"  placeholder="Nuevo Modelo"  style="display:none;text-transform:uppercase;" >
					<button   type="button" class="btn btn-primary" id="eq_submit" style="display:none;"   >Agregar marca</button>	
					<button   type="button" class="btn btn-primary" id="mod_submit" style="display:none;"   >Agregar Modelo</button>		

				</form>
		</div>

		<p id="agregamarcas"></p>




		<div id="m_todosclientes"  style="display:none;position:absolute;left:3%;" class="container">
			
				<form  method="get" id="bujca4">
					<button type="button" id="clientes_submit" style="position:relative; left:37%;">Mostrar Clientes</button><br><br />
					
					<table   id="muestrablaclientes"  style="position:relative; left:24%;" class="table table-striped table-hover tablesorter" >	

								
					</table>
				
				</form>
			
		</div>
		<div class="container"  id="bujcapor">
				<form name="busqueda" method="get" id="bujca2">
					<input  type="text" name="s_folio" id="s_folio"  placeholder="Busca por folio" style="display:none;" >
					<input  type="text" name="s_imei" id="s_imei"  class="s_imei_auto" placeholder="Busca por imei" style="display:none;"> 
					<input  type="text" name="s_modelo" id="s_modelo"  placeholder="Busca por Equipo" style="display:none;" >
					<input  type="text" name="s_fecha" id="s_fecha" placeholder="Buscar por fecha" style="display:none;" class="datte">
					<input  type="text" name="s_cliente" id="s_cliente"  placeholder="Busca por cliente" class="s_cliente_auto" style="display:none;" >
						<select name="s_status" id="s_status" style="display:none;width:110px;position:relative;left:18%;bottom:30px;" class="form-control"  >
							<option selected="selected" disabled="disabled" value="">opcion</option>
							<option name="s_status" value="listo" > Listo </option>
							<option name="s_status" value="En reparacion" > En reparacion </option> 
							<option name="s_status" value="Garantia" > Garantia </option>  
							<option name="s_status" value="Entregado" > Entregado </option>
					  	</select>	
					  	<select name="s_donde" id="s_donde" style="display:none;width:110px;position:relative;left:19%;bottom:60px;" class="form-control"  >
							<option selected="selected" disabled="disabled" value="">opcion</option>
							<option name="s_donde" value="Matriz" > Matriz </option>
							<option name="s_donde" value="Quiroga" > Quiroga </option> 
							<option name="s_donde" value="Progreso" > Progreso </option> 
							<option name="s_donde" value="Dila" > Dila </option> 
							<option name="s_donde" value="Patio" > Patio </option> 
						</select> 		
						<select name="n_columnas" id="n_columnas" style="display:none;width:180px;position:absolute;left:45%;top:45%;" class="form-control"  >
							<option selected="selected"  value="" >100 Recientes </option>
							<option name="n_columnas" value="200" > 200 </option>
							<option name="n_columnas" value="300" > 300 </option> 
							<option name="n_columnas" value="500" > 500 </option> 
							<option name="n_columnas" value="1000" > Todos </option> 
							
						</select> 
						<button   type="button" class="btn btn-primary" id="s_submit" style="display:none;"   >Buscar</button>			
				</form>		
		</div>						 						
		
		<div class="container" id="s_table"  style="display:none;">
			<div  style="display:inline-block;">
				<br />
				<form name="editar" method="get" id="eedita">
					
					<table  id="respuestabla"  class="table table-striped table-hover tablesorter">	
						<tbody>
						</tbody>
									
					</table>
				
				</form>
				
			</div>
		</div>
		
		<!--<div id="footer">	
			<div class="container span12">
				<h4> CellCity 2014 </h4>
			</div>
		</div> -->
		<div   class = "container" id="agregaf" style="display:none;">			
			<form   name="agrega" method="post" id="aagrega"><strong>
				<h4 align="Center" >Agregar Folio</h4>		
				<div>		
					<font color="red">**</font>Cliente 
					<div class="f_agrega">
						<input type="text" name="a_cliente" id="a_cliente" class="s_cliente_auto" placeholder="Ingresa Cliente" tabindex=1 style="text-transform:uppercase;" >	
					</div>
					
					<div style="position:absolute;top:28px;left:55%;">
						Imei:
						<div>
				 			<input type="text" name="a_imei" id="a_imei" class="s_imei_auto" placeholder="Ingresa Imei" tabindex=2 style="text-transform:uppercase;" >
				 		</div>
			    	</div>
					Equipo marca: 
					<div class="f_agrega" >
						<input type="text" id="a_modelo" class="s_marca_auto" name="a_modelo" placeholder="Ingresa Marca" tabindex=3  style="text-transform:uppercase;" >
					</div>

					<div style="position:absolute;top:95px;left:55%;">
						Equipo modelo:
						<div class="f_agrega" >
							<input type="text" id="a_mmodelo" name="a_mmodelo" class="s_modelo_auto" placeholder="Ingresa Equipo" tabindex=4 style="text-transform:uppercase;" >
						</div>
					</div>
					Fecha y hora:
					<div>
						<input class="datte" type="text" name="a_fecha" id="a_fecha" value="<?php  date_default_timezone_set('America/Hermosillo'); $date = date('Y-m-d         H:m:s'); echo $date; ?>" tabindex=5 style="text-transform:uppercase;">
					</div>

					<div style="position:absolute;top:150px;left:55%;">
			    	Contrasena:
			    		<div>
							<input type="text" id="a_password" name="a_password" placeholder="Ingresa Contraseña" tabindex=6  style="text-transform:uppercase;">				
						</div>
					</div>
					<div style="position:absolute;top:210px;left:55%" tabindex=9>
			    		<font color="red">**</font>Sucursal
			    		<div>
			    			<select name="a_sucurs" id="a_sucurs"  style="width:150px;">
								<option  disabled="disabled" value="sucursal">Sucursal</option>
								<option value="Matriz"  selected="selected"> Matriz</option>
								<option value="Quiroga"> Colosio - Quiroga</option>
								<option  value= "Progreso">Progreso </option>
								<option  value= "Dila">Dila </option>
								<option  value= "Patio">Patio </option>>
							</select>

			    		<!-- <input type="radio" name="a_donde" id="a_donde"   value="Matriz" tabindex=6 >Matriz
					    <input type="radio" name="a_donde" id="a_donde"  value="Quiroga" tabindex=7 >Quiroga  -->
						</div>
					</div>
					<div class="f_agrega">
				 		<input type="radio" name="a_status" id="a_status"   class="lis" value="Garantia" tabindex=7 >Garantia <font color="red">*</font>
						<input type="radio" name="a_status" id="a_status"  class="rep" value="En reparacion" tabindex=8 >Nuevo Ingreso <font color="red">*</font>				   			   		
			   		</div>  <br>	    
			   		Detalles Tecnicos:
			    	<div>			
			    		<textarea maxlength="115" type="text" id="a_detalles" name="a_detalles" placeholder="Detalles Servicio Tecnico" tabindex=10 style="text-transform:uppercase;" value="LOQUE SEA QUE SE LE HAYA ROTO"></textarea>					
			    	</div>
			    	<div style="position:absolute;top:270px;left:55%" >
			    		Accesorios:
			    			<div>
			    			    <textarea maxlength="115" type="text" id="a_access" name="a_access" placeholder="Accesorios" tabindex=11 style="text-transform:uppercase;" value="Una moto"></textarea>					

			    			</div>
			    	</div>
					<input  id="a_recibe" name="a_recibe" value="<?php echo $uname;?>" hidden >
				
					</strong><br>
					<button    type="button" id="a_submit" class="btn btn-primary" tabindex=12 > Agregar Folio </button>
				<!--<button    type="button" id="nuevo" class="btn btn-primary" > Nuevo Folio </button> -->
				<button type="button" id="printeando" onclick="updateoutput()" disabled="disabled" tabindex=13> Imprimir </button>	
					<!-- <button type="button" id="printeando" onclick="updateoutput()"  tabindex=10> Imprimir </button>	-->										
				</div>
			</form>	
			<button  style="position:absolute;bottom:5%;left:65%;"  id="limpia" type="button" tabindex=14>Limpiar datos</button>												
			<a href="/" >
   			<button style="position:absolute;bottom:5%;left:85%;" type="button" tabindex=15>Regresar</button>
			</a>

		</div>		
		<!--IMPRIMIR -->
	<div id="print" class="print" >	
							<div align="justify" class="doces" style="position:absolute;top:-5%;">
								<label> PRESTACIÓN DE SERVICIOS DE REPARACIÓN Y/O MANTENIMIENTO DE EQUIPOS DE
 								TELEFONÍA CELULAR, O EQUIPOS <br> DE MANEJO DEDATOS E INFORMACIÓN, O EQUIPOS LECTRÓNICOS.</label>
							</div>

			<div style="position:absolute;top:3%;left:-6%;">
				<table class="printt" >
					
					<tr>
						<td class="uno" align="center"  >
							<img  style="position:absolute;top:5%;left:1%;" src="images/ccitylogo.png" width="80" height="60">		
							<div style="padding-left:10em" id="adnd"></div> 

						</td>
					</tr>
				</table>
			</div>

			<div style="position:absolute;top:16%;left:-5%;">
				<table class="printt" >
					
					<tr>
						<td class ="tres" align="center"  >
							<font size="1"><strong>Horario de atención al público </strong><br>
							<div id="hora"></font></div>

						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:16%;right:60.1%;">
				<table class="printt" >
					
					<tr>
						<td  align="center"  >
							<font size="1"><strong>Fecha</strong></font>
							<tr>
								<td class="cuatro" id="fecha"></td>
							</tr>
						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:3%;right:14.5%;">
				<table class="printt" id="pfolio">
					<tr>
						<strong><td class="seis" align="center"><strong>Folio</strong></td></strong>
					</tr>
					<tr>
						<td class="seis" align="center" id="pfolio1" >

						</td>
					</tr>
				</table>
			</div>

			<div style="position:absolute;top:9%;right:7.5%;" >
				<table class="printt" >					
					<tr>
						<td class="seis" align="center">
							<font size="1"><strong>Clave de accesso electronico al Celular (Patron) </strong></font>
							<tr>
								<td class="cinco" align="Center"  >  
									<img src="images/cuadritocellcity2.jpg" width="90" height="87">
						    </tr>

						</td>
					</tr>
				</table>
			</div>

			<div style="position:absolute;top:3%;right:31%;"   >
				<table class="printt" >					
					<tr>
						
							
							<tr>
								<td class="siete" align="Center"  >  
							    <img src="images/cellpartes.jpg" width="90" height="120"><br>
								Daños fisicos que presenta el equipo <br>
								 _______________________________</br>
								 _______________________________ 
								  

						    </tr>

						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:30%;right:3%;"    >
				<table class="printto" >					
					<tr>
						
							
							<tr>
								<td class="ocho" align="left"  >  
									
								<font size="1">	Cliente: <label style="width:150px;" id="p_cliente" align="center">  </label>  RFC: <label style="width:150px;" id="p_rfc" align="center">  </label>   Correo electrónico: <label style="width:100px;" align="center" id="p_email"></label>      
									<br>Código postal: <label style="width:100px;" align="center" id="p_cp"></label>	Teléfono  en el que se le pueda localizar:<label style="width:100px;" align="center" id="p_tel"></label> </br>
									Domicilio:<label style="width:200px;" align="center" id="p_dom"></label>      Colonia:<label style="width:150px;" align="center" id="p_col"></label>    Ciudad:<label style="width:100px;" align="center" id="p_cd"></label>

						    </tr>

						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:40%;right:3%;"   >
				<table class="printto" >					
					<tr>
						
							
							<tr>
								<td class="ocho" align="left"  >  
									<strong>Equipo</strong><br>
									Marca: <label style="width:100px;"  align="center" id="p_marca">  </label>  Modelo: <label style="width:100px;" align="center" id="p_modelo">  </label>    IMEI: <label style="width:100px;" align="center" id="p_imei">  </label> Otros:<label style="width:100px;" align="center" id="p_otros">  </label> </br>
									Acesorios Entregados por <label style="width:250px;" id="p_cliente66" align="left" id="p_acces">  </label></br>Fecha de ingreso: <label style="width:250px;" id="fecha2" align="center"><font size="1"></font> </label> Fecha de entrega : <label style="width:150px;" id="fechaentre" align="center"><font size="1"></font> </label>

						    </tr>

						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:52%;right:3%;"  >
				<table class="printto" >		
					<thead >			
						<tr>
						   <th colspan="2" style="padding-left:18em" > Presupuesto </th>
							
							<tr>
								<td class="nueve" align="left"  >  
									Descripción del servicio solicitado </br>
									Fallas reportadas por <label id="p_cliente65"></label>:</br>
									 <label id="p_detalles"></label>
									</br>

									</br><label id="p_cliente64"></label> otorga autorización para que se utilicen partes o <br>refacciones usadas   Sí (   )      No (   )</br>

									Solamente con previa aprobación de La Empresa, <label id="p_cliente63"></label> suministra <br>partes y/o refacciones Sí (   )     No (   )</br>
									Detalle:</br>
									1.- ______________________________  Nueva (   )     Usada (   ) </br>
									2.- ______________________________  Nueva (   )     Usada (   )  </font>
								    </br></br></br></br></br>
									
								</td>
								<td class="nueve" align="left"  >  
									Riesgos para el equipo que se pueden presentar por el desarrollo del Diagnóstico o la reparación y/o mantenimiento del equipo,
 									y que por tanto no existe garantía<br>

									1. En equipo mojado ya que el equipo después de reparado tiene el riesgo de no encender<br>
									2. En equipo golpeado<br>
									3. En lectores SIM, ya que por calentamiento de los mismos se pueden dañar<br>
									4. En display por cambio de cristal<br>
									5. La Empresa no se hace responsable de datos personales contenidos en el equipo tales como contactos, fotos, notas, etc.<br>
									6. En los casos en los que, previa autorización de <label id="p_cliente62"></label>, se utilicen partes y/o refacciones usadas, o bien, por entrega que él mismo haga, se utilicen refacciones y/o partes nuevas y/o usadas<br>
									7. Sobre daños que presente el equipo<br>
									8. En reparaciones realizadas en otros talleres ajenos a La Empresa <br>
									
								</td>
						    </tr>

							
						</tr>
				</thead>
				</table>
			</div>

			<div style="position:absolute;top:91%;left:0%;"  >
				<table class="printto" >		
					<thead >			
						<tr>
						   
							<tr>
								<td  class="cuatro" align="center"  >  Clave
								
									
								</td>
								<td  class="cuatro" align="center"  >  Numero
								
								</td>
								<td  class="diez" align="left"  >  Operaciones a realizar en el equipo y elementos a reparar y/o sustituir
								
								</td>
								<td  class="cuatro" align="left"  >  Importes moneda nacional 
								
								</td>
							</tr>
							<tr>
								<td class="cuatro" align="left"  >  
								
								</td>
								<td  class="cuatro" align="left"  >  
								
								</td>
								<td class="diez" align="left"  >  
								
								</td>
								<td class="cuatro" align="left"  >  
								
								</td>
						    </tr>
						    <tr>
								<td class="cuatro"  align="left"  > 
								
								</td>
								<td  class="cuatro" align="left"  >  
								
								</td>
								<td  class="diez" align="left"  >  
								
								</td>
								<td  class="cuatro" align="left"  >  
								
								</td>
						    </tr>
						    <tr>
								<td class="cuatro"  align="left"  > 
								
								</td>
								<td class="cuatro"  align="left"  >  
								
								</td>
								<td  class="diez" align="left"  >  
								
								</td>
								<td class="cuatro"  align="left"  >  
								
								</td>
						    </tr>
						     <tr>
								<td class="cuatro"  align="left"  >  
								
								</td>
								<td class="cuatro"  align="left"  >  
								
								</td>
								<td  class="diez" align="right"  >  Mano de obra
								
								</td>
								<td class="cuatro"  align="left"  >  $ 
								
								</td>
						    </tr>
						     <tr>
								<td class="cuatro"  align="left"  >  
								
								</td>
								<td class="cuatro"  align="left"  >  
								
								</td>
								<td  class="diez" align="right"  >  Partes o refacciones
								
								</td>
								<td class="cuatro"  align="left"  >  $
								
								</td>
						    </tr>
						    <tr>
								<th   colspan="3" style="height:50px;" ><label style="position:absolute;top:60%;right:15%;"align="right"><font size="2">Subtotal</font></label><br>
																		<label style="position:absolute;top:68%;right:15%;"align="right"><font size="1">I.V.A</font></label><br>
																	    <label style="position:absolute;top:76%;right:15%;"align="right"><font size="1">Anticipo</font></label><br>
																		<label style="position:absolute;top:85%;right:15%;"align="right"><font size="1">Resto de Pago</font></label><br>
																		<label style="position:absolute;top:94%;right:15%;"align="right"><font size="2">Total</font></label></th>
								<td  class="cuatro" align="left"  >  
									$ ______________
									$ ______________
									$ ______________
									$ ______________
									$ ______________
									


								
								</td>
								
						    </tr>



							
						</tr>
				
				</table>
			</div>
			<div style="position:absolute;top:131%;right:2%; width:700px;" align="justify"  >

				
					<font size="1"><label id="p_cliente61" class="onces" ></label> acepta que en el caso de que por razones técnicas y al momento de la entrega de su equipo no se pueda  
					realizar  y  tener  disponible el presupuesto referente a la prestación del servicio de reparación y/o mantenimiento  
					del equipo, se le se le envíe   el  presupuesto por  correo electrónico  Sí (    )    No (    ), o en su defecto, El  
					Cliente acepta acudir personalmente a las instalaciones  de  La Empresa  a <br>autorizar  y recibir dicho presupuesto por 
					escrito para poder iniciarse la reparación y/o  mantenimiento del equipo. <br>
					
					En caso de que el presupuesto no sea aceptado por <label id="p_cliente60"></label>, Llamas Comunicación, S.A. de C.V. se obliga a devolver
					el equipo en las condiciones en las que lo recibió, exceptuándose las consecuencias inevitables de daños en el equipo <br>
					derivados de la revisión y el diagnóstico. La revisión y diagnóstico no tienen costo.
					<br>
					<br>
					
					
					<strong><label style="padding-left:5em;padding-right:10em">Llamas Comunicación, S.A. de C.V.</strong>					<label id="p_cliente59"></label>, Fecha y Firma aceptando Presupuesto</label><br>
					<strong><label style="padding-left:8em;">Importante: Las cláusulas del contrato se describen al reverso. Léalas cuidadosamente</label> <strong></font>


			</div>

			<div style="position:absolute;top:156%;right:2%; width:700px;"  >

				
					<font size="1" >Autorización que otorga <label id="p_cliente58" class="onces"></label> para el uso de la información con fines mercadológicos o publicitarios
					<label id="p_cliente57"></label> Sí (   )  No (   ) acepta que Llamas Comunicación, S.A. de C.V., utilice con fines mercadológicos o publicitarios o bien, que ceda
					o transmita a terceros, con los mimos fines, la información proporcionada por él mismo con motivo de este contrato.<br><br>

														 <label style="padding-left:20em"> _______________________________________________</label><br>
														 <label style="padding-left:22em"><label id="p_cliente56"></label> (firma de autorización)</label>
					<br>
					
					
					</font>


			</div>							
	</div> 
				<!-- SE Usa para el dialogo de impresion  -->
				<div  style="display:none;" style="position:absolute;top:20%;padding-left:30em;" align="center" class="prnt">
					<button id="imp" TYPE="button" onClick="printArea('print');" >Imprimir 
					<button type="regresa" id="cancelar">Cancelar
				</div>
				
		<div style="display:none;" id="impo">
			<div  style="display:inline-block;">
				<br />
				
					
					<table  id="printdiv"  class="table table-striped table-hover tablesorter">	
						<tbody>
						</tbody>
									
					</table>
				
				
				
			</div>
		</div>
								
<!--
	<div id="segundo" style="display:none;">			
				
				<label>Copia al Cliente</label>	

				<img id="logo" src="images/logo_2015.jpg" alt="Cell City logo" height="110" width="350" >		
			<div style="position:absolute;top:110%;left:2%;">
				<table class="printt" style="width:35em;height:5em;">				
					<tr>
						<td class="uno" ><strong>Cliente</strong></td>
						<td class="dos" id="cliente2" name="cliente"></td>
					</tr>
					<tr>
						<strong><td class="uno"  ><strong>Equipo</strong></td></strong>
						<td class="dos" id="equipo2"  > </td>
					</tr>
					<tr>
						<strong><td class="uno"  ><strong>Imei</strong></td></strong>
						<td class="dos" id="imei2" ></td>
					</tr>				
				</table>
				<br><br>

				<div style="position:relative;left:15%;">
					<input type="checkbox"> SIM </input>
					<input type="checkbox"> Bateria</input>
					<input type="checkbox"> Tapa</input>
					<input type="checkbox"> Memoria </input>
				</div>
			</div>
				<div style="position:absolute;top:100%;left:80%;">
				<table class="printt" id="pfolio">
					<tr>
						<strong><td class="uno" align="center"><strong>Folio</strong></td></strong>
					</tr>
					<tr>
						<td class="uno" align="center" id="pfolio2" >

						</td>
					</tr>
				</table>
				<br>
				<table class="printt" id="pfolio">
					<tr>
						<strong><td class="uno" align="center"><strong>Fecha</strong></td></strong>
					</tr>
					<tr>
						<td class="uno" id="fecha2"></td>
					</tr>
				</table>	<br><br><br>
				<img src="images/cuadritocellcity2.jpg" width="120" height="120">
				</div>							
				<div  style="position:absolute;top:125%;left:2%;">	
				<table class="printt" style="width:35em;height:5em;bottom:10%;">
					<thead>
						<tr>
							<th>DETALLES DE SERVICIO TECNICO</th>
						</tr>
						<tr>
							<td>La contraseña es <label id="contra2"></label></td>
						</tr>
						<tr>
							<td rowspan="4" class="uno" id="detalles2" ></td>
						</tr>
					</thead>
					<br /><br/>																
				</table>
			</div>
			<div style="position:absolute;top:150%;left:1%;">
				<p class="alinea"><strong><font size="3em;">EN CAMBIO DE CRISTAL EL CLIENTE ACEPTA EL RIESGO DE DANO DE PANTALLA</font></strong></p>	
				<div style="width:750px;" class="alinea">
					<p id="politicas" align="justify"><font size="2em;">Politicas: 1.Debe de presentar este comprobante para que se le haga entrrega del equipo.2.Despues de 15 dias no nos hacemos
				responsables de su equipo.3.Si no recoge su equipo en 30 dias,pasa a ser propiedad de Cell City.4. No se hacen garantias en equipos golpeados
				o mojados.5. No nos hacemos responsables de la perdida parcial o total de la informacion en su equipo. NO NOS HACEMOS RESPONSABLES EN CASO DE
				ROBO O INCENDIO.</font></p>
				</div>
				
				<br><br><br><br>
				
								<div style="position:relative;left:5%;bottom:10px;padding-left:20em;" >
									<p > ________________________________  <br/>                   
									Recibio: <?php echo $uname ?>
								
								<br>
								
								________________________________  <br/>                   
									Aceptacion de Cliente:<label id="getname2"></label></p>
								</div>
								<p>
				
				<div style="position:relative;bottom:20%;padding-left:20em;">
					<button id="imp" TYPE="button" onClick="printArea('print');" >Imprimir
					<button type="regresa" id="cancelar">Cancelar
				</div>
			</div> 
	</div> -->
		<!--FIN IMPRIMIR-->
		<p id="agregarespuesta"> </p>
		<div class="container" style="display:none;" id="manageusr">
				<h4>Manejar Usuarios:</h4>
				<form>
					<select onchange="optionCheck();" name="maneja" id="opsearch" class="form-control" style="width:200px;height:30px;">
						<option selected="selected" disabled="disabled">--Selecciona Opcion--</option>
						<option value="agregaru">Agregar Usuario </option>
						<option value="mostraru">Muestra Usuarios</option>						
					</select>
				</form>
		</div>			
		<div class="container" id="agregau" style="display:none;">			
			<form name="uagrega" method="get" id="uagrega">
				<h4 align="center"> Agrega usuario Nuevo </h4>
				<strong><font color="red">**</font>Usuario:
				<div>
					<input type="text" name="u_usuario" id="u_usuario"> 
				</div><br />
				Nombre:
				<div>				
					<input type="text" name="u_nombre" id="u_nombre">
				</div><br />
				<font color="red">**</font>Contraseña:
 				<div>
 					<input type="password" name="u_pass" id="u_pass">
				</div><br />
				Tipo de usuario:
				<div>				
					<input type="radio" name="u_tipo" id="u_tipo" value="1">Administrador
					<input type="radio" name="u_tipo" id="u_tipo" value="2">Regular			
				</div><br />
				<br/>
			</strong>
				<button type="button"id="u_submit" class="btn btn-primary"> Nuevo usuario </button>	
				<a  href="/">
   				<button type="button">Regresar</button>
				</a>						
			</form>
			<p id="agregauser"></p>
		</div>
		<div id="mostrar"  style="display:none;" class="container">
			<div style="display:inline-block;">
				<form  method="get" id="bujca3">
					<button type="button" id="m_submit" style="position:relative; left:5.5%;">Mostrar usuarios</button><br><br />					
						<table style="display:inline-block;position:relative; left:60%;bottom:80px;"  id="muestrabla"  class="table table-striped table-hover tablesorter"  >	

						</table>					
				</form>

			</div>

		</div>

		<div class="container" id="agregac" style="display:none; " >				
			<form name="cagrega" method="get" id="cagrega">
				<h4 align="center"> Agrega Cliente Nuevo </h4>		
				<div >			
				<strong><font color="red">**</font>Nombre:
					<div>
						<input  maxlength="70" size="30" type="text" name="c_nombre" id="c_nombre" placeholder="Nombre de cliente" tabindex=1 style="text-transform:uppercase;">
					</div>
					<div style="position:absolute;top:28px;left:55%;">
						Email:
						<div>							
							<input size="30"name="c_email" id="c_email" placeholder="Correo Electronico" tabindex=2 style="text-transform:uppercase;" >
						</div>
					</div>
					Celular:
 					<div>
 						<input size="30" type="text" name="c_cel" id="c_cel" placeholder="Celular" tabindex=3 style="text-transform:uppercase;" >				
 					</div>
 					<div style="position:absolute;top:75px;left:55%;">
						<font color="red">**</font>Telefono contacto autorización:
						<div>						
							<input size="30" type="text" name="c_tel" id="c_tel" placeholder="Telefono de contacto" tabindex=4 style="text-transform:uppercase;" >
						</div>
					</div>
						RFC:
 					<div>
 						<input size="30" type="text" name="c_rfc" id="c_rfc" placeholder="RFC" tabindex=3 style="text-transform:uppercase;" >				
 					</div>
 					<div style="position:absolute;top:125px;left:55%;">
						Domicilio:
						<div>						
							<input size="30" type="text" name="c_dom" id="c_dom" placeholder="Domicilio" tabindex=4 style="text-transform:uppercase;" >
						</div>
					</div>
						Colonia:
 					<div>
 						<input size="30" type="text" name="c_col" id="c_col" placeholder="Colonia" tabindex=3 style="text-transform:uppercase;" >				
 					</div>
 					<div style="position:absolute;top:175px;left:55%;">
						Ciudad:
						<div>						
							<input size="30" type="text" name="c_cd" id="c_cd" placeholder="Ciudad" tabindex=4 style="text-transform:uppercase;" >
						</div>
					</div>
						Codigo Postal:
 					<div>
 						<input size="30" type="text" name="c_postal" id="c_postal" placeholder="Codigo Postal" tabindex=3 style="text-transform:uppercase;" >				
 					</div>

					<br/>
				</strong>
				</div>						
			</form>
			<button type="button"id="c_submit" class="btn btn-primary" tabindex=5> Guardar Cliente </button>	

			<a style="padding-left:20em;"  href="/">
   				<button type="button" tabindex=6 >Regresar</button>
			</a>		
			<p id="agregacliente"></p>
		</div>
<p id="editaste"> </p>
</div> 
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8">

$("#s_submit_b").click(function(){
	$('#opsearch option:eq(0)').attr('selected','selected');
		$('#opsearch3 option:eq(0)').attr('selected','selected');
		$('#opsearch4 option:eq(0)').attr('selected','selected');
	    $('#agregac').hide();
  		$("#bujca").show();
		$("#agregaf").hide();
		$('#manageagre').hide();
		$("#respuestabla").show();
		$("#bujca2").show();
		$('#manageusr').hide();
		$("#agregau").hide();
		$("#mostrar").hide()
		$('#manageclien').hide();
		$('#manageeq').hide();
		$('#a_marca').hide();
		$('#eq_submit').hide();
		$('#manageeq').hide();
	
		$('#m_todosclientes').hide();
});
$("#s_submit_a").click(function(){
		//alert('Antes de agregar un folio recuerda agregar cliente primero, si el cliente ya esta registrado ignora el msg y sigue adelante');
		$('#opsearch option:eq(0)').attr('selected','selected');
		$('#opsearch2 option:eq(0)').attr('selected','selected');
		$('#opsearch4 option:eq(0)').attr('selected','selected');
		$('#agregac').hide();
		$("#agregaf").show();
		$("#manageclien").hide();
		$('#s_submit').hide();
		//$("#agrega").show();
		$("#bujca").hide();
		$("#respuestabla").hide();
		$("#bujca2").hide();
		$('#manageusr').hide();
		$("#agregau").hide();
		$("#mostrar").hide()
		$('#manageclien').hide();		
		$('#m_todosclientes').hide();
		$('#manageeq').hide();
		$('#modelos').hide();
		$('#mod_submit').hide();
		$('#a_marca').hide();
		$('#eq_submit').hide();


});
$("#s_submit_c").click(function(){
	$('#opsearch2 option:eq(0)').attr('selected','selected');
	$('#opsearch3 option:eq(0)').attr('selected','selected');
	$('#opsearch option:eq(0)').attr('selected','selected');

		$('#s_submit').hide();
		$('#agregac').hide();
  		$("#manageclien").show();
  		$("#bujca").hide();
		$("#agregaf").hide();
		$('#manageagre').hide();
		$("#respuestabla").hide();
		$("#bujca2").hide();
		$('#manageusr').hide();
		$("#agregau").hide();
		$("#mostrar").hide();
		$('#manageeq').hide();

});
$("#s_submit_mu").click(function(){
	$('#opsearch2 option:eq(0)').attr('selected','selected');
	$('#opsearch3 option:eq(0)').attr('selected','selected');
	$('#opsearch4 option:eq(0)').attr('selected','selected');
		$('#s_submit').hide();
		$('#manageusr').show();
		$("#manageclien").hide();
		$('#agregac').hide();		
		$("#bujca").hide();
		$("#agregaf").hide();
		$("#respuestabla").hide();
		$("#bujca2").hide();		
		$("#manageagre").hide();				
		$('#m_todosclientes').hide();
		$('#manageeq').hide();
		$('#a_marca').hide();
		$('#a_mmodelo').hide();

		
});


$("#s_submit_eq").click(function(){
		$('#manageeq').show();
		$('#s_submit').hide();
		$("#manageclien").hide();
		$('#agregac').hide();		
		$("#bujca").hide();
		$("#agregaf").hide();
		$("#respuestabla").hide();
		$("#bujca2").hide();		
		$("#manageagre").hide();				
		$('#m_todosclientes').hide();
		$('#manageusr').hide();


		$('#opsearch2 option:eq(0)').attr('selected','selected');
		$('#opsearch3 option:eq(0)').attr('selected','selected');
		$('#opsearch4 option:eq(0)').attr('selected','selected');
});

$(document).ready(function() {
	$(".datte").datepicker({dateFormat: "yy-mm-dd"});
});
</script>

<script type="text/javascript">



////////////////DIALOGO //////////////////
//$(document).ready(function() {
$(function() {
	$("#dialog").dialog({
		autoOpen: false,
		width: 600,
		height: 300
	});
	//$("#button").on("click", function() {
	//	$("#dialog").dialog("open");
	//});
	//$('#button').click(function(){
	//		$("#dialog").dialog("open");
	//});
});

////////////////////////IMPRIMIR/////////////////////////////////////////////






$('#printeando').click(function(){
		var width = (screen.width - 850) / 2;
		$('.prnt').dialog({
			modal: true,
			width: 300,
            position: [500, 305],
            resizable: true,
            title: "Impresion",

        });

		

		//$('.prnt').show();
		//$('.print').show();
		var pcliente = $('#a_cliente').val();
		$.ajax({
			type:"GET",
			url:"ins.php?pclient=1&a_cliente="+pcliente,
			dataType:"html",
			success:function(response){
				$("#pfolio1").html(response); 
				$("#pfolio2").html(response); 
			},
		});			

});

$('#cancelar').click(function(){
						$('.prnt').dialog("close");
						//$('.print').hide();
						$('#a_modelo').removeAttr("disabled");
						$('#a_imei').removeAttr("disabled");
						$('#a_cliente').removeAttr("disabled");
						$('#a_detalles').removeAttr("disabled");
						$('#a_password').removeAttr("disabled");
						$('#a_conta').removeAttr("disabled");
						$('#a_fecha').removeAttr("disabled");
						$('#a_email').removeAttr("disabled");
						$('input:radio[name=a_status]:checked').removeAttr("disabled","disabled");
});
$(function() {
    $( ".print" ).draggable();
});


////ESTA FUNCION ES PARA MANDAR LOS VALORES QUE ESTAN EN EL DIV DE UPDATE PARA EL DIV DE PRINT /////////////
function 	updateoutput(){

			document.getElementById('p_cp').innerHTML=document.getElementById('pcpostal').getAttribute("value");
			document.getElementById('p_cd').innerHTML=document.getElementById('pciudad').getAttribute("value");
			document.getElementById('p_col').innerHTML=document.getElementById('pcolonia').getAttribute("value");
			document.getElementById('p_dom').innerHTML=document.getElementById('pdomicilio').getAttribute("value");
			document.getElementById('p_rfc').innerHTML=document.getElementById('prfc').getAttribute("value");			
			document.getElementById('p_tel').innerHTML =document.getElementById('ptelefono').getAttribute("value");
			document.getElementById('p_email').innerHTML=document.getElementById('pemail').getAttribute("value");
			document.getElementById('p_cliente').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente56').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente57').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente58').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente59').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente60').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente61').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente62').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente63').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente64').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente65').innerHTML=document.getElementById('a_cliente').value;
			document.getElementById('p_cliente66').innerHTML=document.getElementById('a_cliente').value;						
			document.getElementById('fecha').innerHTML=document.getElementById('a_fecha').value; 
			document.getElementById('fecha2').innerHTML=document.getElementById('a_fecha').value;	
			document.getElementById('p_detalles').innerHTML=document.getElementById('a_detalles').value;			
			document.getElementById('p_marca').innerHTML=document.getElementById('a_modelo').value;
			document.getElementById('p_modelo').innerHTML=document.getElementById('a_mmodelo').value;
			document.getElementById('p_imei').innerHTML=document.getElementById('a_imei').value;
}

////ESTA FUNCION ES PARA MANDAR A IMPRIMIR NADA MAS EL DIV QUE SE QUIERE ///////////
function printArea(areaName){
        var printContents = document.getElementById('print').innerHTML; 
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML= "";
        location.reload();        
}   

////////////////////////////////////////////////////////////////////////////

$(function() {
    $( "#agregaf" ).draggable();
  });
$(function() {
    $( "#agregac" ).draggable();
  });
$(function() {
    $( "#agregau" ).draggable();
  });

$(function(){
		$('.s_cliente_auto').autocomplete({
			source: 'ins.php?clienteauto=2',
			minLength: 2
		
		});
		$('.s_imei_auto').autocomplete({

			source: 'ins.php?imeiauto=1',
			minLength: 5
		
		});
		$('.s_marca_auto').autocomplete({

			source: 'ins.php?marcaauto=1',
			minLength: 2
		
		});
		$('.s_modelo_auto').autocomplete({

			source: 'ins.php?modeloauto=1',
			minLength: 2
		
		});
});

///Buscar
 $("#s_submit").click(function() {

 				
 				var simei 		=  $('#s_imei').val();
 				var smodelo 	=  $('#s_modelo').val(); 				
 				var sstatus 	=  $('#s_status option:selected').val();
 				var sdonde 		=  $('#s_donde option:selected').val();
 	            var sfolio 		=  $('#s_folio').val();
 	            var scliente 	=  $('#s_cliente').val();
 	            var sfecha 		=  $('#s_fecha').val();
 	            var columnas 	=  $('#n_columnas option:selected').val();
 	            

    $.ajax({    
      type: "GET",
      url: "ins.php?s_submit=1&s_folio="+sfolio+"&s_imei="+simei+"&s_cliente="+scliente+"&s_modelo="+smodelo+"&s_status="+sstatus+"&s_fecha="+sfecha+"&s_donde="+sdonde+"&n_columnas="+columnas,
      dataType: "html",   
      //expect html to be returned                
      success: function(response){                    
          $("#respuestabla").html(response);           
      },
      
    });
    
});
 ///Agrega Folio
$("#a_submit").click(function(){
	
	var aimei 		= $('#a_imei').val();
	var amodelo 	= $('#a_modelo').val();
	var acliente 	= $('#a_cliente').val();
	var adetalles 	= $('#a_detalles').val();
	var apass 		= $('#a_password').val();
	var astatus     = $('input:radio[name=a_status]:checked').val();	
	var aconta 		= $('#a_conta').val();
	var afecha 		= $('#a_fecha').val();
	var aemail 		= $('#a_email').val();
	var arecibe 	= $('#a_recibe').val();
	var ammodelo    = $('#a_mmodelo').val();
	//var adonde     = $('input:radio[name=a_donde]:checked').val();	
	var adonde 	=  $('#a_sucurs option:selected').val();
	//document.getElementById('getname').innerHTML=document.getElementById('a_cliente').value;		
	//document.getElementById('getname2').innerHTML=document.getElementById('a_cliente').value;
	//$('#printeando').show();
	var repara  = [];
	   $(':checkbox:checked').each(function(i){
	   		repara[i] = $(this).val();
	   });

	   ////  ESTO es para detectaar que sucursl eligio  y poner la direccion y datos correspondientes, faltan las demas msucursaales //////////
	if (adonde == "Matriz"){
		var adnd = "Llamas Comunicación, S.A. de C.V. Matriz: Bernardo Reyes # 178 RFC: LCO9906169Y0  Teléfono 301-64-64  Hermosillo, Sonora";
		var hora =  "Lun a Vie de 9:00 - 20:00 horas Sábados de 10:00 - 13:00 horas";			
		document.getElementById('hora').innerHTML= hora;
		document.getElementById('adnd').innerHTML= adnd;

	}else if (adonde == "Quiroga"){
		var adnd = "Blvd. Quiroga esquina con Colosio, Local 18, Teléfono 118-94-92  Hermosillo, Sonora ";
		var hora = "Lunes a Viernes de 10:00 - 20:00 horas y Sábados de 10:00 - 18:00 horas";
		document.getElementById('hora').innerHTML= hora;
		document.getElementById('adnd').innerHTML= adnd;

	}else if (adonde == "Dila"){
		var adnd = "Blvd. Morelos #349 Local 6 Hermosillo, Sonora. Teléfono:(662) 211 33 90";
		var hora = "Lunes a Viernes de 9:30 - 20:00 horas y Sábados de 9:30 -20:00 horas";				
		document.getElementById('hora').innerHTML= hora;
		document.getElementById('adnd').innerHTML= adnd;

	}else if (adonde == "Patio"){
		var adnd = "Llamas Comunicación, S.A. de C.V. Matriz: Bernardo Reyes # 178 RFC: LCO9906169Y0  Teléfono 301-64-64 Quiroga: Blvd. Quiroga esquina con Colosio, Local 18, Teléfono 118-94-92  Hermosillo, Sonora Correo electrónico";
		document.getElementById('adnd').innerHTML= adnd;

	}else 	if (adonde == "Progreso"){
		var adnd = "Blvd. Progreso #140-X entre Reyes y Yañez Hermosillo, Sonora. Teléfono: (662) 284 28 04";
		document.getElementById('adnd').innerHTML= adnd;

	}

	/////////////////////////////////////////////////////////////////
	if (!acliente){
		alert('Tienes que proporcionar nombre de cliente');	
		var nohay = 1;
	} else if (!astatus){
	  	 alert('Tienes que elegir tipo de ingreso');

	  }
	  else if (adonde == "sucursal"){
		alert('Tienes que elegir alguna sucursal');
		}else if (!a_modelo){
			alert('Tienes que proporcionar marca de celular');	
		}
	  
	else {
		$.ajax({
			type: "GET",
			url: "ins.php?s_sumito=1&a_imei="+aimei+"&a_cliente="+acliente+"&a_modelo="+amodelo+"&a_status="+astatus+"&a_conta="+aconta+"&a_fecha="+afecha+"&a_email="+aemail+"&a_rep="+repara+"&a_password="+apass+"&a_detalles="+adetalles+"&a_donde="+adonde+"&a_recibe="+arecibe+"&a_mmodelo="+ammodelo,
			dataType: "html",
			success: function(response){
				$('#agregarespuesta').html(response);				
					if(acliente){
					//window.location.href="/mainpage.php";		
					//window.location.href = "/";
						$('#a_modelo').attr("disabled","disabled");
						$('#a_imei').attr("disabled","disabled");
						$('#a_cliente').attr("disabled","disabled");
						$('#a_detalles').attr("disabled","disabled");
						$('#a_password').attr("disabled","disabled");
						$('#a_conta').attr("disabled","disabled");
						$('#a_fecha').attr("disabled","disabled");
						$('#a_email').attr("disabled","disabled");
						$('#a_mmodelo').attr("disabled","disabled");
						$('#a_access').attr("disabled","disabled");
						$('input:radio[name=a_status]:checked').attr("disabled","disabled");						
						$('input:radio[name=a_donde]:checked').attr("disabled","disabled");
						$('#printeando').removeAttr("disabled");
						$('#a_submit').attr("disabled","disabled");

				}else {
					window.location.href="#";
					
				}
			}
		});
	}	

		//$('#impo').show();
		var pcliente2 = $('#a_cliente').val();
			$.ajax({
			type:"GET",
			url:"ins.php?pclient2=1&a_cliente="+pcliente2,
			dataType:"html",
			success:function(response){
				$("#printdiv").html(response); 
				
			},
		});


});
$('#limpia').click(function(){
						$('#a_imei').val('');
						$('#a_imei').removeAttr("disabled");

						$('#a_mmodelo').removeAttr("disabled");
						$('#a_mmodelo').val('');

						$('#a_modelo').removeAttr("disabled");
						$('#a_modelo').val('');

						$('#a_cliente').val('');
						$('#a_cliente').removeAttr("disabled");

						$('#a_detalles').val('');
						$('#a_detalles').removeAttr("disabled");

						$('#a_password').val('');
						$('#a_password').removeAttr("disabled");

						//$('input:radio[name=a_status]:checked').val('');	
						$('#a_status').val('');
						$('#a_conta').val('');						
						$('#a_email').val('');	
						$('#a_access').removeAttr("disabled");
						$('#a_access').val('');		
						$('#a_modelo').val('');	
						$('#printeando').attr("disabled","disabled");
						$('#a_submit').removeAttr("disabled");																					
						$('#a_conta').removeAttr("disabled");
						$('#a_fecha').removeAttr("disabled");
						$('#a_email').removeAttr("disabled");
						$('input:radio[name=a_status]:checked').removeAttr("disabled");

});
///Agrega Usuarios 
$('#u_submit').click(function(){
	var uusuario = $('#u_usuario').val();
	var unombre  = $('#u_nombre').val();
	var upass 	 = $('#u_pass').val();	
	var utipo 	 = $('input:radio[name=u_tipo]:checked').val();
	if(!uusuario || !upass ){
		alert('Para dar de alta a un usuario tiene que tener usuario y password');
	}else{
		$.ajax({
			type: "GET",
			url: "ins.php?agregau=1&u_usuario="+uusuario+"&u_nombre="+unombre+"&u_pass="+upass+"&u_tipo="+utipo,
			dataType: "html",
			success: function(resp){
				 $('#agregauser').html(resp);
			 	
			 	window.location.href="/mainpage.php";
			}
		});
	}
});

////Agregar marca y modelos //////


///Agrega Cliente
$('#c_submit').click(function(){
	var cnombre = $('#c_nombre').val();
	var cemail 	= $('#c_email').val();
	var ccel 	= $('#c_cel').val();
	var ctel 	= $('#c_tel').val();
	var ccol 	= $('#c_col').val();
	var cdom 	= $('#c_dom').val();
	var crfc 	= $('#c_rfc').val();
	var cpostal	= $('#c_postal').val();
	var ccd 	= $('#c_cd').val();

	if (!cnombre || !ctel){
		alert('Para seguir tienes que proporcionar nombre de cliente y/o numero de contacto');		
	} else {
		$.ajax({
			type: "GET",
			url: "ins.php?agregac=1&c_nombre="+cnombre+"&c_email="+cemail+"&c_cel="+ccel+"&c_tel="+ctel+"&c_dom="+cdom+"&c_col="+ccol+"&c_rfc="+crfc+"&c_postal="+cpostal+"&c_cd="+ccd,
			dataType:"html",
			success: function(resp){
				$('#agregacliente').append(resp);
				
			 	//window.location.href="/mainpage.php";
			}
			
		});
	}
});
$('#m_submit').click(function(){
	$.ajax({
		type:"GET",
		url: "ins.php?musuarios=1",
		dataType:"html",
		success: function(resp){
			$('#muestrabla').html(resp);			
		}
	});
});
$('#clientes_submit').click(function(){
	$.ajax({
		type:"GET",
		url: "ins.php?mclientes=1",
		dataType:"html",
		success: function(resp){
			$('#muestrablaclientes').html(resp);
		}
	});
});




$('#eq_submit').click(function(){
	var marca = $('#a_marca').val();
	//var modelo = $('#modelos').val();
	if (!marca){
		alert('Para seguir tienes que proporcionar alguna marca');
	}else {

	$.ajax({
			type:"GET",
			url: "ins.php?eqsubmit=1&a_marca="+marca,
			dataType:"html",
			success: function(resp){
				$('#agregamarcas').html(resp);
			}
		});
		$('#a_marca').val('');
	}
});




$('#mod_submit').click(function(){
	
	var modelo = $('#modelos').val();

	if (!modelo){
		alert('Para seguir tienes que proporcionar algun modelo');
	}else {

		$.ajax({
			type:"GET",
			url: "ins.php?modsubmit=1&modelos="+modelo,
			dataType:"html",
			success: function(resp){
				$('#agregamarcas').html(resp);
			}
		});
		$('#modelos').val('');
	}
});

</script>
</body>
</html>
