<?

session_start();

require_once('include/connectdb.php');

include("pager.php");


if($_SESSION["ADMIN_ID"]==""){
	
header("location:login.php");	
	
	exit;
	 } 
	/* 
	  $limit=16;
	 $sql= ("select * from designs where prod_id='0' order by id DESC");
     $result=mysql_query(dopaging($sql,$limit));
*/

if(isset($_POST['userid']) && $_POST['userid']!=''){
  
   $userid = $_POST['userid'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   $ADMIN_NAME = $_SESSION['ADMIN_NAME'];
   $time=time();
   
   $user_type_check = mysql_result(mysql_query(" select supplier from member where member_id='$userid'"),0);
   
   if($user_type_check==1){
	   $user_type='Supplier';
   }
   else{
	$user_type= 'Buyer'  ;
   }
   
   mysql_query("insert into `message` (`member_id`,`admin_name`,`from`,`subject`,`message_detail`,`date`,`user_type`) values('$userid','$ADMIN_NAME','Beautco','$subject','$message','$time','$user_type')");
  header("location:message_outgoing.php");
   
	//echo "insert into `message`(`member_id`,`admin_name`,`from`,`subject`,`message_detail`,`user_type`)
	   //                  values('$userid',$ADMIN_NAME','Beautco','$subject','$message','$user_type')";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>admin</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link href="style/design.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript">
function validate(){
var userid=$("#userid").val();
var subject = $("#subject").val();
var message = $("#message").val();

if(userid==''){
alert('please select user email');
return false;	
}

if(subject==''){
alert('please enter subject');
$("#subject").focus();
return false;	
}

if(message==''){
alert('please enter message');
$("#message").focus();
return false;	
}

 	
}
</script>
<style type="text/css">
pre{
	  white-space: pre-wrap; 
    white-space: moz-pre-wrap;
    white-space: -pre-wrap;
    white-space: -o-pre-wrap; 
    word-wrap: break-word;
	
}
</style>

</head>



<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><? include('header.php')?></td>

  </tr>

  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td width="20%" valign="top"><? include('left_menu.php');?></td>

        <td width="80%" valign="top"><table width="100%" border="0" cellspacing="10" cellpadding="0">

          
          <tr>

            <td>

              <table width="100%" border="0" cellspacing="10" cellpadding="0">

                <tr>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <td class="lite-blue-bx"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td width="1%" ><img src="images/lft-menu-hd-corner-1.png" width="10" height="35" /></td>

                          <td width="99%" class="blue-bx-topmid-bg" ><table width="100%" border="0" cellspacing="5" cellpadding="0">

                            <tr>

                              <td align="left" class="white-18">Message List</td>

                            </tr>

                          </table></td>

                          <td width="0%" ><img src="images/lft-menu-hd-corner-2.png" width="10" height="35" /></td>

                        </tr>

                        <tr>

                          <td >&nbsp;</td>

                          <td>
                        <form method="post" action="" onsubmit=" return validate()" >  
                          <table width="100%" border="0" cellspacing="6" cellpadding="6" style="font-size:16px;">
                          

                            <tr>

                             <td colspan="2"></td>
                              
                       
                            </tr>
 
  <tr><td align="center">To</td> <td align="center">
  <select name="select_user_type" id="select_user_type" onchange="update_user_type()">
  <option>Select User Type</option>
  <option value="buyer">Buyer</option>
  <option value="supplier">Supplier</option>
  </select>
  &nbsp;<select name="userid" id="userid">
  <option value="">Please Select User Type</option>
  </select>
  
  <script type="text/javascript">
  function update_user_type(){
	var user_type=$("#select_user_type").val();
	
if(user_type!=''){
$("#userid").load("get_user_type.php?type="+user_type);
	
}
	  
  }
  
  </script>
  </td></tr>
  
   <tr><td align="center">Subject</td> <td align="center"><input type="text" name="subject" id="subject"  style="width:400px; height:25px;" /></td></tr>
   
    <tr><td align="center">Message</td> <td align="center">
    <textarea name="message" id="message" style="width:400px;" rows="10"></textarea>
    </td></tr>
                    
                                        
                          

                            <tr>

                              <td colspan="2">&nbsp;</td>

                            </tr>
                              <tr>

                              <td colspan="2" align="center"><input type="submit" name="submit" value="Send"  /></td>

                            </tr>

                            <tr>

                              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
                                	<td colspan="2" align="left">
                                   <font size="+2"> <?php echo rightpaging(); ?> </font>
                                    </td>
                                </tr>					
                               

                              </table></td>

                            </tr>

                          </table></form></td>

                          <td >&nbsp;</td>

                        </tr>

                        <tr>

                          <td >&nbsp;</td>

                       <td  align="left"></td>

                        </tr>

                      </table></td>

                    </tr>

                  </table></td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                </tr>

              </table>

           </td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </table></td>

      </tr>

   </td>

  </tr>

  <tr>

    <td><? include('footer.php')?></td>

  </tr>

</table>


</body>

</html>

