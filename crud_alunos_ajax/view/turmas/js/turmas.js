const baseURL = document.getElementById('hddBaseUrl') . value;

const inputAno = document.getElementById('txtAno');
const inputCurso = document.getElementById('somCurso');
const inputDisciplina = document.getElementById('somDisciplina');

const divErros = document.getElementById('divMsgErro');

buscarDisciplinas();

function buscarDisciplinas() {
    // Remover os options já existentes no select de disciplinas 
    while(inputDisciplina.children.length > 0 )  {
        inputDisciplina.children[0].remove();

    }

    // Criar option vazia 
    criarOptionDisciplina("---Selecione---", "", "--");
    
    var idSelecionado = inputDisciplina.getAttribute("idSelecionado");

    // Requisição AJAX 
    var xhttp = new XMLHttpRequest()
    
    var url = baseURL + "/API/listar_por_curso.php?idCurso=" + inputCurso.value;
    xhttp.open("GET", url);

    // Função de retorno executada após a resposta chegar no cliente 
    xhttp.onload = function() {

        // Resposta da requisição --- Callbek
        console.log("Resposta recebida do Servidor");
        
        var json = xhttp.responseText;
        var disciplinas = JSON.parse(json);

        disciplinas.forEach(disc => {

            // console.log(disc.codigo)
            criarOptionDisciplina(disc.nome, disc.id, idSelecionado);
            
        });

    }

    xhttp.send();
    console.log("Requisição enviada ao servidor!");
    console.log("Nova Mensagem 1!");
    console.log("Nova Mensagem 2!");

}
    function criarOptionDisciplina(desc, valor, valorSelecionado) {
        
        var option = document.createElement("option");
        option.innerHTML = desc;
        option.setAttribute("value", valor);

        if(valor == valorSelecionado)
            option.selected = true;
        
        inputDisciplina.appendChild(option);

}
    function inserirTurma() {

        // Estrutura FormData para enviar os parâmetros no corpo da requisição do tipo POST
        var dados = new FormData();
            dados.append("ano", inputAno.value);
            dados.append("idCurso", inputCurso.value);
            dados.append("idDisc", inputDisciplina.value);

        // Rquisição AJAX
        var xhttp = new XMLHttpRequest();

        var url = baseURL + "/API/inserir_turma.php";

        xhttp.open("POST", url);

        xhttp.onload = function() {

            var resposta = xhttp.responseText;
            // console.log (resposta);
            if(resposta) {
                divErros.innerHTML = resposta;
                divErros.style.display = "block";
            } else {
                // redirecionar para a listagem 
                window.location = "listar.php";
            }


        }
        xhttp.send(dados);

    }