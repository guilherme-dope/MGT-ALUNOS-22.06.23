<?php
require_once("funcao.php");
require_once("header.php");
revalidarLogin();
?>


<body>

    <?php require_once("menu.php") ?>

    <div class="content">
        <h2>Manutenção de aluno</h2>
        <div >
            <table>
                <tr>
                    <td>ID do Aluno</td>
                    <td>Nome do Aluno</td>
                </tr>

                <?php
                $rows = listarAlunos();


                foreach ($rows as $registro) {
                    echo "<tr>";
                    echo "<td><a href=aluno.php?alterarid=" . $registro['idaluno']  . '>' . $registro['idaluno'] . "</td>";
                    echo "<td>" . $registro['nmaluno'] . "</td>";
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
        <div>
            <?php

            if (isset($_GET['alterarid'])) {
                $aluno = listarAluno($_GET['alterarid']);
            ?>
                <form action="aluno.php" method="POST">
                    <input type="hidden" name="idaluno" value="<?php echo $aluno[0]['idaluno'] ?>" />
                    <input type="text" name="nmaluno" value="<?php echo $aluno[0]['nmaluno'] ?>" maxlength="150" />
                    <input type="submit" value="Alterar" name="comando">
                    <input type="submit" value="Excluir" name="comando">
                </form>

            <?php

            }

            if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
                echo "Comandos para alterar o aluno ";
                ModificarAluno($_POST['idaluno'], $_POST['nmaluno']);
                header("location:aluno.php?comando=alteracaook");

            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                echo "Comandos para excluir o aluno";
                DeletarAluno($_POST['idaluno']);
                header("location:aluno.php?comando=excluirok");

            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Incluir') {

                echo "Comandos para incluir o aluno";

                if (trim($_POST['nmaluno']) != '') {
                    echo htmlspecialchars($_POST['nmaluno']);
                    InserirAluno(htmlspecialchars($_POST['nmaluno']));
                    header("location:aluno.php?comando=incluirok");
                }
            }

            dumpF($_GET);
            dumpF($_POST);

            ?>
        </div>
        <div>
            <hr>

            <h3>Incluir Aluno</h3>

            <form action="aluno.php" method="POST">
                <input type="text" name="nmaluno" value="" maxlength="150" />
                <input type="submit" value="Incluir" name="comando">
            </form>

            <?php


            ?>
        </div>
    </div>

</body>

</html>