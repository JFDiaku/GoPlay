<?php  require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css' rel='stylesheet' />
    </head>
    <body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <title>Register</title>

      <!--Navbar-->
      <nav class="navbar navbar-expand-sm bg-white navbar-white py-3">
        <div class="container">
          <a href="homepage.php" class="navbar-brand"><span class="fs-1">GoPlay</span></a>

          <button 
            class="navbar-toggler" 
            type="button"
            data-bs-toggle="collapse" 
            data-bs-targer="#navmenu"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="#navmenu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="homepage.php" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="login.php" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="homepage.php" class="nav-link">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>      
      

      <!--signup form-->
      <div class="container d-flex align-items-center pb-5">
        
          <div class="form-container">
            <form class="signup-form" action="signup.php" enctype="multipart/form-data" method="POST">
              <h3 class="text-center">Register</h3>
              
              <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                  <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>


              <div class="form-group">
                <label for="first">First name:</label>
                <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="last">Last name:</label>
                <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="">about yourself and the sport(s) you play:</label>
                <textarea name="descrip" value="<?php echo $descrip; ?>" class="form-control" ></textarea>
              </div>

              <div class=" mt-2 mb-2 form-group">
                <label for="">Profile picture:&nbsp;</label>
                <input type="file" name="image" id="image" value="">
              </div>
    
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
              </div>


              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>"class="form-control">
              </div>

              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
              </div>


              <div class="form-group">
                <label for="passwordConf">Confrim Password:</label>
                <input type="password" name="passwordConf" class="form-control">
              </div>

              <div class="form-group">
                <input  onclick="getLocation()" type="checkbox" name="permisssion" value="agree">I give GoPlay permission to use my location
                <a tabindex="0" class="btn ms-2 btn-sm btn-danger" role="button" data-bs-toggle="popover" data-bs-trigger="focus" 
                title="what am i agreeing to?" 
                data-content="you agree to let goplay store your approximate location. your stored location is never displayed to other users.">?</a>
              </div>

              <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control-sm">
                <label for="state">State:</label>
                <input type="text" name="state" class="form-control-sm">
              </div>



              <input type="hidden" name="latitude" value="">
              <input type="hidden" name="longitude" value="" >

              <div class=" p-2 form-group">
                <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn">Sign Up</button>
              </div>

              <p class="text-center">Already a member ?&nbsp;<a href="login.php">Sign in</a></p>

            </form>
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
          document.querySelector('.signup-form input[name = "latitude"]').value = position.coords.latitude;
          document.querySelector('.signup-form input[name = "longitude"]').value = position.coords.longitude;
        }  

        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
          return new bootstrap.Popover(popoverTriggerEl)
        })

        var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
          trigger: 'focus'
        })

        

      </script>

    </body>
</html>

