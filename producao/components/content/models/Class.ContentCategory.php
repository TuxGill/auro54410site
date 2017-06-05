<?php

  Class ContentCategory{
    private $id;
    private $category;
    private $title;
    private $slug;
    private $intro;
    private $text;
    private $url_img;
    private $act;
    private $del;
    private $ts;

     function __construct($id, $category, $title, $slug, $intro, $text, $url_img, $act, $del, $ts){
      $this->id = $id;
      $this->category = $category;
      $this->title = $title;
      $this->slug = $slug;
      $this->intro = $intro;
      $this->text = $text;
      $this->url_img = $url_img;
      $this->act = $act;
      $this->del = $del;
      $this->ts = $ts;


    }


     function getId(){ return $this->id; }
     function getCategory(){ return $this->category; }
     function getTitle(){ return $this->title; }
     function getSlug(){ return $this->slug; }
     function getIntro(){ return $this->intro; }
     function getText(){ return $this->text; }
     function getUrlImg(){ return $this->url_img; }
     function getAct(){ return $this->act; }
     function getDel(){ return $this->del; }
     function getTs(){ return $this->ts; }


     function setId($val){  $this->id=$val; }
     function setCategory($val){  $this->category=$val; }
     function setTitle($val){  $this->title=$val; }
     function setSlug($val){  $this->slug=$val; }
     function setIntro($val){  $this->intro=$val; }
     function setText($val){  $this->text=$val; }
     function setUrlImg($val){  $this->url_img=$val; }
     function setAct($val){  $this->act=$val; }
     function setDel($val){  $this->del=$val; }
     function setTs($val){  $this->ts=$val; }


     function update($pdo, $id){
       $sql="UPDATE content_category
             SET title_content_category='".$this->title."',
             slug_content_category='".$this->slug."',
             intro_content_category='".$this->intro."',
             text_content_category='".$this->text."' ,
             url_img_content_category='".$this->url_img."',
             act_content_category='".$this->act."'
             WHERE id_content_category='".$id."'";

      //echo $sql;

       $query = $pdo->prepare($sql);
       $query->execute();
    }

  }
 ?>
