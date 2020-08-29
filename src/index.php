<?php   
  require_once('db.php');
?>

<?php include('./includes/header.php')  ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
            <?php
                if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php session_unset(); } ?>

            <div class="card">
              <div class="card-header text-center text-white bg-dark">
                <h4>
                    Crea una tarea
                </h4>
              </div>
              <div class="card-body">
                <form action="save-task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Ingresa un titulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="3" placeholder="Ingresa la descripcion" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name='save' value="Guardar" class="btn btn-success btn-block">
                    </div>
                </form>
              </div>
            </div>
            </div>
            <div class="col-md-8 mx-auto">
              <table class="table table-bordered">
                <thead>
                  <tr class="bg-dark text-white">
                   <th>
                     Titulo
                   </th>
                   <th>
                     Descripción
                   </th>
                   <th>
                     F. creación
                   </th>
                   <th>
                    Opciones
                   </th>
                  </tr>
                </thead>      
                <tbody>
                  <?php
                    include_once('includes/list-tasks.php');

                    while($row = mysqli_fetch_array($result_list)) { ?>
                      <tr>
                        <td>
                          <?= $row['title'] ?>
                        </td>
                        <td>
                          <?= $row['description'] ?>
                        </td>
                        <td>
                          <?= $row['created_at'] ?>
                        </td>
                        <td style="width: 115px; margin: auto">
                          <a href="edit-task.php?id=<?= $row['id'] ?>" class="btn btn-info">
                            <i class="fa fa-marker"></i>
                          </a> 
                          <a href="delete-task.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                           <i class="fa fa-trash-alt"></i>
                          </a> 
                        </td>
                      </tr>    

                    <?php }?>  
                </tbody>
              </table>        
            </div>
        </div>
    </div>




<?php include('./includes/footer.php')  ?>
