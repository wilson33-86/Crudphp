<?php
require_once'class.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Usuarios</title>

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
   
   <style type="text/css">
	 
     .iconos{
     	display: flex;
     	justify-content: flex-start;
     }
    .iconos a{
    	flex:1;
    	    }
     .glyphicon{
     	font-size: 17px;
     }
   </style>

    <script type="text/javascript">
	$(document).ready(function(){
   
      $('[data-toggle="tooltip"]').tooltip();
     
	});
    </script>
</head>

<body>

	<div class="container">
     
     
     	
 

     <?php if (isset($_SESSION['message'])) {?>
    
          <p class="alert alert-<?= $_SESSION['msg'] ?>"><button class="close" type="button" data-dismiss="alert">&times;</button>
          <?=$_SESSION['message'];?>
         <?php unset($_SESSION['message']);
                unset($_SESSION['msg']);
             
         ?>
          </p>
     <?php
          }
      ?>

     

     <div class="row">
         
            
     	<div class="col-md-12">
            <button class="btn btn-success" style="margin: 20px 0;" type="button" data-toggle="modal" data-target="#mimodal">Crear Nuevo Usuario</button>
       
     		<table class="table table-striped table-dark ">
     			<thead >
     				<tr>
     				<th scope="col">Id</th>
     				<th scope="col">Nombre</th>
     				<th scope="col">Password</th>
     				<th scope="col">Acciones</th>

     				</tr>
     			</thead>
     			<tbody>
     				<?php 
                       $con = new Crud();
                       $list = $con->list();
                       while ($row = $list->fetch_array()) {
                       	
                    ?>
     				<tr>
     					<td><?php echo $row['id']?></td>
     					<td><?php echo $row['name']?></td>
     					<td><?php echo $row['password']?></td>
     					<td class="iconos">
     						
     						<a href="update.php?id=<?php echo $row['id']?>"  data-toggle="tooltip"  title="Editar"><span class="badge badge-warning badge-pill">Editar</span></a>

     						<a href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Esta seguro de borrar este registro')" data-toggle="tooltip"  title="Borrar"><span class="badge badge-danger badge-pill">Eliminar</span></a>
     						
     					</td>
     				</tr>
     			<?php }?>
     			</tbody>
    
       </table>
     		
     	</div>
     	
            

            <div class="modal fade" id="mimodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title">Crear Usuario</h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="createUser.php">
                                
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="pass" class="form-control" required>
                                    
                                </div>
                                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
                            </form>
                        </div>
                       
                    </div>
                </div>
           </div><!--modal-->
     
     </div>
		
       
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>