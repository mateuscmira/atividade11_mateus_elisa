<?php
include 'db.php';


$id = $_GET['id']; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $updated_at = $_POST['updated_at'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE notes SET title='$title', content='$content', updated_at='$updated_at', category_id='$category_id' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Nota atualizada!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error; 
    }

    $conn->close();
    header("Location: read.php");
    exit();
}


$sql = "SELECT * FROM notes WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Nota não encontrada.";
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Nota</title>
</head>
<body>
    <form method="POST" action="update.php?id=<?php echo $row['id']; ?>">
        <label for="title">Título</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
        
        <label for="content">Conteúdo</label>
        <input type="text" name="content" value="<?php echo $row['content']; ?>" required>
        
        <label for="updated_at">Data</label>
        <input type="date" name="updated_at" value="<?php echo $row['updated_at']; ?>" required>
        
        Categoria: 
        <select name="category_id" required>
            <option value="1" <?php if ($row['category_id'] == 1) echo 'selected'; ?>>Urgente</option>
            <option value="2" <?php if ($row['category_id'] == 2) echo 'selected'; ?>>Não Urgente</option>
        </select><br><br>
        
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
