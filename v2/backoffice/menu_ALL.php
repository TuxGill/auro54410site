<?php
    
?>
            <nav>
                <ul class="navMenu">

                    <li>
                        <div class="tableHeader">
                            <span class="label">Home</span>
                            <span class="arrow up"></span>
                        </div>
                        <ul class="subMenu">
                            <a href="home.php?area=institucional"><li>Institucional</li></a>
                            <a href="home.php?area=popup"><li>Pop-up</li></a>
                        </ul>
                    </li>


                    <li>
                        <div class="tableHeader">
                            <span class="label">Produtos</span>
                            <span class="arrow up"></span>
                        </div>

                        <ul class="subMenu">
                        <!--Saude Mulher-->
                            <li class="sub8">
                                <div>
                                    <span class="label">Saúde da Mulher</span>
                                    <span class="arrow down"></span>
                                </div>
                            </li>
                            <ul class="subMenu extraSub8">
                                <?php
                                    $cat=getDetalheCategorias($conn, 72);
                                    while ($row= $cat->fetch_assoc()) {
                                 ?>

                                <a href="home.php?area=<?php echo $row['slug_categoria'] ?>"><li><?php echo utf8_encode($row['nome_categoria']) ?></li></a>
                               <?php
                                }
                                ?>
                            </ul>

                        <!--Decubal-->
                            <li class="sub6">
                                <div>
                                    <span class="label">Decubal</span>
                                    <span class="arrow down"></span>
                                </div>
                            </li>
                            <ul class="subMenu extraSub6">
                                <?php
                                    $cat=getDetalheCategorias($conn, 3);
                                    while ($row= $cat->fetch_assoc()) {
                                 ?>

                                <a href="home.php?area=prd_<?php echo $row['slug_categoria'] ?>"><li><?php echo utf8_encode($row['nome_categoria']) ?></li></a>
                               <?php
                                }
                                ?>
                            </ul>
                        
                        <!--Serviços Exclusivos-->
                            <a href="home.php?area=servicos"><li>Serviços Exclusivos</li></a>
                        
                        <!--Campanhas-->
                            <li class="sub4"> 
                                <div>
                                    <span class="label">Campanhas</span>
                                    <span class="arrow down"></span>
                                 </div>
                            </li>

                            <ul class="subMenu extraSub4">
                               
                                <li class="sub3"> 
                                    <div>
                                        <span class="label subSubLabel">Campanhas Regulares</span>
                                        <span class="arrow down"></span>
                                    </div>
                                </li>
                                <ul class="subMenu extraSub3">
                                    <?php
                                    $catCR=getAllCatCmp($conn, 25);
                                    while ($rowCR= $catCR->fetch_assoc()) {
                                    ?>
                                    <a href="home.php?area=<?php echo $rowCR['slug_categoria_conteudo']?>"><li style="padding-left:45px;"><?php echo utf8_encode($rowCR['nome_categoria_conteudo'])?></li></a>
                                    <?php
                                    }
                                    ?>
                                </ul>


                                <li class="sub5"> 
                                    <div>
                                        <span class="label subSubLabel">Campanhas Decubal</span>
                                        <span class="arrow down"></span>
                                    </div>
                                </li>
                                <ul class="subMenu extraSub5">
                                     <?php
                                    $catCD=getAllCatCmp($conn, 26);
                                    while ($rowCD= $catCD->fetch_assoc()) {
                                    ?>
                                    <a href="home.php?area=<?php echo $rowCD['slug_categoria_conteudo']?>"><li style="padding-left:45px;"><?php echo utf8_encode($rowCD['nome_categoria_conteudo']) ?></li></a>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <a href="home.php?area=grp-pack"><li>Gerir Grupos e Packs</li></a>
                            </ul>
                            
                            <!--Hospitalar-->
                            <li class="sub7">
                                <div>
                                    <span class="label">Hospitalar</span>
                                    <span class="arrow down"></span>
                                </div>
                            </li>
                            <ul class="subMenu extraSub7">
                                <a href="home.php?area=hos-produtos-2"><li>Produtos Hospitalar</li></a>
                                <a href="home.php?area=hospitalar"><li>Conteúdo Hospitalar</li></a>
                            </ul>

                            <!--Destaques-->
                            <li class="sub2">
                                <div>
                                    <span class="label">Destaques</span>
                                    <span class="arrow down"></span>
                                </div>
                            </li>
                            <ul class="subMenu extraSub2">
                                <a href="home.php?area=noticias"><li>Notícias</li></a>
                                <a href="home.php?area=legislacao"><li>Legislação</li></a>
                                <a href="home.php?area=produtoFicha"><li>Ficha de Produto</li></a>
                            </ul>

                            <!--Gerir Categorias-->
                             <a href="home.php?area=categorias"><li>Gerir Categorias de Produto</li></a>
                        </ul>
                    </li>

                    <li>
                        <div class="tableHeader">
                            <span class="label">Áreas de Atuação</span>
                            <span class="arrow up"></span>
                        </div>
                        <ul class="subMenu">
                            <li class="sub4"> 
                                <div>
                                    <span class="label">Genéricos</span>
                                    <span class="arrow down"></span>
                                 </div>
                            </li>
                            <ul class="subMenu extraSub4">
                                <?php
                                $catG=getAllCatCmp($conn, 12);
                                while ($rowG= $catG->fetch_assoc()) {
                                ?>
                                <a href="home.php?area=<?php echo $rowG['slug_categoria_conteudo']?>"><li style="padding-left:45px;"><?php echo utf8_encode($rowG['nome_categoria_conteudo']) ?></li></a>
                                <?php
                                    }
                                ?>
                            </ul>
                            
                            <a href="home.php?area=marcas"><li>Marcas</li></a>
                            <a href="home.php?area=otc"><li>OTC</li></a>
                            <a href="home.php?area=aa-hospitalar"><li>Hospitalar</li></a>
                           <!-- <a href="home.php?area=categoriasAA"><li>***Gerir Categorias</li></a>-->
                        </ul>
                    </li>
                     

                    <li> 
                        <a href="home.php?area=utilizadores">
                            <div class="tableHeader">
                                <span class="label">Utilizadores Backoffice</span>
                            </div>  
                        </a>
                    </li>

                    <li> 
                        <a href="home.php?area=dim">
                            <div class="tableHeader">
                                <span class="label">Gerir DIM</span>
                            </div>  
                        </a>
                    </li>

                </ul>
            </nav>