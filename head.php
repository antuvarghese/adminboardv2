<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Board</title>
  <script src="assets/js/chart.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="assets/icons/css/all.min.css"/>
  <script src="assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css"/>
  <script src="assets/js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
  .light-mode{
      background-color: #fff;
      color: #38393b;
    }
  .light-mode h2{
      background-color: #fff;
      color: #38393b;
    }
  .light-mode h5{
    background-color: #fff;
    color: #38393b; 
  }
  .light-mode hr{
    background-color: #38393b;
  }
  .dark-t{
    color:red;
    background-color: #333;

  }

 

.popup-center {
  margin: 5px 5px 5px 5px;
  margin: 15px 10px 10px 10px;

  }

  .popup-notification {
  position:fixed;
  z-index:1000;
  top:70px;
  right:20px;
  float: right;
  background-color: white;
  width: 300px;
  height:60px;
  border-radius: 10px 10px 10px 10px;
  box-sizing: border-box;
  border: 0;
  display:none;
  animation: popup-notification 5s ease-in-out;
  box-shadow: 0px 0px 10px 0px black;

  
}
@keyframes popup-notification {
    0% {
        right: -250px;
    }
   10%,100% {
        right: 40px;
    }

    }

.popup-child {
  display: inline-block;
  overflow: hidden;
  width: 290px;
  height:60px;
  margin-left: 10px;
  color: #fff;
  box-sizing: border-box;
  border: none;
}

.popup-success {
    background-color: #2ecc71;
  }


.popup-close {
  position: absolute;
  top: 30%;
  right: 3%;
  transform: translateY(-50%);
  background-color: transparent;
  border: 0;
  outline:0;
  font-size: 2em;
  color: #cccccc;
  cursor: pointer;
  &:hover {
    color: inherit;
  }
 
}


/* Zebra striping */
tr:nth-of-type(odd) {
  background: #38393b;
}

th {
  background: #343A40;
  font-weight: bold;
}

.shadow-5 {
  box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.6);

            }
.shadow-neon{
  box-shadow: inset 0px 5px 10px 0px rgba(0, 0, 0, 0.7);

}   


@media (min-width: 992px){
.desktop-space {
    margin-left:10px;
    flex: 0 0 31%;
    max-width: 0 0 31%;

}
}  

@media screen and (max-width: 767px) {
.mobile-space {
    margin-top:10px;
    margin-left:0px;
    width: 300px;


}
}

</style>
</head>

<body class="bg-mdark">
  <div class="main">
    <nav class="fixed-top navbar navbar-dark bg-dark" style="justify-content: end; height: 60px; z-index:1;">
      <h5 class="bg-dark">
        <a href="#" id="navBtn">
        <span id="changeIcon" class="fa fa-shield-alt text-light"></span>
        <span id="changeIcon" class="link-text ml-2 text-light">AdminBoard</span>
        </a>

  </h5> 
        
      <div class="d-flex pr-5 m4-5" style="margin-left: auto;">
        <a class="nav-link text-light" href="#"><i class="fas fa-search"></i></a>
      <a class="nav-link text-light" href="#"><i class="fas fa-bell"></i></a>
       
        <div class="dropdown">
          <img src="assets/images/arch_avatar.png" class="avatar"
            alt="Avatar" />
          <div class="dropdown-content">
            <a href="#"><i class="fas fa-user-circle"></i>&nbsp; Profile</a>
            <a href="#"><i class="fas fa-cog"></i>&nbsp; Settings</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
          </div>
        </div>
        <div class="d-flex pl-3 mt-2" style="margin-left: auto;">
        <a id="toggleBtn" onclick="toggleButtonMode()"><i id="icon" class="text-light fas fa-moon"></i></a>
</div>
<script>
        // Function to toggle dark mode
function toggleButtonMode() {
  
  var icon = document.getElementById("icon");

  // Check if dark mode is enabled
  var isDarkMode = icon.classList.contains("fa-moon");
  
  // Toggle dark mode class and update icon
  if (isDarkMode) {
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");


  } else {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
  }
  
  // Store dark mode state in local storage
  localStorage.setItem("darkMode", !isDarkMode);

  let element = document.body;
  element.classList.toggle("light-mode");

  let theme = localStorage.getItem("theme");
  if (theme && theme === "light-mode") {
    localStorage.setItem("theme", "");
  } else {
    localStorage.setItem("theme", "light-mode");
    
  }

  
}

// Check if dark mode is enabled on page load
document.addEventListener("DOMContentLoaded", function() {
  var icon = document.getElementById("icon");
  var isDarkMode = localStorage.getItem("darkMode");
  
  
  if (isDarkMode === "true") {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
    
  }
});

// On page load set the theme.
(function() {
  let onpageLoad = localStorage.getItem("theme") || "light";
  let element = document.body;
  element.classList.add(onpageLoad);
})();




    </script>



        <script>
    function toggleLightMode() {
      var elements = document.getElementsByTagName("h2");
      var hrspace = document.getElementsByTagName("hr");
      var h5title = document.getElementsByTagName("h5");
      var body = document.body;

      // Toggle the dark mode class on the body element
      //body.classList.toggle("light-mode");
      // Loop through all <h2> elements and update their color
      for (var i = 0; i < elements.length; i++) {
        elements[i].classList.toggle("light-mode");
      }
      for (var i = 0; i < hrspace.length; i++) {
        hrspace[i].classList.toggle("light-hr");
      }
      for (var i = 0; i < h5title.length; i++) {
        h5title[i].classList.toggle("light-mode");
      }
      
    }
  </script>
      </div>

    </nav>


    <div class="navbar-side">
    
      <ul>
        <li>
            <a class="<?php if($currentPage =='dashboard.php'){echo 'link-active';}?>" href="dashboard.php" title="Dashboard">
              <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
              <span class="link-text">Dashboard</span>
            </a>
          </li>
        <li><a class="<?php if($currentPage =='servers.php'){echo 'link-active';}?>" href="servers.php" title="Servers">
          <span class="icon"><i class="fas fa-server"></i></span>
            <span class="link-text">Servers</span>
            </i>
          </a></li>
        <li><a class="<?php if($currentPage =='databases.php'){echo 'link-active';}?>" href="databases.php" title="Databases">
            <span class="icon"> <i class="fas fa-database "></i></span>
            <span class="link-text">Databases</span>
          </a></li>
        <li><a class="<?php if($currentPage =='websites.php'){echo 'link-active';}?>" href="websites.php" title="Websites">
            <span class="icon"><i class="fas fa-globe"></i></span>
            <span class="link-text">Websites</span>
          </a></li>
        <li><a class="<?php if($currentPage =='wordpress.php'){echo 'link-active';}?>" href="wordpress.php" title="Wordpress">
            <span class="icon"><i class="fab fa-wordpress"></i></span>
            <span class="link-text">Wordpress</span>
        </a></li>
        <li><a class="<?php if($currentPage =='backups.php'){echo 'link-active';}?>" href="backups.php" title="Backups">
            <span class="icon"><i class="fas fa-save"></i></span>
            <span class="link-text">Backups</span>
        </a></li>
        <li><a href="#" title="Settings">
            <span class="icon"><i class="fas fa-cog"></i></span>
            <span class="link-text">Settings</span>
          </a></li>
        <li><a href="#" title="Profile">
            <span class="icon"><i class="fas fa-user-circle"></i></span>
            <span class="link-text">Profile</span>
            </a></li>
        <li><a href="#" title="Sign Out">
            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
            <span class="link-text">Sign Out</span>
          </a></li>
      </ul>
    </div>
      

      <div class="content">

    <div class="container fill-100" style="margin-top: 60px;">


      <!-- content goes here -->



