<?php 
require_once 'controllers/authController.php';

$userLat = $_SESSION['latitude'];
$userLong = $_SESSION['longitude'];
$output = '';



if(isset($_POST['q'])){
  $q = $_POST['q'];
  if(strlen($q > 1)){
    $q = "%$q%";
    $query = "SELECT * FROM users WHERE descrip LIKE ? OR fname LIKE ? OR lname LIKE ? OR username LIKE ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $q, $q, $q, $q);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;



    if($userCount === 0){
    $output = '<h1 style="margin-left:455px;">no results found</h1>';
    echo $output;
    }

    while($profile = mysqli_fetch_assoc($result)){
    $id = $profile['id'];
    $fname = $profile['fname'];
    $lname = $profile['lname'];
    $username = $profile['username'];
    $descrip = $profile['descrip'];
    $image = $profile['image'];

    if($profile['longitude'] == 0 or $profile['longitude'] == 0){
      $longitude = $profile['state'];
      $latitude = $profile['city'];
    }else{
      $longitude = $profile['longitude'] + (rand(1,2) / 100);
      $latitude = $profile['latitude'] + (rand(1, 2) / 100);
    }


    $userLocation = "$userLat,$userLong";
    $profLocation = "$latitude, $longitude";


    $output = '
        <a id="result-link" class="result-link" href="messages.php?toUser='.$username.'">
          <div class="row result-profile">
            <div class="col-2 pic-area rounded" style="background-image: url(images/'.$image.');" >
            </div>
            <div class="col-3 ms-2 name-area">
              <p class="name">Name:'.$fname.' '.$lname.'</p>
              <p class="username">Username: '.$username.' </p>
            </div>
            <div class="col descrip-area">
              <p class="bio">Bio:</p>
              <p class="descrip">'.$descrip.'</p>
            </div>
            <div class="col map-area">
              <p class="bg-white ps-2 rounded ">general location</p>
              <iframe src="https://maps.google.com/maps?q='.$latitude.','.$longitude.'&h1=es;&z=14&&output=embed" style="width: 100%; border-radius: 5px; height:80%"></iframe>
            </div>
          </div>
        </a>'; 

        echo $output;

    }

  }else{
   $output = '<h1 style="margin-left:455px; >no results found</h1>';
   echo $output;
  }
  
}




  
     
?>

=



        













