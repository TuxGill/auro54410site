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

	//*****Imagem Produto Grande*****
	if(isset($_FILES['imagemProdGrd']['tmp_name']) && $_FILES['imagemProdGrd']['tmp_name'] !='') {

		$imgGUID=geraGUID($conn);
		$target_large = "../..".MEDIA_PRODUCTS_FOLDER;
		
		$nomeFileBD = basename($_FILES['imagemProdGrd']['name']); 
		$ext=end(explode(".", $nomeFileBD));	
		$nomeFileBD=$imgGUID.".".$ext;
		$target_path = $target_large . $nomeFileBD; 
		
		
		if(move_uploaded_file($_FILES['imagemProdGrd']['tmp_name'], $target_path)){
			$data['img_full_product']=$nomeFileBD ;
		}
		//echo "img: ".$data['img_full_product']=$nomeFileBD."</br>";

	}



/* SUBMIT TO TABLE PRODUCTS - INSERT OR UPDATE VALUES */

	if ($_POST['action']=='new') {
		$prod = insereEmTabela('products', $data, $conn);

		$dataC['fk_id_product'] = $prod;
		$dataR['fk_id_product'] = $prod;
		
		insereEmTabela('product_has_product_categories', $dataC, $conn);
		insereEmTabela('product_is_in_release', $dataR, $conn);
		
		if (isset($_POST['medal'])) {
			for ($i=0; $i < count($_POST['medal']); $i++) { 
				$dataM['fk_id_product'] = $prod;
				$dataM['fk_id_medal']=$_POST['medal'][$i];
				insereEmTabela('product_has_medals', $dataM, $conn);
			}
		}

		for ($i=0; $i < count($_POST['titlePagina']); $i++) {

			if($_POST['titlePagina'][$i]!=''){

				$title_product_page = $conn->real_escape_string(utf8_decode($_POST['titlePagina'][$i]));
				$intro_product_page = $conn->real_escape_string(utf8_decode($_POST['introPagina'][$i]));
				$full_product_page = $conn->real_escape_string(utf8_decode($_POST['fullPagina'][$i]));
				$order_product_page = $conn->real_escape_string(utf8_decode($_POST['orderPagina'][$i]));

				$nomeSlug=$conn->real_escape_string($_POST['titlePagina'][$i]);
				$slug=format_uri($nomeSlug);	

				//*****Imagem Página do Produto*****	

				if(isset($_FILES['urlImgPagina']['tmp_name']) && $_FILES['urlImgPagina']['tmp_name'] !='') {

					$imgGUID=geraGUID($conn);
					$target_large = "../..".MEDIA_PRODUCT_PAGES_FOLDER;

					$nomeFileBD = basename($_FILES['urlImgPagina']['name'][$i]); 
					$ext=end(explode(".", $nomeFileBD));	
					$nomeFileBD=$imgGUID.".".$ext;
					$target_path = $target_large . $nomeFileBD;
				
					if(move_uploaded_file($_FILES['urlImgPagina']['tmp_name'][$i], $target_path)){
						$dataPP['url_img_product_page']=$nomeFileBD ;
					}
				}

				//*****Imagem Background Página do Produto*****	

				if(isset($_FILES['urlImgBgPagina']['tmp_name']) && $_FILES['urlImgBgPagina']['tmp_name'] !='') {

					$imgGUID=geraGUID($conn);
					$target_large = "../..".MEDIA_PRODUCT_PAGES_FOLDER;

					$nomeFileBD = basename($_FILES['urlImgBgPagina']['name'][$i]); 
					$ext=end(explode(".", $nomeFileBD));	
					$nomeFileBD=$imgGUID.".".$ext;
					$target_path = $target_large . $nomeFileBD;
				
					if(move_uploaded_file($_FILES['urlImgBgPagina']['tmp_name'][$i], $target_path)){
						$dataPP['url_img_bg_product_page']=$nomeFileBD ;
					}
				}

				if ($_POST['actPage'][$i]=='on'){
					$dataPPdf['act_product_page'][$i]=1;
				} else {
					$dataPPdf['act_product_page']=0;
				}

				$dataPP['title_product_page'] = $title_product_page;
				$dataPP['slug_product_page'] = $slug;
				$dataPP['intro_product_page'] = $intro_product_page;
				$dataPP['full_product_page'] = $full_product_page;
				$dataPP['order_product_page'] = $order_product_page;
			
				$pp = insereEmTabela('product_pages', $dataPP, $conn);

				$dataPHP['fk_id_product_page'] = $pp;
				$dataPHP['fk_id_product'] = $prod;

				insereEmTabela('products_has_product_page', $dataPHP, $conn);
				
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
					$dataPPdf['act_product_pdf'][$i]=1;
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

		if (isset($_POST['medal'])) {
			
			delProductMedal($conn, $id);

			for ($i=0; $i < count($_POST['medal']); $i++) { 

				$dataM['fk_id_product'] = $id;
				$dataM['fk_id_medal']=$_POST['medal'][$i];

				insereEmTabela('product_has_medals', $dataM, $conn);
			} 
		} elseif (!isset($_POST['medal'])) {
			delProductMedal($conn, $id);
		}		

		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
	
	
 ?>