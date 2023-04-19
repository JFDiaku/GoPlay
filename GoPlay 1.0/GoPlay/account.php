<?php  require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="Styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--google font-->
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Bebas+Neue&display=swap" rel="stylesheet">

    <!--bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--line awesome-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!--Navbar-->
   <nav class="navbar navbar-expand-sm bg-white navbar-white py-3">
      <div class="container">
        <a href="#" class="navbar-brand"><span class="fs-1">GoPlay</span></a>

        <button 
          class="navbar-toggler" 
          type="button"
          data-bs-toggle="collapse" 
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="#navmenu">
          <ul class="navbar-nav ms-auto justify-content-end">
            <li class="nav-item">
              <a href="dash2.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="messages.php" class="nav-link">messages</a>
            </li>
            <li class="nav-item">
              <a href="search-users.php" class="nav-link">search</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $_SESSION['username']; ?></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="account.php">account</a></li>
                <li><a class="dropdown-item" href="login.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
     </nav>

     <div style="background-image: url('images/<?=$_SESSION['image']?>'); " 
        class="profile-pic-box rounded-circle mx-auto mb-3" >
      </div>

     <div class="container-fluid account-page">
      <div class="row">
        <h3 class="text-center">Account Settings</h3>
        
        <div class="col-md-6 mx-auto">
        
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if(count($errors) == 0): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <li>Update Successful</li>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <?php if($locationUpdated): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <li>Location Updated</li>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <?php if($picUpdated): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <li>profile picture Updated</li>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        
        <div class="py-2 form-group">
          <label for="name" >Name: <?php echo $_SESSION['fname']. "&nbsp;" .$_SESSION['lname'];?></label>
        </div>
        <div class="py-2 form-group">
          <label for="name" >username: <?php echo $_SESSION['username']?></label>
        </div>

        <div class="d-flex mb-2" style="justify-content:space-between;">
          <form action="account.php" enctype="multipart/form-data" id="photo-update" method="post">
            <label for="name" class="text-primary">Update profile picture:</label>
            <input type="file"name="prof-pic">
            <button class="btn btn-sm btn-success" name="update-pic">Update Picture</button>
          </form>
        </div>

        <div class="py-2 form-group">
          <form class="location-form" action="account.php" method="post">
            <label for="name" class="text-primary">Update location:</label>
            <input  onclick="getLocation()" type="checkbox" name="permisssion" value="agree">I give GoPlay permission to use my location
            <button name="update-location-btn" type="submit" class="update-location-btn btn btn-warning btn"><span class="las la-location-arrow"></span></button>
            <input type="hidden" name="latitude" value="">
            <input type="hidden" name="longitude" value="" >
          </form>
        </div>
        

          <div class="mt-3">
            
            <form id="update-form" class="update-form" action="account.php" method="post">

              <div class=" form-group">
                <label for="name" class="text-primary">city:</label>
                <input type="text" id="city" name="city" value="<?php echo $_SESSION['city'];?>" class="form-control-sm" placeholder="change city..">
                <label for="name" class="text-primary">state:</label>
                <input type="text" id="state" name="state" value="<?php echo $_SESSION['state'];?>" class="form-control-sm" placeholder="change state..">
              </div>

              <div class="py-2 form-group">
                <label for="name" class="text-primary">update Description: </label>
                <textarea id="descrip" name="descrip" value="<?php echo $_SESSION['descrip']?>" placeholder="" class="form-control" ><?php echo $_SESSION['descrip']?></textarea>
              </div>
              <div class="py-2 form-group">
                <label for="name" class="text-primary">email: <?php echo $_SESSION['email']?></label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'];?>" class="form-control" placeholder="change email..">
              </div>
              
              <div class="py-2 form-group">
                <label for="name" class="text-primary">change password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="new password..">
                <input type="password" name="passwordConf" id="passwordConf" class="form-control" placeholder="confirm password..">
              </div>
              <div class="form-group">
                <button type="submit" name="update-btn" id="update-btn" class="update-btn btn btn-primary btn-lg">update</button>
              </div>
            </form>
          </div>

            
          </div>
        </div>
      </div>
     </div>

     <script type="text/JavaScript">
        // get users location
        function getLocation(){
          if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition)
          }
        }
        function showPosition(position){
          document.querySelector('.location-form input[name = "latitude"]').value = position.coords.latitude;
          document.querySelector('.location-form input[name = "longitude"]').value = position.coords.longitude;
        }  

      </script>

    
  </body>
</html>