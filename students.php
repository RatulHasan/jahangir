<?php

$students = [];
for ( $i = 1; $i <= 100; $i ++ ) {
    $student = [
        'name'     => 'Student' . $i,
        'roll'     => $i,
        'class'    => 'Class ' . rand( 1, 12 ),
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
