<div class="flex-1 flex flex-col h-screen overflow-y-auto">
    <!-- Top Mobile Header (Visible only on small screens) -->
    <div
        class="lg:hidden flex items-center justify-between p-4 border-b border-[#e9f1eb] dark:border-[#2a3c2e] bg-background-light dark:bg-background-dark sticky top-0 z-10">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">menu</span>
            <span class="font-bold text-lg text-[#101912] dark:text-white">BlogAdmin</span>
        </div>
        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8" data-alt="Admin avatar small"
            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA_bUoU3yILoocNyQY8dKryddyBidCBK4-EIm9tZE5p4Ewgp0zxYIUE-sVP5A_IHzmvzwaOKV3V53ZADAsM3_BuhkB6oIes6CanD1wa6CUJf5k5KMqW2-AuWQxSgewiiDxHQeVc_ewdIiZdJg61dCRZeslcPLcFU09jdbUVo-_L4MhB7EcXwCllahNzwmzLoYvpQQSLpkMUJOsXLd3xIfBD1XVozKedkhCx3oDWGiQFP-h-t1n4q2Y7ff2Si6tyHxHzoaEWxRExhXQ");'>
        </div>
    </div>
    <div class="flex-1 px-4 py-8 lg:px-12 lg:py-10 max-w-[1400px] mx-auto w-full">
        <!-- Page Heading & Actions -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div class="flex flex-col gap-2">
                <h1
                    class="text-[#101912] dark:text-white text-3xl lg:text-4xl font-black leading-tight tracking-[-0.033em]">
                    User Management</h1>
                <p class="text-[#5b8b66] dark:text-gray-400 text-base font-normal leading-normal max-w-xl">
                    Oversee user roles, monitor account statuses, and enforce platform policies through
                    suspensions or bans.</p>
            </div>
        </div>
        <!-- Filters & Search Bar -->
        <div
            class="bg-white dark:bg-[#1e2a22] p-4 rounded-xl shadow-sm border border-[#e9f1eb] dark:border-[#2a3c2e] mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1 relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">search</span>
                    </span>
                    <input
                        class="w-full h-12 pl-11 pr-4 rounded-lg bg-[#f9fbf9] dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white placeholder-[#5b8b66] focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm transition-all"
                        placeholder="Search by username, email, or ID..." />
                </div>
                <!-- Role Filter -->
                <div class="w-full md:w-48 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">badge</span>
                    </span>
                    <select
                        class="w-full h-12 pl-10 pr-8 rounded-lg bg-[#f9fbf9] dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm appearance-none cursor-pointer">
                        <option value="">All Roles</option>
                        <option value="admin">Administrator</option>
                        <option value="author">Author</option>
                        <option value="reader">Reader</option>
                    </select>
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_drop_down</span>
                    </span>
                </div>
                <!-- Status Filter -->
                <div class="w-full md:w-48 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">verified_user</span>
                    </span>
                    <select
                        class="w-full h-12 pl-10 pr-8 rounded-lg bg-[#f9fbf9] dark:bg-[#141e16] border border-[#d4e3d7] dark:border-[#2a3c2e] text-[#101912] dark:text-white focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm appearance-none cursor-pointer">
                        <option value="">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="suspended">Suspended</option>
                        <option value="banned">Banned</option>
                    </select>
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[#5b8b66]">
                        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_drop_down</span>
                    </span>
                </div>
            </div>
        </div>
        <?php if (count($users) > 0) : ?>
            <!-- Users Table -->
            <div
                class="overflow-hidden rounded-xl border border-[#e9f1eb] dark:border-[#2a3c2e] bg-white dark:bg-[#1e2a22] shadow-sm mb-6">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[800px]">
                        <thead>
                            <tr class="bg-[#f9fbf9] dark:bg-[#253329] border-b border-[#e9f1eb] dark:border-[#2a3c2e]">
                                <th class="w-12 px-4 py-3 text-center">
                                    <input
                                        class="rounded border-gray-300 text-primary focus:ring-primary bg-white dark:bg-black/20"
                                        type="checkbox" />
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    User Info</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Role</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Last Active</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-[#5b8b66] dark:text-[#8aa]">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody id="users" class="divide-y divide-[#e9f1eb] dark:divide-[#2a3c2e]">
                            <?php foreach ($users as $user) : ?>
                                <tr data-id="<?php echo $user->getID(); ?>" class="group hover:bg-[#f9fbf9] dark:hover:bg-[#253329] transition-colors">
                                    <td class="px-4 py-4 text-center">
                                        <input
                                            class="rounded border-gray-300 text-primary focus:ring-primary bg-white dark:bg-black/20"
                                            type="checkbox" />
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="relative">
                                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                                                    data-alt="Portrait of Sarah Jenkins, administrator"
                                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDGdN_FL3LzOlb1yiHXyW1RS1jfmj7pzYR-YLm1OL1ojL1Y-lx5_EXHYgY1xLyuMirW1Q9ymqI1PhQN1LYlyImUwmLZjrxDnYxDKoJc52ByE32N_tC6_1a2vG3ai1r2zIEmhjmInjP54Z2tz-RKPvoVJNi4a4J33ETnGinTbyEqXilOEZnY2dDko9dvLaUhQD4mcFSdRFAezR16kIenK-Iyd93_l347tt7BCWww5KwVV9npjHiXtBan6xWbNtEx9B3PWORi1Z684vA");'>
                                                </div>
                                                <div
                                                    class="absolute bottom-0 right-0 size-2.5 bg-green-500 rounded-full border-2 border-white dark:border-[#1e2a22]">
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="username text-[#101912] dark:text-white font-medium text-sm"><?= ucwords($user->getFullName()) ?></span>
                                                <span
                                                    class="email text-[#5b8b66] dark:text-gray-400 text-xs"><?= $user->getEmail() ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($user->role() === "admin") : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300">
                                                <span class="material-symbols-outlined text-[14px]">shield_person</span>
                                                Admin
                                            </span>
                                        <?php elseif ($user->role() === "author") : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                                <span class="material-symbols-outlined text-[14px]">edit_note</span>
                                                Author
                                            </span>
                                        <?php else : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700/50 dark:text-gray-300">
                                                <span class="material-symbols-outlined text-[14px]">person</span>
                                                Reader
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($user->isBanned()) : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                                                Banned
                                            </span>
                                        <?php elseif ($user->isBlacklisted()) : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-300">
                                                Blacklisted
                                            </span>
                                        <?php elseif ($user->isSuspended()) : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300">
                                                Suspended
                                            </span>
                                        <?php elseif ($user->isTimeouted()) : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-cyan-100 text-cyan-800 dark:bg-cyan-900/30 dark:text-cyan-300">
                                                Timeout
                                            </span>
                                        <?php else : ?>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                                Active
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-[#101912] dark:text-white text-sm">Just now</span>
                                            <span class="text-[#5b8b66] dark:text-gray-500 text-xs">Online</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <?php if ($user->isBanned() || $user->isBlacklisted() || $user->isSuspended() || $user->isTimeouted()) : ?>
                                            <button onclick="showActionsModal(<?= $user->getID() ?>)"
                                                class="text-primary hover:text-green-700 dark:text-green-400 font-medium text-sm mr-2 transition-colors">Action</button>
                                        <?php else: ?>
                                            <p
                                                class="text-red-500 hover:text-red-700 dark:text-red-400 font-medium text-sm mr-2 transition-colors">No Action</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div
                    class="flex items-center justify-between border-t border-[#e9f1eb] dark:border-[#2a3c2e] bg-[#f9fbf9] dark:bg-[#1e2a22] px-4 py-3 sm:px-6">
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
                                    class="font-medium text-[#101912] dark:text-white">5</span> of <span
                                    class="font-medium text-[#101912] dark:text-white">97</span> results
                            </p>
                        </div>
                        <div>
                            <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                                <a class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] hover:bg-gray-50 dark:hover:bg-white/5 focus:z-20 focus:outline-offset-0"
                                    href="#">
                                    <span class="sr-only">Previous</span>
                                    <span class="material-symbols-outlined" style="font-size: 20px;">chevron_left</span>
                                </a>
                                <!-- Current: "z-10 bg-primary text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                                <a aria-current="page"
                                    class="relative z-10 inline-flex items-center bg-primary px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                    href="#">1</a>
                                <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-[#101912] dark:text-white ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] hover:bg-gray-50 dark:hover:bg-white/5 focus:z-20 focus:outline-offset-0"
                                    href="#">2</a>
                                <a class="relative hidden items-center px-4 py-2 text-sm font-semibold text-[#101912] dark:text-white ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] hover:bg-gray-50 dark:hover:bg-white/5 focus:z-20 focus:outline-offset-0 md:inline-flex"
                                    href="#">3</a>
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-400 ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] focus:outline-offset-0">...</span>
                                <a class="relative hidden items-center px-4 py-2 text-sm font-semibold text-[#101912] dark:text-white ring-1 ring-inset ring-gray-300 dark:ring-[#2a3c2e] hover:bg-gray-50 dark:hover:bg-white/5 focus:z-20 focus:outline-offset-0 md:inline-flex"
                                    href="#">8</a>
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
                    <span class="material-symbols-outlined text-3xl">info</span>
                </div>
                <h3 class="mb-2 text-lg font-bold text-[#101912] dark:text-white">No users found</h3>
                <p class="mb-6 text-sm text-[#5b8b66] max-w-xs mx-auto">It looks like there are no users to manage.
                    Check back later to see if any new users have been registered.
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

<div id="actions-modal" data-user="" data-action="unban"
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
            <button data-action="unban"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div class="shrink-0 size-10 rounded-full bg-red-50 flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined">gavel</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="action-text text-modal-text font-bold text-base text-action-green transition-colors">
                            Un Ban User</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">Permanently remove the ban.
                            The user will be able to log in.</p>
                    </div>
                    <div class="mt-1">
                        <span class="check-radio material-symbols-outlined text-action-green">check_circle</span>
                    </div>
                </div>
            </button>
            <button data-action="unsuspend"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-transparent hover:border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div
                        class="shrink-0 size-10 rounded-full bg-orange-50 flex items-center justify-center text-orange-600">
                        <span class="material-symbols-outlined">pause_circle</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="action-text text-modal-text font-bold text-base group-hover:text-action-green">
                            Un Suspend Account</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">Re-enable the user's account.
                            The user will be able to log in.
                        </p>
                    </div>
                    <div class="mt-1">
                        <span
                            class="check-radio material-symbols-outlined text-[#dfeee0] group-hover:text-action-green">radio_button_unchecked</span>
                    </div>
                </div>
            </button>
            <button data-action="unblacklist"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-transparent hover:border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div
                        class="shrink-0 size-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-700">
                        <span class="material-symbols-outlined">block</span>
                    </div>
                    <div class="flex-1">
                        <h3
                            class="action-text text-modal-text font-bold text-base group-hover:text-action-green transition-colors">
                            Remove From Blacklist</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">Re-enable the user's account.
                            The user will be able to log in.
                        </p>
                    </div>
                    <div class="mt-1">
                        <span
                            class="check-radio material-symbols-outlined text-[#dfeee0] group-hover:text-action-green">radio_button_unchecked</span>
                    </div>
                </div>
            </button>
            <button data-action="untimeout"
                class="report-action w-full text-left p-4 rounded-lg border-2 border-transparent hover:border-action-green bg-white shadow-sm transition-all group">
                <div class="flex items-start gap-4">
                    <div
                        class="shrink-0 size-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                        <span class="material-symbols-outlined">timer</span>
                    </div>
                    <div class="flex-1">
                        <h3
                            class="action-text text-modal-text font-bold text-base group-hover:text-action-green transition-colors">
                            Remove Timeout</h3>
                        <p class="text-[#5b8b66] text-sm leading-relaxed mt-1">
                            Re-enable the user's account.
                            The user will be able to log in.
                        </p>
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

<div id="unsuspend-modal" aria-modal="true"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm hidden" role="dialog">
    <form action="<?= route('admin.users.unsuspend') ?>" method="post"
        class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-[#fbfffb] dark:bg-[#1e2a22] p-8 text-left shadow-2xl transition-all border border-[#e9f1eb] dark:border-[#2a3c2e]">
        <input class="user_id" type="hidden" name="id" value="">
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
            <h3 class="text-xl font-bold text-[#101912] dark:text-white leading-tight">UnSuspend User</h3>
        </div>
        <div class="flex items-center gap-4 py-4 border-b border-[#e5e7eb] dark:border-slate-700/50 mb-4">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12 bg-slate-200"
                data-alt="Portrait of Alex Johnson"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC9Gi1c-2i836eCkw0ZOc3keiie0m1_XwcHxmxzl7y3o7k-KcUFdeTwCDtb3GaD6GFp0Ik4fYm1XMTCCrYU8SZC1hj5AePijKf7YoVdD_TBmhxS7jlGZCfRaGu6-X36LAujdee_PlnqLgMiUWS71LLFIHTUoeAgyqvZwoGWUw81LgetSP7rm41Y-FaCOMbAMvUepP0bDKVpd4wzC84GUkTCKVBsNj-nyWZQltlRFHBBIkaYIfCZJCSyWvIynh5-YexN7vcB27--Zxg");'>
            </div>
            <div class="flex flex-col justify-center">
                <p class="username text-[#0d121b] dark:text-white text-base font-medium leading-normal line-clamp-1">
                </p>
                <p
                    class="email text-[#4c669a] dark:text-slate-400 text-sm font-normal leading-normal line-clamp-2">
                </p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3 mt-8">
            <button onclick="closeActionModal()" type="button"
                class="flex items-center justify-center h-11 rounded-lg border border-[#d4e3d7] dark:border-[#2a3c2e] bg-white dark:bg-transparent text-[#101912] dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 font-bold text-sm transition-colors shadow-sm">
                Cancel
            </button>
            <button type="submit"
                class="flex items-center justify-center h-11 rounded-lg bg-amber-600 hover:bg-amber-700 text-white shadow-md shadow-amber-600/20 font-bold text-sm transition-all">
                Remove Suspend
            </button>
        </div>
    </form>
</div>

<div id="unban-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"></div>
    <!-- Modal Container -->
    <div
        class="relative w-full max-w-[500px] bg-modal-bg dark:bg-[#1e293b] rounded-xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.15)] flex flex-col overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 pt-6 pb-2">
            <h3 class="text-[#0d121b] dark:text-white text-xl font-bold leading-tight tracking-[-0.015em]">Un Ban User
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
                    <p
                        class="username text-[#0d121b] dark:text-white text-base font-medium leading-normal line-clamp-1">
                    </p>
                    <p
                        class="email text-[#4c669a] dark:text-slate-400 text-sm font-normal leading-normal line-clamp-2">
                    </p>
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
            <form action="<?= route('admin.users.unban') ?>" method="post">
                <input class="user_id" type="hidden" name="id" value="">
                <button type="submit"
                    class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-5 bg-primary hover:bg-primary/90 text-white text-sm font-bold leading-normal tracking-[0.015em] shadow-md transition-colors">
                    Un Ban User
                </button>
            </form>
        </div>
    </div>
</div>

<div id="untimeout-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"></div>
    <!-- Modal Container -->
    <form action="<?= route('admin.users.untimeout') ?>" method="post"
        class="relative z-50 w-full max-w-[600px] transform overflow-hidden rounded-xl bg-[#fbfffb] dark:bg-[#1a2c38] shadow-2xl transition-all border border-slate-100 dark:border-slate-700">
        <input class="user_id" type="hidden" name="id" value="">
        <!-- Header Section -->
        <div class="flex items-center justify-between px-6 pt-6 pb-4 border-b border-slate-100 dark:border-slate-800">
            <h2 class="text-[#0d141b] dark:text-white text-xl font-bold leading-tight tracking-tight">Remove Timeout</h2>
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
                    <p class="email text-[#4c739a] dark:text-slate-400 text-sm font-medium"></p>
                </div>
            </div>
            <!-- Warning / Meta Info -->
            <div
                class="flex items-start gap-2 bg-blue-50 dark:bg-slate-800/50 p-3 rounded-lg border border-blue-100 dark:border-slate-700 mt-5">
                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5">info</span>
                <p class="text-[#4c739a] dark:text-slate-400 text-sm font-normal leading-relaxed">
                    Note: The user will be notified immediately via email. 
                    <span class="font-medium">This action cannot be undone.</span>
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
                Confirm
            </button>
        </div>
    </form>
</div>

<div id="unblacklist-modal"
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
                        Remove User From Blacklist</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1 font-medium">This action requires
                        confirmation.</p>
                </div>
            </div>
        </div>
        <!-- Content Section -->
        <div class="px-8 py-4 flex flex-col gap-6">
            <!-- Description -->
            <p class="text-[#0d1b11] dark:text-gray-300 text-base font-normal leading-relaxed">
                Are you sure you want to remove this user from blacklist? This will return their <span
                    class="font-semibold text-primary">Author</span> and <span
                    class="font-semibold text-primary">Reader</span> privileges.
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
                        <p class="username text-[#0d1b11] dark:text-white text-base font-bold leading-tight truncate">
                        </p>
                    </div>
                    <p
                        class="email text-[#4c9a5e] dark:text-[#6ec983] text-sm font-normal leading-normal truncate">
                    </p>
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
            <form action="<?= route('admin.users.unblacklist') ?>" method="post">
                <input type="hidden" name="id" class="user_id" value="">
                <button type="submit"
                    class="flex items-center justify-center px-6 h-11 rounded-lg text-white text-sm font-bold bg-primary hover:bg-[#0da030] active:bg-[#0b8a29] transition-all shadow-md shadow-primary/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-[#152619]">
                    Confirm
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
        username.textContent = document.querySelector(`#users tr[data-id="${id}"] .username`).textContent;
        actionsModal.classList.remove('hidden');
        actionsModal.setAttribute('data-user', id);
    }

    function closeActionsModal() {
        const actionsModal = document.getElementById('actions-modal');
        actionsModal.classList.add('hidden');
        actionsModal.setAttribute('data-user', '');
    }

    function openActionModal() {
        const action = actionsModal.getAttribute('data-action');
        const user = actionsModal.getAttribute('data-user');
        const actionModal = document.getElementById(`${action}-modal`);
        actionModal.querySelector(".user_id").value = user;
        actionModal.setAttribute('data-user', user);
        actionModal.querySelector(".username").textContent = document.querySelector(`#users tr[data-id="${user}"] .username`).textContent;
        actionModal.querySelector(".email").textContent = document.querySelector(`#users tr[data-id="${user}"] .email`).textContent;
        actionModal.classList.remove('hidden');
        actionsModal.classList.add('hidden');
    }

    function closeActionModal() {
        const action = actionsModal.getAttribute('data-action');
        const actionModal = document.getElementById(`${action}-modal`);
        actionModal.classList.add('hidden');
    }
</script>