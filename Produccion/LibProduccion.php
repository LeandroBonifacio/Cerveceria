<?php 

 $bd = conectar();

 function insertarProduccion($bd,$fecha,$agua, $temperaturamaceracion,$tiempomaceracion, $temperaturacoccion,$tiempococcion,$Litros, $comentarios){

   $query = $bd -> prepare("INSERT INTO `produccion`(`Pr_Fecha`, `Pr_CantAgua`, `Pr_TemperaturaMaceracion`, `Pr_TiempoMaceracion`, `Pr_TemperaturaCoccion`, `Pr_TiempoCoccion`, `Pr_LitrosSalida`,`Pr_Comentarios`) VALUES (?,?,?,?,?,?,?,?)");

   $query -> bindParam (1,$fecha);
   $query -> bindParam (2,$agua);
   $query -> bindParam (3,$temperaturamaceracion);
   $query -> bindParam (4,$tiempomaceracion);
   $query -> bindParam (5,$temperaturacoccion);
   $query -> bindParam (6,$tiempococcion);
   $query -> bindParam (7,$Litros);
   $query -> bindParam (8,$comentarios);
 

   $query -> execute();
 }

 ?>