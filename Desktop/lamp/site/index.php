<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dictionary test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #4CAF50;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .output-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 4px;
            background-color: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
            text-align: left;
        }
        .error {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ffcdd2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Dictionary</h1>
        <form method="POST" action="">
            <label for="word">Enter a word:</label>
            <input type="text" id="word" name="word" required>
            <button type="submit">Search</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $word = $_POST['word'];

            $servername = "db"; 
            $username = "root";
            $password = "101010";
            $dbname = "dictionary";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                echo "<div class='output-box error'>Connection failed: " . $conn->connect_error . "</div>";
            } else {
                $stmt = $conn->prepare("SELECT definition FROM entries WHERE word = ?");
                if (!$stmt) {
                    echo "<div class='output-box error'>Prepare failed: " . $conn->error . "</div>";
                } else {
                    $stmt->bind_param("s", $word);

                    if ($stmt->execute()) {
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='output-box'><strong>Definition:</strong> " . $row["definition"] . "</div>";
                            }
                        } else {
                            echo "<div class='output-box error'>No definition found for the word: " . htmlspecialchars($word) . "</div>";
                        }
                    } else {
                        echo "<div class='output-box error'>Error executing query: " . $stmt->error . "</div>";
                    }

                    $stmt->close();
                }
                $conn->close();
            }
        }
        ?>
    </div>
</body>
</html>
