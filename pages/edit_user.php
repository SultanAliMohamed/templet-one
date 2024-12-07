<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل بيانات المستخدم</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>تعديل بيانات المستخدم</h1>
        <div id="messageContainer"></div>
        
        <?php
        require_once '../includes/config.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->execute([$id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
        ?>
        <form action="../includes/update_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">رقم الهاتف:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور: (اتركها فارغة للاحتفاظ بكلمة المرور الحالية)</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ التعديلات</button>
                <a href="list_users.php" class="btn-secondary">إلغاء</a>
            </div>
        </form>
        <?php
                } else {
                    echo "<div class='alert alert-danger'>المستخدم غير موجود</div>";
                }
            } catch(PDOException $e) {
                echo "<div class='alert alert-danger'>خطأ في استرجاع بيانات المستخدم</div>";
            }
        }
        ?>
    </div>
    <script src="../assets/js/messages.js"></script>
</body>
</html>