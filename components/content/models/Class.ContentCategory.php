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

  }
 ?>
