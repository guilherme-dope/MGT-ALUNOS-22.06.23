<?php
require_once("class.BancoDeDados.php");

class Avaliacao extends BancoDeDados
{

    public function listarAv($idavaliacao)
    {
        return $this->retornaArray("SELECT * FROM avaliacao WHERE idavaliacao = " . $idavaliacao);
    }

    public function listarAvs()
    {
        return $this->executarConsulta("SELECT * FROM avaliacao av LEFT OUTER JOIN aluno a ON av.idaluno = a.idaluno LEFT JOIN disciplina d ON av.iddisciplina = d.iddisciplina");
    }

    public function InserirAv($idaluno, $iddisciplina, $nota)
    {
        return $this->executarConsulta("INSERT INTO avaliacao (idaluno, iddisciplina, nota) VALUES ($idaluno, $iddisciplina, $nota)");
    }

    public function ModificarAv($idavaliacao, $nota)
    {
        return $this->executarConsulta("UPDATE avaliacao SET nota = '" . $nota . "' WHERE idavaliacao = " . $idavaliacao);
    }

    public function DeletarAv($idavaliacao)
    {
        return $this->executarConsulta("DELETE FROM avaliacao WHERE idavaliacao = " . $idavaliacao);
    }
}

$avaliacao = new Avaliacao();
