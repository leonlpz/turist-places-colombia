<?php

$condicionesClimaticas = array(
    'Bogotá' => 'Frio',
    'Medellín' => 'Templado',
    'Cali' => 'Cálido',
    'Cartagena' => 'Caluroso',
    'Santa Marta' => 'Tropical',
);

$ubicacion = array(
    'Bogotá' => 'Centro',
    'Medellín' => 'Centro',
    'Cali' => 'Sur',
    'Cartagena' => 'Norte',
    'Santa Marta' => 'Norte',
);

$turismo = array(
    'Bogotá' => 'Montañas',
    'Medellín' => 'Paisajes',
    'Cali' => 'Salsa',
    'Cartagena' => 'Playas',
    'Santa Marta' => 'Parques Nacionales',
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $condicion = strtolower($_POST['condicion']);

    switch ($condicion) {
        case 'clima':
            $valorBuscado = strtolower(trim($_POST['valor']));
            $respuesta = array();

            foreach ($condicionesClimaticas as $ciudad => $clima) {
                if (strtolower($clima) === $valorBuscado) {
                    $respuesta[] = $ciudad;
                }
            }

            if (!empty($respuesta)) {
                echo "Las ciudades con clima $valorBuscado son: " . implode(", ", $respuesta);
            } else {
                echo "No se encontraron ciudades con ese clima.";
            }
            break;

        case 'ubicacion':
            $valorBuscado = strtolower(trim($_POST['valor']));
            $respuesta = array();

            foreach ($ubicacion as $ciudad => $ubic) {
                if (strtolower($ubic) === $valorBuscado) {
                    $respuesta[] = $ciudad;
                }
            }

            if (!empty($respuesta)) {
                echo "Las ciudades ubicadas en $valorBuscado son: " . implode(", ", $respuesta);
            } else {
                echo "No se encontraron ciudades con esa ubicación.";
            }
            break;

        case 'turismo':
            $valorBuscado = strtolower(trim($_POST['valor']));
            $respuesta = array();

            foreach ($turismo as $ciudad => $tur) {
                if (strtolower($tur) === $valorBuscado) {
                    $respuesta[] = $ciudad;
                }
            }

            if (!empty($respuesta)) {
                echo "Las ciudades con turismo de $valorBuscado son: " . implode(", ", $respuesta);
            } else {
                echo "No se encontraron ciudades con ese tipo de turismo.";
            }
            break;

        default:
            echo "La condición ingresada no es válida.";
            break;
    }

    // Retardo de 60 segundos antes de redireccionar la página
    header("refresh:60; url=index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de lugares en Colombia</title>
</head>
<body>
    <form method="post" action="">
        <label for="condicion">Ingrese la condición que desea buscar (clima, ubicacion, turismo):</label><br>
        <input type="text" name="condicion" id="condicion"><br><br>
        <label for="valor">Ingrese el valor que desea buscar:</label><br>
        <input type="text" name="valor" id="valor"><br><br>
        <input type="submit" value="Consultar">
    </form>
</body>
</html>
