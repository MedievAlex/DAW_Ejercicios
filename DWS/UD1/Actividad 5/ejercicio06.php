<?php
/*
Ejercicio 06
Tenemos tres arrays:
    • $paises: relaciona cada país con su número de habitantes.
        o Ejemplo :
            $paises = array(
                'Francia' => 67000000,
                'Mali' => 250000,
                'Brasil' => 300000000,
                'Pakistan' => 350000000,
                'Islas Marshall' => 55000
            );
    • $poblaciones: contiene los rangos de población y su
    clasificación.
        o Ejemplo :
            $poblaciones = array(
                '0-100000-Deshabitado', // entre 0 y 100 mil
                '100001-1000000-Poco Poblado', // entre 100 mil+1 y 1 millon
                '1000001-100000000-Poblado', // entre 1 millon+1 y 100 millones 
                '100000001-1000000000-Muy Poblado' // entre 100 millones+1 y 1000 millones
            );
    • $continentes: relaciona cada continente con sus países.
        o Ejemplo:
            $continentes = array(
                'Europa' => 'Francia, Portugal, Italia',
                'Asia' => 'China, Turquia, Pakistan',
                'Africa' => 'Nigeria, Marruecos, Mali',
                'America' => 'EEUU, Brasil, Argentina',
                'Occeania' => 'Australia, Polinesia, Islas Marshall'
            );
El objetivo es obtener:
    Francia es un pais poblado de Europa
    Mali es un pais poco poblado de Africa
    Brasil es un pais muy poblado de America
    Pakistan es un pais muy poblado de Asia
    Islas Marshall es un pais deshabitado de Oceania

Build-in: http://localhost:8000/Actividad_5/ejercicio06.php
Xdebug: http://php-mvc.localhost/Actividad_5/ejercicio06.php
*/

$paises = array(
    'Francia' => 67000000,
    'Mali' => 250000,
    'Brasil' => 300000000,
    'Pakistan' => 350000000,
    'Islas Marshall' => 55000
);

$poblaciones = array(
    '0-100000-Deshabitado', // entre 0 y 100 mil
    '100001-1000000-Poco Poblado', // entre 100 mil+1 y 1 millon
    '1000001-100000000-Poblado', // entre 1 millon+1 y 100 millones 
    '100000001-1000000000-Muy Poblado' // entre 100 millones+1 y 1000 millones
);

$continentes = array(
    'Europa' => 'Francia, Portugal, Italia',
    'Asia' => 'China, Turquia, Pakistan',
    'Africa' => 'Nigeria, Marruecos, Mali',
    'America' => 'EEUU, Brasil, Argentina',
    'Occeania' => 'Australia, Polinesia, Islas Marshall'
);

echo ("Ejercicio 06");
echo ("</br>-------------------------------");

foreach ($paises as $pais => $poblacion) {

    foreach ($continentes as $continente => $paisesC) {
        if (str_contains($paisesC, $pais)) {

            for ($i = 0; $i < count($poblaciones); $i++) {
                if (explode("-", $poblaciones[$i])[0] < $poblacion && $poblacion < explode("-", $poblaciones[$i])[1]) {
                    echo ("</br>" . $pais . " es un país " . strtolower(explode("-", $poblaciones[$i])[2]) . " de " . $continente);
                }
            }
        }
    }
}

echo ("</br>-------------------------------");

?>