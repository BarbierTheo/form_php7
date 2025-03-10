<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/header.php" ?>


<main class="lg:max-w-[800px] w-screen min-h-[90vh] mx-auto pt-38 lg:pt-26">
    <form action="" method="get" class="flex justify-between gap-4 w-[100%] px-2 items-center">
        <label class="input w-[100%]">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input type="text" placeholder="Rechercher un utilisateur" name="pseudo" />
        </label>
        <button class="btn btn-outline" type="submit">Rechercher</button>
    </form>

    <section class="mt-8 px-1 lg:px-0">
        <div class="grid grid-cols-3 gap-1 lg:gap-2 mx-auto">

            <?php if (isset($searchPosts)) {
                if (count($searchPosts) >= 1) {
                    foreach ($searchPosts as $value) { ?>
                    
                <a href="controller-post.php?<?= "post=" . $value['post_id']?>">
                        <img src="../../assets/img/users/<?= $value['user_id'] ?>/<?= $value['pic_name'] ?>" alt="" class="w-[100%] h-full bg-cover bg-center">
                </a>
                    <?php }
                } else { ?>
                    <div></div>
                    <div class="text-center">Aucun résultat</div>
                    <div></div>
            <?php }
            } ?>
            
        </div>
    </section>

</main>


<?php include_once "../../templates/end.php" ?>