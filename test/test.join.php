<?php

$join = "select *
from login l,
	 aluno a
where l.idaluno = a.idaluno";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$user = 'root';
$password = '';
$database = 'aedb_quinto';

# O hostname deve ser localhost no nosso exemplo
# lembre de iniciar o Apache e o Mysql 
$hostname = "localhost"; 

$con = mysqli_connect( $hostname, $user, $password ) or die('Erro na conexão');
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
# Seleciona o banco de dados 
mysqli_select_db($con, $database) or die('Erro na seleção do banco');

$resultado = mysqli_query($con , $join);

$rows = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

/*echo "<pre>";
var_dump($rows);
echo "</pre>";
die("Parado!");*/
?>

<style>
  *
  {
    color: white;
  }
  table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: gray;
}
</style>

<table>
    <tr>
      <th>DSLOGIN</th>
      <th>DSSENHA</th>
      <th>IDALUNO</th>
      <th>NMALUNO</th>
    </tr>


<?php

foreach ($rows as $row){


    echo '<tr>';
    echo "<td>" . $row['dslogin'] . "</td>";
    echo "<td>" . $row['dssenha'] . "</td>";
    echo "<td>" . $row['idaluno'] . "</td>";
    echo "<td>" . $row['nmaluno'] . "</td>";    
    echo '</tr>';
}


mysqli_close($con);


?>
</table>
</body>
</html>