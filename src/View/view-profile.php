<?php include_once '../../templates/head.php'  ?>

<body>
    <div class="w-screen h-screen flex justify-center items-center bg-zinc-900/50 fixed" id="interface">
        <div class="min-w-[90%] lg:min-w-[50rem] bg-base-300 rounded-2xl p-8 flex justify-center items-center shadow-md">
            <div class="flex flex-col w-full gap-4">
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-2xl">Profil</span>
                    <a href="../Controller/controller-connexion.php" class="font-bold py-1 px-3 bg-red-700/50 rounded-md hover:bg-red-700/30 cursor-pointer">X</a>
                </div>
                <hr class="w-full">
                <div class="flex flex-col gap-1">

                    <p><span class="font-bold">Pseudo :</span> Ouais</p>
                    <p><span class="font-bold">Nom :</span> Machin</p>
                    <p><span class="font-bold">Prénom :</span> Chouette</p>
                    <p><span class="font-bold">Adresse mail :</span> Chouette@aaa.com</p>
                    <p><span class="font-bold">Date de naissance :</span> 1995-07-28</p>

                </div>
            </div>
        </div>
</body>


</html>