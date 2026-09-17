 //definir y recorre un array asociativo

$values = array ("fecha" => "10/08/2011", "estadocivil" => "soltero", "nombre" => "francisco");

 
foreach ($values as $item => $value){
     echo $item.": ".$value.";
}

