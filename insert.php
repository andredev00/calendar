<?php

//insert.php

if(isset($_POST["nomePaciente"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
 $query = "
 INSERT INTO events 
 (start_event, telemovel, descricao, nomePaciente) 
 VALUES (:start_event, :telemovel, :descricao, :nomePaciente)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':start_event' => $_POST['start'],
   ':telemovel' => $_POST['nTelemovel'],
   ':descricao' => $_POST['content'],
   ':nomePaciente' => $_POST['nomePaciente']
  )
 );
}


?>