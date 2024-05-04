<form action="action.php" method="post">
    <label for="name">1 число:</label>
    <input name="number_1" id="number_1" type="number">

    <label for="name">*2 число:</label>
    <input name="number_2" id="number_2" type="number">

    <button type="submit">=</button>
</form>
<?php
    $num_1 = (int)$_POST['number_1'];
    $num_2 = (int)$_POST['number_2'];

    $result = $num_1 * $num_2;

    $num_1_digits = str_split(strrev((string)$num_1));
    $num_2_digits = str_split(strrev((string)$num_2));

    $intermediate_results = [];
    $e=0;
    foreach ($num_2_digits as $digit_2) {
        $current_result = '';
        $carry = 0;
        
        foreach ($num_1_digits as $digit_1) {
            $product = ($digit_1 * $digit_2) + $carry;
            $carry = (int)($product / 10);
            $current_result .= $product % 10;
        }

        if ($carry > 0) {
            $current_result .= $carry;
        }

        $intermediate_results[] = strrev($current_result);
        $e++;
    }
    echo $num_1 . "<br>" . $num_2 . "<br>";
    echo str_repeat('-', $e) . PHP_EOL . "<br>";
    $line_length = strlen($intermediate_results[count($intermediate_results) - 1]);
    foreach ($intermediate_results as $index => $result_line) {
        for ($c=$e;$c!=0;$c--) {
            echo "&nbsp&nbsp";
        }
        echo str_pad($result_line, $line_length, ' ', STR_PAD_LEFT) . "<br>";
        $e--;

    }

    echo str_repeat('-', $line_length) . PHP_EOL . "<br>";
    echo str_pad($result, $line_length, ' ', STR_PAD_LEFT) . PHP_EOL;
?>
