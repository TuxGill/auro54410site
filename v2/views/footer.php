<?php 

  $contact = getContactById($pdo,1);

?>

<div class="col-sm-12 col-12 vermapa" id="info-contactos"><a target="_blank" href="https://goo.gl/maps/HZBEGMkgKe82"><p>VER MAPA</p></a></div>
<div class="row geral col-sm-12 col-12">

    <div class="col-sm-10 col-10 offset-1 offset-sm-1 row clearfix">
      <ul class="col-md-6 col-12 clearfix">
          <li><h2>DADOS GERAIS</h2></li>
          <li class="info-item">
              <div class="icon"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
              <div class="info">
                <ul>
                    <li><?php echo utf8_encode($contact[0]->getAddress()); ?></li>
                </ul>
              </div>
          </li>

          <li class="info-item">


              <div class="icon"><a href="geral@aurovitas.pt"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a></div>
              <div class="info">
                <ul>
                    <!-- <li>Email Geral</li> -->
                    <li><?php echo $contact[0]->getEmail(); ?></li>
                </ul>
              </div>
          </li>

          <li class="info-item">

              <div class="icon"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></div>
              <div class="info">
                <ul>
                    <li><?php echo $contact[0]->getTel(); ?></li>
                </ul>
              </div>
          </li>

          <li class="info-item">

              <div class="icon"><i class="fa fa-fax fa-2x" aria-hidden="true"></i></div>
              <div class="info">
                <ul>
                    <li><?php echo $contact[0]->getFax(); ?></li>
                </ul>
              </div>
          </li>

          <li class="info-item">

              <div class="icon"><a href="https://www.linkedin.com/company/aurovitas-portugal"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a></div>
              <div class="info">
                <ul>
                    <li><?php echo $contact[0]->getLink(); ?></li>
                </ul>
              </div>
          </li>


      </ul>
      <ul class="col-md-6 col-12 clearfix">
        <li><h2>APOIO AO CLIENTE</h2></li>
        <li class="info-item">

          <div class="icon"><a href="mailto:apoiocliente@aurovitas.pt"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a></div>
          <div class="info">
            <ul>
                <li>
                   <?php echo utf8_encode($contact[0]->getText1()); ?>
                </li>
            </ul>
          </div>
        </li>
        <li class="linha-separador"></li>
        <li><h2>FARMACOVIGILÂNCIA</h2></li>
        <li class="info-item">

              <div class="icon"><i class="fa" aria-hidden="true"></i></div>
              <div class="info">
                <ul>
                  <li>
                      Para pedir informações sobre os nossos
                      medicamentos ou para qualquer assunto
                      relacionado com farmacovigilância
                      (ex: reações adversas) contactar:
                  </li>

                </ul>
              </div>
        </li>
        <li class="info-item">

          <div class="icon"><a href="mailto:pharmacovigilance.portugal@aurobindo.com"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></a></div>
          <div class="info">
            <ul>

              <li>Email farmacovigilância
                  <a href="mailto:pharmacovigilance.portugal@aurobindo.com" style="word-wrap: break-word;">pharmacovigilance.portugal@aurobindo.com</a>
              </li>
            </ul>
                  </div>
            </li>

      </ul>
    </div>
</div>

<div class="row col-sm-12 rodape">
  <div class="copyEsq col-sm-6">
    <p>©Copyright 2016 Aurovitas</p>
  </div>
  <div class="copyDir col-sm-6">
    <p><a class="politicaPrivacidade" href="#privacidade_content">&nbsp;Política de privacidade</a></p>
    <p><a class="termos" href="#termos_content">&nbsp;Termos do Site |&nbsp;</a></p>
    <p><a href="<?php echo BASE_URL; ?>/sitemap">Site map</a> |&nbsp;</p>
  </div>
</div>

<div style='display:none'>
  <div id='privacidade_content'>
        <h2>POLÍTICA DE PRIVACIDADE</h2><br>

        A Aurovitas, Unipessoal Lda respeita a privacidade dos utilizadores deste site.
        As informações recolhidas pela Aurovitas, Unipessoal Lda durante a navegação no site só serão utilizadas para os fins indicados e de acordo com a legislação aplicável. A Aurovitas, Unipessoal Lda não irá fornecer qualquer informação a terceiros sem a autorização expressa do utilizador. A Aurovitas, Unipessoal Lda fará ainda todos os esforços para impedir o acesso de terceiros às informações dos utilizadores deste site. Embora todos os esforços sejam efectuados no sentido de evitar o acesso de terceiros, a Aurovitas, Unipessoal Lda não poderá ser responsabilizada se as informações forem obtidas de forma ilegal.

  </div>
</div>

<div style='display:none'>
  <div id='termos_content'>
        <h2>TERMOS DO SITE</h2><br>

        Ao aceder e utilizar este site, enquanto utilizador, estará a concordar com as seguintes condições:
        A Aurovitas, Unipessoal Lda fará todos os esforços para garantir que as informações aqui publicadas serão sempre o mais precisas e completas possível. No entanto, a Aurovitas, Unipessoal Lda não pode ser responsabilizada por quaisquer danos sofridos pelos utilizadores deste site e / ou por terceiros, como resultado da sua utilização e das informações aqui fornecidas.

  </div>
</div>
