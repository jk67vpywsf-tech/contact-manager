<?php
require_once __DIR__ . '/../models/Contact.php';

class ContactController {
    private function checkAuth() {
        if (empty($_SESSION['admin'])) {
            header('Location: index.php?action=loginForm');
            exit;
        }
    }

    public function index() {
        $contacts = (new Contact())->all();
        require __DIR__ . '/../views/contacts/index.php';
    }

    public function create() {
        $this->checkAuth();
        require __DIR__ . '/../views/contacts/create.php';
    }

    public function store() {
        $this->checkAuth();

        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $phone === '') {
            $error = "Please enter a valid name, email, and phone.";
            require __DIR__ . '/../views/contacts/create.php';
            return;
        }

        (new Contact())->create($name, $email, $phone);
        header('Location: index.php?action=index');
        exit;
    }

    public function edit() {
        $this->checkAuth();
        $id = $_GET['id'] ?? 0;
        $contact = (new Contact())->find($id);
        require __DIR__ . '/../views/contacts/edit.php';
    }

    public function update() {
        $this->checkAuth();

        $id    = $_POST['id'] ?? 0;
        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $phone === '') {
            $error = "Please enter a valid name, email, and phone.";
            $contact = ['id' => $id, 'name' => $name, 'email' => $email, 'phone' => $phone];
            require __DIR__ . '/../views/contacts/edit.php';
            return;
        }

        (new Contact())->update($id, $name, $email, $phone);
        header('Location: index.php?action=index');
        exit;
    }

    public function delete() {
        $this->checkAuth();
        $id = $_POST['id'] ?? 0;
        (new Contact())->delete($id);
        header('Location: index.php?action=index');
        exit;
    }
}