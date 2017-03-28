<?php
	include('../../config.php'); 

	$action = $_POST['action'];
	$id_cat = $_POST['id_cat'];
	
	$data['name_decomed_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['nomeDecom']));
	$data['pvp_decomed_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['pvpDecom']));
	$data['utent_decomed_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['utentDecom']));
	$data['gain_pharm_decomed_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['gainFarmaDecom']));
	$data['compart_decomed_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['compartDecom']));
	$data['name_decomed_competition_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['nomeConc']));
	$data['pvp_decomed_competition_product_simulator']=$conn->real_escape_string(utf8_encode($_POST['pvpConc']));
	$data['utent_decomed_competition_product_simulator']=$conn->real_escape_string(utf8_encode($_POST['utentConc']));
	$data['gain_pharm_decomed_competition_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['gainFarmaConc']));
	$data['compart_decomed_competition_product_simulator']=$conn->real_escape_string(utf8_decode($_POST['compartConc']));
	$data['percent_cost_patient']=$conn->real_escape_string(utf8_decode($_POST['percCusto']));
	$data['percent_margin_pharm']=$conn->real_escape_string(utf8_decode($_POST['percFarm']));
		
	
	if ($_POST['publish']=='on'){
		$data['act_product_simulator']=1;
	} else {
		$data['act_product_simulator']=0;
	}

/* SUBMIT TO TABLE CONTENTS - INSERT OR UPDATE VALUES */

	if ($_POST['action']=='new'){
		$sim = insereEmTabela('products_simulator', $data, $conn);
		
		$dataPSC['fk_id_product_simulator'] = $sim;
		$dataPSC['fk_id_product_category'] = $id_cat;

		$dataSR['fk_id_product_simulator'] = $sim;
		$dataSR['fk_id_releasing'] = RELEASE;

		insereEmTabela('products_simulator_has_product_categories', $dataPSC, $conn);
		insereEmTabela('products_simulator_is_in_release', $dataSR, $conn);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {

		$id = $_POST['id_item'];
		atualizaTabela('products_simulator', $data, 'id_product_simulator='.$id, $conn);

		//echo "id: ".$id;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>