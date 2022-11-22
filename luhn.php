<?php

class LuhnAlgorithm
{

    public function isItTrueCardNumber($cardNumber)
    {
        $cnumber = $cardNumber;

        $cardNumberDigit = $this->getDigit($cnumber);

        $z = 0;
        for ($x = 1; $x < 16; $x += 2) {
            $multiplication[$z] = $cardNumberDigit[$x] * 2;

            if ($multiplication[$z] > 9) {
                $digit = $this->getDigit($multiplication[$z]);
                $multiplication[$z] = $digit[0] + $digit[1];
            }
            $z++;
        }

        $totalCardleft = 0;
        for ($x = 0; $x < 16; $x += 2) {
            $totalCardleft = $totalCardleft + $cardNumberDigit[$x];
        }

        $totalMultiplication = 0;
        for ($z = 0; $z <= 7; $z += 1) {
            $totalMultiplication = $totalMultiplication + $multiplication[$z];
        }

        $total = $totalCardleft + $totalMultiplication;

        if ($total % 10 == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDigit($number)
    {
        $i = 0;
        while ($number >= 1) {
            $numberDigit[$i] = $number % 10;
            $number = $number / 10;
            $i++;
        }
        return $numberDigit;
    }
}
//using
$cardNumber=4014264969999653;
$l = new LuhnAlgorithm;
if($l->isItTrueCardNumber($cardNumber)){
    echo "true";
}
else{
    echo "false";
}

