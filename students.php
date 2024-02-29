<?php

$students = [];
for ( $i = 1; $i <= 5; $i ++ ) {
    $student = [
        'name'     => 'Student' . $i,
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
    echo "hello world";
}


?>





<!-- Name: Student1
Roll: 1
Class: Class 7
Subjects: Math, Science, English, History
Marks:
  Math: 85
  Science: 76
  English: 94
  History: 65 -->