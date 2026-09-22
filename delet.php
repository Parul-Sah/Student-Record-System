<?php

$file = "students.php";

$students = file_exists($file) ? include($file) : [];

$id = $_GET["id"];

if (isset($students[$id])) {

    unset($students[$id]);

    $students = array_values($students);

    file_put_contents(
        $file,
        "<?php return " . var_export($students, true) . ";"
    );
}

header("Location: view.php");
exit();

?>