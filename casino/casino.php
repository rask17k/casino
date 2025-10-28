<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CASINO - Jugar</title>
</head>
<body>
    <h1>CASINO ONLINE</h1>
    <div class="container">
        <div class="dinero-disponible">
            Dinero disponible: <?= $_SESSION['dinero'] ?> Euros
        </div>
        
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <label for="cantidad">Cantidad a apostar:</label>
            <input name="cantidad" type="number" min="1" required>
            
            <label>Tipo de apuesta:</label>
            <input type="radio" name="tipo" value="par" required> Par
            <input type="radio" name="tipo" value="impar"> Impar
            
            <div class="acciones">
                <input type="submit" name="accion" value="Apostar">
                <input type="submit" name="accion" value="Abandonar">
            </div>
        </form>
        
        <div class="historial">
            <?= $historial ?>
        </div>
    </div>
</body>
</html>