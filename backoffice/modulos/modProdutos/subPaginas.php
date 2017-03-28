<?php 
	include('../../config.php');

	$action = $_POST['action'];


	if(isset($_POST['titlePagina'])){

		$title_product_page = $conn->real_escape_string(utf8_decode($_POST['titlePagina']));
		$intro_product_page = $conn->real_escape_string(utf8_decode($_POST['introPagina']));
		$full_product_page = $conn->real_escape_string(utf8_decode($_POST['fullPagina']));
		$order_product_page = $conn->real_escape_string(utf8_decode($_POST['orderPagina']));

		$dataPP['title_product_page'] = $title_product_page;
		$dataPP['intro_product_page'] = $intro_product_page;
		$dataPP['full_product_page'] = $full_product_page;
		$dataPP['order_product_page'] = $order_product_page;

		if ($_POST['publish']=='on'){
			$dataPP['act_product_page']=1;
		} else {
			$dataPP['act_product_page']=0;
		}

		$nomeSlug=$conn->real_escape_string($_POST['titlePagina']);
		$slug=format_uri($nomeSlug);
		$dataPP['slug_product_page'] = $slug;
		

		//*****Imagem Página do Produto*****	

		if(isset($_FILES['urlImgPagina']['tmp_name']) && $_FILES['urlImgPagina']['tmp_name'] !='') {

			$imgGUID=geraGUID($conn);
			$target_large = "../..".MEDIA_PRODUCT_PAGES_FOLDER;

			$nomeFileBD = basename($_FILES['urlImgPagina']['name']); 
			$ext=end(explode(".", $nomeFileBD));	
			$nomeFileBD=$imgGUID.".".$ext;
			$target_path = $target_large . $nomeFileBD;
		
			if(move_uploaded_file($_FILES['urlImgPagina']['tmp_name'], $target_path)){
				$dataPP['url_img_product_page']=$nomeFileBD ;
			}
		}

		//*****Imagem Background Página do Produto*****	

		if(isset($_FILES['urlImgBgPagina']['tmp_name']) && $_FILES['urlImgBgPagina']['tmp_name'] !='') {

			$imgGUID=geraGUID($conn);
			$target_large = "../..".MEDIA_PRODUCT_PAGES_FOLDER;

			$nomeFileBD = basename($_FILES['urlImgBgPagina']['name']); 
			$ext=end(explode(".", $nomeFileBD));	
			$nomeFileBD=$imgGUID.".".$ext;
			$target_path = $target_large . $nomeFileBD;
		
			if(move_uploaded_file($_FILES['urlImgBgPagina']['tmp_name'], $target_path)){
				$dataPP['url_img_bg_product_page']=$nomeFileBD ;
			}
		}
			
		
	}

	if(isset($_POST['titlePdf'])){

		$title_product_pdf = $conn->real_escape_string(utf8_decode($_POST['titlePdf']));
		$desc_product_pdf = $conn->real_escape_string(utf8_decode($_POST['descPdf']));
		$order_product_pdf = $conn->real_escape_string(utf8_decode($_POST['orderPdf']));

		$dataPPdf['title_product_pdf'] = $title_product_pdf;
		$dataPPdf['desc_product_pdf'] = $desc_product_pdf;
		$dataPPdf['order_product_pdf'] = $order_product_pdf;

		if ($_POST['publish']=='on'){
			$dataPPdf['act_product_pdf']=1;
		} else {
			$dataPPdf['act_product_pdf']=0;
		}

		//*****PDF do Produto*****	

		if(isset($_FILES['urlPdfPdf']['tmp_name']) && $_FILES['urlPdfPdf']['tmp_name'] !='') {

			$imgGUID=geraGUID($conn);
			$target_large = "../..".MEDIA_PRODUCT_PDF_FOLDER;

			$nomeFileBD = basename($_FILES['urlPdfPdf']['name']); 
			$ext=end(explode(".", $nomeFileBD));	
			$nomeFileBD=$imgGUID.".".$ext;
			$target_path = $target_large . $nomeFileBD;
		
			if(move_uploaded_file($_FILES['urlPdfPdf']['tmp_name'], $target_path)){
				$dataPPdf['url_product_pdf']=$nomeFileBD ;
			}

		}
		
	}

	

/* SUBMIT TO TABLE - INSERT OR UPDATE VALUES */

	//UPDATE TO TABLE PRODUCT_PAGES AND PRODUCTS_HAS_PRODUCT_PAGE
	if (isset($_POST['titlePagina'])) {

		if (isset($_POST['id_product_page'])) {

			$idP = $_POST['id_product_page'];
			atualizaTabela('product_pages', $dataPP, 'id_product_page='.$idP, $conn);

		} else {
			
			$pp = insereEmTabela('product_pages', $dataPP, $conn);
			$pId = $_POST['id_page'];

			$dataPHP['fk_id_product_page'] = $pp;
			$dataPHP['fk_id_product'] = $pId ;

			insereEmTabela('products_has_product_page', $dataPHP, $conn); 
		}

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	//UPDATE TO TABLE PRODUCT_PDF AND PRODUCTS_HAS_PRODUCT_PDF
	if(isset($_POST['titlePdf'])){

		if(isset($_POST['id_product_pdf'])){

			$idPdf = $_POST['id_product_pdf'];

			//echo "id: ".$idPdf;
			atualizaTabela('product_pdf', $dataPPdf, 'id_product_pdf='.$idPdf, $conn);

		} else {

			$pdf = insereEmTabela('product_pdf', $dataPPdf, $conn);
			$pId = $_POST['id_page'];

			$dataPHPdf['fk_id_product_pdf'] = $pdf;
			$dataPHPdf['fk_id_product'] = $pId;

			insereEmTabela('products_has_product_pdf', $dataPHPdf, $conn);
		}

		header('Location: ' . $_SERVER['HTTP_REFERER']);

	} 

	
 ?>





















