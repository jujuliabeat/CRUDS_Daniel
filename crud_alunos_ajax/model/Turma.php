<?php
#Arquivo com a declaração da classe Turma

require_once(__DIR__ . "/Disciplina.php");

class Turma {

    private int $id;
    private ?int $ano;
    private ?Disciplina $disciplina;

    public function __construct() {
        $this->id = 0;
        $this->disciplina = null;
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
     * Get the value of ano
     */ 
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     *
     * @return  self
     */ 
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of disciplina
     */ 
    public function getDisciplina()
    {
        return $this->disciplina;
    }

    /**
     * Set the value of disciplina
     *
     * @return  self
     */ 
    public function setDisciplina($disciplina)
    {
        $this->disciplina = $disciplina;

        return $this;
    }
}

?>