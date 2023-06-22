<?php
require_once("class/class.Login.php");
require_once("class/class.Discp.php");
require_once("header.php");


$disciplinaObj = new Disciplina();

if (isset($_GET['alterarid'])) {
    $disciplina = $disciplinaObj->listarDisciplina($_GET['alterarid']);
}

if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
    echo "Comandos para alterar a Disciplina ";
    $disciplinaObj->ModificarDiscp($_POST['iddisciplina'], $_POST['dsdisciplina']);
    header("location:disciplina.php?comando=alteracaook");

} else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
    echo "Comandos para excluir a Disciplina";
    $disciplinaObj->DeletarDiscp($_POST['iddisciplina']);
    header("location:disciplina.php?comando=excluirok");

} else if (isset($_POST['comando']) && $_POST['comando'] == 'Incluir') {
    echo "Comandos para incluir a Disciplina";
    
    if (trim($_POST['dsdisciplina']) != '') {
        echo htmlspecialchars($_POST['dsdisciplina']);
        $disciplinaObj->InserirDiscp(htmlspecialchars($_POST['dsdisciplina']));
        header("location:disciplina.php?comando=incluirok");
    }
}

$rev_log->revLogin();

?>

<style></style>
<body>
    <?php require_once("menu.php"); ?>
    <div class="content">
        <div class="center">
            <h1>Administração de Disciplinas</h1>
            <div>
                <table>
                    <tr>
                        <td>Id da Disciplina</td>
                        <td>Nome da Disciplina</td>
                    </tr>
                    <?php
                    $rows = $disciplinaObj->listarDisciplinas();

                    foreach ($rows as $registro) {
                        echo "<tr>";
                        echo "<td><a href=disciplina.php?alterarid=" . $registro['iddisciplina'] . ">" . $registro['iddisciplina'] . "</td>";
                        echo "<td>" . $registro['dsdisciplina'] . "</td>";
                        echo "<tr>";
                    }
                    ?>
                </table>
            </div>
            <div>
                <?php if (isset($_GET['alterarid'])) { ?>
                    <form action="disciplina.php" method="POST">
                        <input type="hidden" name="iddisciplina" value="<?php echo $disciplina[0]['iddisciplina'] ?>" />
                        <input type="text" name="dsdisciplina" value="<?php echo $disciplina[0]['dsdisciplina'] ?>" maxlength="30" />
                        <input type="submit" value="Alterar" name="comando">
                        <input type="submit" value="Excluir" name="comando">
                    </form>
                <?php } ?>
            </div>
            <div>
                <hr>
                <h3>Incluir Disciplina</h3>
                <hr>
                <form action="disciplina.php" method="POST">
                    <input type="text" name="dsdisciplina" value="" maxlength="30" />
                    <input type="submit" value="Incluir" name="comando">
                </form>
            </div>
        </div>
    </div>
</body>
