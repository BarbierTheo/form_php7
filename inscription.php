<?php
$regexname = "/^[a-z ,.'-]+$/i";
$classicregex = "/^(?=.{3,20}$)(?![_.-])(?!.*[_.-]{2})[a-zA-Z0-9_-]+([^._-])$/";
$dateregex = "/^((19\d{2})|(20\d{2}))-(((02)-(0[1-9]|[1-2][0-9]))|(((0(1|[3-9]))|(1[0-2]))-(0[1-9]|[1-2][0-9]|30))|((01|03|05|07|08|10|12)-(31)))$/";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    var_dump($_POST);
    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = "Rentrez un nom";
        } else if (!preg_match($regexname, $_POST['lastname'])) {
            $errors['lastname'] = "Caractères non valide";
        }
    }

    if (isset($_POST['firstname'])) {
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = "Rentrez un prénom";
        } else if (!preg_match($regexname, $_POST['firstname'])) {
            $errors['firstname'] = "Caractères non valide";
        }
    }

    if (isset($_POST['pseudo'])) {
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = "Rentrez un prénom";
        } else if (!preg_match($classicregex, $_POST['pseudo'])) {
            $errors['pseudo'] = "Choisissez un pseudo en 3 et 20 caractères, sans caractères trop particuliers";
        }
    }

    if (isset($_POST['birthdate'])) {
        if (empty($_POST['birthdate'])) {
            $errors['birthdate'] = "Rentrez votre date de naissance";
        } else if (!preg_match($dateregex, $_POST['birthdate'])) {
            $errors['birthdate'] = "Date invalide";
        }
    }

    if (isset($_POST['mail'])) {
        if (empty($_POST['mail'])) {
            $errors['mail'] = "Rentrez votre adresse mail";
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Adresse mail invalide";
        }
    }

    if (isset($_POST['password1'])) {
        if (empty($_POST['password1'])) {
            $errors['password1'] = "Rentrez votre mot de passe";
        }
    }

    if (isset($_POST['password2'])) {
        if (empty($_POST['password2'])) {
            $errors['password2'] = "Confirmez votre mot de passe";
        } else if ($_POST['password1'] != $_POST['password2']) {
            $errors['password1'] = "Mot de passe non similaire";
            $errors['password2'] = "Mot de passe non similaire";
        }
    }

    if (!isset($_POST['genre'])) {
            $errors['genre'] = "Acceptez les conditions d'utilisations";

    }

    if (!isset($_POST['conditions'])) {
        $errors['conditions'] = "Acceptez les conditions d'utilisations";
    }
}

?>



<div class="min-w-[90%] lg:min-w-[50rem] bg-base-300 rounded-2xl p-8 flex justify-center items-center shadow-md">
    <div class="flex flex-col w-full gap-4">
        <div class="flex items-center justify-between">
            <span class="font-semibold text-2xl">Inscription</span>
            <button href="" class="font-bold py-1 px-3 bg-red-700/50 rounded-md hover:bg-red-700/30 cursor-pointer" onclick="closeWindow()">X</button>
        </div>
        <hr class="w-full">
        <form action="" method="post" class="flex flex-col flex-wrap justify-center gap-2" onsubmit="showConfirm()" novalidate>
            <div class="flex flex-col lg:flex-row gap-2">

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%] <?= isset($errors['lastname']) ? "border-red-800" : "" ?>">
                    Nom
                    <input type="text" class="" placeholder="Henry" required name="lastname" value="<?= $_POST['lastname'] ?? "" ?>" />

                    <span class="fieldset-label text-red-400/80"><?= $errors['lastname'] ?? "" ?></span>
                </label>

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%] <?= isset($errors['firstname']) ? "border-red-800" : "" ?>">
                    Prénom
                    <input type="text" class="" placeholder="Thierry" required name="firstname" value="<?= $_POST['firstname'] ?? "" ?>" />

                    <span class="fieldset-label text-red-400/80"><?= $errors['firstname'] ?? "" ?></span>
                </label>
            </div>

            <label class="input input-bordered flex items-center gap-2 w-full <?= isset($errors['pseudo']) ? "border-red-800" : "" ?>">
                Pseudonyme
                <input type="text" id="pseudo" max="" required name="pseudo" value="<?= $_POST['pseudo'] ?? "" ?>" placeholder="Titi76"/>
                <span class="fieldset-label text-red-400/80"><?= $errors['pseudo'] ?? "" ?></span>
            </label>

            <label class="input input-bordered flex items-center gap-2 w-full <?= isset($errors['birthdate']) ? "border-red-800" : "" ?>">
                Date de naissance
                <input type="date" id="birth" max="" required name="birthdate" value="<?= $_POST['birthdate'] ?? "" ?>" />
                <span class="fieldset-label text-red-400/80"><?= $errors['birthdate'] ?? "" ?></span>
            </label>


            <label class="input input-bordered flex items-center gap-2 w-full <?= isset($errors['mail']) ? "border-red-800" : "" ?>">
                Adresse mail
                <input type="email" class="w-full" placeholder="thierry.henry@gmail.com" required name="mail" value="<?= $_POST['mail'] ?? "" ?>" />
                <span class="fieldset-label text-red-400/80"><?= $errors['mail'] ?? "" ?></span>
            </label>

            <div class="flex flex-col lg:flex-row gap-2">

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%] <?= isset($errors['password1']) ? "border-red-800" : "" ?>">
                    Mot de passe
                    <input type="password" class="" placeholder="********" required name="password1" />
                    <span class="fieldset-label text-red-400/80"><?= $errors['password1'] ?? "" ?></span>
                </label>

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%] <?= isset($errors['password2']) ? "border-red-800" : "" ?>">
                    Confirmation
                    <input type="password" class="" placeholder="********" required name="password2" />
                    <span class="fieldset-label text-red-400/80"><?= $errors['password2'] ?? "" ?></span>
                </label>
            </div>

            <div class="flex flex-col lg:flex-row gap-2">
                <select class="select w-full lg:w-[50%] <?= isset($errors['genre']) ? "border-red-800" : "" ?>" required name="genre">
                    <option disabled <?= !isset($_POST['genre']) ? "selected" : "" ?>>Veuillez sélectionner un genre</option>
                    <option value="homme" <?= isset($_POST['genre']) && $_POST['genre'] == "homme" ? "selected" : "" ?>>Homme</option>
                    <option value="femme" <?= isset($_POST['genre']) && $_POST['genre'] == "femme" ? "selected" : "" ?>>Femme</option>
                    <option value="autre" <?= isset($_POST['genre']) && $_POST['genre'] == "autre" ? "selected" : "" ?>>Autre</option>
                    <option value="NaN" <?= isset($_POST['genre']) && $_POST['genre'] == "NaN" ? "selected" : "" ?>>Ne pas préciser</option>
                </select>

                <label class="text-sm flex items-center justify-center w-full lg:w-[50%] gap-4 mt-4 lg:mt-0">
                    Accepter les conditions d'utilisations
                    <input type="checkbox" class="checkbox checkbox-md <?= isset($errors['conditions']) ? "border-red-800" : "" ?>" required name="conditions" />
                </label>
            </div>

            <span class="fieldset-label text-red-400/80 text-center"><?= $errors['conditions'] ?? "" ?></span>
            <button class="btn bg-base-100 mt-4 w-fit mx-auto" type="submit">Inscrivez-vous</button>

        </form>

    </div>
</div>