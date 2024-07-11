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
        <!-- Messages will be displayed here -->
    </ul>
    <input type="text" id="message" placeholder="Enter message...">
    <button id="send">Send</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const messagesElement = document.getElementById('messages');
        const messageElement = document.getElementById('message');
        const sendButton = document.getElementById('send');

        // Listen for broadcasted messages
        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                const message = document.createElement('li');
                message.textContent = e.message.message;
                messagesElement.appendChild(message);
            });

        // Fetch messages
        axios.get('/messages')
            .then(response => {
                response.data.forEach(message => {
                    const messageElement = document.createElement('li');
                    messageElement.textContent = message.message;
                    messagesElement.appendChild(messageElement);
                });
            });

        // Send message
        sendButton.addEventListener('click', () => {
            const message = messageElement.value;

            axios.post('/messages', {
                message: message
            })
                .then(response => {
                    messageElement.value = ''; // Clear input after sending
                    // Display the sent message immediately
                    const sentMessage = document.createElement('li');
                    sentMessage.textContent = message;
                    messagesElement.appendChild(sentMessage);
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });
        });
    });
</script>
</body>
</html>
