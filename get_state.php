<?php
require_once('wp-admin/include/connectdb.php');
// echo "hloo";
$c_id=$_POST['c_id'];
echo $c_id;
 $get= $_GET["foo"];
 echo $get;
  if($_GET['c_id']!=''){
 echo "hloo11";
 $c_id=$_GET['c_id'];
 
 

$stmt=$con_pdo->prepare("select * from state where country_id=:country_id");
 
 $stmt->bindParam(':country_id',$c_id,PDO::PARAM_INT);
 
 $stmt->execute();
 
  $count=$stmt->rowCount();
 
 if($count>0){
	  while ($state_result = $stmt->fetch(PDO::FETCH_ASSOC)) {
	?>	
    <select>
	<option value="<?=$state_result['state_id']?>"><?=$state_result['state_name']?></option></select>
	
	<?php } 
	
 }
 

 
  }
  
  if($_GET['act']=='select'){
	  
	 $cid= $_GET['cid'];
	 
	 $st_id=$_GET['st_id'];
	 
	$query= mysql_query("select * from state where country_id='$cid'");
	  
	 $count= mysql_num_rows($query);
	
	if($count>0){
 while($state_row=mysql_fetch_assoc($query)){
?>
<option value="<?=$state_row['state_id']?>" <? if($st_id==$state_row['state_id']){?> selected="selected"<? } ?> >
<?=$state_row['state_name']?></option>	 
 <? }
		
	}
	 
  }
  
	  ?>