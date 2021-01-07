<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="verify.js"></script>
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
            aside {
                width: 50%;
                padding-left: 5px;
                margin-left: 5px;
                float: inherit;
                font-style: italic;
                background-color: lightgray;
}
            </style>
    </head>
    <body>
<div class="divTabla">
    <div class="divTablaCabeza">
        <img class="imagenizquierda"  src="TelePNG.png"  alt="Logo">
    </div>
    <div class="divTablaCabeza">
        <nav>
            <div>
                <button type="button" onclick="location.href = 'PaginaRegistro.php'" >Registrar</button>
                <button type="button" onclick="location.href = 'PaginaIniciodeSesion.php'" >Inicio de sesión</button>

            </div>
        </nav>
    </div>
</div> 

        <div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                require('PaginadeProcesodeRegistro.php');
            }
            ?>
            <div>
                <h2  align="center">Registro</h2>
                <form action="PaginaRegistro.php" method="post" onsubmit="return checked()";>
                    <div>
                        <label for="Nombre">Nombre:</label>
                        <div>
                            <input type="Texto" id="Nombre" name="Nombre"
                                   placeholder="Numero Registro" maxlength="30" required
                                   value="<?php if (isset($_POST['Nombre'])) echo $_POST['Nombre']; ?>" >
                        </div>
                    </div>
                    <div>
                        <label for="NombreCliente">Nombre Cliente:</label>
                        <div>
                            <input type="Cliente" id="Cliente" name="Cliente"
                                   placeholder="Cliente (Empresa)" maxlength="60" required
                                   value="<?php if (isset($_POST['Cliente'])) echo $_POST['Cliente']; ?>">
                        </div>
                    </div>
                    <div>
                        <label for="correo">Correo:</label>
                        <div>
                            <input type="correo" id="correo" name="correo"
                                   placeholder="Correo" maxlength="60" required
                                   value="<?php if (isset($_POST['correo'])) echo $_POST['correo']; ?>">
                        </div>
                    </div>
                    <div>
                        <label for="Contraseña">Contraseña:</label>
                        <div >
                            <input type="password" id="Contraseña1" name="Contraseña1"
                                   placeholder="Contraseña" minlength="8" maxlength="12"
                                   required value="<?php if (isset($_POST['Contraseña1'])) echo $_POST['Contraseña1']; ?>">
                            <span id='mensaje'> 8 a 12 caracteres.</span>
                        </div>
                        <div>
                            <label for="Contraseña2">Confirme contraseña:</label>
                            <div>
                                <input type="password" id="Contraseña2" name="Contraseña2"
                                       placeholder="Confirmar contraseña" minlength="8" maxlength="12" required
                                       value="<?php if (isset($_POST['contraseña2'])) echo $_POST['Contraseña2']; ?>">
                            </div>
                            <div>
                                <div>
                                    <input id="submit" type="submit" name="submit"
                                           value="Registrar">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if(!isset($errorstring)) {
                echo '<aside>';
                include('InformacionRegistro.php');
                echo '</aside>';
                echo '</div>';
                echo '<footer>';
}
            else
            {
                echo '<footer class="jumbotron jumbotronPiedePagina">';
            }
            include('pie.php');
            ?>
        </div>
    </body>
</html>      