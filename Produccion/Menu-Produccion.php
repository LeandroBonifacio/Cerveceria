<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
          Produccion
        </title>
        <link rel="icon" href="img/icon/clientes.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
        <link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="../Css/Index.css">
    </head>
    <body>
           <header>      
            <div id="Header">
            <ul class="nav">
                 <li> <a href="../Index.HTML"> Inicio</a>
                <li> <a href="Menu-Produccion.php"> Produccion</a>
                    <ul>
                      <li> <a href=""> Recetas</a></li>
                    </ul>
                </li> 
                <li> <a href="../Ingredientes/Menu-Ingredientes.html"> Ingredientes</a></li>
                <li> <a href=""> Compras</a></li>
                <li> <a href="../Clientes/Menu-Clientes.html"> Clientes</a></li>
                <li> <a href=""> Ventas</a></li>
    
           </ul>
         </div> 
      </header>
        <div class="container">
            <div class="row">
                <div class="table-wrapper" style="margin-top: 90px;">
                    <h1><font style="font-family: times, serif; font-size:25pt; font-style:italic"><b>Producciones</b></font></h1>
                    <br>
                   <div class="col-md-10 col-md-offset-1" style="margin-top: 30px;">
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <h3 class="panel-title">
                                            <font style="font-family: times, serif; font-size:16pt; font-style:all;"> 
                                                <i class="fas fa-users"></i>
                                            </font>
                                        </h3>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <a href="AltaProduccion.html" type="button" class="btn btn-create btn-xs">
                                            <font style="font-family: times, serif; font-size:12pt; font-style:normal;">
                                                <i class="fas fa-user-plus"></i> Agregar produccion
                                            </font>
                                        </a>
                                        <a href="" type="button" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-print"></span><b> Imprimir </b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-list">
                                    <thead>
                                        <tr>
                                        
                                            <th class="text-center">Fecha </th>
                                            <th class="text-center">Agua </th>
                                            <th class="text-center">Temp. Maceracion </th>
                                            <th class="text-center">Tiem. Maceracion </th>
                                            <th class="text-center">Temp. Coccion </th>
                                            <th class="text-center">Tiem. Coccion </th>
                                            <th class="text-center">Litros </th>
                                            <th class="text-center">Comentarios </th>
                                            
                                            <th class="text-center">Acciones <i class="fas fa-cogs"></i></th>
                                        </tr> 
                                    </thead>
                                    
                                    <tbody>
                     <?php
       
         include ("Conexion.php");
           
             $bd = conectar();


                $Reservas = $bd -> prepare("SELECT  * from produccion");
                $Reservas -> execute(); 
                                        
                      while ($Reserva = $Reservas->fetch()){ 
       
                               
                             $Fecha = $Reserva['Pr_Fecha'];
                             $CantAgua = $Reserva['Pr_CantAgua'];
                             $TemperaturaMacera = $Reserva['Pr_TemperaturaMaceracion'];
                             $TiempoMacera = $Reserva['Pr_TiempoMaceracion'];
                             $TemperaturaCoccion = $Reserva['Pr_TemperaturaCoccion'];
                             $TIempoCoccion = $Reserva['Pr_TiempoCoccion'];
                             $Litros = $Reserva['Pr_LitrosSalida'];
                             $Comentarios = $Reserva['Pr_Comentarios'];
                          
                      
               
                    echo' <tr>';

                            echo'<td>'.$Fecha.'</td>';
                            echo'<td>'.$CantAgua.'</td>';
                            echo'<td>'.$TemperaturaMacera.'</td>'; 
                            echo'<td>'.$TiempoMacera.'</td>';
                            echo'<td>'.$TemperaturaCoccion.'</td>';
                            echo'<td>'.$TIempoCoccion.'</td>'; 
                            echo'<td>'.$Litros.'</td>';
                            echo'<td>'.$Comentarios.'</td>';
                          
                 echo' </tr>';
                 
          
                        
               
           }
                    
             ?>
                                              
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-3 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">
                </p>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </body>
</html>