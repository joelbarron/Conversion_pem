<?php
$target_path = "uploads/";
$ruta = $_FILES['archivo_cer']['name'];
// echo "La ruta es : " . $ruta;
$target_path = $target_path . basename( $_FILES['archivo_cer']['name']); if(move_uploaded_file($_FILES['archivo_cer']['tmp_name'], $target_path)) 
{ 
    echo "<h2>El archivo ". basename( $_FILES['archivo_cer']['name']). " ha sido subido con exito</h2>";
} else{
echo "Ha ocurrido un error, trate de nuevo!";
}

$certificateCAcer = 'uploads/' .$ruta;
$certificateCAcerContent = file_get_contents($certificateCAcer);

/* Convert .cer to .pem, cURL uses .pem */
$certificateCApemContent =  '-----BEGIN CERTIFICATE-----'.PHP_EOL
    .chunk_split(base64_encode($certificateCAcerContent), 64, PHP_EOL)
    .'-----END CERTIFICATE-----'.PHP_EOL;
$certificateCApem = $certificateCAcer.'.pem';
file_put_contents($certificateCApem, $certificateCApemContent); 


                    // echo '
                    // <html>
                    // <head>
                    // <meta http-equiv="REFRESH" content="0;url=uploads/'.$ruta.'.pem">
                    // </head>
                    // </html>
                    // ';


                    // echo '
                    // <html>
                    // <head>
                    // <meta http-equiv="REFRESH" content="0;url=index.html">
                    // </head>
                    // </html>
                    // ';

?>