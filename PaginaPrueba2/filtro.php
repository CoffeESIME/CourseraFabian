
<?php  
 if(isset($_POST["desdefecha"], $_POST["hastafecha"],$_POST["direccion"] ))  
 {  
      $conexion = mysqli_connect("localhost:3307", "root", "12Telemetic12", "grdxf");
      $salida = '';  
      $seleccion = "  
           SELECT * FROM historical  
           WHERE timestamp >= '".$_POST["desdefecha"]."' AND timestamp<'".$_POST["hastafecha"]."' AND address ='".$_POST["direccion"]."'  
      ";  
      $resultado= mysqli_query($conexion, $seleccion);  
      $salida .= '  
           <table border="10" bgcolor="#cbcccc" class="tablaA">  
                <tr>  
                     <th>grd_id</th>   
                     <th>Fecha y hora</th>  
                     <th>Valor</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($resultado) > 0)  
      {  
           while($fila = mysqli_fetch_array($resultado))  
           {  
               
                $salida .= '  
                     <tr>  
                          <td>'. $fila["address"] .'</td>   
                          <td>'. $fila["timestamp"] .'</td>  
                          <td>'. $fila["value"] .'</td>  
                     </tr>  
                ';  
           }  

      }  
      else  
      {  
           $salida .= '  
                <tr>  
                     <td colspan="3">No se encontraron resultados</td>  
                </tr>  
           ';  
      }  
      $salida .= '</table>';  
     echo $salida;

 }  
 ?>
