<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CASINO - Bienvenida</title>
</head>
<body>
    <h1>BIENVENIDO AL CASINO</h1>
    <div class="container">
        <div class="visitas">
            <?= isset($visitas) ? "Esta es su " . $visitas . " visita." : "" ?>
        </div>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <label for="dinero_inicial">Introduzca el dinero con el que va a jugar:</label>
            <input name="dinero_inicial" type="number" min="1" required>
            <input type="submit" value="Empezar a Jugar">
        </form>
    </div>
</body>
</html>