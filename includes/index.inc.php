<?php

declare(strict_types=1);


if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    require_once 'config_session.inc.php';
    require_once 'dbh.inc.php';
    require_once 'models/index.model.inc.php';
    require_once 'controls/index.contr.inc.php';



    if (isset($_POST['newTaskSubmit'])){

        $_SESSION['show_input'] = true;
        header('Location: ../index.php');
        die();
    }


    if ( isset($_POST['cancelTaskSubmit'])) {

        unset($_SESSION['show_input']);
        header('Location: ../index.php');
        die();
    } 


    if (isset($_POST['submitTask'])) {
        
        $task = trim($_POST['task']);
        $user_id = $_SESSION['user_id'];
        
        // ERROR HANDLER
        $errors =[];
        if (isInputEmpty($task)){
            $errors[] = "Task cannot be empty";
            throwError($errors);
        }

        if (taskExists($pdo, $task, $user_id)) {
            $errors[] = "Task already exists";
            throwError($errors);
        }

    
        addTask($pdo, $task, $user_id);
        header('Location: ../index.php');
        die();

    } 


    if (isset($_POST['deleteTask'])) {

        $taskId = $_POST['deleteTask'];
        deleteTask($pdo, $taskId);
        header('Location: ../index.php');
        die();
    
    } 


    if (isset($_POST['taskCheckbox'])) {
        $taskId = $_POST['taskCheckbox'];
        toggleTaskCompletion($pdo, $taskId);
        header('Location: ../index.php');
        die();
    }


}else {
    header('Location: ../index.php');
}


function throwError(array $errors): void {
    $_SESSION['errors'] = $errors;
    header('Location: ../index.php');
    die();
    
}

