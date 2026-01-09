<main class="flex h-full flex-1 flex-col overflow-x-hidden">
    <header
        class="flex h-20 items-center justify-between gap-4 bg-background-light/95 dark:bg-background-dark/95 px-6 backdrop-blur-sm sticky top-0 z-20">
        <div class="flex items-center gap-4">
            <button
                class="flex items-center justify-center rounded-lg p-2 text-text-secondary lg:hidden hover:bg-white/50">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <nav aria-label="Breadcrumb" class="hidden sm:flex">
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="text-sm font-medium text-text-secondary hover:text-primary dark:text-gray-400"
                            href="<?= route('home') ?>">Home</a>
                    </li>
                    <li>
                        <span class="text-text-secondary/50 dark:text-gray-600">/</span>
                    </li>
                    <li>
                        <span aria-current="page"
                            class="text-sm font-medium text-text-main dark:text-white">Likes</span>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-1 justify-end items-center gap-4">
            <div class="hidden max-w-md flex-1 md:flex">
                <label class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-text-secondary">
                        <span class="material-symbols-outlined text-[20px]">search</span>
                    </span>
                    <input
                        class="w-full rounded-lg border-none bg-background-card dark:bg-[#1a261d] py-2.5 pl-10 pr-4 text-sm text-text-main placeholder-text-secondary shadow-soft focus:ring-2 focus:ring-primary dark:text-white dark:placeholder-gray-500"
                        placeholder="Search likes..." type="text" />
                </label>
            </div>
            <div class="flex items-center gap-2 sm:gap-4">
                <button
                    class="relative flex h-10 w-10 items-center justify-center rounded-full bg-background-card dark:bg-[#1a261d] text-text-secondary shadow-soft transition-transform hover:scale-105 hover:text-primary dark:text-gray-300">
                    <span class="material-symbols-outlined text-[22px]">notifications</span>
                    <span
                        class="absolute right-2.5 top-2.5 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white dark:ring-[#1a261d]"></span>
                </button>
            </div>
        </div>
    </header>
    <div class="flex-1 overflow-y-auto p-6 scroll-smooth">
        <div class="mx-auto max-w-5xl flex flex-col gap-6">
            <div class="flex flex-col gap-1">
                <h2 class="text-2xl font-bold text-text-main dark:text-white">Reader Likes</h2>
                <p class="text-sm text-text-secondary dark:text-gray-400">View the appreciation your published
                    stories have received.</p>
            </div>
            <div
                class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-background-card dark:bg-[#1a261d] p-3 rounded-xl shadow-soft">
                <div class="flex items-center gap-2 w-full sm:w-auto overflow-x-auto pb-2 sm:pb-0">
                    <button
                        class="px-4 py-2 text-sm font-semibold text-primary border-b-2 border-primary bg-primary/5 rounded-t-md whitespace-nowrap">All
                        Likes</button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-text-secondary hover:text-text-main dark:text-gray-400 transition-colors whitespace-nowrap">From
                        Followers</button>
                </div>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <span
                        class="text-xs font-medium text-text-secondary dark:text-gray-500 uppercase tracking-wider hidden sm:block">Sort
                        by:</span>
                    <select
                        class="w-full sm:w-auto rounded-lg border-none bg-[#f0f7f1] dark:bg-[#253528] py-2 pl-3 pr-8 text-sm text-text-main focus:ring-1 focus:ring-primary dark:text-white cursor-pointer">
                        <option>Newest First</option>
                        <option>Oldest First</option>
                    </select>
                </div>
            </div>
            <!-- <div class="flex flex-col gap-4 pb-10">
                <div
                    class="group flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:shadow-lg border border-transparent hover:border-[#cfdfd0] dark:hover:border-[#2a382d]">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-300 shadow-sm">
                                <span class="font-bold text-sm">MC</span>
                            </div>
                            <div
                                class="absolute -bottom-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-primary ring-2 ring-white dark:ring-[#1a261d]">
                                <span class="material-symbols-outlined text-[12px] text-white">thumb_up</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-text-main dark:text-white">
                                <span class="font-bold">Michael Chen</span> liked your article
                            </p>
                            <p class="text-xs text-text-secondary dark:text-gray-400 mt-0.5">2 hours ago</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-auto pl-16 sm:pl-0">
                        <a class="flex items-center gap-3 rounded-lg bg-[#f0f7f1] dark:bg-[#253528] p-3 hover:bg-[#e5efe7] dark:hover:bg-[#2f4033] transition-colors group-hover:ring-1 ring-[#cfdfd0] dark:ring-[#2a382d]"
                            href="#">
                            <div
                                class="flex h-8 w-8 items-center justify-center rounded bg-white dark:bg-white/10 text-primary shrink-0 shadow-sm">
                                <span class="material-symbols-outlined text-[18px]">article</span>
                            </div>
                            <div class="flex flex-col overflow-hidden max-w-[200px] sm:max-w-xs">
                                <span
                                    class="text-[10px] uppercase font-bold text-text-secondary dark:text-gray-500 tracking-wider">Article</span>
                                <span class="text-sm font-bold text-text-main dark:text-white truncate">Understanding
                                    React Hooks in 2024</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
            <?php if (count($likes) > 0) : ?>
                <div class="flex flex-col gap-4 pb-10">
                    <?php foreach ($likes as $like) : ?>
                        <div
                            class="group flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:shadow-lg border border-transparent hover:border-[#cfdfd0] dark:hover:border-[#2a382d]">
                            <div class="flex items-center gap-4">
                                <div class="relative">
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-300 shadow-sm">
                                        <span class="font-bold text-sm"><?= ucfirst($like->reader->getFirstName()[0]) . ucfirst($like->reader->getLastName()[0]) ?></span>
                                    </div>
                                    <div
                                        class="absolute -bottom-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-primary ring-2 ring-white dark:ring-[#1a261d]">
                                        <span class="material-symbols-outlined text-[12px] text-white">thumb_up</span>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm text-text-main dark:text-white">
                                        <span class="font-bold"><?= ucwords($like->reader->getFullName()) ?></span> liked your article
                                    </p>
                                    <p class="text-xs text-text-secondary dark:text-gray-400 mt-0.5"><?= diffForHuman($like->created_at) ?></p>
                                </div>
                            </div>
                            <div class="w-full sm:w-auto pl-16 sm:pl-0">
                                <a class="flex items-center gap-3 rounded-lg bg-[#f0f7f1] dark:bg-[#253528] p-3 hover:bg-[#e5efe7] dark:hover:bg-[#2f4033] transition-colors group-hover:ring-1 ring-[#cfdfd0] dark:ring-[#2a382d]"
                                    href="#">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded bg-white dark:bg-white/10 text-primary shrink-0 shadow-sm">
                                        <span class="material-symbols-outlined text-[18px]">article</span>
                                    </div>
                                    <div class="flex flex-col overflow-hidden max-w-[200px] sm:max-w-xs">
                                        <span
                                            class="text-[10px] uppercase font-bold text-text-secondary dark:text-gray-500 tracking-wider">Article</span>
                                        <span class="text-sm font-bold text-text-main dark:text-white truncate"><?= $like->article->title ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div
                    class="flex flex-col items-center justify-center rounded-xl border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark px-6 py-16 text-center shadow-sm">
                    <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-[#e9f1eb] dark:bg-white/5">
                        <span
                            class="material-symbols-outlined text-4xl text-primary dark:text-primary/80">sentiment_very_dissatisfied</span>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-text-main dark:text-white">No likes yet</h3>
                    <p class="max-w-md text-base text-text-muted dark:text-gray-400">
                        It looks like there are no likes to display right now. When readers start engaging with your
                        articles, their likes will appear here for you to moderate.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="<?= route('author.articles.index') ?>"
                            class="flex items-center justify-center gap-2 rounded-lg bg-primary px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-primary/90 transition-all">
                            <span class="material-symbols-outlined text-[20px]">article</span>
                            View Articles
                        </a>
                        <button onclick="location.reload()"
                            class="flex items-center justify-center gap-2 rounded-lg border border-border-light dark:border-border-dark bg-transparent px-5 py-2.5 text-sm font-bold text-text-main dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                            <span class="material-symbols-outlined text-[20px]">refresh</span>
                            Refresh
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>