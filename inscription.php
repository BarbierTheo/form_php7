<?php
$regexname = "/^[a-z ,.'-]+$/i";
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

    if (isset($_POST['birthdate'])) {
        if (empty($_POST['birthdate'])) {
            $errors['birthdate'] = "Rentrez votre date de naissance";
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
        }
    }
    
}

var_dump($errors);
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

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%] form-control">
                    Nom
                    <input type="text" class="" placeholder="Henry" required name="lastname" value="<?= $_POST['lastname'] ?? "" ?>" />

                    <span class="fieldset-label text-red-400/80"><?= $errors['lastname'] ?? "" ?></span>
                </label>

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                    Prénom
                    <input type="text" class="" placeholder="Thierry" required name="firstname" value="<?= $_POST['firstname'] ?? "" ?>" />

                    <span class="fieldset-label text-red-400/80"><?= $errors['firstname'] ?? "" ?></span>
                </label>
            </div>

            <label class="input input-bordered flex items-center gap-2 w-full">
                Date de naissance
                <input type="date" id="birth" value="" max="" required name="birthdate" value="<?= $_POST['birthdate'] ?? "" ?>" />
                <span class="fieldset-label text-red-400/80"><?= $errors['birthdate'] ?? "" ?></span>
            </label>

            <label class="input input-bordered flex items-center gap-2 w-full">
                Adresse mail
                <input type="email" class="w-full" placeholder="thierry.henry@gmail.com" required name="mail" value="<?= $_POST['mail'] ?? "" ?>" />
                <span class="fieldset-label text-red-400/80"><?= $errors['mail'] ?? "" ?></span>
            </label>

            <div class="flex flex-col lg:flex-row gap-2">

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                    Mot de passe
                    <input type="password" class="" placeholder="********" required name="password1"/>
                    <span class="fieldset-label text-red-400/80"><?= $errors['password1'] ?? "" ?></span>
                </label>

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                    Confirmation
                    <input type="password" class="" placeholder="********" required name="password2"/>
                    <span class="fieldset-label text-red-400/80"><?= $errors['password2'] ?? "" ?></span>
                </label>
            </div>

            <div class="flex flex-col lg:flex-row gap-2">
                <select class="select w-full lg:w-[50%]" required name="genre">
                    <option disabled selected>Genre</option>
                    <option>Homme</option>
                    <option>Femme</option>
                    <option>Autre</option>
                    <option>Ne pas préciser</option>
                </select>

                <label class="text-sm flex items-center justify-center w-full lg:w-[50%] gap-4 mt-4 lg:mt-0">
                    Accepter les conditions d'utilisations
                    <input type="checkbox" class="checkbox checkbox-md" required />
                </label>
            </div>

            <button class="btn bg-base-100 mt-4 w-fit mx-auto" type="submit">Inscrivez-vous</button>

        </form>

    </div>
</div>