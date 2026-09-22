<?php

$file = "students.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $course = $_POST["course"];

    $student = [
        "name" => $name,
        "roll" => $roll,
        "course" => $course
    ];

    $data = file_exists($file) ? include($file) : [];

    $data[] = $student;

    file_put_contents(
        $file,
        "<?php return " . var_export($data, true) . ";"
    );

    echo "Student added successfully!";
}

?>

<h1>Add Student</h1>

<form method="post">

    Name:
    <input type="text" name="name" required>
    <br><br>

    Roll No:
    <input type="number" name="roll" required>
    <br><br>

    Course:
    <input type="text" name="course" required>
    <br><br>

    <input type="submit" value="Add Student">

</form>

<br>

<a href="view.php">View Students</a>