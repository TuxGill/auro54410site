<?php
	include('../../config.php');

	$action = $_POST['action'];
	
	$data['name_medal']=$conn->real_escape_string(utf8_decode($_POST['nomeMedalha']));
	$data['desc_medal']=$conn->real_escape_string(utf8_decode($_POST['descMedalha']));
	
	//******Imagem de Video Conteudo*****
	if(isset($_FILES['imgMedal']['tmp_name']) && $_FILES['imgMedal']['tmp_name'] !='') {

		$imgGUID=geraGUID($conn);
		$target_large = "../..".MEDIA_MEDAL_IMAGE_FOLDER;
		
		$nomeFileBD = basename($_FILES['imgMedal']['name']); 
		$ext=end(explode(".", $nomeFileBD));	
		$nomeFileBD=$imgGUID.".".$ext;
		$target_path = $target_large . $nomeFileBD; 
		
	
		if(move_uploaded_file($_FILES['imgMedal']['tmp_name'], $target_path)){
			$data['url_img_medal']=$nomeFileBD ;
		}
	}	
	
	//*****PDF *****
	if( isset($_FILES['pdfMedal']['tmp_name']) && $_FILES['pdfMedal']['tmp_name'] !='') {

	$imgGUID=geraGUID($conn);
	$target_large = "../..".MEDIA_MEDAL_PDF_FOLDER;
	
	$nomeFileBD = basename($_FILES['pdfMedal']['name']); 
	$ext=end(explode(".", $nomeFileBD));	
	$nomeFileBD=$imgGUID.".".$ext;
	$target_path = $target_large . $nomeFileBD; 
		
		if(move_uploaded_file($_FILES['pdfMedal']['tmp_name'], $target_path)){
			$data['url_pdf_medal']=$nomeFileBD;
		}

	}

	if ($_POST['publish']=='on'){
		$data['act_medal']=1;
	} else {
		$data['act_product_campaign']=0;
	}


	
/* SUBMIT TO TABLE CONTENTS - INSERT OR UPDATE VALUES */

	if ($_POST['action']=='new'){

		insereEmTabela('medals', $data, $conn);
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	} else {

		$id = $_POST['id_item'];
		atualizaTabela('medals', $data, 'id_medal='.$id, $conn);

		//echo "id: ".$id;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	
?>
