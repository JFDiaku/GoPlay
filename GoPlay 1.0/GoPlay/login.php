<?php  require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
  <head>

    <title>Homepage</title>
    <link rel="stylesheet" href="Styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
      crossorigin="anonymous">
    </script>


    
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
              <a href="signup.php" class="nav-link">Register</a>
            </li>
          </ul>
        </div>
      </div>
     </nav>

    <!--login-->
    <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-4 form-div">
            <form action="login.php" method="post">
              <h3 class="text-center">Login</h3>
              
              <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                  <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>


              <?php if($registered): ?>
                <div class="alert alert-success">
                    <li>Registration succesfull</li>
                </div>
              <?php endif; ?>



              <div class="form-group">
                <label for="username">Username / Email:</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
              </div>

              <div class=" p-2 form-group">
                <button type="submit" name="login-btn" class="btn btn-primary btn-block btn">Sign in</button>
              </div>

              <p class="text-center">Don't have account?&nbsp;<a href="signup.php">Sign up</a></p>

            </form>
          </div>
        </div>
      </div>
    
     
     
  </body>
</html>