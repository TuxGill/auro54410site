/* PRODUTOS */
//var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
//var urlPath=getBaseURL()+'clientes/aurovitas/auro54110site_v3_2/';
var urlPath=getBaseURL()+'aurovitas/auro54410site/';
//alert(urlPath);

function deleteProduct(id){

	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location=urlPath+"components/products/views/admin/del.product.php?id="+id;
	}
}

function pubProduct(id){
	
	if (confirm('Tem a certeza que deseja publicar?')) {
    	window.location=urlPath+"components/products/views/admin/managepub.product.php?id="+id+"&pub=1";
	}
}

function unpubProduct(id){
	
	if (confirm('Tem a certeza que deseja despublicar?')) {
    	window.location=urlPath+"components/products/views/admin/managepub.product.php?id="+id+"&pub=0";
	}
}

/* ARTIGOS */
function deleteContent(id){

	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location=urlPath+"components/content/views/admin/del.content.php?id="+id;
	}
}

function pubContent(id){
	
	if (confirm('Tem a certeza que deseja publicar?')) {
    	window.location=urlPath+"components/content/views/admin/managepub.content.php?id="+id+"&pub=1";
	}
}

function unpubContent(id){
	
	if (confirm('Tem a certeza que deseja despublicar?')) {
    	window.location=urlPath+"components/content/views/admin/managepub.content.php?id="+id+"&pub=0";
	}
}

function getBaseURL () {
   return location.protocol + "//" + location.hostname + 
      (location.port && ":" + location.port) + "/";
}





