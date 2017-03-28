<?php
	include('../../config.php');


	$action = $_POST['action'];
		
	$data['title_content']=$conn->real_escape_string(utf8_decode($_POST['nomeContent']));
	$data['intro_content']=$conn->real_escape_string(utf8_decode($_POST['introContent']));
	$data['full_content']=$conn->real_escape_string(utf8_decode($_POST['content']));
	$data['order_content']=$conn->real_escape_string(utf8_decode($_POST['ordemCont']));

	$dataR['fk_id_releasing']=RELEASE;

	//Atraves da Area saber qual o seu Id para inserir como FK
	$slg = $conn->real_escape_string(utf8_decode($_POST['slugCont']));
	$idS = getIdFromSlugContentCategories($conn,$slg);
	$idContPai= $idS->fetch_assoc();

	$dataHC['fk_id_content_category'] = $idContPai['id_content_category'];
	
	//Passar a slug
	$slugCategoriaPai=$idContPai['slug_content_category'];

	$nomeSlug=$conn->real_escape_string($_POST['nomeContent']);
	$slugCategoriaFilha=format_uri($nomeSlug);

	$data['slug_content']=$slugCategoriaPai."_".$slugCategoriaFilha;
	
	if ($_POST['publish']=='on'){
		$data['act_content']=1;
	} else {
		$data['act_content']=0;
	}

	//*****PDF Conteudo*****
	if( isset($_FILES['pdfCont']['tmp_name']) && $_FILES['pdfCont']['tmp_name'] !='') {

	$imgGUID=geraGUID($conn);
	$target_large = "../..".MEDIA_CONTENT_PDF_FOLDER;
	
	$nomeFileBD = basename($_FILES['pdfCont']['name']); 
	$ext=end(explode(".", $nomeFileBD));	
	$nomeFileBD=$imgGUID.".".$ext;
	$target_path = $target_large . $nomeFileBD; 
		
		if(move_uploaded_file($_FILES['pdfCont']['tmp_name'], $target_path)){
			$data['url_pdf_content']=$nomeFileBD;
		}

	}

	//******Imagem de Video Conteudo*****
	if(isset($_FILES['imagemCont']['tmp_name']) && $_FILES['imagemCont']['tmp_name'] !='') {

		$imgGUID=geraGUID($conn);
		$target_large = "../..".MEDIA_CONTENT_IMAGE_FOLDER;
		
		$nomeFileBD = basename($_FILES['imagemCont']['name']); 
		$ext=end(explode(".", $nomeFileBD));	
		$nomeFileBD=$imgGUID.".".$ext;
		$target_path = $target_large . $nomeFileBD; 
		
	
		if(move_uploaded_file($_FILES['imagemCont']['tmp_name'], $target_path)){
			$data['url_img_content']=$nomeFileBD ;
		}
	}

	//******Video Conteudo*****
	if( isset($_FILES['videoCont']['tmp_name']) && $_FILES['videoCont']['tmp_name'] !='') {

	$imgGUID=geraGUID($conn);
	$target_large = "../..".MEDIA_CONTENT_VIDEO_FOLDER;
	
	$nomeFileBD = basename($_FILES['videoCont']['name']); 
	$ext=end(explode(".", $nomeFileBD));	
	$nomeFileBD=$imgGUID.".".$ext;
	$target_path = $target_large . $nomeFileBD; 
	//echo $target_path ;
	
		if(move_uploaded_file($_FILES['videoCont']['tmp_name'], $target_path)){
			$data['url_video_content']=$nomeFileBD ;

		}
	
	}

/* SUBMIT TO TABLE CONTENTS - INSERT OR UPDATE VALUES */

	if ($_POST['action']=='new'){
		$cont = insereEmTabela('contents', $data, $conn);
		
		$dataHC['fk_id_content'] = $cont;
		$dataR['fk_id_content'] = $cont;

		insereEmTabela('contents_has_content_categories', $dataHC, $conn);
		insereEmTabela('content_is_in_release', $dataR, $conn);

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {

		$id = $_POST['id_item'];
		atualizaTabela('contents', $data, 'id_content='.$id, $conn);

		$dataHC['fk_id_content'] = $id;
		$dataR['fk_id_content'] = $id;

		//echo "xxx: ".$id;

		atualizaTabela('contents_has_content_categories', $dataHC, 'fk_id_content='.$id, $conn);
		atualizaTabela('content_is_in_release', $dataR, 'fk_id_content='.$id, $conn);

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	
?>
