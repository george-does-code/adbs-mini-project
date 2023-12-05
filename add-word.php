<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Word</title>
    <link rel="stylesheet" href="styles/index.css">
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
                <a href="show-words.php">Show all words</a>
            </h4>
        </div>
    </nav>

    <div class="main-div">
        <div class="form-div">
            <h1 class="main-head">Add New Word</h1>
            <form method="post" action="">
                <div class="form-div">
                    <div style="display: flex; flex-direction:column;">
                        <label for="word">Word:</label>
                        <!-- <input type="text" name="word" id required /> -->
                        <textarea name="word" id="search-field"></textarea>
                    </div>
                    <div style="display: flex; flex-direction:column; padding:1rem 0;">
                        <label for="meaning">Meaning:</label>
                        <textarea name="meaning" id="search-field" required></textarea>
                    </div>
                    <input type="submit" id="search-btn" value="Add Word" />
            </form>
        </div>
        <div class="message-div">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include('connection.php');
                // Retrieve the word and meaning from the form
                $newWord = $_POST["word"];
                $newMeaning = $_POST["meaning"];
                include 'connection.php';
                // Insert the new word into the database
                $sql = "INSERT INTO words (word, meaning) VALUES ('$newWord', '$newMeaning')";
                if ($conn->query($sql) === TRUE) {
                    echo "<p>Word added successfully!</p>";
                } else {
                    echo "<p>Error adding word: " . $conn->error . "</p>";
                }

                // Close the database connection
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>

</html>