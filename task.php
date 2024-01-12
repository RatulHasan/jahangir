<?php

// Data submitted
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photos = $_FILES['photo'];

    // Check if data folder exists
    if (!file_exists('data')) {
      mkdir('data', 0777, true);
    }
     // Check if photo folder exists
    if (!file_exists('photo')) {
        mkdir('photo', 0777, true);
    }

    // Check if file exists
    if (!file_exists('data/phonebook.csv')) {
        $file = fopen('data/phonebook.csv', 'w');
        $photoName = str_replace(' ', '+', $name);
        fputcsv($file, [$name, $email, $password]);
      }else{
        $file = fopen('data/phonebook.csv', 'a');
        $photoName = str_replace(' ', '+', $name);
        fputcsv($file, [$name, $email, $password]);
      }
}

// Read data
$file = fopen('data/phonebook.csv', 'r');
$phonebook = [];
while (($line = fgetcsv($file)) !== FALSE) {
  $phonebook[] = $line;
}



// // Check if file exists 
// // if (!file_exists('photo/photo.csv')) {
// //     $photos = fopen('photo/photo.csv', 'w');  
// //     $photoName = str_replace(' ', '+', $name);
// //     fputcsv($photos, [$photo]);
// // }else 
// if(file_exists('photo/photo.csv')){
//     $photos = fopen('photo/photo.csv', 'a');
//     $photoName = str_replace(' ', '+', $name);
//     fputcsv($photo, [$photos]);
// }


  



?>

<div style=" display: flex; justify-content: center;">

    <div style="background-color: #e9e9e9; width: 300px; height: 400px; padding: 20px; border-radius: 20px;">
        <h1 style= "font-weight: bold; text-align: center;">
            Login
        </h1>
        <form action="#" method="post" enctype='multipart/form-data'>
            <div style="margin-bottom: 10px">
                <label>
                    Name: <br>
                    <input type="text" name="name" placeholder="jahangir"><br>
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <label>
                    Email: <br>
                    <input type="text" name="email" placeholder="jahangir@gmail.com">
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <label>
                    Password:<br>
                    <input type="password" name="password" placeholder="password">
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <input type='file' name='photo'/>
            </div>
            <input type="submit" name= "submit" value="Submit">
        </form>
    </div>

    <ul style='list-style: none;'>
    <?php foreach ($phonebook as $contact): ?>
      <li style='display: flex; align-items: center; margin-bottom: 10px; border: 1px solid gray; padding: 10px; box-shadow: 0 0 5px 0 gray;'>
        <img src='<?php echo $contact[2]; ?>' width='50px' height='50px' style='border-radius: 50%; margin-right: 10px;' />
        <?php echo $contact[0]; ?> - <?php echo $contact[1]; ?>
      </li>
    <?php endforeach; ?>

</div>

