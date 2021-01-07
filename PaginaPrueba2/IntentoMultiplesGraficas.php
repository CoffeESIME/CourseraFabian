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
                    width: 50%;
                    height: 50px;
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
                    max-height:300px;
                    overflow-y:auto;
                }
            </style>
    <script src="Javascriptsweb/jquery.min.js"></script>
    <script src="Javascriptsweb/Chart.min.js"></script>
    <script src="Javascriptsweb/jquery-ui.min.js"></script>
    <script src='Javascriptsweb/plotly-latest.min.js'></script>
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
            <div class="divTabla">
            <div class="divTablaCuerpo">
                <div class="divTablaFila">
                    <div class="divTablaCelda" id="Graficalineal2"></div>
                    <div class="divTablaCelda"  ><canvas id="Graficalineal3" style="divtamano "></canvas></div>
                </div>
            </div>
        </div>
                
                        <div id="Graficalineal1" style="max-width:100%; "></div>
                        
                    <div style="divtamano ">
                        
                        <canvas id="Graficalineal5" style="max-width:100%; "></canvas>
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
             if(desdefecha != '' && hastafecha != '')  
             {  
                 $.ajax({  
                     url:"ObtenciondeDatosMultiples.php",  
                     method:"POST",  
                     data:{desdefecha:desdefecha, hastafecha:hastafecha},
                     success:function(data)   {
                var datos = JSON.parse(data);
                var tiempo = [];
                var valor1 = [];
                var valor2 = [];
                var valor3 = [];
                var valor4 = [];
                for(var i in datos) {
                    tiempo.push(datos[i].tiempo);
                    valor1.push(datos[i].valor1);
                    valor2.push(datos[i].valor2);
                    valor3.push(datos[i].valor3);
                    valor4.push(datos[i].valor4);
                }
//                var datosParaGrafica1 = {
//                    labels: tiempo,
//                    datasets : [
//                        {
//                            label: 'Temperatura °C:',
//                            backgroundColor: 'rgba(17, 149, 93, 0.5)',
//                            borderColor: 'rgba(232, 230, 230, 0.75)',
//                            data: valor1
//                        }, {
//                            label: 'Tension V:',
//                            backgroundColor: 'rgba(206, 101, 10, 0.5)',
//                            borderColor: 'rgba(232, 230, 230, 0.75)',
//                            data: valor3
//                        }
//                    ]
//                };
                var datosParaGrafica2 = {
                    labels: tiempo,
                    datasets : [
                        {
                            label: 'Frecuencia HZ:',
                            backgroundColor: 'rgba(30, 34, 32, 0.5)',
                            borderColor: 'rgba(232, 230, 230, 0.75)',
                            data: valor2,
                            yAxisID: "A",
                        }
                    ]
                };
                         
                         var DATOS1= {
                             x: tiempo,
                             y: valor1, 
                             name: 'Temperatura',
                             type: 'scatter',
                             line: {
                                 color: 'rgb(219, 213, 64)'
                             }
                         };
                         var DATOS2 = {
                             x: tiempo,
                             y: valor3,
                             name: 'Tensión',
                             line: {shape: 'spline'},
                             yaxis: 'y2',
                             type: 'scatter',
                            line: {
                                 color: 'rgb(0, 137, 26)'
                             }
                         };
                         var DATOS3 = {
                             x: tiempo,
                             y: valor2,
                             name: 'Frecuencia',
                             line: {shape: 'spline'},
                             yaxis: 'y3',
                             type: 'scatter',
                            line: {
                                 color: 'rgb(9, 41, 177)'
                             }
                         };
                        var DATOS6 = {
                             x: tiempo,
                             y: valor2,
                             name: 'Frecuencia',
                             line: {shape: 'spline'},
                             type: 'scatter',
                            line: {
                                 color: 'rgb(9, 41, 177)'
                             }
                         };
                        var DATOS4 = {
                             x: tiempo,
                             y: valor4,
                             name: 'V. Promedio de Fase',
                             line: {shape: 'spline'},
                             yaxis: 'y4',
                             type: 'scatter',
                            line: {
                                 color: 'rgb(173, 1, 1)'
                             }
                         };
                         var data = [DATOS1, DATOS2,DATOS3,DATOS4];
                         var layout = {
                             title: 'Temperatura - Tension',
                             
                             xaxis: {domain: [0.2, 0.8]},
                             yaxis: {title: 'Temperatura',
                                     range: [0, 30]},
                             yaxis2: {
                                 title: 'Tension',
                                 titlefont: {color: 'rgb(148, 103, 189)'},
                                 tickfont: {color: 'rgb(148, 103, 189)'},
                                 overlaying: 'y',
                                 side: 'left',
                                 anchor: 'free',
                                 position: .95,
                                 range: [124, 133]
                             },
                            yaxis3: {
                                 title: 'Frecuencia',
                                 titlefont: {color: 'rgb(73, 72, 74)'},
                                 tickfont: {color: 'rgb(11, 11, 11)'},
                                 overlaying: 'y',
                                 side: 'left',
                                anchor: 'free',
                              position: 0.1,
                                range: [59.5, 60.5]
                             },
                            yaxis4: {
                                 title: 'Voltaje Promedio de Fase',
                                 titlefont: {color: 'rgb(73, 72, 74)'},
                                 tickfont: {color: 'rgb(11, 11, 11)'},
                                 overlaying: 'y',
                                 side: 'left',
                                anchor: 'free',
                              position: 0.85,
                                range: [70, 90]
                             }
                         };
                        var layout2 = {
                            title: 'Frecuencia',
                            height:'400',
                            xaxis: {domain: [0.2, 0.8]},
                            yaxis: {title: 'Hz',
                                     range: [59.5, 60.5]}};
                         Plotly.newPlot('Graficalineal1', data, layout);
                         var dg2=[DATOS6];
                         
                         Plotly.newPlot('Graficalineal2', dg2,layout2);
                         
                         
                         var datosParaGrafica3 = {
                             labels: tiempo,
                             datasets : [{
                                 label: 'Temperatura °C:',
                                 backgroundColor: 'rgba(17, 149, 93, 0.5)',
                                 borderColor: 'rgba(232, 230, 230, 0.75)',
                                 data: valor1
                        }
                    ]
                };
                var datosParaGrafica5 = {
                    labels: tiempo,
                    datasets : [
                        {
                            label: 'Temperatura °C:',
                            backgroundColor: 'rgba(17, 149, 93, 0.5)',
                            borderColor: 'rgba(250, 202, 0, 0.75)',
                            data: valor1,
                            yAxisID: "A",
                             lineTension: 0.4,   
                            fill: false,
                             pointRadius:1

                        }, 
                        {
                            label: 'Tension V:',
                            backgroundColor: 'rgba(206, 101, 10, 0.5)',
                            borderColor: 'rgba(250, 36, 36, 0.75)',
                            data: valor3,
                            yAxisID: "B",
                             lineTension: 0,   
                            fill: false,
                             pointRadius:1
                        },                        
                        {
                            label: 'Frecuencia HZ:',
                            backgroundColor: 'rgba(30, 34, 32, 0.5)',
                            borderColor: 'rgba(129, 120, 120, 0.75)',
                            data: valor2,
                            yAxisID: "C",
                            fill: false,
                             pointRadius:1
                        },
                        {
                            label: ' Voltaje Promedio de Fase:',
                            backgroundColor: 'rgba(30, 34, 32, 0.5)',
                            borderColor: 'rgba(129, 120, 120, 0.75)',
                            data: valor4,
                            lineTension: 0.4,   
                            fill: false,
                            pointRadius:1,
                            yAxisID: "D",
                        }
                    ]
                };
//                var line_canvas1 = $("#Graficalineal1");
//                var lineGraph = new Chart(line_canvas1, {
//                    type: 'line',
//                    data: datosParaGrafica1
//                });
//                var line_canvas2 = $("#Graficalineal2");
//                var lineGraph = new Chart(line_canvas2, {
//                    type: 'line',
//                    data: datosParaGrafica2,
//                    options: {
//                        scales: {
//                            yAxes: [{
//                                id: 'A',
//                                type: 'linear',
//                                position: 'left',
//                                ticks: {
//                                    max: 60.5,
//                                    min: 59.5
//                                }
//                            } ]
//                        }
//                    }
//               
//                }
//                                         );
                var line_canvas3 = $("#Graficalineal3");
                var lineGraph = new Chart(line_canvas3, {
                    type: 'line',
                    data: datosParaGrafica3
                });

                var line_canvas5 = $("#Graficalineal5");
                var lineGraph = new Chart(line_canvas5, {
                    type: 'line',
                    responsive: true,
                    hoverMode: 'index',
                    stacked: false,
                    data: datosParaGrafica5,
                    options: {
                        scales: {
                            yAxes: [{
                                id: 'A',
                                type: 'linear',
                                position: 'left',
                                ticks: {
                                    max: 30,
                                    min: 0
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Temperatura'
                                }
                            }, {
                                id: 'B',
                                type: 'linear',
                                position: 'right',
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Tension'
                                }
                            }, {
                                id: 'C',
                                type: 'linear',
                                position: 'right',
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Frecuencia'
                                },
                                ticks: {
                                    max: 60.5,
                                    min: 59.5
                                }
                            },{
                                id: 'D',
                                type: 'linear',
                                position: 'right',
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Voltaje Promedio de Fase'
                                },
                                ticks: {
                                    max: 90,
                                    min: 70
                                }
                            }]
                        }
                    }
                }
                                         );
            }, 
                 });  
             }  
             else  
             {  
                 alert("Por favor selecciona los datos necesarios");  
             }  
         });  
     });  
 </script>
