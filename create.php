<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $created_at = $_POST['created_at'];

    $sql = "INSERT INTO notes (user_id, title, content, created_at) VALUES ('$user_id', '$title', '$content', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        echo "Nova nota criada com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form method="post" action="create.php">
    ID do Usuário: <input type="text" name="user_id" required><br><br>
    Título: <input type="text" name="title" required><br><br>
    Conteúdo: <input type="text" name="content" required><br><br>
    Data: <input type="date" name="created_at" required><br><br>
    <input type="submit" value="Adicionar"><br><br>
</form>

<a href="read.php">Ver notas.</a>