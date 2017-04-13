<?php
	include('../../../../config.php');
	$c=getContentById($pdo, $_GET['id']);
	//print_r($p);

	$c[0]->delete($pdo);
	//header('Location:'.BASE_URL_BACKOFFICE.'//home.php?area=newcontent&idCat='.$p[0]->getCategory());
?>

<script type="text/javascript">
  window.location.href = "<?php echo BASE_URL_BACKOFFICE.'//home.php?area=newcontent&idCat='.$c[0]->getCategory(); ?>"
</script>