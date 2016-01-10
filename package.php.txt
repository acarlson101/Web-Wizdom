<?php
include("inc/packages.php");
if (isset($_GET["id"])){
	$product_id = $_GET["id"];
	if (isset($products[$product_id])){
		$product = $products[$product_id];
	}
}	
if (!isset($product)){
	header("Location: shirts.php");
	exit();
}
if ($_GET["id"] == 101 ){
	$content = "basic";
}
else if ($_GET["id"] == 102 ){
	$content = "advanced";
}
else {
	$content = "complete";
}
$title = $product["name"];
include("inc/header.php");
?>
<div id="wrapper">
<h2><?php echo $product["name"]; ?></h2>
<?php
echo '<p>' . $product["descr"] . '</p>';
 ?>
		<!--form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="<?php echo $product["paypal"]; ?>"> 
						<input type="hidden" name="item_name" value="<?php echo $product["name"]; ?>">
						<input type="submit" value="Add to Cart" name="submit">
		</form-->

</div>
<?php include("inc/footer.php"); ?>

