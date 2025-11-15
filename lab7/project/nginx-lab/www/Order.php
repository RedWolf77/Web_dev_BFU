<?php
class Order {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function add($name, $dish, $quantity, $sauce, $delivery_type) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO orders (name, dish, quantity, sauce, delivery_type) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$name, $dish, $quantity, $sauce, $delivery_type]);
        return $this->pdo->lastInsertId();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function update($id, $name, $dish, $quantity, $sauce, $delivery_type) {
        $stmt = $this->pdo->prepare(
            "UPDATE orders SET name=?, dish=?, quantity=?, sauce=?, delivery_type=? WHERE id=?"
        );
        $stmt->execute([$name, $dish, $quantity, $sauce, $delivery_type, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM orders WHERE id=?");
        $stmt->execute([$id]);
    }
}