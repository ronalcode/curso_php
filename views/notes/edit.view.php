<?php require base_path("views/partials/head.php")?>
<?php require base_path("views/partials/nav.php")?>
<?php require base_path("views/partials/banner.php")?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/note">
                    <input type="hidden" name="_method" value="patch">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            
                                <div class="col-span-full">
                                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body']?></textarea>
                                    <?php if(isset($errors['body'])) : ?>
                                        <span class="text-red-500 "><?= $errors['body'] ?></span>
                                    <?php endif; ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="mt-6 flex items-center justify-end gap-x-1">
                        <a href="/notes" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </main>
<?php require base_path("views/partials/footer.php")?>