<?php 
session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> se veria bonito pero desconfigura el nav-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <title>Contratos</title>
  </head>
  <body>
      <!--Barra de navegación -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-2">
            <a class="navbar-brand" href="http://localhost/movilform/index.php">Web MovilForm</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/movilform/frontend/contratos.php">Registro Contrato</a>
                    </li>
                </ul>
                <span class="navbar-text">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/movilform/index.php">Inicio</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/movilform/backend/cerrarsesion.php"><i class="fas fa-sign-out-alt"></i><?php echo isset($_SESSION['admin'])? $_SESSION['admin']:'invitado'?></a>
                    </li>
                </ul>
                </span>
            </div>
      </nav>
        
      



      <div class="container-fluid row mt-3">
            
            <div id="mapa" class="form-group ml-2 mt-3">    
            
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.4748563091434!2d-70.63662338480107!3d-33.43693298077779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf95f570db63%3A0x8f3e520276210f1a!2sPlaza+Baquedano!5e0!3m2!1ses!2scl!4v1556039275594!5m2!1ses!2scl"
                width="110%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                <div>
                        Latitud: -33.4369436
                        Longitud: -70.634449
                </div>
            </div>
                
            <div id="registros" class="form-group ml-5">
                <div class="form-group">
                    <label for="inputAddress"><h4>Registrar Contrato</h4></label>
                    <input type="text" class="form-control" id="nombrecontrato" name="nombrecontrato" placeholder="Nombre de Contrato">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Nombre Contacto</label>
                    <input type="text" class="form-control" id="nombrecontacto" name="nombrecontacto" placeholder="Nombre del Contacto">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Teléfono de Contacto</label>
                    <input type="text" class="form-control" id="telefonocontacto" name="telefonocontacto" placeholder="Ejemplo: +569-98712354 ">
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion de contrato</label>
                    <input type="text" class="form-control" id="direccioncontrato" name="direccioncontrato" placeholder="Av. Ejemplo.">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder='Pueden ser varios'>
                     a@ejemplo, b@ejemplo, c@ejemplo
                </div>
                <div>
                    <button name="Agregar" id="Agregar" class="btn btn-primary">Registrar Contrato</button>
                </div>
            </div>

            <div class="ml-2">
                <button class="btn btn-success" id="boton" onclick="obtener('<?php echo isset($_SESSION['admin'])? $_SESSION['admin']:'invitado'?>')">Ver mis contratos</button>
                <button class="btn btn-primary" style="display:none" id="boton2" onclick="cambiarboton()">Ocultar Contratos</button>
                <div id="">

                </div>
                <h1 id="datos"></h1>                
                <div id="tablas" style="display:none">
                <table class="table" id="tabla">
                    <thead>
                        <tr>
                        <th>Contrato</th>
                        <th>Dirección</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody id="resultado">
                    
                    </tbody>
                </table>
                </div>
                
                
                
                </div>
        <script> 
    //Listar contratos
    
    function obtener(codigo)
      {
        document.getElementById("tablas").style.display = "inline";
        document.getElementById("boton").style.display = "none";
        document.getElementById("boton2").style.display = "inline";
          fetch('http://localhost/movilform/backend/ListaContratos.php?codigo='+codigo)
          .then(datos=>datos.json())
          .then(datos=>{
              console.log(datos)
              var resultado=document.getElementById('resultado');
              resultado.innerHTML='';
              for(let dato of datos)
              {
                  resultado.innerHTML+=`
                      <tr> 
                      <td> ${dato.NombreContrato} </td>
                      <td> ${dato.id}  </td>
                      <td> ${dato.NombreContacto} </td>
                      <td> ${dato.TelefonoContacto}  </td>
                      <td> ${dato.Email}</td>
                      <td> 'mas detalles...'</td>
                      </tr>
                      `;    
              }
          })
      }

      function cambiarboton(){
            document.getElementById("boton").style.display = "inline";
            document.getElementById("tablas").style.display = "none";
        document.getElementById("boton2").style.display = "none";
      }




    //Insertar Datos
		$(document).on("click","#Agregar",function(){
			var nombrecontrato = $('#nombrecontrato').val();
			var nombrecontacto = $('#nombrecontacto').val();
			var telefonocontacto = $('#telefonocontacto').val();
			var direccioncontrato = $('#direccioncontrato').val();
			var email = $('#email').val();
		//alert($('#codigocliente').val());
       	$.ajax({
			url: "http://localhost/movilform/backend/Contratos.php",
			method: "POST",
            data: {nombrecontrato:nombrecontrato, nombrecontacto: nombrecontacto,
                telefonocontacto: telefonocontacto, direccioncontrato: direccioncontrato, email: email},
				success: function(data){
					alert(data);
				}
            });
			alert("Datos ingresados Correctamente");
            location.href="http://localhost/movilform/frontend/contratos.php";
		})
        
    /*
    // Initialize and add the map --> api inabilitada
    function initMap() {
      // The location of Uluru
      var coords = {lat: -33.4369436, lng: -70.634449};
      // The map, centered at Uluru
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 4, center: coords});
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: coords, map: coords});
    }   */

       
        </script>
        <!--Load the API from the specified URL
        * The callback parameter executes the initMap() function
        -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>