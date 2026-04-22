<!DOCTYPE html>
<html>
<head>
    <title>Lab 2 - Temperature Converter</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #780ecf;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 350px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 6px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #f321d0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #a719d2;
        }

        h3 {
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Temperature Converter</h1>

    <form method="post">
        <label>Enter Celsius:</label> 
        <input type="text" name="temperature">
        <input type="submit" value="Enter Fahrenheit">
    </form>

    <?php
    function celsiusToFahrenheit($celsius) {
        return ($celsius * 9/5) + 32;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $celsius = $_POST["temperature"];
        $fahrenheit = celsiusToFahrenheit($celsius);

        echo "<h3>Result:</h3>";
        echo $celsius . "°C = " . $fahrenheit . "°F";
    }
    ?>
</div>

</body>
</html>