<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CASINO - Resultado</title>
</head>
<body>
    <h1>MUCHAS GRACIAS POR JUGAR</h1>
    <div class="container">
        <div class="resultado-final">
            Su resultado final es de: <?= $dinero_final ?> Euros
        </div>
        <input type="button" value="Volver a Jugar" onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'">
    </div>
</body>
</html>