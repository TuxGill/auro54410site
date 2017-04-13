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
    private $url_vid;
    private $link1;
    private $link2;
    private $order;
    private $act;
    private $del;
    private $ts;

     function __construct($id, $category, $title, $slug ,$intro, $text, $url_img, $url_yt , $url_vid , $link1 , $link2 ,$order, $act, $del, $ts){
      $this->id = $id;
      $this->category = $category;
      $this->title = $title;
      $this->slug = $slug;
      $this->intro = $intro;
      $this->text = $text;
      $this->url_img = $url_img;
      $this->url_yt = $url_yt;
      $this->url_vid = $url_vid;
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
    function getText(){ return $this->text; }
    function getUrlImg(){ return $this->url_img; }
    function getUrlYt(){ return $this->url_yt; }
    function getUrlVid(){ return $this->url_vid; }
    function getLink1(){ return $this->link1; }
    function getLink2(){ return $this->link2; }
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
    function setUrlVid($val){  $this->url_vid=$val; }
    function setLink1($val){  $this->link1=$val; }
    function setLink2($val){  $this->link2=$val; }
    function setOrder($val){  $this->order=$val; }
    function setAct($val){  $this->act=$val; }
    function setDel($val){  $this->del=$val; }
    function setTs($val){  $this->ts=$val; }

    // SAVE
    function save($pdo){
      $sql="insert into content(
        fk_id_content_category,
        title_content,
        slug_content,
        intro_content,
        text_content,
        url_img_content,
        url_yt_content,
        url_video_content,
        link1_content,
        link2_content,
        order_content,
        act_content,
        ts_content)
      values(".$this->category.",
       '".$this->title."',
       '".$this->slug."',
       '".$this->intro."',
       '".$this->text."' ,
       '".$this->url_img."',
       '".$this->url_yt."',
       '".$this->url_vid."',
       '".$this->link1."',
       '".$this->link2."',
       '".$this->order."',
       '".$this->act."',
       ".( $this->ts==null ? 'NULL' : $this->ts ).")";

    //  echo $sql;

     $query = $pdo->prepare($sql);
     $query->execute();

   }


  //  UPDATE
  function update($pdo, $id){
      $sql="UPDATE content
            SET title_content='".$this->title."',
            slug_content='".$this->slug."',
            intro_content='".$this->intro."',
            text_content='".$this->text."' ,
            url_img_content='".$this->url_img."',
            url_yt_content='".$this->url_yt."',
            url_video_content='".$this->url_vid."',
            link1_content='".$this->link1."',
            link2_content='".$this->link2."',
            order_content='".$this->order."',
            act_content='".$this->act."',
            ts_content='".( $this->ts==null ? 'NULL' : $this->ts )."'
            WHERE id_content='".$id."'";

      // echo $sql;

      $query = $pdo->prepare($sql);
      $query->execute();
   }

    function delete($pdo){
        $sql="update content set del_content=1 where id_content=".$this->id;


        $query = $pdo->prepare($sql);
        $query->execute();


      }

    function unpublish($pdo){
        $sql="update content set act_content=0 where id_content=".$this->id;


        $query = $pdo->prepare($sql);
        $query->execute();


      }

     function publish($pdo){
        $sql="update content set act_content=1 where id_content=".$this->id;


        $query = $pdo->prepare($sql);
        $query->execute();


      }
}

?>
