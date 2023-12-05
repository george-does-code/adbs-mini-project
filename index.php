<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mini Docs</title>
    <link rel="stylesheet" href="styles/index.css" />
</head>

<body>
    <nav>
        <div>
            <h1>minidocs</h1>
        </div>
        <div class="nav-links">
            <h4>
                <a href="add-word.php">Add New Word</a>
            </h4>
            <h4>
                <a href="show-words.php">Show all words</a>
            </h4>
        </div>
    </nav>

    <div class="main-div">
        <div class="form-div">
            <h1 class="main-head">Mini Dictionary v0</h1>
            <form method="post" action="">
                <input type="text" name="search-word" id="search-field" placeholder="Search a word here..." />
                <input type="submit" id="search-btn" value="Search" />
            </form>
        </div>
        <div class="meaning-div">
            <?php
            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include('connection.php');
                // Retrieve the search word from the form
                $searchWord = $_POST["search-word"];
                // Fetch the meaning from the database
                $sql = "SELECT meaning FROM words WHERE word = '$searchWord'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display the meaning
                    $row = $result->fetch_assoc();
                    echo "<h1>Meaning of the word <span id='searched-word'> \"$searchWord\" </span></h1>";
                    echo "<h2>" . $row["meaning"] . "</h2>";
                } else {
                    // Word not found
                    echo "<h1>Word not found</h1>";
                }

                // Close the database connection
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>

</html>