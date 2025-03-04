<?php include_once '../../templates/head.php'  ?>
<body>
    <div class="w-screen h-screen flex justify-center items-center bg-zinc-900/50 fixed" id="interface">
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
                        <input type="text" id="pseudo" max="" required name="pseudo" value="<?= $_POST['pseudo'] ?? "" ?>" placeholder="Titi76" />
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
    </div>



    <script src="../../assets/js/script.js"></script>


</body>

</html>