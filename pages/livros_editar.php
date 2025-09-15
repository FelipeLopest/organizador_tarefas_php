<?php
require_once __DIR__ . '/../data/connection.php';
require_once __DIR__ . '/../model/Livros.php';

$livros = new Livros($conn);

if (!isset($_GET['id'])) {
    header('Location: index.php?page=listar');
    exit;
}

$id = $_GET['id'];
$livro = $livros->buscarPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $livros->editar(
        $id,
        $_POST['titulo'],
        $_POST['autor'],
        $_POST['descricao'],
        $_POST['inicio'],
        $_POST['fim'],
        $_POST['status']
    );
    header('Location: index.php?page=listar');
    exit;
}
?>

<h2>Editar Livro</h2>
<form method="post">
    <label>Título:</label><input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required><br>
    <label>Autor:</label><input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required><br>
    <label>Descrição:</label><textarea name="descricao"><?= htmlspecialchars($livro['descricao']) ?></textarea><br>
    <label>Início:</label><input type="date" name="inicio" value="<?= htmlspecialchars($livro['inicio']) ?>"><br>
    <label>Fim:</label><input type="date" name="fim" value="<?= htmlspecialchars($livro['fim']) ?>"><br>
    <label>Status:</label>
    <select name="status">
        <option value="quero ler" <?= $livro['status'] == 'quero ler' ? 'selected' : '' ?>>Quero ler</option>
        <option value="lendo" <?= $livro['status'] == 'lendo' ? 'selected' : '' ?>>Lendo</option>
        <option value="lido" <?= $livro['status'] == 'lido' ? 'selected' : '' ?>>Lido</option>
    </select><br>
    <button type="submit">Salvar</button>
</form>
<a href="index.php?page=listar">Voltar</a>