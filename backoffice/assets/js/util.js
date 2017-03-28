
//********Categorias Produtos********
function deleteCategoriasProdutos(area,id){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modCatProd/delCatProd.php?id="+id+"&area="+area;
	}
}

function pubCategoriasProdutos(area,action,id){
	window.location="modulos/modCatProd/pubCatProd.php?id="+id+"&area="+area+"&action="+action;
}

//********Produtos********
function deleteProdutos(area,id){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modProdutos/delProdutos.php?id="+id+"&area="+area;
	}
}

function pubProdutos(area,action,id){
	window.location="modulos/modProdutos/pubProdutos.php?id="+id+"&area="+area+"&action="+action;
}

//********Páginas de Produtos********
function deletePaginas(area,id,idp){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modProdutos/delPaginas.php?id="+id+"&area="+area+"&idp="+idp;
	}
}

//********Pdf de Produtos********
function deletePdf(area,id,idp){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modProdutos/delPdf.php?id="+id+"&area="+area+"&idp="+idp;
	}
}

//********Contents********
function deleteConteudos(area,id){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modConteudos/delConteudos.php?id="+id+"&area="+area;
	}
}

function pubConteudos(area,action,id){
	window.location="modulos/modConteudos/pubConteudos.php?id="+id+"&area="+area+"&action="+action;
}

//********Products Campaing********
function deleteProdCampanhas(area,id){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modCampanhas/delProdCampanhas.php?id="+id+"&area="+area;
	}
}

function pubProdCampanhas(area,action,id){
	window.location="modulos/modCampanhas/pubProdCampanhas.php?id="+id+"&area="+area+"&action="+action;
}

//********Products Simulator********
function deleteSimulador(area,id){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modSimulador/delSimulador.php?id="+id+"&area="+area;
	}
}

function pubSimulador(area,action,id){
	window.location="modulos/modSimulador/pubSimulador.php?id="+id+"&area="+area+"&action="+action;
}

//******** Medals ********
function deleteMedalhas(area,id){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modMedalhas/delMedalhas.php?id="+id+"&area="+area;
	}
}

function pubMedalhas(area,action,id){
	window.location="modulos/modMedalhas/pubMedalhas.php?id="+id+"&area="+area+"&action="+action;
}


//******** DIM ********
function deleteDim(area,id){
	if (confirm('Tem a certeza que deseja apagar?')) {
    	window.location="modulos/modDim/delDim.php?id="+id+"&area="+area;
	}
}

function pubDim(area,action,id){
	window.location="modulos/modDim/pubDim.php?id="+id+"&area="+area+"&action="+action;
}


function actualizaTempos(){
	var i = $('select[name=dataInicial]').val();
	var f = $('select[name=dataFinal]').val();
	var id = $('input[type=hidden]').val();

	$('.bottomRight').empty();

	$.post("modulos/modDim/intervaloTemposDim.php", { dInit: i, dFinal: f, Uid: id})
        .done(function(data) { 
          $('.bottomRight').html(data);

        });


};
