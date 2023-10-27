<?php
require_once(__DIR__ . "/../login/verifica.php");
require_once(__DIR__ . "/../../controller/TurmaController.php");

//Teste de conexão
//$connection = Connection::getConnection();
//print_r($connection);

//Inclui o HEADER
require_once(__DIR__ . "/../include/header.php");

//Carregar a lista de turmas
$turmaCont = new TurmaController();
$turmas = $turmaCont->listar();
//print_r($turmas);
?>

<h4>Listagem de turmas</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Ano</td>
            <td>Disciplina</td>
            <td>Curso</td>
            <td></td>
            <td></td>
        </tr>
    </thead>

    <tbody>
        <?php foreach($turmas as $t): ?>
            <tr>
                <td><?= $t->getId(); ?></td>
                <td><?= $t->getAno(); ?></td>
                <td><?= $t->getDisciplina(); ?></td>
                <td><?= $t->getDisciplina()->getCurso(); ?></td>
                <td><a href="alterar.php?id=<?= $t->getId(); ?>"><img src="../../img/btn_editar.png" /></a></td>
                <td><a href="excluir.php?id=<?= $t->getId(); ?>" 
                    onclick="return confirm('Confirma a exclusão da turma?')">
                        <img src="../../img/btn_excluir.png" />
                </a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
//Inclui o FOOTER
require_once(__DIR__ . "/../include/footer.php");
?>

