<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة المستخدمين</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>قائمة المستخدمين</h1>
        <div id="messageContainer"></div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../includes/config.php';
                    try {
                        $stmt = $pdo->query("SELECT * FROM users");
                        while($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($user['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['phone']) . "</td>";
                            echo "<td class='action-buttons'>";
                            echo "<a href='edit_user.php?id=" . $user['id'] . "' class='btn-primary'>تعديل</a>";
                            echo "<button onclick='deleteUser(" . $user['id'] . ")' class='btn-danger'>حذف</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } catch(PDOException $e) {
                        echo "<tr><td colspan='4'>خطأ في استرجاع البيانات</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form-actions">
            <a href="../index.php" class="btn-secondary">عودة</a>
        </div>
    </div>
    <script src="../assets/js/messages.js"></script>
    <script src="../assets/js/users.js"></script>
</body>
</html>