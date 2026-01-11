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
                        <span aria-current="page" class="text-sm font-medium text-text-main dark:text-white">My
                            Articles</span>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex flex-1 justify-end items-center gap-4">
            <div class="flex items-center gap-2 sm:gap-4">
                <a href="<?= route('author.articles.create') ?>"
                    class="hidden sm:flex items-center gap-2 rounded-lg bg-primary hover:bg-primary-dark px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-primary/30 transition-all hover:shadow-primary/40">
                    <span class="material-symbols-outlined text-[20px]">edit_square</span>
                    <span>Write Article</span>
                </a>
            </div>
        </div>
    </header>
    <div class="flex-1 overflow-y-auto p-6 scroll-smooth">
        <div class="mx-auto max-w-7xl flex flex-col gap-6">
            <?php if (count($articles) > 0): ?>
                <div class="flex flex-col rounded-xl bg-background-card dark:bg-[#1a261d] shadow-soft overflow-hidden">
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-[#cfdfd0] dark:border-[#2a382d] p-4">
                        <div class="flex items-center gap-2">
                            <button class="px-4 py-2 text-sm font-semibold text-primary border-b-2 border-primary">All
                                Articles</button>
                            <button
                                class="px-4 py-2 text-sm font-medium text-text-secondary hover:text-text-main dark:text-gray-400 transition-colors">Published</button>
                            <button
                                class="px-4 py-2 text-sm font-medium text-text-secondary hover:text-text-main dark:text-gray-400 transition-colors">Drafts</button>
                            <button
                                class="px-4 py-2 text-sm font-medium text-text-secondary hover:text-text-main dark:text-gray-400 transition-colors">Archived</button>
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <div class="relative flex-1 sm:w-48">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-2.5 text-text-secondary">
                                    <span class="material-symbols-outlined text-[18px]">filter_alt</span>
                                </span>
                                <select
                                    class="w-full rounded-lg border-none bg-[#f0f7f1] dark:bg-[#253528] py-2 pl-9 pr-8 text-sm text-text-main focus:ring-1 focus:ring-primary dark:text-white cursor-pointer">
                                    <option>Most Recent</option>
                                    <option>Most Viewed</option>
                                    <option>Oldest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[800px] text-left">
                            <thead class="bg-[#f8fbf9] dark:bg-[#202e24]">
                                <tr class="border-b border-[#cfdfd0] dark:border-[#2a382d]">
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-text-secondary dark:text-gray-400">
                                        Article Details</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-text-secondary dark:text-gray-400">
                                        Category</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-text-secondary dark:text-gray-400">
                                        Published At</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-text-secondary dark:text-gray-400">
                                        Stats</th>
                                    <th
                                        class="py-3 px-6 text-end text-xs font-bold uppercase tracking-wider text-text-secondary dark:text-gray-400">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#cfdfd0] dark:divide-[#2a382d]">
                                <?php foreach ($articles as $article): ?>
                                    <tr class="group hover:bg-[#f4fcf5] dark:hover:bg-[#253528] transition-colors">
                                        <td class="py-4 px-6">
                                            <div class="flex items-start gap-4">
                                                <div
                                                    class="h-16 w-24 shrink-0 overflow-hidden rounded-lg bg-gray-100 shadow-sm">
                                                    <img alt="Laptop with code on screen"
                                                        class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300"
                                                        src="<?= dns() . $article->cover ?>" />
                                                </div>
                                                <div class="flex flex-col gap-1">
                                                    <h3
                                                        class="font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">
                                                        <?= $article->title ?></h3>
                                                    <p class="text-xs text-text-secondary dark:text-gray-400"><?= $article->created_at->format('M j, Y') ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?php foreach ($article->categories as $category): ?>
                                                <span
                                                class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10 dark:bg-purple-900/30 dark:text-purple-400 dark:ring-purple-400/30"><?= $category->name ?></span>
                                            <?php endforeach; ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-2">
                                                <span class="flex h-2 w-2 rounded-full bg-green-500"></span>
                                                <span
                                                    class="text-sm font-semibold text-text-main dark:text-white">Published</span>
                                            </div>
                                            <span class="text-xs text-text-secondary mt-1 block"><?= $article->created_at->format('M j, Y') ?> at <?= $article->created_at->format('h:i A') ?></span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex flex-col gap-1">
                                                <!-- Like count -->
                                                <div
                                                    class="flex items-center gap-2 text-xs text-text-secondary dark:text-gray-400">
                                                    <span class="material-symbols-outlined text-[14px]">thumb_up</span>
                                                    <span class="font-medium"><?= $article->likes_count ?></span>
                                                </div>
                                                <div
                                                    class="flex items-center gap-2 text-xs text-text-secondary dark:text-gray-400">
                                                    <span class="material-symbols-outlined text-[14px]">chat_bubble</span>
                                                    <span class="font-medium"><?= $article->comments_count ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-end">
                                            <div
                                                class="flex items-center justify-end gap-2">
                                                <a href="<?= route('author.articles.show') ?>?id=<?= $article->id ?>"
                                                    class="rounded-lg p-2 text-text-secondary hover:bg-background-light hover:text-primary dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white"
                                                    title="View Article">
                                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                                </a>
                                                <a href="<?= route('author.articles.edit') ?>?id=<?= $article->id ?>"
                                                    class="rounded-lg p-2 text-text-secondary hover:bg-background-light hover:text-primary dark:text-gray-400 dark:hover:bg-[#2a382d] dark:hover:text-white"
                                                    title="Edit Article">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </a>
                                                <form action="<?= route('author.articles.destroy') ?>" method="post">
                                                    <input type="hidden" name="id" value="<?= $article->id ?>">
                                                    <button
                                                        class="rounded-lg p-2 text-text-secondary hover:bg-red-50 hover:text-red-600 dark:text-gray-400 dark:hover:bg-red-900/20 dark:hover:text-red-400"
                                                        title="Delete Article">
                                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="flex items-center justify-between border-t border-[#cfdfd0] dark:border-[#2a382d] bg-[#f8fbf9] dark:bg-[#202e24] px-4 py-3 sm:px-6">
                        <div class="flex flex-1 justify-between sm:hidden">
                            <a class="relative inline-flex items-center rounded-md border border-[#cfdfd0] bg-white px-4 py-2 text-sm font-medium text-text-secondary hover:bg-gray-50"
                                href="#">Previous</a>
                            <a class="relative ml-3 inline-flex items-center rounded-md border border-[#cfdfd0] bg-white px-4 py-2 text-sm font-medium text-text-secondary hover:bg-gray-50"
                                href="#">Next</a>
                        </div>
                        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-text-secondary dark:text-gray-400">
                                    Showing <span class="font-bold text-text-main dark:text-white">1</span> to <span
                                        class="font-bold text-text-main dark:text-white">4</span> of <span
                                        class="font-bold text-text-main dark:text-white">27</span> results
                                </p>
                            </div>
                            <div>
                                <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                                    <a class="relative inline-flex items-center rounded-l-md px-2 py-2 text-text-secondary ring-1 ring-inset ring-[#cfdfd0] hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:ring-[#2a382d] dark:hover:bg-[#253528]"
                                        href="#">
                                        <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                                    </a>
                                    <a aria-current="page"
                                        class="relative z-10 inline-flex items-center bg-primary px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                        href="#">1</a>
                                    <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-text-main ring-1 ring-inset ring-[#cfdfd0] hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:text-white dark:ring-[#2a382d] dark:hover:bg-[#253528]"
                                        href="#">2</a>
                                    <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-text-main ring-1 ring-inset ring-[#cfdfd0] hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:text-white dark:ring-[#2a382d] dark:hover:bg-[#253528]"
                                        href="#">3</a>
                                    <a class="relative inline-flex items-center rounded-r-md px-2 py-2 text-text-secondary ring-1 ring-inset ring-[#cfdfd0] hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:ring-[#2a382d] dark:hover:bg-[#253528]"
                                        href="#">
                                        <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div
                    class="bg-white dark:bg-[#1a261d] rounded-xl border border-[#e9f1eb] dark:border-gray-800 shadow-sm p-12 flex flex-col items-center justify-center text-center min-h-[400px]">
                    <div class="w-24 h-24 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-5xl text-gray-300 dark:text-gray-600">article</span>
                    </div>
                    <h2 class="text-xl font-bold text-[#101912] dark:text-white mb-2">No articles found</h2>
                    <p class="text-gray-500 dark:text-gray-400 max-w-sm mb-8">
                        It looks like you haven't published any articles yet. Get started by creating your first
                        post to engage your readers.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <a href="<?= route('author.articles.create') ?>"
                            class="flex items-center justify-center gap-2 bg-primary hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-sm hover:shadow transition-all duration-200 font-medium">
                            <span class="material-symbols-outlined text-[20px]">add_circle</span>
                            <span>Create First Article</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>