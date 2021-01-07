 <?php                                                                       
session_start();
if (!isset($_SESSION['nivel']))
{ header("Location: PaginaIniciodeSesion.php");
  exit();
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>HMI</title>
    <script src="Javascriptsweb/termometro.js"></script>
    <script src="Javascriptsweb/jquery.min.js"></script>
    <script src="Javascriptsweb/d3tanque2.js"></script>
    <script src="Javascriptsweb/indicador.js"></script>
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
                    font-size: 15px;
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
                    font-size: 13px;
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
                    overflow:auto;

}
              div.blueTable {
                  border: 3px solid #1C6EA4;
                  background-color: #EEEEEE;
                  width: 500px;
        
                  text-align: center;
                  border-collapse: collapse;
                  text-align: center;
                  margin-left: auto;
                  margin-right: auto;
        }
        .divTable.blueTable .divTableCell, .divTable.blueTable .divTableHead {
            border: 0px solid #AAAAAA; /*para dar separacion de celdas*/
            padding: 3px 2px;
        }
        .divTable.blueTable .divTableBody .divTableCell {
            font-size: 15px;
        }
        .divTable.blueTable .divTableRow:nth-child(even) {
            background: #D0E4F5;
        }
        .blueTable .tableFootStyle {
            font-size: 14px;
        }
        .blueTable .tableFootStyle .links {
            text-align: right;
        }
        .blueTable .tableFootStyle .links a{
            display: inline-block;
            background: #1C6EA4;
            color: #FFFFFF;
            padding: 2px 8px;
            border-radius: 5px;
        }
        .blueTable.outerTableFooter {
            border-top: none;
        }
        .blueTable.outerTableFooter .tableFootStyle {
            padding: 3px 5px; 
        }
        .divTable{ display: table; }
        .divTableRow { display: table-row; }
        .divTableHeading { display: table-header-group;}
        .divTableCell, .divTableHead { display: table-cell; text-align: center}
        .divTabletanque{width: 100px; padding-bottom: 0px; padding-left: 50px; padding-top: 30px; padding-right: 0px; text-align: center}
        .divTableHeading { display: table-header-group;}
        .divTableFoot { display: table-footer-group;}
        .divTableBody { display: table-row-group;}  
        @font-face{
 font-family:'Digital';
 src: url('CSSweb/loopy/LOOPY_IT.ttf');
}
    </style>
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
        <hr>
        <h3 align="center">Bienvenido a tu historial de datos Mimico</h3>
        <hr>
        <div class="divTable blueTable">
            <div class="divTableBody">
                <div class="divTableRow">
                    <div class="divTableCell" id="actualiza1"></div><div class="divTabletanque" id="actualiza2" ></div><div class="divTableCell" id="actualiza3"></div></div>
                                <div class="divTableRow">
                    <div  class="divTableCell">Temperatura</div>
                    <div class="divTableCell">Nivel</div>
                    <div class="divTableCell">Presión</div>
                    </div>
                                <div class="divTableRow">
                    <div class="divTableCell" id="actualiza4"></div><div class="divTabletanque" id="actualiza5" ></div><div class="divTableCell" id="actualiza6"></div></div>
                                <div class="divTableRow">
                    <div  class="divTableCell">Temperatura</div>
                    <div class="divTableCell">Nivel</div>
                    <div class="divTableCell">Presión</div>
                    </div>
                                <div class="divTableRow">
                    <div class="divTableCell" ></div><div class="divTableCell" id="actualiza7" ></div><div class="divTableCell"></div></div>
            </div>
        </div>
        <hr>
        <div>
            <footer class="jumbotron jumbotronPiedePagina">
                <?php include('Pie.php'); ?>
            </footer>
        </div> 
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#actualiza2').load('Tanque1.php')
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#actualiza1').load('Termometro1.php')
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#actualiza3').load('Indicador1.php')
    });    
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#actualiza4').load('Termometro2.php')
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#actualiza5').load('Tanque2.php')
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#actualiza6').load('Indicador2.php')
    });    
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#actualiza7').load('Rosa1.php')
    });
</script>
