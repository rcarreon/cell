
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="js/jquery-ui-1.10.3.custom/css/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="style.css"> 
	<title>  Cell City | Actualiza folio  </title>

</head>
<body>
<?php
include("connection.php");
$uname =$_SESSION['uname'];
//$tipo =$_SESSION['tipouser'];

mysql_select_db("cellcity",$con2);
if(isset($_GET['folio'])){
	$e_folio     = $_GET['folio'];
	$nombree = mysql_real_escape_string($_GET['editcliente']);
	$query1=mysql_query("select folio,modelo,imei,cliente,status,reparacion,detalles,password,fecha,sucursal,recibe,marca,bitacora,tecnico   from dispos where folio='$e_folio'",$con2);
	$query3=mysql_query("select email,telefono,celular,RFC,domicilio,colonia,ciudad,cpostal from cliente where nombre ='$nombree'",$con2);	
	$query2=mysql_fetch_array($query1);
	$query4=mysql_fetch_array($query3);
?>
<div id="update">
			<div style="display:none;">
			  			<label id="pemail"  name="pemail" value="<?php echo $query4[0]; ?>"><?php echo $query4[0]; ?></label>
			  			<label id="pcelular"  name="pcelular" value="<?php echo $query4[2]; ?>"><?php echo $query4[2]; ?></label>
			  			<label id="ptelefono"  name="ptelefono" value="<?php echo $query4[1]; ?>"><?php echo $query4[1]; ?></label>
			  			<label id="prfc"  name="prfc" value="<?php echo $query4[3]; ?>"><?php echo $query4[3]; ?></label>
			  			<label id="pdomicilio"  name="pdomicilio" value="<?php echo $query4[4]; ?>"><?php echo $query4[4]; ?></label>
			  			<label id="pcolonia"  name="pcolonia" value="<?php echo $query4[5]; ?>"><?php echo $query4[5]; ?></label>
			  			<label id="pciudad"  name="pciudad" value="<?php echo $query4[6]; ?>"><?php echo $query4[6]; ?></label>
			  			<label id="pcpostal"  name="pcpostal" value="<?php echo $query4[7]; ?>"><?php echo $query4[7]; ?></label>
			 </div>
	<!-- <a href=logout.php>Salir sesion</a> -->
	<form  method="get" id="update" >		
		<h4> Edita Folio </h4>
		<div style="position:absolute;top:15%;left:15%">
			Folio:
			<div>
				<input type="text" name="editfolio"  disabled="disabled" id="editfolio" value="<?php echo $e_folio ;?>" />
			</div>
			Cliente:
			<div >
				<input  name="editcliente" id="editcliente" disabled="disabled" value="<?php echo $query2[3];?>" />
			</div>
		
		
			Sucursal: <label id="editsucursal"  name="editsucursal" value="<?php echo $query2[9]; ?>"><?php echo $query2[9]; ?></label><br />
		
			Marca:
			<div >
				<input type="text" name="editmodelo"  id="editmodelo" disabled="disabled"  value="<?php echo $query2[1]; ?>" tabindex=1 />
			</div>
			Fecha:
			<div >
				<input class="datte" type="text" name="editfecha" id="editfecha" value="<?php echo $query2[8]; ?>" tabindex=2 />
			</div>
			Imei:
			<div>
				<input type="text" name="editimei"  id="editimei" value="<?php echo $query2[2]; ?>" tabindex=3 />
			</div>
			Contacto:
			<div>
				<input type="text"  disabled="disabled" name="editcontacto" id="editcontacto" value="<?php echo $query4[1]; ?>"/>
			</div>
			<div id="bitacora" style="display: none;" title="Bitacora Folio: <?php echo $e_folio ;?>" > 
					<textarea  type="text" id="editbitacora" name="editbitacora" style="width:350;height:200;text-align:left;" Placeholder="Bitacora" ><?php echo $query2[12];?></textarea>	
					<button class="btn btn-primary bita_guarda" >Guardar</button>
			</div> 
		</div>
			<div class="rcasos"  style="display:none;">				
					<h5 align="center"> Reparacion </h5>					
					<div><input type="checkbox" name="a_rep[]" id="a_rep" value="LCD">LCD 
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Touch">Touch 
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Trackpad">TrackPad</div>
					<div><input type="checkbox" name="a_rep[]" id="a_rep"  value="C.Carga">C. de Carga
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Bocina">Bocina
				    <input type="checkbox" name="a_rep[]" id="a_rep" value="Grantia">Garantia</div>
					<div><input type="checkbox" name="a_rep[]" id="a_rep" value="Mic">Mic
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Bateria">Bateria
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Cristal">Cristal</div>
					<div><input type="checkbox" name="a_rep[]" id="a_rep" value="Flex">Flex
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Camara">Camara
					<input type="checkbox" name="a_rep[]" id="a_rep" value="B.Encendido">Boton Encendido</div>
					<div><input type="checkbox" name="a_rep[]" id="a_rep" value="Portasim">Porta Sim
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Servicio">Servicio
					<input type="checkbox" name="a_rep[]" id="a_rep" value="Software">Software</div>
					<div><input type="checkbox" name="a_rep[]" id="a_rep" value="No hay reparacion">No hay reparacion </div>

					<input type="button" id="lrep"  value="Listo">					
			</div>
			<div style="position:absolute;top:15%;right:15%">
								
					Status:<label ><?php echo $query2[4]; ?></label><br/>
					<div>
						<select id="editstatus" tabindex=4 class="form-control">
							<option selected="selected" disabled="disabled"><?php echo $query2[4]; ?></option>
							<option  value="listo" id="listo"> Listo </option>
							<option  value="listo" id="nohay"> No hay reparacion </option>
							<option  value="Entregado" id="Entregado" > Entregado </option>

						</select>
					</div>	
						Email:<div><input type="text" disabled="disabled"  name="editemail" id="editemail" value="<?php echo $query4[0]; ?>"/></div>
						Modelo:<div><input type="text" name="editmmodelo" id="editmmodelo" value="<?php echo $query2[11]; ?>" tabindex=6 /></div>						
			    		Detalles:<div><textarea type="text"  maxlength="115" name="editdetalles" id="editdetalles" tabindex=5 ><?php echo $query2[6]; ?></textarea></div>
						Contraseña:<div><input type="text" name="editpassword" id="editpassword" value="<?php echo $query2[7]; ?>" tabindex=6 /></div>
						Tecnico:<label><strong><?php echo $query2[13]; ?></strong></label>
						<div>
						<select id="edittecnico" tabindex=8 class="form-control">
							<option selected="selected" disabled="disabled"><?php echo $query2[13]; ?></option>
							<option  value="TecnicoA" id="tecA"> A </option>
							<option  value="TecnicoB" id="tecB"> B </option>
							<option  value="TecnicoC" id="tecC"> C </option>

						</select>
						</div>	

						
					
						<br /><br>		
			</div>
					<br> <br /><br /><br /><br />
				<form>
					<button  type="button" class="btn btn-success bitacora" style="position:relative;top:340px;left:75%;">Bitacora</button>
					<button  style="position:relative;left:-10%;top:340px;"class="btn btn-primary" type="button" id="editaa" tabindex=7 > Guardar cambios </button>
					<button  style="position:relative;top:340px;left:-6%;" class="btn" type="button" id="printeando" onclick="updateoutput()" tabindex=8> Imprimir </button>								
					<a  href="/" >
	   					<button style="position:relative;top:340px;left:-4%;" type="button" id="regresa" class="btn" tabindex=9>Regresar</button>
					</a>		
				</form>
	</form>	



				
				
		<!-- #######################IMPRIMIR################# -->
		<br><br>
	<div id="print" class="print" >	
							<div align="justify" class="doces" style="position:absolute;top:-5%;">
								<label> PRESTACIÓN DE SERVICIOS DE REPARACIÓN Y/O MANTENIMIENTO DE EQUIPOS DE
 								TELEFONÍA CELULAR, O EQUIPOS <br> DE MANEJO DEDATOS E INFORMACIÓN, O EQUIPOS LECTRÓNICOS.</label>
							</div>

			<div style="position:absolute;top:2%;left:-6%;">
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
			<div style="position:absolute;top:2%;right:14%;">
				<table class="printt" id="pfolio">
					<tr>
						<strong><td class="seis" align="center"><strong>Folio</strong>
						<img  src="barcode/barcode.php?text=<?php echo $e_folio ;?>" />
						</td></strong>
					</tr>
					<tr>
						<td class="seis" align="center" id="pfolio1" >

						</td>
					</tr>
				</table>
			</div>

			<div style="position:absolute;top:10%;right:7.7%;" >
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

			<div style="position:absolute;top:2%;right:31%;"   >
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
									
								<font size="1">	Cliente: <label style="width:150px;" id="p_cliente" align="center">  </label>  RFC: <label style="width:150px;" id="p_rfc" align="center">  </label>    Correo electrónico: <label style="width:100px;" align="center" id="p_email"></label>    
									<br>Código postal: <label style="width:100px;" align="center" id="p_cp"></label>	Teléfono  en el que se le pueda localizar:<label style="width:100px;" align="center" id="p_tel"></label> </br>
									Domicilio:<label style="width:200px;" align="left" id="p_dom"></label>      Colonia:<label style="width:100px;" align="left" id="p_col"></label>    Ciudad:<label style="width:100px;" align="center" id="p_cd"></label>

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
									Acesorios Entregados por <label style="width:250px;" id="p_cliente66" align="left" id="p_acces">  </label></br>Fecha de ingreso: <label style="width:250px;" id="fecha2" align="center"> </label> Contraseña <label style="width:150px;" id="p_password" align="center"></label> Recibio: <label align="center"><?php echo $query2[10] ?></label>

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
 									y que por tanto no existe garantía.<br>

									1. En equipo mojado ya que el equipo después de reparado tiene el riesgo de no encender.<br>
									2. En equipo golpeado.<br>
									3. En lectores SIM, ya que por calentamiento de los mismos se pueden dañar.<br>
									4. En display por cambio de cristal.<br>
									5. La Empresa no se hace responsable de datos personales contenidos en el equipo tales como contactos, fotos, notas, etc.<br>
									6. En los casos en los que, previa autorización de <label id="p_cliente62"></label>, se utilicen partes y/o refacciones usadas, o bien, por entrega que él mismo haga, se utilicen refacciones y/o partes nuevas y/o usadas.<br>
									7. Sobre daños que presente el equipo.<br>
									8. En reparaciones realizadas en otros talleres ajenos a La Empresa.<br>
									
								</td>
						    </tr>

							
						</tr>
				</thead>
				</table>
			</div>

			<div style="position:absolute;top:91%;left:-1%;"  >
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
								<th   colspan="3" style="height:30px;" ><label style="position:absolute;top:57%;right:15%;"align="right"><font size="2">Subtotal</font></label><br>
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
			<div style="position:absolute;top:131%;right:3%; width:700px;" align="justify"  >

				
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

			<div style="position:absolute;top:156%;right:3%; width:700px;"  >

				
					<font size="1" >Autorización que otorga <label id="p_cliente58" class="onces"></label> para el uso de la información con fines mercadológicos o publicitarios
					<label id="p_cliente57"></label> Sí (   )  No (   ) acepta que Llamas Comunicación, S.A. de C.V., utilice con fines mercadológicos o publicitarios o bien, que ceda
					o transmita a terceros, con los mimos fines, la información proporcionada por él mismo con motivo de este contrato.<br><br><br>

														 <label style="padding-left:20em"> _______________________________________________</label><br>
														 <label style="padding-left:22em"><label id="p_cliente56"></label> (firma de autorización)</label>
					<br>
					
					
					</font>


			</div>

				

			
			<!-- <img id="logo" src="images/logo_2015.jpg" alt="Cell City logo" height="110" width="350" style="position:relative;left:35px;">	
			Original			
				<table class="printt" style="width:35em;height:5em;">				
					<tr>
						<td class="uno" ><strong>Cliente</strong></td>
						<td class="dos" id="cliente" name="cliente"></td>
					</tr>
					<tr>
						<strong><td class="uno"  ><strong>Equipo</strong></td></strong>
						<td class="dos" id="equipo"  > </td>
					</tr>
					<tr>
						<strong><td class="uno"  ><strong>Imei</strong></td></strong>
						<td class="dos" id="imei" ></td>
					</tr>
				
				</table>
				<br>				
				<div style="position:relative;left:15%;">
					<input type="checkbox"> SIM </input>
					<input type="checkbox"> Bateria</input>
					<input type="checkbox"> Tapa</input>
					<input type="checkbox"> Memoria </input>
				</div>				
				<table class="printt" id="pfolio">
					<tr>
						<strong><td class="uno" align="center"><strong>Folio</strong></td></strong>
					</tr>
					<tr>
						<td class="uno" align="center" id="pfolio1" >

						</td>
					</tr>
				</table>
				<br>
				<table class="printt" id="pfolio">
					<tr>
						<strong><td class="uno" align="center"><strong>Fecha</strong></td></strong>
					</tr>
					<tr>
						<td class="uno" id="fecha"></td>
					</tr>
				</table>									
				<table class="printt" style="width:35em;height:5em;bottom:10%;">
					<thead>
						<tr>
							<th>DETALLES DE SERVICIO TECNICO</th>
						</tr>
						<tr>
							<td>La contraseña es <label id="contra"></label></td>
						</tr>
						<tr>
							<td rowspan="4" class="uno" id="detalles" ></td>
						</tr>
					</thead>																
				</table>
				<p class="alinea"><strong><font size="3em;">EN CAMBIO DE CRISTAL EL CLIENTE ACEPTA EL RIESGO DE DANO DE PANTALLA</font></strong></p>	
				<div style="width:750px;" class="alinea">
					<p id="politicas" align="justify"><font size="2em;">Politicas: 1.Debe de presentar este comprobante para que se le haga entrrega del equipo.2.Despues de 15 dias no nos hacemos
				responsables de su equipo.3.Si no recoge su equipo en 30 dias,pasa a ser propiedad de Cell City.4. No se hacen garantias en equipos golpeados
				o mojados.5. No nos hacemos responsables de la perdida parcial o total de la informacion en su equipo. NO NOS HACEMOS RESPONSABLES EN CASO DE
				ROBO O INCENDIO.</font></p>
				</div>
				<div style="position:relative;bottom:35%;left:78%;">Patron:
					<img src="images/cuadritocellcity2.jpg" width="120" height="120">
				</div>
								
								<div style="position:relative;left:5%;bottom:7%;">
									<p > ________________________________  <br/>                   
									Recibio: <?php echo $uname ?></p>
								</div>
								<div style="position:relative;left:55%;bottom:14%;">
								<p > ________________________________  <br/>                   
									Aceptacion de Cliente:<label id="getname"></label></p>
								</div>
										<strong><hr style="position:absolute;top:670px;"></strong>
								<p>

				

				<div style="position:relative;bottom:20%;padding-left:20em;" class="prnt">
					<button id="imp" TYPE="button" onClick="printArea('print');" >Imprimir
					<button type="regresa" id="cancelar">Cancelar
				</div> -->

							
	</div>


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
		<br><br><br><br><br>
		<div id="segundo" style="display:none;">	

			<label>Copia al Cliente</label>		
				
				<img id="logo" src="images/logo_2015.jpg" alt="Cell City logo" height="140" width="350" >		

				<table class="printt" style="width:35em;height:5em;">

					<tr>
						<td class="uno" ><strong>Cliente</strong></td>
						<td class="dos" id="cliente2" ><font style="font-size:10em;" name="cliente"></font></td>
					</tr>
						<td class="uno" ><strong>Equipo</strong></td>
						<td class="dos" id="equipo2"  > </td>
					</tr>
						<td class="uno"  ><strong>Imei</strong></td>
						<td class="dos" id="imei2" ></td>
					</tr>				
				</table>
				<br>				
				<div style="position:relative;left:15%;">
					<input type="checkbox"> SIM </input>
					<input type="checkbox"> Bateria</input>
					<input type="checkbox"> Tapa</input>
					<input type="checkbox"> Memoria </input>
				</div>
				<div style="position:absolute;top:105%;left:80%">
				<table class="printt" id="pfolio">
					<tr>
						<td class="uno" align="center"><strong>Folio</strong></td>
					</tr>
					<tr>
						<td class="uno" align="center" id="pfolio2" >
						</td>
					</tr>
				</table>
				<br>
				<table class="printt" id="pfolio">
					<tr>
						<td class="uno" align="center"><strong>Fecha</strong></td>
					</tr>
					<tr>
						<td class="uno" id="fecha2"></td>
					</tr>
				</table><br><br><br>
				<img src="images/cuadritocellcity2.jpg" width="120" height="120">
				</div>				
				<div style="position:relative;top:-1%;">					
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
						<br />															
					</table>
				</div><br><br><br><br>
				<p class="alinea"><strong><font size="3em;">EN CAMBIO DE CRISTAL EL CLIENTE ACEPTA EL RIESGO DE DANO DE PANTALLA</font></strong></p>	
				<div style="width:750px;" class="alinea">
					<p id="politicas" align="justify"><font size="2em;">Politicas: 1.Debe de presentar este comprobante para que se le haga entrrega del equipo.2.Despues de 15 dias no nos hacemos
				responsables de su equipo.3.Si no recoge su equipo en 30 dias,pasa a ser propiedad de Cell City.4. No se hacen garantias en equipos golpeados
				o mojados.5. No nos hacemos responsables de la perdida parcial o total de la informacion en su equipo. NO NOS HACEMOS RESPONSABLES EN CASO DE
				ROBO O INCENDIO.</font></p>
				</div>				
				<br><br><br>
								
								<div style="position:relative;left:5%;">
									<p > ________________________________  <br/>                   
									Recibio: <?php echo $query2[10];?></p>
								</div>
								
								<div style="position:relative;left:55%;bottom:11%;">
								<p > ________________________________  <br/>                   
									Aceptacion de Cliente: <?php echo $query2[3];?> </p>
								</div>
								
				
				
				<div style="position:relative;bottom:20%;padding-left:20em;">
					<button id="imp" TYPE="button" onClick="printArea('print');" >Imprimir
					<button type="regresa" id="cancelar">Cancelar
				</div>
			</div>		-->
			<!-- #######################IMPRIMIR################# -->	

</div>

<p id="editaste"></p>
<?php 
}
mysql_close($con2);
?>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
function goBack() {
    window.history.back()
}
$(document).ready(function() {
	$(".datte").datepicker({dateFormat: "yy-mm-dd"});
});
$(function(){
	$('.rcasos').draggable();
});

$('#editstatus').change(function(){
	$('.rcasos').show();
	alert('Si quieres cambiar de status sin que las reparaciones sufran cambios , no marques nada y haz click en listo para cerrar el dialogo, despues guarda los cambios');
});
$('#editstatus').change(function(){
			$('.rcasos').show();
});
$(document).ready(function(){
		$('#lrep').click(function(){
			$('.rcasos').hide();
		});
});

$(".bitacora").click(function(){
		var width = (screen.width - 700) / 2;
		$('#bitacora').dialog({
			modal: true,
			width: 400,
			height:300,
            position: [width, 75],
            resizable: true,

        });
});
////////////////////////IMPRIMIR/////////////////////////////////////////////
////ESTA FUNCION ES PARA MANDAR LOS VALORES QUE ESTAN EN EL DIV DE UPDATE PARA EL DIV DE PRINT /////////////
function 	updateoutput(){
			//document.getElementById('detalles').innerHTML=document.getElementById('editdetalles').value;
			//document.getElementById('imei').innerHTML=document.getElementById('editimei').value;
			//document.getElementById('equipo').innerHTML=document.getElementById('editmodelo').value;

			var adonde 	=  document.getElementById('editsucursal').getAttribute("value");
			if (adonde == "Matriz"){
				var adnd = "Llamas Comunicación, S.A. de C.V. Matriz: Bernardo Reyes # 178 RFC: LCO9906169Y0, Hermosillo, Sonora, Tel. 301-64-64";
				var hora =  "Lun a Vie de 9:00 - 18:00 horas Sábados de 09:00 - 14:00 horas";			
				document.getElementById('hora').innerHTML= hora;
				document.getElementById('adnd').innerHTML= adnd;

			}else if (adonde == "Quiroga"){
				var adnd = "Blvd. Quiroga esquina con Colosio, Local 18,Hermosillo, Sonora ,  Tel. 118-94-92   ";
				var hora = "Lunes a Viernes de 10:00 - 20:00 horas y Sábados de 10:00 - 18:00 horas";
				document.getElementById('hora').innerHTML= hora;
				document.getElementById('adnd').innerHTML= adnd;

			}else if (adonde == "Dila"){
				var adnd = "Blvd. Morelos #349 Local 6 Hermosillo, Sonora. Tel. (662) 211 33 90";
				var hora = "Lunes a Viernes de 9:00 - 20:00 horas y Sábados de 10:00 - 18:00 horas";				
				document.getElementById('hora').innerHTML= hora;
				document.getElementById('adnd').innerHTML= adnd;

			}else 	if (adonde == "Monteverde"){
				var adnd = "Veracruz #270, Local 13, Hermosillo, Sonora. Tel. (662) 210 70 75";
				var hora = "Lunes a Viernes  09:00 - 19:00 horas Sabados de 9:00 - 17:00 horas";
				document.getElementById('hora').innerHTML= hora;
				document.getElementById('adnd').innerHTML= adnd;

			}else 	if (adonde == "P.Maria"){
				var adnd = "Blvd. Camino del Seri #331, Local 331-B., Hermosillo, Sonora, Celular: (6622)-20 31 41";
				var hora = "Lunes a Viernes  09:00 - 19:00 horas Sabados de 9:00 - 14:00 horas";
				document.getElementById('hora').innerHTML= hora;
				document.getElementById('adnd').innerHTML= adnd;

			}else 	if (adonde == "PaseoSoli"){
				var adnd = "Blvd. Solidaridad No. 65 esquina con Avenida Camelia. Col. Libertad, Local LA026, Celular: (6624)-21 55 24";
				var hora = "Lunes a Domingo   10:00 - 20:00 horas";
				document.getElementById('hora').innerHTML= hora;
				document.getElementById('adnd').innerHTML= adnd;
			}
			else 	if (adonde == "LasFuentes"){
				var adnd = "Olivos #6 esq con Olivares, Local 6-B, Col. Las Fuenes del Mezquital, Celular: (6623) 94-21-33";
				var hora = "Lunes a Domingo   10:00 - 20:30 horas";
				document.getElementById('hora').innerHTML= hora;
				document.getElementById('adnd').innerHTML= adnd;

			}



			document.getElementById('pfolio1').innerHTML=document.getElementById('editfolio').getAttribute("value");	
			document.getElementById('p_password').innerHTML=document.getElementById('editpassword').getAttribute("value");	
			document.getElementById('p_cliente').innerHTML=document.getElementById('editcliente').value;			
			document.getElementById('p_cliente56').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente57').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente58').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente59').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente60').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente61').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente62').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente63').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente64').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente65').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente66').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('fecha').innerHTML=document.getElementById('editfecha').value; 
			document.getElementById('p_detalles').innerHTML=document.getElementById('editdetalles').value; 
			document.getElementById('fecha2').innerHTML=document.getElementById('editfecha').value;	
			document.getElementById('p_marca').innerHTML=document.getElementById('editmodelo').value;
			document.getElementById('p_modelo').innerHTML=document.getElementById('editmmodelo').value;
			document.getElementById('p_imei').innerHTML=document.getElementById('editimei').value;			
			document.getElementById('p_cp').innerHTML=document.getElementById('pcpostal').getAttribute("value");
			document.getElementById('p_cd').innerHTML=document.getElementById('pciudad').getAttribute("value");
			document.getElementById('p_col').innerHTML=document.getElementById('pcolonia').getAttribute("value");
			document.getElementById('p_dom').innerHTML=document.getElementById('pdomicilio').getAttribute("value");
			document.getElementById('p_rfc').innerHTML=document.getElementById('prfc').getAttribute("value");
			document.getElementById('p_tel').innerHTML =document.getElementById('ptelefono').getAttribute("value");
			document.getElementById('p_email').innerHTML=document.getElementById('pemail').getAttribute("value");
			
}
////ESTA FUNCION ES PARA MANDAR A IMPRIMIR NADA MAS EL DIV QUE SE QUIERE ///////////



function printArea(areaName){
        var printContents = document.getElementById('print').innerHTML; 
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML= "";
        location.reload();        
}  



 
$(document).ready(function(){
		$('#lrep').click(function(){
			$('#imprime').hide();
		});
});
/*$('#printeando').click(function(){
		$('.print').show();
		$('#regresa').show();

});
*/
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
		/*var pcliente = $('#editcliente').val();
		$.ajax({
			type:"GET",
			url:"ins.php?pclient=1&editcliente="+pcliente,
			dataType:"html",
			success:function(response){
				$("#pfolio1").html(response); 
				$("#pfolio2").html(response); 
			},
		});			*/

});

$('#cancelar').click(function(){
		$('.print').hide();
		$('.prnt').dialog("close");
});

$('.bita_guarda').click(function(){
		$('#bitacora').dialog('close');
		

		
});
$(function() {
    $( ".print" ).draggable();
});
////////////////////////////////////////////////////////////////////////////
$("#editaa").click(function(){
	//var eimei		= $('#editimei').val(obj[0].editimei);
	var eimei		= $('#editimei').val();
	var emodelo 	= $('#editmodelo').val();
	var ecliente	= $('#editcliente').val();	
	var econta		= $('#editcontacto').val();
	var efecha		= $('#editfecha').val();
	var eemail		= $('#editemail').val();
	var efolio		= $('#editfolio').val();
	var epass 		= $('#editpassword').val()
	var edetalles   = $('#editdetalles').val();
	var emmodelo	= $('#editmmodelo').val();
	var ebitacora   = $('#editbitacora').val();
	var etecnico    = $('#edittecnico option:selected').val();
	var estatus = $('#editstatus option:selected').val();
	var repara  = [];
	   $(':checkbox:checked').each(function(i){
	   		repara[i] = $(this).val();
	   });
	$.ajax({
	type:"GET",
		url:"ins.php?eeditas=1&editimei="+eimei+"&editcliente="+ecliente+"&editmodelo="+emodelo+"&editstatus="+estatus+"&editcontacto="+econta+"&editfecha="+efecha+"&editemail="+eemail+"&editfolio="+efolio+"&editpassword="+epass+"&editdetalles="+edetalles+"&editrepara="+repara+"&editmmodelo="+emmodelo+"&editbitacora="+ebitacora+"&edittecnico="+etecnico,
		success: function(response){
			$('#editaste').html(response);
			alert('Contacto modificado con exito');
			//window.location="/";
		},
	});

	//var pcliente2 = $('#editcliente').val();
	//		$.ajax({
	//		type:"GET",
	//		url:"ins.php?pclient2=1&a_cliente="+pcliente2,
	//		dataType:"html",
	//		success:function(response){
	//			$("#printdiv").html(response); 
	//			
	//		},
	//	});
});
</script>
</body>
</html>


