<?php 
session_start(); 

require_once('wp-admin/include/connectdb.php');
include('wp-admin/pager.php');

$user_id=$_SESSION['member_id'];

$wig_list_query=mysql_query(dopaging("SELECT * FROM `product` where user_id = $user_id",20)); 


?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Supplier Index</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
	
 function show_content_slide(cls){
 $("."+cls).slideToggle('fast');
 }
   
function show_content(cls){
$("."+cls).show(0);
}
function hide_content(cls){
	$("."+cls).hide(0);
}
	
function close_popup(id){
 //$(".overlay-mask").fadeOut('slow');	
 $("#"+id).fadeOut('slow');
}	

$(document).ready(function(e) {
	setTimeout(function() {
    $("#overlay-mask-1").fadeIn('slow');}, 5000);
	

});

    </script>
<style type="text/css">
@import url(//fonts.googleapis.com/css?family=Lato:400,700,900);
.overlay-mask {
	background: none repeat scroll 0 0 rgba(28, 45, 50, 0.8);
	bottom: 0;
	height: 100%;
	left: 0;
	position: fixed;
	right: 0;
	top: 0;
	width: 100%;
	z-index: 999999;
	display: none;
	overflow-y: auto;
	overflow-x: hidden;
}
.overlay.iframe-content {
	border: 2em solid #fff;
	border-radius: 6px;
	box-sizing: content-box;
	padding: 0;
	width: 90%;
}
.overlay {
	background: none repeat scroll 0 0 #fff;
	border-radius: 3px;
	box-shadow: 0 1px 3px rgba(23, 74, 104, 0.35), 0 0 32px rgba(60, 82, 93, 0.35);
	box-sizing: border-box;
	margin: 50px auto 0;
	padding: 30px;
	position: relative;
}
.overlay.iframe-content .title {
	border: medium none;
	margin: 0;
	position: absolute;
}
.overlay .title {
	border-bottom: 1px solid #e2e8ea;
	margin-bottom: 20px;
}
.overlay .close-icon {
	font: 32px Dingbatz;
	color: #b3c5d0;
	content: "";
	display: block;
	font: bold 20px "Dingbatz";
	position: absolute;
	right: 0;
}
.overlay.iframe-content .close-icon {
	/*background: none repeat scroll 0 0 white;
	border-radius: 32px;
	height: 32px;
	left: 706px;
	position: absolute;
	top: -16px;
	width: 32px;

*/
	background: none repeat scroll 0 0 #000;
	border-radius: 32px;
	color: white;
	height: 32px;
	opacity: 1;
	position: absolute;
	right: -2em;
	top: -2em;
	width: 32px;
}
.overlay .close-icon {
	cursor: pointer;
	float: right;
}

.full {
	width: 100%;
	overflow: hidden;
}
.search-header {
	border: 1px solid #e5e5e5;
	border-bottom-left-radius: 2px;
	border-top-left-radius: 2px;
	color: #828282;
	height: 40px;
	margin-right: -1px;
	padding: 8px;
}
.arrow-down-cls {
	-webkit-appearance: none;
	-moz-appearance: none;
	background: transparent url("https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png") no-repeat right center;
//width:100%;
}
#pts_search_query_top {
	border: 1px solid #e5e5e5;
	color: #828282;
	display: inline;
	height: 40px;
	margin-right: -1px;
	min-width: 310px;
	padding: 8px 10px;
}
.red-btn {
	border: 0 none;
	border-radius: 2px;
	color: #fff;
	padding: 0.8em;
	background: #F14E47;
}
.blue-btn {
	background: #2992C1;
	border: 0 none;
	border-radius: 2px;
	color: #fff;
	padding: 0.8em;
}
.menu-home {
	list-style: none outside none;
}
.menu-home >li {
	float: left;
	padding: 10px 5px;
	color: #FFF;
}
.vertical-menu {
	background: none repeat scroll 0 0 #fff;
	color: #000;
	float: left;
	list-style: outside none none;
	position: absolute;
	width: 90%;
}
.vertical-menu > li {
	padding: 0.5em 0;
}
#body_container {
	//background-image: url("images/strip.png");
	//background-repeat: repeat-x;
	background-color: #fff;
}
.category_title {
	font-family: "shruti-bold";
	font-size: 16px;
	height: 85px;
	line-height: 85px;
	margin: 0;
	padding: 0 10px 0 25px;
}
.active-menu {
	color: #60AACC;
	border: 1px solid #EEEEEE;
	border-right: 0px;
}
.footer-menu {
	list-style: none outside none;
	padding-left: 0px;
}
.footer-menu li {
	padding: 5px 0px;
	text-transform: uppercase;
}
.full-hidden {
	display: none;
}
.full-hidden-menu {
	height: 0;
	width: 0;
}
.background-img {
	background-image: url('images/flower_strip.png');
	height: 130px;
}
.atss {
	background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
	position: fixed;
	top: 20%;
	width: 48px;
	z-index: 100020;
}
.atss a {
 //background: none repeat scroll 0 0 #e8e8e8;
	display: block;
	float: left;
 //line-height: 48px;
	margin: 0;
	outline: medium none;
	overflow: hidden;
	padding: 0px 0;
	position: relative;
	text-align: center;
 // text-indent: -9999em;
	transition: width 0.15s ease-in-out 0s;
	width: 48px;
	z-index: 100030;
}
.atss-right {
	float: right;
	left: auto;
	right: 0;
}
.input-xm{
	width:21%;
}

.dotted-class{
	border-bottom: 1px dotted #999;
    display: inline-block;
    height: 1px;
}

.bg-dotted{
	background-image:url('images/dotted_img.png');
	background-repeat:repeat-x;
	width:100%;
	height:3px;
	margin:.5em 0;

}
 @media (max-width: 426px) {
.full-hidden {
	display: block;
}
.row-30-small {
	width: 30% !important;
	float: left !important;
}
#pts_search_query_top {
	min-width: 70% !important;
	width: 120px;
}
.search-header {
	font-size: .6em;
}
.row-30-small-right {
	float: right;
	padding-top: 3em;
	position: absolute;
	right: 0;
	width: 50%;
}
.small-hidden {
	display: none;
}
.small-margin-5 {
	margin-top: 5em;
}
.small-margin-2 {
	margin-top: 2em;
}
.small-margin-bottom-1 {
	margin-bottom: 1em;
}
.vertical-menu {
	margin-top: -1em;
	width: 82.5% !important;
	z-index: 222;
	border: 1px solid #909090;
	border-top: 0px;
}
.small-rotate-img {
	margin-left: 42%;
	text-align: center;
	transform: rotate(270deg);
	margin-bottom: -11em;
	margin-top: -10em;
}
.col-lg-4, .col-lg-3 {
	margin-bottom: 1em;
}
.small-padding-hidden {
	padding-top: 0px !important;
}
.small-width-full {
	width: 96% !important;
	padding: 0 2% !important;
}
.small-width-60 {
	width: 60% !important;
}
.row-25-small {
	width: 25% !important;
	float: left !important;
}
.row-50-small {
	width: 50% !important;
	float: left !important;
}
.small-width-40 {
	width: 40% !important;
}
.small-text-center {
	text-align: center !important;
}
.small-padding-left-15 {
	padding: 0 15% !important;
}
.small-border-dotted {
	border: 1px dashed !important;
	padding: .5em !important
}
.small-margin-bottom-hidden {
	margin-bottom: 0px !important;
}
.small-font {
	font-size: .7em;
}
.menu-small {
	background-color: rgba(0, 0, 0, 0.3);
	color: #fff;
	height: 42px;
	margin-left: 2em;
	margin-top: 1em;
	padding-top: 14px;
	text-align: center;
	width: 50px;
}
.full-hidden-menu {
	list-style: none outside none;
	background-color: #242424;
	margin: 1% 5%;
	padding-left: 0;
	width: 90%;
	height: auto;
}
.full-hidden-menu >li {
	border-bottom: 1px solid;
	color: #fff;
	padding: 0.5em;
	position: relative;
}
.overlay.iframe-content {
	width: 70% !important;
}
.text-right-small div{
	text-align:left !important;
}
.border-bottom-small{
	border-right:0px !important;
	border-bottom:1px solid #eeeeee;
	margin-bottom: 2em;
    padding-bottom: 2em;
}
}
</style>
<link href="css/custom.css" rel="stylesheet">
</head>
<body>
<div class="full"> 
  <!--header start-->
  
  <?php include('header_supplier.php')?>
  
<!--header end--> 

<!--body start-->
<div class="full" id="body_container">
  <div class="container">
<div class="row">
<!-- left menu start -->
<div class="col-lg-2">
<div class="full">
<div class="full" style="border-bottom:1px solid #929597;">
<h3 class="h3"><span><img src="images/supplier_right_arrow.png">&nbsp;</span>Supplier</h3>
</div>
<div class="full text-left" style="line-height:1.6em;">
<span>All Selling Products</span><Br>
<span><a href="add_product.php">Upload Product</a></span><Br>
<span>Bulk Upload Products</span><Br>
<span>Scheduled &nbsp;(0)</span><Br>
<span>Active &nbsp; (89)</span><Br>
<span>Sold&nbsp; (66)</span><Br>
<span>Unsold &nbsp; (0)</span><Br>
<span>Shipping labels</span><Br>
<span>Returns (1)</span><Br>

</div>
<div class="full" style="border-bottom:1px solid #929597; margin-top:1em;">
<h3 class="h3"><span><img src="images/supplier_right_arrow.png">&nbsp;</span>My Account</h3>
</div>
<?php 
$row = mysql_query("select * from `trade` where order_status ='Complete' ");
$total_row = mysql_num_rows($row)
?>
<div class="full text-left" style="line-height:1.6em;">
<span>Sold</span>
<span>sold(<?=$total_row?>)</span>
<div class="row" style="border-bottom:1px solid #D0D2D3;">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">Amount</div>
<?php
$result = mysql_query("select sum(payM) as total from `trade` where order_status ='Complete' "); 
$row = mysql_fetch_assoc($result); 
$total_sum = $row['total']?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left"><?=$total_sum?></div>
</div>

<span style="font-weight:bold; margin-top:1em; display:inline-block">Payments</span>
<div class="row" style="">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">Received</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">$2574.85</div>
</div>
<div class="row" style="border-bottom:1px solid #D0D2D3;">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">Not received</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">$3306.88</div>
</div>
<div class="row" style=" margin-top:1.4em;">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">Total sales :</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">$5881.73</div>
</div>
</div>


</div>
</div>
<!-- left menu end   -->

<div class="col-lg-1 small-hidden"></div>
<!-- right  menu start  -->
<div class="col-lg-9">

<!-- for large size start -->
<div class="full" style="margin-top:2em;">

<div class="row text-center small-hidden" >
<div class="col-lg-2">Picture</div><div class="col-lg-1">Model</div><div class="col-lg-2">Price</div>
<div class="col-lg-2">Wholesale Price</div>
<div class="col-lg-1">Min</div><div class="col-lg-2">Category</div><div class="col-lg-2">Action</div>
</div>
<div class="bg-dotted"></div>
<?php
	 
	$count=0;
	
			while($wig_list_row=mysql_fetch_assoc($wig_list_query)) {
			   $count++;
			 if (strpos($wig_list_row['images'],',') !== false) {
  $product_img=explode(',',$wig_list_row['images']);
  $product_img=$product_img[0];
}
else{
  $product_img=$wig_list_row['images'];	
}
		
		
$ques_count=mysql_result(mysql_query("select count(id) from ask_question where product_id='$wig_list_row[id]'"),0);	

			   
		    ?> 
     

<div class="row text-center small-hidden" >
<div class="col-lg-2" style=" min-height:110px;">
<div class="col-lg-1" style=" padding-top:25px;"><input type="checkbox" ></div>
<div class="col-lg-8" style="padding:0px;">
<a href="goods_detail.php?goods_Id=<?=$wig_list_row['id']?>">
<img src="product_img/<?=$product_img?>" width="65" height="65"  style="border:1px solid #CACACA;" ></a></div>
</div>
<div class="col-lg-1" style=" min-height:110px; padding-top:25px;"><?=$wig_list_row['product_name']?></div>
<div class="col-lg-2" style=" min-height:110px;padding-top:25px;">$<?=$wig_list_row['msrp_price']?></div>
<div class="col-lg-2" style=" min-height:110px;padding-top:25px;"><?=$wig_list_row['wholesale_price']?></div>
<div class="col-lg-1" style=" min-height:110px;padding-top:25px;">1</div>
<div class="col-lg-2" style=" min-height:110px;padding-top:25px;">
<select name="" class="arrow-down-cls full" style="border:1px solid #A9A9A9;">
<option value="<?=$wig_list_row['category']?>"><?=$wig_list_row['category']?></option>

</select>
</div>
<div class="col-lg-2 text-left">
Question(<?=$ques_count?>)<br>
End Item<br>
<!--Customer Order<br>
Large Order<br>
--><a href="edit_product.php?p_id=<?=$wig_list_row['id']?>" style="color:inherit;">Edit</a>
</div>
</div>
<div class="full small-hidden">
<div class="col-lg-4 text-left">Options &nbsp;&nbsp; Qty :<?=$wig_list_row['quantity']?></div><div class="col-lg-6 text-left">Shipping:$<?=$wig_list_row['shipping_price']?> &nbsp;&nbsp;
DropShip:<?=$wig_list_row['dropship']?>
</div>
</div>



<!-- for small size start  -->
<div class="full full-hidden" style="margin-top:2em; line-height:2em; border-top:2px solid #000;">

<div class="row">
<div class="col-sm-2 col-xs-3">Picture</div>
<div class="col-sm-10 col-xs-9">
<div class="col-sm-1 col-xs-1 small-hidden full-hidden"><input type="checkbox" class="text-left"></div>
<div class="col-sm-10 col-xs-10">
<a href="goods_detail.php?goods_Id=<?=$wig_list_row['id']?>">
<img src="product_img/<?=$product_img?>" class="" width="150" height="150" ></a>
</div>
</div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Model</div>
<div class="col-sm-6 col-xs-6"><?=$wig_list_row['product_name']?> </div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Price</div>
<div class="col-sm-6 col-xs-6">$<?=$wig_list_row['msrp_price']?> </div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">WholeSale Price</div>
<div class="col-sm-6 col-xs-6">$<?=$wig_list_row['wholesale_price']?> </div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Min</div>
<div class="col-sm-6 col-xs-6">1 </div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Category</div>
<div class="col-sm-6 col-xs-6"><select name="" class="arrow-down-cls full" style="border:1px solid #A9A9A9;">
<option value="<?=$wig_list_row['category']?>"><?=$wig_list_row['category']?></option>
</select> </div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Options</div>
<div class="col-sm-6 col-xs-6">Qty:43</div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Shipping</div>
<div class="col-sm-6 col-xs-6">$5.99</div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Dropship</div>
<div class="col-sm-6 col-xs-6">No </div>
</div>
<div class="row" >
<div class="col-sm-6 col-xs-6">Action</div>
<div class="col-sm-6 col-xs-6">Question(3)<br>
End Item<br>
<!--Customer Order<br>
Large Order<br>
--><a href="edit_product.php?p_id=<?=$wig_list_row['id']?>" style="color:inherit;">Edit</a>
 </div>
</div>

</div>
<!-- for small size end   -->

<div class="bg-dotted small-hidden"></div>

<?php  } ?>
</div>
<!-- for large size end -->



<div class="row">
<div class="col-lg-9 col-md-9 col-sm-7 col-xs-7" style="font-size:1.3em;">
EDIT | DELETE | END ITEM</div>
<div class="col-lg-3 col-md-3 col-sm-5 col-xs-5">
<div style="color:#FFF; text-align:center;" class="red-btn">Upload Product</div>
</div>
</div>
<div class="full" align="center"  style="margin:.5em 0;"><?php  echo rightpaging(); ?></div>
</div>


</div>
<!-- right menu end  -->
</div>
  </div>
</div>

<!--body end--> 

<!-- footer start-->
<?php include('footer.php')?>

<!--footer end  -->

</div>

<!--right sidebar start-->
<div id="at4-share" class="addthis_32x32_style atss atss-right addthis-animated slideInRight at4-show"><a class="at4-share-btn at-svc-facebook" href="#"><img src="images/fb.png" ></a> <a class="at4-share-btn at-svc-twitter" href="#"><img src="images/tw.png" ></a><a class="at4-share-btn at-svc-zingme" href="#"><img src="images/ymoo.png" ></a><a class="at4-share-btn at-svc-linkedin" href="#"><img src="images/z.png" ></a><a class="at4-share-btn at-svc-favorites" href="#"><img src="images/p.png" ></a><a class="at4-share-btn at-svc-google_plusone_share" href="#"><img src="images/plus.png" ></a> 
  <!--<div id="at4-scc" class="at-share-close-control ats-transparent at4-show at4-hide-content" title="Hide">
    <div class="at4-arrow at-right">Hide</div>
  </div>--> 
</div>

<!--right sidebar end



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
