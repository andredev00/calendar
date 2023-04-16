<?php

//insert.php

if(isset($_POST["title"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
 $query = "
 INSERT INTO events 
 (title, start_event, end_event, telemovel, descricao, nomePaciente) 
 VALUES (:title, :start_event, :end_event, :telemovel, :descricao, :nomePaciente)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':telemovel' => $_POST['nTelemovel'],
   ':descricao' => $_POST['content'],
   ':nomePaciente' => $_POST['nomePaciente']
  )
 );
}


?>