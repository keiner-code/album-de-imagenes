 <?php
  session_start();
  
  if(!empty($_POST)){
      if(isset($_POST["Codigo"])){
        if(!$_POST["Codigo"] == "" && !$_POST["Nombre"] == ""){
            $_SESSION["album"] [] = array("Nombre"=>$_POST["Nombre"],"Codigo"=>$_POST["Codigo"]);
        }
      } 
}
   if(isset($_POST["Codigoe"])){
    if(!$_POST["Codigoe"] == ""){
        foreach($_SESSION["album"] as $key=>$cadena){
            if($_POST["CodigoE"] === $cadena["Codigo"]){
                unset($_SESSION["album"][$key]);
            }
        }
     }
   }

       if(isset($_POST["agregar"])){
              foreach($_SESSION["album"] as $llave=>$cadena){
                  if($cadena["Codigo"] === $_POST["codimg"]){
                      $_SESSION["imag"][] = array("nombre"=>$cadena["Nombre"],"codigo"=>$cadena["Codigo"],"img"=>$_POST["archivoimg"]);
                  }
              }
       }

       if(isset($_POST["Codigoa"])){
        if(!$_POST["Codigoa"] == ""){
            foreach($_SESSION["imag"] as $key=>$cadena){
                if($_POST["CodigoA"] === $cadena["codigo"]){
                    unset($_SESSION["imag"][$key]);
                }
            }
         }
       }
       
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Albunes De Imagenes</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="estilo/estilo.css">
 </head>
 <body>
     <h1 class="T1">Album De Imagenes</h1>
     <div class="container">
        <div class="row">
           <div class="col-md-6">
            <h3>Crear álbum</h3>
            <form action="index.php" method="post">
               <div class="form-group">
                   <label for="Nombre">Nombre</label>
                   <input class="form-control" type="text" name="Nombre" placeholder="Ingrese El Nombre Del Album">
                   <label for="Codigo">Codigo</label>
                   <input class="form-control" type="text"  name="Codigo" placeholder="Ingrese El Codigo Del Album">
               </div>
               <div class="form-group">
                   <input type="submit" value="Crear Album" name="Enviar" class="btn btn-success">
               </div>
            </form>
           </div>
           <div class="col-md-6">
             <h3>Eliminar Álbum</h3>
             
             <form action="index.php" method="post">
             <div class="form-group">
                <label for="Codigo">Codigo Del Album</label>
                <input type="text" name="CodigoE" class="form-control" placeholder="Ingrese El Codigo">
             </div>
             <div class="form-group">
             <input type="submit" name="Codigoe" value="Eliminar" class="btn btn-danger">
             </div>
             </form>
             </div>
        </div>
        <hr>
        <div class="row">
           <div class="col-md-6">
           <h3>Crear imagenes</h3>
                  <form action="index.php" method="post" >
                       <div class="form-group">
                           <input type="file" name="archivoimg" id="seleccionArchivos" accept="image/*">
                       </div>
                        <div class="form-group imgg">   
                            <img id="imagenPrevisualizacion" class="img">    
                       </div>
                       <div class="form-group">
                           <label for="Ingresar">Ingresar Codigo</label>
                           <input type="text" name="codimg" class="form-control" placeholder="Ingresar Codigo Del Album">
                           <small id="emailHelp" class="form-text text-muted">Ingresar El Codigo Donde Se guardara La Imagen</small>
                       </div>
                       <div class="form-group">
                           <input type="submit" name="agregar" value="Agregar Imagen" class="btn btn-primary">
                       </div>
                      
                  </form>
           </div>
          
           <div class="col-md-6">
           <h3>Eliminar una imagen</h3>
                
                <form action="index.php" method="post">
                <div class="form-group">
                   <label for="Codigo">Codigo Del Album Con Imagen</label>
                   <input type="text" name="CodigoA" class="form-control" placeholder="Ingrese El Codigo">
                </div>
                <div class="form-group">
                <input type="submit" name="Codigoa" value="Eliminar" class="btn btn-danger">
                </div>
                </form>
                </div>
            </div>
           <hr>
          <div class="titulofoto">
                <h1>Album De Fotos</h1>
          </div>
        <div class="row">
            <?php
            if(!empty($_POST)){
            foreach($_SESSION["imag"] as $llave=>$valores){
                //echo " ",$valores["nombre"],"<br>",$valores["codigo"],"<br>",$valores["img"];
                echo '<div class="col-md-4">';
                  echo '<div class="card mb-4 shadow-sm">';
                     echo'<img src="img/',$valores["img"],'" alt="" srcset="" class="bd-placeholder-img card-img-top" width="100%" height="225">';
                        echo'<div class="card-body">';
                           echo'<h3 class="sub">',$valores["nombre"],'</h3>';
                         echo'<div class="d-flex justify-content-between align-items-center">';
                           echo'<div class="btn-group">';
                             echo'</div>';
                            echo'</div>';
                          echo'</div>';
                        echo'</div>';
                      echo'</div>';
            }
        }
            ?>                    
        </div>
    
    <script src="script/script.js"></script>
 </body>
 </html>
 <!--OP2 (Cédulas terminadas en numero impar)
Se debe desarrollar una aplicación web que genere albunes de imagenes. Para esto se deben cumplir los siguiente requerimientos:
    Crear un módulo de manejo de álbumes que tenga las siguientes funcionalidades:
        Crear álbum: se pedirá el nombre y un número identificador del álbum.
        Eliminar Álbum:  se solicitara el identificador.
        Crear un modulo de creacion de manejo de imagenes:
        Crear imagenes: para esto se debe poder subir una imagen a través de una búsqueda en el directorio de archivos
         del equipo. Se debe seleccionar un álbum donde guardar la imagen.
        Eliminar una imagen: para esto se debe seleccionar el álbum y posteriormente la imagen.
        Realizar búsqueda de imágenes por bloque: para esto se debe ir agregando nombres a una lista y mostrará todas
        las imágenes que coincidan con los nombres en la lista.
 -->