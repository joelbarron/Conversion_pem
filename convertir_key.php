<!DOCTYPE html>
<html>

<head lang="es">
<meta charset="utf-8">
    <title>Conversion .key a .pem | Factucare</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
</head>

<body>
   
    <div class="container">
        <div class="starter-template">
            <h1>Factucare</h1>
            <h2>Conversion .key a .pem</h2>            
        </div>
   
<?php
$target_path = "uploads/";
$ruta = $_FILES['archivo_key']['name'];
// echo "La ruta es : " . $ruta."<br>";
$target_path = $target_path . basename( $_FILES['archivo_key']['name']); if(move_uploaded_file($_FILES['archivo_key']['tmp_name'], $target_path)) 
{ 
    // echo "El archivo ". basename( $_FILES['archivo_key']['name']). " se ha sido subido con exito";
} else{
echo "<h3 style='text-align:center;'>Ha ocurrido un error, trate de nuevo!</h3>
<a href='index.html' class='btn btn-warning'>Regresar al inicio</a>";
die();
}


$filename = $ruta;
$filename_exit = $ruta.".pem";
$password = $_POST['pass'];


$open = "openssl pkcs8 -inform DER -in ".$filename." -out ".$filename_exit." -passin pass:".$password;

 $comando= "cd uploads&&".$open;
 // $comando= "cd uploads&&openssl version";

$res = shell_exec ($comando);


                     echo '
                    

<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 style="color: grey; text-align:center">'.$filename_exit.'</h2>
                <div class="col-md-12 col-md-offset-3">
                 <a href="uploads/'.$filename_exit.'" download="'.$filename_exit.'"class="btn btn-primary">Descargar Archivo</a>
                <a href="index.html" class="btn btn-warning">Regresar al inicio</a>
                </div>
            </div>
        </div>
';


                   

?>

    </div>
    <!-- /.container -->
</body>

</html>
