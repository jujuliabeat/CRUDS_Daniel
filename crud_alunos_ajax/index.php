<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Teste de conexão
require_once(__DIR__ . "/util/Connection.php");
$connection = Connection::getConnection();
print_r($connection);
*/

include_once(__DIR__ . "/view/include/header.php");
?>

<div class="row mt-3 justify-content-center justify-align-center">
    <div class="col-3">
        <div class="card text-center">
            <img class="card-image-top mx-auto" src="img/card_aluna.png" 
                style="max-width: 200px; height: auto;" />
            <div class="card-body">
                <h5 class="card-title">Alunos</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= BASE_URL ?>/view/alunos/listar.php" 
                        class="card-link">
                        Listagem de Alunos</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-3">
		<div class="card text-center">
			<img class="card-image-top mx-auto"
					src="<?= BASE_URL ?>/img/card_turmas.png" 
					style="max-width: 200px; height: auto;" />
	
			<div class="card-body ">
            	<h5 class="card-title">Turmas</h5>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<a href="<?= BASE_URL ?>/view/turmas/listar.php" class="card-link">
						Listagem de Turmas</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php
include_once(__DIR__ . "/view/include/footer.php");
?>