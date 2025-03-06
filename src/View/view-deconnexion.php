<?php include_once '../../templates/head.php'  ?>

<body>
    <div class="w-screen h-screen flex justify-center items-center bg-zinc-900/50 fixed" id="interface">
        <div class="min-w-[90%] lg:min-w-[50rem] bg-base-300 rounded-2xl p-8 flex justify-center items-center shadow-md">
            <div class="flex flex-col w-full gap-4">

                <div class="flex items-center justify-between">
                    <span class="font-semibold text-2xl">Deconnecté</span>
                </div>
                <hr class="w-full">
                <span class="text-md">Vous pouvez vous reconnecter</span>

                <a class="btn bg-base-0 w-fit mx-auto connect" href="../Controller/controller-connexion.php">Connectez-vous</a>
            </div>
        </div>
    </div>
</body>