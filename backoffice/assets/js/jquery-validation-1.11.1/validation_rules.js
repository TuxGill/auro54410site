/****REGRAS DE VALIDAÇÃO DOS FORMULÁRIOS****/


// $().ready(function() {

//     /****CONTEÚDOS****/

//     $(".formCont").validate({
//         rules: {
//             nomeContent: "required",
//             introContent: "required",
//             content: "required",
//             pdfCont: {
//                 accept: "application/pdf",
//             },
//             videoCont: {
//                 accept: "mp4",
//             },
//             ordemCont: {
//                 required:true,
//                 digits: true
//             },
//         },
//     });

//     /****PRODUTOS****/

//     $(".formProdutos").validate({
//         rules: {
//             categoria: "required", //SELECT
//             nomeProd: "required",
//             introProd: "required",
//             descProd: "required",
//             imagemProd:{
//                 accept: "png, jpeg",
//             },
//             imagemProdGrd:{
//                 accept: "png, jpeg",
//             },
//             ordemProd:{
//                 required:true,
//                 digits: true
//             },
//         },
//     });

//     /****PÁGINAS****/
//     $(".formPaginas").validate({
//         rules: {
//             titlePagina: "required",
//             introPagina: "required",
//             fullPagina: "required",
//             urlImgPagina:{
//                 required:true,
//                 accept: "png, jpeg",
//             },
//             urlImgBgPagina:{
//                 required:true,
//                 accept: "png, jpeg",
//             },
//             orderPagina:{
//                 required:true,
//                 digits: true
//             },
//         },
//     });

//     /****PDF****/
//     $(".formPdf").validate({
//         rules: {
//             titlePdf: "required",
//             descPdf: "required",
//             urlPdfPdf: {
//                 required:true,
//                 accept: "application/pdf",
//             },
//             ordemProd:{
//                 required:true,
//                 digits: true
//             },
//         },
//     });

//     /****CATEGORIAS DE PRODUTOS****/

//     $(".formCatProdutos").validate({
//         rules: {
//             nomeCat: "required",
//             desCat: "required",
//             ordemCat: "required",
//             publish: "required",
//         },
//     });





















/**********************************************
    old
***********************************************/

    /****PÁGINAS DE CONTEÚDO****/
 /*   $(".formInst").validate({
        rules: {
            nomeInst: "required",
            subtituloInst: "required",
            descricaoInst: "required",
            imagemInst: {
                accept: "png",
            },
            videoInst: {
                accept: "mp4",
            },
            ordemInst: {
                digits: true
            },
            pdfNoticiasLegislacao: {
                //required:true,
                accept: "application/pdf",
            },
            tituloPdfInst: "required",
            dataInst: {
                required:true,
                date:true,
            }
        },
    });


    /****POP-UP****/
/*    $("#formPopUp").validate({
        rules: {
            nomePopUp: "required",
            descricaoPopUp: "required",
            imagemPopUp: {
                accept: "png",
            }
        },
    });



    /****PRODUTOS****/
 /*   $(".formProdutos").validate({
        rules: {
            categoria: "required",
            tituloProd: "required",
            layout: "required",
            tituloPdfProd: "required",
            pdfProd: {
                accept: "application/pdf",
            },
            imagemProd: {
                accept: "png",
            },
            imagemProdGrd: {
                accept: "png",
            },
            imagemBackProd: {
                accept: "png",
            },
            ordemInst: {
                digits: true
            }
        },
        messages: {
            layout: {
                required: "Obrigatório",
            }
        }

    });

    /****CATEGORIAS DE PRODUTOS****/
 /*   $(".formCatProdutos").validate({
        rules: {
            categoria: "required",
            nomeCat: "required",
            imagemBackHomeCat: {
                accept: "png",
            },
            imagemBackCat: {
                accept: "png",
            },

        }

    });


    /****PRODUTO - FICHA DE PRODUTO****/
/*    $("#formProdutoF").validate({
        //debug:true,
        rules: {
            originador:"required",
            nomeProdutoF: "required",
            pvpProdutoF: {
                required:true,
                number:true,
            },
            pvaProdutoF: {
                required:true,
                number:true,
            },
            pvfProdutoF: {
                required:true,
                number:true,
            },

            percentProdutoF: {
                required:true,
                number:true,
            },
            compProdutoF: {
                required:true,
                number:true,
            },
            ivaProdutoF: {
                required:true,
                number:true,
            },
            nomeOriginador: {
                required:true,
            },
            pvpOriginador: {
                required:true,
                number:true,
            },
            pvaOriginador: {
                required:true,
                number:true,
            },
            pvfOriginador: {
                required:true,
                number:true,
            },
            compOriginador: {
                required:true,
                number:true,
            },

        }

    });


    /****UTILIZADORES****/
/*    $("#formUtilizador").validate({
        //debug:true,
        rules: {
            perfil_user:"required",
            nomeUtilizador: "required",
            loginUtilizador:{
                required:true,
                nowhitespace: true,
            },
            passUtilizador:{
                required:true,
                nowhitespace: true,
            },
            emailUtilizador: {
                required:true,
                email:true,
            }
        },
         messages: {
            loginUtilizador: {
                nowhitespace: "O login não pode conter espa&ccedil;os em branco",
            },
            passUtilizador: {
                nowhitespace: "A password não pode conter espa&ccedil;os em branco",
            }
        }
    });


 /****PÁGINAS DE CONTEÚDO****/
 /*   $(".formAA").validate({
        rules: {
            nomeInst: "required",
            categoriaSe: "required",
            ordemInst: {
                required:true,
                digits: true
            }
        },
    });
*/

});