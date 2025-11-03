<?php

include 'db.php';

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $descricao = $_POST['descricao'];
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status'];


    $sql = "UPDATE tarefas SET descricao ='$descricao', setor = '$setor', prioridade = '$prioridade', status = '$status' WHERE id = $id";

    if ($conn->query($sql) == true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };

    $conn -> close();
    header("Location: create_funcoes.php");
    exit();

};

$sql = "SELECT * FROM tarefas WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>

<body>

    <form method="POST" action="update.php?id=<?php echo $row['id'];?>">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required value="<?php echo htmlspecialchars($row['descricao']); ?>">
        <br><br>
        <label for="setor">Setor:</label>
        <input type="text" name="setor" required value="<?php echo htmlspecialchars($row['setor']); ?>">
        <br><br>
        <label for="prioridade">Prioridade:</label>
        <select name="prioridade" id="prioridade">
            <option value="baixa" <?php if($row['prioridade'] == 'baixa') echo 'selected'; ?>>Baixa</option>
            <option value="media" <?php if($row['prioridade'] == 'media') echo 'selected'; ?>>Média</option>
            <option value="alta" <?php if($row['prioridade'] == 'alta') echo 'selected'; ?>>Alta</option>
        </select>
        <br><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="A fazer" <?php if($row['status'] == 'A fazer') echo 'selected'; ?>>A fazer</option>
            <option value="Fazendo" <?php if($row['status'] == 'Fazendo') echo 'selected'; ?>>Fazendo</option>
            <option value="Pronto" <?php if($row['status'] == 'Pronto') echo 'selected'; ?>>Pronto</option>
        </select>
        <br><br>

        <input type="submit" name="create" value="Atualizar"><br><br>

    </form>

    <div id="tabela-de-consulta">

    <?php

        include 'read_funcoes.php';

    ?>  

    </div>

</body>

</html>