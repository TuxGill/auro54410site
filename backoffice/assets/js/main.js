$(document).ready(function(){

/*************************************
 	Reorder Tables 
 *************************************/  
 	//Drag and Drop das Linhas e Ordena na BD
    $("#tbInst").tableDnD({
   	     onDragClass: "dragClass",
	     onDrop: function(table, row) {
	     	/*get area*/
	     	$.urlParam = function(name){
			    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
			    return results[1] || 0;
			}
		   var area= $.urlParam('area');

		   /*get new table order*/
	       var order = $.tableDnD.serialize();

	       var id= $("#tbInst > tr").val();

	       /*send info to updateOrder*/
	       $.post("../backoffice/modulos/updateOrder.php", {ord: order, ar:area, action: "updateRecordsListings"})
			.done(function(data) {
			}); 															 
	      }


    });

	//Filtra Paginas de Conteudo
		//tabelas que precisam do drag and drop das linhas
		$('#tbInst').dataTable( {
				"aaSorting": [[ 4, "asc" ]],
				"sPaginationType": "full_numbers"
				
			} );

		//tabelas que NÂO precisam do drag and drop das linhas
		$('#tbStatic').dataTable( {
				"aaSorting": [[ 4, "asc" ]],
				"sPaginationType": "full_numbers"
				
			} );

		$('#tbStaticExp').dataTable( {
				"aaSorting": [[ 4, "asc" ]],
				"sPaginationType": "full_numbers"
				
			} );


	
/*************************************
 	Menu Toggle
 *************************************/ 

  //Para que os items dos menus estejam escondidos
  $("ul.extraSub6, ul.extraSub7, ul.extraSub3, ul.extraSub5, ul.extraSub4, ul.extraSub2, ul.extraSub8 ").hide();


	$("ul.navMenu li > div.tableHeader").click(function()
	{
		var arrow = $(this).find("span.arrow");

		if(arrow.hasClass("up"))
		{
			arrow.removeClass("up");
			arrow.addClass("down");
		}
		else if(arrow.hasClass("down"))
		{
			arrow.removeClass("down");
			arrow.addClass("up");
		}

		$(this).parent().find("ul.subMenu").slideToggle();

	});


	/* SubMenu Toogle Hospitalar */
	$("ul.navMenu li > ul.subMenu > li.sub1").click(function()
	{
		var arrow2 = $(this).find("span.arrow");

		if(arrow2.hasClass("up"))
		{
			arrow2.removeClass("up");
			arrow2.addClass("down");
		}
		else if(arrow2.hasClass("down"))
		{
			arrow2.removeClass("down");
			arrow2.addClass("up");
		}

		$(this).parent().find("ul.extraSub1").slideToggle();

	});

	/* SubMenu Toogle Destaques */
	$("ul.navMenu li > ul.subMenu > li.sub2").click(function()
	{
		var arrow2 = $(this).find("span.arrow");

		if(arrow2.hasClass("up"))
		{
			arrow2.removeClass("up");
			arrow2.addClass("down");
		}
		else if(arrow2.hasClass("down"))
		{
			arrow2.removeClass("down");
			arrow2.addClass("up");
		}

		$(this).parent().find("ul.extraSub2").slideToggle();

	});

	
	/* SubMenu Toogle Campanhas */
	$("ul.navMenu li > ul.subMenu > li.sub4").click(function()
	{
		var arrow4 = $(this).find("span.arrow");

		if(arrow4.hasClass("up"))
		{
			arrow4.removeClass("up");
			arrow4.addClass("down");
		}
		else if(arrow4.hasClass("down"))
		{
			arrow4.removeClass("down");
			arrow4.addClass("up");
		}

		$(this).parent().find("ul.extraSub4").slideToggle();

	});

	/* SubMenu Toogle Campanhas Regulares */
	$("ul.navMenu li > ul.subMenu > ul.extraSub4 > li.sub3").click(function()
	{
		var arrow3 = $(this).find("span.arrow");

		if(arrow3.hasClass("up"))
		{
			arrow3.removeClass("up");
			arrow3.addClass("down");
		}
		else if(arrow3.hasClass("down"))
		{
			arrow3.removeClass("down");
			arrow3.addClass("up");
		}

		$(this).parent().find("ul.extraSub3").slideToggle();

	});

	/* SubMenu Toogle Campanhas Decubal */
	$("ul.navMenu li > ul.subMenu > ul.extraSub4 > li.sub5").click(function()
	{
		var arrow3 = $(this).find("span.arrow");

		if(arrow3.hasClass("up"))
		{
			arrow3.removeClass("up");
			arrow3.addClass("down");
		}
		else if(arrow3.hasClass("down"))
		{
			arrow3.removeClass("down");
			arrow3.addClass("up");
		}

		$(this).parent().find("ul.extraSub5").slideToggle();

	});

	/* SubMenu Toogle Produtos Decubal */
	$("ul.navMenu li > ul.subMenu > li.sub6").click(function()
	{
		var arrow4 = $(this).find("span.arrow");

		if(arrow4.hasClass("up"))
		{
			arrow4.removeClass("up");
			arrow4.addClass("down");
		}
		else if(arrow4.hasClass("down"))
		{
			arrow4.removeClass("down");
			arrow4.addClass("up");
		}

		$(this).parent().find("ul.extraSub6").slideToggle();

	});

	/* SubMenu Toogle Produtos Saude da Mulher */
	$("ul.navMenu li > ul.subMenu > li.sub8").click(function()
	{
		var arrow4 = $(this).find("span.arrow");

		if(arrow4.hasClass("up"))
		{
			arrow4.removeClass("up");
			arrow4.addClass("down");
		}
		else if(arrow4.hasClass("down"))
		{
			arrow4.removeClass("down");
			arrow4.addClass("up");
		}

		$(this).parent().find("ul.extraSub8").slideToggle();

	});

	/* SubMenu Toogle Hopitalar */
	$("ul.navMenu li > ul.subMenu > li.sub7").click(function()
	{
		var arrow4 = $(this).find("span.arrow");

		if(arrow4.hasClass("up"))
		{
			arrow4.removeClass("up");
			arrow4.addClass("down");
		}
		else if(arrow4.hasClass("down"))
		{
			arrow4.removeClass("down");
			arrow4.addClass("up");
		}

		$(this).parent().find("ul.extraSub7").slideToggle();

	});


/*************************************
 	Calendar - JSDatePick
 *************************************/ 
	dateBegin = new JsDatePick({
        useMode:2,
        target:"calendarField",
        dateFormat:"%Y-%m-%d",
    });

    dateEnd = new JsDatePick({
        useMode:2,
        target:"calendarField2",
        dateFormat:"%Y-%m-%d",
    });

    dateEndDIM = new JsDatePick({
        useMode:2,
        target:"calendarField3",
        dateFormat:"%Y-%m-%d",
    });






});



/*************************************
    Add / Remove inputs dynamically
 *************************************/ 
 var counter = 2;
 var counter2 = 2;
 var counter3 = 2;
 
 function addGroupInputs(fileType, action, id){
 	//counter2 =c;
 	//alert(fileType);
 //fileType - insert always "Pagina" or "Pdf"

 	//FIELDSET WITH INPUTS FOR PDF
 	if (fileType == 'Pdf') {

 		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'input'+ fileType + counter);

 		var title = '<label>Título '+ fileType +' '+ counter + ' </label>' +
	      '<input type="text" name="title'+ fileType + 
	      '[]" id="title' + fileType + counter + '" value="" > <br/>';

	    var desc = '<label>Desc '+ fileType +' '+ counter + ' </label>' +
	      '<textarea rows=4 name="desc'+ fileType +
	      '[]" id="desc' + fileType + counter + '" value="" ></textarea> <br/>';

 		var urlPdf = '<label>'+ fileType +' '+ counter + ' </label>' +
	      '<input type="file" name="urlPdf'+ fileType  +
	      '[]" id="urlPdf' + fileType + counter + '" value="" ' + 'accept="application/pdf"><br/>';

	    var order = '<label>Ordem '+ fileType +' '+ counter + '  </label>' +
	      '<input type="text" name="order'+ fileType +
	      '[]" id="order' + fileType + counter + '" value="" > <br/>';

	    var publicarNew = '<label>Publicar</label><input type="checkbox" name="actPdf[]"><br/>';

	    var titleEdit = '<label>Título '+ fileType +' '+ counter + ' </label>' +
	      '<input type="text" name="title'+ fileType + 
	      '" id="title' + fileType + counter + '" value="" > <br/>';

	    var descEdit = '<label>Desc '+ fileType +' '+ counter + ' </label>' +
	      '<textarea rows=4 name="desc'+ fileType +
	      '" id="desc' + fileType + counter + '" value="" ></textarea> <br/>';

 		var urlPdfEdit = '<label>'+ fileType +' '+ counter + ' </label>' +
	      '<input type="file" name="urlPdf'+ fileType  +
	      '" id="urlPdf' + fileType + counter + '" value="" ' + 'accept="application/pdf"><br/>';

	    var orderEdit = '<label>Ordem '+ fileType +' '+ counter + '  </label>' +
	      '<input type="text" name="order'+ fileType +
	      '" id="order' + fileType + counter + '" value="" > <br/>';

	    var id = '<input type="hidden" name="id_page' + '" value="' + id + '" > <br/>';

	    var publicar = '<label>Publicar</label><input type="checkbox" name="publish"><br/>';

	    var gravar = '<input type="submit" name="save" class="btnSave" value="Gravar">';

		if (action == 'edit') {
			newTextBoxDiv.after().html('<form  method="post" action="modulos/modProdutos/subPaginas.php" class="formProdutos" enctype="multipart/form-data"><fieldset><legend>Pdf Produto '+ counter +'</legend>' + titleEdit + descEdit + urlPdfEdit + orderEdit + publicar + gravar + id + '</fieldset></form>');
		} else {
			newTextBoxDiv.after().html('<fieldset><legend>Pdf Produto '+ counter +'</legend>' + title + desc + urlPdf + order + publicarNew + '</fieldset>');
		};

		newTextBoxDiv.appendTo("#inputGroup"+fileType);
 
 
		counter++;

	//FIELDSET WITH INPUTS FOR PAGINA PRODUTO
 	}else if(fileType == 'Pagina'){
 			//alert('sou pagina');

 		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'input'+ fileType + counter2);
 
 		var title = '<label>Título '+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="text" name="title'+ fileType + 
	      '[]" id="title' + fileType + counter2 + '" value="" > <br/>';

	    var intro = '<label>Intro '+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="text" name="intro'+ fileType + 
	      '[]" id="intro' + fileType + counter2 + '" value="" > <br/>';

	    var full = '<label>Full '+ fileType +' '+ counter2 + ' </label>' +
	      '<textarea rows=4 name="full'+ fileType + 
	      '[]" id="full' + fileType + counter2 + '" value="" ></textarea> <br/>';

 		var urlImg = '<label>'+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="file" name="urlImg'+ fileType + 
	      '[]" id="urlImg' + fileType + counter2 + '" value="" ><br/>';

	    var urlImgBg = '<label>'+ fileType +' Background '+ counter2 + ' </label>' +
	      '<input type="file" name="urlImgBg'+ fileType + 
	      '[]" id="urlImgBg' + fileType + counter2 + '" value="" ><br/>';

	    var order = '<label>Ordem '+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="text" name="order'+ fileType + 
	      '[]" id="order' + fileType + counter2 + '" value="" > <br/>';

	    var publicarNew = '<label>Publicar</label><input type="checkbox" name="actPage[]"><br/>';


	    var titleEdit = '<label>Título '+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="text" name="title'+ fileType + 
	      '" id="title' + fileType + counter2 + '" value="" > <br/>';

	    var introEdit = '<label>Intro '+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="text" name="intro'+ fileType + 
	      '" id="intro' + fileType + counter2 + '" value="" > <br/>';

	    var fullEdit = '<label>Full '+ fileType +' '+ counter2 + ' </label>' +
	      '<textarea rows=4 name="full'+ fileType + 
	      '" id="full' + fileType + counter2 + '" ></textarea> <br/>';

 		var urlImgEdit = '<label>'+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="file" name="urlImg'+ fileType + 
	      '" id="urlImg' + fileType + counter2 + '" value="" ><br/>';

	    var urlImgBgEdit = '<label>'+ fileType +' Background '+ counter2 + ' </label>' +
	      '<input type="file" name="urlImgBg'+ fileType + 
	      '" id="urlImgBg' + fileType + counter2 + '" value="" ><br/>';

	    var orderEdit = '<label>Ordem '+ fileType +' '+ counter2 + ' </label>' +
	      '<input type="text" name="order'+ fileType + 
	      '" id="order' + fileType + counter2 + '" value="" > <br/>';
	    var id = '<input type="hidden" name="id_page' + '" value="' + id + '" > <br/>';


	    var publicar = '<label>Publicar</label><input type="checkbox" name="publish"><br/>';

	    var gravar = '<input type="submit" name="save" class="btnSave" value="Gravar">';

		if (action == 'edit') {
	    	newTextBoxDiv.after().html('<form  method="post" action="modulos/modProdutos/subPaginas.php" class="formProdutos" enctype="multipart/form-data"><fieldset><legend>Página Produto '+ counter2 +'</legend>' + titleEdit + introEdit + fullEdit + urlImgEdit + urlImgBgEdit + orderEdit + publicar + gravar + id + '</fieldset></form> ');
	    } else {
	    	newTextBoxDiv.after().html('<fieldset><legend>Página Produto '+ counter2 +'</legend>' + title + intro + full + urlImg + urlImgBg + order + publicarNew + '</fieldset>');
	    };
 
		newTextBoxDiv.appendTo("#inputGroup"+fileType);
		
		counter2++;


 	}else if(fileType == 'Info'){

 		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'input'+ fileType + counter3);
 
 		var key = '<label>Designação '+ counter3 + ' </label>' +
	      '<input type="text" name="key_info_parameter[]" id="key' + fileType + counter3 + '" value="" > <br/>';

	    var value = '<label>Valor '+ counter3 + ' </label>' +
	      '<textarea name="value_info_parameter[]" id="value' + fileType + counter3 + '"></textarea> <br/>';

 		var orderInfo = '<label>Ordem '+ counter3 + ' </label>' +
	      '<input type="text" name="order_info_parameter[]" id="order' + fileType + counter3 + '" value="" ><br/>';

	    var keyEdit = '<label>Designação '+ counter3 + ' </label>' +
	      '<input type="text" name="key_info_parameter" id="key' + fileType + counter3 + '" value="" > <br/>';

	    var valueEdit = '<label>Designação '+ counter3 + ' </label>' +
	      '<textarea name="value_info_parameter" id="value' + fileType + counter3 + '"></textarea> <br/>';

 		var orderInfoEdit = '<label>Ordem '+ counter3 + ' </label>' +
	      '<input type="text" name="order_info_parameter" id="order' + fileType + counter3 + '" value="" ><br/>';

	    var id = '<input type="hidden" name="id_info_simp' + '" value="' + id + '" > <br/>';

	    var publicar = '<label>Publicar</label><input type="checkbox" name="act_info_parameter"><br/>';

	    var gravar = '<input type="submit" name="save" class="btnSave" value="Gravar">';

		if (action == 'edit') {
	    	newTextBoxDiv.after().html('<form  method="post" action="modulos/modFichaProdutos/subInfoParameters.php" class="formProdutos" enctype="multipart/form-data"><fieldset><legend>Info Produto '+ counter3 +'</legend>' + keyEdit + valueEdit + orderInfoEdit + publicar + gravar + id + '</fieldset></form> ');
	    } else {
	    	newTextBoxDiv.after().html('<fieldset><legend>Info Produto '+ counter3 +'</legend>' + key + value + orderInfo + publicar + '</fieldset>');
	    };
 
		newTextBoxDiv.appendTo("#inputGroup"+fileType);
		
		counter3++;


 	}else{
 		alert('Invalid Filetype. Must be "Pdf", "Pagina" or "Info"');
 	};
	

 }

 
 function removeGroupInputs(fileType){

 	if (fileType == 'Pdf') {
		if(counter==2){
	          alert("Não é possível retirar mais inputs");
	          return false;
	       }   
	 
		counter--;
	 
	    $("#input" + fileType + counter).remove();

	}else if(fileType == 'Pagina'){
		if(counter2==2){
	          alert("Não é possível retirar mais inputs");
	          return false;
	       }   
	 
		counter2--;
	 
	    $("#input" + fileType + counter2).remove();

	}else if(fileType == 'Info'){
		if(counter3==2){
	          alert("Não é possível retirar mais inputs");
	          return false;
	       }   
	 
		counter3--;
	 
	    $("#input" + fileType + counter3).remove();

	}
}


	
