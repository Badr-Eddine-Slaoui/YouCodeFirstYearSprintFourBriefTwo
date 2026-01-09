<?php $page = page(); ?>
<header class="sticky top-0 z-50 w-full bg-card-bg/90 backdrop-blur-sm border-b border-[#cde2cf] px-6 py-3 shadow-sm">
    <div class="max-w-[1280px] mx-auto flex items-center justify-between gap-6">
        <!-- Logo -->
        <a href="<?= route('home') ?>" class="flex items-center gap-3 text-text-main shrink-0">
            <div class="size-8 flex items-center justify-center bg-primary rounded-lg text-white">
                <span class="material-symbols-outlined" style="font-size: 24px;">auto_stories</span>
            </div>
            <h2 class="text-xl font-bold tracking-tight">BlogReader</h2>
        </a>
        <!-- Search Bar (Hidden on mobile, visible on tablet+) -->
        <div class="hidden md:flex flex-1 max-w-md">
            <label class="relative w-full group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-text-muted">
                    <span class="material-symbols-outlined" style="font-size: 20px;">search</span>
                </div>
                <input
                    class="block w-full p-2.5 pl-10 text-sm text-text-main bg-[#eef6ef] border-transparent rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent placeholder-text-muted transition-all"
                    placeholder="Search articles, topics, or authors..." type="text" />
            </label>
        </div>
        <!-- Right Actions -->
        <div class="flex items-center gap-4 shrink-0">
            <?php if(auth()->check()): ?>
                <?php if(auth()->user()->role() == 'author'): ?>
                    <a href="<?= route('author.dashboard') ?>" class="flex items-center gap-3 pr-2 border-r border-[#cde2cf]">
                        <span class="material-symbols-outlined" style="font-size: 24px;">dashboard</span>
                        <span class="hidden sm:block">Dashboard</span>
                    </a>
                <?php endif; ?>
                <a class="flex items-center gap-3 pr-2 border-r border-[#cde2cf]">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold leading-none"><?=  ucwords(auth()->user()->getFullName()) ?></p>
                        <p class="text-xs text-text-muted font-medium"><?= ucfirst(auth()->user()->role()) ?></p>
                    </div>
                    <div class="size-10 rounded-full bg-cover bg-center ring-2 ring-white cursor-pointer"
                        data-alt="User profile portrait of a smiling woman"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDBdJUZzwgDE0BmiZzuGbOueszY0LAJYbgMQ6wVXlzWyUmVCVUh_abOvVzqukIVlZOmu9rlmo3w4goIGBmpVeguL-OtXROv3L9y5V4kBos8R7_3S2YfVW1zgIH9hmoSJAsHD__iMI02mco--QSJ10QB36PgPCQy59Noe-x-G3naoyfsI1CMzMFoktAr8M_RTJsgwvxXsFElvqwE2OZWCBMwCQy4o6AC35frRUJAP7reh5c9yCm8Dy4xclBMK264MXFgDhN2Bb6WYc8");'>
                    </div>
                </a>
                <form action="<?= route('logout') ?>" method="post">
                    <button class="relative flex items-center gap-2 text-white bg-red-400 px-4 py-2 rounded-full transition-colors group">
                        <span class="material-symbols-outlined transition-colors">Logout</span>
                        Logout
                    </button>
                </form>
            <?php else: ?>
                <a href="<?= route('login') ?>"
                    class="relative flex items-center gap-2 text-white bg-primary px-4 py-2 rounded-full transition-colors group">
                    <span class="material-symbols-outlined transition-colors">login</span>
                    Login
                </a>
                <a href="<?= route('register') ?>"
                    class="relative flex items-center gap-2 text-white bg-primary px-4 py-2 rounded-full transition-colors group">
                    <span class="material-symbols-outlined transition-colors">person_add</span>
                    Register
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>