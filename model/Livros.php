<?php
class Livros
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function listar()
    {
        $stmt = $this->conn->query("SELECT * FROM Livros ORDER BY inicio DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($titulo, $autor, $descricao, $inicio, $fim, $status)
    {
        $sql = "INSERT INTO Livros (titulo, autor, descricao, inicio, fim, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$titulo, $autor, $descricao, $inicio, $fim, $status]);
    }

    public function editar($id, $titulo, $autor, $descricao, $inicio, $fim, $status)
    {
        $sql = "UPDATE Livros SET titulo=?, autor=?, descricao=?, inicio=?, fim=?, status=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$titulo, $autor, $descricao, $inicio, $fim, $status, $id]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM Livros WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM Livros WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
