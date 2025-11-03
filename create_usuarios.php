<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['create']))) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

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
    <title>Create funcionario</title>
</head>

<body>

    <form method="POST" action="create_usuarios.php">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <input type="submit" name="create" value="Adicionar"><br><br>

    </form>

    <div id="tabela-de-consulta">

        <?php

        include 'read_usuarios.php';

        ?>

    </div><br>

        <a href="index.php"><button>Voltar para o início</button></a>

</body>

</html>