<!DOCTYPE html>
<html lang="es">
<head>
 <title>inicio Sesión</title>
 <meta charset="utf-8">
 <meta name="viewport" content=
 "width=device-width, initial-scale=1, shrink-to-fit=no">
 <script src="verify.js"></script>
</head>
<body>
<header >
 <?php include('cabecera.php'); ?>
</header>
<!-- Body Section -->
 <div >
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //#1
 require('ProcesoInicio.php');
}
?>
<div>
<h2>Inicio Sesion</h2>
<form action="PaginaIniciodeSesion.php" method="post" name="loginform" id="loginform">
 <div>
 <label for="email">Usuario:</label>
 <div>
 <input type="text" id="email" name="email"
 placeholder="Usuario" maxlength="30" required
 value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
 </div>
 </div>
 <div>
 <label for="password">Contraseña:</label>
 <div>
<input type="password" id="password" name="password"
placeholder="Contraseña" maxlength="40" required
 value=
 "<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
 <span>Entre 8 y 12 caracteres.</span>
 </div>
<div>
 <div>
 <input id="submit" type="submit" name="submit"
 value="Inicio">
 </div>
     </div>
 </div>
    </form>
</div>
<!-- Right-side Column Content Section -->
</div>
</body>
</html>