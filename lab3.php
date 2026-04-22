<!DOCTYPE html>
<html>
<head>
    <title>Lab 3 - ATM Machine Simulation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #bd65c9;
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        .page {
            width: 400px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        h1, h3 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 6px;
            margin-top: 5px;
        }

        input[type="submit"] {
            margin-top: 15px;
            background-color: #9b4caf;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 8px;
        }

        input[type="submit"]:hover {
            background-color: #7b45a0;
        }

        .result {
            margin-top: 10px;
        }
    </style>
</head>

<body>

<div class="page">

    <div class="card">
        <h1>ATM Machine Simulation</h1>

        <form method="post">

            <label>Account Name:</label>
            <input type="text" name="account_name">

            <label>Initial Balance:</label>
            <input type="number" name="initial_balance">

            <label>Action:</label>
            <select name="action">
                <option value="check">Check Balance</option>
                <option value="deposit">Deposit</option>
                <option value="withdraw">Withdraw</option>
            </select>

            <label>Amount:</label>
            <input type="number" name="amount">

            <input type="submit" value="Submit">

        </form>
    </div>

    <div class="card">
        <?php

        class ATM {
            private $accountName;
            private $balance;

            function __construct($accountName, $balance) {
                $this->accountName = $accountName;
                $this->balance = $balance;
            }

            public function getAccountName() {
                return $this->accountName;
            }

            public function getBalance() {
                return $this->balance;
            }

            public function deposit($amount) {
                $this->balance += $amount;
                return "Deposited: $" . $amount;
            }

            public function withdraw($amount) {
                if ($amount > $this->balance) {
                    return "Insufficient balance!";
                } else {
                    $this->balance -= $amount;
                    return "Withdrawn: $" . $amount;
                }
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $accountName = $_POST["account_name"];
            $initialBalance = $_POST["initial_balance"];
            $action = $_POST["action"];
            $amount = $_POST["amount"];

            $atm = new ATM($accountName, $initialBalance);

            echo "<div class='result'>";

            echo "<h3>Account: " . $atm->getAccountName() . "</h3>";

            $actionLabel = "";

            if ($action == "check") {
                $actionLabel = "Balance Check";
            } elseif ($action == "deposit") {
                $actionLabel = "Deposit of $" . $amount;
            } elseif ($action == "withdraw") {
                $actionLabel = "Withdrawal of $" . $amount;
            }

            echo "<p>Action: " . $actionLabel . "</p>";

            if ($action == "check") {
                echo "Current Balance: $" . $atm->getBalance();
            } elseif ($action == "deposit") {
                echo $atm->deposit($amount);
                echo "<br>New Balance: $" . $atm->getBalance();
            } elseif ($action == "withdraw") {
                echo $atm->withdraw($amount);
                echo "<br>Current Balance: $" . $atm->getBalance();
            }

            echo "</div>";
        }
        ?>
    </div>

</div>

</body>
</html>