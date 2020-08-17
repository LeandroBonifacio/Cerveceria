<?php 

 include ("Conexion.php");
 include ("LibProduccion.php");


 $bd = conectar();

 $fecha = $_POST['fecha'];
 $agua = $_POST['cantAgua'];
 $temperaturamaceracion = $_POST['tempMaceracion'];
 $tiempomaceracion = $_POST['tiempoMaceracion'];
 $temperaturacoccion = $_POST['tempCoccion'];
 $tiempococcion = $_POST['tiempoCoccion'];
 $Litros = $_POST['Litros'];
 $comentarios = $_POST['comentarios'];



insertarProduccion($bd,$fecha,$agua, $temperaturamaceracion,$tiempomaceracion, $temperaturacoccion,$tiempococcion,$Litros, $comentarios);

header('Location: Menu-Produccion.php');





 ?>