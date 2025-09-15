<?php
require_once __DIR__ . '/../data/connection.php';
require_once __DIR__ . '/../model/Livros.php';

$livros = new Livros($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $livros->cadastrar(
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

<h2>Cadastrar Livro</h2>
<form method="post">
    <label>Título:</label><input type="text" name="titulo" required><br>
    <label>Autor:</label><input type="text" name="autor" required><br>
    <label>Descrição:</label><textarea name="descricao"></textarea><br>
    <label>Início:</label><input type="date" name="inicio"><br>
    <label>Fim:</label><input type="date" name="fim"><br>
    <label>Status:</label>
    <select name="status">
        <option value="quero ler">Quero ler</option>
        <option value="lendo">Lendo</option>
        <option value="lido">Lido</option>
    </select><br>
    <button type="submit">Cadastrar</button>
</form>
<a href="index.php?page=listar">Voltar</a>