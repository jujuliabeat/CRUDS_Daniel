const baseURL = document.getElementById('hddBaseUrl') . value;

const inputCurso = document.getElementById('somCurso');
const inputDisciplina = document.getElementById('somDisciplina');

buscarDisciplinas();

function buscarDisciplinas() {
    // Remover os options já existentes no select de disciplinas 
    while(inputDisciplina.children.length > 0 )  {
        inputDisciplina.children[0].remove();

    }

    var xhttp = new XMLHttpRequest()
    
    var url = baseURL + "/API/listar_por_curso.php?idCurso=" + inputCurso.value;
    xhttp.open("GET", url, false);

    xhttp.send();

    var json = xhttp.responseText;
    var disciplinas = JSON.parse(json);

    // Criar option vazia 
    criarOptionDisciplina("---Selecione---", "", "--");

    var idSelecionado = inputDisciplina.getAttribute("idSelecionado");
    disciplinas.forEach(disc => {

        // console.log(disc.codigo)
        criarOptionDisciplina(disc.nome, disc.id, idSelecionado);
        
    });

}
    function criarOptionDisciplina(desc, valor, valorSelecionado) {
        
        var option = document.createElement("option");
        option.innerHTML = desc;
        option.setAttribute("value", valor);

        if(valor == valorSelecionado)
            option.selected = true;
        
        inputDisciplina.appendChild(option);

}