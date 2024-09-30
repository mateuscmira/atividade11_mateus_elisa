<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id; 
        echo "Usuário cadastrado com sucesso! O ID do usuário é: " . $user_id;
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form method="post" action="create_usuario.php">
    Nome de Usuário: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Senha: <input type="password" name="password" required><br><br>
    <input type="submit" value="Cadastrar"><br><br>
</form>
<a href="create.php">Criar nota</a>