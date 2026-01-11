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
                            href="<?= route('admin.dashboard') ?>">Home</a>
                    </li>
                    <li>
                        <span class="text-text-secondary/50 dark:text-gray-600">/</span>
                    </li>
                    <li>
                        <span aria-current="page"
                            class="text-sm font-medium text-text-main dark:text-white">Dashboard</span>
                    </li>
                </ol>
            </nav>
        </div>
    </header>
    <div class="flex-1 overflow-y-auto p-6 scroll-smooth">
        <div class="mx-auto max-w-7xl flex flex-col gap-6">
            <div class="flex flex-col gap-1">
                <h2 class="text-2xl font-bold text-text-main dark:text-white">Overview</h2>
                <p class="text-sm text-text-secondary dark:text-gray-400">Welcome back, Admin. Here's what's
                    happening today.</p>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Total Users
                            </p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white"><?= $users_count ?></h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                            <span class="material-symbols-outlined">group</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-xs font-medium text-primary">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span>
                        <span>+12% this month</span>
                    </div>
                </div>
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Total Articles
                            </p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white"><?= $articles_count ?>
                            </h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-50 text-orange-600 dark:bg-orange-900/20 dark:text-orange-400">
                            <span class="material-symbols-outlined">article</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-xs font-medium text-primary">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span>
                        <span>+5 new today</span>
                    </div>
                </div>
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Total Comments
                            </p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white"><?= $comments_count ?>
                            </h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-50 text-purple-600 dark:bg-purple-900/20 dark:text-purple-400">
                            <span class="material-symbols-outlined">chat_bubble</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-xs font-medium text-primary">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span>
                        <span>+8.2% engagement</span>
                    </div>
                </div>
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg ring-1 ring-red-100 dark:ring-red-900/20">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Pending
                                Reports</p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">
                                <?= $pending_reports_count ?></h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600 dark:bg-red-900/20 dark:text-red-400">
                            <span class="material-symbols-outlined">flag</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-xs font-medium text-red-600 dark:text-red-400">
                        <span class="material-symbols-outlined text-[16px]">priority_high</span>
                        <span>Action required</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="rounded-xl bg-background-card dark:bg-[#1a261d] p-6 shadow-soft lg:col-span-2">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-bold text-text-main dark:text-white">Latest Articles</h3>
                    </div>
                    <?php if (count($articles) > 0): ?>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="border-b border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-800/30">
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
                                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                    <?php foreach ($articles as $article): ?>
                                        <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                            <td class="py-4 px-6">
                                                <div class="flex gap-4 items-center">
                                                    <div class="w-16 h-12 rounded-lg bg-cover bg-center shrink-0 border border-gray-100 dark:border-gray-700"
                                                        data-alt="Laptop on desk with code"
                                                        style="background-image: url('<?= dns() . $article->cover ?>');">
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <h3
                                                            class="text-sm font-bold text-[#101912] dark:text-white line-clamp-1 group-hover:text-primary transition-colors cursor-pointer">
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
                                                <div
                                                    class="flex items-center justify-center gap-4 text-gray-500 dark:text-gray-400">
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
                                                    <form action="<?= route('admin.articles.destroy') ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $article->id ?>">
                                                        <button type="submit"
                                                            class="p-1.5 rounded-md text-gray-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors"
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
                    <?php else: ?>
                        <div
                            class="bg-white dark:bg-[#1a261d] rounded-xl border border-[#e9f1eb] dark:border-gray-800 shadow-sm p-12 flex flex-col items-center justify-center text-center min-h-[400px]">
                            <div
                                class="w-24 h-24 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                                <span
                                    class="material-symbols-outlined text-5xl text-gray-300 dark:text-gray-600">article</span>
                            </div>
                            <h2 class="text-xl font-bold text-[#101912] dark:text-white mb-2">No articles found</h2>
                            <p class="text-gray-500 dark:text-gray-400 max-w-sm mb-8">
                                It looks like there's no article to display. Wait until the authors publish something.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <div
                    class="flex flex-col gap-4 rounded-xl bg-background-card dark:bg-[#1a261d] p-6 shadow-soft lg:col-span-1">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-text-main dark:text-white">Recent Activity</h3>
                        <button class="text-xs font-semibold text-primary hover:underline">View All</button>
                    </div>
                    <?php if (count($activities) > 0): ?>
                        <div class="flex flex-col gap-0 divide-y divide-[#cfdfd0] dark:divide-[#2a382d]">
                            <?php foreach ($activities as $activity): ?>
                                <?php if ($activity->type === 'comment'): ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div class="mt-1 h-8 w-8 shrink-0 overflow-hidden rounded-full">
                                            <img alt="User profile of Sarah" class="h-full w-full object-cover"
                                                data-alt="Portrait of a user"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbDObtWXT2DoS0atYwnOjS37r9k5_WNKJGZqFKOAl2agE0byEJgCdV4KdXLqbuhih1XecSY_EBEPUiJAeR9jn9yq1S7I9PisPyFn3YptqsCsS6U7ao72bgBL_Tqcij_u4JrzYSUTsYS5cRRhUSoDQF06xXB7RK2RSwcUcfSy8QyH3NT08E0XuAuQXlTxUFDtxy6qF1auoYQ-wLY_YRyNARKVBTUfGc9wKJ8e4o7Cv6gEIV-b9CF1FlJmalG0ksEORlGWmsYjWYYa4" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white"><span
                                                    class="font-bold"><?= ucwords($activity->first_name . ' ' . $activity->last_name) ?></span> commented on <span
                                                    class="text-primary cursor-pointer hover:underline">"<?= $activity->title ?>"</span></p>
                                            <span class="text-xs text-text-secondary mt-1"><?= diffForHuman($activity->created_at) ?></span>
                                        </div>
                                    </div>
                                <?php elseif ($activity->type === 'like'): ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div class="mt-1 h-8 w-8 shrink-0 overflow-hidden rounded-full">
                                            <img alt="User profile of Sarah" class="h-full w-full object-cover"
                                                data-alt="Portrait of a user"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbDObtWXT2DoS0atYwnOjS37r9k5_WNKJGZqFKOAl2agE0byEJgCdV4KdXLqbuhih1XecSY_EBEPUiJAeR9jn9yq1S7I9PisPyFn3YptqsCsS6U7ao72bgBL_Tqcij_u4JrzYSUTsYS5cRRhUSoDQF06xXB7RK2RSwcUcfSy8QyH3NT08E0XuAuQXlTxUFDtxy6qF1auoYQ-wLY_YRyNARKVBTUfGc9wKJ8e4o7Cv6gEIV-b9CF1FlJmalG0ksEORlGWmsYjWYYa4" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white"><span
                                                    class="font-bold"><?= ucwords($activity->first_name . ' ' . $activity->last_name) ?></span> liked the <span
                                                    class="text-primary cursor-pointer hover:underline">"<?= $activity->title ?>"</span> article</p>
                                            <span class="text-xs text-text-secondary mt-1"><?= diffForHuman($activity->created_at) ?></span>
                                        </div>
                                    </div>
                                <?php elseif ($activity->type === 'user'): ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div
                                            class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                                            <span class="material-symbols-outlined text-[18px]">person_add</span>
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white">New user
                                                registration: <span class="font-bold"><?= ucwords($activity->first_name . ' ' . $activity->last_name) ?></span></p>
                                            <span class="text-xs text-text-secondary mt-1"><?= diffForHuman($activity->created_at) ?></span>
                                        </div>
                                    </div>
                                <?php elseif ($activity->type === 'comment report'): ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div
                                            class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                                            <span class="material-symbols-outlined text-[18px]">flag</span>
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white">Comment reported
                                                in <span class="font-bold">"<?= $activity->title ?>"</span></p>
                                            <div class="mt-1.5 flex gap-2">
                                                <a href="<?= route('admin.reports.index') ?>"
                                                    class="rounded bg-red-500 px-2 py-0.5 text-[10px] font-bold text-white hover:bg-red-600">Review</a>
                                                <span class="text-xs text-text-secondary self-center"><?= diffForHuman($activity->created_at) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif ($activity->type === 'article report'): ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div
                                            class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                                            <span class="material-symbols-outlined text-[18px]">flag</span>
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white">Article <span class="font-bold">"<?= $activity->title ?>"</span> reported</p>
                                            <div class="mt-1.5 flex gap-2">
                                                <a href="<?= route('admin.reports.index') ?>"
                                                    class="rounded bg-red-500 px-2 py-0.5 text-[10px] font-bold text-white hover:bg-red-600">Review</a>
                                                <span class="text-xs text-text-secondary self-center"><?= diffForHuman($activity->created_at) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif ($activity->type === 'article'): ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div class="mt-1 h-8 w-8 shrink-0 overflow-hidden rounded-full">
                                            <img alt="User profile of David" class="h-full w-full object-cover"
                                                data-alt="Portrait of a user"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTwC5CY7lyWYsBZa1rWnXrK5kOEzNN76ypuBJjkN-5mI3QlaR4pwfPK5_xmOT75mS4qYZUsFc6HHf6S3PlUJ1iM4tJeCYQkrrWTiYnu7a3IXv-scP5dhkYlKD2TX3V4IRzQGykrcBhBH_oZMYD9GhwN-0Wl3orFbsit136MVPzra7-3T-swHr-6BhixwgXEti-rF82oD221K1hmWCeOd7k-2gfnMFgpHeBR7jJn6Y03fzg4vKMiVgL5b9HOsmGqSj4sD4HvKPdMV8" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white"><span
                                                    class="font-bold"><?= ucwords($activity->first_name . ' ' . $activity->last_name) ?></span> published a new article.</p>
                                            <span class="text-xs text-text-secondary mt-1"><?= diffForHuman($activity->created_at) ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div
                            class="bg-white dark:bg-[#1a261d] rounded-xl border border-[#e9f1eb] dark:border-gray-800 shadow-sm p-12 flex flex-col items-center justify-center text-center min-h-[400px]">
                            <div
                                class="w-24 h-24 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                                <span
                                    class="material-symbols-outlined text-5xl text-gray-300 dark:text-gray-600">sentiment_dissatisfied</span>
                            </div>
                            <h2 class="text-xl font-bold text-[#101912] dark:text-white mb-2">No activities found</h2>
                            <p class="text-gray-500 dark:text-gray-400 max-w-sm mb-8">
                                It looks like there's no activities to display. Wait until users do something.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>