  
<?php
    $servidor = "localhost:3307";
$usuario = "root";
$contraseña = "12Telemetic12";
$BasedeDatos= "grdxf";

$conn = new mysqli($servidor, $usuario, $contraseña, $BasedeDatos);
if ($conn->connect_error) {
  die("Fallo Conexion: " . $conn->connect_error);
}

$comandosql = "SELECT timestamp, sum(CASE WHEN address = 1 THEN value END) 'Corriente mA', sum(CASE WHEN address = 2 THEN value END) 'Frecuencia Hz', sum(CASE WHEN address = 3 THEN value END) 'Tension V', sum(CASE WHEN address = 4 THEN value END) 'Factor Total de Potencia' FROM historical WHERE grd_id=1 AND register_type =  11 AND (timestamp>= '2020-12-15 0 ' AND timestamp<= '2020-12-16 0 ' ) GROUP BY timestamp";
$resultado = $conn->query($comandosql);
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $t=sizeof($fila);
    $T=0;
    $y=array_keys($fila);
    echo ' <table border="10" bgcolor="#cbcccc" class="tablaA"><caption>Tabla de Datos </caption><tr>';        
    while($t>$T){
            echo '<th>' . $y[$T]. '</th>';
    $T=$T+1;
        }
    $T=0;
echo '</tr><tr>';
  while($fila = $resultado->fetch_assoc()) {
             while($t>$T){
            echo '<td>' . $fila[$y[$T]]. '</td>';
    $T=$T+1;
        }
      $T=0;
  echo '</tr>';
  }
 
 echo '</table>';                  
    
     
  }

        else {
  echo "0 resultados";
}
$conn->close();
?>