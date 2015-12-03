<?php 

 //los atributos de abajo son los que tenemos que modificar
//$username = "$popclocdatabase"; 
//    $password = "l7MkorqZfMw9whohAWeuzQARfKCurakHiASJTv256GkltF2itbBspaqfohks"; 
    $host = "tcp:b63ioz7h2m.database.windows.net,1433"; 
  //  $dbname = "databasepopcloc"; 
    
$con= array("Database"=>"databasepopcloc","Uid"=>"$popclocdatabase","PWD"=>"l7MkorqZfMw9whohAWeuzQARfKCurakHiASJTv256GkltF2itbBspaqfohks");
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
     
    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 
    { 
        function undo_magic_quotes_gpc(&$array) 
        { 
            foreach($array as &$value) 
            { 
                if(is_array($value)) 
                { 
                    undo_magic_quotes_gpc($value); 
                } 
                else 
                { 
                    $value = stripslashes($value); 
                } 
            } 
        } 
     
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    } 
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 


?>