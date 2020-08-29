<?php 
require_once('db.php');

  if(isset($_POST['title'], $_POST['description'], $_GET['id'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $id = $_GET['id'];

      echo $id;
      var_dump($id);

      $query = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = '$id'";

      $result = mysqli_query($connection, $query);

      if($result) {
          $_SESSION['message'] = 'Tarea actualizada satidfactoriamente';
          $_SESSION['message_type'] = 'success';
      } else {
        $_SESSION['message'] = 'No se pudo actualizar la tarea';
        $_SESSION['message_type'] = 'danger';
      }

      return header('Location: index.php');
  }

  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tasks WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
        $title =  $row['title'];
        $description = $row['description'];


    require_once('includes/header.php');
?>
  
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3>
                            Editar Tarea
                        </h3>
                    </div>
                    <div class="card-body">
                      <form action="edit-task.php?id=<?= $id ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?= $title ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="3" class="form-control"><?= $description ?></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block">Editar</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once('includes/footer.php');

    }
  }

?>