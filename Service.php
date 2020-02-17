<?php

class Service{

    private $db;
    private $produto;

    public function __construct(Conn $db, IProduto $produto) {
        $this->db = $db->connect();
        $this->produto = $produto;
    }

    public function list() {
        $query = "select * from `produto`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save() {
        $query = "insert into `produto` (`name`,`desc`) values (:name, :desc)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":name", $this->produto->getName());
        $stmt->bindValue(":desc", $this->produto->getDesc());
        $stmt->execute();

        return $this->db->lastInsertId();
    }
    public function update() {
        $query = "update `produto` set `name`=?, `desc`=? where `id`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->produto->getName());
        $stmt->bindValue(2, $this->produto->getDesc());
        $stmt->bindValue(3, $this->produto->getId());
        $return = $stmt->execute();

        return $return;
    }
    public function delete(int $id) {
        $query = "delete from `produto` where `id`=?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $id);
        $return = $stmt->execute();
        return $return;

    }
    public function find(int $id) {
        $query = "select * from `produto` where `id`=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}