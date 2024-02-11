<?php require ('partials/head.php') ?>

<?php require 'partials/nav.php' ?>
<?php require 'partials/banner.php' ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-6">
             <ul class="text-xl disc space-y-3">
                 <?php foreach($notes as $note)  :?>
                 <li>
                     <?= $note['body'] ?>
                 </li>
                    <?php endforeach; ?>
             </ul>
        </div>
    </main>


<?php require ('partials/footer.php') ?>