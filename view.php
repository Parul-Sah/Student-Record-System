<?php

$file = "students.php";

$students = file_exists($file) ? include($file) : [];

?>

<h1>Student Records</h1>

<a href="add.php">Add New Student</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>Name</th>
    <th>Roll No</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php

foreach ($students as $key => $student) {

    echo "<tr>";

    echo "<td>" . $student["name"] . "</td>";
    echo "<td>" . $student["roll"] . "</td>";
    echo "<td>" . $student["course"] . "</td>";

    echo "<td>";
    echo "<a href='edit.php?id=$key'>Edit</a> | ";
    echo "<a href='delete.php?id=$key'>Delete</a>";
    echo "</td>";

    echo "</tr>";
}

?>

</table>