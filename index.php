<?php

  // Data submitted
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Check if data folder exists
    if (!file_exists('data')) {
      mkdir('data', 0777, true);
    }

    // Check if file exists
    if (!file_exists('data/phonebook.csv')) {
      $file = fopen('data/phonebook.csv', 'w');
      $photoName = str_replace(' ', '+', $name);
      fputcsv($file, [$name, $phone, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
    }else{
      $file = fopen('data/phonebook.csv', 'a');
      $photoName = str_replace(' ', '+', $name);
      fputcsv($file, [$name, $phone, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
    }
  }
  // Read data
  $file = fopen('data/phonebook.csv', 'r');
  $phonebook = [];
  while (($line = fgetcsv($file)) !== FALSE) {
    $phonebook[] = $line;
  }
?>
<div style="display: flex; justify-content: center;">

  <div style='width: 200px; height: 250px; border: 1px solid gray; padding: 30px; margin-top: 15px;'>
    <h1 style='text-align: center;'>
      Phonebook
    </h1>
    <form action='#' method='post' enctype='multipart/form-data'>
      <div style="margin-bottom: 10px">
        <label>
          Name:
          <input type='text' name='name'/>
        </label>
      </div>
      <div style='margin-bottom: 10px'>
        <label>
          Phone:
          <input type='text' name='phone'/>
        </label>
      </div>
      <div style='margin-bottom: 10px'>
        <input type='file' name='photo'/>
      </div>
      <input type='submit' name='submit' value='Submit'/>
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
