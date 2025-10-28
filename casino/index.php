<?php
session_start();

// Manejo de la sesión con:
// 'dinero' => dinero disponible
// 'visitas' => contador de visitas

//GESTIONARL LAS COOKIES 

if(isset($_COOKIE['visitas_casino'])){
    $visitas = $_COOKIE['visitas_casino'] + 1;
}else {
    $visitas = 1;
}
setcookie('visitas_casino', $visitas, time() + (30*24*60*60));


//CUANDO TIENE EL DINERO INICAL DEL FORMULARIO DE ANTES 

if (isset($_POST['dinero_inicial'])){
    $_SESSION['dinero'] = (int)$_POST['dinero_inicial'];
    $_SESSION['historial'] = [];
}


// Verificar si es nueva sesión y mostrar visitas
if (!isset($_SESSION['dinero'])) {
    require_once 'bienvenida.php';
    exit();
}

// Procesar acciones del casino
if (isset($_POST["accion"])) {
    switch ($_POST["accion"]) {
        
        case "Apostar":
            // Procesar apuesta

            if (isset($_POST['cantidad']) && isset($_POST['tipo'])){
                $cantidad = (int)$_POST['cantidad'];
                $tipo_apuesta = $_POST['tipo'];  // para SABER SI ES PARA O IMPAR RECUERDA QUE NO LO PONES ANTES
            
                //ver si tiene o no el dinero  
                if ($cantidad <= $_SESSION["dinero"]){

                    //numeros aleatorios

                    $numero = rand(1,100);
                    $resultado = ($numero % 2 == 0) ? 'par' : 'impar';

                    //COmprobar si gana

                    if($tipo_apuesta == $resultado){
                        $_SESSION['dinero'] += $cantidad;
                        $mensaje = "GANASTE numero: $numero ($resultado) + ($cantidad €)";
                        $_SESSION['historial'][] = $mensaje;
                    } else {
                        $_SESSION['dinero'] -= $cantidad;
                        $mensaje = "Perdiste muerto numero: $numero ($resultado) + ($cantidad €)";
                        $_SESSION['historial'][] = $mensaje;
                    }

                }
            }

            break;
        case "Abandonar":
            // Mostrar resultado final
            $dinero_final = $_SESSION['dinero'];
            require_once 'despedida.php';
            session_destroy();
            exit();
    break;
    }
}

// Función auxiliar para mostrar historial de apuestas
function mostrarHistorial(): string
{
    $msg = "";
    if (!empty($_SESSION['historial'])) {
        foreach ($_SESSION['historial'] as $apuesta) {
            $msg .= "<p>$apuesta</p>";
        }
    } else {
        $msg = "<p>No hay apuestas aún</p>";
    }
    return $msg;
}
$historial = mostrarHistorial();
require_once 'casino.php';
?>