<?php
	include('../../config.php');


	$action = $_POST['action'];
		
	$data['name_dim_agent']=$conn->real_escape_string(utf8_decode($_POST['nomeUtilizador']));
	$data['login_dim_agent']=$conn->real_escape_string(utf8_decode($_POST['loginUtilizador']));
	$data['pass_dim_agent']=$conn->real_escape_string(utf8_decode($_POST['passUtilizador']));

	if ($_POST['publish']=='on'){
		$data['act_agente_comercial']=1;
	} else {
		$data['act_agente_comercial']=0;
	}
	


	if ($_POST['action']=='new'){

		$sql="insert into dim_agents(
				name_dim_agent,
				login_dim_agent, 
				pass_dim_agent) 
			values(
				'".$data['name_dim_agent']."',
				'".$data['login_dim_agent']."', 
				'".$data['pass_dim_agent']."')";
		
		$res=$conn->query($sql);

		header('Location: ' . $_SERVER['HTTP_REFERER']);

	} else {
		$id = $_POST['id'];
		if(empty($data['pass_dim_agent'])){

			$sql="update dim_agents
				set name_dim_agent ='".$data['name_dim_agent']."',
					login_dim_agent = '".$data['login_dim_agent']."', 
				 where id_agente_comercial = ".$id;
			
			//die($sql);
			$res=$conn->query($sql);

			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}else{
			$sql="update dim_agents
				set name_dim_agent ='".$data['name_dim_agent']."',
					login_dim_agent = '".$data['login_dim_agent']."', 
					pass_dim_agent='".$data['pass_dim_agent']."',
				 where id_agente_comercial = ".$id;
			//echo "tenho pass".$sql;
			
			$res=$conn->query($sql);

			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

	}

?>
