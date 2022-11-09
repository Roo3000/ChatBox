<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online chating bot</title>
    <link rel="stylesheet" href="css/bot.css">
</head>
<body>
    <div id="container">
        <div id="dot1"></div>
        <div id="dot2"></div>
        <div id="screen">
            <div id="header">PHPWEB ONLINE BOT</div>
            <div id="messageDisplaySection">
                <!--  bot messages  -->
                <!-- <div class="chat botMessages">Hello there How can I help you?</div> -->

                <!--  usersMessages  -->
                <!-- <div id="messageContainer">
                   <div class="chat userMessages">I need your help to build a website.</div>
                </div> -->
            </div>
                <!-- messages input field -->
            <div id="userInput">
                <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Type your Message Here..." required>
                <input type="submit" value="Send" id="send" name="send">
             </div>
            
        </div>
    </div>

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Jquery Start -->
    <script>
        $(document).ready(function(){
            $("#messages").on("keyup", function(){
                if($("#messages").val()){
                   $("#send").css("display","block");
                }else{
                   $("#send").css("display","none");
                }
            });  
            $("#messages").on("mouseup", function(){
                $("#send").css("display","none");
            });
        });

        // Send Button clicked
        $("#send").on("click", function(e){
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div id="messageContainer"><div class="chat userMessages">'+$userMessage+'</div></div>'; 
            $("#messageDisplaySection").append($appendUserMessage);

            //ajax start
            $.ajax({
                url: "bot.php",
                type: "POST",
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // Show response
                    $appendBotResponse = '<div class="chat botMessages">'+data+'</div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display", "none");
        })
    </script>
</body>
</html>