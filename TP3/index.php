<?php
$portrait1 = array('name' => 'Victor', 'firstname' => 'Hugo', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
$portrait2 = array('name' => 'Jean', 'firstname' => 'de La Fontaine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
$portrait3 = array('name' => 'Pierre', 'firstname' => 'Corneille', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
$portrait4 = array('name' => 'Jean', 'firstname' => 'Racine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');

function displayTab() {
    $portraits = func_get_args();
    foreach ($portraits as $portrait) {
        $name = $portrait['name'];
        $firstName = $portrait['firstname'];
        $portrait = $portrait['portrait'];
        ?>
        <div class="portrait">
            <div>
                <?= $name ?>
                <?= $firstName ?>
            </div>
            <div>
                <img src="<?= $portrait ?>" width="200" height="200">
            </div>
        </div>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TP3</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>   
        <div class="container">
            <div class="row">
                <div class="card col-sm-8 bg-light offset-2">
                    <div class="card-header font-weight-bold bg-info"> Portraits</div>
                    <div class="font bg-light">
                        <?= displayTab($portrait1, $portrait2, $portrait3, $portrait4) ?>
                        <?php /*
                          for ($j = 1; $j <= 4; $j++) {
                          $portrait = "portrait" . $j;
                          foreach ($$portrait as $key => $portraitComplet) {
                          if ($key == "portrait") {
                          echo '<img src="' . $portraitComplet . '" alt="image" style="width:200px;<br>">';
                          } else {
                          echo $portraitComplet . "<br>";
                          }
                          }
                          }
                         */ ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>