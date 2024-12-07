function showMessage(message, type = 'success') {
    const messageContainer = document.getElementById('messageContainer');
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.textContent = message;
    
    messageContainer.appendChild(alertDiv);
    
    // Auto-hide after 3 seconds
    setTimeout(() => {
        alertDiv.style.opacity = '0';
        alertDiv.style.transform = 'translateX(100%)';
        setTimeout(() => {
            messageContainer.removeChild(alertDiv);
        }, 500);
    }, 3000);
}

// Check for URL parameters indicating messages
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('message')) {
    showMessage(decodeURIComponent(urlParams.get('message')));
}
if (urlParams.has('error')) {
    showMessage(decodeURIComponent(urlParams.get('error')), 'danger');
}