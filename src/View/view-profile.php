<?php include_once '../../templates/head.php'; ?>

<?php include_once '../../templates/header.php'; ?>

<main class="lg:max-w-[800px] w-screen mx-auto pt-38 lg:pt-26 min-h-[90vh]">
    <section class="flex justify-between lg:justify-center px-4 lg:px-8 w-full gap-0 lg:gap-16">

        <div class="flex items-center min-w-[50%]">
            <div class="avatar">
                <div class="w-32 rounded-full">
                    <img src="../../assets/img/<?= $profile['user_avatar'] ?>" />
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2 lg:gap-4 min-w-[50%]">
            <div class="flex flex-col lg:flex-row gap-1 lg:gap-4">
                <span class="font-semibold text-xl"><?= $_SESSION['user_pseudo'] ?></span>
                <a class="btn btn-sm" href="../Controller/controller-editprofile.php">Modifier le profil</a>
            </div>

            <div class="flex gap-1 lg:gap-4 flex-col lg:flex-row max-md:text-sm">
                <span class="lg:text-zinc-400"><span class="font-semibold text-base-content"><?= $countProfile[0]['posts'] ?? '0' ?></span> publications</span>
                <span class="lg:text-zinc-400"><span class="font-semibold text-base-content"><?= $countProfile[0]['followers'] ?? '0' ?></span> followers</span>
                <span class="lg:text-zinc-400"><span class="font-semibold text-base-content"><?= $countProfile[0]['follows'] ?? '0' ?></span> suivi(e)s</span>
            </div>
            <span class="break-words"><?= $profile['user_description'] ?></span>
        </div>
    </section>

    <section class="mt-8 px-1 lg:px-0">
        <div class="grid grid-cols-3 gap-2 mx-auto">
            <?php if (isset($allPosts)) {
                foreach ($allPosts as $post) { ?>
                    <a href="controller-post.php?<?= "post=" . $post['post_id'] ?>" class="">
                        <img src="../../assets/img/users/<?= $post['user_id'] . "/" . $post['pic_name'] ?>" alt="" class="w-32 h-32 sm:w-40 sm:h-40 md:w-60 md:h-60 lg:w-70 lg:h-70 object-cover">
                    </a>
            <?php }
            } ?>
        </div>
    </section>

</main>



<?php include_once '../../templates/end.php' ?>