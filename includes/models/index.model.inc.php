<?php

declare(strict_types=1);

function does_task_exist(object $pdo, string $task, int $user_id) {
    try{

    $query = 'SELECT * FROM tasks WHERE task = :task AND user_id = :user_id';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['task' => $task, 'user_id' => $user_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    $stmt = null; 
    return $result;

    } catch (PDOException $e) {
        $pdo = null;  
        header("Location: ../../index.php?error=stmtfailedd");
        exit();
    }
}

function get_all_tasks(object $pdo, int $user_id): array {
    try {
        $query = 'SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at ;';
        $stmt = $pdo->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;  
        $stmt = null;   
        return $result;
    } catch (PDOException $e) {
        $pdo = null;  
        header("Location: ../../index.php?error=stmtfailed");
        exit();
    }
}

function create_task(object $pdo, string $task, int $user_id): void {
    try {
        $query = 'INSERT INTO tasks (task, user_id) VALUES (:task, :user_id);';
        $stmt = $pdo->prepare($query);
        $stmt->execute(['task' => $task, 'user_id' => $user_id]);
        $pdo = null;  
        $stmt = null;   
    } catch (PDOException $e) {
        $pdo = null;  
        header("Location: ../../index.php?error=stmtfailed");
        exit();
    }   
}

function remove_task(object $pdo, string $taskId): void {
    try {
        $query = 'DELETE FROM tasks WHERE id = :id;';
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $taskId]);
        $pdo = null;  
        $stmt = null; 
    } catch (PDOException $e) {
        $pdo = null;
        header("Location: ../../index.php?error=stmtfailed");
        exit();
    }
}

function toggleTaskCompletion(object $pdo, string $taskId): void {
    try {
        $query = 'UPDATE tasks SET is_complete = NOT is_complete WHERE id = :id;';
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $taskId]);
        $pdo = null;  
        $stmt = null; 
    } catch (PDOException $e) {
        $pdo = null;  
        header("Location: ../../index.php?error=stmtfailed");
        exit();
    }
}