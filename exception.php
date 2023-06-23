<?php

// class StringAllowedException extends Exception {

//   public function errorMessage() {
//     $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
//     .': <b>'.$this->getMessage().'</b> is not a valid string';
//     return $errorMsg;
//   }

// }

// try {
//   $name = 'test';
//   if (is_string($name)) {
//     echo strtolower($name);
//   } else {
//    throw new StringAllowedException($name); 
//   }
  
// } catch(StringAllowedException $e) {
//   echo $e->errorMessage();
// }

// try {
//     $result = 1 / 0;
// } catch ( DivisionByZeroError $e) {
//     echo "Error: ", $e -> getMessage(), "\n";
// } finally {
//     echo "Executing finally block";
// }

// try {
//     echo strlen('ahmed', 4);
// } catch (ArgumentCountError $e) {
//     echo $e->getMessage();
// }

try {
    print_r(explode('Test string'));
} catch (ArgumentCountError $e) {
    echo $e->getMessage();
}
?>