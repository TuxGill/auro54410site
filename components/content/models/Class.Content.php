<?php

  Class Content{
    private $id;
    private $category;
    private $title;
    private $slug;
    private $intro;
    private $text;
    private $url_img;
    private $url_yt;
    private $order;
    private $act;
    private $del;
    private $ts;

    private function __construct($id, $category, $title, $slug ,$intro, $text, $url_img, $url_yt ,$order, $act, $del, $ts){
      $this->id = $id;
      $this->category = $category;
      $this->title = $title;
      $this->slug = $slug;
      $this->intro = $intro;
      $this->text = $text;
      $this->url_img = $url_img;
      $this->url_yt = $url_yt;
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
    function getText(){ return $this->text; }
    function getUrlImg(){ return $this->url_img; }
    function getUrlYt(){ return $this->url_yt; }
    function getOrder(){ return $this->order; }
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
    function setUrlYt($val){  $this->url_yt=$val; }
    function setOrder($val){  $this->order=$val; }
    function setAct($val){  $this->act=$val; }
    function setDel($val){  $this->del=$val; }
    function setTs($val){  $this->ts=$val; }

  }
 ?>
