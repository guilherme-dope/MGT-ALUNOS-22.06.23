<?php
require_once("class.BancoDeDados.php");

class Disciplina extends BancoDeDados
{
    public function listarDisciplinas()
    {
        return $this->retornaArray("SELECT * FROM disciplina");
    }

    public function listarDisciplina($iddisciplina)
    {
        return $this->retornaArray("SELECT * FROM disciplina WHERE iddisciplina = " . $iddisciplina);
    }

    public function InserirDiscp($dsdisciplina)
    {
        return $this->executarConsulta("INSERT INTO disciplina (dsdisciplina) VALUES ('" . $dsdisciplina . "')");
    }

    public function DeletarDiscp($iddisciplina)
    {
        return $this->executarConsulta("DELETE FROM disciplina WHERE iddisciplina = " . $iddisciplina);
    }

    public function ModificarDiscp($iddisciplina, $dsdisciplina)
    {
        return $this->executarConsulta("UPDATE disciplina SET dsdisciplina = '" . $dsdisciplina . "' WHERE iddisciplina = " . $iddisciplina);
    }
}

$disciplina = new Disciplina();
