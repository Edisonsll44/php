<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración del Servidor Local</title>
</head>
<body>
    <h1>
        Configuración del Servidor Local
    </h1>
    <ol>
        <?php
            // Verificar si $data está definida antes de usarla
            if (isset($data)) {
                foreach ($data as $key => $value) {
                    echo "<li>$value</li>";
                }
            } else {
                echo "<li>No se encontraron mensajes.</li>";
            }
        ?>
    </ol>
</body>
</html>