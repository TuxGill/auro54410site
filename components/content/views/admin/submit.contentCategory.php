<?php
  include('../../../../config.php');

// Main
  $action=$_POST['action'];
  $id=$_POST['id_item'];

  //Se for edit
    $contentCat = getContentCategoriesById($pdo, $id);

/**/
// Texts
  $cat=null;
  $title=$_POST['titleContentCat'];
  $intro=$_POST['text1'];
  $text=$_POST['longText'];



  // act
  if(isset($_POST['actContentCat']) && $_POST['actContentCat'] == 'on' ){
    $act=1;
  }else{
    $act=0;
  }

  $slug=slugify($title);

  /* Imagem */
  if(isset($_FILES['imgThumb']['name']) && $_FILES['imgThumb']['name']!=''){
    $destFolderImg='../../../../media/images/';
    $tempFileImg=explode('.',$_FILES['imgThumb']['name']);
    $extImg=$tempFileImg[count($tempFileImg)-1];
    $fileImg=clean($_POST['titleContentCat']).'-'.uniqid().'.'.$extImg;
    $finalFileImg=$destFolderImg.$fileImg;
    move_uploaded_file($_FILES['imgThumb']['tmp_name'], $finalFileImg);

    $contentCat[0]->setUrlImg($fileImg);
  }else{
    $fileImg='';
  }


  /* Se for new criamos um novo objeto */
  //$contentCat = new ContentCategory(null, $cat, $title, $slug, $intro, $text, $fileImg, $act, null, null);
  //print_r($contentCat);

  //Se for edit fazemos set ao objecto
  $contentCat[0]->setTitle($title);
  $contentCat[0]->setSlug($slug);
  $contentCat[0]->setIntro($intro);
  $contentCat[0]->setText($text);
  $contentCat[0]->setAct($act);

  if ($action=='new') {
    //$contentCat->save($pdo);
  }else if ($action=='edit'){
    $contentCat[0]->update($pdo,$id);
  }
?>
<script type="text/javascript">
  //document.location.href = BASE_URL_BACKOFFICE.'/home.php?area=contentcategory';
  window.location.href = <?php echo BASE_URL_BACKOFFICE.'/home.php?area=contentcategory'; ?>
</script>
