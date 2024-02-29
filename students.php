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


// Open file pointer for writing
$filePointer = fopen('data/students.csv', 'w');

// Write header to CSV file
$header = ['Name', 'Roll', 'Class', 'Math Marks', 'Science Marks', 'English Marks', 'History Marks'];
fputcsv($filePointer, $header);

// Write student records to CSV file
foreach ($students as $student) {
    $row = [
        $student['name'],
        $student['roll'],
        $student['class'],
        $student['marks']['Math'],
        $student['marks']['Science'],
        $student['marks']['English'],
        $student['marks']['History']
    ];
    fputcsv($fp, $row);
}

// Close the file pointer
fclose($fp);










?>

