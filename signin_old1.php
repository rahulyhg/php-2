<?
ini_set('display_errors', '1');
session_start();
require_once('../wp-admin/include/connectdb.php');
if(isset($_POST["submit"])){
$email=$_POST['email'];
$password=$_POST['password'];
//echo "select * from member where  email='$email' and pwd='$password' and i_am='ISR'";
$result=mysql_query("select * from member where  email='$email' and pwd='$password' and i_am='Agent' and verify_status='1'");
$num=mysql_num_rows($result);
if($num){
		$row=mysql_fetch_array($result);
		//var_dump($row);
		$_SESSION['ISR_ID']=$row['member_id'];
		$_SESSION['ISR_NAME']=$row['f_name'];
		$_SESSION['user_type']=$row['i_am'];
		$_SESSION['tempuser']=$row['member_id'].time();
		$_SESSION['level']=$row['level'];
		
	$_SESSION['GOOD_SHOP_USERID']=$row['email'];
	 $_SESSION['GOOD_SHOP_PART']='member';
	 $_SESSION['member_id']=$row['member_id'];
	 $_SESSION['my_shop']=$row['my_shop'];
	 $_SESSION['company_name'] = $row['company_name'];
	 $_SESSION['verify_status'] = $row['verify_status'];
	 $_SESSION['i_am'] = $row['i_am'];
		//echo $_SESSION['ISR_ID'];
		header("location:dashboard.php");
		}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>EBHA-ISR-SIGNIN</title>
  <meta name="description" content="BHA-ISR" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="css/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="css/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/ionicons/css/ionicons.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="css/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="css/styles/style.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="css/styles/font.css" type="text/css" />
  <style  type="text/css">
 



/*
Navbar 
*/
.navbar {
  border: none;
  padding: 0 1rem;
  flex-shrink: 0;
  min-height: 250px; }
  
 



.navbar-nav &gt; .nav-link,
.navbar-nav &gt; .nav-item &gt; .nav-link,
.navbar-item,
.navbar-brand {
  padding: 0;
  line-height: 300px;
  white-space: nowrap; }

 .navbar-brand img,
  .navbar-brand svg {
    position: relative;
    max-height: 200px;
    top: 0.75rem;
    display: inline-block;
    vertical-align: top; }
 






  
  </style>
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <div class="padding">
    <div class="navbar">
      <div class="pull-center" style="position:absolute; left:50%; top:50%; z-index:1;">
        <!-- brand -->
        <a href="index.html" class="navbar-brand">
        	<div data-ui-include="'images/ebha_logo2.jpg'"></div>
        	<img src="images/ebha_logo2.jpg" alt=".">
        	
        </a>
        <!-- / brand -->
      </div>
	  <br>
    </div>
  </div>
  <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
        <!-- <div>
          <a href="#" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-facebook pull-left"></i>
            Sign in with Facebook
          </a>
          <a href="#" class="btn btn-block red text-white">
            <i class="fa fa-google-plus pull-left"></i>
            Sign in with Google+
          </a>
        </div>
        <div class="m-y text-sm">
          OR
        </div>-->
        <form name="form" action="" method="post">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" required name="email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="password" required  name="password">
          </div>      
          <div class="m-b-md">        
            <label class="md-check">
              <input type="checkbox"><i class="primary"></i> Keep me signed in
            </label>
          </div>
           <input type="hidden" name="submit" value="submit" />
          <button type="submit" class="btn btn-lg black p-x-lg">Sign in</button>
        </form>
        <div class="m-y">
          <a href="forgot-password.html" class="_600">Forgot password?</a>
        </div>
        <div>
          Do not have an account? 
          <a href="https://ebhahair.com/agent_register.php" class="text-primary _600">Sign up</a>
              <br> Did you purchase agent package? <a href="https://ebhahair.com/agent/" class="text-primary _600">Agent Packages</a>
        </div>
      </div>
    </div>
  </div>

<!-- ############ LAYOUT END-->
  </div>

<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
  <script src="libs/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="libs/tether/dist/js/tether.min.js"></script>
  <script src="libs/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="libs/PACE/pace.min.js"></script>
  <script src="libs/jquery-pjax/jquery.pjax.js"></script>
  <script src="libs/blockUI/jquery.blockUI.js"></script>
  <script src="libs/jscroll/jquery.jscroll.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-modal.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-list.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>
  <script src="scripts/ui-taburl.js"></script>
  <script src="scripts/app.js"></script>
  <script src="scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>
