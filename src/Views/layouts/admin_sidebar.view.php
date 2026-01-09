<?php $page = page(); ?>
<aside
    class="hidden w-64 flex-col bg-background-card dark:bg-[#1a261d] border-r border-[#cfdfd0] dark:border-[#2a382d] lg:flex">
    <div class="flex h-20 items-center gap-3 px-6 py-4">
        <div
            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-primary to-[#2f9847] text-white shadow-lg">
            <span class="material-symbols-outlined">rss_feed</span>
        </div>
        <div class="flex flex-col">
            <h1 class="text-lg font-bold text-text-main dark:text-white leading-tight">Blog Admin</h1>
            <p class="text-xs font-medium text-text-secondary dark:text-gray-400">Management System</p>
        </div>
    </div>
    <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-1">
        <a class="group flex items-center gap-3 rounded-lg <?php if($page == route('admin.dashboard')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:bg-primary/20 px-3 py-2.5 transition-colors"
            href="<?= route('admin.dashboard') ?>">
            <span class="material-symbols-outlined text-primary dark:text-primary icon-filled">dashboard</span>
            <span class="text-sm font-semibold text-text-main dark:text-white">Dashboard</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('admin.users.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('admin.users.index') ?>">
            <span class="material-symbols-outlined">group</span>
            <span class="text-sm font-medium">Users</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('admin.categories.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('admin.categories.index') ?>">
            <span class="material-symbols-outlined">category</span>
            <span class="text-sm font-medium">Categories</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('admin.articles.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('admin.articles.index') ?>">
            <span class="material-symbols-outlined">article</span>
            <span class="text-sm font-medium">Articles</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('admin.comments.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('admin.comments.index') ?>">
            <span class="material-symbols-outlined">chat_bubble</span>
            <span class="text-sm font-medium">Comments</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('admin.reports.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('admin.reports.index') ?>">
            <span class="material-symbols-outlined">flag</span>
            <span class="text-sm font-medium">Reports</span>
        </a>
        <form class="w-full" action="<?= route('logout') ?>" method="post">
            <button class="w-full group flex items-center gap-3 rounded-lg px-3 py-2.5 text-red-600 hover:bg-[#e9f1eb] hover:text-text-main dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm font-medium">Logout</span>
            </button>
        </form>
    </nav>
</aside>