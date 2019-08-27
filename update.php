<?php
require_once'class.php';

$id=$_GET['id'];
$con = new Crud();
$fetch=$con->buscarUser($id);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
  

<form method="POST" action="save.php">
                <h2>Modificar Usuario</h2>

                 <div class="form-group">
                    <label class="text-info">Id:</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $id?>" readOnly>
                </div>
                <div class="form-group">
                    <label class="text-info">Nombre:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $fetch['name']?>">
                </div>
                <div class="form-group">
                    <label class="text-info">Password:</label>
                    <input type="password" name="pass" class="form-control" value="<?php echo $fetch['password']?>">
                    
                </div>
                <input type="submit" name="save" value="Guardar" class="btn btn-primary">
            </form>
        </div>

</body>
</html>
