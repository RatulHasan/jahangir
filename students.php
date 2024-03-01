<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Informations</title>
    <style>
        .heading{
            text-align: center;
            font-size: 50px;
        }
        .section{
            width: 1000px;
            height: auto;
            margin: auto;
            background-color: #f5eeee;
            padding: 1px 0px 1px 30px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: -1px 5px 10px rgb(104 93 93 / 50%);
        }
        .header-content {
        color: green;
        font-family: Arial, sans-serif;
        font-size: 22px;
        font-weight: bold;
        }
    </style>
</head>
<body>
    <h1 class="heading">Students Information</h1>
</body>
</html>

<?php

$students = [];
for ( $i = 1; $i <= 100; $i ++ ) {
    $student = [
        'count'     => $i,
        'name'     => 'Student = ' . $i,
        'roll'     => $i,
        'class'    => 'Class ' .rand( 1, 12 ),
        'subjects' => [ 'Math', 'Science', 'English', 'History' ],
        'marks'    => [
            'Math'    => rand( 40, 100 ),
            'Science' => rand( 40, 100 ),
            'English' => rand( 40, 100 ),
            'History' => rand( 40, 100 ),
        ],
    ];

    $students[] = $student;
}

foreach ($students as $student) {
    // echo "Hello Bangladesh" . '<br>';
    echo "<div class='section'>";
    echo "<p class='header-content'>Student - " . $student['count'] . "</p>";
    echo "<p><strong> Name : </strong>" . $student['name'] ."</p>";
    echo "<p><strong> Roll : </strong>" . $student['roll'] ."</p>";
    echo "<p><strong> Class : </strong>" . $student['class'] ."</p>";
    echo "<p><strong> Subject : </strong>" . implode(', ', $student['subjects']) . "</p>";
    echo "<p><strong> Marks : </strong>";
    echo "<ul>";
    foreach ($student['marks'] as $sub => $mark){
        echo "<li>$sub : $mark</li>";
    }
    echo "</ul>";
    echo "</div>";
}



?>