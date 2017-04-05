<?php
  include('../../../../config.php');

  echo "OLA";

// Main
  $action=$_POST['action'];
  $id=$_POST['id_item'];

// Texts
  $cat=$_POST['categoryContent'];
  $title=$_POST['titleContent'];
  $intro=$_POST['introContent'];
  $text=$_POST['textContent'];


  $order=$_POST['orderContent'];
  // act
  if(isset($_POST['actContent']) && $_POST['actContent'] == 'on' ){
    $act=1;
  }else{
    $act=0;
  }


  $slug=slugify($title);

  /* Imagem */
  $destFolderImg='../../../../media/images/';
  $tempFileImg=explode('.',$_FILES['imageContent']['name']);
  $extImg=$tempFileImg[count($tempFileImg)-1];
  $fileImg=clean($_POST['titleContent']).'-'.uniqid().'.'.$extImg;
  $finalFileImg=$destFolderImg.$fileImg;
  move_uploaded_file($_FILES['imageContent']['tmp_name'], $finalFileImg);


  // /* CRIAR OBJECTO*/

  $content = new Content(null, $cat, $title, $slug ,$intro, $text, $fileImg, null ,$order, $act, null, null);

  //print_r($content);
  $content->save($pdo);

?>


<!-- Encaminha para a página do backoffice de novo conteudo  -->
<script type="text/javascript">
  window.location.href = "<?php echo BASE_URL_BACKOFFICE.'/home.php?area=newcontent'; ?>"
</script>
