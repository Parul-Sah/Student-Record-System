<?php

$file = "students.php";

$students = file_exists($file) ? include($file) : [];

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $students[$id]["name"] = $_POST["name"];
    $students[$id]["roll"] = $_POST["roll"];
    $students[$id]["course"] = $_POST["course"];

    file_put_contents(
        $file,
        "<?php return " . var_export($students, true) . ";"
    );

    header("Location: view.php");
    exit();
}

$student = $students[$id];

?>

<h1>Edit Student</h1>

<form method="post">

    Name:
    <input type="text" name="name"
           value="<?php echo $student['name']; ?>" required>

    <br><br>

    Roll No:
    <input type="number" name="roll"
           value="<?php echo $student['roll']; ?>" required>

    <br><br>

    Course:
    <input type="text" name="course"
           value="<?php echo $student['course']; ?>" required>

    <br><br>

    <input type="submit" value="Update Student">

</form>

<br>

<a href="view.php">Back</a>