<?php
include('../../config.php');


$id=$_POST['id'];
$inicio=$_POST['inicio'];
$fim=$_POST['fim'];


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
     UNION ALL
    (SELECT DISTINCT indate_dim_agent_shows_content,
    outdate_dim_agent_shows_content,
    fk_id_content,
    title_content,
    name_dim_agent
    FROM dim_agent_shows_content
    inner join dim_agents
    on id_dim_agent = fk_id_dim_agent
    inner join contents
    on id_content= fk_id_content
    where id_dim_agent=".$id.
    " and indate_dim_agent_shows_content
     between '".$inicio."' and '".$fim."' )";


$query = $sql;

$export = $conn->query($query);

$fields = $export->field_count;


for ( $i = 0; $i < $fields; $i++ )
{
    $th = mysqli_fetch_field($export);

    switch($th->name){
        case 'indate_dim_agent_shows_products': $nomeCampo='Tempo Inicial'; break;
        case 'outdate_dim_agent_shows_products': $nomeCampo='Tempo Final'; break;
        case 'title_product': $nomeCampo='Nome da Pagina ou Produto'; break;
        case 'name_dim_agent': $nomeCampo='Nome do DIM'; break;
        case 'fk_id_product': $nomeCampo='Id'; break;
    }

    $header.= $nomeCampo."\t";
    
}

while($row = $export->fetch_row())
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Tempos Encontrados!\n";                        
}



$filename=date("Y-m-d")."_".date("H-i")."_temposDim.xls";

header("Content-type: application/octet-stream");
header('Content-Disposition: attachment; filename='.$filename); 
header("Pragma: no-cache");
header("Expires: 0");
print_r($header."\n".$data);

?>