<?php
  Class Product{
    private $category;
  private $title;
  private $slug;
  private $logo;
  private $intro;
  private $text;
  private $url_img;
  private $pdf;
  private $video;
  private $link1;
  private $link2;
  private $order;
  private $act;
  private $del;
  private $ts;

  function __construct($id, $category, $title,$slug,$logo, $intro, $text, $url_img, $pdf, $video, $link1, $link2, $order, $act, $del, $ts){
    $this->id = $id;
    $this->category = $category;
    $this->title = $title;
    $this->slug = $slug;
    $this->logo = $logo;
    $this->intro = $intro;
    $this->text = $text;
    $this->url_img = $url_img;
    $this->pdf = $pdf;
    $this->video = $video;
    $this->link1 = $link1;
    $this->link2 = $link2;
    $this->order = $order;
    $this->act = $act;
    $this->del = $del;
    $this->ts = $ts;

    }

    /* GETTERS */
    function getId(){ return $this->id; }
    function getCategory(){ return $this->category; }
    function getTitle(){ return $this->title; }
    function getSlug(){ return $this->slug; }
    function getIntro(){ return $this->intro; }
    function getLogo(){ return $this->logo; }
    function getText(){ return $this->text; }
    function getUrlImg(){ return $this->url_img; }
    function getPdf(){ return $this->pdf; }
    function getVideo(){ return $this->video; }
    function getLink1(){ return $this->link1; }
    function getLink2(){ return $this->link2; }
    function getOrder(){ return $this->order; }
    function getAct(){ return $this->act; }
    function getDel(){ return $this->del; }
    function getTs(){ return $this->ts; }

    /* SETTERS */
    function setId($val){  $this->id=$val; }
    function setCategory($val){  $this->category=$val; }
    function setTitle($val){  $this->title=$val; }
    function setSlug($val){  $this->slug=$val; }
    function setIntro($val){  $this->intro=$val; }
    function setLogo($val){  $this->logo=$val; }
    function setText($val){  $this->text=$val; }
    function setUrlImg($val){  $this->url_img=$val; }
    function setPdf($val){  $this->pdf=$val; }
  function setVideo($val){  $this->video=$val; }
  function setLink1($val){  $this->link1=$val; }
  function setLink2($val){  $this->link2=$val; }
    function setOrder($val){  $this->order=$val; }
    function setAct($val){  $this->act=$val; }
    function setDel($val){  $this->del=$val; }
    function setTs($val){  $this->ts=$val; }

    function save($pdo){
   $sql="insert into products(fk_id_category, title_product, slug_product,logo_product, intro_product, text_product, url_img_product, pdf_product, url_video_product, link1_product, link2_product, act_product)
   values(".$this->category.",'".$this->title."',".$this->slug.",".$this->logo.", ".$this->intro.",".$this->text.",".$this->url_img.",".$this->pdf.".".$this->url_video." ,".$this->link1.",".$this->link2.")"
 }


  }
