<?php
#Arquivo com a declaração da classe Disciplina

require_once(__DIR__ . "/Curso.php");

class Disciplina implements JsonSerializable {

    private int $id;
    private ?string $codigo;
    private ?string $nome;
    private ?Curso $curso;

    public function __construct($id=0) {
        $this->id = $id;
        $this->curso = null;
    }

    public function __toString() {
        return $this->codigo . " - " . $this->nome;
    }

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "codigo" => $this->codigo,
                     "nome" => $this->nome);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of curso
     */ 
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     *
     * @return  self
     */ 
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }
}

?>