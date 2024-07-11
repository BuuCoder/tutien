<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #chat {
            width: 400px;
            max-width: 100%;
            background: #1e1e1e;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        #messages {
            list-style: none;
            padding: 10px;
            margin: 0;
            height: 300px;
            overflow-y: auto;
            border-bottom: 1px solid #333;
        }

        #messages li {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            max-width: 70%;
            word-wrap: break-word;
        }

        .my-message {
            background: #007bff;
            align-self: flex-start;
            text-align: left;
            margin-right: auto;
            color: #fff;
        }

        .other-message {
            background: #333;
            align-self: flex-end;
            text-align: right;
            margin-left: auto;
        }

        .username {
            font-weight: bold;
        }

        .time {
            color: #bbb;
            font-size: 0.8em;
            margin-bottom: 5px;
        }

        .message {
            font-size: 1em;
        }

        #message-container {
            display: flex;
            padding: 10px;
            background: #1e1e1e;
        }

        #message {
            flex: 1;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 4px;
            font-size: 1em;
            margin-right: 10px;
            background: #333;
            color: #fff;
        }

        #send {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        #send:hover {
            background: #0056b3;
        }

    </style>
</head>
<body>
<div id="chat">
    <ul id="messages">
        <!-- Messages will be displayed here -->
    </ul>
    <div id="message-container">
        <input type="text" id="message" placeholder="Enter message...">
        <button id="send">Send</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const messagesElement = document.getElementById('messages');
        const messageElement = document.getElementById('message');
        const sendButton = document.getElementById('send');
        const user = JSON.parse(localStorage.getItem('user')); // Assuming user info is stored in localStorage

        // Listen for broadcasted messages
        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                console.log(e)
                const message = e.message ? e.message : e;
                const messageItem = document.createElement('li');
                messageItem.className = message.user_id === {{ session()->get("user")['user_id'] }} ? 'my-message' : 'other-message';
                messageItem.innerHTML = `<span class="username">${message.user_name}</span> <span class="time">(${moment(message.created_at).format('DD-MM-YYYY H:mm:ss')})</span>: <span class="message">${message.message}</span>`;
                messagesElement.appendChild(messageItem);
                messagesElement.scrollTop = messagesElement.scrollHeight; // Scroll to bottom
            });

        // Fetch messages
        axios.get('/messages')
            .then(response => {
                response.data.forEach(message => {
                    const messageItem = document.createElement('li');
                    messageItem.className = message.user_id === {{ session()->get("user")['user_id'] }} ? 'my-message' : 'other-message';
                    messageItem.innerHTML = `<span class="username">${message.user_name}</span> <span class="time">(${moment(message.created_at).format('DD-MM-YYYY H:mm:ss')})</span>: <span class="message">${message.message}</span>`;
                    messagesElement.appendChild(messageItem);
                });
                messagesElement.scrollTop = messagesElement.scrollHeight; // Scroll to bottom
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
                    const message = response.message ? response.message : response;
                    const messageItem = document.createElement('li');
                    messageItem.className = 'my-message';
                    messageItem.innerHTML = `<span class="username">${message.user_name}</span> <span class="time">(${moment(message.created_at).format('DD-MM-YYYY H:mm:ss')})</span>: <span class="message">${message.message}</span>`;
                    messagesElement.appendChild(messageItem);
                    messagesElement.scrollTop = messagesElement.scrollHeight; // Scroll to bottom
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });
        });

        // Allow sending message by pressing Enter key
        messageElement.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendButton.click();
            }
        });
    });
</script>
</body>
</html>
