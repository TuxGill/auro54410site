<?php
  include('../../../../config.php');

// Main
  $action=$_POST['action'];
  $id=$_POST['id_item'];

// Texts
  $title=$_POST['titleContentCat'];
  $intro=$_POST['text1'];
  $text=$_POST['longText'];

  $order=$_POST['orderCat'];
  // act
  if(isset($_POST['actContentCat']) && $_POST['actContentCat'] == 'on' ){
    $act=1;
  }else{
    $act=0;
  }

  $slug=slugify($title);

  /* Imagem */
  $destFolderImg='../../../../media/images/';
  $tempFileImg=explode('.',$_FILES['imgThumb']['name']);
  $extImg=$tempFileImg[count($tempFileImg)-1];
  $fileImg=clean($_POST['titleContentCat']).'-'.uniqid().'.'.$extImg;
  $finalFileImg=$destFolderImg.$fileImg;
  move_uploaded_file($_FILES['imgThumb']['tmp_name'], $finalFileImg);


  // /* CRIAR OBJECTO*/

  $content = new ContentCategory(null, null, $title, $intro, $text, $fileImg, $order, $act, null, null);
  print_r($content);
  //$content->save($pdo);

?>

<!-- Encaminha para a página do backoffice de novo conteudo  -->
<script type="text/javascript">
  //document.location.href = BASE_URL_BACKOFFICE.'/home.php?area=contentcategory'
</script>
