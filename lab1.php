<!DOCTYPE html>
<html>
<head>
    <title>Lab 1 - My Favorite Fruits</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: purple;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .wrapper {
            width: 400px;
        }

        .form-card, .result-card {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.18);
        }

        h1, h2, h3 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-top: 3px;
        }

        input[type="submit"] {
            margin-top: 15px;
            width: 100%;
            padding: 8px;
            background-color: #af4c8e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #a04560;
        }

        .fruits {
            color: #333;
        }
    </style>
</head>

<body>
<div class="wrapper">

    <div class="form-card">
        <h1>My Favorite Fruits</h1>

        <form action="lab1.php" method="post">
            <div class="mainfruit">

                <label>Fruit 1:</label>
                <input type="text" name="fruit1">

                <label>Fruit 2:</label>
                <input type="text" name="fruit2">

                <label>Fruit 3:</label>
                <input type="text" name="fruit3">

                <label>Fruit 4:</label>
                <input type="text" name="fruit4">

                <label>Fruit 5:</label>
                <input type="text" name="fruit5">

                <input type="submit" value="Save My Fruits">
            </div>
        </form>
    </div>

    <div class="result-card">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>Your Fruits Choices is Submitted!</p>";

            $fruits = array(
                $_POST["fruit1"],
                $_POST["fruit2"],
                $_POST["fruit3"],
                $_POST["fruit4"],
                $_POST["fruit5"]
            );

            echo "<h2>Your Fruits:</h2>";
            echo "<ul>";

            foreach ($fruits as $fruit) {
                echo "<li class='fruits'>" . $fruit . "</li>";
            }

            echo "</ul>";
            echo "<h3>Your Favorite Fruit: " . $fruits[0] . "</h3>";
        }
        ?>
    </div>

</div>
</body>
</html>