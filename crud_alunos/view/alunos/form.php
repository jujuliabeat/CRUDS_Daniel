<?php
    // Formulário para alunos

    include_once(__DIR__."/../../controller/CursoController.php");
    include_once(__DIR__."/../include/header.php");

    $cursoCont = new CursoController();
    $cursos = $cursoCont->listar();
    // print_r($cursos);
?>

    <h3>Inserir Alunos</h3>

    <form action="" method="POST" id="form">

        <div>
            <label for="txtNome">Nome:</label>
            <input type="text" name="nome" id="txtNome"/>
        </div> 

        <br>

        <div>
            <label for="txtIdade">Idade:</label>
            <input type="number" name="idade" id="txtIdade"/>
        </div>

        <br>

        <div>
            <label for="selEstrange">Estrangeiro:</label>
            <select name="estrang" id="selEstrange">
                <option value="">--Selecione--</option>
                <option value="S">Sim</option>
                <option value="N">Não</option>
            </select>
        </div>

        <br>
        
        <div>
            <label for="selCurso">Curso:</label>
            <select name="curso" id="selCurso">
                <option value="">--Selecione o Curso--</option>
                <?php foreach($cursos as $curso): ?>
                    <option value="<?= $curso->getId(); ?>">
                        <?= $curso->getNome(); ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <input type="hidden" name="submetido" value="1"/>
        
        <button type="submit">Gravar</button>
        <button type="reset">Limpar</button>
        
    </form>

<?php
    include_once(__DIR__."/../include/footer.php");
?>