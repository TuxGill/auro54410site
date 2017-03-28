<?php 
	include('../../config.php');

	$action = $_POST['action'];

	$data['name_campaign']=$conn->real_escape_string(utf8_decode($_POST['nomeCampanha']));
	$data['condicoes_campaign']=$conn->real_escape_string(utf8_decode($_POST['condCampanha']));
	$data['stock_fact_campaign']=$conn->real_escape_string(utf8_decode($_POST['stockCampanha']));
	$data['enc_min_campaign']=$conn->real_escape_string(utf8_decode($_POST['encomendaCampanha']));

	$id = $_POST['id_camp'];
	atualizaTabela('campaigns', $data, 'id_campaign='.$id, $conn);

	header('Location: ' . $_SERVER['HTTP_REFERER']);

 ?>