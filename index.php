<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Administração do curso</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
</head>
</style>
</head>

<body>
    <div class="grid-container">
        <div class="header">
            <h2>Administração do Curso</h2>
            <p>Powered by Web Sistem GE</p>
        </div>

        <div class="left" style="background-color:white;">&nbsp;</div>
        <div class="middle" style="background-color:#bbb;">
            <form action="proc.login.php" method="POST">
                <label>Usuário: <input style="witdh:100%" type="text" name="dslogin" /></label> <br />
                <label>Senha: <input type="password" name="dssenha" /></label> <br />
                <input style="background-color: blue; color: white;" type="submit" value="Acessar" />
            </form>

            <?php
            /*
        if (isset($_GET['erro']))
        {
            if (array_key_exists($_GET['erro'], $tabela_de_erro))
            {
                echo '<br /><span style="color:red">' . $tabela_de_erro[$_GET['erro']] . '</span><br />';
            }
        }
        */
    ?>


        </div>
        <div class="right" style="background-color:white;">&nbsp;</div>

        <div class="footer" style="background-color:white;">
            <p>Todos direitos reservados</p>
        </div>
    </div>

</body>

</html>