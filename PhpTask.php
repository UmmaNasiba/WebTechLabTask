
<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Form</title>
</head>
<body>

    <h2>Enter Your Name</h2>

    <form action="PhpTask.php" method="get">
        <label>Your Name:</label>
        <input type="text" name="name" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>



<?php

$name_input = isset($_GET['name']) ? $_GET['name'] : "Guest";

$marks = array(65, 40, 78, 55, 30);

echo "<h3>Student Marks:</h3>";
foreach($marks as $m) {
    echo $m . "<br>";
}

function calculateAverage($arr) {
    $total = 0;
    foreach($arr as $value) {
        $total += $value;
    }
    return $total / count($arr);
}

$total = 0;
foreach($marks as $m) {
    $total += $m;
}

$average = calculateAverage($marks);

$max = max($marks);
$min = min($marks);

$avg_int = (int)$average;

echo "<h3>Results:</h3>";
echo "Total = $total <br>";
echo "Average = $average <br>";
echo "Average (Integer) = $avg_int <br>";
echo "Maximum = $max <br>";
echo "Minimum = $min <br>";

$pass = 0;
$fail = 0;

foreach($marks as $m) {
    if($m >= 50) {
        $pass++;
    } else {
        $fail++;
    }
}

echo "<h3>Pass/Fail:</h3>";
echo "Passed = $pass <br>";
echo "Failed = $fail <br>";

$student = array(
    "name" => "Nasiba",
    "id" => "12345",
    "cgpa" => 3.75
);

echo "<h3>Student Details:</h3>";
foreach($student as $key => $value) {
    echo $key . " : " . $value . "<br>";
}

echo "<h3>String Operations:</h3>";
echo "Uppercase Name = " . strtoupper($student["name"]) . "<br>";
echo "Name Length = " . strlen($student["name"]) . "<br>";

sort($marks);
echo "<h3>Sorted Marks:</h3>";
foreach($marks as $m) {
    echo $m . "<br>";
}

echo "<h3>User Input:</h3>";
echo "Hello, " . $name_input;
?>