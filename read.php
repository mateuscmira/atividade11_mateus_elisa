<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Notas</title>
</head>
<body>
<br>

<?php
include 'db.php';

$sql = "SELECT * FROM notes";

$result = $conn -> query($sql);

if($result -> num_rows > 0) {
    echo"<table border='1'>
    <tr>
    <th>Título</th>
    <th>Conteúdo</th>
    <th>Categoria</th>
    <th>Data</th>
    <th>Ações</th>
    </tr>";

    while($row = $result -> fetch_assoc()){
        $category = ($row['category_id'] == 1) ? 'Urgente' : 'Não Urgente';

        echo "<tr>
        <td>{$row['title']}</td>
        <td>{$row['content']}</td>
        <td>{$category}</td>
        <td>{$row['created_at']}</td>
        <td>
        <a href='update.php?user_id={$row['user_id']}'>Editar</a> |
        <a href='javascript:void(0);' onclick='confirmDelete({$row['user_id']});'>Excluir</a>
        </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";

$conn -> close();
}

?>

<script>
function confirmDelete(id) {
    if (confirm("Você tem certeza que deseja excluir este registro?")) {
        window.location.href = 'delete.php?user_id=' + id; 
    }
}
</script>
<br>
<button type="button" onclick="window.location.href='';" >Voltar a página inicial</button>  
</body>
</html>