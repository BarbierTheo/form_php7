<div class="min-w-[90%] lg:min-w-[50rem] bg-base-300 rounded-2xl p-8 flex justify-center items-center shadow-md">
    <div class="flex flex-col w-full gap-4">
        <div class="flex items-center justify-between">
            <span class="font-semibold text-2xl">Inscription</span>
            <button href="" class="font-bold py-1 px-3 bg-red-700/50 rounded-md hover:bg-red-700/30 cursor-pointer" onclick="closeWindow()">X</button>
        </div>
        <hr class="w-full">
        <form action="" class="flex flex-col flex-wrap justify-center gap-2" onsubmit="showConfirm()">
            <div class="flex flex-col lg:flex-row gap-2">

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%] form-control ">
                    Nom
                    <input type="text" class="" placeholder="Henry" required="required" />

                    <span class="fieldset-label text-red-400/80 hidden">Incorrect</span>
                </label>

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                    Prénom
                    <input type="text" class="" placeholder="Thierry" required="required" />

                </label>
            </div>

            <label class="input input-bordered flex items-center gap-2 w-full">
                Date de naissance
                <input type="date" id="birth" value="" max="" required="required" />
            </label>

            <label class="input input-bordered flex items-center gap-2 w-full">
                Adresse mail
                <input type="email" class="w-full" placeholder="thierry.henry@gmail.com" required="required" />
            </label>

            <div class="flex flex-col lg:flex-row gap-2">

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                    Mot de passe
                    <input type="password" class="" placeholder="********" required="required" />
                </label>

                <label class="input input-bordered flex items-center gap-2 w-full lg:w-[50%]">
                    Confirmation
                    <input type="password" class="" placeholder="********" required="required" />
                </label>
            </div>

            <div class="flex flex-col lg:flex-row gap-2">
                <select class="select w-full lg:w-[50%]" required="required">
                    <option disabled selected>Genre</option>
                    <option>Homme</option>
                    <option>Femme</option>
                    <option>Autre</option>
                    <option>Ne pas préciser</option>
                </select>

                <label class="text-sm flex items-center justify-center w-full lg:w-[50%] gap-4 mt-4 lg:mt-0">
                    Accepter les conditions d'utilisations
                    <input type="checkbox" class="checkbox checkbox-md" required="required" />
                </label>
            </div>

            <button class="btn bg-base-100 mt-4 w-fit mx-auto" type="submit">Inscrivez-vous</button>

        </form>

    </div>
</div>