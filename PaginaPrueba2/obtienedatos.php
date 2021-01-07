<?php
 if(isset($_POST["desdefecha"], $_POST["hastafecha"]))  
 { 
require("configuracion.php");
$get_data = $conn->prepare("  
           SELECT * FROM historical  
           WHERE timestamp > '".$_POST["desdefecha"]."' AND timestamp<'".$_POST["hastafecha"]."'  
      ");
$get_data->execute();
if($get_data->rowCount()>0){
 while($value = $get_data->fetch(PDO::FETCH_OBJ)){
  $tiempo = $value->timestamp;
  $valor = $value->value;
  $result_array[] = ['tiempo'=>$tiempo, 'valor'=>$valor];
 }
 echo json_encode($result_array);
 die();
}
 }
else{
    require("configuracion.php");
$get_data = $conn->prepare("SELECT * FROM `historical`  LIMIT 10");
$get_data->execute();
if($get_data->rowCount()>0){
 while($value = $get_data->fetch(PDO::FETCH_OBJ)){
  $tiempo = $value->timestamp;
  $valor = $value->value;
  $result_array[] = ['tiempo'=>$tiempo, 'valor'=>$valor];
 }
 echo json_encode($result_array);
 die();
    
}
}
?> 



