<?php
#Página com o formulário de alunos

//Inclui o HEADER
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../../controller/CursoController.php");

//Lista de curso para carregar o combo
$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
?>

<h2><?php echo (!$turma || $turma->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Turma</h2>

<div class="row mb-3">
    <div class="col-6">
        <form name="frmCadastroTurma" method="POST" >
            <div class="form-group">
                <label for="txtAno">Ano:</label>
                <input type="number" id="txtAno" name="ano" 
                    style="width: 150px;" class="form-control"
                    value="<?php echo ($turma != null ? $turma->getAno() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="somCurso">Curso:</label>
                <select id="somCurso" name="curso" class="form-control" onchange="buscarDisciplinas();">
                    <option value="0">---Selecione---</option>
                    <?php foreach($cursos as $c): ?>
                        <option value="<?= $c->getId() ?>"
                            <?php echo (($idCurso == $c->getId()) ? 'selected' : ''); ?>
                        >
                        
                        <?= $c ?></option>
                    <?php endforeach; ?>
                </select>        
            </div>

            <div class="form-group">
                <label for="somDisciplina">Disciplina:</label>
                <select id="somDisciplina" name="disciplina" class="form-control" 
                    idSelecionado="<?php echo ($turma && $turma->getDisciplina() ? $turma->getDisciplina()->getId() : '0'); ?>">
                    
                </select>        
            </div>

            <input type="hidden" name="submetido" value="1" />
            <input type="hidden" id="hddBaseUrl" value="<?= BASE_URL ?>" />
            <input type="hidden" name="id" 
                value="<?php echo ($turma ? $turma->getId() : 0); ?>" />

            <button type="submit" class="btn btn-success">Gravar</button>
            <button type="reset" class="btn btn-info">Limpar</button>
        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?php echo $msgErro; ?>
            </div>
        <?php endif; ?>
        
        <div id="divMsgErro" class="alert alert-danger" style="display: none;">
            
        </div>
    </div> 
</div>

<div>
    <a href="listar.php" class="btn btn-outline-secondary">Voltar</a>
</div>

<?php 
//Inclui o FOOTER
require_once(__DIR__ . "/../include/footer.php");
?>

<script src="js/turmas.js"></script>
