<?php

declare(strict_types=1);

require_once __DIR__ . '/../models/index.model.inc.php';

function display_tasks(){
    require_once __DIR__ . '/../config_session.inc.php';
    require_once __DIR__ . '/../dbh.inc.php';

    $tasks = get_all_tasks($pdo, $_SESSION['user_id']);

    if (empty($tasks)) {
        echo '<p class="italic text-center text-[#777777]">No task available.</p>';
    } else {
        foreach ($tasks as $task) {

            echo '<form class="flex items-center justify-between w-full group" action="includes/index.inc.php" method="post"> 
               <label class="flex items-center cursor-pointer group">
                    <input type="hidden" name="taskCheckbox" value="' . $task['id'] . '" />
                   <input class=" peer border-1 border-gray-400 checked:bg-gray-400 appearance-none w-2 h-2 rounded-full mr-3  group-hover:bg-gray-400 " type="checkbox" name="taskCheckbox" value="' . $task['id'] . '" onchange="this.form.submit()" ' . ($task['is_complete'] ? 'checked' : '') . ' />
                   <span class="peer-checked:line-through peer-checked:text-gray-400 group-hover:text-gray-400">' . htmlspecialchars($task['task']) . '</span>
                </label>
                    <button class="cursor-pointer hidden group-hover:flex" type="submit" name="deleteTask" value="'. $task['id'] .'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#b26cff" stroke-width="2" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M3 6h18M9 6V4h6v2m2 0v14a2 2 0 01-2 2H9a2 2 0 01-2-2V6h10zM10 11v6M14 11v6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </button>
            
                </form>';
           
        }
    }
}