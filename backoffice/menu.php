<?php
   ?>
<nav>
   <ul class="navMenu">
      <li>
         <ul class="subMenu">
           <a href="home.php?area=editcontentcategory">
              <li>Editar Categorias Conteúdo</li>
           </a>
            <!--Conteudos-->
            <?php
               /*VAI BUSCAR TODAS AS CATEGORIAS EM BO */

               $cats=getAllContentCategories($pdo);

               for($i=0;$i<count($cats);$i++){ ?>
                  <a href="home.php?area=newcontent&idCat=<?php echo $cats[$i]->getId();?>">
                     <li><?php echo $cats[$i]->getTitle(); ?></li>
                  </a>
            <?php } ?>
         </ul>
      </li>
      <!--MARCAS-->
      <li>
         <ul class="subMenu">
            <!--DECOMED-->
            <li class="sub8">
               <div>
                  <span class="label">Categoria de Produtos</span>
                  <span class="arrow down"></span>
               </div>
            </li>
            <ul class="subMenu extraSub8">
               <a href="home.php?area=newproductcategory">
                  <li>Nova Categoria</li>
               </a>
               <?php
                  /*VAI BUSCAR TODAS AS CATEGORIAS EM BO */

                  $cats=getAllProductCategories($pdo);

                  for($i=0;$i<count($cats);$i++){ ?>
               <a href="home.php?area=categories&id=<?php echo $cats[$i]->getId();?>">
                  <li><?php echo $cats[$i]->getTitle(); ?></li>
               </a>
               <?php } ?>
            </ul>
            <a href="home.php?area=produtos">
               <li>Gerir Produtos</li>
            </a>
         </ul>
      </li>
   </ul>
   </ul>
</nav>
