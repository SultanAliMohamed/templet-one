<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "خطأ في استرجاع البيانات: " . $e->getMessage();
    $users = [];
}
?>

<div id="userListSection">
    <h2>قائمة المستخدمين</h2>
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
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    <td class="action-buttons">
                        <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn-primary">تعديل</a>
                        <form action="includes/delete_user.php" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <button type="submit" class="btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟');">حذف</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>