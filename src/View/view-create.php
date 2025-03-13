<?php include_once '../../templates/head.php' ?>
<?php include_once '../../templates/header.php' ?>

<main class="lg:max-w-[800px] w-screen mx-auto pt-38 lg:pt-26 min-h-[90vh]">
    <form action="" method="post" class="flex flex-col gap-6 px-8 lg:mt-12" enctype="multipart/form-data" novalidate>
        <fieldset class="fieldset">
            <legend class="fieldset-legend mb-1">Choisissez une photo</legend>
            <input type="file" class="file-input w-full <?= isset($errors['pic']) ? "border-red-800" : "" ?>" name="pic" require />
            <label class="fieldset-label">Taille maximale 5MB</label>
            <label class="fieldset-label"><?= isset($errors['pic']) ? $errors['pic'] : "" ?></label>
        </fieldset>
        <fieldset class="fieldset">
            <legend class="fieldset-legend mb-1">Description (optionnel)</legend>
            <textarea class="textarea h-24 w-full <?= isset($errors['description']) ? "border-red-800" : "" ?>" placeholder="Superbe après-midi" name="description"></textarea>
            <div class="fieldset-label"><?= isset($errors['description']) ? "Caractères non valides" : "" ?></div>
        </fieldset>
        <button class="btn w-fit self-center" type="submit">Publier</button>
    </form>

</main>

<?php include_once '../../templates/end.php' ?>