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
            <a href="home.php?area=editproductcategory">
               <li class="sub8">

                  <span class="label">Editar Categorias de Produtos</span>


               </li>
            </a>


               <?php
                  /*VAI BUSCAR TODAS AS CATEGORIAS EM BO */

                  $cats=getAllProductCategories($pdo);

                  for($i=0;$i<count($cats);$i++){ ?>
               <a href="home.php?area=newproduct&idCat=<?php echo $cats[$i]->getId();?>">
                  <li><?php echo $cats[$i]->getTitle(); ?></li>
               </a>
               <?php } ?>


            <a href="home.php?area=newproduct">
               <li>Gerir Produtos</li>
            </a>
            </ul>

      </li>
   </ul>
   </ul>
</nav>
