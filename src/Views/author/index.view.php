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
                            href="<?= route('author.dashboard') ?>">Home</a>
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
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Total Views
                            </p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">45.2k</h3>
                        </div>
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                            <span class="material-symbols-outlined">visibility</span>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-xs font-medium text-primary">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span>
                        <span>+12% vs last month</span>
                    </div>
                </div>
                <div
                    class="group relative flex flex-col justify-between overflow-hidden rounded-xl bg-background-card dark:bg-[#1a261d] p-5 shadow-soft transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Total Likes
                            </p>
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">3,450</h3>
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
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">856</h3>
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
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">42</h3>
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
                        <button class="text-sm font-medium text-primary hover:underline">Download
                            Report</button>
                    </div>
                    <div class="grid flex-1 grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="flex flex-col gap-2 rounded-lg bg-[#f0f7f1] p-4 dark:bg-[#253528]/50">
                            <div class="flex items-center gap-2 text-primary dark:text-primary">
                                <span class="material-symbols-outlined">star</span>
                                <span class="text-xs font-bold uppercase tracking-wide">Top Performer</span>
                            </div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Article with
                                most traction</p>
                            <div class="mt-auto pt-2">
                                <h4 class="line-clamp-1 text-lg font-bold text-text-main dark:text-white">10
                                    Tips for Modern UI Design</h4>
                                <div class="mt-1 flex items-center gap-3 text-xs text-text-secondary">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[14px]">visibility</span>
                                        1,204</span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[14px]">favorite</span>
                                        89</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 rounded-lg bg-orange-50 p-4 dark:bg-orange-900/10">
                            <div class="flex items-center gap-2 text-orange-600 dark:text-orange-400">
                                <span class="material-symbols-outlined">forum</span>
                                <span class="text-xs font-bold uppercase tracking-wide">Most Discussed</span>
                            </div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Active
                                comments this week</p>
                            <div class="mt-auto pt-2">
                                <h4 class="text-lg font-bold text-text-main dark:text-white">Understanding React
                                    Hooks</h4>
                                <div class="mt-1 flex items-center gap-3 text-xs text-text-secondary">
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[14px]">chat_bubble</span> 45
                                        New Comments</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 rounded-lg bg-blue-50 p-4 dark:bg-blue-900/10">
                            <div class="flex items-center gap-2 text-blue-600 dark:text-blue-400">
                                <span class="material-symbols-outlined">trending_up</span>
                                <span class="text-xs font-bold uppercase tracking-wide">Daily Avg Views</span>
                            </div>
                            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Average daily
                                readership</p>
                            <div class="mt-auto pt-2">
                                <h4 class="text-lg font-bold text-text-main dark:text-white">1,840 Views / Day
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
                                <h4 class="text-lg font-bold text-text-main dark:text-white">245 Likes / Day
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
                        <div class="flex items-start gap-3 py-4">
                            <div class="mt-1 h-8 w-8 shrink-0 overflow-hidden rounded-full">
                                <img alt="User profile of Reader" class="h-full w-full object-cover"
                                    data-alt="Portrait of a user"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbDObtWXT2DoS0atYwnOjS37r9k5_WNKJGZqFKOAl2agE0byEJgCdV4KdXLqbuhih1XecSY_EBEPUiJAeR9jn9yq1S7I9PisPyFn3YptqsCsS6U7ao72bgBL_Tqcij_u4JrzYSUTsYS5cRRhUSoDQF06xXB7RK2RSwcUcfSy8QyH3NT08E0XuAuQXlTxUFDtxy6qF1auoYQ-wLY_YRyNARKVBTUfGc9wKJ8e4o7Cv6gEIV-b9CF1FlJmalG0ksEORlGWmsYjWYYa4" />
                            </div>
                            <div class="flex flex-1 flex-col">
                                <p class="text-sm font-medium text-text-main dark:text-white"><span
                                        class="font-bold">Emily</span> liked your article <span
                                        class="text-primary cursor-pointer hover:underline">"Design Systems
                                        101"</span></p>
                                <span class="text-xs text-text-secondary mt-1">2 minutes ago</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 py-4">
                            <div
                                class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                <span class="material-symbols-outlined text-[18px]">comment</span>
                            </div>
                            <div class="flex flex-1 flex-col">
                                <p class="text-sm font-medium text-text-main dark:text-white">New comment on:
                                    <span class="font-bold">"React Patterns"</span>
                                </p>
                                <p class="text-xs text-text-secondary mt-1">"This was incredibly helpful,
                                    thanks..."</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 py-4">
                            <div
                                class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-yellow-100 text-yellow-600 dark:bg-yellow-900/30 dark:text-yellow-400">
                                <span class="material-symbols-outlined text-[18px]">star</span>
                            </div>
                            <div class="flex flex-1 flex-col">
                                <p class="text-sm font-medium text-text-main dark:text-white">Achievement
                                    Unlocked!</p>
                                <p class="text-xs text-text-secondary mt-1">Your article "Web Security" reached
                                    1,000 views.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 py-4">
                            <div class="mt-1 h-8 w-8 shrink-0 overflow-hidden rounded-full">
                                <img alt="User profile of David" class="h-full w-full object-cover"
                                    data-alt="Portrait of a user"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTwC5CY7lyWYsBZa1rWnXrK5kOEzNN76ypuBJjkN-5mI3QlaR4pwfPK5_xmOT75mS4qYZUsFc6HHf6S3PlUJ1iM4tJeCYQkrrWTiYnu7a3IXv-scP5dhkYlKD2TX3V4IRzQGykrcBhBH_oZMYD9GhwN-0Wl3orFbsit136MVPzra7-3T-swHr-6BhixwgXEti-rF82oD221K1hmWCeOd7k-2gfnMFgpHeBR7jJn6Y03fzg4vKMiVgL5b9HOsmGqSj4sD4HvKPdMV8" />
                            </div>
                            <div class="flex flex-1 flex-col">
                                <p class="text-sm font-medium text-text-main dark:text-white"><span
                                        class="font-bold">David</span> shared your article on Twitter.</p>
                                <span class="text-xs text-text-secondary mt-1">2 hrs ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-xl bg-background-card dark:bg-[#1a261d] p-6 shadow-soft">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-text-main dark:text-white">My Article Performance</h3>
                    <button
                        class="flex items-center gap-1 rounded-lg border border-[#cfdfd0] dark:border-[#2a382d] px-3 py-1.5 text-xs font-medium text-text-secondary hover:bg-[#e9f1eb] dark:hover:bg-[#253528]">
                        <span class="material-symbols-outlined text-[16px]">filter_list</span>
                        Filter
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px] text-left">
                        <thead>
                            <tr class="border-b border-[#cfdfd0] dark:border-[#2a382d]">
                                <th class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                    Article Title</th>
                                <th class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                    Category</th>
                                <th class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                    Status</th>
                                <th class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                    Views</th>
                                <th class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                    Likes</th>
                                <th class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                    Comments</th>
                                <th
                                    class="pb-3 text-end text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#cfdfd0] dark:divide-[#2a382d]">
                            <tr class="group hover:bg-[#f4fcf5] dark:hover:bg-[#253528]">
                                <td class="py-4 pr-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-16 overflow-hidden rounded-lg bg-gray-100">
                                            <img alt="Abstract technology background" class="h-full w-full object-cover"
                                                data-alt="Article thumbnail"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAH2z8yfE5CQdb2xmiR_D59fJGbi9fF3x0o7KxSVxsAZjs9XZ79j9Y3wdcCg4x_OkZvDKoek5UyFSPKgNFXZYd5GWQ4pS9GfixseCTY6brA89SfqrJK_WlbFjW6_i1G5B-2xYEQ4wnIWOM0oONCJedV1PIz0UHDlJN4yUENxRj2Hg8JswcAOBqiTNih9sVpMQr4s9QkjN8fnUGGl37T98YWvvMhC5ElzY3jFc35FyDZhJUll-bLk08dYJ9OOSESeXaEiY-hdqgK4n4" />
                                        </div>
                                        <p class="font-medium text-text-main dark:text-white line-clamp-1">10
                                            Tips for Modern UI Design</p>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="rounded-full bg-blue-100 px-2.5 py-1 text-xs font-bold text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">Design</span>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="flex items-center gap-1.5 text-xs font-semibold text-green-600 dark:text-green-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span> Published
                                    </span>
                                </td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">1,204</td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">89</td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">12</td>
                                <td class="py-4 text-end">
                                    <button class="text-text-secondary hover:text-primary dark:text-gray-400">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-[#f4fcf5] dark:hover:bg-[#253528]">
                                <td class="py-4 pr-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-16 overflow-hidden rounded-lg bg-gray-100">
                                            <img alt="Abstract network lines" class="h-full w-full object-cover"
                                                data-alt="Article thumbnail"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9iPRWa1FzFzpdl_3cskkhFpBPVKgYQs-GX1EGl6O8jy-_du0n4_STWM1l6pujJ56kySO78FB05Amzks4bDFu39dZrFlymRUaVCv0yabtMj6gg7uUO5R6B7BJvCJRAZGmhdnzuZRATiAExqc6Rw86SU1UKQDWjTw9rHzOy6JQcdB-MCcVF3b6wCXwGsXcqzBGMB8LwIfwPZgfgh43GFH2ngBORXQ3w-WrRZvfBnGQqZyCL3Pdew1BHx9w6Y0FjxqaWEsnPzI0xFRM" />
                                        </div>
                                        <p class="font-medium text-text-main dark:text-white line-clamp-1">
                                            Understanding React Hooks</p>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="rounded-full bg-purple-100 px-2.5 py-1 text-xs font-bold text-purple-700 dark:bg-purple-900/30 dark:text-purple-400">Dev</span>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="flex items-center gap-1.5 text-xs font-semibold text-green-600 dark:text-green-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span> Published
                                    </span>
                                </td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">854</td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">62</td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">45</td>
                                <td class="py-4 text-end">
                                    <button class="text-text-secondary hover:text-primary dark:text-gray-400">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-[#f4fcf5] dark:hover:bg-[#253528]">
                                <td class="py-4 pr-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-16 overflow-hidden rounded-lg bg-gray-100">
                                            <img alt="Cybersecurity lock concept" class="h-full w-full object-cover"
                                                data-alt="Article thumbnail"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGzI8S_Td-bHPE8S8dwOPCidMhw1pal8AXGKuyIf3ypgQj9kyiabKuz6Ux6zKw1PzriewFRN705X07HLIJjonvVM7alfhOVRLKtNQoFCKnJGaqHzMHiA4XQ1Zwuy5i8iXY5gxSstGnF29BpEqtTSD4Zn5Ic5eChDRnR9Nhy7oZn5euFYDi2EbNXX4-k3foutPexNIfXgDiO8vxUy9cwAu7VCXkelCAdAhAn0MNNVREgadDiZ4KkH0iWtZFGlurEMpdKE99Wb0KMu4" />
                                        </div>
                                        <p class="font-medium text-text-main dark:text-white line-clamp-1">Web
                                            Security Best Practices</p>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="rounded-full bg-orange-100 px-2.5 py-1 text-xs font-bold text-orange-700 dark:bg-orange-900/30 dark:text-orange-400">Security</span>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="flex items-center gap-1.5 text-xs font-semibold text-yellow-600 dark:text-yellow-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span> Draft
                                    </span>
                                </td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">—</td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">—</td>
                                <td class="py-4 text-sm text-text-secondary dark:text-gray-300">—</td>
                                <td class="py-4 text-end">
                                    <button class="text-text-secondary hover:text-primary dark:text-gray-400">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>