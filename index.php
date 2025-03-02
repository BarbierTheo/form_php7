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
    <nav class="fixed flex w-screen justify-between gap-1 mt-4 items-center px-16">
        <a href="" class="text-2xl font-semibold">Share</a>

        <div>
            <button class="btn bg-base-0 w-fit connect">Se connecter</button>
            <button class="btn bg-neutral-content text-base-100 w-fit inscription">S'inscrire</button>
        </div>

    </nav>

    <div class="w-screen h-screen hidden justify-center items-center bg-zinc-900/50 fixed" id="interface">
    </div>

    <script src="./assets/js/script.js"></script>
</body>

</html>