<?php
    require '../../vendor/autoload.php';

    $cargoController = new \Controllers\CargoController;
    $resultado = $cargoController->index();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <h1>Cargos</h1>
    <hr>
    <?php echo $resultado; ?>

</body>
</html>