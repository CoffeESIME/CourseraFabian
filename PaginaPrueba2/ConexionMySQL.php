<?php
Define ('Usuario', 'root');
Define ('Contraseña', '12Telemetic12'); 
Define ('Direccion', 'localhost:3307');
Define ('NombreBaseDatos', 'grdxf');
try
{
    $ConexionBD = new mysqli(Direccion, Usuario, Contraseña, NombreBaseDatos);
    mysqli_set_charset($ConexionBD, 'utf8');
}
catch(Exception $e) 
{
    print "El sistema esta ocupado, intente más tarde";
}
catch(Error $e)
{
    print "EL sistema esta ocupado, intente mas tarde.";
}
?>