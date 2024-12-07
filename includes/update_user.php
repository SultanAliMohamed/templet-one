<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    try {
        if (empty($password)) {
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?");
            $stmt->execute([$name, $email, $phone, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, phone = ?, password = ? WHERE id = ?");
            $stmt->execute([$name, $email, $phone, $password, $id]);
        }
        
        header('Location: ../pages/list_users.php?message=' . urlencode('تم تحديث بيانات المستخدم بنجاح'));
    } catch(PDOException $e) {
        header('Location: ../pages/edit_user.php?id=' . $id . '&error=' . urlencode('حدث خطأ أثناء تحديث بيانات المستخدم'));
    }
    exit();
}