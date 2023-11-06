const baseURL = document.getElementById('hddBaseUrl') . value;

const inputCurso = document.getElementById('somCurso');

function buscarDisciplinas() {

    var xhttp = new XMLHttpRequest()
    
    var url = baseURL + "/API/listar_por_curso.php?idCurso=" + inputCurso.value;
    xhttp.open("GET", url, false);

    xhttp.send();

    var json = xhttp.responseText;
    var disciplinas = JSON.parse(json);

    disciplinas.forEach(disc => {

        console.log(disc.codigo)
        
    });
    
    // console.log(resposta);

}