<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/header.php" ?>

<main class="lg:max-w-[800px] w-screen min-h-[90vh] mx-auto pt-38 lg:pt-26">

    <section class="flex flex-col gap-2">

        <div class="flex px-1 gap-4 items-center justify-between">
            <div class="flex gap-4 items-center">
                <div class="avatar">
                    <div class="w-15 rounded-full">
                        <img src="../../assets/img/<?= $uniquePost['user_avatar'] ?>" />
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <a href="controller-otherprofile.php?user=<?= $uniquePost['user_id'] ?>" class="font-semibold text-lg"><?= $uniquePost['user_pseudo'] ?></a>
                    <span><?= date("d-m-Y", $uniquePost['post_timestamp']) ?></span>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <?php if (!alreadyFollow($_SESSION['user_id'], $uniquePost['user_id'], $pdo)) { ?>
                    <button class="btn btn-sm bg-[#84ad21] text-white">Suivre</button>
                <?php } ?>

                <?php if ($uniquePost['user_id'] == $_SESSION['user_id']) { ?>

                    <div class="dropdown">
                        <div tabindex="0" role="button" class="cursor-pointer hover:bg-base-300 p-1 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg></div>
                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                            <li><a href="controller-deletepost.php?post=<?= $uniquePost['post_id'] ?>" class="text-red-700">Supprimer la photo</a></li>
                        </ul>
                    </div>

                <?php } ?>

            </div>
        </div>

        <img src="../../assets/img/users/<?= $uniquePost['user_id'] . "/" . $uniquePost['pic_name'] ?>" alt="">

        <div class="px-3 flex flex-col gap-2 mt-2">
            <div class="flex gap-4 items-center">
                <div class="flex gap-1 items-center cursor-pointer hover:underline">
                    <button class="flex gap-1 items-center cursor-pointer hover:underline">
                        <?php if (alreadyLiked($uniquePost['post_id'], $pdo)) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#84ad21" class="size-8">
                                <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>
                        <?php } else { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#84ad21" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        <?php } ?>
                        <span class="font-semibold"><?= showLikes($uniquePost['post_id'], $pdo)['likes'] ?></span>
                    </button>
                    <label for="my_modal" class="font-semibold">likes</label>
                </div>

                <button class="flex gap-1 items-center cursor-pointer hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#84ad21" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                    </svg>
                    <span class="font-semibold"><?= showComments($uniquePost['post_id'], $pdo)['comments'] ?> commentaires</span>
                </button>
            </div>

            <span class="break-words">
                <?= $uniquePost['post_description'] ?>
            </span>

            <div class="flex flex-col items-start gap-1">
                <?php foreach (showAllComments($uniquePost['post_id'], $pdo) as $value) { ?>

                    <div class="break-words w-full">
                        <?php if ($value['user_id'] == $_SESSION['user_id']) { ?>

                            <div class="dropdown">
                                <div tabindex="0" role="button" class="btn btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                                    <li><a href="controller-post.php?post=<?= $value['post_id'] ?>&comment=<?= $value['com_id'] ?>">Modifier le commentaire</a></li>
                                    <li><a href="controller-post.php?post=<?= $value['post_id'] ?>&comment=<?= $value['com_id'] ?>" class="text-red-700">Supprimer le commentaire</a></li>
                                </ul>
                            </div>

                        <?php } ?>
                        <a href="controller-otherprofile.php?user=<?= $value['user_id'] ?>" class="font-semibold hover:underline"><?= $value['user_pseudo'] ?></a>
                        <span><?= $value['com_text'] ?></span>
                    </div>

                <?php } ?>
            </div>

            <!-- Commentaire si non isset dans l'URL alors classique ajout de commentaire -->
            <?php if (!isset($_GET['comment']) or !showOneComment($_GET['post'], $_GET['comment'], $pdo)) { ?>

                <form class="w-full flex gap-4 mt-2" method="post">
                    <input type="text" placeholder="Ajouter un commentaire" class="input input-ghost w-full" name="newComment">
                    <button class="btn btn-outline">Ajouter</button>
                </form>
                <small class="text-red-400"><?= $errors['newComment'] ?? "" ?></small>

                <!-- Sinon modification voir suppression du commentaire -->
                <?php  } else {
                if (showOneComment($_GET['post'], $_GET['comment'], $pdo) == $_SESSION['user_id']) { ?>
                    <form class="w-full flex gap-4 mt-2" method="post">
                        <input type="text" placeholder="<?= showOneComment($_GET['post'], $_GET['comment'], $pdo)['com_text'] ?>" class="input input-ghost w-full" name="newComment">
                        <button class="btn btn-outline">Modifier</button>
                        <button class="btn text-zinc-50 bg-red-800/80">Supprimer</button>
                    </form>
                    <small class="text-red-400"><?= $errors['newComment'] ?? "" ?></small>

                <?php } else { ?>

                    <form class="w-full flex gap-4 mt-2" method="post">
                        <input type="text" placeholder="Ajouter un commentaire" class="input input-ghost w-full" name="newComment">
                        <button class="btn btn-outline">Ajouter</button>
                    </form>
                    <small class="text-red-400"><?= $errors['newComment'] ?? "" ?></small>

            <?php }  } ?>

        </div>
    </section>

    <!-- Modal -->
    <input type="checkbox" id="my_modal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Likes</h3>
            <div class="flex flex-col mt-4 gap-4">

                <?php
                if (count(showAllLikes($uniquePost['post_id'], $pdo)) >= 1) {
                    foreach (showAllLikes($uniquePost['post_id'], $pdo) as $value) { ?>

                        <div class="flex gap-4">
                            <div class="w-10 h-10"><img src="../../assets/img/<?= $value['user_avatar'] ?>" alt=""></div>
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
        <label class="modal-backdrop" for="my_modal">Close</label>
    </div>
</main>

<?php include_once "../../templates/end.php" ?>