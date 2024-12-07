function deleteUser(userId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟')) {
        fetch('../includes/delete_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${userId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage('تم حذف المستخدم بنجاح');
                // Remove the user row from the table
                const row = document.querySelector(`tr[data-user-id="${userId}"]`);
                if (row) {
                    row.remove();
                } else {
                    // Reload the page if row cannot be found
                    location.reload();
                }
            } else {
                showMessage(data.error || 'حدث خطأ أثناء حذف المستخدم', 'danger');
            }
        })
        .catch(error => {
            showMessage('حدث خطأ أثناء حذف المستخدم', 'danger');
        });
    }
}