<?php
  //ob_start();
if (session_status() != PHP_SESSION_ACTIVE)
  session_start();



changeLanguage();
function changeLanguage()
{
  if(isset($_GET['Lang'])){
    if($_GET['Lang'] == 'Fr')
      $_SESSION['dispEng'] = 0;
    else
      $_SESSION['dispEng'] = 1;
  }
  //default language
  if(!isset($_SESSION['dispEng']))
  	$_SESSION['dispEng'];
}

?>
<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
  <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
    <span class="navbar-toggler-icon"></span>


  </button>

        <span class="navbar-text">
          <?php
      			if($_SESSION['dispEng'])
      				echo "CourseSequence";
      			else
      				echo "SéquenceDesCours";
          ?>
        </span>
        <div class="collapse navbar-collapse" id="collapse_target">



        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="about.php">
                  <?php
            				if($_SESSION['dispEng'])
            					echo "About us";
            				else
            					echo "À propos";
                  ?>
                </a>
            </li>
        </ul>
        <?php
         if( ($_SERVER['REQUEST_URI']!='/SOEN341/') && ($_SERVER['REQUEST_URI']!='/SOEN341/index.php')){ ?>
         <ul class="navbar-nav ">
               <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
               <li class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

               <?php
               if($_SESSION['dispEng'])
               	echo "Welcome";
               else
               	echo "Bienvenue";

                if(isset($_SESSION['loggedin']))
                 echo ', '.$_SESSION['userName'];
               ?>

           </a>
                   <div class="dropdown-menu" aria-labelledby="navDropDownLink">

                     <a class="dropdown-item" href="FrontEnd/profilePage.php">Profile</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="FrontEnd/logout.php">Logout</a>
                   </div>
               </li>
           </ul>
         <?php } ?>
        </div>
    </nav>

<script>
 function LangURLChanger(Lang){
      var currentPage = window.location.href;

      if(currentPage == currentPage.replace('Lang','x'))
        window.location.href = currentPage+'?Lang='+Lang;
      else
        window.location.href = currentPage.substring(0,currentPage.length-2)+Lang;
      }
</script>
