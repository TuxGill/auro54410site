<?php 
	include('../../config.php');

	$action = $_POST['action'];
	//print_r($_POST);
		
	$data['title_product']=$conn->real_escape_string(utf8_decode($_POST['nomeProd']));
	$data['intro_product']=$conn->real_escape_string(utf8_decode($_POST['introProd']));
	$data['desc_product']=$conn->real_escape_string(utf8_decode($_POST['descProd']));
	$data['order_product']=$conn->real_escape_string(utf8_decode($_POST['ordemProd']));

	$dataC['fk_id_product_category']=$_POST['category'];

	$dataR['fk_id_releasing']=RELEASE;

	if ($_POST['publish']=='on'){
		$data['act_product']=1;
	} else {
		$data['act_product']=0;
	}

	$id = $_POST['category'];
	$idC = getCategoryFromID($conn,$id);
	$idContPai= $idC->fetch_assoc();

	$slugPai = $idContPai['slug_product_category'];
	$nomeSlug=$conn->real_escape_string($_POST['nomeProd']);
	$slugFilho=format_uri($nomeSlug);

	$data['slug_product']=$slugPai."_".$slugFilho;

	//*****Logo Info Produto*****
	if(isset($_FILES['url_img_logo_simple_product_info']['tmp_name']) && $_FILES['url_img_logo_simple_product_info']['tmp_name'] !='') {

		$imgGUID=geraGUID($conn);
		$target_large = "../..".MEDIA_PRODUCTS_FOLDER;
		
		$nomeFileBD = basename($_FILES['url_img_logo_simple_product_info']['name']); 
		$ext=end(explode(".", $nomeFileBD));	
		$nomeFileBD=$imgGUID.".".$ext;
		$target_path = $target_large . $nomeFileBD; 
		
	
		if(move_uploaded_file($_FILES['url_img_logo_simple_product_info']['tmp_name'], $target_path)){
			$dataSimpleProduct['url_img_logo_simple_product_info']=$nomeFileBD ;
		}
	}

	//*****Imagem Produto Pequena*****
	if(isset($_FILES['imagemProd']['tmp_name']) && $_FILES['imagemProd']['tmp_name'] !='') {

		$imgGUID=geraGUID($conn);
		$target_large = "../..".MEDIA_PRODUCTS_FOLDER;
		
		$nomeFileBD = basename($_FILES['imagemProd']['name']); 
		$ext=end(explode(".", $nomeFileBD));	
		$nomeFileBD=$imgGUID.".".$ext;
		$target_path = $target_large . $nomeFileBD; 
		
	
		if(move_uploaded_file($_FILES['imagemProd']['tmp_name'], $target_path)){
			$data['img_thumb_product']=$nomeFileBD ;
		}
		//echo "img thumb: ".$data['img_thumb_product']=$nomeFileBD ."</br>";

	}

	//*****Imagem Produto*****
	if(isset($_FILES['imagemProdGrd']['tmp_name']) && $_FILES['imagemProdGrd']['tmp_name'] !='') {

		$imgGUID=geraGUID($conn);
		$target_large = "../..".MEDIA_PRODUCTS_FOLDER;
		
		$nomeFileBD = basename($_FILES['imagemProdGrd']['name']); 
		$ext=end(explode(".", $nomeFileBD));	
		$nomeFileBD=$imgGUID.".".$ext;
		$target_path = $target_large . $nomeFileBD; 
		
		if(move_uploaded_file($_FILES['imagemProdGrd']['tmp_name'], $target_path)){
			$dataSimpleProduct['url_img_simple_product_info']=$nomeFileBD ;
		}
	}



/* SUBMIT TO TABLE PRODUCTS - INSERT OR UPDATE VALUES */

	if ($_POST['action']=='new') {
		//Insere o produto e com esse id insere nas tabelas de relação categoria e realease
		$prod = insereEmTabela('products', $data, $conn);

		$dataC['fk_id_product'] = $prod;
		$dataR['fk_id_product'] = $prod;
		$dataS['fk_id_product'] = $prod;

		insereEmTabela('product_has_product_categories', $dataC, $conn);
		insereEmTabela('product_is_in_release', $dataR, $conn);

		$prodS = insereEmTabela('simple_product_info', $dataSimpleProduct, $conn);

		$dataS['fk_id_simple_product_info'] = $prodS;

		insereEmTabela('product_has_simple_product_info', $dataS, $conn);
		
		//Insere key - values no infoparameter
		for ($i=0; $i < count($_POST['key_info_parameter']); $i++) {

			if($_POST['key_info_parameter'][$i]!=''){

				$key_info_parameter = $conn->real_escape_string(utf8_decode($_POST['key_info_parameter'][$i]));
				$value_info_parameter = $conn->real_escape_string(utf8_decode($_POST['value_info_parameter'][$i]));
				$order_info_parameter = $conn->real_escape_string(utf8_decode($_POST['order_info_parameter'][$i]));
				
				if ($_POST['act_info_parameter']=='on'){
					$dataPI['act_info_parameter']=1;
				} else {
					$dataPI['act_info_parameter']=0;
				}
				
				$dataPI['key_info_parameter'] = $key_info_parameter;
				$dataPI['value_info_parameter'] = $value_info_parameter;
				$dataPI['order_info_parameter'] = $order_info_parameter;
			
				$pi = insereEmTabela('info_parameter', $dataPI, $conn);

				$dataPIP['fk_id_info_parameter'] = $pi;
				$dataPIP['fk_id_simple_product_info'] = $prodS;

				insereEmTabela('simple_product_info_has_info_parameter', $dataPIP, $conn);
				
			}
		}

		for ($i=0; $i < count($_POST['titlePdf']); $i++) {	
			
			if($_POST['titlePdf'][$i]!=''){			

				$title_product_pdf = $conn->real_escape_string(utf8_decode($_POST['titlePdf'][$i]));
				$desc_product_pdf = $conn->real_escape_string(utf8_decode($_POST['descPdf'][$i]));
				$order_product_pdf = $conn->real_escape_string(utf8_decode($_POST['orderPdf'][$i]));

				//*****PDF do Produto*****	

				if(isset($_FILES['urlPdfPdf']['tmp_name']) && $_FILES['urlPdfPdf']['tmp_name'] !='') {

					$imgGUID=geraGUID($conn);
					$target_large = "../..".MEDIA_PRODUCT_PDF_FOLDER;

					$nomeFileBD = basename($_FILES['urlPdfPdf']['name'][$i]); 
					$ext=end(explode(".", $nomeFileBD));	
					$nomeFileBD=$imgGUID.".".$ext;
					$target_path = $target_large . $nomeFileBD;
				
					if(move_uploaded_file($_FILES['urlPdfPdf']['tmp_name'][$i], $target_path)){
						$dataPPdf['url_product_pdf']=$nomeFileBD ;
					}

				}

				if ($_POST['actPdf'][$i]=='on'){
					$dataPPdf['act_product_pdf']=1;
				} else {
					$dataPPdf['act_product_pdf']=0;
				}

				$dataPPdf['title_product_pdf'] = $title_product_pdf;
				$dataPPdf['desc_product_pdf'] = $desc_product_pdf;
				$dataPPdf['order_product_pdf'] = $order_product_pdf;

				$pdf = insereEmTabela('product_pdf', $dataPPdf, $conn);

				$dataPHPdf['fk_id_product_pdf'] = $pdf;
				$dataPHPdf['fk_id_product'] = $prod;

				insereEmTabela('products_has_product_pdf', $dataPHPdf, $conn);
			}
		}

		header('Location: ' . $_SERVER['HTTP_REFERER']); 

	} else {

		$id = $_POST['id_item'];
		atualizaTabela('products', $data, 'id_product='.$id, $conn);

		$sql = "SELECT * FROM simple_product_info
				INNER JOIN product_has_simple_product_info
				ON id_simple_product_info = fk_id_simple_product_info
				WHERE fk_id_product = ".$id;
				
		$res=$conn->query($sql);
		$row = $res -> fetch_assoc();

		atualizaTabela('simple_product_info', $dataSimpleProduct, 'id_simple_product_info='.$row['id_simple_product_info'], $conn);

		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
	
	
 ?>