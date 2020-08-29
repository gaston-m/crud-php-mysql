<?php 
require_once('db.php');

    if($_POST['save'] !== '' && $_POST['title'] !== '' && $_POST['description'] !== '' ) {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "INSERT INTO tasks(title, description) VALUES ('$title', '$description')";

        if($connection){
            echo 'hay conection';
        }

        $result = mysqli_query($connection, $query);
        if(!$result) {
            die('No se pudo guardar la tarea');
        } else {
            echo "Tarea guardada";
            
            $_SESSION['message'] = 'Tarea guardada con exito';
            $_SESSION['message_type'] = 'success';

            header("Location: index.php");
        }

    } else {
        $_SESSION['message'] = 'Debe completar todos los campos';
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");
    }
?>