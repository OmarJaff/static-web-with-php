<?php require('views/partials/head.php') ?>

<?php require 'views/partials/nav.php' ?>

<?php require 'views/partials/banner.php' ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-6">
             <ul class="text-xl disc space-y-3">
                 <?php foreach($notes as $note)  : ?>

                 <li>
                     <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 underline line-clamp-1">
                     <?= htmlspecialchars($note['body']) ?>
                     </a>
                 </li>
                    <?php endforeach; ?>
             </ul>

            <a href="/note/create" class="bg-gray-800 text-gray-200  p-2 rounded-lg mt-12 flex  w-48 justify-center">Create a note</a>
        </div>
    </main>


<?php require('views/partials/footer.php') ?>