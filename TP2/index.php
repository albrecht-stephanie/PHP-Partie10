<?php
$isSubmitted = false;
//regex contrôle du formulaire
$regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
$firstname = $lastname = $age = $society = '';
$formSubmitted = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formSubmitted = true;
    //verif champ prénom
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)); //enlève les espaces vides avant et après + nettoyage en fonction du type 
    if (empty($firstname)) {//verifie si le champ est vide
        $errors['firstname'] = 'Veuillez renseigner le prénom';
    } elseif (!preg_match($regexName, $firstname)) {//comparatif avec la regex correspondante
        $errors['firstname'] = 'Votre prénom contient des caractères non autorisés !';
    }
    //verif champ nom
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
    if (empty($lastname)) {
        $errors['lastname'] = 'Veuillez renseigner le nom';
    } elseif (!preg_match($regexName, $lastname)) {
        $errors['lastname'] = 'Votre nom contient des caractères non autorisés !';
    }
    //verif champ age
    $age = trim(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT));
    if (empty($age)) {
        $errors['age'] = 'Veuillez renseigner un âge';
    } elseif ($age < 18) {
        $errors['age'] = 'Vous devez être majeur, désolé';
    }
    /* contrôle de l'âge
      $age = trim(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT));
      $options = array('options' => array('min_range' => 16, 'max_range' => 88));
      if (empty($age)) {
      $errors['age'] = 'Veuillez renseigner votre âge.';
      } elseif (!filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, $options)) {
      $errors['age'] = 'Votre âge n\'est pas correct !';
      } */
    //verif champ société
    $society = trim(filter_input(INPUT_POST, 'society', FILTER_SANITIZE_STRING));
    if (empty($society)) {
        $errors['society'] = 'Veuillez renseigner un nom de société';
    } elseif (!preg_match($regexName, $society)) {
        $errors['society'] = 'Votre nom de société contient des caractères non autorisés !';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TP2</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" media="screen" type="text/css" title="Mon style" href="assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="card col-sm-4 offset-4 bg-light">
                    <div class="card-header font-weight-bold text-center text-white bg-dark mb-2"><h1>Identification</h1></div>
                    <div class="font bg-light">

                        <form method="post" action="#">
                            <div class="identity">
                                <select name="civilities"<?php echo $civilities ?>>
                                    <option>M. </option>
                                    <option>MMe </option>
                                </select>
                                <span class="text-danger"><?= ($errors['civilities']) ?? '' ?></span>
                            </div>
                            <div class="lastname">
                                <label for="lastname"> Nom : </label>
                                <input type="text" id="lastname" name="lastname" placeholder="Dupont" value ="<?= $lastname ?>">
                                <span class="text-danger"><?= ($errors['lastname']) ?? '' ?></span>
                            </div>
                            <div class="firstname">
                                <label for="firstname"> Prénom: </label>
                                <input type="text" id="firstname" name="firstname" placeholder="Georges" value ="<?= $firstname ?>">
                                <span class="text-danger"><?= ($errors['firstname']) ?? '' ?></span>
                            </div>
                            <div class="age">
                                <label for="age"> Age: </label>
                                <input type="text" id="age" name="age" value ="<?= $age ?>">
                                <span class="text-danger"><?= ($errors['age']) ?? '' ?></span>
                            </div>
                            <div class="society">
                                <label for="society"> Société: </label>
                                <input type="text" id="society" name="society" placeholder="Societé" value ="<?= $society ?>">
                                <span class="text-danger"><?= ($errors['society']) ?? '' ?></span>
                            </div>
                            <div class="send">
                                <input class="btn btn-info col-sm-6 offset-3" type="submit" value="Valider"> 
                            </div>
                        </form>
                        <?php
                        // If the $formSubmitted is true and that no errors remain, display the informations registered by the user.
                        if ($formSubmitted && count($errors) == 0) {?>
                            <p><?= $civilities ?></p>
                            <p><?= $lastName ?></p>
                            <p><?= $firstName ?></p>
                            <p><?= $age ?></p>
                            <p><?= $society ?></p>
                            <?php }?>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>
