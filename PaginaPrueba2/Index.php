
<!DOCTYPE html> 
<!--debemos definir que nuestro documento es de tipo HTML-->
<html> 
    <!-- inicio de nuestro documento-->
    <html lang="es"> 
        <head>
            <title>Visualizador de Datos</title>
    <!-- inicio de la cabecera-->
            <meta charset="utf-8">
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
        </head>
        <body>
            <header class="jumbotron jumbotronCabecera">
                <?php include('cabecera.php'); ?>
<!--include nos sirve para agregar o quitar elementos en php como ejecutar una subrutina en php-->
            </header>
            <hr>       <!-- seccion central -->
            <h3 style="text-align:center">Bienvenido a tu historial de datos en Telemetic por favor inicia sesión o registrate</h3>

<!--pie de pagina-->
            <hr>
            <div>
                <footer class="jumbotron jumbotronPiedePagina">
                    <?php include('Pie.php'); ?>
                </footer>
            </div>
        </body>
<!--    final del documento html-->
</html>