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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 lg:size-6 self-center">
                            <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div class="text-sm flex flex-wrap gap-2">
                    <span class="w-full">Pseudonyme</span>
                    <input type="text" placeholder="Titi76" class="input input-ghost ml-4 w-[87%]" name="pseudo" />
                    <button class="w-[10%] flex items-center justify-center border-2 border-lime-600/40 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 lg:size-6 self-center">
                            <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <form method="post" class="text-sm flex flex-wrap gap-2">
                    <span class="w-full">Thème</span>
                    <select class="select select-ghost  w-[87%]" name="theme">
                        <option selected value="lemonade">Lemonade</option>
                        <option value="retro">Retro</option>
                        <option value="garden">Garden</option>
                        <option value="forest">Forest</option>
                        <option value="winter">Winter</option>
                        <option value="valentine">Valentine</option>
                        <option value="night">Night</option>
                        <option value="luxury">Luxury</option>
                    </select>
                    <button class="w-[10%] flex items-center justify-center border-2 border-lime-600/40 rounded-lg cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 lg:size-6 self-center">
                            <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>


            </label>
        </div>
    </section>

</main>


<?php include_once "../../templates/end.php" ?>