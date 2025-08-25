<!DOCTYPE html>
<html>
<body>

<h2>PHP Lab Tasks</h2>

<form method="post">
  <label>Select Task:</label><br>
  <select name="task">
    <option value="rectangle">1. Rectangle Area & Perimeter</option>
    <option value="vat">2. VAT Calculation</option>
    <option value="odd_even">3. Odd or Even</option>
    <option value="largest">4. Largest of 3 Numbers</option>
    <option value="odd_numbers">5. Odd Numbers 10-100</option>
    <option value="search_array">6. Search in Array</option>
    <option value="shapes">7. Print Shapes</option>
    <option value="array_shapes">8. 2D Array Shapes</option>
  </select>
  <br><br>

  <label>Enter Value 1:</label><br>
  <input type="text" name="val1"><br>
  <label>Enter Value 2:</label><br>
  <input type="text" name="val2"><br>
  <label>Enter Value 3 (if needed):</label><br>
  <input type="text" name="val3"><br><br>

  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $val3 = $_POST['val3'];

    echo "<h2>Result:</h2>";

    switch ($task) {
        // 1. Rectangle
        case "rectangle":
            $length = (float)$val1;
            $width  = (float)$val2;
            $area = $length * $width;
            $perimeter = 2 * ($length + $width);
            echo "Area = $area <br>";
            echo "Perimeter = $perimeter <br>";
            break;

        // 2. VAT
        case "vat":
            $amount = (float)$val1;
            $vat = 0.15 * $amount;
            echo "Amount = $amount <br>";
            echo "VAT (15%) = $vat <br>";
            break;

        // 3. Odd or Even
        case "odd_even":
            $num = (int)$val1;
            if ($num % 2 == 0) {
                echo "$num is Even";
            } else {
                echo "$num is Odd";
            }
            break;

        // 4. Largest of 3
        case "largest":
            $a = (int)$val1;
            $b = (int)$val2;
            $c = (int)$val3;
            if ($a >= $b && $a >= $c) {
                echo "Largest = $a";
            } elseif ($b >= $a && $b >= $c) {
                echo "Largest = $b";
            } else {
                echo "Largest = $c";
            }
            break;

        // 5. Odd numbers between 10–100
        case "odd_numbers":
            for ($i = 10; $i <= 100; $i++) {
                if ($i % 2 != 0) {
                    echo $i . " ";
                }
            }
            break;

        // 6. Search in Array
        case "search_array":
            $arr = [10, 20, 30, 40, 50];
            $search = (int)$val1;
            $found = false;
            foreach ($arr as $item) {
                if ($item == $search) {
                    $found = true;
                    break;
                }
            }
            if ($found) {
                echo "Element $search found in array!";
            } else {
                echo "Element $search not found.";
            }
            break;

        // 7. Shapes with Nested Loops
        case "shapes":
            echo "Shape 1:<br>";
            for ($i=1; $i<=3; $i++) {
                for ($j=1; $j<=$i; $j++) {
                    echo "* ";
                }
                echo "<br>";
            }

            echo "<br>Shape 2:<br>";
            $count = 1;
            for ($i=1; $i<=3; $i++) {
                for ($j=1; $j<=$i; $j++) {
                    echo $count++ . " ";
                }
                echo "<br>";
            }

            echo "<br>Shape 3:<br>";
            $char = 'A';
            for ($i=1; $i<=3; $i++) {
                for ($j=1; $j<=$i; $j++) {
                    echo $char++ . " ";
                }
                echo "<br>";
            }
            break;

        // 8. 2D Array Shapes
        case "array_shapes":
            $arr = [
                [1, 2, 3, 'A'],
                [1, 2, 'B', 'C'],
                [1, 'D', 'E', 'F']
            ];

            foreach ($arr as $row) {
                foreach ($row as $val) {
                    echo $val . " ";
                }
                echo "<br>";
            }
            break;

        default:
            echo "Please select a valid task.";
    }
}
?>

</body>
</html>
