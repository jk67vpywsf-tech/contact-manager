<?php
require_once __DIR__ . '/Model.php';

class Contact extends Model {
    public function all() {
        return $this->db->query("SELECT * FROM contacts ORDER BY id DESC")
                        ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $phone) {
        $sql = "INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)";
        return $this->db->prepare($sql)->execute([$name, $email, $phone]);
    }

    public function update($id, $name, $email, $phone) {
        $sql = "UPDATE contacts SET name = ?, email = ?, phone = ? WHERE id = ?";
        return $this->db->prepare($sql)->execute([$name, $email, $phone, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM contacts WHERE id = ?";
        return $this->db->prepare($sql)->execute([$id]);
    }
}