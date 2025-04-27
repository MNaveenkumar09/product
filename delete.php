<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM buyers WHERE id='$id'");
    header('Location: search.php');
}
?>
