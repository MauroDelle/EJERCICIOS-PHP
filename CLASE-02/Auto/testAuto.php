<?php
require_once("Auto.php");

//Creo dos objetos auto de la misma marca y distinto color
$auto1 = new Auto("Toyota","Azul");
$auto2 = new Auto("Toyota", "Rojo");

//creo dos objetos "Auto" de la misma marca, mismo color y distinto precio.
$auto3 = new Auto("Ford","azul",30000);
$auto4 = new Auto("Ford","azul",35000);

//Creo un objeto auto utilizando la sobrecarga restante;
$fecha = new DateTime("2023-09-09");
$auto5 = new Auto("Honda","Negro",40000,$fecha);

/* Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio. */
$auto3->AgregarImpuestos(2000);
$auto4->AgregarImpuestos(2000);
$auto5->AgregarImpuestos(2000);

/*Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido. */
$importeFinal = Auto::Add($auto1,$auto2);

/* Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no. */
$comparacion1_2 = $auto1->Equals($auto2);
$comparacion1_5 = $auto1-> Equals($auto5);

// Mostrar resultados de comparación
if ($comparacion1_2) {
    echo "Auto 1 y Auto 2 son de la misma marca.<br>";
} else {
    echo "Auto 1 y Auto 2 no son de la misma marca.<br>";
}

if ($comparacion1_5) {
    echo "Auto 1 y Auto 5 son de la misma marca.<br>";
} else {
    echo "Auto 1 y Auto 5 no son de la misma marca.<br>";
}

/* Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5) */

echo "<br><br>Auto 1: ";
Auto::MostrarAuto($auto1);
echo "<br><br>Auto 3:";
Auto::MostrarAuto($auto3);
echo "<br>Auto 5:";
Auto::MostrarAuto($auto5);
?>