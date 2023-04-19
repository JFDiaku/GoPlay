<?php
require_once 'controllers/authController.php';

$outgoing_id = $_SESSION['id'];
$toUser = $_POST['toUser'];
$message = $_POST['message'];


$query = "SELECT * FROM users WHERE username LIKE '%$toUser%' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;
$user = mysqli_fetch_assoc($result);
$incoming_id = $user['id'];
$output ='';


if($userCount === 0){
echo "<p>user not found<p>";
}


if(!empty($message) && $toUser != $outgoing_id){
$sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES(?, ?, ?)" ;
$stmt2 = $conn->prepare($sql);
$stmt2->bind_param('iis', $incoming_id, $outgoing_id, $message);

if($stmt2 ->execute()){
    echo 'message sent';
}
}else{
    echo 'failed to send';
}
  


?>