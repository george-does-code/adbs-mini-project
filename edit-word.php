<!-- edit-word.php -->
<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
     $wordId = $_GET['id'];
     $sql = "SELECT * FROM words WHERE id = $wordId";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $word = $row['word'];
          $meaning = $row['meaning'];
     } else {
          echo "Word not found.";
          exit;
     }
} else {
     echo "Invalid request.";
     exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Edit Word - Mini Docs</title>
     <link rel="stylesheet" href="styles/index.css" />

</head>

<body>

     <div class="main-div">
          <h1 class="main-head">Edit Word</h1>
          <form action="update-word.php" method="post">
               <div class="form-div">
                    <div style="display: flex; flex-direction:column;">
                         <input type="hidden" name="id" value="<?php echo $wordId; ?>" />
                         <label for="word">Word:</label>
                         <textarea id="search-field" name="word" required><?php echo $word; ?></textarea>
                    </div>
                    <div style="display: flex; flex-direction:column; padding:1rem 0;">
                         <label for="meaning">Meaning:</label>
                         <textarea id="search-field" name="meaning" required><?php echo $meaning; ?></textarea>
                    </div>

                    <input type="submit" id="search-btn" value="Update Word" />
          </form>
     </div>


</body>

</html>