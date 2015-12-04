<?php 
session_start();
$username = "popcloc@b63ioz7h2m"; 
    $password = "Manuel_$%&"; 
    $host = "tcp:b63ioz7h2m.database.windows.net,1433"; 
    $dbname = "databasepopcloc"; 
$db = new PDO("sqlsrv:server=$host,Database=$dbname", $username, $password); 
 if($db){
  alert('Conexión establecida');
 }else{
 alert('Error al conectar la base de datos\n');
  die(print_r( sqlsrv_errors(), true));
 }
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     
    $correo = $_REQUEST['nombreusuario'];
    $contraseña = $_REQUEST['contraseña'];
    $consulta = "SELECT * FROM usuarios WHERE correo = 'nombreusuario'  AND contraseña = 'contraseña'";
    $res = sqlsrv_query($db , $consulta, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    if($res == true){
    $_SESSION['valid_user'] = true;
    $_SESSION['nombreusuario'] = $correo;
    header('Location: intro-page.php');
    die();
}else{
    header('Location: ../index.php');
    die();
}
?>
