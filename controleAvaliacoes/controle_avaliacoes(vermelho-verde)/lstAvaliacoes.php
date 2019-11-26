<?php
require getcwd()."\src\Avaliacao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exibir Avaliações</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="main.css" rel="stylesheet">
</head>
<body>
    <table>
        <tr>
            <th>Data</th>
            <th>Disciplina</th>
            <th>Conteúdo</th>
            <th>Tipo</th>
            <th>Peso</th>
        </tr>
        <?php
        $data = date('Y-m-d');
        $avaliacoes = Avaliacao::listaTodos();
        if (isset($_POST['disciplina'])) {
            foreach($avaliacoes as $av){
                if ($_POST['disciplina'] == $av->disciplina) {
                    //Atualiza o nome das disciplinas
                    if ($av->disciplina == "1") {
                        $av->disciplina = "Programação";
                    }
                    else if ($av->disciplina == "2") {
                        $av->disciplina = "Banco de dados";
                    }
                    else {
                        $av->disciplina = "Análise de Sistemas";
                    }
                    //Atualiza o nome do tipo de avaliação
                    if ($av->tipo == "1") {
                        $av->tipo = "Trabalho";
                    }
                    else {
                        $av->tipo = "Prova";
                    }
                    if(strtotime($data) > strtotime($av->data)){
                    ?> 
                        <tr bgcolor="red">
                            <td><?php echo $av->data; ?></td>
                            <td><?php echo $av->disciplina; ?></td>
                            <td><?php echo $av->conteudo; ?></td>
                            <td><?php echo $av->tipo; ?></td>
                            <td><?php echo $av->peso; ?></td>
                        </tr>
                    <?php
                    }
                    else{
                    ?>
                        <tr bgcolor="green">
                            <td><?php echo $av->data; ?></td>
                            <td><?php echo $av->disciplina; ?></td>
                            <td><?php echo $av->conteudo; ?></td>
                            <td><?php echo $av->tipo; ?></td>
                            <td><?php echo $av->peso; ?></td>
                        </tr>
                    <?php
                    }
                }
            }
        }
        else {
            foreach($avaliacoes as $av){
                //Atualiza o nome das disciplinas
                if ($av->disciplina == "1") {
                    $av->disciplina = "Programação";
                }
                else if ($av->disciplina == "2") {
                    $av->disciplina = "Banco de dados";
                }
                else {
                    $av->disciplina = "Análise de Sistemas";
                }
                //Atualiza o nome do tipo de avaliação
                if ($av->tipo == "1") {
                    $av->tipo = "Trabalho";
                }
                else {
                    $av->tipo = "Prova";
                }
                
                if(strtotime($data) > strtotime($av->data)){
                ?>
                    <tr bgcolor="red">
                        <td><?php echo $av->data; ?></td>
                        <td><?php echo $av->disciplina; ?></td>
                        <td><?php echo $av->conteudo; ?></td>
                        <td><?php echo $av->tipo; ?></td>
                        <td><?php echo $av->peso; ?></td>
                    </tr>
                <?php
                }
                else{
                ?>
                    <tr bgcolor="green">
                        <td><?php echo $av->data; ?></td>
                        <td><?php echo $av->disciplina; ?></td>
                        <td><?php echo $av->conteudo; ?></td>
                        <td><?php echo $av->tipo; ?></td>
                        <td><?php echo $av->peso; ?></td>
                    </tr>
                <?php
                }
            }
        }
        ?>
    </table>
</body>
