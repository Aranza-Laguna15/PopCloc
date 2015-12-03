<?php 
session_start();
 //los atributos de abajo son los que tenemos que modificar
//$username = "$popclocdatabase"; 
//    $password = "l7MkorqZfMw9whohAWeuzQARfKCurakHiASJTv256GkltF2itbBspaqfohks"; 
    $host = "tcp:b63ioz7h2m.database.windows.net,1433"; 
  //  $dbname = "databasepopcloc"; 
$con= array("Database"=>"databasepopcloc","UID"=>"popcloc@b63ioz7h2m","PWD"=>"Manuel_$%&amp");
 try 
    { 
        $db = sqlsrv_connect($host,$con); 
} 
    catch(PDOException $ex) 
    { 
        die("Error al conectar la base de datos: " . $ex->getMessage()); 
    } 
     
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     
    $correo = $_REQUEST['correo'];
    $contraseña = $_REQUEST['contraseña'];
    $consulta = "SELECT 
                *
            FROM usuarios 
            WHERE 
                correo = 'correo'  AND contraseña = 'contraseña'";
    $res = sqlsrv_query($db , $consulta, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    if($res == true){
    $_SESSION['valid_user'] = true;
    $_SESSION['correo'] = $correo;
    header('Location: ../index.php');
    die();
}else{
    header('Location: error.html');
    die();
}
?>
