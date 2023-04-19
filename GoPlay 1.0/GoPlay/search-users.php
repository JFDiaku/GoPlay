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

    <div class="container search-page">
      <form class="search-form" id="search-form">
        <button class="dashbutton" id="s-btn" name="s-btn"><span class="la la-search"></span></button>
        <input type="text" name="sBox" class="sBox" id="sBox" placeholder="Search users or sports" > 
      </form>
        
      

      <div class="result-box" id="result-box"></div>
    </div>
    

    <script>
      //create event listener
      document.getElementById('search-form').addEventListener
      ('submit', loadUsers);

      function loadUsers(e){
        e.preventDefault();
        var q = document.getElementById('sBox').value;
        var params = "q="+q;
        //create XHR Object
        var xhr = new XMLHttpRequest();
        //OPEN - type, url/file, async
        xhr.open('POST', 'search-results.php?q='+q, true);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

       xhr.onload = function(){
        if(this.status == 200){
          //document.getElementById('result-box').innerHTML = this.responseText;
          document.getElementById('result-box').innerHTML = this.responseText;
         }
        }

      xhr.onreadystatechange = function(){
        if(this.readyStatechange == 4 && this.status == 200){
        }
      }
        //sends request
        xhr.send(params);
      }

    </script>


  </body>
</html>