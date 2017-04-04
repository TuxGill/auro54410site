<?php

  Class ContentCategory{
    private $id;
    private $category;
    private $title;
    private $intro;
    private $text;
    private $url_img;
    private $order;
    private $act;
    private $del;
    private $ts;

     function __construct($id, $category, $title, $intro, $text, $url_img,$order, $act, $del, $ts){
      $this->id = $id;
      $this->category = $category;
      $this->title = $title;
      $this->intro = $intro;
      $this->text = $text;
      $this->url_img = $url_img;
      $this->order = $order;
      $this->act = $act;
      $this->del = $del;
      $this->ts = $ts;


    }


     function getId(){ return $this->id; }
     function getCategory(){ return $this->category; }
     function getTitle(){ return $this->title; }
     function getIntro(){ return $this->intro; }
     function getText(){ return $this->text; }
     function getUrlImg(){ return $this->url_img; }
     function getOrder(){ return $this->order; }
     function getAct(){ return $this->act; }
     function getDel(){ return $this->del; }
     function getTs(){ return $this->ts; }


     function setId($val){  $this->id=$val; }
     function setCategory($val){  $this->category=$val; }
     function setTitle($val){  $this->title=$val; }
     function setIntro($val){  $this->intro=$val; }
     function setText($val){  $this->text=$val; }
     function setUrlImg($val){  $this->url_img=$val; }
     function setOrder($val){  $this->order=$val; }
     function setAct($val){  $this->act=$val; }
     function setDel($val){  $this->del=$val; }
     function setTs($val){  $this->ts=$val; }

     function save($pdo){
       $sql="insert into content(
         fk_id_content_category,
         title_content,
         slug_content,
         intro_content,
         text_content,
         url_img_content,
         url_yt_content,
         order_content,
         act_content)
       values(".$this->category.",
        '".$this->title."',
        '".$this->slug."',
        '".$this->intro."',
        '".$this->text."' ,
        '".$this->url_img."',
        '".$this->url_yt."',
        '".$this->order."',
        '".$this->act."')";

      //echo $sql;

      $query = $pdo->prepare($sql);
      $query->execute();
    }

  }
 ?>
