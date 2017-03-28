<?php

/* ==========================================================================
   SPLASH PAGE
   -------------------------------------
   Last Products and Contents Updated or Inserted
   ========================================================================== */

	function getLastChangedPrd($conn){
		$sql="select * from products where del_product=0 
				order by date(entry_product) DESC
				limit 5";
		$res=$conn->query($sql);
		return $res;
	}


	function getLastChangedPag($conn){
		$sql="select * from contents where del_content=0
				order by date(entry_content) DESC
				limit 5";
		$res=$conn->query($sql);
		return $res;
	}


/* ==========================================================================
   PRODUCT CATEGORY PAGE
   -------------------------------------
   GET SLUG OR ID FROM PRODUCT CATEGORIES
   ========================================================================== */

	function getIdFromSlugProductCategories($conn,$slug){

		$sql="SELECT id_product_category, 
				title_product_category, 
				fk_id_product_category,
				slug_product_category
				FROM product_categories 
				WHERE slug_product_category='".$slug."'";


		$res=$conn->query($sql);

		return $res;
	}

	function getSlugFromIdProductCategories($conn,$id){

		$sql="select slug_product_category, title_product_category from product_categories 
		where id_product_category='".$id."'";

		$res=$conn->query($sql);

		return $res;
	}



/* ==========================================================================
    PRODUCT CATEGORY PAGE
   -------------------------------------
   	QUERIES TO GET INFO FROM CATEGORIES
   ========================================================================== */
	function getDetailProductCategories($conn, $id){
		$sql="select * from product_categories where id_product_category=".$id;
		$res=$conn->query($sql);
		return $res;
	}

	function getAllCategories($conn, $id){
		$sql="SELECT * FROM product_categories
				WHERE fk_id_product_category=".$id.
				" ORDER BY order_product_category";
		$res=$conn->query($sql);
		return $res;
	}

/* ==========================================================================
   PRODUCT PAGE
   -------------------------------------
   GET SLUG OR ID FROM PRODUCT
   ========================================================================== */

	function getIdFromSlugProduct($conn,$slug){

		$sql="SELECT id_product, 
				title_product, 
				fk_id_product,
				slug_product
				FROM product
				WHERE slug_product='".$slug."'";


		$res=$conn->query($sql);

		return $res;
	}

	function getSlugFromIdProduct($conn,$id){

		$sql="SELECT slug_product,
				 title_product 
				 FROM product 
				 WHERE id_product='".$id."'";

		$res=$conn->query($sql);

		return $res;
	}

	function getSlugFromFkidProductCategories($conn,$id){

		$sql="select slug_product_category, title_product_category from product_categories 
		where fk_id_product_category='".$id."'";

		$res=$conn->query($sql);

		return $res;
	}


/* ==========================================================================
    PRODUCT PAGE
   -------------------------------------
   	QUERIES TO GET INFO FROM PRODUCT
   ========================================================================== */

   	function getCategories($conn){
   		$sql="SELECT * FROM product_categories 
   				WHERE del_product_category=0
   				AND fk_id_product_category!=0";

   		$res=$conn->query($sql);
   		return $res;
   	}

   	function getCategoriesChildren($conn, $id){
   		$sql="SELECT * FROM product_categories 
				WHERE id_product_category ='".$id."'
				AND del_product_category=0";
				//echo $sql;
		$res=$conn->query($sql);
   		return $res;
   	}

   	function getCategoryFromID($conn,$id){
		$sql="SELECT * FROM product_categories 
				WHERE id_product_category=".$id."
				AND del_product_category=0";
				//echo $sql;

		$res=$conn->query($sql);

		return $res;
	}

	function getAllProducts($conn){
		$sql="SELECT * FROM products 
				INNER JOIN product_has_product_categories
				ON id_product = fk_id_product
				WHERE del_product=0";
		$res=$conn->query($sql);
		return $res;
	}

	function getDetailProducts($conn, $id){
		$sql="SELECT * FROM products 
				INNER JOIN product_has_product_categories
				ON id_product = fk_id_product
				WHERE id_product=".$id;
		$res=$conn->query($sql);
		return $res;
	}

	function getProductPage($conn, $id){
		$sql="SELECT * FROM products_has_product_page
				INNER JOIN product_pages
				ON fk_id_product_page = id_product_page
				WHERE del_product_page=0
				AND fk_id_product=".$id;
		$res=$conn->query($sql);
		return $res;
	}

	function getProductPdf($conn, $id){
		
		$sql="SELECT * FROM products_has_product_pdf
				INNER JOIN product_pdf
				ON fk_id_product_pdf = id_product_pdf
				WHERE del_product_pdf=0
				AND fk_id_product=".$id;
		$res=$conn->query($sql);
		return $res;
	}


/* ==========================================================================
    PRODUCT PAGE INFO
   -------------------------------------
   	QUERIES TO GET INFO FROM PRODUCT
   ========================================================================== */

    function getCategoriesF($conn){
   		$sql="SELECT * FROM product_categories 
   				WHERE del_product_category=0
   				AND fk_id_product_category=13
   				AND fk_id_product_category!=0";

   		$res=$conn->query($sql);
   		return $res;
   	}

   	function getCategoriesPE($conn){
   		$sql="SELECT * FROM product_categories 
   				WHERE del_product_category=0
   				AND fk_id_product_category=9
   				AND fk_id_product_category!=0";

   		$res=$conn->query($sql);
   		return $res;
   	}

   	function getAllProductsF($conn, $id){
		/*$sql="SELECT * FROM products 
				INNER JOIN product_has_simple_product_info
				ON id_product = product_has_simple_product_info.fk_id_product
				INNER JOIN product_has_product_categories
				ON id_product = product_has_product_categories.fk_id_product
				WHERE del_product=0"; */

		$sql="SELECT * FROM products 
				INNER JOIN product_has_simple_product_info
				ON id_product = product_has_simple_product_info.fk_id_product
				INNER JOIN product_has_product_categories
				ON id_product = product_has_product_categories.fk_id_product
                inner join product_categories on id_product_category = product_has_product_categories.fk_id_product_category
				WHERE del_product=0 and slug_product_category Like 'farma_decomedfarma%'";
		
		$res=$conn->query($sql);
		return $res;
	}

	function getAllProductsPE($conn){

		$sql="SELECT * FROM products 
				INNER JOIN product_has_simple_product_info
				ON id_product = product_has_simple_product_info.fk_id_product
				INNER JOIN product_has_product_categories
				ON id_product = product_has_product_categories.fk_id_product
                inner join product_categories on id_product_category = product_has_product_categories.fk_id_product_category
				WHERE del_product=0 and slug_product_category Like 'decomed_produtoseticos%'";
				
		$res=$conn->query($sql);
		return $res;
	}

	function getDetailProductsF($conn, $id){
		$sql="SELECT * FROM products 
				INNER JOIN product_has_simple_product_info
				ON id_product = product_has_simple_product_info.fk_id_product
				INNER JOIN product_has_product_categories
				ON id_product = product_has_product_categories.fk_id_product
				INNER JOIN simple_product_info
				ON id_simple_product_info = fk_id_simple_product_info
				WHERE id_product=".$id;
		$res=$conn->query($sql);
		return $res;
	}

/* ==========================================================================
    PRODUCT INFO PARAMETER
   -------------------------------------
   	QUERIES TO GET INFO FROM INFO PARAMETER
   ========================================================================== */

   function getInfoParameter($conn, $id){


   		$sql ="SELECT * FROM info_parameter
				INNER JOIN simple_product_info_has_info_parameter
				ON id_info_parameter = fk_id_info_parameter
				INNER JOIN simple_product_info
				ON id_simple_product_info = simple_product_info_has_info_parameter.fk_id_simple_product_info
				INNER JOIN product_has_simple_product_info
				ON id_simple_product_info  = product_has_simple_product_info.fk_id_simple_product_info
				WHERE product_has_simple_product_info.fk_id_product =".$id;


		$res=$conn->query($sql);
		return $res;

   }

/* ==========================================================================
   CONTENT PAGE
   -------------------------------------
   GET SLUG OR ID FROM CONTENT AND CONTENT CATEGORIES
   ========================================================================== */

   function getIdFromSlugContentCategories($conn,$slug){

		$sql="SELECT id_content_category, 
				title_content_category,
				slug_content_category
				FROM content_categories
				WHERE slug_content_category='".$slug."'";


		$res=$conn->query($sql);

		return $res;
	}



	function getIdFromSlugContent($conn,$slug){

		$sql="SELECT id_content, 
				title_content,
				slug_content
				FROM contents 
				WHERE slug_content='".$slug."'";


		$res=$conn->query($sql);

		return $res;
	}

	function getSlugFromIdContentCategories($conn,$id){

		$sql="select slug_content_category, title_content_category from content_categories
		where id_content_category='".$id."'";

		$res=$conn->query($sql);

		return $res;
	}

	function getSlugFromIdContent($conn,$id){

		$sql="select slug_content, title_content from contents
		where id_content='".$id."'";

		$res=$conn->query($sql);

		return $res;
	}

/* ==========================================================================
    CONTENT PAGE
   -------------------------------------
   	QUERIES TO GET INFO FROM CONTENT
   ========================================================================== */
	
	function getAllContents($conn, $id){
		$sql="SELECT * FROM contents 
				INNER JOIN contents_has_content_categories
        		ON id_content = fk_id_content
        		WHERE del_content=0
				AND fk_id_content_category=".$id;
		$res=$conn->query($sql);
		return $res;
	}

	function getDetailContents($conn, $id){
		$sql="SELECT * FROM contents 
				WHERE id_content=".$id;
		$res=$conn->query($sql);
		return $res;
	}


/* ==========================================================================
    CAMPAIGNS
   -------------------------------------
   	QUERIES TO GET INFO FROM CONTENT
   ========================================================================== */

   	function getIdFromSlugCampaign($conn,$slug){
   		$sql="SELECT * FROM campaigns 
				WHERE slug_campaing='".$slug."'";
		$res=$conn->query($sql);

		return $res;
  	}


/* ==========================================================================
    PRODUCTS CAMPAIGN
   -------------------------------------
   	QUERIES TO GET INFO FROM CONTENT
   ========================================================================== */

   function getDetailProductCampagn($conn,$id){
   		$sql="SELECT * FROM products_campaing 
				WHERE id_product_campaign=".$id;
		$res=$conn->query($sql);
		return $res;
   }

   function getAllProductCampagn($conn, $id){
		$sql="SELECT * FROM products_campaing 
				INNER JOIN product_campaign_is_in_campaign
        		ON id_product_campaign = fk_id_product_campaign
        		WHERE del_product_campaign=0
				AND fk_id_campaign=".$id;
		$res=$conn->query($sql);
		return $res;
	}


/* ==========================================================================
    SIMULADOR
   -------------------------------------
   	QUERIES TO GET INFO FROM CONTENT
   ========================================================================== */

   function getIdFromSlugSimulator($conn,$slug){
   		$sql="SELECT * FROM product_categories 
				WHERE slug_product_category='".$slug."'";
		$res=$conn->query($sql);

		return $res;
  	}

   function getDetailProductSimulator($conn,$id){
   		$sql="SELECT * FROM products_simulator 
				WHERE id_product_simulator=".$id;
		$res=$conn->query($sql);
		return $res;
   }   
   
   function getAllProductSimulator($conn, $id){
		$sql="SELECT * FROM products_simulator 
				INNER JOIN products_simulator_has_product_categories
        		ON id_product_simulator = fk_id_product_simulator
        		WHERE del_product_simulator=0
				AND fk_id_product_category=".$id;
		$res=$conn->query($sql);
		return $res;
	}


/* ==========================================================================
    MEDALHAS
   -------------------------------------
   	QUERIES TO GET INFO FROM CONTENT
   ========================================================================== */

   function getAllMedals($conn){
   		$sql="SELECT * FROM medals 
				WHERE del_medal=0";
		$res=$conn->query($sql);
		return $res;
   }   
   
  	function getDetailMedal($conn,$id){
   		$sql="SELECT * FROM medals 
				WHERE id_medal=".$id;
		$res=$conn->query($sql);
		return $res;
   }


   function getProductMedal($conn,$id){
   		$sql="SELECT * FROM product_has_medals
				WHERE fk_id_product =".$id;
		$res=$conn->query($sql);
		return $res;
   }


   function checkProductMedal($conn, $idP, $idM){

   		$sql="SELECT * FROM product_has_medals
				WHERE fk_id_product =".$idP." and fk_id_medal=".$idM;
		$res=$conn->query($sql);
		//echo $sql;
		//echo "<br/>";
		return $res;

   }

   function delProductMedal($conn, $idP){
   		$sql="DELETE FROM product_has_medals
				WHERE fk_id_product = ".$idP;
				//echo $sql;

		$res=$conn->query($sql);
		return $res;

   }






/* ==========================================================================
    DIM
   -------------------------------------
   	QUERIES TO GET INFO FROM DIM_AGENTS
   ========================================================================== */

function getDetailDim($conn, $id){
		$sql="select * from dim_agents where id_dim_agent=".$id;
		$res=$conn->query($sql);
		return $res;
	}


function getAllDim($conn){
		$sql="select * from dim_agents
				where del_dim_agent= 0";
		$res=$conn->query($sql);
		return $res;
	}





/* ==========================================================================
    TEMPOS DIM
   -------------------------------------
   	QUERIES TO GET INFO FROM DIM_AGENTS_SHOWS_PRODUCTS / DIM_AGENTS_SHOWS_CONTENTS
   ========================================================================== */


function getInicialDate($conn){
		$sql="SELECT * FROM dim_agent_shows_content
		group by date(indate_dim_agent_shows_content)";

		$res=$conn->query($sql);
		return $res;
	}


function getFinalDate($conn){
		$sql="SELECT * FROM dim_agent_shows_content
		group by date(outdate_dim_agent_shows_content)";
		
		$res=$conn->query($sql);
		return $res;
	}



function getTemposDimPaginaConteudo($conn, $id, $inicio, $fim){

		$sql="SELECT DISTINCT indate_dim_agent_shows_content,
		outdate_dim_agent_shows_content, 
		fk_id_content, 
		title_content, 
		name_dim_agent  
		FROM dim_agent_shows_content
		inner join dim_agents
		on id_dim_agent = fk_id_dim_agent
		inner join contents
		on id_content= fk_id_content
		where id_dim_agent =".$id.
		" and indate_dim_agent_shows_content 
		between '".$inicio."' and '".$fim."'
		order by indate_dim_agent_shows_content ASC";

		$res=$conn->query($sql);
		return $res;
	}


function getTemposDimProdutos($conn, $id, $inicio, $fim){

		$sql="SELECT DISTINCT indate_dim_agent_shows_products, 
				outdate_dim_agent_shows_products, 
				fk_id_product, 
				title_product, 
				name_dim_agent 
				FROM dim_agents_shows_products
				inner join dim_agents
				on id_dim_agent = fk_id_dim_agent
				inner join products
				on id_product= fk_id_product
				where id_dim_agent=".$id.
				" and indate_dim_agent_shows_products 
				between '".$inicio."' and '".$fim."'
				 order by indate_dim_agent_shows_products ASC";
		//echo $sql;

		$res=$conn->query($sql);
		return $res;
	}











/* ==========================================================================
    HANDY FUNCTIONS
   -------------------------------------
   	
   ========================================================================== */
	function insereEmTabela($tabela, $dados, $db ){
		//echo "1";
		$q="INSERT INTO ".$tabela." ";
		//echo $q;
		$n='';
		$v='';
		foreach($dados as $key=>$val) {
			$n.="`$key`, ";
			if(strtolower($val)=='null') $v.="NULL, "; 
			elseif(strtolower($val)=='now()') $v.="NOW(), ";
			else $v.= "'".$val."', ";
		}

		$q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
		echo "A QUERY e: ".$q;
		
		$res=$db->query($q);

		$getUltimo = "SELECT LAST_INSERT_ID() as ID";

		$goGetUltimo=$db->query($getUltimo);

		
		while($row=$goGetUltimo->fetch_assoc()){
			$ultimo= $row['ID'];
		}	
		return $ultimo;
	}

	function atualizaTabela($tabela, $dados, $where='1', $db) {
		$q="UPDATE `".$tabela."` SET ";
		foreach($dados as $key=>$val) {
			
			if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
			elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
			else $q.= "`$key`='".$val."', ";
		}
		$q = rtrim($q, ', ') . ' WHERE '.$where.';';
		//echo $q;
		$res=$db->query($q);
		
		return $res;
	}

	function geraGUID($db){
		$s="SELECT uuid() as uidforfile";
		$g=$db->query($s);

		$res= $g->fetch_assoc();
		$imgGUID=$res['uidforfile'];

		return $imgGUID;
	}


	
	function format_uri($string){
	    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
	    $special_cases = array( '&' => 'and');
	   // $string = mb_strtolower( trim( $string ), 'UTF-8' );
	    $string = strtolower( trim( $string ));
	   
	    $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
	    $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
	    $string = str_replace(' ', '', $string);
	    return $string;
	}





/* ==========================================================================
	PRODUCT PAGE - PRODUCT HAS PRODUCT PAGE
-------------------------------------
	INSERIR NA BD
========================================================================== */

   	function submitPageBd($title_product_page, $intro_product_page, $full_product_page, $order_product_page, $urlImgPagina, $urlImgBgPagina, $db){
   		for ($i=0; $i < count($title_product_page); $i++) {

			$title_product_page = $title_product_page[$i];
			$intro_product_page = $intro_product_page[$i];
			$full_product_page = $full_product_page[$i];
			$order_product_page = $order_product_page[$i];

			//*****Imagem Página do Produto*****	

			if(isset($urlImgPagina['tmp_name']) && $urlImgPagina['tmp_name'] !='') {

				$imgGUID=geraGUID($conn);
				$target_large = "../..".MEDIA_PRODUCT_PAGES_FOLDER;

				$nomeFileBD = basename($urlImgPagina['name'][$i]); 
				$ext=end(explode(".", $nomeFileBD));	
				$nomeFileBD=$imgGUID.".".$ext;
				$target_path = $target_large . $nomeFileBD;
			
				if(move_uploaded_file($urlImgPagina['tmp_name'][$i], $target_path)){
					$dataPP['url_img_product_page']=$nomeFileBD ;
				}

				//echo "img: ".$nomeFileBD."</br>";

			}

			//*****Imagem Background Página do Produto*****	

			if(isset($urlImgBgPagina['tmp_name']) && $urlImgBgPagina['tmp_name'] !='') {

				$imgGUID=geraGUID($conn);
				$target_large = "../..".MEDIA_PRODUCT_PAGES_FOLDER;

				$nomeFileBD = basename($urlImgBgPagina['name'][$i]); 
				$ext=end(explode(".", $nomeFileBD));	
				$nomeFileBD=$imgGUID.".".$ext;
				$target_path = $target_large . $nomeFileBD;
			
				if(move_uploaded_file($urlImgBgPagina['tmp_name'][$i], $target_path)){
					$dataPP['url_img_bg_product_page']=$nomeFileBD ;
				}

				//echo "img: ".$nomeFileBD."</br>";

			}

			$dataPP['title_product_page'] = $title_product_page;
			$dataPP['intro_product_page'] = $intro_product_page;
			$dataPP['full_product_page'] = $full_product_page;
			$dataPP['order_product_page'] = $order_product_page;
		
			$res = insereEmTabela('product_pages', $dataPP, $conn);			
		}
		
		return $res;
   	}

?>
