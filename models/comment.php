<?php
class Comment extends Db
{

  // lay 5 dong comment
  public function layCommentByIdSP($idSP)
  {
    $username = !isset($_COOKIE['username']) ? NULL : $_COOKIE['username'];
    $sql = self::$connection->prepare("SELECT * FROM `comment` WHERE `idSP` = '$idSP'");
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
  }

  // them du lieu vao bang comment
  public function insertOne_comment($idSP, $comment)
  {
    $sql = self::$connection->prepare("INSERT INTO `comment`(`id`, `username`, `idSP`, `comment`, `created_at`) 
    VALUES (NULL, ?, $idSP, '$comment', now()) ");
    $sql->bind_param('s', $_COOKIE['username']);
    return $sql->execute();
  }
}
