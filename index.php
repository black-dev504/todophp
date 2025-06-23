<?php
require_once 'includes/views/index.view.inc.php';
require_once 'includes/config_session.inc.php'; 
require_once 'includes/views/errorhandler.view.inc.php';


require_login();

?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once 'header.php'; 
?>
<body>

    <section>
        <div class="bg-[#e4d5ff] max-w-3xl mx-auto px-5 lg:px-20 py-8 my-20 rounded-lg shadow-lg"   >
            <div class="flex flex-col  ">

                <div class="w-full bg-[#b26cff] p-2 items-center  text-white flex max-h-15 mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                        <rect y="4" width="24" height="2" rx="1"/>
                        <rect y="11" width="24" height="2" rx="1"/>
                        <rect y="18" width="24" height="2" rx="1"/>
                        </svg>

                    <div class="flex text-center justify-center w-full items-center">
                    <h1 class="text-2xl font-bold ml-2">Todo</h1>
                    </div>
                </div>

                <div class="relative bg-white p-10 rounded-lg shadow-lg w-full">
                    <ul class=" space-y-4">
                    <?php
                        display_tasks()
                    ?>
                    </ul>
              
                    <form action="includes/index.inc.php" method='post'  class="flex relative justify-center top-3 w-full">
                     <button type='submit' name='newTaskSubmit' class=" bg-[#b26cff] absolute  rounded-full text-white px-4 py-3 cursor-pointer">+ New Task</button>
                     </form>
                </div>

                    <?php if (isset($_SESSION['show_input'])): ?>
                        <form action="includes/index.inc.php" method='post' class='flex w-full items-center justify-center mt-10 gap-3'>
                            <input type="text" name="task" placeholder="Enter your task here" class="w-full bg-white p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#b26cff]">
                            <button class='bg-[#b26cff] ml-2 px-5 py-2 rounded-lg text-white cursor-pointer' type='submit' name='submitTask'>Submit</button>
                            <button type='submit' name='cancelTaskSubmit' class="ml-2 bg-red-500 text-white  rounded-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="white">
                                <circle cx="12" cy="12" r="11" fill="white" stroke="#e53e3e" stroke-width="2"/>
                                <path d="M15 9L9 15M9 9l6 6" stroke="#e53e3e" stroke-width="2" stroke-linecap="round"/>
                                </svg>

                            </button>

                        </form>

            
                    <?php endif; ?>
                    <?php
                    display_errors();
                    ?>

                </div>

                
        </div>
    </section>

</body>
</html>