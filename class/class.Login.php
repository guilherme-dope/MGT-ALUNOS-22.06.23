<?php
require_once("class.BancoDeDados.php");

class Login extends BancoDeDados
{
    public function listarLogins()
    {
        return $this->executarConsulta("SELECT * FROM login l LEFT OUTER JOIN aluno a ON l.idaluno = a.idaluno");
    }

    public function InserirLogin($dslogin, $dssenha, $idaluno)
    {
        return $this->executarConsulta("INSERT INTO login (dslogin, dssenha, idaluno) VALUES ('$dslogin', '$dssenha', $idaluno)");
    }

    public function DeletarAcessoLogin($dslogin)
    {
        return $this->executarConsulta("DELETE FROM login WHERE dslogin = '" . $dslogin . "'");
    }

    public function ModificarSenha($dslogin, $dssenha)
    {
        return $this->executarConsulta("UPDATE login SET dssenha = '" . $dssenha . "' WHERE dslogin = '" . $dslogin . "'");
    }

    public function validarLogin($login, $senha)
    {
        $resultado = $this->executarConsulta("SELECT * FROM login l WHERE l.dslogin = '" . $login . "' AND l.dssenha = '" . $senha . "'");
        $registros = mysqli_num_rows($resultado);
        if ($registros == 1)
            return true;
        return false;
    }

    public function revLogin()
    {
        $token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

        session_name($token);
        session_start();

        if (!isset($_SESSION["login"]) || !isset($_SESSION["senha"]) || !isset($_SESSION["token"])) {
            session_destroy();
            header("location:index.php?erro=SEMLOGIN");
        }

        if ($_SESSION["token"] != $token) {
            session_destroy();
            header("location:index.php?erro=INVASAO");
        }

        if (!$this->validarLogin($_SESSION["login"], $_SESSION["senha"])) {
            session_destroy();
            header("location:index.php?erro=LOGININVALIDO");
        }
    }
}

$rev_log = new Login();