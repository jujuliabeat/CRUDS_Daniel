<?php
//View para excluir um aluno

require_once(__DIR__ . '/../../controller/AlunoController.php');

//Receber o parâmetro
$idAluno = 0;
if(isset($_GET['idAluno']))
    $idAluno = $_GET['idAluno'];

//Carregar o aluno 
$alunoCont = new AlunoController();   
$aluno = $alunoCont->buscarPorId($idAluno);

//Verificar se o aluno existe
if(! $aluno) {
    echo "Aluno não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o aluno
$alunoCont->excluirPorId($aluno->getId());

//Redirecionar para a listar
header("location: listar.php");