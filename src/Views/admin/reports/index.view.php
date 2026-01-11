<div class="flex-1 flex flex-col h-screen overflow-y-auto bg-background-light dark:bg-background-dark">
    <div
        class="lg:hidden flex items-center justify-between p-4 border-b border-border-light dark:border-[#2a3c2e] bg-card-light dark:bg-background-dark sticky top-0 z-10">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">menu</span>
            <span class="font-bold text-lg text-[#101912] dark:text-white">BlogAdmin</span>
        </div>
        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8" data-alt="Admin avatar small"
            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA_bUoU3yILoocNyQY8dKryddyBidCBK4-EIm9tZE5p4Ewgp0zxYIUE-sVP5A_IHzmvzwaOKV3V53ZADAsM3_BuhkB6oIes6CanD1wa6CUJf5k5KMqW2-AuWQxSgewiiDxHQeVc_ewdIiZdJg61dCRZeslcPLcFU09jdbUVo-_L4MhB7EcXwCllahNzwmzLoYvpQQSLpkMUJOsXLd3xIfBD1XVozKedkhCx3oDWGiQFP-h-t1n4q2Y7ff2Si6tyHxHzoaEWxRExhXQ");'>
        </div>
    </div>
    <div class="flex-1 px-4 py-8 lg:px-12 lg:py-10 max-w-[1400px] mx-auto w-full">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div class="flex flex-col gap-2">
                <h1
                    class="text-[#101912] dark:text-white text-3xl lg:text-4xl font-black leading-tight tracking-[-0.033em]">
                    Report Center</h1>
                <p class="text-[#5b8b66] dark:text-gray-400 text-base font-normal leading-normal max-w-xl">
                    Review flagged content, manage community disputes, and oversee system alerts to maintain a
                    healthy platform environment.</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center justify-center gap-2 rounded-lg h-12 px-6 bg-white dark:bg-[#1e2a22] hover:bg-gray-50 dark:hover:bg-[#253329] text-[#101912] dark:text-white border border-border-light dark:border-[#2a3c2e] text-sm font-bold leading-normal transition shadow-sm shrink-0">
                    <span class="material-symbols-outlined" style="font-size: 20px;">file_download</span>
                    <span class="truncate">Export Log</span>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-card-light dark:bg-[#1e2a22] p-6 rounded-xl shadow-soft border border-border-light dark:border-[#2a3c2e] flex items-center gap-5">
                <div
                    class="size-12 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center text-red-600 dark:text-red-400">
                    <span class="material-symbols-outlined">priority_high</span>
                </div>
                <div class="flex flex-col">
                    <p class="text-[#5b8b66] dark:text-gray-400 text-sm font-medium">Total reports (All Time)</p>
                    <h2 class="text-[#101912] dark:text-white text-2xl font-bold"><?= $reports_count ?></h2>
                </div>
            </div>
            <div
                class="bg-card-light dark:bg-[#1e2a22] p-6 rounded-xl shadow-soft border border-border-light dark:border-[#2a3c2e] flex items-center gap-5">
                <div
                    class="size-12 rounded-full bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-400">
                    <span class="material-symbols-outlined">priority_high</span>
                </div>
                <div class="flex flex-col">
                    <p class="text-[#5b8b66] dark:text-gray-400 text-sm font-medium">Pending Reports</p>
                    <h2 class="text-[#101912] dark:text-white text-2xl font-bold"><?= $pending_reports_count ?></h2>
                </div>
            </div>
            <div
                class="bg-card-light dark:bg-[#1e2a22] p-6 rounded-xl shadow-soft border border-border-light dark:border-[#2a3c2e] flex items-center gap-5">
                <div
                    class="size-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-400">
                    <span class="material-symbols-outlined">done</span>
                </div>
                <div class="flex flex-col">
                    <p class="text-[#5b8b66] dark:text-gray-400 text-sm font-medium">Resolved Reports</p>
                    <h2 class="text-[#101912] dark:text-white text-2xl font-bold"><?= $resolved_reports_count ?></h2>
                </div>
            </div>
        </div>
        <div
            class="bg-card-light dark:bg-[#1e2a22] p-4 rounded-xl shadow-soft border border-border-light dark:border-[#2a3c2e] mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">search</span>
                    </span>
                    <input
                        class="w-full h-12 pl-11 pr-4 rounded-lg bg-[#f0f6f1] dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white placeholder-[#5b8b66] focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm transition-all"
                        placeholder="Search report ID, user, or reason..." />
                </div>
                <div class="w-full md:w-48 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">category</span>
                    </span>
                    <select
                        class="w-full h-12 pl-10 pr-8 rounded-lg bg-[#f0f6f1] dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm appearance-none cursor-pointer">
                        <option value="">All Content</option>
                        <option value="article">Articles</option>
                        <option value="comment">Comments</option>
                        <option value="user">Users</option>
                    </select>
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_drop_down</span>
                    </span>
                </div>
                <div class="w-full md:w-48 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">filter_list</span>
                    </span>
                    <select
                        class="w-full h-12 pl-10 pr-8 rounded-lg bg-[#f0f6f1] dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm appearance-none cursor-pointer">
                        <option value="">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="reviewed">In Review</option>
                        <option value="resolved">Resolved</option>
                        <option value="dismissed">Dismissed</option>
                    </select>
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_drop_down</span>
                    </span>
                </div>
            </div>
        </div>
        <?php if (count($reports) > 0): ?>
            <div
                class="overflow-hidden rounded-xl border border-border-light dark:border-[#2a3c2e] bg-card-light dark:bg-[#1e2a22] shadow-soft mb-6">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[900px]">
                        <thead>
                            <tr class="bg-[#f0f6f1] dark:bg-[#253329] border-b border-border-light dark:border-[#2a3c2e]">
                                <th class="w-12 px-4 py-3 text-center">
                                    <input
                                        class="rounded border-gray-300 text-primary focus:ring-primary bg-white dark:bg-black/20"
                                        type="checkbox" />
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Reported Entity</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Reason</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Reported By</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Date</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody id="reports" class="divide-y divide-border-light dark:divide-[#2a3c2e]">
                            <?php foreach ($reports as $report): ?>
                                <?php if ($report->type === 'article'): ?>
                                    <tr data-user="<?= $report->user_id ?>" data-id="<?= $report->id ?>"
                                        class="group hover:bg-[#f0f6f1] dark:hover:bg-[#253329] transition-colors">
                                        <td class="px-4 py-4 text-center">
                                            <input
                                                class="rounded border-gray-300 text-primary focus:ring-primary bg-white dark:bg-black/20"
                                                type="checkbox" />
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-start gap-4">
                                                <div
                                                    class="shrink-0 size-10 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-500">
                                                    <span class="material-symbols-outlined text-[20px]">article</span>
                                                </div>
                                                <div class="flex flex-col max-w-[200px]">
                                                    <span
                                                        class="text-[#101912] dark:text-white font-medium text-sm italic truncate"><?= $report->content ?></span>
                                                    <span
                                                        class="text-[#5b8b66] dark:text-gray-400 text-xs mt-0.5"><?= diffForHuman($report->created_at) ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col">
                                                <span
                                                    class="report-reason text-[#101912] dark:text-white font-medium text-sm"><?= ucwords($report->reason) ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-6"
                                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBYkm95b2HnyqZQUnhUrTs-68AhhLqE-uaWIEza1r5-dHJJ2lHXcG3vxBMu8YVoK0rBKFRdsHcSmvbjNSCgVVI5i97LQa2yF6GuSGEhcT6xL3lRZzpXn_pwMBl-bgGMqRJWF7Z3ffexgjuU_upkUlyyDilPSkzf6s5tya3uPqs9wwybMKr8Le7TDhb_iHmI0ZauY_2NuYyBt22sIJ1nxVZyD4lehdPbVTXcKimX_SDDoKVvXTioiBdo-T-Erjb-GTex4Qt6l-Q1_pY");'>
                                                </div>
                                                <span
                                                    class="full-name text-sm text-[#101912] dark:text-white"><?= ucwords("{$report->first_name} {$report->last_name}") ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php if ($report->status === 'resolved'): ?>
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800/50">
                                                    <span class="material-symbols-outlined text-[14px]">check</span>
                                                    Resolved
                                                </span>
                                            <?php else: ?>
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300 border border-orange-200 dark:border-orange-800/50">
                                                    <span class="size-1.5 rounded-full bg-orange-500"></span>
                                                    Pending Review
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="text-[#101912] dark:text-white text-sm"><?= $report->created_at->format('M d, Y') ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <?php if ($report->status === 'resolved'): ?>
                                                <p
                                                    class="text-primary hover:text-green-700 dark:text-green-400 font-medium text-sm mr-2 transition-colors">Reviewed</p>
                                            <?php else: ?>
                                                <button onclick="showActionsModal(<?= $report->id ?>)"
                                                    class="text-primary hover:text-green-700 dark:text-green-400 font-medium text-sm mr-2 transition-colors">Review</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr data-user="<?= $report->user_id ?>" data-id="<?= $report->id ?>"
                                        class="group hover:bg-[#f0f6f1] dark:hover:bg-[#253329] transition-colors">
                                        <td class="px-4 py-4 text-center">
                                            <input
                                                class="rounded border-gray-300 text-primary focus:ring-primary bg-white dark:bg-black/20"
                                                type="checkbox" />
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-start gap-4">
                                                <div
                                                    class="shrink-0 size-10 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-blue-500">
                                                    <span class="material-symbols-outlined text-[20px]">chat_bubble</span>
                                                </div>
                                                <div class="flex flex-col max-w-[200px]">
                                                    <span
                                                        class="text-[#101912] dark:text-white font-medium text-sm italic truncate"><?= $report->content ?></span>
                                                    <span
                                                        class="text-[#5b8b66] dark:text-gray-400 text-xs mt-0.5"><?= diffForHuman($report->created_at) ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col">
                                                <span
                                                    class="report-reason text-[#101912] dark:text-white font-medium text-sm"><?= ucwords($report->reason) ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-6"
                                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBYkm95b2HnyqZQUnhUrTs-68AhhLqE-uaWIEza1r5-dHJJ2lHXcG3vxBMu8YVoK0rBKFRdsHcSmvbjNSCgVVI5i97LQa2yF6GuSGEhcT6xL3lRZzpXn_pwMBl-bgGMqRJWF7Z3ffexgjuU_upkUlyyDilPSkzf6s5tya3uPqs9wwybMKr8Le7TDhb_iHmI0ZauY_2NuYyBt22sIJ1nxVZyD4lehdPbVTXcKimX_SDDoKVvXTioiBdo-T-Erjb-GTex4Qt6l-Q1_pY");'>
                                                </div>
                                                <span
                                                    class="full-name text-sm text-[#101912] dark:text-white"><?= ucwords("{$report->first_name} {$report->last_name}") ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php if ($report->status === 'resolved'): ?>
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800/50">
                                                    <span class="material-symbols-outlined text-[14px]">check</span>
                                                    Resolved
                                                </span>
                                            <?php else: ?>
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300 border border-orange-200 dark:border-orange-800/50">
                                                    <span class="size-1.5 rounded-full bg-orange-500"></span>
                                                    Pending Review
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="text-[#101912] dark:text-white text-sm"><?= $report->created_at->format('M d, Y') ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <?php if ($report->status === 'resolved'): ?>
                                                <p
                                                    class="text-primary hover:text-green-700 dark:text-green-400 font-medium text-sm mr-2 transition-colors">Reviewed</p>
                                            <?php else: ?>
                                                <button onclick="showActionsModal(<?= $report->id ?>)"
                                                    class="text-primary hover:text-green-700 dark:text-green-400 font-medium text-sm mr-2 transition-colors">Review</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div
                    class="flex items-center justify-between border-t border-border-light dark:border-[#2a3c2e] bg-[#f0f6f1] dark:bg-[#1e2a22] px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a class="relative inline-flex items-center rounded-md border border-[#d4e3d7] dark:border-[#2a3c2e] bg-white dark:bg-[#253329] px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50"
                            href="#">Previous</a>
                        <a class="relative ml-3 inline-flex items-center rounded-md border border-[#d4e3d7] dark:border-[#2a3c2e] bg-white dark:bg-[#253329] px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50"
                            href="#">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-[#5b8b66] dark:text-gray-400">
                                Showing <span class="font-medium text-[#101912] dark:text-white">1</span> to <span
                                    class="font-medium text-[#101912] dark:text-white">4</span> of <span
                                    class="font-medium text-[#101912] dark:text-white">18</span> pending
                            </p>
                        </div>
                        <div>
                            <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                                <a class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] hover:bg-gray-50 dark:hover:bg-white/5 focus:z-20 focus:outline-offset-0"
                                    href="#">
                                    <span class="sr-only">Previous</span>
                                    <span class="material-symbols-outlined" style="font-size: 20px;">chevron_left</span>
                                </a>
                                <a aria-current="page"
                                    class="relative z-10 inline-flex items-center bg-primary px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                    href="#">1</a>
                                <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-[#101912] dark:text-white ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] hover:bg-gray-50 dark:hover:bg-white/5 focus:z-20 focus:outline-offset-0"
                                    href="#">2</a>
                                <a class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] hover:bg-gray-50 dark:hover:bg-white/5 focus:z-20 focus:outline-offset-0"
                                    href="#">
                                    <span class="sr-only">Next</span>
                                    <span class="material-symbols-outlined" style="font-size: 20px;">chevron_right</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div
                class="flex flex-col items-center justify-center rounded-xl border border-dashed border-[#e9f1eb] dark:border-[#2a362c] bg-white dark:bg-[#1a261e] p-12 text-center shadow-sm">
                <div class="flex size-16 items-center justify-center rounded-full bg-primary/10 text-primary mb-4">
                    <span class="material-symbols-outlined text-3xl">flag</span>
                </div>
                <h3 class="mb-2 text-lg font-bold text-[#101912] dark:text-white">No reports found</h3>
                <p class="mb-6 text-sm text-[#5b8b66] max-w-xs mx-auto">It looks like there are no reports to review.
                    Check back later to see if any new reports have been submitted.
                </p>
                <a class="flex items-center gap-2 rounded-lg bg-primary hover:bg-green-700 px-5 py-2.5 text-sm font-bold text-white shadow-md hover:shadow-lg transition-all active:scale-[0.98]"
                    href="<?= route('admin.dashboard') ?>">
                    <span class="material-symbols-outlined text-[20px]">dashboard</span>
                    Back To Dashboard
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div id="actions-modal" data-user="" data-report="" data-action="ban"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4 modal-overlay hidden">
    <div
        class="bg-modal-bg w-full max-w-lg rounded-xl shadow-modal overflow-hidden flex flex-col border border-[#c8dac9]">
        <div class="p-6 border-b border-[#e5f1e6]">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-modal-text text-xl font-bold">Moderation Action</h2>
                    <p class="text-[#5b8b66] text-sm mt-1">Select an enforcement action for <span
                            class="username font-bold text-[#101912]"></span></p>
                </div>
                <button onclick="closeActionsModal()" class="text-[#5b8b66] hover:text-[#101912] transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>
        <div class="p-6 space-y-3">
            <button data-action="ban"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div class="shrink-0 size-10 rounded-full bg-red-50 flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined">gavel</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="action-text text-modal-text font-bold text-base text-action-green transition-colors">
                            Ban User</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">Permanent removal from the platform.
                            The user will lose access to their account and all hosted content immediately.</p>
                    </div>
                    <div class="mt-1">
                        <span class="check-radio material-symbols-outlined text-action-green">check_circle</span>
                    </div>
                </div>
            </button>
            <button data-action="suspend"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-transparent hover:border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div
                        class="shrink-0 size-10 rounded-full bg-orange-50 flex items-center justify-center text-orange-600">
                        <span class="material-symbols-outlined">pause_circle</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="action-text text-modal-text font-bold text-base group-hover:text-action-green">
                            Suspend Account</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">Temporary access restriction. The
                            user will be unable to log in for a specified period (default 30 days).</p>
                    </div>
                    <div class="mt-1">
                        <span
                            class="check-radio material-symbols-outlined text-[#dfeee0] group-hover:text-action-green">radio_button_unchecked</span>
                    </div>
                </div>
            </button>
            <button data-action="blacklist"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-transparent hover:border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div
                        class="shrink-0 size-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-700">
                        <span class="material-symbols-outlined">block</span>
                    </div>
                    <div class="flex-1">
                        <h3
                            class="action-text text-modal-text font-bold text-base group-hover:text-action-green transition-colors">
                            Blacklist Details</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">Restricts the user's email and IP
                            address from creating any future accounts on the platform permanently.</p>
                    </div>
                    <div class="mt-1">
                        <span
                            class="check-radio material-symbols-outlined text-[#dfeee0] group-hover:text-action-green">radio_button_unchecked</span>
                    </div>
                </div>
            </button>
            <button data-action="timeout"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-transparent hover:border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div
                        class="shrink-0 size-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                        <span class="material-symbols-outlined">timer</span>
                    </div>
                    <div class="flex-1">
                        <h3
                            class="action-text text-modal-text font-bold text-base group-hover:text-action-green transition-colors">
                            Apply Timeout</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">Short-term restriction (24-48 hours)
                            specifically on interactive features like posting and commenting.</p>
                    </div>
                    <div class="mt-1">
                        <span
                            class="check-radio material-symbols-outlined text-[#dfeee0] group-hover:text-action-green">radio_button_unchecked</span>
                    </div>
                </div>
            </button>
        </div>
        <div class="p-6 bg-[#f7fbf8] border-t border-[#e5f1e6] flex flex-col gap-3">
            <button onclick="openActionModal()"
                class="w-full h-12 flex items-center justify-center rounded-lg bg-action-green hover:bg-[#367242] text-white font-bold text-sm shadow-sm transition-colors">
                Confirm Action
            </button>
            <button onclick="closeActionsModal()"
                class="w-full h-10 flex items-center justify-center rounded-lg text-[#5b8b66] hover:text-[#101912] font-semibold text-sm transition-colors">
                Cancel
            </button>
        </div>
    </div>
</div>

<div id="suspend-modal" aria-modal="true"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm hidden" role="dialog">
    <form action="<?= route('admin.users.suspend') ?>" method="post"
        class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-[#fbfffb] dark:bg-[#1e2a22] p-8 text-left shadow-2xl transition-all border border-[#e9f1eb] dark:border-[#2a3c2e]">
        <input class="user_id" type="hidden" name="id" value="">
        <input class="report_id" type="hidden" name="report_id" value="">
        <button onclick="closeActionModal()" type="button"
            class="absolute top-4 right-4 text-[#5b8b66] hover:text-[#101912] dark:text-gray-400 dark:hover:text-white transition-colors">
            <span class="material-symbols-outlined" style="font-size: 20px;">close</span>
        </button>
        <div class="flex flex-col gap-1 mb-6">
            <div class="flex items-center gap-3 text-amber-600 dark:text-amber-500 mb-2">
                <div class="p-2.5 bg-amber-100 dark:bg-amber-900/30 rounded-full">
                    <span class="material-symbols-outlined" style="font-size: 24px;">block</span>
                </div>
            </div>
            <h3 class="text-xl font-bold text-[#101912] dark:text-white leading-tight">Suspend User</h3>
        </div>
        <div class="flex items-center gap-4 py-4 border-b border-[#e5e7eb] dark:border-slate-700/50 mb-4">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12 bg-slate-200"
                data-alt="Portrait of Alex Johnson"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC9Gi1c-2i836eCkw0ZOc3keiie0m1_XwcHxmxzl7y3o7k-KcUFdeTwCDtb3GaD6GFp0Ik4fYm1XMTCCrYU8SZC1hj5AePijKf7YoVdD_TBmhxS7jlGZCfRaGu6-X36LAujdee_PlnqLgMiUWS71LLFIHTUoeAgyqvZwoGWUw81LgetSP7rm41Y-FaCOMbAMvUepP0bDKVpd4wzC84GUkTCKVBsNj-nyWZQltlRFHBBIkaYIfCZJCSyWvIynh5-YexN7vcB27--Zxg");'>
            </div>
            <div class="flex flex-col justify-center">
                <p class="username text-[#0d121b] dark:text-white text-base font-medium leading-normal line-clamp-1"></p>
                <p class="report-reason text-[#4c669a] dark:text-slate-400 text-sm font-normal leading-normal line-clamp-2"></p>
            </div>
        </div>
        <div class="space-y-5">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa] mb-2"
                    for="suspend-duration">Duration</label>
                <div class="relative">
                    <select
                        class="w-full h-11 pl-4 pr-10 rounded-lg bg-white dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 appearance-none cursor-pointer text-sm shadow-sm transition-all font-medium"
                        id="suspend-duration" name="suspend_duration">
                        <option value="1d">24 Hours</option>
                        <option value="3d">3 Days</option>
                        <option value="7d">7 Days</option>
                        <option value="30d">30 Days</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3 mt-8">
            <button onclick="closeActionModal()" type="button"
                class="flex items-center justify-center h-11 rounded-lg border border-[#d4e3d7] dark:border-[#2a3c2e] bg-white dark:bg-transparent text-[#101912] dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 font-bold text-sm transition-colors shadow-sm">
                Cancel
            </button>
            <button type="submit"
                class="flex items-center justify-center h-11 rounded-lg bg-amber-600 hover:bg-amber-700 text-white shadow-md shadow-amber-600/20 font-bold text-sm transition-all">
                Suspend User
            </button>
        </div>
    </form>
</div>

<div id="ban-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"></div>
    <!-- Modal Container -->
    <div
        class="relative w-full max-w-[500px] bg-modal-bg dark:bg-[#1e293b] rounded-xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.15)] flex flex-col overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 pt-6 pb-2">
            <h3 class="text-[#0d121b] dark:text-white text-xl font-bold leading-tight tracking-[-0.015em]">Ban User
                Access</h3>
            <button onclick="closeActionModal()"
                class="text-[#4c669a] dark:text-slate-400 hover:text-[#0d121b] dark:hover:text-white transition-colors rounded-full p-1 hover:bg-black/5 dark:hover:bg-white/10">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <!-- Content Scroll Area -->
        <div class="flex flex-col px-6 py-2">
            <!-- User Info ListItem -->
            <div class="flex items-center gap-4 py-4 border-b border-[#e5e7eb] dark:border-slate-700/50 mb-4">
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12 bg-slate-200"
                    data-alt="Portrait of Alex Johnson"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC9Gi1c-2i836eCkw0ZOc3keiie0m1_XwcHxmxzl7y3o7k-KcUFdeTwCDtb3GaD6GFp0Ik4fYm1XMTCCrYU8SZC1hj5AePijKf7YoVdD_TBmhxS7jlGZCfRaGu6-X36LAujdee_PlnqLgMiUWS71LLFIHTUoeAgyqvZwoGWUw81LgetSP7rm41Y-FaCOMbAMvUepP0bDKVpd4wzC84GUkTCKVBsNj-nyWZQltlRFHBBIkaYIfCZJCSyWvIynh5-YexN7vcB27--Zxg");'>
                </div>
                <div class="flex flex-col justify-center">
                    <p class="username text-[#0d121b] dark:text-white text-base font-medium leading-normal line-clamp-1"></p>
                    <p class="report-reason text-[#4c669a] dark:text-slate-400 text-sm font-normal leading-normal line-clamp-2"></p>
                </div>
            </div>
            <!-- Meta Text / Warning -->
            <div class="flex items-start gap-2 bg-red-50 dark:bg-red-900/20 p-3 rounded-lg mb-2">
                <span class="material-symbols-outlined text-red-600 dark:text-red-400 text-[20px] mt-0.5">info</span>
                <p class="text-red-800 dark:text-red-200 text-xs font-medium leading-relaxed">
                    This action will immediately revoke access. The user will be notified via email.
                </p>
            </div>
        </div>
        <!-- Footer Actions -->
        <div class="flex items-center justify-end gap-3 px-6 py-5 bg-[#fbfffb] dark:bg-[#1e293b]">
            <button onclick="closeActionModal()"
                class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-transparent hover:bg-slate-100 dark:hover:bg-white/5 border border-transparent text-[#4c669a] dark:text-slate-300 text-sm font-semibold leading-normal transition-colors">
                Cancel
            </button>
            <form action="<?= route('admin.users.ban') ?>" method="post">
                <input class="user_id" type="hidden" name="id" value="">
                <input class="report_id" type="hidden" name="report_id" value="">
                <button type="submit"
                    class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-5 bg-primary hover:bg-primary/90 text-white text-sm font-bold leading-normal tracking-[0.015em] shadow-md transition-colors">
                    Ban User
                </button>
            </form>
        </div>
    </div>
</div>

<div id="timeout-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"></div>
    <!-- Modal Container -->
    <form action="<?= route('admin.users.timeout') ?>" method="post"
        class="relative z-50 w-full max-w-[600px] transform overflow-hidden rounded-xl bg-[#fbfffb] dark:bg-[#1a2c38] shadow-2xl transition-all border border-slate-100 dark:border-slate-700">
        <input class="user_id" type="hidden" name="id" value="">
        <input class="report_id" type="hidden" name="report_id" value="">
        <!-- Header Section -->
        <div class="flex items-center justify-between px-6 pt-6 pb-4 border-b border-slate-100 dark:border-slate-800">
            <h2 class="text-[#0d141b] dark:text-white text-xl font-bold leading-tight tracking-tight">Timeout User</h2>
            <button onclick="closeActionModal()" type="button"
                class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-800">
                <span class="material-symbols-outlined !text-[24px]">close</span>
            </button>
        </div>
        <!-- Scrollable Content -->
        <div class="px-6 py-6 max-h-[80vh] overflow-y-auto custom-scrollbar">
            <!-- User Profile Summary -->
            <div
                class="flex items-center gap-4 mb-8 bg-white dark:bg-slate-800 p-4 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm">
                <div class="relative">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-14 w-14 ring-2 ring-white dark:ring-slate-700 shadow-sm"
                        data-alt="Profile picture of Alex Johnson"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDrArC-2iHwfKnWhmqfLiqsEqER6sh5CD2rmizwop-PunZCWlX47sg_xq3SnfdOs6EZCCFKx6fEfy8nCa1KP2YHV_tckWoV9wRu-nzfz8pXxG0if1QR6688SZpDAQAkRK4qBVHBnEV868S5FanrxV43KMZDEk-3UIJIPPha1fjt7oyAGvW8z-brUuB1wOaj259YiGV0T6hEZTTlXpGGzcvxS2FSyW4BJA6Mr_qjyoXKg1gW37ixo37XjQv_nb_cyTKJM1ru9B9dt6c");'>
                    </div>
                    <div
                        class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-green-500 border-2 border-white dark:border-slate-800">
                    </div>
                </div>
                <div class="flex flex-col">
                    <p class="username text-[#0d141b] dark:text-white text-lg font-bold leading-tight"></p>
                    <p class="report-reason text-[#4c739a] dark:text-slate-400 text-sm font-medium"></p>
                </div>
            </div>
            <!-- Duration Selection -->
            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa] mb-2"
                        for="timeout-duration">Duration</label>
                    <div class="relative">
                        <select
                            class="w-full h-11 pl-4 pr-10 rounded-lg bg-white dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 appearance-none cursor-pointer text-sm shadow-sm transition-all font-medium"
                            id="timeout-duration" name="timeout_duration">
                            <option value="30min">30 Minutes</option>
                            <option value="1h">1 Hour</option>
                            <option value="2h">2 Hours</option>
                            <option value="4h">4 Hours</option>
                            <option value="6h">6 Hours</option>
                            <option value="12h">12 Hours</option>
                            <option value="24h">24 Hours</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Warning / Meta Info -->
            <div
                class="flex items-start gap-2 bg-blue-50 dark:bg-slate-800/50 p-3 rounded-lg border border-blue-100 dark:border-slate-700 mt-5">
                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5">info</span>
                <p class="text-[#4c739a] dark:text-slate-400 text-sm font-normal leading-relaxed">
                    Note: The user will be notified immediately via email with the reason provided above. Their comment
                    access will be revoked for the duration.
                </p>
            </div>
        </div>
        <!-- Footer Actions -->
        <div
            class="flex items-center justify-end gap-3 px-6 py-5 bg-slate-50/80 dark:bg-slate-900/50 border-t border-slate-100 dark:border-slate-800">
            <button onclick="closeActionModal()" type="button"
                class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-transparent text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-200">
                Cancel
            </button>
            <button type="submit"
                class="px-6 py-2.5 rounded-lg bg-primary text-white text-sm font-bold shadow-md shadow-blue-500/20 hover:bg-blue-600 active:transform active:scale-95 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Confirm Timeout
            </button>
        </div>
    </form>
</div>

<div id="blacklist-modal"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#0d1b11]/60 backdrop-blur-sm transition-all duration-300 ease-out hidden">
    <!-- Modal Container -->
    <div
        class="relative w-full max-w-[500px] flex flex-col bg-[#fbfffb] dark:bg-[#152619] rounded-xl shadow-2xl ring-1 ring-black/5 transform transition-all scale-100">
        <!-- Close Button -->
        <button onclick="closeActionModal()"
            class="absolute top-4 right-4 z-10 p-2 rounded-full text-gray-400 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-white/10 dark:text-gray-500 transition-colors focus:outline-none focus:ring-2 focus:ring-primary/50">
            <span class="material-symbols-outlined text-[24px]">close</span>
        </button>
        <!-- Header Section -->
        <div class="px-8 pt-8 pb-2">
            <div class="flex items-start gap-5">
                <!-- Warning Icon -->
                <div
                    class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-primary/10 text-primary">
                    <span class="material-symbols-outlined text-[28px]">block</span>
                </div>
                <div class="flex flex-col pt-0.5">
                    <h3 class="text-[#0d1b11] dark:text-white text-2xl font-bold leading-tight tracking-tight">
                        Blacklist User</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1 font-medium">This action requires
                        confirmation.</p>
                </div>
            </div>
        </div>
        <!-- Content Section -->
        <div class="px-8 py-4 flex flex-col gap-6">
            <!-- Description -->
            <p class="text-[#0d1b11] dark:text-gray-300 text-base font-normal leading-relaxed">
                Are you sure you want to blacklist this user? This will revoke their <span
                    class="font-semibold text-primary">Author</span> and <span
                    class="font-semibold text-primary">Reader</span> privileges immediately.
            </p>
            <!-- User Card Info -->
            <div
                class="flex items-center gap-4 p-3 rounded-lg bg-white border border-[#cfe7d5] dark:bg-black/20 dark:border-white/10 shadow-sm">
                <div class="bg-center bg-no-repeat bg-cover rounded-full h-12 w-12 shrink-0 border border-gray-100 dark:border-gray-700"
                    data-alt="Profile picture of John Doe"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAWdZEstXK0CdZTIjNvgDaiaW77Kctvg8NOD35F96Co9-OeRVPstmm53gkCw1Ps3Wsxtx-Ci8uIcf4OLzFxF4AKu6YMFzLvLjgTBtOZWyZSb2kl9_0oh2981d1NccMzfZUM2HEg09XCx6W8XXs1gyArdUjF5zN3iPeJeDbIvCc9VSvYObcTL1Ao3v5LNo81KXEsgb4OXYRRnT8j34ZHtInidEtJeMPtgrNOfgvEIoZDnmCvyioCN7XkVoxCmCI2PsB_wWW1uVGqghI");'>
                </div>
                <div class="flex flex-col justify-center min-w-0">
                    <div class="flex items-center gap-2">
                        <p class="username text-[#0d1b11] dark:text-white text-base font-bold leading-tight truncate"></p>
                    </div>
                    <p class="report-reason text-[#4c9a5e] dark:text-[#6ec983] text-sm font-normal leading-normal truncate"></p>
                </div>
            </div>
        </div>
        <!-- Footer Actions -->
        <div
            class="px-8 py-6 flex items-center justify-end gap-3 mt-2 border-t border-[#cfe7d5]/50 dark:border-white/5">
            <button onclick="closeActionModal()"
                class="flex items-center justify-center px-5 h-11 rounded-lg text-[#0d1b11] dark:text-gray-300 text-sm font-bold bg-transparent hover:bg-gray-100 dark:hover:bg-white/5 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700">
                Cancel
            </button>
            <form action="<?= route('admin.users.blacklist') ?>" method="post">
                <input type="hidden" name="id" class="user_id" value="">
                <input type="hidden" name="report_id" class="report_id" value="">
                <button type="submit"
                    class="flex items-center justify-center px-6 h-11 rounded-lg text-white text-sm font-bold bg-primary hover:bg-[#0da030] active:bg-[#0b8a29] transition-all shadow-md shadow-primary/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-[#152619]">
                    Confirm Blacklist
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const reportActions = document.querySelectorAll('.report-action');
    const actionsModal = document.getElementById('actions-modal');

    reportActions.forEach((action, index) => {
        action.addEventListener('click', () => {
            const actionText = action.querySelector('.action-text');
            const checkRadio = action.querySelector('.check-radio');
            actionText.classList.remove('text-base', 'group-hover:text-action-green');
            actionText.classList.add('text-action-green');
            checkRadio.classList.remove('text-[#dfeee0]', 'group-hover:text-action-green');
            checkRadio.classList.add('text-action-green');
            checkRadio.textContent = 'check_circle';
            action.classList.remove('border-transparent', 'hover:border-action-green');
            action.classList.add('border-action-green');
            actionsModal.setAttribute('data-action', action.getAttribute('data-action'));
            reportActions.forEach((otherAction, otherIndex) => {
                if (otherIndex !== index) {
                    otherAction.classList.remove('border-action-green', 'hover:border-action-green');
                    otherAction.classList.add('border-transparent');
                    const otherActionText = otherAction.querySelector('.action-text');
                    const otherCheckRadio = otherAction.querySelector('.check-radio');
                    otherActionText.classList.remove('text-action-green', 'group-hover:text-action-green');
                    otherActionText.classList.add('text-base');
                    otherCheckRadio.classList.remove('text-action-green', 'group-hover:text-action-green');
                    otherCheckRadio.classList.add('text-[#dfeee0]');
                    otherCheckRadio.textContent = 'radio_button_unchecked';
                }
            })
        });
    })

    function showActionsModal(id) {
        const actionsModal = document.getElementById('actions-modal');
        const username = actionsModal.querySelector('.username');
        username.textContent = document.querySelector(`#reports tr[data-id="${id}"] .full-name`).textContent;
        actionsModal.classList.remove('hidden');
        actionsModal.setAttribute('data-report', id);
        user_id = document.querySelector(`#reports tr[data-id="${id}"]`).getAttribute('data-user');
        actionsModal.setAttribute('data-user', user_id);
    }

    function closeActionsModal() {
        const actionsModal = document.getElementById('actions-modal');
        actionsModal.classList.add('hidden');
        actionsModal.setAttribute('data-report', '');
    }

    function openActionModal(){
        const action = actionsModal.getAttribute('data-action');
        const report = actionsModal.getAttribute('data-report');
        const user = actionsModal.getAttribute('data-user');
        const actionModal = document.getElementById(`${action}-modal`);
        actionModal.querySelector(".user_id").value = user;
        actionModal.querySelector(".report_id").value = report;
        actionModal.setAttribute('data-user', user);
        actionModal.querySelector(".username").textContent = document.querySelector(`#reports tr[data-id="${report}"] .full-name`).textContent;
        actionModal.querySelector(".report-reason").textContent = document.querySelector(`#reports tr[data-id="${report}"] .report-reason`).textContent;
        actionModal.classList.remove('hidden');
        actionsModal.classList.add('hidden');
    }

    function closeActionModal(){
        const action = actionsModal.getAttribute('data-action');
        const actionModal = document.getElementById(`${action}-modal`);
        actionModal.classList.add('hidden');
    }
</script>