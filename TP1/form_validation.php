<?php
$isSubmitted = false;
//variables msg d'alerte champs mal saisis
$firstname = $lastname = $birthdate = $country = $nationality = $address = $zipcode = $city = $mail = $phone = $graduation = $poleemploi = $badge = $codecademylink = $question1 = $question = $experience = '';
//regex pour les contrôle du formulaire
$regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
$regexDate = "/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
$regexZipCode = "/^((2[AB])|([0-9]{5}))$/";
$regexAddress = "/\w/";
$regexTel = "/^0[67](\.[0-9]{2}){4}$/";
$regexPoleEmploi = "/^[0-9]{7}[A-Za-z]$/";
//tableau d'erreurs
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmitted = true;
     //verif champ prénom
    $firstname = trim(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));//enlève les espaces vides avant et après + nettoyage en fonction du type 
    if (empty($firstname)) {//verifie si le champ est vide
        $errors['firstname'] = 'Veuillez renseigner le prénom';
    } elseif (!preg_match($regexName, $firstname)) {//comparatif avec la regex correspondante
        $errors['firstname'] = 'Votre prénom contient des caractères non autorisés !';
    }
     //verif champ nom
    $lastname = trim(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));
    if (empty($lastname)) {
        $errors['lastname'] = 'Veuillez renseigner le nom';
    } elseif (!preg_match($regexName, $lastname)) {
        $errors['lastname'] = 'Votre nom contient des caractères non autorisés !';
    }
     //verif champ date d'anniversaire
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    if (empty($birthdate)) {
        $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';
    } elseif (!preg_match($regexDate, $birthdate)) {
        $errors['birthdate'] = 'Le format valide est aaaa-mm-jj !';
    }
     //verif champ pays de naissance
    $country = trim(filter_input(INPUT_POST,'country',FILTER_SANITIZE_NUMBER_INT));// nettoyage sprécial chiffre
    if (empty($country)) {
        $errors['country'] = 'Veuillez choisir votre pays';
    } elseif (!filter_input(INPUT_POST, 'country', FILTER_VALIDATE_INT)) {
        $errors['country'] = 'Votre pays n\'est pas bon !';
    }
     //verif champ nationalité
     $nationality = trim(filter_input(INPUT_POST,'nationality',FILTER_SANITIZE_NUMBER_INT));
    if (empty($nationality)) {
        $errors['nationality'] = 'Veuillez renseigner votre nationalité';
    } elseif (!filter_input(INPUT_POST, 'nationality', FILTER_VALIDATE_INT)) {
        $errors['nationality'] = 'Votre nationalité contient des caractères non autorisés !';
    }
     //verif champ adresse
    $address =  trim(filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING));
    if (empty($address)) {
        $errors['address'] = 'Veuillez renseigner votre adresse';
    } elseif (!preg_match($regexAddress, $address)) {
        $errors['address'] = 'Le format de l\'adresse n\'est pas valide!';
    }
     //verif champ code postal
    $zipcode =  trim(filter_input(INPUT_POST,'zipcode',FILTER_SANITIZE_STRING));
    if (empty($zipcode)) {
        $errors['zipcode'] = 'Veuillez renseigner votre code postal';
    } elseif (!preg_match($regexZipCode, $zipcode)) {
        $errors['zipcode'] = 'Le format du code postal n\'est pas valide!';
    }
     //verif champ ville
    $city =  trim(filter_input(INPUT_POST,'city',FILTER_SANITIZE_STRING));
    if (empty($city)) {
        $errors['city'] = 'Veuillez renseigner votre ville';
    } elseif (!preg_match($regexName, $city)) {
        $errors['city'] = 'Le format de la ville n\'est pas valide!';
    }
     //verif champ mail
     $mail = trim(htmlspecialchars($_POST['mail']));
    if (empty($mail)) {
        $errors['mail'] = 'Veuillez renseigner votre email';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'L\' email  n\'est pas valide!';
    }
     //verif champ mobile
    $phone = trim(htmlspecialchars($_POST['phone']));
    if (empty($phone)) {
        $errors['phone'] = 'Veuillez renseigner votre téléphone';
    } elseif (!preg_match($regexTel, $phone)) {
        $errors['phone'] = 'Le format du téléphone n\'est pas valide!';
    }
     //verif champ identifiant pole emploi
    $poleemploi = trim(htmlspecialchars($_POST['poleemploi']));
    if (empty($poleemploi)) {
        $errors['poleemploi'] = 'Veuillez renseigner votre identifiant pole-emploi';
    } elseif (!preg_match($regexPoleEmploi, $poleemploi)) {
        $errors['poleemploi'] = 'L\' identifiant pole-emploi n\'est pas valide!';
    }
     //verif champ lien codecademy
    $codecademylink = trim(htmlspecialchars($_POST['codecademylink']));
    if (empty($codecademylink)) {
        $errors['codecademylink'] = 'Veuillez renseigner le lien codecademy';
    } elseif (!filter_var($codecademylink, FILTER_VALIDATE_URL)) {
        $errors['codecademylink'] = 'L\' url codecademy  n\'est pas valide!';
    }
     //verif champ qiestion 1
    $hero = trim(filter_input(INPUT_POST,'hero',FILTER_SANITIZE_STRING));
    if (empty($hero)) {
        $errors['hero'] = 'Veuillez nous racontez quel super héros vous souhaiteriez être';
    } 
    //verif champ question 2
    $hack = trim(filter_input(INPUT_POST,'hack',FILTER_SANITIZE_STRING));
    if (empty($hack)) {
        $errors['hack'] = 'Veuillez nous racontez un de vos "hacks"';
    } 
    //verif champ question 3
    $experience =trim(filter_input(INPUT_POST,'experience',FILTER_SANITIZE_NUMBER_INT));
    if(!isset($_POST['experience'])){
        $errors['experience'] = 'Veuillez renseigner votre experience "';
    }
 }