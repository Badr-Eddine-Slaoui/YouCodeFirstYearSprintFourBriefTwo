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
                            class="text-sm font-medium text-text-main dark:text-white">Comments</span>
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
                        placeholder="Search comments..." type="text" />
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
                <h2 class="text-2xl font-bold text-text-main dark:text-white">Reader Comments</h2>
                <p class="text-sm text-text-secondary dark:text-gray-400">View and manage discussion on your
                    published stories.</p>
            </div>
            <div
                class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-background-card dark:bg-[#1a261d] p-3 rounded-xl shadow-soft">
                <div class="flex items-center gap-2 w-full sm:w-auto overflow-x-auto pb-2 sm:pb-0">
                    <button
                        class="px-4 py-2 text-sm font-semibold text-primary border-b-2 border-primary bg-primary/5 rounded-t-md whitespace-nowrap">All
                        Comments</button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-text-secondary hover:text-text-main dark:text-gray-400 transition-colors whitespace-nowrap">Unread</button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-text-secondary hover:text-text-main dark:text-gray-400 transition-colors whitespace-nowrap">Reported</button>
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
            <?php if (count($comments) > 0) : ?>
                <div class="flex flex-col gap-4 pb-10">
                    <?php foreach ($comments as $comment) : ?>
                        <div
                            class="group flex flex-col rounded-xl bg-background-card dark:bg-[#1a261d] p-6 shadow-soft transition-all hover:shadow-lg border border-transparent hover:border-[#cfdfd0] dark:hover:border-[#2a382d]">
                            <div class="flex items-start justify-between gap-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-300">
                                        <span class="font-bold text-sm"><?= ucfirst($comment->reader->getFirstName()[0]) . ucfirst($comment->reader->getLastName()[0]) ?></span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-text-main dark:text-white text-sm"><?= ucwords($comment->reader->getFullName()) ?></h4>
                                        <p class="text-xs text-text-secondary dark:text-gray-400"><?= diffForHuman($comment->created_at) ?></p>
                                    </div>
                                </div>
                                <?php if(!$comment->is_reported_by_current_user) : ?>
                                    <button onclick="report(<?= $comment->id ?>)"
                                        class="flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-semibold text-text-secondary hover:bg-red-50 hover:text-red-600 dark:text-gray-400 dark:hover:bg-red-900/20 dark:hover:text-red-400 transition-colors"
                                        title="Report Comment">
                                        <span class="material-symbols-outlined text-[18px]">flag</span>
                                        <span class="hidden sm:inline">Report</span>
                                    </button>
                                <?php else : ?>
                                    <form action="<?= route('report.comment.destroy') ?>" method="post">
                                        <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                        <button type="submit"
                                            class="flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-semibold bg-red-50 text-red-600 dark:text-gray-400 dark:hover:bg-red-900/20 dark:hover:text-red-400 transition-colors"
                                            title="Report Comment">
                                            <span class="material-symbols-outlined text-[18px]">flag</span>
                                            <span class="hidden sm:inline">Reported</span>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                            <div class="pl-0 sm:pl-13 mb-4">
                                <p class="text-sm text-text-main dark:text-gray-200 leading-relaxed">
                                    <?= $comment->body ?>
                                </p>
                            </div>
                            <div class="flex items-center gap-2 rounded-lg bg-[#f0f7f1] dark:bg-[#253528] p-3 sm:ml-13">
                                <span class="material-symbols-outlined text-text-secondary text-[18px]">article</span>
                                <span class="text-xs font-medium text-text-secondary dark:text-gray-400">Commented
                                    on:</span>
                                <a class="text-xs font-bold text-primary hover:underline truncate" href="<?= route('author.articles.show') ?>?id=<?= $comment->article->id ?>"><?= $comment->article->title ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
                        It looks like there are no comments to display right now. When readers start engaging with your
                        articles, their comments will appear here for you to moderate.
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

<div id="report-modal" aria-labelledby="modal-title" aria-modal="true"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6 hidden" role="dialog">
    <div class="absolute inset-0 bg-[#0d1b12]/60 backdrop-blur-sm transition-opacity"></div>
    <form action="<?= route('report.comment.store') ?>" method="post"
        class="relative w-full max-w-[480px] transform overflow-hidden rounded-2xl bg-sh-content-surface p-6 sm:p-8 text-left shadow-2xl transition-all border border-[#e7f3eb]">
        <input id="comment_id" type="hidden" name="comment_id" value="">
        <button onclick="closeReportModal()" type="button"
            class="absolute top-4 right-4 p-2 rounded-full text-text-muted hover:bg-[#e7f3eb] hover:text-text-main transition-colors">
            <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
        <div class="mb-6">
            <div class="flex items-center gap-3 mb-2 text-red-500">
                <span class="material-symbols-outlined text-[28px]">report</span>
                <h3 class="text-2xl font-bold text-text-main" id="modal-title">Report Content</h3>
            </div>
            <p class="text-text-muted">
                Please select a reason for reporting this content. This helps our moderators understand the issue.
            </p>
        </div>
        <div class="space-y-3 mb-8">
            <input type="hidden" id="target_id" name="" value="">
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="spam" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Spam</span>
            </label>
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="explicit content" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Explicit
                    Content</span>
            </label>
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="insult" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Insult</span>
            </label>
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="racist content" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Racist
                    Content</span>
            </label>
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="offensive" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Offensive</span>
            </label>
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="abuse" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Abuse</span>
            </label>
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="copyright" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Copyright
                    Violation</span>
            </label>
            <label
                class="flex items-center p-3.5 border border-[#e7f3eb] rounded-xl cursor-pointer hover:bg-[#e7f3eb]/50 hover:border-primary/30 transition-all group">
                <input
                    class="h-5 w-5 border-2 border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer"
                    name="report_reason" type="radio" value="other" />
                <span class="ml-3 font-medium text-text-main group-hover:text-primary transition-colors">Other</span>
            </label>
        </div>
        <div class="flex gap-3 justify-end pt-2">
            <button onclick="closeReportModal()"
                class="px-5 py-2.5 rounded-lg border border-[#e7f3eb] text-text-main font-bold hover:bg-[#e7f3eb] transition-colors">
                Cancel
            </button>
            <button type="submit"
                class="px-5 py-2.5 rounded-lg bg-red-500 text-white font-bold hover:bg-red-600 shadow-md shadow-red-500/20 transition-all">
                Report
            </button>
        </div>
    </form>
</div>

<script>
    function report(id) {
        const report_modal = document.getElementById('report-modal')
        const input = report_modal.querySelector('#comment_id')
        input.value = id
        report_modal.classList.remove('hidden')
    }

    function closeReportModal() {
        const report_modal = document.getElementById('report-modal')
        report_modal.classList.add('hidden')
    }
</script>