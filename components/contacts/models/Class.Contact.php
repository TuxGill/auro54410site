<?php

  class Contact {
    private $id;
    private $address;
    private $email;
    private $tel;
    private $fax;
    private $link;
    private $text1;
    private $text2;
    private $act;
    private $del;
    private $ts;


    function __construct($id, $address,$email, $tel, $fax, $link, $text1, $text2, $act, $del, $ts){
      $this->id=$id;
      $this->address=$address;
      $this->email=$email;
      $this->tel=$tel;
      $this->fax=$fax;
      $this->link=$link;
      $this->text1=$text1;
      $this->text2=$text2;
      $this->act=$act;
      $this->del=$del;
      $this->ts=$ts;

    }

    function getId(){ return $this->id; }
    function getAddress(){ return $this->address; }
    function getEmail(){ return $this->email; }
    function getTel(){ return $this->tel; }
    function getFax(){ return $this->fax; }
    function getLink(){ return $this->link; }
    function getText1(){ return $this->text1; }
    function getText2(){ return $this->text2; }
    function getAct(){ return $this->act; }
    function getDel(){ return $this->del; }
    function getTs(){ return $this->ts; }

    function setId($val){ $this->id=$val; }
    function setAddress($val){ $this->address=$val; }
    function setEmail($val){ $this->email=$val; }
    function setTel($val){ $this->tel=$val; }
    function setFax($val){ $this->fax=$val; }
    function setLink($val){ $this->link=$val; }
    function setText1($val){ $this->text1=$val; }
    function setText2($val){ $this->text2=$val; }
    function setAct($val){ $this->act=$val; }
    function setDel($val){ $this->del=$val; }
    function setTs($val){ $this->ts=$val; }


    function update($pdo){
      $sql="update contacts set address_contact='".$this->address."',
      email_contact ='".$this->email."',
      tel_contact ='".$this->tel."',
      fax_contact ='".$this->fax."',
      link_contact ='".$this->link."',
      text1_suport_contact ='".$this->text1."',
      text2_suport_contact ='".$this->text2."',
      act_contact ='".$this->act."',
      del_contact ='".$this->del."',
      ts_contact ='".$this->ts."'
      where id_contact=".$this->id;

      echo $sql;
      $query = $pdo->prepare($sql);
          $query->execute();
    }
  }

?>
