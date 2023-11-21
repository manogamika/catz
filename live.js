function sendMessage() {
    var messageInput = document.getElementById("message-input");
    var message = messageInput.value.trim();

    if (message !== "") {
  
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "sendMessage.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                messageInput.value = "";
            }
        };
        xhr.send("message=" + encodeURIComponent(message));
    }
}
function updateChat() {
    var chatMessages = document.getElementById("chat-messages");


    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {

            chatMessages.innerHTML = xhr.responseText;
        }
    };
    xhr.send();


    setTimeout(updateChat, 1000);
}
updateChat();
