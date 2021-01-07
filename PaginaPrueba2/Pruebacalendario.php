 <?php                                                                       
session_start();
if (!isset($_SESSION['nivel']))
{ header("Location: PaginaIniciodeSesion.php");
  exit();
}
?>
<?php  
 $connexion = mysqli_connect("localhost:3307", "root", "12Telemetic12", "grdxf");
 $seleccion = "SELECT * FROM `historical`  ORDER BY timestamp  DESC LIMIT 10 ";  
 $resultado = mysqli_query($connexion, $seleccion);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
          <style>
                body{
                    background-color: white;
                }
                .tablaA
                {
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                }
                .jumbotronPiedePagina{ 
                    background:linear-gradient(white, #ffffff);
                    width:100%;
                    padding:10px 10px 10px;
                    margin-top:auto;
                    margin-bottom: auto;
                    bottom:auto;
                    position:relative;
                    text-align:center;
                }
                .jumbotronPiedePagina2{
                    margin-bottom:2px; 
                    background:white;
                    width:98%;
                    padding:0px;
                    margin-top:7px;
                    bottom:3px;
                    position:relative;
                    text-align:center;
                }
                .jumbotronCabecera{
                    margin-bottom:2px; 
                    background:linear-gradient(white, #ffffff);
                    padding:20px 10px 10px 10px;
                    margin-top:7px; 
                    text-align: center;}
                .imagenizquierda{
                    float:left;
                    width: 250px;
                }
                .imagenderecha{
                    float:right;
                    position: relative;
                    width: 100%;
                }
                .estilodelista1{
                    list-style-type: none;
                }  
                .divTabla{ 
                    display: table; 
                    width: 100%;
                }
                .divTablaFila { 
                    display: table-row; 
                }
                .divTablaCabecera { 
                    display: table-header-group;
                }
                .divTablaCelda, .divTablaCabeza{ 
                    display: table-cell;
                    text-align: left;
                    font-family: Rubik,sans-serif;
                }
                .divTablaCuerpo { 
                    display: table-row-group;
                }
                .celda{
                    padding: 5px 40px 5px 40px;
                    text-align: "center";
                }
                ul {
                    display: block;
                    list-style-type: disc;
                    margin-block-start: 1em;
                    margin-block-end: 1em;
                    margin-inline-start: 0px;
                    margin-inline-end: 0px;
                    padding-inline-start: 0px;
                }
                h1{
                    font-size: 30px;
                }
                .divtamano {
                    max-height:500px;
                    overflow-y:auto;
                }
            </style>

           <title>Visualización de datos por fecha</title>  
           <script src="Javascriptsweb\jquery.min.js"></script>  
 
           <script src="Javascriptsweb\jquery-ui.min.js"></script>  
           <link rel="stylesheet" href="CSSweb\jquery-ui.css">  
      </head>  
      <body>  
          <header class="jumbotron jumbotronCabecera">
              <?php include('CabeceraIniciado.php'); ?>
          </header>
            <hr>
                          <nav>
                    <ul>
                        <?php include('BarradeNavegacion.php'); ?>
                    </ul>
                </nav>

           <div  class="divtamano">  
                <h2 align="center">Busqueda por Fecha</h2>  
                <h3 align="center">Datos ordenados</h3> 
                <div>  
                     <input type="text" name="from_date" id="desde" placeholder="Desde" />  
                </div>  
                <div>  
                     <input type="text" name="to_date" id="hasta" placeholder="Hasta" />  
                </div>  
                                <div>  
                     <input type="text" name="from_date" id="direccion" placeholder="Dirección" />  
                </div> 
                <div>  
                     <input type="button" name="filtro" id="filtro" value="Filtrar"  />  
                </div>  

                <div id="TablaOrdenada">  
                     <table border="10" bgcolor="#cbcccc" class="tablaA">  
                          <tr>  
                               <th>Direccion</th>    
                               <th>Fecha y hora</th>  
                               <th >Valor</th>  
                          </tr>  
                     <?php  
                     while($fila = mysqli_fetch_array($resultado))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $fila["address"]; ?></td>  
                               <td> <?php echo $fila["timestamp"]; ?></td>  
                               <td><?php echo $fila["value"]; ?></td>  
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
          <div>
                <hr>
              <footer class="jumbotron jumbotronPiedePagina">
                  <?php include('Pie.php'); ?>
              </footer>
          </div>
      </body>  
 </html>  

 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd' ,
                     changeMonth: true,
      changeYear: true
           });  
           $(function(){  
                $("#desde").datepicker();  
                $("#hasta").datepicker();  
           });  
           $('#filtro').click(function(){  
                var desdefecha = $('#desde').val();  
                var hastafecha = $('#hasta').val();
               var direccion=$('#direccion').val();
                if(desdefecha != '' && hastafecha != '')  
                {  
                     $.ajax({  
                          url:"filtro.php",  
                          method:"POST",  
                          data:{desdefecha:desdefecha, hastafecha:hastafecha,direccion:direccion},
                         success:function(data) 
                          {  
                               $('#TablaOrdenada').html(data);
                          }  
                     });  
                }  
                else  
                {  
                     alert("Por favor selecciona los datos necesarios");  
                }  
           });  
      });  
 </script>