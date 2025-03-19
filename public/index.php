<?php include_once '../../templates/head.php'  ?>

<?php include_once '../../templates/header.php'  ?>

<main class="lg:max-w-[800px] mx-auto pt-14 min-h-[90vh]">
    <section class="w-full mt-16 lg:mt-8 py-4 flex flex-col gap-6">

        <?php
        $iteration = -1;
        foreach ($allPosts as $value) {
            $iteration++;
        ?>
            <div class="flex flex-col gap-3">

                <div class="flex px-4 gap-4 items-center justify-between">
                    <div class="flex gap-4 items-center">
                        <!-- En tête : Avatar, date du post, bouton suivre et bouton détails -->
                        <div class="avatar">
                            <div class="w-15 rounded-full">
                                <img src="../../assets/img/<?= $value['user_avatar'] ?>" />
                            </div>
                        </div>

                        <div class="flex flex-col justify-center">
                            <a href="controller-otherprofile.php?user=<?= $value['user_id'] ?>" class="font-semibold text-lg"><?= $value['user_pseudo'] ?></a>
                            <span><?= date("d-m-Y", $value['post_timestamp']) ?></span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <?php if ($value['user_id'] == $_SESSION['user_id']) { ?>
                            <div class="dropdown">
                                <div tabindex="0" role="button" class="cursor-pointer hover:bg-base-300 p-1 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </div>
                                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                                    <li><a href="controller-deletepost.php?post=<?= $value['post_id'] ?>" class="text-red-700">Supprimer la photo</a></li>
                                </ul>
                            </div>
                            <div id="liked">
                                <?php } else {
                                if (!Follows::alreadyFollow($_SESSION['user_id'], $value['user_id'])) { ?>
                                    <button class="btn btn-sm bg-[#84ad21] text-white follow" data-userpost="<?= $value['user_id'] ?>">Suivre</button>
                                <?php  } else { ?>
                                    <button class="btn btn-sm bg-base-300 follow" data-userpost="<?= $value['user_id'] ?>">Ne plus suivre</button>
                            <?php }
                            } ?>
                            </div>
                    </div>
                </div>
                <!-- Image du post -->
                <div class="px-2">
                    <div class="bg-[url(../../assets/img/users/<?= $value['user_id'] ?>/<?= $value['pic_name'] ?>)] bg-cover bg-center w-full h-[23rem] sm:h-[38rem] lg:h-[45rem]"></div>
                </div>

                <!-- Likes et commentaires du post -->
                <div class="px-3 flex flex-col gap-2">
                    <div class="flex gap-4 items-center">
                        <div class="flex gap-1 items-center cursor-pointer hover:underline">
                            <?php if (Likes::alreadyLiked($value['post_id'])) { ?>
                                <button class="flex gap-1 items-center cursor-pointer hover:underline" data-postlike="<?= $value['post_id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#84ad21" class="size-8">
                                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                    </svg>
                                </button>
                            <?php } else { ?>
                                <button class="flex gap-1 items-center cursor-pointer hover:underline" data-postlike="<?= $value['post_id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#84ad21" class="size-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            <?php } ?>
                            <span class="font-semibold" id="likespost<?= $value['post_id'] ?>"><?= (Likes::showLikes($value['post_id']))['likes'] ?></span>
                            <label for="my_modal_<?= $iteration ?>" class="font-semibold">likes</label>
                        </div>

                        <button class="flex gap-1 items-center cursor-pointer hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#84ad21" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                            </svg>
                            <span class="font-semibold"><?= Comments::showComments($value['post_id'])['comments'] ?> commentaires</span>
                        </button>
                    </div>

                    <span class="">
                        <?= $value['post_description'] ?>
                    </span>

                    <div class="flex flex-col items-start gap-1">
                        <?php
                        if (count(Comments::showAllComments($value['post_id'])) >= 5) {
                            // Pour assombrir les commentaires de plus en plus
                            for ($i = 0; $i < 5; $i++) {
                                $darker = 100 - ($i * 20); ?>

                                <div class="text-base-content/<?= $darker ?> break-words w-full">
                                    <a href="controller-otherprofile.php?user=<?= Comments::showAllComments($value['post_id'])[$i]['user_id'] ?>" class="font-semibold hover:underline"><?= Comments::showAllComments($value['post_id'])[$i]['user_pseudo'] ?></a>
                                    <span><?= Comments::showAllComments($value['post_id'])[$i]['com_text'] ?></span>
                                </div>

                            <?php }
                        } else {
                            foreach (Comments::showAllComments($value['post_id']) as $value) { ?>
                                <div class="break-words w-full">
                                    <a href="controller-otherprofile.php?user=<?= $value['user_id'] ?>" class="font-semibold hover:underline"><?= $value['user_pseudo'] ?></a>
                                    <span><?= $value['com_text'] ?? "" ?></span>
                                </div>
                        <?php   }
                        } ?>
                        <a href="/src/Controller/controller-post.php?post=<?= $value['post_id'] ?>" class="text-zinc-500 py-1">Voir le post entier</a>
                    </div>
                </div>
            </div>

            <!-- Modal des likes -->
            <input type="checkbox" id="my_modal_<?= $iteration ?>" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Likes</h3>
                    <div class="flex flex-col mt-4 gap-4">

                        <?php
                        if (count(Likes::showAllLikes($value['post_id'])) >= 1) {
                            foreach (Likes::showAllLikes($value['post_id']) as $value) { ?>

                                <div class="flex gap-4">
                                    <div class="w-10 h-10"><img src="../../assets/img/<?= $value['user_avatar'] ?>" alt="" class="rounded-xl"></div>
                                    <a href="controller-otherprofile.php?user=<?= $value['user_id'] ?>" class="flex flex-col">
                                        <span class="font-semibold"><?= $value['user_pseudo'] ?></span>
                                        <span class="text-sm">Consulter le profil</span>

                                    </a>
                                </div>

                            <?php }
                        } else { ?>
                            <span class="text-zinc-600">Personne n'a encore liké ce post</span>
                        <?php } ?>

                    </div>
                </div>
                <label class="modal-backdrop" for="my_modal_<?= $iteration ?>">Close</label>
            </div>

        <?php } ?>

    </section>
</main>


<?php include_once '../../templates/end.php'  ?>