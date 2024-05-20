<?php // navbar – navigační lišta
require INC . '/pages.php';
?>

<!-- top navigation bar -->
<nav class="sticky top-0 bg-gray-800 text-white shadow-md w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- logo & title -->
        <a href='/'>
            <div class="flex items-center">
                <img src="./assets/drink.png" class="h-8 mr-3" />
                <span class="text-2xl font-semibold whitespace-nowrap">
                    <?= TITLE . getName(': ') ?>
                </span>
            </div>
        </a>

        <!-- hamburger menu (md:hidden) -->
        <button id="menu-toggle"
            class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-300 rounded-lg hover:bg-gray-700">
            <i class="fa fa-bars fa-lg"></i>
        </button>

        <!-- menu items -->
        <div class="hidden w-full md:flex md:w-auto" id="menu">
            <ul class="font-medium flex flex-col md:p-0 mt-4 md:flex-row md:mt-0 w-full">
                <?php foreach ($pages as $href => $title) { ?>
                    <li class="w-full md:w-auto">
                        <a href="<?= $href ?>" class="block px-3 py-2 rounded hover:bg-gray-700">
                            <?= $title ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let menu = document.getElementById('menu');
        let toggleMenu = () => menu.classList.toggle('hidden')

        let button = document.getElementById('menu-toggle');
        button.addEventListener('click', toggleMenu)
    });
</script>
