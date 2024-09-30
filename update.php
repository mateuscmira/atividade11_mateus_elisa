<?php
include 'db.php';

$user_id = $_GET['user_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $update_at = $_POST['update_at'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE notes SET title='$title', content='$content', update_at='$update_at' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Nota atualizada!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error; 
    }

    $conn-> close();
    header ("Location: read.php");
    exit();
}

$sql = "SELECT * FROM notes WHERE user_id=$user_id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action=" update.php?user_id=<?php echo $row['user_id'];?>">
    <label for="title">Título</label>
    <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
    <label for="content">Conteúdo</label>
    <input type="text" name="content" value="<?php echo $row['content']; ?>" required>
    <label for="update_at">Data</label>
    <input type="date" name="update_at" value="<?php echo $row['update_at']; ?>" required>
    Categoria: 
    <select name="category_id" required>
        <option value="1">Urgente</option>
        <option value="2">Não Urgente</option>
    </select><br><br>
    <input type="submit" value="Atualizar">
</form>

</body>
</html>