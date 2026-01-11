<!-- Main Scrollable Area -->
<main class="flex-1 overflow-y-auto p-4 lg:p-8 bg-background-light dark:bg-background-dark">
    <div class="mx-auto max-w-6xl space-y-6">
        <!-- Page Heading & Actions -->
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div class="flex flex-col gap-1">
                <h1 class="text-3xl font-black leading-tight tracking-[-0.033em] text-text-main dark:text-white">
                    All Comments</h1>
                <p class="text-base font-normal leading-normal text-text-muted dark:text-gray-400">Moderate
                    discussions and manage reader engagement.</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="flex items-center gap-2 rounded-lg border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark px-4 py-2 text-sm font-bold text-text-main dark:text-white shadow-sm hover:bg-gray-50 dark:hover:bg-white/5">
                    <span class="material-symbols-outlined text-[20px]">filter_list</span>
                    Filter
                </button>
                <button
                    class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-primary/90">
                    <span class="material-symbols-outlined text-[20px]">download</span>
                    Export
                </button>
            </div>
        </div>
        <!-- Search Bar Full Width -->
        <div class="w-full">
            <label class="flex h-12 w-full flex-col">
                <div
                    class="flex h-full w-full flex-1 items-stretch rounded-xl border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark shadow-sm focus-within:ring-2 focus-within:ring-primary">
                    <div class="flex items-center justify-center pl-4 text-text-muted">
                        <span class="material-symbols-outlined">search</span>
                    </div>
                    <input
                        class="flex h-full w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl border-none bg-transparent px-4 text-base font-normal leading-normal text-text-main dark:text-white placeholder:text-text-muted focus:border-none focus:outline-none focus:ring-0"
                        placeholder="Search comments by keyword, author, or article..." value="" />
                </div>
            </label>
        </div>
        <?php if (count($comments) > 0): ?>
            <div
                class="overflow-hidden rounded-xl border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 dark:bg-white/5 text-text-main dark:text-white">
                            <tr class="border-b border-border-light dark:border-border-dark">
                                <th class="px-6 py-4 font-semibold">Author</th>
                                <th class="px-6 py-4 font-semibold w-1/3">Comment</th>
                                <th class="px-6 py-4 font-semibold">Article</th>
                                <th class="px-6 py-4 font-semibold">Date</th>
                                <th class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="comments" class="divide-y divide-border-light dark:divide-border-dark">
                            <!-- Row 1 -->
                            <?php foreach ($comments as $comment): ?>
                                <tr data-id="<?= $comment->id ?>" class="group hover:bg-background-light dark:hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-10 w-10 rounded-full bg-cover bg-center"
                                                data-alt="Portrait of Sarah Jenkins"
                                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCvachW7_O0SbNQUcADk9Yicba8sbqKMWLt21H22EUIqB3jni-0oJXcaqg3e4qDAMfeZYrbDSjIdUgdOFiABlezGz-nsQdLb9YjvvlEx5ZgqenQ6-Zo3BvVw2tbrAD2DQbmQl2d9vXlA4zZhj6X0vfssEQbLNUhfNmDMN-WLXzGWCwIA-jgboFEOkaeXJ_zI92yyvoHeG3qDvWndIoiPD9qn5NWSTWUKKy5jT8PjTIYOXyBSWAlEjo377BmGDczn2VbCrbCUkD8-5Q');">
                                            </div>
                                            <div class="flex flex-col">
                                                <span
                                                    class="username font-bold text-text-main dark:text-white"><?= ucwords($comment->reader->getFullName()) ?></span>
                                                <span class="text-xs text-text-muted"><?= $comment->reader->getEmail() ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="content line-clamp-2 text-text-main dark:text-gray-300">
                                            <?= $comment->body ?>
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="font-medium text-primary hover:underline cursor-pointer"><?= $comment->article->title ?></span>
                                        <span class="created-at text-xs text-text-muted"><?= diffForHuman($comment->created_at) ?></span>
                                    </td>
                                    <td class="px-6 py-4 text-text-muted whitespace-nowrap">
                                        <?= $comment->created_at->format('M d, Y') ?>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button type="button" onclick="openDeleteModal(<?= $comment->id ?>)"
                                                class="rounded p-1.5 text-text-muted hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 dark:hover:text-red-400 transition-colors"
                                                title="Delete Comment">
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
                    class="flex items-center justify-between border-t border-border-light dark:border-border-dark bg-white dark:bg-surface-dark px-6 py-4">
                    <p class="text-sm text-text-muted">
                        Showing <span class="font-bold text-text-main dark:text-white">1</span> to <span
                            class="font-bold text-text-main dark:text-white">4</span> of <span
                            class="font-bold text-text-main dark:text-white">128</span> results
                    </p>
                    <div class="flex gap-2">
                        <button
                            class="rounded-lg border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark px-4 py-2 text-sm font-medium text-text-muted disabled:opacity-50 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                            Previous
                        </button>
                        <button
                            class="rounded-lg border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark px-4 py-2 text-sm font-medium text-text-main dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div
                class="flex flex-col items-center justify-center rounded-xl border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark px-6 py-16 text-center shadow-sm">
                <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-[#e9f1eb] dark:bg-white/5">
                    <span
                        class="material-symbols-outlined text-4xl text-primary dark:text-primary/80">chat_bubble_outline</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-text-main dark:text-white">No comments yet</h3>
                <p class="max-w-md text-base text-text-muted dark:text-gray-400">
                    It looks like there are no comments to display right now. When readers start engaging with
                    articles, their comments will appear here for you to moderate.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="<?= route('admin.articles.index') ?>"
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
</main>

<div id="delete-modal" aria-labelledby="modal-title" aria-modal="true"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#221010]/60 backdrop-blur-sm hidden" role="dialog">
    <!-- Modal Container -->
    <!-- Using #fbfffb as requested for the modal background -->
    <form action="<?= route('admin.comments.destroy') ?>" method="post"
        class="relative w-full max-w-lg overflow-hidden bg-[#fbfffb] dark:bg-[#1c0d0d] rounded-xl shadow-[0_20px_40px_-10px_rgba(0,0,0,0.2)] transform transition-all">
        <input type="hidden" name="id" value="">
        <div class="p-6 sm:p-8">
            <!-- Header with Icon -->
            <div class="flex items-start gap-4 mb-6">
                <!-- Warning Icon Container -->
                <div
                    class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-red-primary/10 sm:w-14 sm:h-14">
                    <span class="material-symbols-outlined text-red-primary text-2xl sm:text-3xl">
                        delete_forever
                    </span>
                </div>
                <div class="flex-1 mt-1">
                    <h3 class="text-xl font-bold leading-6 text-gray-900 dark:text-white" id="modal-title">
                        Delete Comment
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Are you sure you want to permanently remove this comment? This action cannot be undone.
                        </p>
                    </div>
                </div>
                <!-- Close X Button (Optional but good UX) -->
                <button onclick="closeDeleteModal()" type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" type="button">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>
            <!-- Content Snippet (The item being deleted) -->
            <div class="mt-2 mb-8">
                <div
                    class="bg-white dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-lg p-4 shadow-sm">
                    <!-- Reusing SingleComment internal structure -->
                    <div class="flex w-full flex-row items-start justify-start gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full w-10 h-10 shrink-0 shadow-inner"
                            data-alt="Avatar of user Jane Doe"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCbcVdzjwuJU3COEEQjo8CcqEOua7RtQSPFNnFr8wlI1dVsfi8Tw8-O9WsQAbdY0kcPTrwFNe1B3kGwtSXLKFBM4cbELb_vAKM2k4UCfuYX1MXKyLBRejHJtoUOE2gbi7eHAN1l7XhwWVxbKpUkdWIlLe7XMAepEI18nZLVwuhadOajEQtkuAZ-rPncGZRheCRWO3mao-qjRjXpIAWgIKb5NN6OjP4Nsg7fifMWn0IiVhsskN2VICeuucxYiTm2qOdBdE-47Z1E_yo");'>
                        </div>
                        <div class="flex h-full flex-1 flex-col items-start justify-start">
                            <div class="flex w-full flex-row items-center justify-start gap-x-2 mb-1">
                                <p
                                    class="username text-[#1b0d0d] dark:text-white text-sm font-bold leading-normal tracking-[0.015em]"></p>
                                <span class="text-xs text-gray-400">•</span>
                                <p class="created-at text-[#9a4c4c] dark:text-[#ec1313]/80 text-xs font-medium leading-normal"></p>
                            </div>
                            <p
                                class="content text-[#4a4a4a] dark:text-gray-300 text-sm font-normal leading-relaxed line-clamp-2"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                <button onclick="closeDeleteModal()"
                    class="inline-flex w-full justify-center items-center rounded-lg bg-white dark:bg-transparent px-4 py-2.5 text-sm font-bold text-gray-700 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 dark:hover:bg-white/5 sm:w-auto transition-colors focus:ring-2 focus:ring-red-primary focus:outline-none"
                    type="button">
                    Cancel
                </button>
                <button
                    class="inline-flex w-full justify-center items-center rounded-lg bg-red-primary px-4 py-2.5 text-sm font-bold text-white shadow-md hover:bg-red-700 sm:w-auto transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-red-primary focus:outline-none gap-2"
                    type="submit">
                    <span class="material-symbols-outlined text-[20px]">delete</span>
                    Delete
                </button>
            </div>
        </div>
        <!-- Bottom decorative accent to reinforce danger -->
        <div class="h-1 w-full bg-red-primary/20"></div>
    </form>
</div>

<script>
    function openDeleteModal(id) {
        const deleteModal = document.getElementById('delete-modal');
        const username = deleteModal.querySelector('.username');
        username.textContent = document.querySelector(`#comments tr[data-id="${id}"] .username`).textContent.trim();
        const createdAt = deleteModal.querySelector('.created-at');
        createdAt.textContent = document.querySelector(`#comments tr[data-id="${id}"] .created-at`).textContent.trim();
        const content = deleteModal.querySelector('.content');
        content.textContent = document.querySelector(`#comments tr[data-id="${id}"] .content`).textContent.trim();
        deleteModal.querySelector('input[name="id"]').value = id;
        deleteModal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }
</script>