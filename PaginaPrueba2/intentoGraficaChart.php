 <?php                                                                       
session_start();
if (!isset($_SESSION['nivel']))
{ header("Location: PaginaIniciodeSesion.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grafica</title>
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
    <script src="Javascriptsweb/jquery.min.js"></script>
    <script src="Javascriptsweb/Chart.min.js"></script>
    <script src="Javascriptsweb/jquery-ui.min.js"></script>  
    <link rel="stylesheet" href="CSSweb/jquery-ui.css"> 
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
    <div>  
        <h2 align="center">Busqueda por Fecha</h2>  
        <h3 align="center">Grafica</h3> 
        <div>  
            <input type="text" name="from_date" id="desde" placeholder="Desde" />  
        </div>  
        <div>  
            <input type="text" name="to_date" id="hasta" placeholder="Hasta" />  
        </div>  
        <div>  
            <input type="button" name="filtro" id="filtro" value="Filtrar"  />  
        </div>                
    </div>
    <canvas id="Graficalinea" style="background-color: #ffffff;"></canvas>
    <b>Grafica lineal</b>
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
            if(desdefecha != '' && hastafecha != '')  
            {  
                $.ajax({  
                    url:"obtienedatos.php",  
                    method:"POST",  
                    data:{desdefecha:desdefecha, hastafecha:hastafecha},
                    success:function(data)  
                    {         
                        var datos = JSON.parse(data);
                        var tiempo = [];
                        var valor = [];
                        for(var i in datos) {
                            tiempo.push(datos[i].tiempo);
                            valor.push(datos[i].valor);
                        }
        var lineChartData = {
			labels: tiempo,
			datasets: [{
				label: 'My First dataset',
                            backgroundColor: 'rgba(17, 149, 93, 0.5)',
                            borderColor: 'rgba(232, 230, 230, 0.75)',
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
				yAxisID: 'y-axis-1',
			}, {
				label: 'My Second dataset',
                            backgroundColor: 'rgba(17, 149, 93, 0.5)',
                            borderColor: 'rgba(232, 230, 230, 0.75)',
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
				yAxisID: 'y-axis-2'
			},
                      {
				label: 'My 3 dataset',
                            backgroundColor: 'rgba(17, 149, 93, 0.5)',
                            borderColor: 'rgba(232, 230, 230, 0.75)',
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
				yAxisID: 'y-axis-3'
			}]
		};
                var line_canvas5 = $("#Graficalinea");
new Chart(line_canvas5 , {
  type: 'line',
  data: {
    labels: ['1', '2', '3', '4', '5'],
    datasets: [{
      label: 'A',
      yAxisID: 'A',
      data: [100, 96, 84, 76, 69]
    }, {
      label: 'B',
      yAxisID: 'B',
      data: [1, 1, 1, 1, 0]
    }]
  },
  options: {
    scales: {
      yAxes: [{
        id: 'A',
        type: 'linear',
        position: 'left',
      }, {
        id: 'B',
        type: 'linear',
        position: 'right',
        ticks: {
          max: 1,
          min: 0
        }
      }]
    }
  }
});
                                       
                    }
                }  
                      );  
            }  
            else  
            {  
                alert("Por favor selecciona los datos necesarios");  
            }  
        });  
    });  
 </script>

<script>

	</script>