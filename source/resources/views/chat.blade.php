<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="chat">
    <ul id="messages">
        <!-- Tin nhắn sẽ được hiển thị ở đây -->
    </ul>
    <input type="text" id="message" placeholder="Nhập tin nhắn...">
    <button id="send">Gửi</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const messagesElement = document.getElementById('messages');
        const messageElement = document.getElementById('message');
        const sendButton = document.getElementById('send');

        // Kiểm tra Echo và Pusher
        console.log('Echo initialized:', window.Echo);

        // Lắng nghe sự kiện MessageSent
        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                console.log('Message received:', e.message.message);
                const message = document.createElement('li');
                message.textContent = e.message.message;
                messagesElement.appendChild(message);
            });

        // Lấy danh sách tin nhắn
        axios.get('/messages')
            .then(response => {
                response.data.forEach(message => {
                    const messageElement = document.createElement('li');
                    messageElement.textContent = message.message;
                    messagesElement.appendChild(messageElement);
                });
            });

        // Gửi tin nhắn
        sendButton.addEventListener('click', () => {
            const message = messageElement.value;

            axios.post('/messages', {
                message: message
            })
                .then(response => {
                    console.log('Message sent:', response.data);
                    messageElement.value = ''; // Xóa nội dung sau khi gửi
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });
        });
    });
</script>
</body>
</html>
