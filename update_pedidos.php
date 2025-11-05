<?php

include 'db.php';

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];


    $sql = "UPDATE pedidos SET nome ='$nome', preco = '$preco', quantidade = '$quantidade' WHERE id = $id";

    if ($conn->query($sql) == true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };

    $conn -> close();
    header("Location: create_produtos.php");
    exit();

};

$sql = "SELECT * FROM produtos WHERE id=$id";
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

    <form method="POST" action="update_produtos.php?id=<?php echo $row['id'];?>">

        <label for="id">ID do Produto:</label>
        <input type="number" name="id" required value="<?php echo htmlspecialchars($row['id']); ?>">
        <br><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required value="<?php echo htmlspecialchars($row['quantidade']); ?>">
        <br><br>
        <label for="status">Status:</label>
    

        <input type="submit" name="create" value="Atualizar"><br><br>

    </form>

    <div id="tabela-de-consulta">

    <?php

        include 'read_produtos_usuario.php';

    ?>  

    </div>

</body>

</html>