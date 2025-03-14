<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/header.php" ?>


<main class="lg:max-w-[800px] w-screen mx-auto pt-38 lg:pt-26 min-h-[90vh]">

    <section class="mt-10 flex gap-16 justify-center lg:justify-start">
        <div class="avatar">
            <div class="w-24 rounded-full">
                <img src="../../assets/img/avatar.png" />
            </div>
        </div>
        <div class="flex flex-col justify-center gap-3">
            <span class="font-semibold">Modifier l'avatar</span>
            <input type="file" class="file-input file-input-ghost" />
        </div>
    </section>
    <hr class="my-8 text-lime-600/20">

    <section class="px-4">
        <div class="collapse bg-base-100 border-base-300 border">
            <input type="checkbox" />
            <div class="collapse-title font-semibold">Paramètres du compte
            </div>
            <label class="collapse-content flex flex-col gap-4">

                <div class="text-sm flex flex-wrap gap-2">
                    <span class="w-full">Adresse email :</span>
                    <input type="email" placeholder="titi76@gmail.com" class="input input-ghost ml-4 w-[87%]" name="email" />
                    <button class="w-[10%] flex items-center justify-center border-2 border-lime-600/40 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 lg:size-6 self-center">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </button>
                </div>

                <div class="text-sm flex flex-wrap gap-2">
                    <span class="w-full">Pseudonyme</span>
                    <input type="text" placeholder="Titi76" class="input input-ghost ml-4 w-[87%]" name="pseudo" />
                    <button class="w-[10%] flex items-center justify-center border-2 border-lime-600/40 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 lg:size-6 self-center">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                    </button>
                </div>

            </label>
        </div>
    </section>

</main>


<?php include_once "../../templates/end.php" ?>