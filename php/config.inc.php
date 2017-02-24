<?php 
session_start();
 $username = "popcloc@*******"; 
    $password = "*******"; 
    $host = "********.database.windows.net,****"; "; 
    $dbname = 'databasepopcloc'; 
    $connectinfo = array("Database"=>$dbname, "UID"=>$username, "PWD"=>$password, "MultipleActiveResultSets"=>true);
    sqlsrv_configure('WarningsReturnAsErrors',0);
//$db = new PDO("sqlsrv:server=$host,Database=$dbname", $username, $password);
$con = sqlsrv_connect($host, $connectinfo);
 if($con == true){
  echo "Conexión establecida");
 }else{
 echo "Error al conectar la base de datos\n";
  die(print_r( sqlsrv_errors(), true));
 }
     //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     //$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     
    $nombreusuario = $_REQUEST['nombreusuario'];
    $contraseña = $_REQUEST['contraseña'];
    $consulta = "SELECT * FROM usuarios WHERE nombreusuario = 'nombreusuario'  AND contraseña = 'contraseña'";
    $res = sqlsrv_query($con , $consulta);
    if($res == true){
    $_SESSION['valid_user'] = true;
    $_SESSION['nombreusuario'] = $nombreusuario;
    header('Location: intro-page.html');
    die();
}else{
    header('Location: ../index.php');
    die(print_r( sqlsrv_errors(), true));
}
?>
