<?php
require "../_app/Config.php";
require "../_app/BD.php";
BD::conn();

switch($_POST['acao']){

  case 'cadastro':
    $fullname = strip_tags($_POST['fullname']);
    $email = strip_tags($_POST['email']);
    $telephone = strip_tags($_POST['telephone']);
    $foto = $_FILES['foto'];

    $folder = '../uploads/';
    if(!file_exists($folder)) mkdir($folder,0755);

    if($foto['tmp_name']){
      $ext = strchr($foto['name'],'.');
      $filename = md5(time()).$ext;

      if(move_uploaded_file($foto['tmp_name'],$folder.$filename)){
        $foto = $folder.$filename;
        $sql = "INSERT INTO `users` (foto,fullname,email,telephone) ";
        $sql .="VALUES('$foto', '$fullname', '$email', '$telephone')";
        $Cadastra = BD::conn()->prepare($sql);
        $Cadastra->execute();
        echo'Foto enviada com sucesso';
      }else{
        echo 'Erro ao enviar arquivo ou foto';
      }
    }else{
      echo 'Erro: Favor envie um arquivo ou foto!'; 
    }
    break;

    case 'update':
      $id = strip_tags($_POST['id']);
      $fullname = strip_tags($_POST['fullname']);
      $email = strip_tags($_POST['email']);
      $telephone = strip_tags($_POST['telephone']);
      $foto = $_FILES['foto'];
  
      $folder = '../uploads/';
      if(!file_exists($folder)) mkdir($folder,0755);

      $SelectFoto = BD::conn()->prepare("SELECT foto FROM users WHERE id = {$id}");
      $SelectFoto->execute();
        foreach($SelectFoto as $img);
        if(file_exists($folder.$img['foto']) && !is_dir($folder.$img['foto'])): unlink($folder.$img['foto']); endif;
      
        if($foto['tmp_name']){
        $ext = strchr($foto['name'],'.');
        $filename = md5(time()).$ext;

        if(move_uploaded_file($foto['tmp_name'],$folder.$filename)){
          $foto = $folder.$filename;
          $Update = BD::conn()->prepare("UPDATE users SET fullname = :fullname, foto =:foto, email =:email, telephone =:telephone WHERE id = :id");
          $Update->execute(array(
            ':id'   => $id,
            ':fullname'   => $fullname,
            ':foto' => $foto,
            ':email' => $email,
            ':telephone' => $telephone
          ));
          echo'Foto enviada com sucesso';
        }else{
          echo 'Erro ao enviar arquivo ou foto';
        }
      }else{
        echo 'Erro: Favor envie um arquivo ou foto!'; 
      }
      break;

      case 'delete':
        $id = strip_tags($_POST['id']);
        $folder = '../uploads/';
        $SelectFoto = BD::conn()->prepare("SELECT foto FROM users WHERE id = {$id}");
        $SelectFoto->execute();
        foreach($SelectFoto as $img);
        if(file_exists($folder.$img['foto']) && !is_dir($folder.$img['foto'])): unlink($folder.$img['foto']); endif;
        
        $deletar = BD::conn()->prepare("DELETE FROM `users` WHERE id={$id}");
        if($deletar->execute()){
          echo"ok";
        }
        break;


    default:
    echo"Erro ao emviar, contate o administrador do sistema!";
}