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
              <a href="" class="nav-link">Dashboard</a>
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

    <div class="dash container p-3" align="center" >
      <div class="row dashboard-panel">
        <div class="dashLink col">
          <a href="search-users.php" class="dashIcon las la-search-plus"></a>
        </div>
        <div class="dashLink col">
          <a href="messages.php" class="dashIcon las la-comments"></a>
        </div>
        <div class="w-100"></div>
        <div class="dashLink col">
          <a href="account.php" class="dashIcon las la-user-circle"></a>
        </div>
        <div class="dashLink col">
          <a href="login.php" class="dashIcon las la-sign-out-alt"></a>
        </div>
      </div>
    </div>
     


    
    <script>
      function show(param_div_id){
        document.getElementById('mid-content').innerHTML = document.getElementById(param_div_id).innerHTML;
      }

      

      function distance(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = (lat2-lat1).toRad();  // Javascript functions in radians
        var dLon = (lon2-lon1).toRad(); 
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
                Math.sin(dLon/2) * Math.sin(dLon/2); 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; // Distance in km
        return d;
      }


    </script>
      



  </body>
</html>