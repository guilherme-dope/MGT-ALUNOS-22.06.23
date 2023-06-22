<?php
require_once("class/class.Login.php");
require_once("class/class.Aluno.php");
require_once("class/class.Av.php");
require_once("class/class.Discp.php");
require_once("header.php");



if (isset($_GET['alterar'])) {
    $seleciona = $avaliacao->listarAv($_GET['alterar']);
    $selecionaAluno = $aluno->listarAluno($seleciona[0]['idaluno']);
    $selecionaDisciplina = $disciplina->listarDisciplina($seleciona[0]['iddisciplina']);
}

if (isset($_POST['comando']) && ($_POST['comando'] == "registrar")) {
    $idaluno = $_POST['idaluno'];
    $iddisciplina = $_POST['iddisciplina'];
    $nota = $_POST['nota'];

        if ($avaliacao->InserirAv($idaluno, $iddisciplina, $nota)) {
            header("location:avaliacao.php");
        }

} else if (isset($_POST['comando']) && ($_POST['comando'] == "alterar")) {
    $avaliacao->ModificarAv($_POST['idavaliacao'], $_POST['nota']);
    header("location:avaliacao.php");
    
} else if (isset($_POST['comando']) && ($_POST['comando'] == "excluir")) {
    $avaliacao->DeletarAv($_POST['idavaliacao']);
    header("location:avaliacao.php");
}

$rev_log->revLogin();


?>

<body>
    <?php require_once("menu.php") ?>

    <div class="content">
        <h1> Lançamento de notas! </h1>
        <br />
        <table>
            <tr>
                <td>ID da Avaliação</td>
                <td>Aluno</td>
                <td>Disciplina</td>
                <td>Nota</td>
            </tr>
            <?php

            $registros = $avaliacao->listarAvs();

            foreach ($registros as $linha) {
                echo '<tr>';
                echo '    <td><a href=avaliacao.php?alterar=' . $linha['idavaliacao'] . '>' . $linha['idavaliacao'] . '</a></td>';
                echo '    <td>' . $linha['nmaluno'] . '</td>';
                echo '    <td>' . $linha['dsdisciplina'] . '</td>';
                echo '    <td>' . $linha['nota'] . '</td>';
                echo '</tr>';
            }

            ?>
        </table>

        <?php if (isset($_GET['alterar'])) { ?>
            <hr>
            <form action="avaliacao.php" method="POST">
                Aluno: <input name="nmaluno" type="text" readonly value="<?php echo $selecionaAluno[0]['nmaluno'] ?>">
                Disciplina: <input name="nmaluno" type="text" readonly value="<?php echo $selecionaDisciplina[0]['dsdisciplina'] ?>">
                Nota: <input name="nota" type="number" max="10" value="<?php echo $seleciona[0]['nota'] ?>" />
                <input type="hidden" name="idavaliacao" value="<?php echo $seleciona[0]['idavaliacao'] ?>" />
                <input type="submit" name="comando" value="alterar" />
                <input type="submit" name="comando" value="excluir" />
            </form>
        <?php } ?>

        <hr>
        <h3>Área de Registro de Notas</h3>
        <hr>
        <form action="avaliacao.php" method="POST">
            <select name="idaluno">
                <?php 
                $registrosAluno = $aluno->listarAlunos();
                foreach ($registrosAluno as $linha) {
                    echo "<option value='" . $linha['idaluno'] . "'>" . $linha['nmaluno'] . "</option>";
                }
                ?>
            </select>
            <select name="iddisciplina">
                <?php 
                $registrosDisciplina = $disciplina->listarDisciplinas();
                foreach ($registrosDisciplina as $linha) {
                    echo "<option value='" . $linha['iddisciplina'] . "'>" . $linha['dsdisciplina'] . "</option>";
                }
                ?>
            </select>
            Nota: <input name="nota" type="number" max="10" required />
            <input type="submit" name="comando" value="registrar" />
        </form>
    </div>
</body>
