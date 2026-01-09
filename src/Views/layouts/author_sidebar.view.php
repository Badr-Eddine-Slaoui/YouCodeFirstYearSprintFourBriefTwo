<?php $page = page(); ?>
<aside
    class="hidden w-64 flex-col bg-background-card dark:bg-[#1a261d] border-r border-[#cfdfd0] dark:border-[#2a382d] lg:flex">
    <div class="flex h-20 items-center gap-3 px-6 py-4">
        <div
            class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-primary to-[#2f9847] text-white shadow-lg">
            <span class="material-symbols-outlined">edit_note</span>
        </div>
        <div class="flex flex-col">
            <h1 class="text-lg font-bold text-text-main dark:text-white leading-tight">Author Portal</h1>
            <p class="text-xs font-medium text-text-secondary dark:text-gray-400">Content Management</p>
        </div>
    </div>
    <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-1">
        <a class="group flex items-center gap-3 rounded-lg <?php if($page == route('author.dashboard')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:bg-primary/20 px-3 py-2.5 transition-colors"
            href="<?= route('author.dashboard') ?>">
            <span class="material-symbols-outlined text-primary dark:text-primary icon-filled">analytics</span>
            <span class="text-sm font-semibold text-text-main dark:text-white">Analytics</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('author.articles.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('author.articles.index') ?>">
            <span class="material-symbols-outlined">article</span>
            <span class="text-sm font-medium">My Articles</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('author.comments.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('author.comments.index') ?>">
            <span class="material-symbols-outlined">chat_bubble</span>
            <span class="text-sm font-medium">Comments</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('author.likes.index')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('author.likes.index') ?>">
            <span class="material-symbols-outlined">thumb_up</span>
            <span class="text-sm font-medium">Likes</span>
        </a>
        <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 <?php if($page == route('home')): ?> bg-[#e9f1eb] text-text-main hover:text-text-secondary <?php else: ?> text-text-secondary hover:bg-[#e9f1eb] hover:text-text-main <?php endif; ?> dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors"
            href="<?= route('home') ?>">
            <span class="material-symbols-outlined">home</span>
            <span class="text-sm font-medium">Home</span>
        </a>
        <form class="w-full" action="<?= route('logout') ?>" method="post">
            <button class="w-full group flex items-center gap-3 rounded-lg px-3 py-2.5 text-red-600 hover:bg-[#e9f1eb] hover:text-text-main dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white transition-colors">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm font-medium">Logout</span>
            </button>
        </form>
    </nav>
    <div class="border-t border-[#cfdfd0] dark:border-[#2a382d] p-4">
        <div
            class="flex items-center gap-3 rounded-xl bg-[#f0f7f1] dark:bg-[#1f2d22] p-3 cursor-pointer hover:bg-[#e5efe7] dark:hover:bg-[#253528] transition-colors">
            <div
                class="relative h-10 w-10 shrink-0 overflow-hidden rounded-full border-2 border-white dark:border-[#2a382d] shadow-sm">
                <img alt="Portrait of author" class="h-full w-full object-cover" data-alt="Author profile picture"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs_njgV4RjJjz6T3AESR-FDUnriQUtEKA35G9gTf4LMJ0DVn2pCbzpyKmkJcn8vlfXrIXhVClmsqCuT4X4_L0PdB_Iv-7P8MmGrPDvzexJkH9NpL-bHDRyJvD5PsfBDk9hQKsCA6lmAHVFVVe8B4vC4e4dG--kKJlk9ikcJvqG7uqhNN2R4NXULDLs92zgJkNFwiVJzT7JxtNKayd-fnHk9VXZxfC8ogbRtiKT0unWwKCNGp15lSW6jO5BnjgvKzDH-6UcR1KrXLI" />
                <div class="absolute bottom-0 right-0 h-2.5 w-2.5 rounded-full bg-green-500 ring-2 ring-white">
                </div>
            </div>
            <div class="flex min-w-0 flex-col overflow-hidden">
                <p class="truncate text-sm font-bold text-text-main dark:text-white"><?= ucwords(auth()->user()->getFullName()) ?></p>
                <p class="truncate text-xs text-text-secondary dark:text-gray-400"><?= ucfirst(auth()->user()->role()) ?></p>
            </div>
        </div>
    </div>
</aside>