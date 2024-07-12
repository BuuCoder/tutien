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
    <div class="error" id="error"></div>
</div>

<script>

</script>
</body>
</html>
