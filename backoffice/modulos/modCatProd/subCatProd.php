<?php
	include('../../config.php');


	$action = $_POST['action'];
		
	$data['title_product_category']=$conn->real_escape_string(utf8_decode($_POST['nomeCat']));
	$data['desc_product_category']=$conn->real_escape_string(utf8_decode($_POST['desCat']));
	$data['order_product_category']=$conn->real_escape_string(utf8_decode($_POST['ordemCat']));

	//Atraves da Area saber qual o seu Id para inserir como FK
	$slg = $conn->real_escape_string(utf8_decode($_POST['slugCat']));
	$idS = getIdFromSlugProductCategories($conn, $slg);
	$idCatPai= $idS->fetch_assoc();

	$data['fk_id_product_category'] = $idCatPai['id_product_category'];
	
	
	//Passar a slug
	$slugCategoriaPai=$idCatPai['slug_product_category'];

	$nomeSlug=$conn->real_escape_string($_POST['nomeCat']);
	$slugCategoriaFilha=format_uri($nomeSlug);

	$data['slug_product_category']=$slugCategoriaPai."_".$slugCategoriaFilha;
	
	if ($_POST['publish']=='on'){
		$data['act_product_category']=1;
	} else {
		$data['act_product_category']=0;
	}



/* SUBMIT TO TABLE - INSERT OR UPDATE VALUES */

	if ($_POST['action']=='new'){
		insereEmTabela('product_categories', $data, $conn);
		header('Location: ' . $_SERVER['HTTP_REFERER']);


	} else {
		$id = $_POST['id'];
		atualizaTabela('product_categories', $data, 'id_product_category='.$id, $conn);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}


?>
