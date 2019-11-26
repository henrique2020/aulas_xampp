<?php
require getcwd()."\src\Avaliacao.php";

$disciplina[1] = "Programação";
$disciplina[2] = "Banco de dados";
$disciplina[3] = "Análise de Sistemas";

$tipo[1] = "Trabalho";
$tipo[2] = "Prova";

if (isset($_GET['disciplina']) && $_GET['disciplina'] == "Todas") {
    $avaliacoes = Avaliacao::listaTodos();
}else {
    $avaliacoes = Avaliacao::listaPorDisciplina($_GET['disciplina']);
}

echo "<table>";
echo "<tr>";
echo "<th>Data</th>";
echo "<th>Disciplina</th>";
echo "<th>Conteúdo</th>";
echo "<th>Tipo</th>";
echo "<th>Peso</th>";
echo "<th>Opções</th>";
echo "</tr>";
foreach($avaliacoes as $av){
    echo "<tr>";
    echo "<td>".$av->data."</td>";
    echo "<td>".$disciplina[$av->disciplina]."</td>";
    echo "<td>".$av->conteudo."</td>";
    echo "<td>".$tipo[$av->tipo]."</td>";
    echo "<td>".$av->peso."</td>";
    echo "<td> <a href='processa.php?acao=Excluir&id=".$av->id."'>Excluir</a></td>";
    echo "<td> <a href=''>Alterar</a></td>";
    echo "</tr>";
}
echo "</table>";
