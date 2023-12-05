<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $wordId = $_POST['id'];
     $newWord = $_POST['word'];
     $newMeaning = $_POST['meaning'];

     $sql = "UPDATE words SET word = '$newWord', meaning = '$newMeaning' WHERE id = $wordId";

     if ($conn->query($sql) === TRUE) {
          header("Location: show-words.php");
     } else {
          echo "Error updating word: " . $conn->error;
     }
} else {
     echo "Invalid request.";
}

$conn->close();
