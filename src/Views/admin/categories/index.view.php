<main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6 md:p-10">
    <div class="mx-auto max-w-7xl flex flex-col gap-8">
        <div class="flex flex-col gap-4">
            <nav class="flex items-center gap-2 text-sm text-[#5b8b66]">
                <a class="hover:text-primary transition-colors" href="<?= route('admin.dashboard') ?>">Dashboard</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="font-medium text-[#101912] dark:text-white">Categories</span>
            </nav>
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-tight text-[#101912] dark:text-white">
                        Category Management</h1>
                    <p class="mt-2 text-[#5b8b66]">View, edit, and organize your blog categories.</p>
                </div>
                <div class="flex gap-3">
                    <a class="flex items-center gap-2 rounded-lg bg-primary hover:bg-green-700 px-4 py-2 text-sm font-bold text-white shadow-md hover:shadow-lg transition-all active:scale-[0.98]"
                        href="<?= route('admin.categories.create') ?>">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        Add New Category
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-6">
            <div
                class="flex flex-col sm:flex-row gap-4 justify-between items-center rounded-xl bg-white dark:bg-[#1a261e] p-4 shadow-sm border border-[#e9f1eb] dark:border-[#2a362c]">
                <div class="relative w-full sm:w-72">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#5b8b66]">search</span>
                    <input
                        class="w-full rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] bg-[#f9fbf9] dark:bg-[#141e16] py-2 pl-10 pr-4 text-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none text-[#101912] dark:text-white"
                        placeholder="Search categories..." type="text" />
                </div>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <span class="text-sm text-[#5b8b66] whitespace-nowrap">Sort by:</span>
                    <div class="relative flex-1 sm:flex-none">
                        <select
                            class="w-full sm:w-auto appearance-none rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] bg-[#f9fbf9] dark:bg-[#141e16] py-2 pl-3 pr-8 text-sm font-medium text-[#101912] dark:text-white focus:border-primary focus:ring-1 focus:ring-primary outline-none cursor-pointer">
                            <option>Most Recent</option>
                            <option>Name (A-Z)</option>
                            <option>Count (High-Low)</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#5b8b66]">
                            <span class="material-symbols-outlined text-[20px]">expand_more</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (count($categories) > 0): ?>
                <div
                    class="overflow-hidden rounded-xl border border-[#e9f1eb] dark:border-[#2a362c] bg-white dark:bg-[#1a261e] shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-[#e9f1eb] dark:border-[#2a362c] bg-[#f9fbf9] dark:bg-[#2a362c]">
                                    <th class="p-4 pl-6 text-xs font-semibold uppercase tracking-wider text-[#5b8b66]">
                                        <div class="flex items-center gap-2">
                                            <input
                                                class="rounded border-[#5b8b66] text-primary focus:ring-primary bg-transparent"
                                                type="checkbox" />
                                            Name
                                        </div>
                                    </th>
                                    <th class="p-4 text-xs font-semibold uppercase tracking-wider text-[#5b8b66]">
                                        Description</th>
                                    <th
                                        class="p-4 text-xs font-semibold uppercase tracking-wider text-[#5b8b66] text-center">
                                        Count</th>
                                    <th
                                        class="p-4 text-xs font-semibold uppercase tracking-wider text-[#5b8b66] text-right pr-6">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody id="categories" class="divide-y divide-[#e9f1eb] dark:divide-[#2a362c]">
                                <?php foreach ($categories as $category): ?>
                                    <tr data-id="<?= $category->id ?>"
                                        class="group hover:bg-[#f9fbf9] dark:hover:bg-[#2a362c] transition-colors">
                                        <td class="p-4 pl-6">
                                            <div class="flex items-center gap-3">
                                                <input
                                                    class="rounded border-[#5b8b66] text-primary focus:ring-primary bg-transparent"
                                                    type="checkbox" />
                                                <span
                                                    class="name font-medium text-[#101912] dark:text-white"><?= $category->name ?></span>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm text-[#5b8b66] max-w-xs truncate">
                                            <?php if ($category->description): ?>
                                                <?= $category->description ?>
                                            <?php else: ?>
                                                No description
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4 text-center">
                                            <span
                                                class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 text-xs font-medium text-primary">
                                                <?= $category->articles_count ?>
                                            </span>
                                        </td>
                                        <td class="p-4 text-right pr-6">
                                            <div class="flex items-center justify-end gap-2 ">
                                                <a href="<?= route('admin.categories.edit') ?>?id=<?= $category->id ?>"
                                                    class="rounded-lg p-1.5 text-[#5b8b66] hover:bg-[#e9f1eb] dark:hover:bg-[#2a362c] hover:text-primary transition-colors"
                                                    title="Edit">
                                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                                </a>
                                                <button onclick="openDeleteModal(<?= $category->id ?>)"
                                                    class="rounded-lg p-1.5 text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 transition-colors"
                                                    title="Delete">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex items-center justify-between border-t border-[#e9f1eb] dark:border-[#2a362c] p-4">
                        <span class="text-sm text-[#5b8b66]">Showing 1-4 of 12 categories</span>
                        <div class="flex items-center gap-2">
                            <button
                                class="flex size-8 items-center justify-center rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] text-[#5b8b66] hover:bg-[#f9fbf9] dark:hover:bg-[#2a362c] disabled:opacity-50">
                                <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                            </button>
                            <button
                                class="flex size-8 items-center justify-center rounded-lg bg-primary text-white shadow-sm">
                                1
                            </button>
                            <button
                                class="flex size-8 items-center justify-center rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] text-[#5b8b66] hover:bg-[#f9fbf9] dark:hover:bg-[#2a362c]">
                                2
                            </button>
                            <button
                                class="flex size-8 items-center justify-center rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] text-[#5b8b66] hover:bg-[#f9fbf9] dark:hover:bg-[#2a362c]">
                                3
                            </button>
                            <button
                                class="flex size-8 items-center justify-center rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] text-[#5b8b66] hover:bg-[#f9fbf9] dark:hover:bg-[#2a362c]">
                                <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div
                    class="flex flex-col items-center justify-center rounded-xl border border-dashed border-[#e9f1eb] dark:border-[#2a362c] bg-white dark:bg-[#1a261e] p-12 text-center shadow-sm">
                    <div class="flex size-16 items-center justify-center rounded-full bg-primary/10 text-primary mb-4">
                        <span class="material-symbols-outlined text-3xl">category</span>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-[#101912] dark:text-white">No categories found</h3>
                    <p class="mb-6 text-sm text-[#5b8b66] max-w-xs mx-auto">It looks like you haven't created
                        any categories yet. Start by adding your first one to organize your content.</p>
                    <a class="flex items-center gap-2 rounded-lg bg-primary hover:bg-green-700 px-5 py-2.5 text-sm font-bold text-white shadow-md hover:shadow-lg transition-all active:scale-[0.98]"
                        href="<?= route('admin.categories.create') ?>">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        Create Category
                    </a>
                </div>
            <?php endif; ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="rounded-xl bg-primary/5 p-4 border border-primary/10">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-white dark:bg-[#1a261e] text-primary shadow-sm">
                            <span class="material-symbols-outlined">folder</span>
                        </div>
                        <div>
                            <p class="text-sm text-[#5b8b66]">Total Categories</p>
                            <p class="text-xl font-bold text-[#101912] dark:text-white"><?= $categories_count ?></p>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl bg-[#e9f1eb] dark:bg-[#2a362c] p-4 border border-transparent">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-white dark:bg-[#1a261e] text-[#5b8b66] shadow-sm">
                            <span class="material-symbols-outlined">visibility_off</span>
                        </div>
                        <div>
                            <p class="text-sm text-[#5b8b66]">Empty Categories</p>
                            <p class="text-xl font-bold text-[#101912] dark:text-white"><?= $unused_categories_count ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl bg-[#e9f1eb] dark:bg-[#2a362c] p-4 border border-transparent">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-white dark:bg-[#1a261e] text-[#5b8b66] shadow-sm">
                            <span class="material-symbols-outlined">trending_up</span>
                        </div>
                        <div>
                            <p class="text-sm text-[#5b8b66]">Top Category</p>
                            <p class="text-xl font-bold text-[#101912] dark:text-white"><?= $most_used_category_name ?? "-" ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div id="delete-modal"
    class="fixed inset-0 z-40 bg-[#1b0d0d]/60 glass-effect flex items-center justify-center p-4 transition-opacity duration-300 hidden">
    <!-- Modal Container -->
    <!-- Note: Using requested #fbfffb for light mode background, adapting for dark mode -->
    <form action="<?= route('admin.categories.destroy') ?>" method="post"
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
                Delete Category
            </h2>
            <!-- Body Text -->
            <p class="text-[#1b0d0d]/70 dark:text-white/70 text-base font-normal leading-relaxed px-2">
                Are you sure you want to delete the category <strong
                    class="text-[#1b0d0d] dark:text-white font-semibold">'<span class="name"></span>'</strong>? This
                action cannot be undone and will remove the category from your blog permanently.
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
        const name = deleteModal.querySelector('.name');
        name.textContent = document.querySelector(`#categories tr[data-id="${id}"] .name`).textContent.trim();
        deleteModal.querySelector('input[name="id"]').value = id;
        deleteModal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>