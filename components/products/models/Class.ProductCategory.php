<?php
  Class ProductCategory{
    private $id;
    private $category;
    private $title;
    private $label;
    private $intro;
    private $slug;
    private $text;
    private $url_img;
    private $order;
    private $act;
    private $del;
    private $ts;

     function __construct($id, $category, $title,$label, $intro, $slug, $text, $url_img, $order, $act, $del, $ts){
      $this->id = $id;
      $this->category = $category;
      $this->title = $title;
      $this->label = $label;
      $this->slug = $slug;
      $this->intro = $intro;
      $this->text = $text;
      $this->url_img = $url_img;
      $this->order = $order;
      $this->act = $act;
      $this->del = $del;
      $this->ts = $ts;


    }

    /* GETTERS */
    function getId(){ return $this->id; }
    function getCategory(){ return $this->category; }
    function getTitle(){ return $this->title; }
    function getLabel(){ return $this->label; }
    function getIntro(){ return $this->intro; }
    function getSlug(){ return $this->slug; }
    function getText(){ return $this->text; }
    function getUrlImg(){ return $this->url_img; }
    function getOrder(){ return $this->order; }
    function getAct(){ return $this->act; }
    function getDel(){ return $this->del; }
    function getTs(){ return $this->ts; }

    /* SETTERS */
    function setId($val){  $this->id=$val; }
    function setCategory($val){  $this->category=$val; }
    function setTitle($val){  $this->title=$val; }
    function setLabel($val){  $this->label=$val; }
    function setIntro($val){  $this->intro=$val; }
    function setSlug($val){  $this->slug=$val; }
    function setText($val){  $this->text=$val; }
    function setUrlImg($val){  $this->url_img=$val; }
    function setOrder($val){  $this->order=$val; }
    function setAct($val){  $this->act=$val; }
    function setDel($val){  $this->del=$val; }
    function setTs($val){  $this->ts=$val; }

    function save($pdo){
      $sql="insert into product_category(fk_id_product_category,
            title_product_category,
            label_product_category,
            slug_product_category,
            intro_product_category,
            text_product_category,
            url_img_product_category,
            order_product_category,
            act_product_category)
      values(".($this->category==null ? 'NULL' : $this->category).",
      '".$this->title."',
      '".$this->label."',
      '".$this->slug."',
      '".$this->intro."',
      '".$this->text."',
      '".$this->url_img."',
      '".$this->order."',
      ".$this->act."
      )";

          //echo $sql;

          $query = $pdo->prepare($sql);
          $query->execute();
      }

      function update($pdo){

        $sql="update product_category set
        title_product_category = '".$this->title."',
        label_product_category = '".$this->title."',
        slug_product_category = '".$this->slug."',
        intro_product_category='".$this->intro."',
        text_product_category='".$this->text."',
        url_product_category='".$this->url_img."',
        order_product_category=".$this->act.",
        act_product_category=".$this->act.",
        del_product_category=".$this->del.",
        fk_id_product_category =".($this->category==null  ? 'NULL' : $this->category)."
        where id_product_category=".$this->id."
        ";

        $query = $pdo->prepare($sql);
    //echo $sql;

            $query->execute();


      }


  }
?>
