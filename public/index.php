
<?php

include('autoload.php');

$classes = new Classes();


$consulta = "SELECT * FROM teste";
$resultado = $classes->connect([$consulta,'Query']);

while ($row = $classes->connect([$resultado[0],'Fetch'])) {
	echo $row['id'];
}
?>