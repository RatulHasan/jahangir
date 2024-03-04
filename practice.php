<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- php file add -->
    <?php

         $numbar1 = 10;
         $numbar2 = 5;
     
         // Initial calculation outside the loop
         $summation = $numbar1 + $numbar2;
         $subtraction = $numbar1 - $numbar2;
         $multiplication = $numbar1 * $numbar2;
         $division =  $numbar1 / $numbar2;
         $exp = 5 ** 5;
         $modulo = 11 % 6;

     
         for ($i = 1; $i <= 3; $i++) {
             // Print or use the results of calculations
           echo  "Iteration $i" . '<br>'. 
           "Summation: $summation" . '<br>' . 
           "Subtraction: $subtraction" . '<br>' . 
           "Multiplication: $multiplication" . '<br>' . 
           "Division: $division" . '<br>' . "Exponential: $exp " . '<br>' . "Modulo: $modulo". '<br>';
         }


    ?>

</body>
</html>