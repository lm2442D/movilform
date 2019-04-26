<?php 
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script>
    $(document).on("click","#login",function(){
			var codigocli = $('#codigocli').val();
      var contrasena = $('#contrasena').val();
      if (codigocli == "" || contrasena ==""){
        alert("Complete todos los campos");
      }else{
            $.ajax({
                url: "http://localhost/movilform/backend/Sesion.php",
                method: "POST",
                data: {codigocli:codigocli, contrasena: contrasena},
                    success: function(data){
                        //alert(data);
                    }
                });          
			      alert('Bienvenido');        
            //location.href="../index.html";
      }
		})


    //Insertar Datos
		$(document).on("click","#Agregar",function(){
			var codigocliente = $('#codigocliente').val();
			var razonsocial = $('#razonsocial').val();
			var password = $('#password').val();
			var password2 = $('#password2').val();
			var nombrefantasia = $('#nombrefantasia').val();
			var direccioncomercial = $('#direccioncomercial').val();
      //var email=$('#email').val();
        //para el mail
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(codigocliente)){
            alert("La dirección de email " + codigocliente + " es correcta.");
            } else {
        alert("La dirección de email es incorrecta.");
        }

        if(password!=password2)
        {
            alert('Contraseñas no coinciden');
        }else{
            $.ajax({
                url: "http://localhost/movilform/backend/Clientes.php",
                method: "POST",
                data: {codigocliente:codigocliente, razonsocial: razonsocial, password: password, password2: password2, nombrefantasia: nombrefantasia, direccioncomercial
                : direccioncomercial},
                    success: function(data){
                        alert(data);
                    }
                });
            $.ajax({
                url: "http://localhost/movilform/backend/Login.php",
                method: "POST",
                data: {codigocliente:codigocliente, password: password, password2: password2},
                    success: function(data){
                        //alert(data);
                    }
            });
       	
			alert('Verificando Datos ingresados');
        }

            //location.href="../index.html";
		})
	// ************************************************ Fin Insertar

    </script>
    
    
    <title>MovilForm</title>

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

<div class="container center-block">
  <h2>Conectate</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="codigocli" name="codigocli" placeholder="Ingrese email: ejemplo@ejemplo.cl">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
    </div>
    <button type="submit" id="login" name="login" class="btn btn-success">Ingresar</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Registrate
    </button>
  </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="form-group">
                <label for="inputAddress">Razon Social</label>
                <input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Razon Social de la Empresa">
            </div>
            <div class="form-group">
                <label for="inputemail">Email</label>
                <input type="email" class="form-control" id="codigocliente" name="codigocliente" placeholder="Email de la empresa">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password Alfanumerico">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Repetir Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Repetir Password">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Dirección Comercial</label>
                <input type="text" class="form-control" id="direccioncomercial" name="direccioncomercial" placeholder="Ejemplo: Francisco Meneses 1980 ">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Nombre de Fantasia</label>
                <input type="text" class="form-control" id="nombrefantasia" name="nombrefantasia" placeholder="Nombre de Fantasia de la Empresa">
            </div>
            </div>
            <button name="Agregar" id="Agregar" class="btn btn-primary">Registrarse</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>