<?php

//session_name(md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));


/*
    function revalidarLogin()
    {
        session_name(md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));
        session_start();

        if (empty($_SESSION['token']) || empty($_SESSION['dssenha']) ||
        empty($_SESSION['dslogin']))
        {
            return false;
        }

        $tokenBody = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        
        if ($_SESSION['token'] != $tokenBody)
        {
            return false;
        }

        $sqlValida = "Select * from login where dslogin='@login' and dssenha='@senha'";
        $sql = str_replace("@login",$_SESSION['dslogin'],$sqlValida);
        $sql = str_replace("@senha",md5($_SESSION['dssenha']),$sql);

        $login = selectRegistros($sql);

        if(count($login) > 0) return true;
        else return false;
    }

*/

/*
Session destroy

<?php
// Inicializa a sessão.
// Se estiver sendo usado session_name("something"), não esqueça de usá-lo agora!
session_name(md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));
session_start();

// Apaga todas as variáveis da sessão
$_SESSION = array();

// Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
// Nota: Isto destruirá a sessão, e não apenas os dados!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

unset($_SESSION['dslogin']);
unset($_SESSION['dssenha']);
unset($_SESSION['token']);
$_SESSION = null;

// Por último, destrói a sessão
session_destroy();
session_start();
//var_dump($_SESSION);
session_destroy();
header("Location: proc_login.php");
?>

*/

echo '<pre>';
var_dump($_SERVER);
echo '</pre>';

echo md5('teste');

?>