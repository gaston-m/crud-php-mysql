<?php 
require_once('db.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM tasks WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        if($result) {
            $_SESSION['message'] = 'La tarea fue eliminada con exito';
            $_SESSION['message_type'] = 'success';
            
            return header('Location: index.php');
        }

        $_SESSION['message'] = 'No se pudo eliminar la tarea';
        $_SESSION['message_type'] = 'danger';

        header('Location: index.php');

    }
?>