<?php 
//Controller para Aluno

require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../model/Aluno.php");
require_once(__DIR__ . "/../service/AlunoService.php");
require_once(__DIR__ . "/../service/ArquivoService.php");

class AlunoController {

    private $alunoDAO;
    private $alunoService;
    private $arquivoService;

    public function __construct() {
        $this->alunoDAO = new AlunoDAO();        
        $this->alunoService = new AlunoService();
        $this->arquivoService = new ArquivoService();
    }

    public function listar() {
        return $this->alunoDAO->list();        
    }

    public function buscarPorId(int $id) {
        return $this->alunoDAO->findById($id);
    }

    public function inserir(Aluno $aluno, $arquivoFoto) {
        //Valida e retorna os erros caso existam
        $erros = $this->alunoService->validarDados($aluno);
        if($erros) 
            return $erros;

        //Salva a foto no diretorio
        $nomeArquivo = $this->arquivoService->salvarArquivo($arquivoFoto);
        $aluno->setImgFoto($nomeArquivo);

        //Persiste o objeto e retorna um array vazio
        $this->alunoDAO->insert($aluno);
        return array();
    }

    public function atualizar(Aluno $aluno, $arquivoFoto) {
        $erros = $this->alunoService->validarDados($aluno);
        if($erros) 
            return $erros;

        //Salva a foto no diretorio
        $nomeArquivoVelho = $aluno->getImgFoto();
        $nomeArquivo = $this->arquivoService->salvarArquivo($arquivoFoto);
        if($nomeArquivo)
            $aluno->setImgFoto($nomeArquivo);
        else
            $aluno->setImgFoto($nomeArquivoVelho);
        
        //Remove o arquivo caso não exista mais
        if($nomeArquivoVelho && ($aluno->getImgFoto() != $nomeArquivoVelho))
            $this->arquivoService->removerArquivo($nomeArquivoVelho);

        //Persiste o objeto e retorna um array vazio
        $this->alunoDAO->update($aluno);
        return array();
    }

    public function excluirPorId(int $id, $nomeArquivoFoto) {
        $this->alunoDAO->deleteById($id);

        if($nomeArquivoFoto)
            $this->arquivoService->removerArquivo($nomeArquivoFoto);
    }

}