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
                            class="text-sm font-medium text-text-main dark:text-white">Analytics</span>
                    </li>
                </ol>
            </nav>
        </div>
    </header>
    <div class="flex-1 overflow-y-auto p-6 scroll-smooth">
        <div class="mx-auto max-w-7xl flex flex-col gap-6">
            <div class="flex flex-col gap-1">
                <h2 class="text-2xl font-bold text-text-main dark:text-white">Performance Overview</h2>
                <p class="text-sm text-text-secondary dark:text-gray-400">Track how your articles are performing
                    with readers.</p>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Total Likes
                            </p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white"><?= $totalLikes ?></h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-pink-50 text-pink-600 dark:bg-pink-900/20 dark:text-pink-400">
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-xs font-medium text-primary">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span>
                        <span>+5% engagement rate</span>
                    </div>
                </div>
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Comments</p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white"><?= $totalComments ?></h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-50 text-purple-600 dark:bg-purple-900/20 dark:text-purple-400">
                            <span class="material-symbols-outlined">forum</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-xs font-medium text-primary">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span>
                        <span>+24 new this week</span>
                    </div>
                </div>
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Published</p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white"><?= $totalArticles?></h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-50 text-orange-600 dark:bg-orange-900/20 dark:text-orange-400">
                            <span class="material-symbols-outlined">newspaper</span>
                        </div>
                    </div>
                    <div
                        class="mt-4 flex items-center gap-1 text-xs font-medium text-text-secondary dark:text-gray-400">
                        <span class="material-symbols-outlined text-[16px]">check_circle</span>
                        <span>All systems operational</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div
                    class="flex flex-col gap-6 rounded-xl bg-background-card dark:bg-[#1a261d] p-6 shadow-soft lg:col-span-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-text-main dark:text-white">Weekly Highlights</h3>
                            <p class="text-sm text-text-secondary dark:text-gray-400">Key performance metrics
                                from the last 7 days</p>
                        </div>
                    </div>
                    <div class="grid flex-1 grid-cols-1 gap-4 sm:grid-cols-2">
                        <?php if (!is_null($topPerformerArticle)): ?>
                            <div class="flex flex-col gap-2 rounded-lg bg-[#f0f7f1] p-4 dark:bg-[#253528]/50">
                                <div class="flex items-center gap-2 text-primary dark:text-primary">
                                    <span class="material-symbols-outlined">star</span>
                                    <span class="text-xs font-bold uppercase tracking-wide">Top Performer</span>
                                </div>
                                <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Article with
                                    most traction</p>
                                <div class="mt-auto pt-2">
                                    <h4 class="line-clamp-1 text-lg font-bold text-text-main dark:text-white"><?= $topPerformerArticle->title ?></h4>
                                    <div class="mt-1 flex items-center gap-3 text-xs text-text-secondary">
                                        <span class="flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">thumb_up</span>
                                            <?= $topPerformerArticle->likes_count ?></span>
                                        <span>•</span>
                                        <span class="flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">chat_bubble</span>
                                            <?= $topPerformerArticle->comments_count ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!is_null($topCommentedArticle)): ?>
                            <div class="flex flex-col gap-2 rounded-lg bg-orange-50 p-4 dark:bg-orange-900/10">
                                <div class="flex items-center gap-2 text-orange-600 dark:text-orange-400">
                                    <span class="material-symbols-outlined">forum</span>
                                    <span class="text-xs font-bold uppercase tracking-wide">Most Discussed</span>
                                </div>
                                <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Active
                                    comments this week</p>
                                <div class="mt-auto pt-2">
                                    <h4 class="text-lg font-bold text-text-main dark:text-white"><?= $topCommentedArticle->title ?></h4>
                                    <div class="mt-1 flex items-center gap-3 text-xs text-text-secondary">
                                        <span class="flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">chat_bubble</span> <?= $topCommentedArticle->comments_count ?>
                                            New Comments</span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="flex flex-col gap-2 rounded-lg bg-blue-50 p-4 dark:bg-blue-900/10">
                            <div class="flex items-center gap-2 text-blue-600 dark:text-blue-400">
                                <span class="material-symbols-outlined">trending_up</span>
                                <span class="text-xs font-bold uppercase tracking-wide">Daily Avg Comments</span>
                            </div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Average daily
                                readership</p>
                            <div class="mt-auto pt-2">
                                <h4 class="text-lg font-bold text-text-main dark:text-white"><?= $dailyAvgComments ?> Comments / Day
                                </h4>
                                <div class="mt-1 flex items-center gap-3 text-xs text-text-secondary">
                                    <span class="font-medium text-green-600">+15% vs last week</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 rounded-lg bg-purple-50 p-4 dark:bg-purple-900/10">
                            <div class="flex items-center gap-2 text-purple-600 dark:text-purple-400">
                                <span class="material-symbols-outlined">thumb_up</span>
                                <span class="text-xs font-bold uppercase tracking-wide">Daily Avg Likes</span>
                            </div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Average daily
                                appreciation</p>
                            <div class="mt-auto pt-2">
                                <h4 class="text-lg font-bold text-text-main dark:text-white"><?= $dailyAvgLikes ?> Likes / Day
                                </h4>
                                <div class="mt-1 flex items-center gap-3 text-xs text-text-secondary">
                                    <span class="font-medium text-green-600">+8% vs last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col gap-4 rounded-xl bg-background-card dark:bg-[#1a261d] p-6 shadow-soft lg:col-span-1">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-text-main dark:text-white">Recent Interactions</h3>
                        <button class="text-xs font-semibold text-primary hover:underline">View All</button>
                    </div>
                    <div class="flex flex-col gap-0 divide-y divide-[#cfdfd0] dark:divide-[#2a382d]">
                        <?php if (count($interactions) > 0): ?>
                            <?php foreach( $interactions as $interaction ): ?>
                                <?php if($interaction->type === 'like'): ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div class="mt-1 h-8 w-8 shrink-0 overflow-hidden rounded-full">
                                            <img alt="User profile of Reader" class="h-full w-full object-cover"
                                                data-alt="Portrait of a user"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbDObtWXT2DoS0atYwnOjS37r9k5_WNKJGZqFKOAl2agE0byEJgCdV4KdXLqbuhih1XecSY_EBEPUiJAeR9jn9yq1S7I9PisPyFn3YptqsCsS6U7ao72bgBL_Tqcij_u4JrzYSUTsYS5cRRhUSoDQF06xXB7RK2RSwcUcfSy8QyH3NT08E0XuAuQXlTxUFDtxy6qF1auoYQ-wLY_YRyNARKVBTUfGc9wKJ8e4o7Cv6gEIV-b9CF1FlJmalG0ksEORlGWmsYjWYYa4" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white"><span
                                                    class="font-bold"><?= ucwords("{$interaction->first_name} {$interaction->last_name}") ?></span> liked your article <span
                                                    class="text-primary cursor-pointer hover:underline"><?= $interaction->title ?></span></p>
                                            <span class="text-xs text-text-secondary mt-1"><?= diffForHuman($interaction->created_at) ?></span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="flex items-start gap-3 py-4">
                                        <div
                                            class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                            <span class="material-symbols-outlined text-[18px]">comment</span>
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-sm font-medium text-text-main dark:text-white">New comment on:
                                                <span class="font-bold"><?= $interaction->title ?></span>
                                            </p>
                                            <p class="text-xs text-text-secondary mt-1"><?= $interaction->content ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div
                                class="bg-white dark:bg-[#1a261d] rounded-xl border border-[#e9f1eb] dark:border-gray-800 shadow-sm p-12 flex flex-col items-center justify-center text-center min-h-[400px]">
                                <div
                                    class="w-24 h-24 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                                    <span
                                        class="material-symbols-outlined text-5xl text-gray-300 dark:text-gray-600">sentiment_dissatisfied</span>
                                </div>
                                <h2 class="text-xl font-bold text-[#101912] dark:text-white mb-2">No interactions found</h2>
                                <p class="text-gray-500 dark:text-gray-400 max-w-sm mb-8">
                                    It looks like there's no interaction to display. Wait until users do something.
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>