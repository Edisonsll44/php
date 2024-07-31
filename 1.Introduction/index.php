<?php 
    include "variables.php";
    include "cadenas.php";
    include "condiciones.php";
    include "arreglos.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Introduction to PHP</title>
</head>
    <div class="container text-center">
        <div class="row">
            <div class="col-12 mt-5"></div>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h2 class="title text-primary"> Ejemplo de variables en PHP</h2>
                            <ol class="list-group list-group-flush">
                                <?php 
                                    if (isset($dataVariable)) {
                                        foreach ($dataVariable as $variable) {
                                            echo "<li class= 'list-group-item'>$variable</li>";
                                        }
                                    } else {
                                        echo "<li class= 'list-group-item'>No se encontraron datos.</li>";
                                    }
                                ?>
                            </ol>
                    </div>
                </div>
            </div>
   

        <div class="row">
                <div class="col-12 mt-5"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="title text-secondary">Operaciones aritméticas</h2>
                        <form method="POST" action="">
                            <div class="mb-3">
                                    <label for="number1" class="form-label">Primer número</label>
                                    <input type="number" class="form-control" id="number1" name="number1" placeholder="Ingrese un número" required>
                            </div>
                            <div class="mb-3">
                                    <label for="number2" class="form-label">Segundo número</label>
                                    <input type="number" class="form-control" id="number2" name="number2" placeholder="Ingrese otro número" required>
                            </div>
                                <button type="submit" class="btn btn-primary">Calcular</button>
                        </form>
                            <div class="mt-3">
                                <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Incluir la clase Calculator
                                    include 'Operaciones.php';

                                    // Capturar valores del formulario
                                    $number1 = $_POST['number1'];
                                    $number2 = $_POST['number2'];

                                    // Crear instancia de la clase Calculator
                                    $calculator = new Operaciones($number1, $number2);

                                    // Realizar operaciones y mostrar resultados
                                    echo "<p>Suma: " . $calculator->add() . "</p>";
                                    echo "<p>Resta: " . $calculator->subtract() . "</p>";
                                    echo "<p>Multiplicación: " . $calculator->multiply() . "</p>";
                                    echo "<p>División: " . $calculator->divide() . "</p>";
                                    echo "<p>Módulo: " . $calculator->modulus() . "</p>";
                                    echo "<p>Potencia: " . $calculator->power() . "</p>";
                                }
                                ?>
                            </div>
                </div>
            </div>   
        </div>


        <div class="row">
                <div class="col-12 mt-5"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="title text-success">Manipulacion de cadenas</h2>
                            <div class="mt-3">
                                <ol class="list-group list-group-flush">
                                    <?php
                                        $cadenas = new Cadenas("Hola mundo", "Esto es un ejemplo de cadenas desde PHP");
                                        $cadena = "Esto es un ejemplo de manipulacion de cadenas desde PHP.";
                                        list($mayusculas, $minusculas) = $cadenas->convert_string();
                                        // Realizar operaciones y mostrar resultados
                                        echo "<li class= 'list-group-item'> Concatenar: " . $cadenas->concat_string() . "</li>";
                                        echo "<li class= 'list-group-item'> Longitud de una cadena: " . $cadenas->length_string($cadena) . "</li>";
                                        echo "<li class= 'list-group-item'> Conversión de cadenas: <br>" . "Todo en mayúsculas: {$mayusculas} <br> Todo en minúsculas: {$minusculas}" . "</li>";
                                        echo "<li class= 'list-group-item'>Obtener subcadena: " . $cadenas->replace_substring("PHP","Go",$cadena) . "</p>";
                                    ?>
                                </ol>
                            </div>
                </div>
            </div>   
        </div>

        <div class="row">
                <div class="col-12 mt-5"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="title text-danger">Estructura condicional</h2>
                            <div class="mt-3">
                                <ol class="list-group list-group-flush">
                                    <?php
                                        $edad = 28;
                                        $gestor = new GestorUsuario(20, 'editor', 'VIP', 1000);
                                        $tipo_cliente = 'VIP';  
                                        echo "<li class= 'list-group-item'> El acceso para personas con edad de: {$edad} años es: " . $gestor->verificarAcceso($edad) . "</li>";
                                        echo "<li class= 'list-group-item'> Validación tipo usuario: " . $gestor->verificarTipoUsuario() . "</li>";
                                        echo "<li class= 'list-group-item'> Calcular descuento: " . $gestor->calcularDescuento($tipo_cliente) . "</li>";
                                    ?>
                                </ol>
                            </div>
                </div>
            </div>   
        </div>

        <div class="row">
                <div class="col-12 mt-5"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="title text-info">Arreglos</h2>
                            <div class="mt-3">
                                <ol class="list-group list-group-flush">
                                    <?php
                                        $arreglo = new Arreglos();
                                        $arreglo->agregarNombre("Juan");
                                        $arreglo->agregarNombre("María");
                                        $arreglo->agregarNombre("Pedro"); 
                                        $arreglo->agregarNombre("Edison");
                                        $arreglo->agregarNombre("Evelin");
                                        $arreglo->agregarNombre("Mateo");
                                        $arreglo->agregarNombre("Abby");
                                        $arreglo->agregarNombre("Emma");
                                        echo "<h3>Lista de personas:</h3>";
                                            foreach ($arreglo->mostrarNombres() as $persona) {
                                                echo "<li class='list-group-item'>Nombre: " . htmlspecialchars($persona) . "</li>";
                                            }
                                    ?>
                                </ol>
                            </div>
                </div>
            </div>   
        </div>

    </div>
</body>
</html>