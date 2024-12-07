<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مستخدم جديد</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>إضافة مستخدم جديد</h1>
        <div id="messageContainer"></div>
        
        <form action="../includes/add_user.php" method="POST">
            <div class="form-group">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">رقم الهاتف:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">إضافة مستخدم</button>
                <a href="../index.php" class="btn-secondary">عودة</a>
            </div>
        </form>
    </div>
    <script src="../assets/js/messages.js"></script>
</body>
</html>