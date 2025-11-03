<?php
session_start();
include 'db.php';

$erro = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND email = '$email'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        header('Location: index.php');
        exit();
    } else {
        $erro = "Nome ou email estão incorretos";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Usuário</title>
</head>
<body>
<?php if (!isset($_SESSION['nome'])): ?>
    <h2>Login</h2>
    <form method="POST" action="index.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Entrar">
    </form>
    <?php if ($erro)$erro.'</p>'; ?>
<?php else: ?>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>
    <a href="create_usuarios.php"><button>Adicionar funcionário</button></a>
    <a href="create_funcoes.php"><button>Adicionar funções</button></a>
    <form method="POST" action="logout.php" style="display:inline;">
        <button type="submit">Sair</button>
    </form>
<?php endif; ?>
</body>
</html>
