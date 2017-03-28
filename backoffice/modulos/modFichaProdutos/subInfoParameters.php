<?php 
	include('../../config.php');


	$action = $_POST['action'];

		$key_info_parameter = $conn->real_escape_string(utf8_decode($_POST['key_info_parameter']));
		$value_info_parameter = $conn->real_escape_string(utf8_decode($_POST['value_info_parameter']));
		$order_info_parameter = $conn->real_escape_string(utf8_decode($_POST['order_info_parameter']));

		if ($_POST['act_info_parameter']=='on'){
			$dataPI['act_info_parameter']=1;
		} else {
			$dataPI['act_info_parameter']=0;
		}

		$dataPI['key_info_parameter'] = $key_info_parameter;
		$dataPI['value_info_parameter'] = $value_info_parameter;
		$dataPI['order_info_parameter'] = $order_info_parameter;


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
	if (isset($_POST['key_info_parameter'])) {
		if (isset($_POST['id_info_parameter'])) {

			$idP = $_POST['id_info_parameter'];
			atualizaTabela('info_parameter', $dataPI, 'id_info_parameter='.$idP, $conn);

		} else {
			
			$pi = insereEmTabela('info_parameter', $dataPI, $conn);
			$pIP = $_POST['id_info_simp'];

			$dataPIP['fk_id_info_parameter'] = $pi;
			$dataPIP['fk_id_simple_product_info'] = $pIP;

			insereEmTabela('simple_product_info_has_info_parameter', $dataPIP, $conn);
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