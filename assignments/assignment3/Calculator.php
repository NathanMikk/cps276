<?php

class Calculator{
    
    public function calc($operator,$firstNum = 0,$secondNum = "optional"){
        //checks for an operator "+,-,*, or /", and two integers
        $num;
        if(is_string($operator) && is_int($firstNum) && is_int($secondNum)){
            if($operator === "/"){
                if($secondNum == 0){
                    echo "Cannot divide by zero. <br>";
                }
                elseif($secondNum > 0){
                    $num = $firstNum / $secondNum;
                    echo "The division of the numbers is " .$num. " ". "<br>";
                }
            }
            elseif($operator === "*"){
                $num = $firstNum * $secondNum;
                echo "The product of the numbers is " .$num. " ". "<br>";
            }
            elseif($operator === "+"){
                $num = $firstNum + $secondNum;
                echo "The sum of the numbers is " .$num. " ". "<br>";
            }
            elseif($operator === "-"){
                $num = $firstNum - $secondNum;
                echo "The difference of the numbers is " .$num. " ". "<br>";
            }
        }
        else{
            return "You must enter a string and two numbers. <br>";
        }
    }
}    

?>

