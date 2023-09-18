<?php
// Classe service para tarefa$tarefa
    require_once(__DIR__."/../model/Tarefa.php");

    class TarefaService {

        public function validarDados(Tarefa $tarefa) {
            $erros = array();
            
            // Validar nome
            if (! $tarefa->getTitulo()) {
                array_push($erros, "Informe o Título!");

            } if (! $tarefa->getDescricao()) {
                array_push($erros, "Insira uma descrição!");

            } if (! $tarefa->getDtCriacao()) {
                array_push($erros, "Informe a data!");
            }

            if(! $tarefa->getTrStatus()) {
                array_push($erros, "Informe o status do trabalho!");
            }

            if(! $tarefa->getUsuario()) {
                array_push($erros, "Informe u Usuário!");
            }
            
            if(! $tarefa->getProjeto()) {
                array_push($erros, "Informe um projeto!");
            }

            return $erros;
            
        }
    }