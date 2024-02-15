<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 space-y-8">
            <a href="/notes" class="text-blue-500 underline">back to notes ...</a>
             <p> <?=  htmlspecialchars($note['body'])  ?> </p>
        </div>
    </main>


<?php require base_path('views/partials/footer.php') ?>
