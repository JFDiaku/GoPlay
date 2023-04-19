<?php 
require_once 'controllers/authController.php';

$outgoing_id = $_SESSION['id'];
$toUser = $_POST['toUser'];
$output = "";

$query0 = "SELECT * FROM messages WHERE outgoing_msg_id LIKE '$outgoing_id' OR incoming_msg_id LIKE '$outgoing_id' ";
$stmt0 = $conn->prepare($query0);
$stmt0->execute();
$result0 = $stmt0->get_result();
$messageCount = $result0->num_rows;

if($messageCount < 0){
    $output = '<div class="text-white">You have not sent any messages. Once you send a message they will appear here.</div>';
}else{
    
}




$query = "SELECT * FROM users WHERE username LIKE '$toUser' ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;

if($userCount > 0){
    $user = mysqli_fetch_assoc($result);
    $incoming_id = $user['id'];
}



if(!empty($incoming_id)){
    $sql1 = "SELECT * FROM messages WHERE outgoing_msg_id = $incoming_id OR incoming_msg_id = $incoming_id ";
    $stmt2 = $conn->prepare($sql1);
    $stmt2->execute();
    $result1 = $stmt2->get_result();

    if($result1->num_rows == 0){
        $output = '<div class="text-white">You have no messages with '.$user['username'].'. Once you send a message they will appear here.</div>';
    }


    $sql = "SELECT * FROM messages LEFT JOIN users ON users.id = messages.outgoing_msg_id
    WHERE outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id'
    OR outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id' ORDER BY msg_id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();


    $result = $stmt->get_result();

    $userCount = $result->num_rows;


    if($userCount > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['outgoing_msg_id'] === $outgoing_id){
                $output .= '<div class="outgoing"><p>'.$row['msg'].'</p></div>';
            }else{
                $output .= '<div class=" incoming"><p>'.$row['msg'].'</p></div>';
            }
        }
    }else{
        $output = '<div class="text-white">You have no messages with <span class="text-warning">'.$user['username'].'.</span> Once you send a message they will appear here.</div>';
    }
}else{
    $output = '<div class="my-auto text-warning">User does not exist</div>';
}


    




echo $output;


?>