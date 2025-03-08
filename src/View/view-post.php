<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/header.php" ?>



<main class="lg:max-w-[800px] w-screen min-h-[90vh] mx-auto pt-38 lg:pt-26">

    <section class="flex flex-col gap-2">

        <div class="flex px-1 gap-4 items-center justify-between">
            <div class="flex gap-4 items-center">
                <div class="skeleton h-15 w-15 rounded-full"></div>
                <div class="flex flex-col justify-center">
                    <a href="" class="font-semibold text-lg"><?= $uniquePost['user_pseudo'] ?></a>
                    <span><?= date("d-m-Y", $uniquePost['post_timestamp']) ?></span>
                </div>
            </div>
            <button href="" class="cursor-pointer hover:bg-base-300 p-1 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </button>
        </div>

        <img src="../../assets/img/users/<?= $uniquePost['user_id'] . "/" . $uniquePost['pic_name'] ?>" alt="">

        <div class="px-1 flex flex-col gap-2">
            <div class="flex gap-4">
                <button class="flex gap-1 cursor-pointer hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                    <span class="font-semibold">16 likes</span>
                </button>
                <button class="flex gap-1 cursor-pointer hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                    </svg>
                    <span class="font-semibold">8 commentaires</span>
                </button>
            </div>

            <span class="">
                aaaa
            </span>

            <div class="flex flex-col items-start gap-1">
                <div>
                    <a href="" class="font-semibold hover:underline">dinguerie82</a>
                    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
                </div>
                <div>
                    <a href="" class="font-semibold hover:underline">blakebigrings</a>
                    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
                </div>
                <button class="text-zinc-500 py-1">Voir les autres commentaires</button>
            </div>
        </div>
    </section>

</main>





<?php include_once "../../templates/end.php" ?>