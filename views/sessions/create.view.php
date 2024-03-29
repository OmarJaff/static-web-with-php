
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-sm space-y-10">
        <div>
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login to your account</h2>
        </div>
        <form class="space-y-6" action="/sessions" method="POST">
            <div class="relative space-y-2">
                <div class="relative -space-y-px rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-0 z-10 rounded-md ring-1 ring-inset ring-gray-300"></div>
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               value="<?= old('email') ?? '' ?>"
                               class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-100 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-100 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Password">
                    </div>
                </div>
                <div class="px-1">
                    <?php if(isset($errors['email'])) :?>
                        <p class=" text-sm text-red-500"> <?= $errors['email'] ?> </p>
                    <?php endif ?>
                    <?php if(isset($errors['password'])) :?>
                        <p class=" text-sm text-red-500"> <?= $errors['password'] ?> </p>
                    <?php endif ?>
                </div>
            </div>




            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
            </div>
        </form>


    </div>
</div>


<?php require base_path('views/partials/footer.php') ?>
