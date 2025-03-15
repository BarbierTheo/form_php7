<?php include_once '../../templates/head.php'  ?>

    <div class="w-screen h-screen flex justify-center items-center bg-base-100 fixed" id="interface">
        <div class="min-w-[90%] lg:min-w-[50rem] bg-base-300 rounded-2xl p-8 flex justify-center items-center shadow-md">
            <div class="flex flex-col w-full gap-4">

                <div class="flex items-center justify-between">
                    <span class="font-semibold text-2xl">Inscription validée</span>
                    <button href="" class="font-bold py-1 px-3 bg-red-700/50 rounded-md hover:bg-red-700/30 cursor-pointer" onclick="closeWindow()">X</button>
                </div>
                <hr class="w-full">
                <span class="text-md">Merci de votre inscription ! Vous pouvez dorénavant vous connecter.</span>

                <a class="btn bg-base-0 w-fit mx-auto connect" href="../Controller/controller-connexion.php">Connectez-vous</a>
            </div>
        </div>
    </div>
    
    <?php include_once '../../templates/footer.php'  ?>