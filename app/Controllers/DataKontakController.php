<?php
require_once 'DataKontak.php';

class DataKontakController {
    private $model;

    public function __construct() {
        $this->model = new DataKontak();
    }

    public function submitForm($name, $email, $subject, $message) {
        if ($this->model->insertMessage($name, $email, $subject, $message)) {
            return "Message sent successfully.";
        } else {
            return "Failed to send message.";
        }
    }
}

// Memproses data formulir jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $controller = new DataKontakController();
    $result = $controller->submitForm($name, $email, $subject, $message);
    echo $result;
}
?>
