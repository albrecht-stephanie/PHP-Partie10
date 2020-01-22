<?php
//array des pays pour choix du pays de naissance
include "pays.php";
//fichier verif des champs
include 'form_validation.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TP1</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" media="screen" type="text/css" title="Mon style" href="assets/css/style.css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="card col-sm-10 offset-2 bg-light">
                    <div class="card-header font-weight-bold text-center text-white bg-dark mb-2"><h1>Formulaire d'inscription</h1></div>
                    <div class="font bg-light">
                        <?php
                    if ($isSubmitted && count($errors) == 0) {
                        ?>
                        <p>Nom : <?= $firstname ?></p>
                        <p>Prénom : <?= $lastname ?></p>
                        <p>Date de naissance : <?= $birthdate ?></p>
                        <p>Pays : <?= $country ?></p>
                        <p>Nationalité : <?= $nationality ?></p>
                        <p>Adresse : <?= $address ?></p>
                        <p>Code postal : <?= $zipcode ?></p>
                        <p>Ville : <?= $city ?></p>
                        <p>Email : <?= $mail ?></p>
                        <p>Téléphone : <?= $phone ?></p>
                        <p>Diplôme : <?= $graduation ?></p>
                        <p>Identifiant pôle-emploi : <?= $poleemploi ?></p>
                        <p>Nombre de badge : <?= $badge ?></p>
                        <p>Lien codecademy : <?= $codecademylink ?></p>
                        <p>Super héro : <?= $hero ?></p>
                        <p>Hack : <?= $hack ?></p>
                        <p>Expérience : <?= $experience ?></p>
                        <?php
                    }
                    else{
                    ?>
                        <form method="post" action="#" novalidate>
                                <h2>Identité</h2>
                                <div class="lfName">
                                    <label for="lastname"> Nom : </label>
                                    <input type="text" id="lastName" name="lastname" placeholder="Dupont" value ="<?= $lastname?>">
                                    <span class="text-danger"<?= ($errors['lastname']) ?? '' ?></span> <!--null coalesing operator-->
                                    <label for="firstname"> Prénom: </label>
                                    <input type="text" id="firstName" name="firstname" placeholder="Georges" value ="<?= $firstname?>">
                                    <span class="text-danger"<?= $errors['firstname'] ?? '' ?></span>
                                </div>
                                <div class="birth">
                                    <label for="birthdate"> Date de naissance: </label>
                                    <input type="date" id="birthDate" name="birthdate" placeholder="29/09/1969" min="1900-01-01" max="2020-01-01">
                                    <span class="text-danger"<?= $errors['birthdate'] ?? ''?></span> 
                                    <label for="country"> Pays de Naissance : </label>
                                    <select name="country">
                                        <option value="">Sélectionnez</option>
                                        <?php
                                        foreach ($countries as $countryId => $countryName) {
                                            ?>
                                            <option value="<?= $countryId ?>"
                                            <?= ($country == $countryId) ? 'selected' : '' ?>
                                                    >
                                                        <?= $countryName ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?= ($errors['country']) ?? '' ?></span>
                                </div>
                                <div class="nationality">
                                    <label for="nationality"> Nationalité : </label>
                                    <select name="nationality">
                                        <option value="">Sélectionnez</option>
                                        <?php foreach ($nationalites as $nationalityId => $nationalityName) { ?>
                                            <option value="<?= $nationalityId ?>" 
                                            <?= ($nationality == $nationalityId) ? 'selected' : '' ?>
                                                    >
                                                        <?= $nationalityName ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?= ($errors['nationality']) ?? '' ?></span>
                                </div>
                                <div class="address">
                                    <h2>Adresse</h2>
                                    <label for="address">Adresse : </label>
                                    <input type="text" name="address" id="address" placeholder="25 avenue du marché" value ="<?= $address?>">
                                    <span class="text-danger"<?= $errors['address'] ?? '' ?></span> 
                                </div>
                                <div class="cpAndCity">
                                    <label for="zipcode">Code Postal : </label>
                                    <input type="text" name="zipcode" id="zipcode" placeholder="80000" value ="<?= $zipcode?>">
                                   <span class="text-danger"<?= $errors['zipcode'] ?? ''?></span> 
                                    <label for="city">Ville : </label>
                                    <input type="text"  name="city" id="city" placeholder="Amiens" value ="<?= $city?>">
                                </div>
                                <div class="contact">
                                    <h2>Contact</h2>
                                    <label for="mail"> Mail: </label>
                                    <input type="email" id="mail" name="mail" placeholder="dupont.georges@free.fr" value ="<?= $mail?>">
                                    <span class="text-danger"<?= $errors['mail'] ?? ''?></span> 
                                    <label for="phone"> Mobile: </label>
                                    <input type="tel" id="phone" name="phone" placeholder="06.22.55.66.22" value ="<?= $phone?>">
                                    <span class="text-danger"<?= $errors['phone'] ?? ''?></span> 
                                </div>
                                <div class="proInfo">
                                    <h2>Informations complétaires</h2>
                                    <label for="graduation"> Diplôme: </label>
                                    <select name="graduation">
                                        <option value="0">-- Choisissez --</option>
                                        <option value="1">Sans</option>
                                        <option value="2">Bac</option>
                                        <option value="3">Bac+2</option>
                                        <option value="4">Bac+3 ou +</option>
                                    </select>
                                    <span class="text-danger"><?= ($errors['graduation']) ?? '' ?></span>
                                    <label for="poleemploi"> Identifiant Pôle Emploi: </label>
                                    <input type="text" id="poleemploi" name="poleemploi" placeholder="36951V"value ="<?= $poleemploi?>">
                                    <span class="text-danger"<?= $errors['poleemploi'] ?? ''?></span> 
                                    <label for="badge"> Nombre de badge: </label>
                                    <input type="number" id="badge" name="badge" placeholder="5">
                                    <span class="text-danger<?= $errors['badge'] ?? '' ?>"</span> 
                                    <label for="codecademylink"> lien code académie: </label>
                                    <input type="text" id="codecademylink" name="codecademylink" placeholder="www.upjv.amiens.fr" value ="<?= $codecademylink?>">
                                    <span class="text-danger"<?= $errors['codecademylink'] ?? ''?></span> 
                                </div>
                                <div class="more mb-4">
                                    <h2>Parlez nous de vous</h2>
                                    <label for="question1"> - Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ?</label>
                                    <input type="text" id="question" name="answer1" value ="<?= $question1 ?>">
                                    <span class="text-danger"<?= $errors['question1'] ?? ''?></span> 
                                    <label for="question2"> - Racontez-nous un de vos "hacks" (pas forcément technique ou informatique] :</label>
                                    <textarea id="answer2" name="answer2" rows="5" cols="33" value ="<?= $question2?>"></textarea>
                                    <span class="text-danger"<?= $errors['question2'] ?? ''?></span> 
                                    <<p>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</p>
                                <label for="experienceoui">oui</label>
                                <input type="radio" name="experience" id="experienceoui" value="1" <?= ($experience == 1) ? 'checked' : '' ?>/>
                                <label for="experiencenon">non</label>
                                <input type="radio" name="experience" id="experiencenon" value="0"  <?= ($experience == 0) ? 'checked' : '' ?>/>
                                <span class="text-danger"><?= ($errors['experience']) ?? '' ?></span>
                                </div>
                                <div class="send">
                                    <input class="btn btn-info col-sm-6 offset-3" type="submit" value="Valider"> 
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>  
        <?php }?>
    </body>
</html>

