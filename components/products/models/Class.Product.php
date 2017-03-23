<?php
  Class Product{
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

    private function __construct($id, $category, $title, $intro, $text, $url_img, $order, $act, $del, $ts){
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

    /* GETTERS */
    private function getId(){ return $this->id; }
    private function getCategory(){ return $this->category; }
    private function getTitle(){ return $this->title; }
    private function getIntro(){ return $this->intro; }
    private function getText(){ return $this->text; }
    private function getUrlImg(){ return $this->url_img; }
    private function getOrder(){ return $this->order; }
    private function getAct(){ return $this->act; }
    private function getDel(){ return $this->del; }
    private function getTs(){ return $this->ts; }

    /* SETTERS */
    private function setId($val){  $this->id=$val; }
    private function setCategory($val){  $this->category=$val; }
    private function setTitle($val){  $this->title=$val; }
    private function setIntro($val){  $this->intro=$val; }
    private function setText($val){  $this->text=$val; }
    private function setUrlImg($val){  $this->url_img=$val; }
    private function setOrder($val){  $this->order=$val; }
    private function setAct($val){  $this->act=$val; }
    private function setDel($val){  $this->del=$val; }
    private function setTs($val){  $this->ts=$val; }

  }