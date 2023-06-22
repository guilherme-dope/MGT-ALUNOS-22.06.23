<?php
require_once("funcao.php");
require_once("header.php");
//revalidarLogin();
?>

<body>

    <?php require_once("menu.php") ?>

    <div class="content">
        <br />
        <table>
            <tr>
                <td>Login</td>
                <td>Senha</td>
                <td>ID do Aluno</td>
                <td>Nome Aluno</td>
            </tr>
            <?php

            $registros  = listarLogins();
            //dumpF($registros);


            foreach ($registros as $linha) {
                echo '<tr>';
                echo '    <td><a href=login.php?alterar=' . $linha['dslogin'] . '>'  . $linha['dslogin'] . '</a> </td>';
                echo '    <td>' . $linha['dssenha'] . '</td>';
                echo '    <td>' . $linha['idaluno'] . '</td>';
                echo '    <td>' . $linha['nmaluno'] . '</td>';
                echo '</tr>';
            }


            ?>
        </table>

        <?php
        if (isset($_GET['alterar'])) {
        ?>
            <hr>
            ***Área de manutenção
            <hr>
            <form action="login.php" method="post">
                LOGIN: <input name="dslogin" type="text" maxlength="20" readonly value="<?php echo $_GET['alterar'] ?>">
                SENHA: <input name="dssenha" type="password" maxlength="20" value="">
                <?php
                if ($_GET['alterar'] != 'admin') {
                    echo '<input type="submit" name="comando" value="Deletar Acesso e Login" />';
                }
                ?>
                <input type="submit" name="comando" value="Modificar Senha" />
            </form>
        <?php } ?>
        <hr>
        *** Área de inclusão do registro
        <hr>
        <form action="login.php" method="post">
            LOGIN: <input name="dslogin" type="text" maxlength="20" />
            SENHA: <input name="dssenha" type="password" maxlength="20" />
            <select name="idaluno">
                <?php
                $registros = listarAlunosNaoVinculados();

                foreach ($registros as $linha) {
                    echo "<option value='" . $linha['idaluno'] . "'>" . $linha['nmaluno'] . "</option>";
                }

                ?>
            </select>
            <input type="submit" name="comando" value="Cadastrar" />
        </form>

        <?php
        if (isset($_POST['comando']) && ($_POST['comando'] == "Cadastrar")) {
            echo "CÓDIGO PARA FAZER O INSERT"; //var_dump($_POST);
            
            $dslogin = htmlspecialchars($_POST['dslogin']);
            $dssenha = md5($_POST['dssenha']);
            $idaluno = $_POST['idaluno'];

            if (InserirLogin($dslogin, $dssenha, $idaluno)) {
                header("Location:login.php");
            }

        } else if (isset($_POST['comando']) && ($_POST['comando'] == "DeletarAcessoLogin")) {
            echo "Estou na área de exclusão";
            DeletarAcessoLogin($_POST['dslogin']);
            header("Location:login.php");

        } else if (isset($_POST['comando']) && ($_POST['comando'] == "ModificarSenha")) {
            echo "Estou na área de alteração de senha";
            ModificarSenha($_POST['dslogin'], md5($_POST['dssenha']));
            header("Location:login.php");
        }

        ?>

    </div>

</body>

</html>