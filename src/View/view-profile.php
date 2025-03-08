<?php include_once '../../templates/head.php'; ?>

<?php include_once '../../templates/header.php'; ?>

<main class="lg:max-w-[800px] w-screen mx-auto pt-38 lg:pt-26 min-h-[90vh]">
    <section class="flex justify-between lg:justify-center px-4 lg:px-8 w-full gap-0 lg:gap-16">
        <div class="flex items-center min-w-[50%]">
            <div class="bg-[url(../../assets/img/users/12/foot.jpg)] w-32 h-32 lg:w-42 lg:h-42 bg-cover bg-center rounded-full self-center"></div>
        </div>
        <div class="flex flex-col gap-2 lg:gap-4 min-w-[50%]">
            <div class="flex flex-col lg:flex-row gap-1 lg:gap-4">
                <span class="font-semibold text-xl"><?= $_SESSION['user_pseudo'] ?></span>
                <button class="btn btn-sm btn-neutral">Modifier le profil</button>
                <button class="btn btn-sm">Voir l'archive</button>
            </div>
            <div class="flex gap-1 lg:gap-4 flex-col lg:flex-row max-md:text-sm">
                <span class="lg:text-zinc-400"><span class="font-semibold text-zinc-900 dark:text-zinc-100"><?= $countProfile[0]['posts'] ?? '0' ?></span> publications</span>
                <span class="lg:text-zinc-400"><span class="font-semibold text-zinc-900 dark:text-zinc-100"><?= $countProfile[0]['followers'] ?? '0' ?></span> followers</span>
                <span class="lg:text-zinc-400"><span class="font-semibold text-zinc-900 dark:text-zinc-100"><?= $countProfile[0]['follows'] ?? '0' ?></span> suivi(e)s</span>
            </div>
            <span>description la galère</span>
        </div>
    </section>

    <section class="mt-8 px-1 lg:px-0">
        <div class="grid grid-cols-3 gap-2 mx-auto">
            <?php foreach ($allPosts as $post) { ?>
                <a href="controller-post.php?<?= "post=" . $post['post_id']?>">
                    <img src="../../assets/img/users/<?= $post['user_id'] . "/" . $post['pic_name'] ?>" alt="" class="w-[100%] h-full bg-cover bg-center">
                </a>
            <?php } ?>
        </div>
    </section>

</main>



<?php include_once '../../templates/end.php' ?>