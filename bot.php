<!-- php Start  for bot-->
<!-- step 1 => create database for response and user messages -->
<!-- step 2 => create database connection -->

<?php
// server = Localhost
// username = root
// password = "" (blank)
// database Name = your database name 

$conn = mysqli_connect("localhost","root","","chatbot");

if($conn){
$user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);

$query = "SELECT * FROM chatbot.chatbot WHERE messages LIKE '%$user_messages%'";
$runQuery = mysqli_query($conn, $query);

if(mysqli_num_rows($runQuery) > 0 ){
    //fetch result
    $result = mysqli_fetch_assoc($runQuery);
    // echo result
    echo $result['response'];
}else{
    echo "Sorry can't be able to unserstand you";
}
}else{
    echo "Connection failed" . mysqli_connect_errno();
}
?>