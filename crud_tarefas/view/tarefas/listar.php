<?php
    // Página view para listagem de Tarefa
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__."/../../controller/TarefaController.php");
    // require_once()

    $tarefaCont = new TarefaController();
    $tarefa = $tarefaCont->listar();
     print_r($tarefa);
?>

       
                        

