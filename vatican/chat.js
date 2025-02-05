// Function to send a message
function sendMessage() {
    let message = document.getElementById("chat-message").value;
    if (message.trim() !== "") {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "chat.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // After sending, clear the input field
                document.getElementById("chat-message").value = "";
                loadMessages(); // Reload the chat messages
            }
        };
        xhr.send("action=send&message=" + encodeURIComponent(message));
    }
}

// Function to load chat messages
function loadMessages() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "chat.php?action=load", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update chat-box with new messages
            document.getElementById("chat-box").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Load messages every 2 seconds
setInterval(loadMessages, 2000);

// Initially load messages
window.onload = loadMessages;
