<?php 
//Página view para listagem de alunos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/AlunoController.php");

$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
//print_r($alunos);
?>
<?php 
require(__DIR__ . "/../include/header.php");
?>

<h4>Listagem de alunos</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Estrangeiro</th>
            <th>Curso</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alunos as $a): ?>
            <tr>
                <td>
                    <img style="height:50px;"  src="<?= URL_ARQUIVOS . "/" . $a->getImgFoto() ?>" class="rounded">
                </td>
                <td><?= $a->getNome(); ?></td>
                <td><?= $a->getIdade(); ?></td>
                <td><?= $a->getEstrangeiroTexto(); ?></td>
                <td><?= $a->getCurso(); ?></td>
                <td><a href="alterar.php?idAluno=<?= $a->getId() ?>"> 
                        <img src="../../img/btn_editar.png" /> 
                    </a>
                </td>
                <td><a href="excluir.php?idAluno=<?= $a->getId() ?>"
                       onclick="return confirm('Confirma a exclusão?');" > 
                        <img src="../../img/btn_excluir.png" /> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>
    
    
