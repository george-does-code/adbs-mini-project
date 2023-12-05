<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>View Words - Mini Docs</title>
     <link rel="stylesheet" href="styles/index.css" />
     <style>
          .main-div {
               padding: 0 5rem;

          }

          table {
               width: 100%;
               border-collapse: collapse;
               margin-top: 20px;
          }

          th,
          td {
               border: 1px solid #ddd;
               padding: 8px;
               text-align: left;
          }

          th {
               background-color: #f2f2f2;
          }

          tr:hover {
               background-color: #f5f5f5;
          }

          a {
               text-decoration: none;
               color: #007bff;
          }

          a:hover {
               color: #0056b3;
          }
     </style>
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
          </div>
     </nav>

     <div class="main-div">
          <h1 class="main-head">All Words</h1>
          <table>
               <thead>
                    <tr>
                         <th>Word</th>
                         <th>Meaning</th>
                         <th>Actions</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    include('connection.php');

                    $sql = "SELECT * FROM words";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>{$row['word']}</td>";
                              echo "<td>{$row['meaning']}</td>";
                              echo "<td>";
                              echo "<a href='edit-word.php?id={$row['id']}'>Edit</a> | ";
                              echo "<a href='delete-word.php?id={$row['id']}'>Delete</a>";
                              echo "</td>";
                              echo "</tr>";
                         }
                    } else {
                         echo "<tr><td colspan='3'>No words found</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
               </tbody>
          </table>
     </div>
</body>

</html>