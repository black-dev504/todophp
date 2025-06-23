<?php

declare(strict_types=1);

function isInputEmpty(string $input): bool {
    return empty($input);
}

function taskExists(object $pdo, string $task, int $user_id) {
    $tasks = does_task_exist($pdo, $task, $user_id);
    return $tasks ;
}

function addTask(object $pdo, string $task, int $user_id): void {
    create_task($pdo, $task, $user_id);
    header("Location: ../../index.php?task=success");


}

function deleteTask(object $pdo, string $taskId): void {
    remove_task($pdo, $taskId);

}

