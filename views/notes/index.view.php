<?php require base_path("views/partials/head.php") ?><!-- Funciona igual que lo de abajo. Solo que aquí accedemos a la carpeta superior -->
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-400 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/notes/create" class="text-white bg-blue-400 rounded p-2">Create Note</a>
        </p>
    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>