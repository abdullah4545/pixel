<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{$basicInfo->favicon}}">

    @yield('meta')
    @include('frontend.include.head-titles')
</head>

<body>

    <!-- Navbar start -->
        @include('frontend.include.header')
    <!-- Navbar end -->

    <!-- Body container start -->

        @yield('body-content')

    <!-- Body container end -->

    <!-- Footer section start -->
        @include('frontend.include.footer')
    <!-- Footer section end -->


    <style>
        /* Styling for the WhatsApp chat icon */
        #whatsapp-chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            cursor: pointer;
            animation: bounce 2s infinite;
        }

        #whatsapp-chat-icon img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        #whatsapp-chat-icon img:hover {
            transform: scale(1.1);
            box-shadow: 0px 0px 20px rgba(37, 211, 102, 0.6);
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Styling for the chat box */
        #whatsapp-chat-box {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 320px;
            max-height: 500px;
            background-color: #f9f9f9;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            display: none;
            z-index: 1001;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-y: auto;
            transition: opacity 0.3s ease;
        }

        #whatsapp-chat-box headers {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        #whatsapp-chat-box headers img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid blue;
        }

        #whatsapp-chat-box headers .info {
            flex-grow: 1;
        }

        #whatsapp-chat-box headers .info h4 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        #whatsapp-chat-box headers .info p {
            margin: 0;
            font-size: 12px;
            color: #666;
            position: relative;
            padding-left: 20px;
        }

        #whatsapp-chat-box headers .info p:before {
            content: '';
            width: 10px;
            height: 10px;
            background-color: blue;
            border-radius: 50%;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        #whatsapp-chat-box .message {
            display: flex;
            align-items: flex-end;
            margin-bottom: 10px;
            opacity: 0;
            transform: translateX(10px);
            animation: appear 0.5s forwards;
        }

        #whatsapp-chat-box .message.me {
            justify-content: flex-end;
        }

        #whatsapp-chat-box .message p {
            background-color: #e1ffc7;
            color: #333;
            border-radius: 15px;
            padding: 10px;
            max-width: 70%;
            word-break: break-word;
            margin: 0;
            animation: slideIn 0.5s ease;
        }

        #whatsapp-chat-box .message.me p {
            background-color: #25D366;
            color: #fff;
        }

        /* Animation for message appearance */
        @keyframes appear {
            from {
                opacity: 0;
                transform: translateX(10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        #whatsapp-chat-box .loading {
            display: none;
            color: #999;
            font-size: 14px;
            text-align: center;
        }

        #whatsapp-chat-box .loading:before {
            content: "•";
            animation: typing 1s infinite;
            font-size: 20px;
        }

        @keyframes typing {
            0% { content: "•"; }
            33% { content: "••"; }
            66% { content: "•••"; }
            100% { content: "•"; }
        }

        #whatsapp-chat-box textarea {
            width: calc(100% - 80px);
            height: 60px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 15px;
            margin-right: 10px;
            font-size: 14px;
            resize: none;
        }

        #whatsapp-chat-box button {
            width: 70px;
            padding: 10px;
            border: none;
            border-radius: 15px;
            background-color: #25D366;
            color: #fff;
            cursor: pointer;
        }

        #whatsapp-chat-box button:hover {
            background-color: #1ebd74;
        }
    </style>

    <a href="{{$basicInfo->twitter}}" target="_blank" style="position: fixed;bottom: 24px;left: 6px;z-index:1111">
        <img src="{{asset('public/skype2.png')}}" style="height:60px;border-radius:50%">
    </a>

    <input type="hidden" name="wp_num" id="wp_num" value="{{App\Models\BasicInfo::getData()->whatsapp}}">
    <!-- WhatsApp Chat Icon -->
    <div id="whatsapp-chat-icon">
        <img src="{{asset('public/whatsapp.png')}}" alt="WhatsApp Chat">
    </div>

    <!-- WhatsApp Chat Box -->
    <div id="whatsapp-chat-box">
        <headers>
            <img src="https://img.icons8.com/ios/50/000000/user.png" alt="Profile Picture">
            <div class="info">
                <h4>Support Agent</h4>
                <p>Online</p>
            </div>
        </headers>
        <div id="messages">
            <div class="message">
                <p>Hi there! How can we assist you today?</p>
            </div>
        </div>
        <div class="loading" id="loading"></div>
        <div style="display: flex;">
            <textarea id="message-input" placeholder="Type your message..."></textarea>
            <button id="send-message">Send</button>
        </div>
    </div>

    <script>
        // Function to handle chat box functionality
        function createWhatsAppChat() {
            var chatButton = document.getElementById('whatsapp-chat-icon');
            var chatBox = document.getElementById('whatsapp-chat-box');
            var sendButton = document.getElementById('send-message');
            var messageInput = document.getElementById('message-input');
            var messagesContainer = document.getElementById('messages');
            var loadingIndicator = document.getElementById('loading');
            var wp =$('#wp_num').val();
            // Toggle chat box visibility
            chatButton.onclick = function () {
                if (chatBox.style.display === 'none') {
                    chatBox.style.display = 'block';
                    chatBox.style.opacity = 1;
                } else {
                    chatBox.style.opacity = 0;
                    setTimeout(function () {
                        chatBox.style.display = 'none';
                    }, 300); // Delay hiding to allow fade-out transition
                }
            };

            // Handle send button click
            sendButton.onclick = function () {
                var userMessage = messageInput.value.trim();
                if (userMessage) {
                    // Show loading indicator
                    loadingIndicator.style.display = 'block';
                    setTimeout(function () {
                        // Hide loading indicator and append user message
                        loadingIndicator.style.display = 'none';
                        var userMessageDiv = document.createElement('div');
                        userMessageDiv.className = 'message me';
                        userMessageDiv.innerHTML = '<p>' + userMessage + '</p>';
                        messagesContainer.appendChild(userMessageDiv);

                        // Simulate typing indicator
                        var typingIndicator = document.createElement('div');
                        typingIndicator.className = 'loading';
                        typingIndicator.innerHTML = 'Admin is typing...';
                        messagesContainer.appendChild(typingIndicator);

                        // Simulate a reply from the contact after typing
                        setTimeout(function () {
                            messagesContainer.removeChild(typingIndicator);
                            var replyMessageDiv = document.createElement('div');
                            replyMessageDiv.className = 'message';
                            replyMessageDiv.innerHTML = '<p>Thanks for your message! We will get back to you shortly.</p>';
                            messagesContainer.appendChild(replyMessageDiv);

                            messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll to the bottom
                        }, 1500); // Simulate typing delay

                        // Open WhatsApp with the user's message
                        var whatsappUrl = 'https://wa.me/'+wp+'?text=' + encodeURIComponent(userMessage);
                        window.open(whatsappUrl, '_blank'); // Open WhatsApp with the message

                        messageInput.value = ''; // Clear the input field
                    }, 1500); // Simulate loading delay
                } else {
                    alert('Please enter a message before sending.');
                }
            };
        }

        // Initialize chat functionality
        window.onload = function () {
            createWhatsAppChat();
        };
    </script>

    </html>

    @include('frontend.include.script')


</body>
</html>
