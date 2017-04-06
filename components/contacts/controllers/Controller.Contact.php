<?php
  include($_SERVER['DOCUMENT_ROOT'].DIRFOLDER.'/components/contacts/models/Class.Contact.php');

  function getContactById($pdo, $id){


    $sql = "select * from contacts where id_contact=".$id;
    // echo $sql;
    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contacts=[];

    foreach ($rows as $row) {
      $c= new Contact($row['id_contact'], $row['address_contact'],  $row['email_contact'],$row['tel_contact'],  $row['fax_contact'],$row['link_contact'],$row['text1_suport_contact'],$row['text1_suport_contact'],  $row['act_contact'],  $row['del_contact'],$row['ts_contact']);

   

      array_push($contacts, $c);
    }


    return($contacts);

  }
?>
