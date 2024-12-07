<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $password]);
        
        header('Location: ../pages/list_users.php?message=' . urlencode('تم إضافة المستخدم بنجاح'));
    } catch(PDOException $e) {
        header('Location: ../pages/add_user_form.php?error=' . urlencode('حدث خطأ أثناء إضافة المستخدم'));
    }
    exit();
}