
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
//$uname =$_SESSION['uname'];
//$tipo =$_SESSION['tipouser'];

mysql_select_db("cellcity",$con2);
if(isset($_GET['folio'])){
	$e_folio     = $_GET['folio'];
	$nombree = mysql_real_escape_string($_GET['editcliente']);
	$query1=mysql_query("select folio,modelo,imei,cliente,status,reparacion,detalles,password,fecha,sucursal,recibe,marca  from dispos where folio='$e_folio'",$con2);
	$query3=mysql_query("select email,telefono from cliente where nombre ='$nombree'",$con2);	
	$query2=mysql_fetch_array($query1);
	$query4=mysql_fetch_array($query3);
?>
<div id="update">
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
				<input type="text" name="editmodelo"  id="editmodelo" value="<?php echo $query2[1]; ?>" tabindex=1 />
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
						
					
						<br /><br>		
			</div>
					<br> <br /><br /><br /><br />
		
				<button  style="position:relative;left:27%;top:340px;"class="btn btn-primary" type="button" id="editaa" tabindex=7 > Guardar cambios </button>
				<button  style="position:relative;left:29%;top:340px;"  type="button" id="printeando" onclick="updateoutput()" tabindex=8> Imprimir </button>								
				<a  href="/" >
   					<button style="position:relative;left:35%;top:340px;" type="button" id="regresa" tabindex=9>Regresar</button>
				</a>		
			
	</form>	

				
				
		<!-- #######################IMPRIMIR################# -->
		<br><br>
	<div id="print" class="print" >	
							<div align="justify">
								<label> PRESTACIÓN DE SERVICIOS DE REPARACIÓN Y/O MANTENIMIENTO DE EQUIPOS DE<br>
 								TELEFONÍA CELULAR, O EQUIPOS DE MANEJO DE DATOS E INFORMACIÓN, O EQUIPOS <br>ELECTRÓNICOS</label>
							</div>

			<div style="position:absolute;top:13%;left:-6%;">
				<table class="printt" >
					
					<tr>
						<td class="uno" align="center"  >
							<img  style="position:absolute;top:5%;left:1%;" src="images/ccitylogo.png" width="80" height="60">		
							<div style="padding-left:10em" id="adnd"></div> 

						</td>
					</tr>
				</table>
			</div>

			<div style="position:absolute;top:26%;left:-5%;">
				<table class="printt" >
					
					<tr>
						<td class ="tres" align="center"  >
							<font size="1"><strong>Horario de atención al público </strong><br>
							Lun a Vie de 9 a 20 horas <br>
							Sábados de 10 a 13 horas </font>

						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:26%;right:60.1%;">
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
			<div style="position:absolute;top:13%;right:14.5%;">
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

			<div style="position:absolute;top:19%;right:7.5%;" >
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

			<div style="position:absolute;top:13%;right:31%;"   >
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
			<div style="position:absolute;top:40%;right:3%;"    >
				<table class="printto" >					
					<tr>
						
							
							<tr>
								<td class="ocho" align="left"  >  
									
								<font size="1">	Cliente: <label style="width:150px;" id="p_cliente" align="center">  </label>  RFC: <label style="width:150px;" id="p_rfc" align="center">  </label>    Domicilio:<label style="width:100px;" align="center" id="p_dom"></label>      Colonia:<label style="width:100px;" align="center" id="p_col"></label>    Ciudad:<label style="width:100px;" align="center" id="p_cd"></label>    
									Código postal: <label style="width:100px;" align="center" id="p_cp"></label>	Teléfono  en el que se le pueda localizar:<label style="width:100px;" align="center" id="p_tel"></label> </br>
									Correo electrónico: <label style="width:100px;" align="center" id="p_email"></label>

						    </tr>

						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:50%;right:3%;"   >
				<table class="printto" >					
					<tr>
						
							
							<tr>
								<td class="ocho" align="left"  >  
									<strong>Equipo</strong><br>
									Marca: <label style="width:100px;"  align="center" id="p_marca">  </label>  Modelo: <label style="width:100px;" align="center" id="p_modelo">  </label>    IMEI: <label style="width:100px;" align="center" id="p_imei">  </label> Otros:<label style="width:100px;" align="center" id="p_otros">  </label> </br>
									Acesorios Entregados por <label style="width:250px;" id="cliente2" align="left" id="p_acces">  </label></br>Fecha de ingreso: <label style="width:250px;" id="fecha2" align="center"> </label> Fecha de entrega : <label style="width:150px;" id="fechaentre" align="center"></label>

						    </tr>

						</td>
					</tr>
				</table>
			</div>
			<div style="position:absolute;top:60%;right:3%;"  >
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

			<div style="position:absolute;top:101%;left:0%;"  >
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
			<div style="position:absolute;top:144%;right:2%; width:700px;" align="justify"  >

				
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

			<div style="position:absolute;top:171%;right:2%; width:700px;"  >

				
					<font size="1" >Autorización que otorga <label id="p_cliente58" class="onces"></label> para el uso de la información con fines mercadológicos o publicitarios
					<label id="p_cliente57"></label> Sí (   )  No (   ) acepta que Llamas Comunicación, S.A. de C.V., utilice con fines mercadológicos o publicitarios o bien, que ceda
					o transmita a terceros, con los mimos fines, la información proporcionada por él mismo con motivo de este contrato.<br><br>

														 <label style="padding-left:20em"> _______________________________________________</label><br>
														 <label style="padding-left:22em"><label id="p_cliente56"></label> (firma de autorización)</label>
					<br>
					
					
					</font>


			</div>

				<div style="position:absolute;top:187%;left:-9%;"  >
				<table  >		
								
						<tr>
						   
							<tr> 
								<td  align="left" class="once" style="postition:absolute;top:15%;"> 
									Además de los datos contenidos en el Anverso del presente Contrato de<br> prestación de servicios de reparación y/o mantenimiento de equipos de<br> telefonía celular, o equipos de manejo de datos e información, o equipos electrónicos, las partes se sujetan a las siguientes:
CLÁUSULAS 

PRIMERA: Las partes del presente contrato son, por una parte la empresa Llamas Comunicación, S.A. de C.V., en su carácter de prestadora del servicio y a quien en lo sucesivo en este contrato también se le podrá denominar como La Empresa, y por otra parte el solicitante del servicio de la reparación y/o mantenimiento del equipo señalado en el anverso en este contrato, misma persona a quien en el presente contrato se le denominará como <label id="p_cliente55"></label>, y de quien se tienen sus datos asimismo en el anverso.

SEGUNDA: Este contrato tiene como objeto la prestación de servicios de reparación y/o mantenimiento de equipos de telefonía celular, o equipos de manejo de datos e información, o equipos electrónicos.

TERCERA: El precio total de los servicios contratados se establece en el presupuesto que forma parte del presente contrato y se describe en el anverso del mismo, el cual será pagado por <label id="p_cliente54"></label> de la siguiente forma: al momento de celebrar el presente contrato por concepto de anticipo, la cantidad que se indica en el anverso del mismo y el resto en la fecha de entrega del equipo.

CUARTA: <label id="p_cliente53"></label> deberá: I.- Proporcionar sus datos personales de identificación, domicilio y demás requeridos conforme al anverso de este contrato; II.- Revisar y verificar cuidadosamente los datos asentados en el anverso de este contrato; III.- Dejar, de ser necesario, los accesorios del equipo materia de este contrato, que se requieran para el servicio de reparación y/o mantenimiento del equipo, en cuyo caso deberá asegurarse que La Empresa haga constar este hecho en el anverso del presente contrato; IV.- A proporcionar su clave electrónica personal de acceso al equipo; V.- Asegurarse de que la descripción de la falla o fallas reportadas en el anverso de este contrato sean las que desea se reparen; VI.- Hacer del conocimiento de La Empresa los daños que presente el equipo; VII.- Recoger el equipo en la fecha convenida; VIII.- Pagar por concepto de almacenaje, después de transcurridos treinta días del pactado para su entrega, el 1% (uno por ciento), sobre el valor del servicio por cada día que transcurra sin que recoja el equipo. El almacenaje no excederá de treinta días. En caso de que transcurran los treinta días de almacenaje sin que <label id="p_cliente52"></label> recoja el equipo, este último acepta la transmisión de la propiedad del equipo a La Empresa, la que podrá disponer del equipo materia de este contrato; IX.- Verificar al momento de recoger el equipo, y en su caso los accesorios que entregó a La Empresa, que son los mismos que se le están entregando a él mismo; X.- Verificar que el servicio fue satisfactorio; XI.- Verificar exhaustivamente el funcionamiento del equipo al momento de recibirlo y frente al personal de La Empresa, y muy particularmente las reparaciones y/o el mantenimiento realizado respecto al servicio solicitado por el propio <label id="p_cliente51"></label> y en referencia a las fallas informadas por él mismo; XII.- Pagar en el establecimiento de La Empresa el precio convenido, de contado y en moneda nacional, salvo que La Empresa acepte otros tipos de pago y de moneda; XIII.- En el caso de que <label id="p_cliente50"></label> no acepte dejar el equipo para su reparación y/o mantenimiento no existirá cobro de revisión y diagnóstico; XIV.- En caso de pérdida de la orden de servicio exhibir una identificación oficial vigente y hacer una descripción del equipo; XV .- Entregar las partes y/o refacciones, para el caso de que La Empresa apruebe que <label id="p_cliente49"></label> pueda suministrar partes y/o refacciones, necesarios para la reparación y/o mantenimiento del equipo, según se haya indicado en el anverso del presente contrato; XVI.- A recoger el equipo en las instalaciones de La Empresa donde lo entregó para su reparación y/o mantenimiento.

QUINTA: La Empresa se obliga a: I.- Realizar adecuadamente las composturas establecidas en el anverso de este contrato conforme a los términos y condiciones contratados, los cuales deben corresponder a la información o publicidad proporcionada o difundida; II.- Entregar a <label id="p_cliente48"></label> un presupuesto por escrito al momento de contratar el servicio, para lo cual, en caso de no ser aceptado, La Empresa deberá devolver el equipo en las mismas condiciones que le fue entregado para su revisión y diagnóstico, salvo que técnicamente no sea posible; III.- Revisar el estado general del equipo, haciendo notar a <label id="p_cliente47"></label> cualquier daño o desperfecto que tenga el equipo al momento en que <label id="p_cliente46"></label> lo presente a La Empresa; IV.- Responder por las descomposturas, daños, pérdidas parciales o totales, imputables a La Empresa o a sus empleados, que sufra el equipo y sus accesorios que <label id="p_cliente45"></label> haya entregado al momento de su recepción, mientras se encuentren bajo responsabilidad de La Empresa para llevar a cabo la reparación y/o mantenimiento solicitado, así como para hacer efectiva la garantía otorgada; V.- Utilizar en el servicio solicitado partes y/o refacciones nuevas y apropiadas al modelo y marca del equipo, salvo que <label id="p_cliente44"></label> autorice utilizar otras, misma autorización que podrá ser vía telefónica o por correo electrónico, y lo cual asimismo podrá hacerse constar en el anverso del presente contrato. En todos los casos las partes y/o refacciones deben cumplir con las Normas aplicables; VI.- Entregar el equipo el día pactado, salvo causas de fuerza mayor; VII.- Recibir las reclamaciones de <label id="p_cliente43"></label> en su establecimiento; VIII.- Notificar, en su caso, por escrito o por correo electrónico a <label id="p_cliente42"></label> la variación del presupuesto aprobado; IX.- Expedir el comprobante de pago por los trabajos efectuados especificando los precios de mano de obra, partes y/o refacciones, otros materiales empleados y/o por servicios o conceptos adicionales; X.- Entregar a <label id="p_cliente41"></label> las piezas sustituidas por la reparación y/o mantenimiento, previa firma de recibido, salvo que no sea posible por el deterioro, roturas o desintegración en fragmentos, de dichas piezas; así como también entregar a <label id="p_cliente40"></label> los accesorios correspondientes, también previa firma de recibido; XI.- A devolver a <label id="p_cliente39"></label> el equipo en el caso de que solo se haya realizado la revisión y el diagnóstico, cuando el equipo no haya entrado a reparación y/o mantenimiento; XII.- No condicionar la prestación de los servicios de reparación y/o mantenimiento del equipo, a la adquisición o renta de otros productos o servicios en el establecimiento o en otro taller predeterminado; XIII.- Responsabilizarse ante <label id="p_cliente38"></label> por el incumplimiento de los servicios contratados, aún cuando La Empresa subcontrate con terceros dicha prestación de servicios. 

SEXTA: Los incrementos que resulten durante la prestación del servicio por costos no previsibles en rubros específicos que su cotización este fuera del control de La Empresa, deberán ser autorizados por <label id="p_cliente37"></label> en forma escrita o por correo electrónico, siempre y cuando éstos excedan del 10% (diez por ciento) del presupuesto; si el incremento citado es inferior, <label id="p_cliente36"></label> lo podrá autorizar telefónicamente. El tiempo que tendrá <label id="p_cliente35"></label> para autorizar la variación del presupuesto será de cinco días hábiles contados a partir de que La Empresa le dé aviso de dicha variación;en caso de haber transcurrido dicho término sin que <label id="p_cliente34"></label> haya dado respuesta al aviso de variación del presupuesto, éste se tendrá por no autorizado y por terminado el presente contrato, debiendo <label id="p_cliente33"></label> recoger su equipo dentro de los cinco días hábiles siguientes, en caso contrario, pagará el costo por almacenaje que se establece en la Cláusula Cuarta del presente contrato, operando aquí lo establecido en el punto VIII.- (octavo),  de la referida Cláusula Cuarta. Si <label id="p_cliente32"></label> autoriza la variación del presupuesto, la fecha de entrega del equipo se modificará en la misma proporción.</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
									
									
								</td><br>
								<td  align="left" class="once" >  							   
SÉPTIMA: En caso de que en el desarrollo de la reparación y/o mantenimiento La Empresa detecte alguna falla o desperfecto que no se haya contemplado en el presupuesto, deberá hacerlo del conocimiento de <label id="p_cliente31"></label> en los términos que se indican en la cláusula que antecede y en relación, en su caso, a los incrementos del precio, con la finalidad de que éste autorice la reparación de dicha falla o desperfecto. Para lo cual <label id="p_cliente30"></label> tendrá el mismo plazo que se establece en la Cláusula inmediata anterior a ésta, para realizar la autorización. Transcurrido dicho término sin que <label id="p_cliente29"></label> dé cumplimiento a lo aquí estipulado y la falla encontrada impida a La Empresa realizar la reparación y/o mantenimiento del equipo conforme a lo pactado. con <label id="p_cliente28"></label>, el presente contrato se dará por terminado, debiendo <label id="p_cliente27"></label> recoger su equipo en el mismo plazo que se indica en la Cláusula inmediata anterior a esta, y pagar a La Empresa la cantidad que corresponda a las reparaciones y/o mantenimiento ya efectuados conforme al presupuesto o, en caso de no haberse hecho ninguna, y que <label id="p_cliente26"></label> no acuda a recoger el equipo, operará aquí lo establecido en el punto VIII.- (octavo), de la referida Cláusula Cuarta. En caso de que <label id="p_cliente25"></label> autorice la nueva reparación, la fecha de entrega del equipo se modificará en la misma proporción. 

OCTAVA: En el caso de que por razones técnicas no se pueda elaborar el  presupuesto al momento de que <label id="p_cliente24"></label> entregue su equipo para reparación y/o mantenimiento, <label id="p_cliente23"></label> acepta que se le informe el respectivo presupuesto por correo electrónico, mismo que <label id="p_cliente22"></label> deberá autorizar informando a La Empresa por ese mismo medio de comunicación; o en su defecto, <label id="p_cliente21"></label> se compromete a acudir personalmente a la empresa para autorizar y recibir por escrito el correspondiente presupuesto; todo lo indicado en esta Cláusula para que se puedan iniciar los trabajos de la reparación y/o mantenimiento. Para el caso de que <label id="p_cliente20"></label> no responda el correo electrónico aquí indicado y enviado por La Empresa, o bien no acuda personalmente como aquí se ha mencionado, operará lo señalado en la Cláusula Sexta en lo relativo a plazos, almacenaje y sus consecuencias.  

NOVENA: Las reparaciones y/o mantenimiento objeto del presente contrato, tienen una garantía de sesenta días contados a partir de la fecha de entrega del equipo ya reparado, por lo que en el caso de que el equipo entre por garantía a La Empresa, no se computará dentro de dicho plazo el tiempo que dure la reparación del equipo. La garantía se hará efectiva siempre y cuando no se manifieste mal uso, negligencia o descuido en la operación del equipo; y al igual, la garantía no ampara fallas distintas a las especificadas en el anverso de este contrato o a las autorizadas por <label id="p_cliente19"></label> en los términos del presente contrato, por lo que, quedará sin efecto si el equipo es intervenido por un tercero que no esté autorizado por La Empresa. Asimismo, no existirá garantía para fallas que presente el equipo y que no hayan sido materia de reparación y/o mantenimiento por parte de La Empresa. Para hacer efectiva la garantía <label id="p_cliente18"></label> deberá presentar el correspondiente comprobante y el equipo materia del contrato en el establecimiento de La Empresa. Las reparaciones efectuadas en cumplimiento de la garantía, serán sin cargo alguno para <label id="p_cliente17"></label> y amparan la mano de obra y refacciones que se hayan utilizado en el servicio solicitado; salvo que <label id="p_cliente16"></label> haya autorizado por escrito o por correo electrónico a La Empresa a utilizar otro tipo de partes y/o refacciones o bien, que <label id="p_cliente15"></label>, únicamente con aprobación previa de La Empresa, haya entregado partes y/o refacciones para la reparación y/o mantenimiento del equipo, por lo que en estos dos últimos casos únicamente se garantizará la mano de obra. <label id="p_cliente14"></label> podrá presentar cualquier queja o reclamación relacionada con el servicio en el domicilio de La Empresa donde entregó su equipo, y en el horario que se detalla en el anverso de este contrato.

DÉCIMA: <label id="p_cliente13"></label> acepta que por razones técnicas y por los riesgos que se puedan presentar en el desarrollo de la revisión o en la reparación y/o mantenimiento del equipo, no existe garantía en los siguientes casos: 1.- En equipo mojado ya que el equipo después de reparado tiene el riesgo de no encender; 2.- En equipo golpeado; 3.- En lectores SIM, ya que por calentamiento dichos componentes se pueden dañar; 4.- En display por cambio de cristal; 5.- La Empresa no se hace responsable de datos personales contenidos en el equipo tales como contactos, fotos, notas, etc.; 6.- En los casos en los que <label id="p_cliente12"></label>, previa autorización por escrito o por correo electrónico que haga el mismo, haya autorizado el uso de partes y/o refacciones usadas, o por la entrega que el mismo realice, previa aprobación de La Empresa, de partes y/o refacciones nuevas y/o usadas, no existirá garantía en las partes y/o refacciones mencionadas en este punto; 7.- Sobre daños que presente el equipo al momento de que <label id="p_cliente11"></label> haya solicitado la revisión y diagnóstico; 8.- En reparaciones realizadas en otros talleres ajenos a La Empresa. 

DÉCIMA PRIMERA: La Empresa hará entrega de las partes y/o refacciones que reemplace por el servicio de reparación y/o mantenimiento, al momento de la entrega del equipo a <label id="p_cliente10"></label>, salvo que: a) <label id="p_cliente9"></label> exprese lo contrario; b) las partes y/o refacciones u otros materiales sean cambiados en uso de garantía.

DÉCIMA SEGUNDA: La Empresa al momento de entregar el equipo deberá, en presencia de <label id="p_cliente8"></label>, realizar todas aquellas pruebas de funcionamiento necesarias con la finalidad de que <label id="p_cliente7"></label> verifique que el equipo se le entrega en óptimas condiciones de acuerdo al servicio contratado. 

DÉCIMA TERCERA: Son causas de rescisión del presente contrato: I.- Que La Empresa no cumpla con la fecha de entrega por causas imputables a ella misma, salvo que por la inexistencia de partes y/o refacciones en los inventarios de La Empresa no se cuente con las necesarias al momento de estarse desarrollando la reparación y/o mantenimiento del equipo de <label id="p_cliente6"></label>, o bien porque las partes y/o refacciones hayan sido descontinuadas por los correspondientes proveedores y técnicamente no se puedan realizar sustituciones de las mismas, o bien por causas no imputables a La Empresa; II.- Que el servicio brindado no corresponda con lo pactado. En estos casos, La Empresa deberá devolver el equipo, reintegrar las contraprestaciones que en su caso hubiere recibido, y pagar a <label id="p_cliente5"></label> la pena convencional estipulada en la cláusula Décima Cuarta de este contrato; III. Ante el incumplimiento de <label id="p_cliente4"></label> a lo dispuesto en el presente contrato, <label id="p_cliente3"></label> pagará a La Empresa la pena convencional establecida en la cláusula Décima Cuarta del presente contrato.

DÉCIMA CUARTA: Se establece como pena convencional por el incumplimiento de cualquiera de las partes de este contrato, a las obligaciones contraídas en el presente contrato, el 20% (veinte por ciento), del precio total de la operación que se encuentra precisada en el anverso de este contrato.

DÉCIMA QUINTA: <label id="p_cliente3"></label> libera de toda responsabilidad a La Empresa para los casos en que el equipo sufra daños o pérdida parcial o total por causas de fuerza mayor tales como inundación, terremoto, incendio o robo, entre otras, siempre y cuando La Empresa haya denunciado ante las autoridades correspondiente los casos que así corresponda hacer del conocimiento formal a dichas autoridades mediante denuncia, cuando así se requiera. 

DÉCIMA SEXTA: Las partes del presente contrato se someten a la jurisdicción de las autoridades correspondientes de Hermosillo, Sonora, renunciando expresamente a cualquier otra jurisdicción que pudiera corresponderles por razón de sus domicilios presentes o futuros, o por cualquier otra causa.

Leído que fue por las partes el contenido del presente contrato y sabedoras de su alcance legal, lo firman por duplicado en Hermosillo, Sonora, a los _____ días de mes de _____________ del año __________.



              

									
									
								</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
								<br>

							</td>

						    </tr>
						    
						   
							
						</tr><br>

				
				</table>
				<font size="2">
					<strong><label style="position:absolute;top:85%;padding-left:5em;padding-right:5em;">Llamas Comunicación, S.A. de C.V.</strong>	</label>
					<strong><label style="position:absolute;top:85%;padding-left:35em;" id="p_cliente2"></label><br> 
					<strong><label style="position:absolute;top:86%;padding-left:5em;padding-right:5em;">(Firma)</strong>	</label>
					<strong><label style="position:absolute;top:86%;padding-left:35em;">			(Nombre y Firma)</label>

				</font>
				</br>
				</br>

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
////////////////////////IMPRIMIR/////////////////////////////////////////////
////ESTA FUNCION ES PARA MANDAR LOS VALORES QUE ESTAN EN EL DIV DE UPDATE PARA EL DIV DE PRINT /////////////
function 	updateoutput(){
			//document.getElementById('detalles').innerHTML=document.getElementById('editdetalles').value;
			//document.getElementById('imei').innerHTML=document.getElementById('editimei').value;
			//document.getElementById('equipo').innerHTML=document.getElementById('editmodelo').value;

			var adonde 	=  document.getElementById('editsucursal').getAttribute("value");
			if (adonde == "Matriz"){
				var adnd = "Llamas Comunicación, S.A. de C.V. Matriz: Bernardo Reyes # 178 RFC: LCO9906169Y0  Teléfono 301-64-64 Quiroga: Blvd. Quiroga esquina con Colosio, Local 18, Teléfono 118-94-92  Hermosillo, Sonora Correo electrónico"
			document.getElementById('adnd').innerHTML= adnd;
			}else if (adonde == "Quiroga"){
				var adnd = "Blvd. Quiroga esquina con Colosio, Local 18, Teléfono 118-94-92  Hermosillo, Sonora ";
				document.getElementById('adnd').innerHTML= adnd;

			}else if (adonde == "Dila"){
				var adnd = "Blvd. Morelos #349 Local 6 Hermosillo, Sonora. Teléfono:(662) 211 33 90";
				document.getElementById('adnd').innerHTML= adnd;

			}else if (adonde == "Sendero"){
				var adnd = "Llamas Comunicación, S.A. de C.V. Matriz: Bernardo Reyes # 178 RFC: LCO9906169Y0  Teléfono 301-64-64 Quiroga: Blvd. Quiroga esquina con Colosio, Local 18, Teléfono 118-94-92  Hermosillo, Sonora Correo electrónico";
				document.getElementById('adnd').innerHTML= adnd;

			}else if (adonde == "Progreso"){
				var adnd = "Blvd. Progreso #140-X entre Reyes y Yañez Hermosillo, Sonora. Teléfono: (662) 284 28 04";
				document.getElementById('adnd').innerHTML= adnd;

			}

			document.getElementById('pfolio1').innerHTML=document.getElementById('editfolio').getAttribute("value");	








			//var ecliente	= $('#editcliente').val();

	//email,celular,telefono,RFC,domicilio,colonia,ciudad,cpostal
			//document.getElementById('detalles').innerHTML=document.getElementById('a_detalles').value;
			//document.getElementById('imei').innerHTML=document.getElementById('a_imei').value;
			//document.getElementById('equipo').innerHTML=document.getElementById('a_modelo').getAttribute("value");
			//var tele = document.getElementById('ptelefono').getAttribute("value");
			//document.getElementById('p_tel').innerHTML= tele;
			document.getElementById('p_cliente').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente3').innerHTML=document.getElementById('editcliente').value;
			document.getElementById('p_cliente2').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente4').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente5').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente6').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente7').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente8').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente9').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente10').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente11').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente12').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente13').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente14').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente15').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente16').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente17').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente18').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente19').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente20').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente21').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente22').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente23').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente24').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente25').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente26').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente27').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente28').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente29').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente30').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente31').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente32').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente33').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente34').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente35').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente36').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente37').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente38').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente39').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente40').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente41').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente42').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente43').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente44').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente45').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente46').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente47').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente48').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente49').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente50').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente51').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente52').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente53').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente54').innerHTML=document.getElementById('editcliente').value;
document.getElementById('p_cliente55').innerHTML=document.getElementById('editcliente').value;
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






			//document.getElementById('contra').innerHTML=document.getElementById('a_password').value;				
			document.getElementById('fecha').innerHTML=document.getElementById('editfecha').value; 
			document.getElementById('p_detalles').innerHTML=document.getElementById('editdetalles').value; 
			document.getElementById('fecha2').innerHTML=document.getElementById('editfecha').value;	
			//document.getElementById('p_acces').innerHTML=document.getElementById('a_access').value;
			document.getElementById('p_marca').innerHTML=document.getElementById('editmodelo').value;
			document.getElementById('p_modelo').innerHTML=document.getElementById('editmmodelo').value;
			document.getElementById('p_imei').innerHTML=document.getElementById('editimei').value;
			
			//document.getElementById('fecha').innerHTML=document.getElementById('editfecha').value; 
			//document.getElementById('cliente').innerHTML=document.getElementById('editcliente').value;
			//document.getElementById('contra').innerHTML=document.getElementById('editpassword').value;


			//document.getElementById('p_cp').innerHTML=document.getElementById('pcpostal').getAttribute("value");
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
	var estatus = $('#editstatus option:selected').val();
	var repara  = [];
	   $(':checkbox:checked').each(function(i){
	   		repara[i] = $(this).val();
	   });
	$.ajax({
	type:"GET",
		url:"ins.php?eeditas=1&editimei="+eimei+"&editcliente="+ecliente+"&editmodelo="+emodelo+"&editstatus="+estatus+"&editcontacto="+econta+"&editfecha="+efecha+"&editemail="+eemail+"&editfolio="+efolio+"&editpassword="+epass+"&editdetalles="+edetalles+"&editrepara="+repara+"&editmmodelo="+emmodelo,
		success: function(response){
			$('#editaste').html(response);
			alert('Contacto modificado con exito');
			//window.location="/";
		},
	});

	var pcliente2 = $('#editcliente').val();
			$.ajax({
			type:"GET",
			url:"ins.php?pclient2=1&a_cliente="+pcliente2,
			dataType:"html",
			success:function(response){
				$("#printdiv").html(response); 
				
			},
		});
});
</script>
</body>
</html>


