<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notificaciones en Tiempo Real</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h3>Enviar Notificación</h3>
            <form id="notificationForm">
                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje</label>
                    <input autocomplete="off" type="text" class="form-control" id="message" name="message" required>
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario (opcional)</label>
                    <input autocomplete="off" type="text" class="form-control" id="user" name="user">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Notificaciones</h3>
            <div id="notifications" class="border p-3" style="height: 300px; overflow-y: auto;">
            </div>
        </div>
    </div>
</div>

@vite('resources/js/app.js')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.Echo.channel('notifications')
            .listen('NotificationSent', (e) => {
                showNotification(e.message, e.user);
            });

        document.getElementById('notificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            sendNotification();
        });
    });

    function showNotification(message, user) {
        const notifications = document.getElementById('notifications');
        const notification = document.createElement('div');
        notification.className = 'alert alert-info mb-2';
        notification.innerHTML = `<strong>${user}:</strong> ${message}`;
        notifications.appendChild(notification);
        notifications.scrollTop = notifications.scrollHeight;
    }

    function sendNotification() {
        const message = document.getElementById('message').value;
        const user = document.getElementById('user').value;

        fetch('/api/notifications', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message, user })
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('message').value = '';
                document.getElementById('user').value = '';
            });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
