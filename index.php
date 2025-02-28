<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>en form aujourd'hui</title>
    <!-- npx @tailwindcss/cli -i ./assets/css/style.css -o ./assets/css/tailwind.css --watch -->
    <link rel="stylesheet" href="./assets/css/tailwind.css">
</head>

<body>

    <div class="w-screen h-screen flex justify-center items-center">

        <div class="min-w-[90%] lg:min-w-[50rem] bg-base-300 rounded-2xl p-8 flex justify-center items-center shadow-md">
            <div class="flex flex-col w-full font-semibold text-2xl gap-4">

                <span>Inscription</span>
                <hr class="w-full">
                <form action="" class="flex flex-col flex-wrap justify-center gap-2">
                    <div class="flex flex-col lg:flex-row gap-2">

                        <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%] form-control ">
                            Nom
                            <input type="text" name="name" class="" placeholder="Henry" />

                            <!-- <span class="fieldset-label text-red-400/80">Incorrect</span> -->
                            <!-- <span class="fieldset-label text-yellow-400/80">Obligatoire</span> -->
                        </label>

                        <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                            Prénom
                            <input type="text" name="surname" class="" placeholder="Thierry" />
                            
                        </label>
                    </div>

                    <label class="input input-bordered flex items-center gap-2 w-full">
                        Date de naissance
                        <input type="date" id="birth" name="birthDate" value="" max="" />
                    </label>

                    <label class="input input-bordered flex items-center gap-2 w-full">
                        Adresse mail
                        <input type="email" name="email" class="w-full" placeholder="thierry.henry@gmail.com" />
                    </label>

                    <div class="flex flex-col lg:flex-row gap-2">

                        <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                            Mot de passe
                            <input type="password" class="" placeholder="********" />
                        </label>

                        <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                            Confirmation
                            <input type="password" class="" placeholder="********" />
                        </label>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-2">
                        <select class="select w-full lg:w-[50%]" name="gender">
                            <option disabled selected>Genre</option>
                            <option>Homme</option>
                            <option>Femme</option>
                            <option>Autre</option>
                            <option>Ne pas préciser</option>
                        </select>

                        <label class="text-sm flex items-center justify-center w-full lg:w-[50%] gap-4 mt-4 lg:mt-0">
                            Accepter les conditions d'utilisations
                            <input type="checkbox" class="checkbox checkbox-md" name="conditions" />
                        </label>
                    </div>

                    <button class="btn btn-lg xl:btn-xl bg-base-100 mt-4 w-fit mx-auto" type="submit">Inscrivez-vous</button>

                </form>

            </div>
        </div>

    </div>

    <script type="module" src="https://unpkg.com/cally"></script>
</body>

</html>