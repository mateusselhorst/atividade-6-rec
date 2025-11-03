<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['create']))) {

    $descricao = $_POST['descricao'];
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tarefas (descricao, setor, prioridade, status, fk_usuario) VALUES ('$descricao', '$setor', '$prioridade', '$status', 1)";

    if ($conn->query($sql) === true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    };
    $conn->close();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>

<body>

    <form method="POST" action="create_funcoes.php">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required>
        <br><br>
        <label for="setor">Setor:</label>
        <input type="text" name="setor" required>
        <br><br>
        <label for="prioridade">Prioridade:</label>
        <select name="prioridade" id="prioridade">
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>
        <br><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="A fazer">A fazer</option>
            <option value="Fazendo">Fazendo</option>
            <option value="Pronto">Pronto</option>
        </select>
        <br><br>

        <input type="submit" name="create" value="Adicionar"><br><br>


    </form>

    <div id="tabela-de-consulta">

        <?php

        include 'read_funcoes.php';

        ?>

    </div><br>

        <a href="index.php"><button>Voltar para o início</button></a>

</body>

</html>