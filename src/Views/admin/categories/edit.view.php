<main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-6 md:p-10">
    <div class="mx-auto max-w-4xl flex flex-col gap-8">
        <div class="flex flex-col gap-4">
            <nav class="flex items-center gap-2 text-sm text-[#5b8b66]">
                <a class="hover:text-primary transition-colors" href="<?= route('admin.dashboard') ?>">Dashboard</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <a class="hover:text-primary transition-colors" href="<?= route('admin.categories.index') ?>">Categories</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="font-medium text-[#101912] dark:text-white">Edit Category</span>
            </nav>
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-tight text-[#101912] dark:text-white">
                        Edit Category</h1>
                    <p class="mt-2 text-[#5b8b66]">Update category details and settings.</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-[#e9f1eb] dark:border-[#2a362c] bg-white dark:bg-[#1a261e] shadow-sm">
            <div class="border-b border-[#e9f1eb] dark:border-[#2a362c] px-6 py-4 flex justify-between items-center">
                <h3 class="text-lg font-bold text-[#101912] dark:text-white">Category Details</h3>
                <span class="text-sm text-[#5b8b66]">ID: <?= $category->id ?></span>
            </div>
            <form action="<?= route('admin.categories.update') ?>" method="post" class="p-6 md:p-8 flex flex-col gap-6">
                <input type="hidden" name="id" value="<?= $category->id ?>">
                <label class="flex flex-col gap-1.5">
                    <span class="text-sm font-medium text-[#101912] dark:text-white">Name <span
                            class="text-red-500">*</span></span>
                    <input
                        class="rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] bg-[#f9fbf9] dark:bg-[#141e16] px-3 py-2.5 text-sm text-[#101912] dark:text-white placeholder:text-[#5b8b66] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                        placeholder="e.g. Technology" value="<?= $category->name ?>" name="name" type="text" />
                </label>
                <?php if (session()->hasError('name')) : ?>
                    <p class="text-xs text-red-500 mt-1">
                        <?= session()->getError('name') ?>
                    </p>
                <?php endif; ?>
                <label class="flex flex-col gap-1.5">
                    <span class="text-sm font-medium text-[#101912] dark:text-white">Description</span>
                    <textarea name="description"
                        class="resize-y rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] bg-[#f9fbf9] dark:bg-[#141e16] px-3 py-2.5 text-sm text-[#101912] dark:text-white placeholder:text-[#5b8b66] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                        placeholder="Enter category description..." rows="6"><?= $category->description ?></textarea>
                    <span class="text-xs text-[#5b8b66]">The description is not prominent by default;
                        however, some themes may show it.</span>
                </label>
                <div class="flex items-center gap-4 pt-6 border-t border-[#e9f1eb] dark:border-[#2a362c] mt-2">
                    <button type="submit"
                        class="rounded-lg bg-primary hover:bg-green-700 px-6 py-2.5 text-sm font-bold text-white shadow-md hover:shadow-lg transition-all active:scale-[0.98]">
                        Update Category
                    </button>
                    <button type="reset"
                        class="rounded-lg border border-[#e9f1eb] dark:border-[#2a362c] px-6 py-2.5 text-sm font-medium text-[#5b8b66] hover:bg-[#f9fbf9] dark:hover:bg-[#2a362c] hover:text-[#101912] dark:hover:text-white transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>