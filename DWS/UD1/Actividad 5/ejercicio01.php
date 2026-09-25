<?php
/*
Ejercicio 01
Tendremos los datos personales de 2 personas en 6 variables. Cada
persona tendrá 3 datos: nombre, apellido y DNI.
Hay que meter todos los datos en un array asociativo donde los
índices sean “nombre”, “apellido”, “DNI” y después visualizarlos por
pantalla en formato tabla. 

Build-in: http://localhost:8000/Actividad_5/ejercicio01.php
Xdebug: http://php-mvc.localhost/Actividad_5/ejercicio01.php
*/

$nombre1 = "Noctis";
$apellido1 = "Lucis";
$dni1 = "1768376C";

$nombre2 = "Arthur";
$apellido2 = "Morgan";
$dni2 = "3468288V";

$usuario1 = array("nombre" => $nombre1, "apellido" => $apellido1, "DNI" => $dni1);
$usuario2 = array("nombre" => $nombre2, "apellido" => $apellido2, "DNI" => $dni2);

$usuarios = array($usuario1, $usuario2);

echo ("Ejercicio 01");
echo ("</br>-------------------------------</br>");

echo ("</br>");

echo ("<table>
  <tr>
    <th><b>[NOMBRE]<b></th>
    <th><b>[APELLIDO]<b></th>
    <th><b>[DNI]<b></th>
  </tr>
  ");

if (count($usuarios) == 0) {
    echo ("</table>");
} else {
    for ($i = 0; $i < count($usuarios); $i++) {
        echo ("<tr>");

        foreach ($usuarios[$i] as $usuario => $valor) {
            echo ("<td>" .  $valor . "</td>");
        }
        echo ("</tr>");
    }
    echo ("
        </tr>
    </table>
    ");
}

echo ("</br>-------------------------------");

?>