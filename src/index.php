<?php $tasksFile = __DIR__ . '/tasks.json'; 
if (!file_exists($tasksFile)) {
     file_put_contents($tasksFile, json_encode([])); 
     } $tasks = json_decode(file_get_contents($tasksFile), true); 
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $tasks[] = $_POST['task']; 
         file_put_contents($tasksFile, json_encode($tasks));
          header("Location: /");
           exit; 
         } if (isset($_GET['delete'])) {
             unset($tasks[$_GET['delete']]); 
             file_put_contents($tasksFile, json_encode(array_values($tasks)));
              header("Location: /");
              exit;
              } 
              ?> <!DOCTYPE html>
               <html>
                 <head> 
                    <title>Simple Task Board</title>
                 </head>
                  <body>
                     <h1>Task Board</h1> <form method="post">
                         <input name="task" required>
                          <button>Add Task</button>
                         </form>
                          <ul> <?php foreach ($tasks as $i => $task): ?>
                             <li> <?= htmlspecialchars($task) ?> <a href="?delete=<?= $i ?>">❌</a> </li> 
                             <?php endforeach; ?>
                             </ul> 
                            </body> 
                            </html