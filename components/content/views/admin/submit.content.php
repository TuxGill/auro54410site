<?php
  include('../../../../config.php');

  //echo "OLA";
// Main
  $action=$_POST['action'];
  $id=$_POST['id_item'];

  //Var para devolver objecto quando estamos a editar
  $contentEdit = getContentByIdBO($pdo, $id);
  //print_r($contentEdit);

// Texts
  $cat=$_POST['id_cat'];
  $title=$_POST['titleContent'];
  $intro=$_POST['introContent'];
  $text=$_POST['textContent'];
  $link1=$_POST['link1'];


  $order=$_POST['orderContent'];
  // act
  if(isset($_POST['actContent']) && $_POST['actContent'] == 'on' ){
    $act=1;
  }else{
    $act=0;
  }

  $slug=slugify($title);

  /* Imagem */
  if(isset($_FILES['imageContent']['name']) && $_FILES['imageContent']['name']!=''){
    $destFolderImg='../../../../media/images/';
    $tempFileImg=explode('.',$_FILES['imageContent']['name']);
    $extImg=$tempFileImg[count($tempFileImg)-1];
    $fileImg=clean($_POST['titleContent']).'-'.uniqid().'.'.$extImg;
    $finalFileImg=$destFolderImg.$fileImg;
    move_uploaded_file($_FILES['imageContent']['tmp_name'], $finalFileImg);

    if ($action=='edit'){
      $contentEdit[0]->setUrlImg($fileImg);
    }
  }else{
    $fileImg='';
  }

  //Se for edit fazemos set ao objecto
  if ($action=='edit'){
    //print_r($contentEdit);
    $contentEdit[0]->setTitle($title);
    $contentEdit[0]->setSlug($slug);
    $contentEdit[0]->setIntro($intro);
    $contentEdit[0]->setText($text);
    $contentEdit[0]->setLink1($link1);
    $contentEdit[0]->setOrder($order);
    $contentEdit[0]->setAct($act);
  }
  //VERIFICAÇÃO SE NEW E FAZ SAVE OU SE É EDIT E FAZ UPDATE
  if ($action=='new') {
    $content = new Content(null, $cat, $title, $slug ,$intro, $text, $fileImg, null, null, $link1, null ,$order, $act, null, null);
    //print_r($content);
    $content->save($pdo);

  }else if ($action=='edit'){
    //print_r($contentEdit);
    $contentEdit[0]->update($pdo,$id);
  }

?>

<!-- Encaminha para a página do backoffice de novo conteudo  -->
<script type="text/javascript">
  window.location.href = "<?php echo BASE_URL_BACKOFFICE.'/home.php?area=newcontent&idCat='.$cat; ?>"
</script>
