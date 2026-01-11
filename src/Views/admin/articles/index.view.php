<main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6 lg:p-10">
    <div class="mx-auto max-w-7xl flex flex-col gap-8">
        <!-- Page Heading & Stats -->
        <div class="flex flex-col gap-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div class="flex flex-col gap-1">
                    <h1 class="text-3xl font-bold tracking-tight text-[#101912] dark:text-white">Article
                        Management</h1>
                    <p class="text-gray-500 dark:text-gray-400">Create, edit, and manage content across your
                        platform.</p>
                </div>
            </div>
        </div>
        <!-- Filters & Search -->
        <div
            class="bg-white dark:bg-[#1a261d] rounded-xl border border-[#e9f1eb] dark:border-gray-800 shadow-sm p-4 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="relative w-full md:max-w-md">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">search</span>
                <input
                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-lg text-sm text-[#101912] dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    placeholder="Search by title, author, or category..." type="text" />
            </div>
            <div class="flex gap-3 w-full md:w-auto">
                <button
                    class="flex-1 md:flex-none items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors bg-white dark:bg-[#1a261d]">
                    <span class="material-symbols-outlined text-[20px]">filter_list</span>
                    Filters
                </button>
                <button
                    class="flex-1 md:flex-none items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors bg-white dark:bg-[#1a261d]">
                    <span class="material-symbols-outlined text-[20px]">sort</span>
                    Sort
                </button>
            </div>
        </div>
        <!-- Articles Table -->
        <?php if (count($articles) > 0): ?>
            <div
                class="bg-white dark:bg-[#1a261d] rounded-xl border border-[#e9f1eb] dark:border-gray-800 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-800/30">
                                <th
                                    class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 w-[40%]">
                                    Article Details</th>
                                <th
                                    class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Author</th>
                                <th
                                    class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-center">
                                    Engagement</th>
                                <th
                                    class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody id="articles" class="divide-y divide-gray-100 dark:divide-gray-800">
                            <?php foreach ($articles as $article): ?>
                                <tr data-id="<?= $article->id ?>" class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex gap-4 items-center">
                                            <div class="w-16 h-12 rounded-lg bg-cover bg-center shrink-0 border border-gray-100 dark:border-gray-700"
                                                data-alt="Laptop on desk with code"
                                                style="background-image: url('<?= dns() . $article->cover ?>');">
                                            </div>
                                            <div class="flex flex-col">
                                                <h3
                                                    class="article-title text-sm font-bold text-[#101912] dark:text-white line-clamp-1 group-hover:text-primary transition-colors cursor-pointer">
                                                    <?= $article->title ?>
                                                </h3>
                                                <div class="flex items-center gap-2 mt-1">
                                                    <?php foreach ($article->categories as $category): ?>
                                                        <span
                                                            class="text-xs px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 font-medium"><?= $category->name ?></span>
                                                    <?php endforeach; ?>
                                                    <span class="text-xs text-gray-400">•
                                                        <?= $article->created_at->format('M d, Y') ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-2">
                                            <div class="size-6 rounded-full bg-gray-200 bg-cover"
                                                data-alt="Portrait of Sarah Wilson"
                                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBQjyY0HrhgtfbFJkH88xQO9E7X9wFXjNI0YX4vrC9RoGfQIhPJCmJRmWgwyp4hD9hdfNWm8Ry4pMcBNCog2bM_2R7gGFiTUIC2unl7PCQHR34ZTN7VPSelYsGmPPwM_tJBzD30GZe2vqcuedhcEj1w8wJbNJ5K3RgeOM2DcNig3tc54A3auf4M---h5suf0AkVMVpGKBgs_rX77z7m-vgKiaN1VDp3lKNsyPPIUoLiCStvH6XEDZWcBob3eaAwL4UTitgbRx6xYxo');">
                                            </div>
                                            <span
                                                class="text-sm text-gray-600 dark:text-gray-300"><?= ucwords($article->author->getFullname()) ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center justify-center gap-4 text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-1 text-xs" title="Views">
                                                <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                                <?= $article->likes_count ?>
                                            </div>
                                            <div class="flex items-center gap-1 text-xs" title="Comments">
                                                <span class="material-symbols-outlined text-[16px]">chat_bubble</span>
                                                <?= $article->comments_count ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button onclick="openDeleteModal(<?= $article->id ?>)"
                                                class="p-1.5 rounded-md text-gray-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors"
                                                title="Delete Article">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div
                    class="flex items-center justify-between px-6 py-4 border-t border-[#e9f1eb] dark:border-gray-800 bg-white dark:bg-[#1a261d]">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Showing <span class="font-medium text-[#101912] dark:text-white">1</span> to <span
                            class="font-medium text-[#101912] dark:text-white">5</span> of <span
                            class="font-medium text-[#101912] dark:text-white">128</span> results
                    </p>
                    <div class="flex gap-2">
                        <button
                            class="px-3 py-1.5 border border-gray-200 dark:border-gray-700 rounded-lg text-sm text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50 transition-colors">Previous</button>
                        <button
                            class="px-3 py-1.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors">1</button>
                        <button
                            class="px-3 py-1.5 border border-gray-200 dark:border-gray-700 rounded-lg text-sm text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">2</button>
                        <button
                            class="px-3 py-1.5 border border-gray-200 dark:border-gray-700 rounded-lg text-sm text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">3</button>
                        <span class="px-2 text-gray-400">...</span>
                        <button
                            class="px-3 py-1.5 border border-gray-200 dark:border-gray-700 rounded-lg text-sm text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Next</button>
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
                    It looks like there's no article to display. Wait until the authors publish something.
                </p>
            </div>
        <?php endif; ?>
        <!-- Footer -->
        <div class="flex justify-center py-4 text-xs text-gray-400">
            © 2023 Blog Admin System. v2.4.0
        </div>
    </div>
</main>

<div id="delete-modal"
    class="fixed inset-0 z-40 bg-[#1b0d0d]/60 glass-effect flex items-center justify-center p-4 transition-opacity duration-300 hidden">
    <!-- Modal Container -->
    <!-- Note: Using requested #fbfffb for light mode background, adapting for dark mode -->
    <form action="<?= route('admin.articles.destroy') ?>" method="post"
        class="relative w-full max-w-[480px] transform overflow-hidden rounded-xl bg-[#fbfffb] dark:bg-[#2c1a1a] shadow-2xl transition-all border border-white/50 dark:border-white/5">
        <input type="hidden" name="id" value="">
        <!-- Close Button (Top Right) -->
        <button type="button" onclick="closeDeleteModal()"
            class="absolute top-4 right-4 flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-white/10 dark:hover:text-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-red-primary focus:ring-offset-2">
            <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
        <!-- Modal Content Wrapper -->
        <div class="flex flex-col items-center px-8 pt-10 pb-8 text-center sm:px-10">
            <!-- Icon Indicator -->
            <div
                class="mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-red-primary/10 dark:bg-red-primary/20">
                <span class="material-symbols-outlined text-[32px] text-red-primary">delete</span>
            </div>
            <!-- Headline -->
            <h2 class="text-[#1b0d0d] dark:text-white tracking-tight text-[24px] font-bold leading-tight px-4 pb-3">
                Delete Article
            </h2>
            <!-- Body Text -->
            <p class="text-[#1b0d0d]/70 dark:text-white/70 text-base font-normal leading-relaxed px-2">
                Are you sure you want to delete the article <strong
                    class="text-[#1b0d0d] dark:text-white font-semibold">'<span class="article-title"></span>'</strong>? This
                action cannot be undone and will remove the post from your blog permanently.
            </p>
            <!-- Action Buttons -->
            <div class="mt-8 flex w-full flex-col gap-3 sm:flex-row">
                <!-- Cancel Button -->
                <button type="button" onclick="closeDeleteModal()"
                    class="group flex flex-1 items-center justify-center rounded-lg border border-gray-200 bg-transparent px-5 py-3 text-sm font-bold uppercase tracking-wider text-[#1b0d0d] transition-all hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:border-white/10 dark:text-white dark:hover:bg-white/5">
                    Cancel
                </button>
                <!-- Delete Button -->
                <button type="submit"
                    class="group flex flex-1 items-center justify-center rounded-lg bg-red-primary px-5 py-3 text-sm font-bold uppercase tracking-wider text-white shadow-md shadow-red-primary/30 transition-all hover:bg-red-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-red-primary focus:ring-offset-2 dark:ring-offset-[#2c1a1a]">
                    <span class="material-symbols-outlined mr-2 text-[18px]">delete_forever</span>
                    Delete
                </button>
            </div>
        </div>
        <!-- Bottom decorative bar (Optional subtle branding touch) -->
        <div class="h-1.5 w-full bg-red-primary/20 dark:bg-red-primary/10">
            <div class="h-full w-1/3 bg-red-primary"></div>
        </div>
    </form>
</div>

<script>
    function openDeleteModal(id) {
        const deleteModal = document.getElementById('delete-modal');
        const title = deleteModal.querySelector('.article-title');
        title.textContent = document.querySelector(`#articles tr[data-id="${id}"] .article-title`).textContent.trim();
        deleteModal.querySelector('input[name="id"]').value = id;
        deleteModal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>