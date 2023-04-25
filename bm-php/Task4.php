<?php

class ActionController {
    private $id;
    private $value;

    public function __construct() {
        $this->id = $_POST['id'] ?? '';
        $this->value = $_POST['value'] ?? '';
    }

    public function validateInputs() {
        if (!is_numeric($this->id)) {
            throw new Exception('Invalid ID');
        } elseif (!is_string($this->value)) {
            throw new Exception('Invalid Value');
        }
    }

    public function takeInputs() {
        try {
            $this->validateInputs();
            $output = ['success' => 'Valid Data'];
            header('Content-Type: application/json');
            echo json_encode($output);
        } catch (Exception $e) {
            $output = ['error' => $e->getMessage()];
            header('Content-Type: application/json');
            echo json_encode($output);
        }
    }
}

$actionController = new ActionController();
$actionController->takeInputs();