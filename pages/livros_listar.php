<?php
require_once __DIR__ . '/../data/connection.php';
require_once __DIR__ . '/../model/Livros.php';

$livros = new Livros($conn);
$lista = $livros->listar();
?>

<h1>Meus Livros</h1>


<form action="" method="post" class="search-form">
    <input type="search" name="buscar" id="buscar" value="<?= htmlspecialchars($_POST['buscar'] ?? '') ?>" placeholder="Buscar livro...">
</form>

<table border="1">
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Descrição</th>
        <th>Início</th>
        <th>Fim</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $livro): ?>
        <tr>
            <td><?= htmlspecialchars($livro['titulo']) ?></td>
            <td><?= htmlspecialchars($livro['autor']) ?></td>
            <td><?= htmlspecialchars($livro['descricao']) ?></td>
            <td><?= htmlspecialchars($livro['inicio']) ?></td>
            <td><?= htmlspecialchars($livro['fim']) ?></td>
            <td><?= htmlspecialchars($livro['status']) ?></td>
            <td>
                <a href="index.php?page=editar&id=<?= $livro['id'] ?>">Editar</a> |
                <a href="index.php?page=deletar&id=<?= $livro['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>