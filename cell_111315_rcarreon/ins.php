<?php
//check connection

include("connection.php");
$amodelo  = $_GET['a_modelo'];
$aimei    = $_GET['a_imei'];
$acliente = $_GET['a_cliente'];   
$aemail   = $_GET['a_email'];
$astatus  = $_GET['a_status'];
$afecha   = $_GET['a_fecha'];
$adir     = $_GET['a_direccion'];
$ammodelo = $_GET['a_mmodelo'];
$adetalles = $_GET['a_detalles'];
$apass    = $_GET['a_password'];
$ataller  = $_GET['a_taller'];
$aconta   = $_GET['a_conta'];
$arep     = $_GET['a_rep'];
$adonde   = $_GET['a_donde'];
$arecibe  = $_GET['a_recibe'];
$sfolio   = $_GET['s_folio'];
$simei   = $_GET['s_imei'];
$smodelo   = $_GET['s_modelo'];
$scliente  = mysql_real_escape_string($_GET['s_cliente']);
$sstatus   = $_GET['s_status'];
$sfecha    = $_GET['s_fecha'];
$sdonde   = $_GET['s_donde'];
$fpor     = $_GET['f_por'];
$fsucur   = $_GET['f_sucur'];

//////////tabla para mostrar todas las columas de la tabla dispos//////////

$tr = "
<table>
     <tr>
        <td align=center ><b>Editar</b></td>
        <td align=center><b>Folio</b></td>
        <td align=center><b>Marca</b></td>
        <td align=center><b>Modelo</b></td>
        <td align=center><b>Imei</b></td>
        <td align=center><b>Cliente</b></td>
        <td align=center><b>Status</b></td>
        <td align=center><b>Reparacion</b></td>
        <td align=center><b>Sucursal</b></td>
        <td align=center><b>Password</b></td>
        <td align=center><b>Detalles</b></td>        
        <td align=center><b>Fecha</b></td>
        <td align=center><b>Email</b></td>
        <td align=center><b>Telefono Contacto</b></td>";
///////////tabla para mostrar columbas de la tabla usuarios/////////////////
$tr2 = "
<table>
     <tr>
        <td align=center><b>Editar</b></td>
        <td align=center><b>Id</b></td>
        <td align=center><b>Usuario</b></td>
        <td align=center><b>Nombre</b></td>
        <td align=center><b>Tipo de Usuario</b></td>";
/////////tabla para mostrar columas de la tabla clientes ////////////////////
$tr3 = "
<table>
     <tr>
        <td align=center><b>Editar</b></td>
        <td align=center><b>Id</b></td>
        <td align=center><b>Nombre</b></td>
        <td align=center><b>Email</b></td>
        <td align=center><b>Celular</b></td>
        <td align=center><b>Telefono Contacto</b></td>";

$tr4 = "
<table>
     <tr>
        <td align=center><b>Ingresos</b></td>
        <td align=center><b>Status</b></td>
        <td align=center><b>Sucursal</b></td>
        <td align=center><b>Fecha Rango</b></td>";

$tr5 = "
<table>
     <tr>
        <td align=center><b>Folio</b></td>
        <td align=center><b>Modelo</b></td>
        <td align=center><b>Cliente</b></td>
        <td align=center><b>Status</b></td>
        <td align=center><b>Sucursal</b></td>
        <td align=center style=width:20px;><b>Fecha</b></td>";
        //<td align=center><b>Sucursal</b></td>";
        //folio,modelo,cliente,status,sucursal,fech
$tr6 ="
<table>
     <tr>
        <td align=center><b>Email</b></td>
        <td align=center><b>Celular</b></td>
        <td align=center><b>Telefono</b></td>
        <td align=center><b>RFC</b></td>
        <td align=center><b>Domicilio</b></td>
        <td align=center><b>Colonia</b></td>
        <td align=center><b>ciudad</b></td>
        <td align=center><b>Cpostal</b></td>";

//Abrimos Conexion a la base de datos usando la conexion 2 
mysql_select_db("cellcity",$con2);

 if(!empty($_GET['s_submit'])){
////Filtro para buscar todos los registros de la tabla dispos 
    if(!empty($_GET['s_submit']) && empty($sfolio) && empty($simei) && empty($smodelo) && empty($scliente) && empty($sfecha) && empty($sdonde)){
      
      $resulta= mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente order by dispos.folio desc" ,$con2);     
      echo $tr;
    }  
////Filtro para buscar registro segun el folio
    if($sfolio){
      
      $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.folio = '$sfolio' order by dispos.folio desc",$con2);
      echo $tr;
    }
////Filtro para buscar registro segun imei 
    if($simei){
      
      $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.imei = '$simei' order by dispos.folio desc",$con2);
      echo $tr;         
    }
////Filtro para buscar registro segun equipo/modelo
    if($smodelo){
      
      $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.modelo LIKE '$smodelo%' order by dispos.folio desc",$con2);
      echo $tr;
    }   
////Filtro para buscar registro segun cliente y status
    if($scliente){    
        if (!empty($sstatus)){      
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos   LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' AND dispos.status = '$sstatus' order by dispos.folio desc",$con2);
        }else{                  
                  
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos  LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' order by dispos.folio desc",$con2);
        }        
        echo $tr;          
    }    
     if($sfecha){        
        $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.fecha = '$sfecha' order by dispos.folio desc",$con2);
        echo $tr;
    }  
    if($sdonde){        
        $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.sucursal = '$sdonde' order by dispos.folio desc",$con2);
        echo $tr;
        
    }      
////loop para mostrar los registros mientras haya resultados en la busqueda
    while($data = mysql_fetch_row($resulta)){           
      //echo '<pre>';
      //print_r($data);
        echo "<tr>";                
            echo "<td align=center><a href=update.php?folio=".$data[0]."&editcliente=".urlencode($data[3]).">Editar</a></td> ";                  
            //echo "<td align=center><input id='button' type='button' value='Editar' class='btn btn-info btn-sm' onclick=abre();></td>";     
            echo "<td  align=center name=editfolio id=editfolio>$data[0]</td>";
            echo "<td  align=center id=editmodelo >$data[1]</td>";
            echo "<td  align=center name=editmmodelo id=editmmodelo>$data[13]</td>";            
            echo "<td  align=center id=editimei >$data[2]</td>";
            echo "<td  align=center id=editcliente >".urldecode($data[3])."</td>";
            echo "<td  align=center id=editstatus >$data[4]</td>";
            echo "<td  align=center id=editrepara >$data[5]</td>";
            echo "<td  align=center id=editdonde>$data[7]</td>";
            echo "<td  align=center id=editpassword>$data[8]</td>";
            echo "<td  align=center id=editdetalles>$data[6]</td>"; 
            echo "<td  align=center id=editfecha >$data[9]</td>";          
            echo "<td  align=center id=editmail >$data[15]</td>";
            echo "<td  align=center id=editcontacto >$data[16]</td>";            
            echo "</tr>";
    }
  ///Cerrando Connection a la base de datos usando con2       
    mysql_close($con2);
 }
/// AGREGA NUEVO FOLIO PERO CHECA SI EL CLIENTE YA ESTA REGISTRADO.
if(!empty($_GET['s_sumito'])){     
         $q = mysql_query("SELECT  nombre  from cliente  where nombre = '$acliente' ",$con2);
         $ress = mysql_fetch_row($q);         
          if (!$ress) {
               echo "<script type=text/javascript>alert('Cliente $acliente no existe favor de registrar cliente y luego agregar folio')</script>";
             exit(1);
          }else{
              if ($acliente){ 
                    $query = "INSERT INTO dispos ( modelo, imei, cliente, email, status, detalles, reparacion, fecha, contacto,password,sucursal,recibe, marca)
                    VALUES ('$amodelo','$aimei','$acliente','$aemail','$astatus','$adetalles','$arep', '$afecha','$aconta', '$apass', '$adonde', '$arecibe', '$ammodelo')";
                    $result = mysqli_query($con,$query);
                    if (!$result){
                        die('Couldn\'t query' . mysqli_error($con));
                    }      
            ?>
                    <script type="text/javascript">
                        alert('<?php echo  $amodelo?> fue agregado para <?php echo $acliente?>, NO Olvides Imprimir comprobante de recibo.')
                    </script>  
	     <?php
            } 
      }
}
/////Editar folio 
if(!empty($_GET['eeditas'])){

  $e_modelo    = $_GET['editmodelo'];
  $e_imei      = $_GET['editimei'];
  $e_cliente   = $_GET['editcliente'];   
  $e_email     = $_GET['editemail'];
  $e_status    = $_GET['editstatus'];
  $e_fecha     = $_GET['editfecha'];
  $e_pass      = $_GET['editpassword'];
  $e_detalles  = $_GET['editdetalles'];
  $e_contacto  = $_GET['editcontacto'];
  $e_folio     = $_GET['editfolio'];
  $e_repara    = $_GET['editrepara'];
  $e_mmodelo   = $_GET['editmmodelo'];
  if (!$e_repara){
                $query = "UPDATE dispos SET modelo = '$e_modelo', imei = '$e_imei', cliente = '$e_cliente', status = '$e_status', fecha = '$e_fecha', email = '$e_email', detalles = '$e_detalles', password = '$e_pass', contacto = '$e_contacto' , marca = '$e_mmodelo' WHERE folio = '$e_folio'";
  }else{
                $query = "UPDATE dispos SET modelo = '$e_modelo', imei = '$e_imei', cliente = '$e_cliente', status = '$e_status', fecha = '$e_fecha', email = '$e_email', detalles = '$e_detalles', password = '$e_pass', contacto = '$e_contacto', marca = '$e_mmodelo',  reparacion = '$e_repara' WHERE folio = '$e_folio'";
  }
      $result = mysqli_query($con,$query);
      if (!$result){
            die('Coudnt query'. mysqli_error($con));
          } 

}
///AGREGA USUARIO NUEVO
if(!empty($_GET['agregau'])){
   $uusuario   = $_GET['u_usuario'];
   $upsswd    = $_GET['u_pass'];
   $unombre    = $_GET['u_nombre'];
   $utipo      = $_GET['u_tipo'];

   $query = "INSERT INTO usuarios ( usuario, passwd, nombre, tipo) VALUES ('$uusuario','$upsswd','$unombre','$utipo')";
   $q = mysql_query("SELECT  usuario  from usuarios  where usuario = '$uusuario' ",$con2);
   $ress = mysql_fetch_row($q);         
   if ($ress) {
               echo "<script type=text/javascript>alert('Usuario $uusuario ya existe , si quieres modificarlo ve a manejar usuarios luego mostrar todos y selecciona editar')</script>";
             die();
    }else{
          $result = mysqli_query($con,$query);
          if(!$result){
            die('Could query'. mysqli_error($con));
          }
          echo "<script type=text/javascript>alert('Usuario $uusuario ha sido agregado con exito ')</script>";
    }
}
///MUESTRA USUARIO NUEVO
if (!empty($_GET['musuarios'])){  
    $result=mysql_query("select idu,usuario,nombre,tipo from usuarios",$con2);
    echo $tr2;
    while($dato = mysql_fetch_row($result)){
          echo "<tr>";
          echo "<td align=center><a href=updateusers.php?idu=".$dato[0].">Editar</a></td> "; 
            echo "<td id=editidu align=center>$dato[0]</td>";
            echo "<td id=editusuario align=center>$dato[1]</td>";
            echo "<td id=editnombre align=center>$dato[2]</td>";
            echo "<td id=editipo align=center>$dato[3]</td>";
          echo "</tr>";
    } 
}
///MODIFICA USUARIO NUEVO
if(!empty($_GET['musuario'])){
    $eusuario    = $_GET['editusuario'];
    $enombre      = $_GET['editnombre'];
    $epasswd   = $_GET['editpassword'];   
    $etipo     = $_GET['edittipo'];
    $eidu      = $_GET['editidu'];

    $query = "UPDATE usuarios SET usuario = '$eusuario', nombre = '$enombre', tipo = '$etipo', passwd = '$epasswd' WHERE idu = '$eidu'";

      $result = mysqli_query($con,$query);
      if (!$result){
            die('Coudnt query'. mysqli_error($con));
          } 
}
///MUESTRA TODOS LOS CLIENTES
if (!empty($_GET['mclientes'])){  
    $result=mysql_query("select * from cliente",$con2);
    echo $tr3;
    while($dato = mysql_fetch_row($result)){
          echo "<tr>";
          echo "<td align=center ><a href=updateclientes.php?id=".$dato[0].">Editar</a></td> "; 
            echo "<td align=center id=editid >$dato[0]</td>";
            echo "<td align=center id=editnombre >$dato[1]</td>";
            echo "<td align=center id=editemail >$dato[2]</td>";
            echo "<td align=center id=editcelular >$dato[3]</td>";
            echo "<td align=center id=edittelefono >$dato[4]</td>";
          echo "</tr>";
    } 

}
///MODIFICA CLIENTES
if(!empty($_GET['mcliente'])){
    $cnombre    = $_GET['editnombre'];
    $cemail     = $_GET['editemail'];
    $ccel       = $_GET['editcel'];   
    $ctel       = $_GET['edittel'];
    $cid        = $_GET['editid'];
    $ccd        = $_GET['editcd'];
    $ccol       = $_GET['editcol'];
    $ccpostal   = $_GET['editcp'];
    $cdom       = $_GET['editdom'];
    $crfc       = $_GET['editrfc'];

   

    $query2 = "UPDATE dispos SET  cliente = '$cnombre'  WHERE cliente = '$cnombre'";
    $result2 = mysqli_query($con,$query2);

    $query = "UPDATE cliente  SET nombre = '$cnombre', email = '$cemail', celular = '$ccel', telefono = '$ctel', RFC = '$crfc', domicilio = '$cdom', colonia = '$ccol', ciudad = '$ccd', cpostal = '$ccpostal' WHERE id = '$cid'";
    $result = mysqli_query($con,$query);
    if (!$result){
           die('Coudnt query'. mysqli_error($con));
    } 
}
///AGREGA CLIENTE
if(!empty($_GET['agregac'])){
    $cnombre    = $_GET['c_nombre'];
    $cemail     = $_GET['c_email'];
    $ccel       = $_GET['c_cel'];
    $ctel       = $_GET['c_tel'];

    
    $crfc       = $_GET['c_rfc'];
    $ccol       = $_GET['c_col'];
    $ccd       = $_GET['c_cd'];
    $cpostal       = $_GET['c_postal'];
    $cdom       = $_GET['c_dom'];



    $q = mysql_query("SELECT  nombre  from cliente  where nombre = '$cnombre' ",$con2);
    $ress = mysql_fetch_row($q); 
   if ($ress) {
           echo "<script type=text/javascript>alert('Cliente $ress[0] ya existe,favor de ingresar con otro nombre ')</script>";
           //exit(1);
    } else {      
    $query = "INSERT INTO cliente (nombre, email, celular, telefono, RFC, domicilio, colonia, ciudad, cpostal) VALUES ('$cnombre','$cemail','$ccel','$ctel','$crfc','$cdom','$ccol','$ccd','$cpostal')";
      $result = mysqli_query($con,$query);
    if(!$result){
        die('Couldnt query'. mysqli_error($con));

    }
      echo "<script type=text/javascript>alert('Cliente $cnombre ha sido agregado con exito ')</script>";
      echo "<script type=text/javascript>alert('$cnombre, $cemail, $ccel, $crfc, $ccol, $ccd, $cpostal, $cdom')</script>";
  }

}

//// GREGA MARCA 

if(!empty($_GET['eqsubmit'])){
    $marca    = $_GET['a_marca'];
    //$modelo   = $_GET['modelos'];
    $q = mysql_query("SELECT  marca  from marcas  where marca = '$marca' ",$con2);
    $ress = mysql_fetch_row($q); 
   if ($ress) {
           echo "<script type=text/javascript>alert('Marca $ress[0] ya existe,favor de ingresar con otro nombre ')</script>";
           //exit(1);
    } else {  
    
    $query = "INSERT INTO marcas (marca) VALUES ('$marca')";
      $result = mysqli_query($con,$query);
    if(!$result){
        die('Couldnt query'. mysqli_error($con));

    }
      echo "<script type=text/javascript>alert('Marca $marca ha sido agregado con exito ')</script>";
  }

}




if(!empty($_GET['modsubmit'])){
    $modelo    = $_GET['modelos'];
    //$modelo   = $_GET['modelos'];
    $q = mysql_query("SELECT  modelo  from modelos  where modelo = '$modelo' ",$con2);
    $ress = mysql_fetch_row($q); 
   if ($ress) {
           echo "<script type=text/javascript>alert('Modelo $ress[0] ya existe,favor de ingresar con otro nombre ')</script>";
           //exit(1);
    } else {  
    
    $query = "INSERT INTO modelos (modelo) VALUES ('$modelo')";
      $result = mysqli_query($con,$query);
    if(!$result){
        die('Couldnt query'. mysqli_error($con));

    }
      echo "<script type=text/javascript>alert('Modelo $marca ha sido agregado con exito ')</script>";
  }

}
















///////////




///AUTOCOMPLETAR CLIENTE
if(!empty($_GET['clienteauto'])) {
    $cliente = $_GET['term'];

    $query = "SELECT  nombre FROM cliente WHERE nombre LIKE '%$cliente%'";
    $result = mysql_query($query, $con2);
    $clientes = array();
   
    while($dat = mysql_fetch_array($result)){
        $clientes[] = array(        
           'label' => $dat["nombre"],
          );
        
    }
    echo json_encode($clientes);
}
//AUTOCOMPLETAR IMEI 

if(!empty($_GET['imeiauto'])) {
    $imeii = $_GET['term'];

    $query = "SELECT  imei FROM dispos WHERE imei LIKE '$imeii%'";
    $result = mysql_query($query, $con2);
    $imeis = array();
   
    while($dat = mysql_fetch_array($result)){
        $imeis[] = array(        
           'label' => $dat["imei"],
          );
        
    }
    echo json_encode($imeis);
}

if(!empty($_GET['marcaauto'])) {
    $marcass = $_GET['term'];

    $query = "SELECT  marca FROM marcas WHERE marca LIKE '$marcass%'";
    $result = mysql_query($query, $con2);
    $marcases = array();
   
    while($dat = mysql_fetch_array($result)){
        $marcases[] = array(        
           'label' => $dat["marca"],
          );
        
    }
    echo json_encode($marcases);
}


if(!empty($_GET['modeloauto'])) {
    $modeloss = $_GET['term'];

    $query = "SELECT  modelo FROM modelos WHERE modelo LIKE '$modeloss%'";
    $result = mysql_query($query, $con2);
    $modeloss = array();
   
    while($dat = mysql_fetch_array($result)){
        $modeloss[] = array(        
           'label' => $dat["modelo"],
          );
        
    }
    echo json_encode($modeloss);
}




if(!empty($_GET['pclient'])){

    $pcliente = $_GET['a_cliente'];

    $sql2 = "SELECT folio from dispos where cliente = '$pcliente ' order by folio desc limit 1"; 
    $rec2 = mysql_query($sql2,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query); 
    $rows2 = mysql_fetch_row($rec2);
     echo "$rows2[0]";

}

////IMRPIMIR////



if (!empty($_GET['pclient2'])){  

  $pcliente2 = $_GET['a_cliente'];



    $sql2 = "SELECT email,celular,telefono,RFC,domicilio,colonia,ciudad,cpostal from cliente where nombre = '$pcliente2'"; 

    $result = mysql_query($sql2,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$sql2); 
   // $result=mysql_query("select * from cliente",$con2);
    //echo $tr6;
    while($dato = mysql_fetch_row($result)){
         // echo "<tr>";
            echo "<label align=center id=pemail value=".$dato[0].">$dato[0]</label>";
            echo "<label align=center id=pcelular value=".$dato[1]." >$dato[1]</label>";
            echo "<label align=center id=ptelefono value=".$dato[2]." >$dato[2]</label>";
            echo "<label align=center id=prfc value=".$dato[3]." >$dato[3]</td>";
            echo "<label align=center id=pdomicilio value=".$dato[4]." >$dato[4]</label>";
            echo "<label align=center id=pcolonia value=".$dato[5]." >$dato[5]</label>";
            echo "<label align=center id=pciudad value=".$dato[6]." >$dato[6]</label>";
            echo "<label align=center id=pcpostal value=".$dato[7]." >$dato[7]</label>";
          //echo "</tr>";
    } 



}















///////////

//Muestra numeros de los dispositivos que han entrado a la tienda
if (!empty($_GET['f_submit'])){    

    $fechaini = $_GET['f_fecha_i'];
    $fechater = $_GET['f_fecha_t'];

    switch ($fpor) {
      case 'GarantiaNoen':
          $queryn = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status = 'listo' and reparacion = 'Grantia') and  fecha between '$fechaini'  and  '$fechater'";    
          $result=mysql_query($queryn,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$queryn);
          echo $tr4;
          while($dato = mysql_fetch_row($result)){
            echo "<tr>";
              echo "<td  align=center>$dato[0]</td>";
              echo "<td  align=center>".$dato[1]."/No entregado</td>";
              echo "<td  align=center>$dato[2]</td>";
              echo "<td  align=center>".$fechaini." & ".$fechater."</td>";            
            echo "</tr>";
          }
        break;
      case 'GarantiaEn':
          $querye = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status = 'Entregado' and reparacion = 'Grantia') and  fecha between '$fechaini'  and  '$fechater'";    
          $result=mysql_query($querye,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$querye);
          echo $tr4;
          while($dato = mysql_fetch_row($result)){
             echo "<tr>";
              echo "<td  align=center>$dato[0]</td>";
              echo "<td  align=center>Garantia/".$dato[1]."</td>";
              echo "<td  align=center>$dato[2]</td>";
              echo "<td  align=center>".$fechaini." & ".$fechater."</td>";            
            echo "</tr>";
          }  
        break;
        ##ESTO ESTA PENDIENTE Sin cargo  alguno ##
        case 'Todos':         
            $querye = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status LIKE '%') and  fecha between '$fechaini'  and  '$fechater' group by status order by count(folio)";    
            $result=mysql_query($querye,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$querye);
            echo $tr4;
            while($dato = mysql_fetch_row($result)){
              echo "<tr>";
                echo "<td  align=center>$dato[0]</td>";
                echo "<td  align=center>$dato[1]</td>";
                echo "<td  align=center>$dato[2]</td>";
                echo "<td  align=center>".$fechaini." & ".$fechater."</td>";            
              echo "</tr>";
            }        
        break;             
      default:
        $query = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status = '$fpor') and  fecha between '$fechaini'  and  '$fechater'";    
        $result=mysql_query($query,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query);
        echo $tr4;
        while($dato = mysql_fetch_row($result)){
          echo "<tr>";
            echo "<td  align=center>$dato[0]</td>";
            echo "<td  align=center>$dato[1]</td>";
            echo "<td  align=center>$dato[2]</td>";
            echo "<td  align=center>".$fechaini." & ".$fechater."</td>";            
          echo "</tr>";
         }
        break;
    }
}

if (!empty($_GET['f_submit_es'])){    

    $fechaini = $_GET['f_fecha_i'];
    $fechater = $_GET['f_fecha_t'];
    switch ($fpor) {
      case 'GarantiaNoen':
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur' and status = 'listo' and reparacion = 'Grantia') and  fecha between '$fechaini'  and  '$fechater' order by fecha desc";    
        $result=mysql_query($query,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query);
        echo $tr5;
        while($dato = mysql_fetch_row($result)){
          echo "<tr>";
            echo "<td  align=center>$dato[0]</td>";
            echo "<td  align=center>$dato[1]</td>";
            echo "<td  align=center>$dato[2]</td>";
            echo "<td  align=center>$dato[3]</td>";
            echo "<td  align=center>$dato[4]</td>";
            echo "<td  align=center>$dato[5]</td>";         
          echo "</tr>";
        }  
        break;
      case 'GarantiaEn':
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur' and status = 'Entregado' and reparacion = 'Grantia') and  fecha between '$fechaini'  and  '$fechater' order by fecha desc";    
        $result=mysql_query($query,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query);
        echo $tr5;
        while($dato = mysql_fetch_row($result)){
          echo "<tr>";
            echo "<td  align=center>$dato[0]</td>";
            echo "<td  align=center>$dato[1]</td>";
            echo "<td  align=center>$dato[2]</td>";
            echo "<td  align=center>$dato[3]</td>";
            echo "<td  align=center>$dato[4]</td>";
            echo "<td  align=center>$dato[5]</td>";         
          echo "</tr>";
        }  
        break;
      case 'Todos':
        //$query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur' and status = '%' and reparacion = '%') and  fecha between '$fechaini'  and  '$fechater' group by status  order by fecha  desc";    
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur')  and  fecha between '2015-07-01'  and  '2015-07-31'   order by status desc";
        $result=mysql_query($query,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query);
        echo $tr5;
        while($dato = mysql_fetch_row($result)){
          echo "<tr>";
            echo "<td  align=center>$dato[0]</td>";
            echo "<td  align=center>$dato[1]</td>";
            echo "<td  align=center>$dato[2]</td>";
            echo "<td  align=center>$dato[3]</td>";
            echo "<td  align=center>$dato[4]</td>";
            echo "<td  align=center>$dato[5]</td>";         
          echo "</tr>";
        }  
        break;

      default:
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur' and status = '$fpor') and  fecha between '$fechaini'  and  '$fechater' order by fecha desc";    
        $result=mysql_query($query,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query);
        echo $tr5;
        while($dato = mysql_fetch_row($result)){
          echo "<tr>";
            echo "<td  align=center>$dato[0]</td>";
            echo "<td  align=center>$dato[1]</td>";
            echo "<td  align=center>$dato[2]</td>";
            echo "<td  align=center>$dato[3]</td>";
            echo "<td  align=center>$dato[4]</td>";
            echo "<td  align=center>$dato[5]</td>";         
          echo "</tr>";
        }    
        break;
    }
}

mysqli_close($con);

?> 
