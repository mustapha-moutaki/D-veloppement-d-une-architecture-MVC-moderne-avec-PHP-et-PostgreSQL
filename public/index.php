<?php
require_once '../vendor/autoload.php';

// use App\classes\Home;
use App\Core\Database;

$database = Database::getInstance();

$pdo = $database->getConnection();

if ($pdo) {
    echo "--------connected successfully---------";
} else {
    echo "not connected";
}

?>