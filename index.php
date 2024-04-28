<?php
$number = isset($_GET['number']) ? intval($_GET['number']) : 0;
if ($number > 0 && $number <= 1000) {
    function isPrime($num)
    {
        if ($num < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }
        return true;
    }

    $primeNumbers = array();
    for ($i = 2; $i <= $number; $i++) {
        if (isPrime($i)) {
            $primeNumbers[] = $i;
        }
    }
    echo implode(', ', $primeNumbers);
} else {
    echo 'параметр number должен быть от 2 до 1000';
}
?>