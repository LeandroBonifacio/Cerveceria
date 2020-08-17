
<?php

 function conectar(){
	 
	$user="root";
	 
	 $server="localhost";
	 $bd="bdcerveceria";
	 
	 try {
	 
	 $base = new PDO('mysql:host=localhost;dbname=bdcerveceria',$user,"");
	 $base-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 } catch (PDOException $e){
	 
	  echo "Error: ".$e->getMessage();
	 
	 }
	 
	 return $base;
	 
 }
 
 ?>
 