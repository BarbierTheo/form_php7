<?php include_once '../../templates/head.php'  ?>

<body>

    <header class="min-h-[5vh] flex justify-between items-center mx-8 pt-4">
        <a href="" class="text-lg font-semibold self-start lg:self-center">Instagram</a>
        <div class="flex flex-col lg:flex-row items-end lg:items-center gap-1 lg:gap-4">
            <a href="../Controller/controller-deconnexion.php" class="btn btn-soft">Deconnexion</a>
        </div>

    </header>
    <div class="mt-8 lg:mt-16 flex justify-around gap-4 md:gap-8 items-center mx-4 md:mx-14 lg:mx-auto lg:w-[50%]">
        <div class="bg-[url(../../assets/img/users/12/foot.jpg)] w-26 h-26 md:w-32 md:h-32 lg:w-42 lg:h-42 bg-cover bg-center rounded-full self-start lg:self-center">
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-1">
                <span class="text-xl lg:text-3xl font-semibold"><?= $_SESSION['user_pseudo'] ?></span>
                <span class="text-sm">Que des numéros 9 dans ma team</span>
            </div>
            <div class="flex gap-3 lg:gap-8">
                <div class="flex flex-col items-center">
                    <span class="font-semibold lg:text-lg">8</span>
                    <span class="text-sm leading-2">publications</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="font-semibold lg:text-lg">17</span>
                    <span class="text-sm leading-2">followers</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="font-semibold lg:text-lg">23</span>
                    <span class="text-sm leading-2">suivi.e.s</span>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row mt-4 gap-2">
                <button class="btn btn-neutral">Ajouter une photo</button>
            </div>
        </div>
    </div>
    <main class="mt-4 lg:mt-16 w-full mb-8">
        <div class="grid grid-cols-3 gap-2 mx-auto max-w-[90%] lg:max-w-[1300px]">
            <?php foreach ($allPosts as $post) { ?>
                <img src="../../assets/img/users/<?= $post['user_id'] . "/" . $post['pic_name'] ?>" alt="" class="w-[100%] h-full bg-cover bg-center rounded-sm">
            <?php } ?>
        </div>
    </main>
    <footer class="flex w-full justify-center mt-12 mb-4">
            <a href="" class="hover:underline font-light">Mentions légales</a>
    </footer>
</body>

</html>