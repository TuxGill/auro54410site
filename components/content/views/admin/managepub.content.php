<?php
	include('../../../../config.php');
	$c=getContentById($pdo, $_GET['id']);
	$act=$_GET['pub'];

	$c[0]->setAct($act);
	print_r($c);

	$c[0]->update($pdo, $_GET['id']);


	//header('Location:'.BASE_URL_BACKOFFICE.'//home.php?area=newcontent&idCat='.$p[0]->getCategory());
?>

<script type="text/javascript">
  window.location.href = "<?php echo BASE_URL_BACKOFFICE.'//home.php?area=newcontent&idCat='.$c[0]->getCategory(); ?>"
</script>