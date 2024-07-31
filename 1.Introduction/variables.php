<?php
// Declaración de variables
$integerVar = 42; // Variable de tipo integer
$floatVar = 3.14; // Variable de tipo float
$stringVar = "Hola, Mundo!"; // Variable de tipo string
$booleanVar = true; // Variable de tipo boolean
$arrayVar = [1, 2, 3, 4, 5]; // Variable de tipo array

// Mostrar las variables
$varInteger = "Integer: $integerVar<br>";
$varFloat = "Float: $floatVar<br>";
$varString = "String: $stringVar<br>";
$varBool = "Boolean: " . ($booleanVar ? 'true' : 'false') . "<br>";
$array = "Array: ". var_export($arrayVar, true) . '<br>';

$dataVariable = [$varInteger,$varFloat,$varString,$varBool,$array];