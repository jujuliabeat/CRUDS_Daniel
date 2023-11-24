<?php 
//Modelo para Curso

class Curso {

    private ?int $id;
    private ?string $nome;
    private ?string $turno;

    //Método toString (chamado ao imprimir um objeto curso)
    public function __toString() {
        return $this->nome . 
            " (" . $this->turno . ")"; 
    }

    public function getDesc() {
        return $this->nome . 
            " (" . $this->turno . ")";
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
     * Get the value of turno
     */ 
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set the value of turno
     *
     * @return  self
     */ 
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }
}

