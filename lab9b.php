<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sort Student Records</title>
<style>
body { font-family: Arial, sans-serif; text-align: center; margin-top: 20px; }
table { margin: auto; border-collapse: collapse; width: 80%; }
th, td { padding: 10px; border: 1px solid #ddd; }
th { background-color: #f4f4f4; }
</style>
</head>
<body>
<h1>Sorted Student Records</h1>
<table>
<tr><th>ID</th><th>Name</th><th>Grade</th></tr>
<?php
$conn = new mysqli("localhost", "root", "1239", "students031");
$students = $conn->query("SELECT * FROM students031")->fetch_all(MYSQLI_ASSOC);

for ($i = 0; $i < count($students) - 1; $i++) {
$min = $i;
for ($j = $i + 1; $j < count($students); $j++) {
if ($students[$j]['name'] < $students[$min]['name']) $min = $j;
}
$temp = $students[$min];
$students[$min] = $students[$i];
$students[$i] = $temp;
}
foreach ($students as $student) {
echo
"<tr><td>{$student['id']}</td><td>{$student['name']}</td><td>{$student['grade']
}</td></tr>";
}
$conn->close();
?>
</table>
</body>
</html>

<!-- sql part
create table students031 (id int primary key , name varchar(50) , grade float);
insert into students031 values (1,"chirashree",100);
insert into students031 values (2,"aditi",99);
insert into students031 values (3,"ramya",98);
insert into students031 values (4,"rithika",85);
insert into students031 values (5,"anu",100);
select * from students031; -->