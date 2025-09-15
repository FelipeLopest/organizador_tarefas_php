<?php
require_once __DIR__ . '/../data/connection.php';
require_once __DIR__ . '/../model/Livros.php';

$livros = new Livros($conn);

if (isset($_GET['id'])) {
    $livros->deletar($_GET['id']);
}

header('Location: index.php?page=listar');
exit;
