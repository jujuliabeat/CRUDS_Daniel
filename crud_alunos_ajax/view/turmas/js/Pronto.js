const inputCurso = document.querySelector('#somCurso');
const inputDisciplina = document.querySelector('#somDisciplina');
const inputAno = document.querySelector('#txtAno');
const inputBaseUrl = document.querySelector('#hddBaseUrl');

const divMsgErro = document.querySelector("#divMsgErro");

//Chamada inicial para caso já exista algum curso selecionado
carregarDisciplinas(); 

function carregarDisciplinas() {
    //Remove as opções de inputDisciplina
    inputDisciplina.querySelectorAll('option').forEach(opt => opt.remove());
    criarOption(inputDisciplina, 0, "---Selecione---", 0); //Cria novamente a opção vazia
    
    var url = inputBaseUrl.value + 
              "/api/disciplinas/listar_por_curso.php?id_curso=" + inputCurso.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', url, true);

    xhttp.onload = function() {
        var retornoTexto = xhttp.responseText; 
        //console.log(retornoTexto);

        //Percorre o retorno da requisição (array de objetos JS), adicionando as opções ao select
        var disciplinas = JSON.parse(retornoTexto);
        disciplinas.forEach(disc => {
            criarOption(inputDisciplina, 
                        disc.id, 
                        disc.codigo + " - " + disc.nome,
                        inputDisciplina.getAttribute('idSelecionado'));
        });
    }

    //Envia a requisição
    xhttp.send();
}

function criarOption(elem, value, label, valueSelected) {
    var option = document.createElement('option');
    option.setAttribute("value", value);
    option.innerHTML = label;

    if(value == valueSelected)
        option.selected = true;

    elem.appendChild(option);
}

function gravarTurma() {
    //Cria o objeto FormData para enviar os dados via POST
    var dados = new FormData();
    dados.append("ano", inputAno.value);
    dados.append("curso", inputCurso.value);
    dados.append("disciplina", inputDisciplina.value);

    //Criar a requisição
    var url = inputBaseUrl.value + 
              "/api/turmas/inserir.php";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', url, true);

    xhttp.onload = function() {
        //console.log(xhttp.responseText);
        var retorno = xhttp.responseText;
        if(retorno) { //Deu erro
            divMsgErro.innerHTML = retorno;
            divMsgErro.style.display = 'block';
        } else { //Deu certo, redireciona para a listagem
             window.location = "listar.php";
        }
    }

    //Envia a requisição
    xhttp.send(dados);
}