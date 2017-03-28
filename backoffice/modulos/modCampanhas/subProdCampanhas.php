<?php
	include('../../config.php');

	$action = $_POST['action'];
	$id_camp = $_POST['id_camp'];
	
	$data['n_reg_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['nRegisto']));
	$data['name_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['nomeMedic']));
	$data['dosage_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['dosagem']));
	$data['presentation_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['apresentacao']));
	$data['compart_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['comparticipacao']));
	$data['iva_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['iva']));
	$data['pvf_product_campaign']=$conn->real_escape_string(utf8_encode($_POST['pvf']));
	$data['pvp_product_campaign']=$conn->real_escape_string(utf8_encode($_POST['pvp']));
	$data['bonif1_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['bonif1']));
	$data['bonif2_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['bonif2']));
	$data['bonif3_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['bonif3']));
	$data['obs_product_campaign']=$conn->real_escape_string(utf8_decode($_POST['observ']));
		
	
	if ($_POST['publish']=='on'){
		$data['act_product_campaign']=1;
	} else {
		$data['act_product_campaign']=0;
	}

/* SUBMIT TO TABLE CONTENTS - INSERT OR UPDATE VALUES */

	if ($_POST['action']=='new'){
		$pc = insereEmTabela('products_campaing', $data, $conn);
		
		$dataPCC['fk_id_product_campaign'] = $pc;
		$dataPCC['fk_id_campaign'] = $id_camp;

		insereEmTabela('product_campaign_is_in_campaign', $dataPCC, $conn);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {

		$id = $_POST['id_item'];
		atualizaTabela('products_campaing', $data, 'id_product_campaign='.$id, $conn);

		//echo "id: ".$id;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	
?>
