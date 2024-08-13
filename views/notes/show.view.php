<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">Go back...</a>
        </p>
        <p class="text-gray-500">
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <div class="my-4">
            <a href="/note/edit?id=<?= $note['id'] ?>" class="p-2 rounded-md font bold bg-blue-500 text white">Edit</a>
        </div>
        <form method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" value="<?= $note['id'] ?>" name="id" id="id">
            <button class="bg-red-500 text-white font-bold text-sm p-2 rounded-md" type="submit">Delete</button>
        </form>

    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>