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
$stecnico   = $_GET['s_tecnico'];
$simei   = $_GET['s_imei'];
$smodelo   = $_GET['s_modelo'];
$scliente  = mysql_real_escape_string($_GET['s_cliente']);
$sstatus   = $_GET['s_status'];
$sfecha    = $_GET['s_fecha'];
$sdonde   = $_GET['s_donde'];
$fpor     = $_GET['f_por'];
$numcolum = $_GET['n_columnas'];
$e_bitacora   = mysql_real_escape_string($_GET['editbitacora']);
$abitacora  = $_GET['a_bitacora'];
$aaccess     = mysql_real_escape_string($_GET['a_access']);
session_start();    
$uname =$_SESSION['uname'];

//////////tabla para mostrar todas las columas de la tabla dispos//////////

$tr = "
<table>
     <tr>
        <td align=center ><b>Editar</b></td>
        <td align=center><b>Bitacora</b></td>
        <td align=center><b>Folio</b></td>
        <td align=center><b>Marca</b></td>
        <td align=center><b>Modelo</b></td>
        <td align=center><b>Imei</b></td>
        <td align=center><b>Cliente</b></td>
        <td align=center><b>Status</b></td>
        <td align=center><b>Reparacion</b></td>
        <td align=center><b>Tecnico</b></td>
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


$tr7 = "
<table>
     <tr>
        <td align=center><b>Clave</b></td>
        <td align=center><b>Descripcion</b></td>      
        <td align=center><b>Linea</b></td>
        <td align=center><b>Marca</b></td>
        <td align=center><b>Modelo</b></td>
        <td align=center><b>Nombre Comercial</b></td>
        <td align=center><b>Modelos compatibles</b></td>        
        <td align=center><b>Distribuidor</b></td>
        <td align=center><b>Publico</b></td>";

  $tr8 = "
<table>
     <tr>
        <td align=center><b>Editar</b></td>
        <td align=center><b>Clave</b></td>
        <td align=center><b>Descripcion</b></td>      
        <td align=center><b>Linea</b></td>
        <td align=center><b>Marca</b></td>
        <td align=center><b>Modelo</b></td>
        <td align=center><b>Nombre Comercial</b></td>
        <td align=center><b>Modelos compatibles</b></td>        
        <td align=center><b>Distribuidor</b></td>
        <td align=center><b>Publico</b></td>";

  $tr10 = "
<table>
     <tr>
        <td align=center><b>Folio</b></td>
        <td align=center><b>Imei</b></td>      
        <td align=center><b>Falla</b></td>";

//Abrimos Conexion a la base de datos usando la conexion 2 
mysql_select_db("cellcity",$con2);

 if(!empty($_GET['s_submit'])){
////Filtro para buscar todos los registros de la tabla dispos 
    if(!empty($_GET['s_submit']) && empty($sfolio) && empty($simei) && empty($smodelo) && empty($scliente) && empty($sfecha) && empty($sdonde)){

       if ( $numcolum > 500){
          $resulta= mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente order by dispos.folio desc" ,$con2);
       }
        if ( empty($numcolum) ){
          $resulta= mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente order by dispos.folio desc LIMIT 100" ,$con2);
       }
       else {      
          $resulta= mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente order by dispos.folio desc LIMIT $numcolum" ,$con2);     
       }
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
        if ( $numcolum > 500){
           $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.modelo LIKE '$smodelo%' order by dispos.folio desc",$con2);
        }
        if ( empty($numcolum) ){
           $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.modelo LIKE '$smodelo%' order by dispos.folio desc LIMIT 100",$con2);
        }else {
           $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.modelo LIKE '$smodelo%' order by dispos.folio desc LIMIT $numcolum",$con2);
        }
      echo $tr;
    }   
////Filtro para buscar registro segun cliente y status
    if($scliente){    
        if (!empty($sstatus)){   
              if ( $numcolum > 500){   
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos   LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' AND dispos.status = '$sstatus' order by dispos.folio desc",$con2);
              }
              if ( empty($numcolum) ){
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos   LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' AND dispos.status = '$sstatus' order by dispos.folio desc LIMIT 100",$con2);
              } else {
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos   LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' AND dispos.status = '$sstatus' order by dispos.folio desc LIMIT $numcolum",$con2);

              }         
        }else{       
                if ( $numcolum > 500){                               
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos  LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' order by dispos.folio desc",$con2);
                }
                if ( empty($numcolum) ){
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos  LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' order by dispos.folio desc LIMIT 100",$con2);
                }
                else {
                  $resulta= mysql_query("SELECT dispos.*,cliente.email,cliente.telefono,cliente.nombre from dispos  LEFT JOIN cliente ON  cliente.nombre = dispos.cliente where dispos.cliente LIKE '$scliente%' order by dispos.folio desc LIMIT $numcolum",$con2);
 
                }
        }        
        echo $tr;          
    }    
     if($sfecha){  
        if ( $numcolum > 500){       
            $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.fecha LIKE '$sfecha%' order by dispos.folio desc",$con2);
        }
        if ( empty($numcolum) ){
            $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.fecha LIKE  '$sfecha%' order by dispos.folio desc LIMIT 100",$con2);
        }else {
            $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.fecha LIKE '$sfecha%' order by dispos.folio desc LIMIT $numcolum",$con2);

        }
        echo $tr;
    }  
    if($sdonde){   
      if ( $numcolum > 500){     
         $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.sucursal = '$sdonde' order by dispos.folio desc",$con2);
      }
      if ( empty($numcolum) ){
         $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.sucursal = '$sdonde' order by dispos.folio desc LIMIT 100 ",$con2);

      }else {
         $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.sucursal = '$sdonde' order by dispos.folio desc LIMIT $numcolum",$con2);

      }

        echo $tr;
        
    }      

    ////Filtro para buscar por tecnico 
    if($stecnico){   
      if ( $numcolum > 500){     
         $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.tecnico = '$stecnico' order by dispos.folio desc",$con2);
      }
      if ( empty($numcolum) ){
         $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.tecnico = '$stecnico' order by dispos.folio desc LIMIT 100 ",$con2);

      }else {
         $resulta=mysql_query("SELECT dispos.*, cliente.email,cliente.telefono,cliente.nombre from dispos LEFT JOIN cliente  ON  cliente.nombre = dispos.cliente where dispos.tecnico = '$stecnico' order by dispos.folio desc LIMIT $numcolum",$con2);

      }
      
        
    } 


    ////
////loop para mostrar los registros mientras haya resultados en la busqueda
    while($data = mysql_fetch_row($resulta)){   
        echo "<tr>";              
            echo "<td align=center><a href=update.php?folio=".$data[0]."&editcliente=".urlencode($data[3]).">Editar</a></td> ";   
            if (!$data[15] ){
                  echo "<td align=center><button  type=\"button\"   class=\"btn  bitacora\" onClick=\"bitacora($data[0])\";>Bitacora</button></td>";
            }else{
              echo "<td align=center><button  type=\"button\"   class=\"btn btn-info btn-block bitacora\" onClick=\"bitacora($data[0])\";>Bitacora</button></td>";

            }

            echo "<td  align=center name=editfolio id=editfolio>$data[0]</td>";
            echo "<td  align=center id=editmodelo >$data[1]</td>";
            echo "<td  align=center name=editmmodelo id=editmmodelo>$data[13]</td>";            
            echo "<td  align=center id=editimei >$data[2]</td>";
            echo "<td  align=center id=editcliente >".urldecode($data[3])."</td>";
            echo "<td  align=center id=editstatus >$data[4]</td>";
            echo "<td  align=center id=editrepara >$data[5]</td>";
            echo "<td  align=center id=edittecnico >$data[16]</td>";
            echo "<td  align=center id=editdonde>$data[7]</td>";
            echo "<td  align=center id=editpassword>$data[8]</td>";
            echo "<td  align=center id=editdetalles>$data[6]</td>"; 
            echo "<td  align=center id=editfecha >$data[9]</td>";          
            echo "<td  align=center id=editmail >$data[17]</td>";
            echo "<td  align=center id=editcontacto >$data[18]</td>"; 
                        
           
            echo "</tr>";
            //6623011024
    }
  ///Cerrando Connection a la base de datos usando con2       
    mysql_close($con2);
 }
/// AGREGA NUEVO FOLIO PERO CHECA SI EL CLIENTE YA ESTA REGISTRADO.
if(!empty($_GET['s_sumito'])){  
         $q2 = mysql_query("SELECT  marca  from marcas  where marca = '$amodelo' ",$con2);
         $ress2 = mysql_fetch_row($q2);  
          if (!$ress2) {
               echo "<script type=text/javascript>alert('Marca  $amodelo no existe favor de registrar marca y luego agregar folio')</script>";
             exit(1);
          }
         $q = mysql_query("SELECT  nombre  from cliente  where nombre = '$acliente' ",$con2);
         $ress = mysql_fetch_row($q);         
          if (!$ress) {
               echo "<script type=text/javascript>alert('Cliente $acliente no existe favor de registrar cliente y luego agregar folio')</script>";
             exit(1);
          }else{
              if ($acliente){ 
                    $query = "INSERT INTO dispos ( modelo, imei, cliente, email, status, detalles, reparacion, fecha, contacto,password,sucursal,recibe, marca,bitacora,access)
                    VALUES ('$amodelo','$aimei','$acliente','$aemail','$astatus','$adetalles','$arep', '$afecha','$aconta', '$apass', '$adonde', '$arecibe', '$ammodelo', '$abitacora','$aaccess')";
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
  $e_tecnico   = $_GET['edittecnico'];
  $e_dimpresion = $_GET['editdimpresion'];
  $e_usuario   = mysql_real_escape_string($_GET['editusuario']);

    
  
  if (!$e_repara){
                $query = "UPDATE dispos SET modelo = '$e_modelo', imei = '$e_imei', cliente = '$e_cliente', status = '$e_status', fecha = '$e_fecha', email = '$e_email', detalles = '$e_detalles', password = '$e_pass', contacto = '$e_contacto' , marca = '$e_mmodelo', bitacora = '$e_bitacora' , tecnico = '$e_tecnico' , access = '$e_dimpresion'  WHERE folio = '$e_folio'";
  }else{
                 $query = "UPDATE dispos SET modelo = '$e_modelo', imei = '$e_imei', cliente = '$e_cliente', status = '$e_status', fecha = '$e_fecha', email = '$e_email', detalles = '$e_detalles', password = '$e_pass', contacto = '$e_contacto', marca = '$e_mmodelo',  reparacion = '$e_repara', bitacora = '$e_bitacora', tecnico = '$e_tecnico', access = '$e_dimpresion' WHERE folio = '$e_folio'";
  }
      $query2 = "UPDATE dispos set modifica ='$e_usuario' where folio = '$e_folio'";
      $result = mysqli_query($con,$query);
      $result2 = mysqli_query($con,$query2);

      if (!$result){
            die('Coudnt query'. mysqli_error($con));
          } 

}

if(!empty($_GET['eeditas2'])){
  $e_folio     = $_GET['editfolio'];
  $e_repara    = $_GET['editrepara'];
  $e_tecnico   = $_GET['editecnico'];

  
       $query = "UPDATE dispos SET reparacion = '$e_repara', tecnico = '$e_tecnico' WHERE folio = '$e_folio'";

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

   //strtoupper($variable) pero truena en esta funcion de modifical el cliente 

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

//// AGREGA MARCA 

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
//Agrega articulo para cotizador ///////
if(!empty($_GET['artisubmit'])){ 
    
    $clave        =   $_GET['a_codigo_cat'];
    $descripcion  =   $_GET['a_descripcion_cat'];
    $marca        =   $_GET['a_marca_cat'];
    $modelo       =   $_GET['a_modelo_cat'];
    $linea        =   $_GET['a_linea_cat'];
    $nomcomer     =   $_GET['a_nomcom_cat'];
    $modcompat    =   $_GET['a_modcompat_cat'];
    $dist         =   $_GET['a_dist_cat'];
    $publico      =   $_GET['a_publico_cat'];



    //$modelo   = $_GET['modelos'];
    $q = mysql_query("SELECT  modelo  from  cotizador  where (modelo = '$modelo' AND clave = '$clave')",$con2);
    $ress = mysql_fetch_row($q); 
   if ($ress) {
           echo "<script type=text/javascript>alert('Codigo $ress[0] ya existe y no se puede duplicar, favor de ingresar con otro nombre ')</script>";
           //exit(1);
    } else {  
    
    $query = "INSERT INTO cotizador (linea,marca,modelo,nombrecomer,modelo_compat,precio_dist,precio_publico,clave,descripcion) VALUES ('$linea','$marca','$modelo','$nomcomer','$modcompat','$dist','$publico','$clave','$descripcion')";
      $result = mysqli_query($con,$query);
    if(!$result){
        die('Couldnt query'. mysqli_error($con));

    }
      echo "<script type=text/javascript>alert('Articulo $marca $modelo $producto ha sido agregado con exito ')</script>";
  }

}

///////////////////////////////////
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

    $query = "SELECT  DISTINCT marca FROM marcas WHERE marca LIKE '$marcass%'";
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

    $query = "SELECT  DISTINCT modelo FROM modelos WHERE modelo LIKE '$modeloss%'";
    $result = mysql_query($query, $con2);
    $modeloss = array();
   
    while($dat = mysql_fetch_array($result)){
        $modeloss[] = array(        
           'label' => $dat["modelo"],
          );
        
    }
    echo json_encode($modeloss);
}

///Autocompleta cotizador /// 
if(!empty($_GET['marcaautocotiza'])) {
    $marca = $_GET['term'];

    $query = "SELECT DISTINCT  marca FROM cotizador WHERE marca LIKE '$marca%'";
    $result = mysql_query($query, $con2);
    $marca = array();
   
    while($dat = mysql_fetch_array($result)){
        $marca[] = array(        
           'label' => $dat["marca"],
          );
        
    }
    echo json_encode($marca);
}




if(!empty($_GET['modeloautocotiza'])) {
    $marcas = $_GET['s_cotiza'];
    $modelo = $_GET['s_cotiza2'];

    $query = "SELECT DISTINCT  modelo FROM cotizador WHERE (marca = '$marcas' and  modelo LIKE '$modelo%')";
    $result = mysql_query($query, $con2);
    $marca = array();
   
    while($dat = mysql_fetch_array($result)){
        $marca[] = array(        
           'label' => $dat["modelo"],
          );
        
    }
    echo json_encode($marca);
}

if(!empty($_GET['productoautocotiza'])) {
    $producto = $_GET['s_cotiza'];
    $producto2 = $_GET['s_cotiza2'];
    $producto3 = $_GET['s_cotiza3'];



    $query = "SELECT  DISTINCT linea FROM cotizador WHERE (marca = '$producto' AND modelo = '$producto2'  and linea LIKE '$producto3%')";
    $result = mysql_query($query, $con2);
    $producto = array();
   
    while($dat = mysql_fetch_array($result)){
        $elproducto[] = array(        
           'label' => $dat["linea"],
          );
        
    }
    echo json_encode($elproducto);
}

if(!empty($_GET['modelocata'])) {
    $marca = $_GET['cat_marca'];

    $query = "SELECT DISTINCT  modelo FROM cotizador WHERE marca LIKE '$marca%'";
    $result = mysql_query($query, $con2);
    $marca = array();
   
    while($dat = mysql_fetch_array($result)){
        $marca[] = array(        
           'label' => $dat["modelo"],
          );
        
    }
    echo json_encode($marca);
}


if(!empty($_GET['productocata'])) {
    $catmarca = $_GET['cat_marca'];
    $catmodelo = $_GET['cat_modelo'];


    $query = "SELECT  DISTINCT linea FROM cotizador WHERE (marca = '$catmarca' AND modelo = '$catmodelo' )";
    $result = mysql_query($query, $con2);
    $producto = array();
   
    while($dat = mysql_fetch_array($result)){
        $elproducto[] = array(        
           'label' => $dat["linea"],
          );
        
    }
    echo json_encode($elproducto);
}




//// Muestra cotizacion  /////////

if (!empty($_GET['s_cotizador'])){  
    $marca = $_GET['s_cotiza'];
    $modelo = $_GET['s_cotiza2'];
    $linea = $_GET['s_cotiza3'];

    if ($marca and $modelo and $linea){
        $query = "SELECT  *  FROM cotizador WHERE (marca = '$marca' AND modelo = '$modelo' AND linea = '$linea')";
    } else if ( $marca and !$modelo and !$linea ){
                 $query = "SELECT  *  FROM cotizador WHERE marca = '$marca' ";
                    //echo "<script type=text/javascript>alert('Te falto algo  ')</script>";
    }else if ( $marca and $modelo and !$linea ){
                 $query = "SELECT  *  FROM cotizador WHERE (marca = '$marca'  AND modelo = '$modelo')";
    }
   
    $result=mysql_query($query,$con2);
    echo $tr7;
    while($dato = mysql_fetch_row($result)){
          echo "<tr>";
          //echo "<td align=center ><a href=updateclientes.php?id=".$dato[0].">Editar</a></td> "; 
            echo "<td align=center  >$dato[1]</td>";
            echo "<td align=center  >$dato[2]</td>";
            echo "<td align=center  >$dato[3]</td>";
            echo "<td align=center  >$dato[4]</td>";
            echo "<td align=center >$dato[5]</td>";
            echo "<td align=center >$dato[6]</td>";
            echo "<td align=center  >$dato[7]</td>";
            echo "<td align=center  >$dato[8]</td>";
            echo "<td align=center  >$dato[9]</td>";
          echo "</tr>";
    } 

}
///Genera Catalogo /// 
if (!empty($_GET['s_catalogo'])){  
    $catmarca = $_GET['cat_marca'];
    $catmodelo = $_GET['cat_modelo'];
    $catproducto = $_GET['cat_producto'];

    if ($catmarca and $catmodelo and $catproducto){
        $query = "SELECT  *  FROM cotizador WHERE (marca = '$catmarca' AND modelo = '$catmodelo' AND linea = '$catproducto')";
    } else if ( $catmarca and !$catmodelo and !$catproducto ){
                 $query = "SELECT  *  FROM cotizador WHERE marca = '$catmarca' ";
                    //echo "<script type=text/javascript>alert('Te falto algo  ')</script>";
    }else if ( $catmarca and $catmodelo and !$catproducto ){
                 $query = "SELECT  *  FROM cotizador WHERE (marca = '$catmarca'  AND modelo = '$catmodelo')";
    }
   
    $result=mysql_query($query,$con2);
    echo $tr8;
    while($dato = mysql_fetch_row($result)){
          echo "<tr>";

          echo "<td align=center><button  type=\"button\"   class=\"btn  catalogo\" onClick=catalogo($dato[0]);>Edita</button></td>";
          //echo "<td align=center ><a href=updateclientes.php?id=".$dato[0].">Editar</a></td> "; 
            echo "<td align=center  >$dato[1]</td>";
            echo "<td align=center  >$dato[2]</td>";
            echo "<td align=center  >$dato[3]</td>";
            echo "<td align=center  >$dato[4]</td>";
            echo "<td align=center >$dato[5]</td>";
            echo "<td align=center >$dato[6]</td>";
            echo "<td align=center  >$dato[7]</td>";
            echo "<td align=center  >$dato[8]</td>";
            echo "<td align=center  >$dato[9]</td>";       

         echo "</tr>";
    } 

}


if (!empty($_GET['s_catalogotodo'])){  
  

        $query = "SELECT  *  FROM cotizador order by marca";
                    //echo "<script type=text/javascript>alert('Te falto algo  ')</script>";
       
    $result=mysql_query($query,$con2);
    echo $tr7;
    while($dato = mysql_fetch_row($result)){
          echo "<tr>";
          //echo "<td align=center ><a href=updateclientes.php?id=".$dato[0].">Editar</a></td> "; 
            echo "<td align=center tabindex=1 >$dato[1]</td>";
            echo "<td align=center  tabindex=2 >$dato[2]</td>";
            echo "<td align=center  tabindex=3 >$dato[3]</td>";
            echo "<td align=center tabindex=4 >$dato[4]</td>";
            echo "<td align=center tabindex=5 >$dato[5]</td>";
            echo "<td align=center tabindex=6 >$dato[6]</td>";
            echo "<td align=center tabindex=6 >$dato[7]</td>";
            echo "<td align=center tabindex=6 >$dato[8]</td>";
            echo "<td align=center tabindex=6 >$dato[9]</td>";

          echo "</tr>";
    } 

}




if(!empty($_GET['idcat'])){


    $catid = $_GET['catfolio'];

    $sql2 = "SELECT * from cotizador where id = '$catid'"; 
    $rec2 = mysql_query($sql2,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query); 
    $rows2 = mysql_fetch_row($rec2);
     echo "<strong>Clave: <br> <input type=\"text\"   tabindex=1 id=\"cateditcodigo\" style=\"text-transform:uppercase;\" value=\"$rows2[1]\"><br> ";
     echo "<strong>Descripcion: <br> <input type=\"text\"   tabindex=1 id=\"cateditdescripcion\" style=\"text-transform:uppercase;\" value=\"$rows2[2]\"><br> ";
     echo "<strong>Linea: <br> <input type=\"text\"   tabindex=2 id=\"cateditlinea\" style=\"text-transform:uppercase;\" value=\"$rows2[3]\"><br> ";
     echo "<input type=\"text\"     id=\"cateditid\" style=\"display:none;text-transform:uppercase;\" value=\"$rows2[0]\"><br>";
     echo "Marca:  <br> <input type=\"text\"   tabindex=3  id=\"cateditmar\" style=\"text-transform:uppercase;\" value=\"$rows2[4]\"><br>";
     echo "Modelo: <br> <input type=\"text\"   tabindex=4  id=\"cateditmod\" style=\"text-transform:uppercase;\" value=\"$rows2[5]\"><br>";
     echo "Nombre Comercial: <br> <input type=\"text\"   tabindex=5  id=\"cateditnomcom\" style=\"text-transform:uppercase;\" value=\"$rows2[6]\"><br>";
     echo "Modelos compatibles: <br> <input type=\"text\"   tabindex=6  id=\"cateditmodcompat\" style=\"text-transform:uppercase;\" value=\"$rows2[7]\"><br>";     
     echo "Distribuidor : <br>  <input type=\"text\"   tabindex=8 id=\"cateditdist\" style=\"text-transform:uppercase;\" value=\"$rows2[8]\"></strong><br><br>";
     echo "Publico: <br>  <input type=\"text\"   tabindex=9  id=\"cateditpublico\" style=\"text-transform:uppercase;\" value=\"$rows2[9]\"></strong><br><br>";
     echo "<button type=\"button\"   tabindex=8  id=\"catalogolive\" class=\"btn btn-primary catalogolive\" onClick=editararticulo();>Guardar</button>";

}


if(!empty($_GET['e_catalogolive'])){

  $live_descripcion   = $_GET['cateditdescripcion'];
  $live_codigo        = $_GET['cateditcodigo'];
  $live_id            = $_GET['cateditid'];
  $live_linea         = $_GET['cateditlinea'];
  $live_marca         = $_GET['cateditmar'];
  $live_modelo        = $_GET['cateditmod'];
  $live_nombrecom     = mysql_real_escape_string($_GET['cateditnomcom']);   
  $live_modelocomp    = $_GET['cateditmodcompat'];  
  $live_dist          = $_GET['cateditdist'];
  $live_publico       = $_GET['cateditpublico'];




  
                $query = "UPDATE cotizador SET linea = '$live_linea', marca = '$live_marca', modelo = '$live_modelo', nombrecomer = '$live_nombrecom', modelo_compat = '$live_modelocomp', precio_dist = '$live_dist' , precio_publico = '$live_publico' , clave = '$live_codigo', descripcion = '$live_descripcion' WHERE id = '$live_id'";
                $result = mysqli_query($con,$query);
      if (!$result){
            die('Coudnt query'. mysqli_error($con));
          } else {
                echo "<script type=text/javascript>alert('Articulo editado con exito  $live_id ,  $live_linea , $live_marca , $live_modelo, $live_nombrecom, $live_modelocomp , $live_dist, $live_publico , $live_descripcion ')</script>";
          }

}



////////////////
if(!empty($_GET['pclient'])){

    $pcliente = $_GET['a_cliente'];

    $sql2 = "SELECT folio from dispos where cliente = '$pcliente ' order by folio desc limit 1"; 
    $rec2 = mysql_query($sql2,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query); 
    $rows2 = mysql_fetch_row($rec2);
     echo "$rows2[0]";

}

if(!empty($_GET['id'])){

    $bfolio = $_GET['bfolio'];

    $sql2 = "SELECT bitacora from dispos where folio = '$bfolio'"; 
    $rec2 = mysql_query($sql2,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$query); 
    $rows2 = mysql_fetch_row($rec2);
     echo "$rows2[0]";

}

if(!empty($_GET['en_folio'])){
    
      $enfolio1    = $_GET['enfolio1'];
      $enfolio2    = $_GET['enfolio2'];
      $enfolio3    = $_GET['enfolio3'];
      $enfolio4    = $_GET['enfolio4'];
      $enfolio5    = $_GET['enfolio5'];
      $enfolio6    = $_GET['enfolio6'];
      $enfolio7    = $_GET['enfolio7'];
      $enfolio8    = $_GET['enfolio8'];
      $enfolio9    = $_GET['enfolio9'];
      $enfolio10    = $_GET['enfolio10'];
      $enstatus    = $_GET['enstatus'];


                      
     // WHERE config_name IN('name1', 'name2');
    
    $query = "UPDATE dispos SET status  = '$enstatus'    WHERE  folio IN ('$enfolio1','$enfolio2','$enfolio3','$enfolio4','$enfolio5','$enfolio6','$enfolio7','$enfolio8','$enfolio9','$enfolio10')";

      $result = mysqli_query($con,$query);
      if (!$result){
            die('Coudnt query'. mysqli_error($con));
          } else {
                  if ( $enfolio1 ||  $enfolio2 ||  $enfolio3 ||  $enfolio4 ||  $enfolio5 || $enfolio6 || $enfolio7 || $enfolio8 || $enfolio9 || $enfolio10) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1 $enfolio2 $enfolio3 $enfolio4 $enfolio5 $enfolio6 $enfolio7 $enfolio8 $enfolio9  $enfolio10 actualizados con exito')</script>";
                  }
                  /*
                 if ( $enfolio1 || $enfolio2) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1 y $enfolio2 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1,$enfolio2 y $enfolio3 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3 &&  $enfolio4) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1,$enfolio2,$enfolio3 y $enfolio4 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3 &&  $enfolio4 &&  $enfolio5) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1,$enfolio2,$enfolio3,$enfolio4 y $enfolio5 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3 &&  $enfolio4 &&  $enfolio5 && $enfolio6) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1,$enfolio2,$enfolio3,$enfolio4,$enfolio5 y $enfolio6 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3 &&  $enfolio4 &&  $enfolio5 && $enfolio6 && $enfolio7) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1,$enfolio2,$enfolio3,$enfolio4,$enfolio5,$enfolio6 y $enfolio7 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3 &&  $enfolio4 &&  $enfolio5 && $enfolio6 && $enfolio7 && $enfolio8) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1,$enfolio2,$enfolio3,$enfolio4,$enfolio5,$enfolio6, $enfolio7 y $enfolio8 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3 &&  $enfolio4 &&  $enfolio5 && $enfolio6 && $enfolio7 && $enfolio8 && $enfolio9) {
                      echo "<script type=ditext/javascript>alert('Articulos con folio $enfolio1,$enfolio2,$enfolio3,$enfolio4,$enfolio5,$enfolio6, $enfolio7, $enfolio8 y $enfolio9 actualizados con exito')</script>";
                  }
                  if ( $enfolio1 &&  $enfolio2 &&  $enfolio3 &&  $enfolio4 &&  $enfolio5 && $enfolio6 && $enfolio7 && $enfolio8 && $enfolio9 && $enfolio10) {
                      echo "<script type=text/javascript>alert('Articulos con folio $enfolio1,$enfolio2,$enfolio3,$enfolio4,$enfolio5,$enfolio6, $enfolio7, $enfolio8, $enfolio9 y && $enfolio10 actualizados con exito')</script>";
                  }*/
          }
}

if(!empty($_GET['tec_folio'])){

      $tecfolio1    = $_GET['tecfolio1'];
      $tecfolio2    = $_GET['tecfolio2'];
      $tecfolio3    = $_GET['tecfolio3'];
      $tecfolio4    = $_GET['tecfolio4'];
      $tecfolio5    = $_GET['tecfolio5'];
      $tecfolio6    = $_GET['tecfolio6'];
      $tecfolio7    = $_GET['tecfolio7'];
      $tecfolio8    = $_GET['tecfolio8'];
      $tecfolio9    = $_GET['tecfolio9'];
      $tecfolio10    = $_GET['tecfolio10'];
      $tectecnico   = $_GET['tecstatus'];
      


                      
     // WHERE config_name IN('name1', 'name2');
    
    $query = "UPDATE dispos SET tecnico  = '$tectecnico'    WHERE  folio IN ('$tecfolio1','$tecfolio2','$tecfolio3','$tecfolio4','$tecfolio5','$tecfolio6','$tecfolio7','$tecfolio8','$tecfolio9','$tecfolio10')";

      $result = mysqli_query($con,$query);
      if (!$result){
            die('Coudnt query'. mysqli_error($con));
          } else {
                  if ( $tecfolio1 ||  $tecfolio2 ||  $tecfolio3 ||  $tecfolio4 ||  $tecfolio5 || $tecfolio6 || $etecfolio7 || $tecfolio8 || $tecfolio9 || $tecfolio10) {
                      echo "<script type=text/javascript>alert('Articulos con folio $tecfolio1 $tecfolio2 $tecfolio3 $tecfolio4 $tecfolio5 $tecfolio6 $tecfolio7 $tecfolio8 $tecfolio9  $tecfolio10 actualizados con exito')</script>";
                  }
                 
          }
}


if (!empty($_GET['imp_folio'])){  
      $impfolio1    = $_GET['impfolio1'];
      $impfolio2    = $_GET['impfolio2'];
      $impfolio3    = $_GET['impfolio3'];
      $impfolio4    = $_GET['impfolio4'];
      $impfolio5    = $_GET['impfolio5'];
      $impfolio6    = $_GET['impfolio6'];
      $impfolio7    = $_GET['impfolio7'];
      $impfolio8    = $_GET['impfolio8'];
      $impfolio9    = $_GET['impfolio9'];
      $impfolio10    = $_GET['impfolio10'];


      $query = "SELECT folio,imei,access from dispos where folio IN('$impfolio1','$impfolio2','$impfolio3','$impfolio4','$impfolio5','$impfolio6','$impfolio7','$impfolio8','$impfolio9','$impfolio10')";

/*<div id="content">
  <div id="left">
     <div id="object1"></div>
     <div id="object2"></div>
  </div>

  <div id="right">
     <div id="object3"></div>
     <div id="object4"></div>
  </div>
</div>
*/
  
   
    $result=mysql_query($query,$con2);
    while($dato = mysql_fetch_row($result)){
          
             echo "<br><div style=\"width:259px; height:124.5px;margin-left:-40px;margin-top:-65px;position:relative;top:70%;clear:both;\"><br><div align=center  ><p><img height=\"32\" width=\"182\" src=barcode/barcode.php?text=".$dato[0]."/></p>";
             echo "<p  style=\"font-size:15px; \">$dato[1]</p>";
             echo "<p style=\"font-size:15px;width:192px;\">$dato[2]</p></div>"; 
             echo "</div>";
	     echo "<br><br><br>";
    
         
    } 

}



////IMRPIMIR////



if (!empty($_GET['pclient2'])){  

  $pcliente2 = $_GET['a_cliente'];

    $sql2 = "SELECT email,celular,telefono,RFC,domicilio,colonia,ciudad,cpostal from cliente where nombre = '$pcliente2'"; 
    $result = mysql_query($sql2,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$sql2); 

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
    $fsucur   = $_GET['f_sucur'];
    $fechaini = $_GET['f_fecha_i'];
    $fechater = $_GET['f_fecha_t'];

    switch ($fpor) {
      case 'GarantiaNoen':
          $queryn = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status = 'listo' and reparacion = 'Grantia') and  fecha between '$fechaini%'  and  '$fechater%'";    
          $result=mysql_query($queryn,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$queryn);
          echo $tr4;
          while($dato = mysql_fetch_row($result)){
            echo "<tr>";
              echo "<td  align=center>$dato[0]</td>";
              echo "<td  align=center>".$dato[1]."No entregado</td>";
              echo "<td  align=center>$dato[2]</td>";
              echo "<td  align=center>".$fechaini." & ".$fechater."</td>";            
            echo "</tr>";
          }
        break;
      case 'GarantiaEn':
          $querye = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status = 'Entregado' and reparacion = 'Grantia') and  fecha between '$fechaini%'  and  '$fechater%'";    
          $result=mysql_query($querye,$con2) or die ("Query failed: ".mysql_error()."Actual query:".$querye);
          echo $tr4;
          while($dato = mysql_fetch_row($result)){
             echo "<tr>";
              echo "<td  align=center>$dato[0]</td>";
              echo "<td  align=center>Garantia".$dato[1]."</td>";
              echo "<td  align=center>$dato[2]</td>";
              echo "<td  align=center>".$fechaini." & ".$fechater."</td>";            
            echo "</tr>";
          }  
        break;
        ##ESTO ESTA PENDIENTE Sin cargo  alguno ##
        case 'Todos':         
            $querye = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status IS NOT NULL) and  fecha between '$fechaini%'  and  '$fechater%' group by status order by count(folio)";    
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
        $query = "SELECT count(folio),status,sucursal from dispos where (sucursal = '$fsucur' and status = '$fpor') and  fecha between '$fechaini%'  and  '$fechater%'";    
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
    $fsucur   = $_GET['f_sucur'];
    $fechaini = $_GET['f_fecha_i'];
    $fechater = $_GET['f_fecha_t'];
    switch ($fpor) {
      case 'GarantiaNoen':
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur' and status = 'listo' and reparacion = 'Grantia') and  fecha between '$fechaini%'  and  '$fechater%' order by fecha desc";    
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
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur' and status = 'Entregado' and reparacion = 'Grantia') and  fecha between '$fechaini%'  and  '$fechater%' order by fecha desc";    
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
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur')  and  fecha between '$fechaini%'  and  '$fechater%'   order by status desc";
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
        $query = "SELECT folio,modelo,cliente,status,sucursal,fecha from dispos where (sucursal = '$fsucur' and status = '$fpor') and  fecha between '$fechaini%'  and  '$fechater%' order by fecha desc";    
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
