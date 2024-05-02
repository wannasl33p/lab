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

    $product = $num_1 * $num_2;

    $num_1_d = str_split(strrev((string)$num_1));
    $num_2_d = str_split(strrev((string)$num_2));

    $result_lines = [];

    foreach ($num_2_d as $index2 => $digit2) {
        $line = "";
        $carry = 0;
        for ($i = 0; $i < $index2; $i++) {
            $line .= "&nbsp;";
        }

        foreach ($num_1_d as $index1 => $digit1) {
            $p_product = $digit1 * $digit2 + $carry;
            $carry = floor($p_product / 10);
            $line .= $p_product % 10;
        }

        if ($carry > 0) {
            $line .= $carry;
        }

        $result_lines[] = $line;
    }
    $result_lines[] = str_repeat("-", max(strlen($num_1), strlen($num_2)));
    $result_lines[] = $product;
    echo implode("<br>", array_reverse($result_lines));
?>

