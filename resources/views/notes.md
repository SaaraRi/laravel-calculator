<?php include "calculator.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Boldonse&family=Bungee+Spice&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Nabla&family=Pixelify+Sans:wght@400..700&family=Press+Start+2P&family=Quicksand:wght@300..700&family=Rubik+80s+Fade&family=Silkscreen:wght@400;700&family=Sixtyfour&family=Sixtyfour+Convergence&family=Tilt+Warp&family=Tourney:ital,wght@0,100..900;1,100..900&family=VT323&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Calculate!</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input id="number_input1" name="number_input1" type="number" class="number-input" step="any" value="<?php if (isset($_POST["number_input1"])) echo $_POST["number_input1"]; ?>" placeholder=123 required>
            <select name="operation" id="operation" <?php $operation = $_POST["operation"] ?? " "; ?>>
                <option value="default" default>Choose operation &#11015;</option>
                <option <?php if (isset($operation) && $operation == "add") echo "selected"; ?> value="add">+</option>
                <option <?php if (isset($operation) && $operation == "subtract") echo "selected"; ?> value="subtract">-</option>
                <option <?php if (isset($operation) && $operation == "multiply") echo "selected"; ?> value="multiply">*</option>
                <option <?php if (isset($operation) && $operation == "divide") echo "selected"; ?> value="divide">/</option>
            </select>
            <input id="number_input2" name="number_input2" type="number" class="number-input" step="any" value="<?php if (isset($_POST["number_input2"])) echo $_POST["number_input2"]; ?>" placeholder=123 required>
            <input type="submit" class="btn" id="equals" value="=">
            <input type="submit" class="btn" id="reset" name="reset" value="c">
            <div class="result-box">
                <p id="result"> <?php echo $result ?? " "; ?></p>
                <p id="message"> <?php echo $message ?? " "; ?></p>
            </div>
        </form>
    </div>
    <footer>Copyright&copy; Saara Rikama/React25K</footer>
</body>

</html>
