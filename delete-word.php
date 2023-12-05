<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Delete Word - Mini Docs</title>
     <link rel="stylesheet" href="styles/index.css" />
</head>

<body>
     <nav>
          <div>
               <h1>minidocs</h1>
          </div>
          <div class="nav-links">
               <h4>
                    <a href="index.php">Home</a>
               </h4>
               <h4>
                    <a href="add-word.php">Add New Word</a>
               </h4>
               <h4>
                    <a href="show-words.php">View Words</a>
               </h4>
          </div>
     </nav>

     <div class="main-div">
          <h1 class="main-head">Delete Word</h1>
          <div class="message-div">
               <?php
               include('connection.php');

               if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                    // Get the word ID from the URL parameter
                    $wordId = $_GET['id'];

                    // Delete the word from the database
                    $sql = "DELETE FROM words WHERE id = $wordId";
                    if ($conn->query($sql) === TRUE) {
                         echo "<p>Word deleted successfully!</p>";
                    } else {
                         echo "<p>Error deleting word: " . $conn->error . "</p>";
                    }
               } else {
                    echo "<p>Invalid request</p>";
               }

               // Close the database connection
               $conn->close();
               ?>
          </div>
     </div>
</body>

</html>