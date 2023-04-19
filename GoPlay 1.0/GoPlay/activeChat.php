<?php 
require_once 'controllers/authController.php';

$currentUser = $_SESSION['id'];

    
$output = '';

$activeChats = array();

$sql = "SELECT * FROM messages WHERE incoming_msg_id = $currentUser OR outgoing_msg_id = $currentUser order by msg_id DESC;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

while($row = mysqli_fetch_assoc($result)){
  $outgoingID = $row['outgoing_msg_id'];
  $incomingID = $row['incoming_msg_id'];

  if(!in_array($outgoingID,$activeChats) && ($outgoingID !== $currentUser)){
    array_push($activeChats,"$outgoingID");
  }
  if(!in_array($incomingID,$activeChats) && ($incomingID !== $currentUser)){
    array_push($activeChats,"$incomingID");
  }


}

if(empty($activeChats)){
  $output = '<p class="text-white">you have no active chats</p>';
  echo $output;
}else{
  
  foreach ($activeChats as $ID){
    $sql2 = "SELECT * FROM users WHERE id = $ID";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    while($row2 = mysqli_fetch_assoc($result2)){
    $output =    '  <a id="chat-link" class="chat-link" href="messages.php?toUser='.$row2['username'].'">
                    <div class="active-chat d-flex" style="margin-top:10px;">
                      <div class="p-2" style="width:80px; height:80px;" >
                        <img style="height:100%; width:100%" src="images/'.$row2['image'].'" alt="">
                      </div>
                      <div class="text-start p-2 " style="width:flex; height:80px;">
                        <p class="chat-user">'.$row2['fname'].'&nbsp;'.$row2['lname'].' </p>
                        <p>'.$row2['username'].'</p>
                      </div>
                    </div>
                    </a>                
                  ';
      echo $output;
    }
    
    
   
    

  }

}






?>