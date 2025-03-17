<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/header.php" ?>


<main class="lg:max-w-[800px] w-screen mx-auto pt-42 lg:pt-32 min-h-[90vh]">
    <section class=" flex flex-col gap-3 px-4 lg:px-0">

        <div class="w-full h-84 bg-center bg-contain bg-no-repeat bg-[url(../../assets/img/users/<?= $postToDelete['user_id'] . "/" . $postToDelete['pic_name'] ?>)]">
        </div>

        <div class="flex gap-4 items-center">
            <div class="flex gap-1 items-center">
                <div class="flex gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#84ad21" class="size-8">
                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                    </svg>
                    <span class="font-semibold"><?= (Likes::showLikes($postToDelete['post_id']))['likes'] ?> likes</span>
                </div>
            </div>

            <div class="flex gap-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#84ad21" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                </svg>
                <span class="font-semibold"><?= (Comments::showComments($postToDelete['post_id'], $pdo))['comments'] ?> commentaires</span>
            </div>
        </div>

        <span class="text-xl font-semibold">Êtes-vous sûr de vouloir supprimer ce post ?</span>

        <form action="" method="post" class="flex items-center justify-center gap-4 flex-col sm:flex-row mt-4">
            <button class="btn btn-outline border-red-800 text-red-800 min-w-[20%]" name="delete">Valider</button>
            <a href="<?= $_SERVER['HTTP_REFERER'] ?? "controller-index.php" ?>" class="btn btn-warning min-w-[20%]">Annuler</a>
        </form>
    </section>
</main>


<?php include_once "../../templates/end.php" ?>