<?php
//Formulário para alunos

require_once(__DIR__ . "/../../controller/CursoController.php");
require_once(__DIR__ . "/../include/header.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);
?>

<h3 style="color:darkseagreen;"><?php echo (!$aluno || $aluno->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Aluno</h3>


<div class="row">
    <div class="col-6">
    <form id="frmAluno" method="POST">

        <div class="form-group">
            <label for="txtNome">Nome:</label>
            <input type="text" name="nome" id="txtNome" class="form-control" value="<?php echo ($aluno ? $aluno->getNome() : ''); ?>" />
        </div><br>

        <div class="form-group">
            <label for="txtIdade">Idade:</label>
            <input type="number" name="idade" id="txtIdade" class="form-control"
            value="<?php echo ($aluno ? $aluno->getIdade() : ''); ?>" />
        </div><br>

        <div class="form-group">
            <label for="selEstrang">Estrangeiro:</label>
            <select id="selEstrang" name="estrang" class="form-control">
                <option value="">---Selecione---</option>
                <option value="S" <?php echo ($aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : ''); ?>>
                    Sim</option>
                <option value="N" <?php echo ($aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : ''); ?>>
                    Não</option>

            </select>
        </div><br>

        <div class="form-group">
            <label for="selCurso">Curso:</label>
            <select id="selCurso" name="curso" class="form-control">
                <option value="">---Selecione---</option>

                <?php foreach ($cursos as $curso) : ?>
                    <option value="<?= $curso->getId(); ?>" 
                    <?php
                            if (
                                $aluno && $aluno->getCurso() && $aluno->getCurso()->getId() ==
                                $curso->getId()
                                ) {
                                echo "selected";
                                }
                            ?>>
                        <?= $curso->getNome(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div><br>
        <input type="hidden" name="id" value="<?php echo ($aluno ? $aluno->getId() : 0); ?>" />

        <input type="hidden" name="submetido" value="1" />


        <button type="submit" class="btn btn-success">Gravar</button>
        <button type="reset" class="btn btn-success" >Limpar</button>

    </form><br>
</div>


    <div class="col-6">
        <?php if($msgErro): ?>
        <div class="alert alert-danger">
            <?php echo $msgErro; ?>
        </div><br>
        <?php endif;?>
    </div>
</div>



<a href="listar.php" class="btn btn-success">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>