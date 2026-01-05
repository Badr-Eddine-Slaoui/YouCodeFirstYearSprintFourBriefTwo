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
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">1,240</h3>
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
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">342</h3>
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
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">8,502</h3>
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
                            <h3 class="mt-2 text-3xl font-bold text-text-main dark:text-white">12</h3>
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
                                    <th
                                        class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                        Article Title</th>
                                    <th
                                        class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                        Author</th>
                                    <th
                                        class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                        Category</th>
                                    <th
                                        class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                        Status</th>
                                    <th
                                        class="pb-3 text-xs font-semibold uppercase text-text-secondary dark:text-gray-400">
                                        Views</th>
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
                                                <img alt="Abstract technology background"
                                                    class="h-full w-full object-cover" data-alt="Article thumbnail"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAH2z8yfE5CQdb2xmiR_D59fJGbi9fF3x0o7KxSVxsAZjs9XZ79j9Y3wdcCg4x_OkZvDKoek5UyFSPKgNFXZYd5GWQ4pS9GfixseCTY6brA89SfqrJK_WlbFjW6_i1G5B-2xYEQ4wnIWOM0oONCJedV1PIz0UHDlJN4yUENxRj2Hg8JswcAOBqiTNih9sVpMQr4s9QkjN8fnUGGl37T98YWvvMhC5ElzY3jFc35FyDZhJUll-bLk08dYJ9OOSESeXaEiY-hdqgK4n4" />
                                            </div>
                                            <p class="font-medium text-text-main dark:text-white line-clamp-1">
                                                10 Tips for Modern UI Design</p>
                                        </div>
                                    </td>
                                    <td class="py-4 text-sm text-text-secondary dark:text-gray-300">Alex Morgan
                                    </td>
                                    <td class="py-4">
                                        <span
                                            class="rounded-full bg-blue-100 px-2.5 py-1 text-xs font-bold text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">Design</span>
                                    </td>
                                    <td class="py-4">
                                        <span
                                            class="flex items-center gap-1.5 text-xs font-semibold text-green-600 dark:text-green-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Published
                                        </span>
                                    </td>
                                    <td class="py-4 text-sm text-text-secondary dark:text-gray-300">1,204</td>
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
                                    <td class="py-4 text-sm text-text-secondary dark:text-gray-300">Sarah
                                        Jenkins</td>
                                    <td class="py-4">
                                        <span
                                            class="rounded-full bg-purple-100 px-2.5 py-1 text-xs font-bold text-purple-700 dark:bg-purple-900/30 dark:text-purple-400">Dev</span>
                                    </td>
                                    <td class="py-4">
                                        <span
                                            class="flex items-center gap-1.5 text-xs font-semibold text-green-600 dark:text-green-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Published
                                        </span>
                                    </td>
                                    <td class="py-4 text-sm text-text-secondary dark:text-gray-300">854</td>
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
                                            <p class="font-medium text-text-main dark:text-white line-clamp-1">
                                                Web Security Best Practices</p>
                                        </div>
                                    </td>
                                    <td class="py-4 text-sm text-text-secondary dark:text-gray-300">Mike Ross
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
                <div
                    class="flex flex-col gap-4 rounded-xl bg-background-card dark:bg-[#1a261d] p-6 shadow-soft lg:col-span-1">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-text-main dark:text-white">Recent Activity</h3>
                        <button class="text-xs font-semibold text-primary hover:underline">View All</button>
                    </div>
                    <div class="flex flex-col gap-0 divide-y divide-[#cfdfd0] dark:divide-[#2a382d]">
                        <div class="flex items-start gap-3 py-4">
                            <div class="mt-1 h-8 w-8 shrink-0 overflow-hidden rounded-full">
                                <img alt="User profile of Sarah" class="h-full w-full object-cover"
                                    data-alt="Portrait of a user"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbDObtWXT2DoS0atYwnOjS37r9k5_WNKJGZqFKOAl2agE0byEJgCdV4KdXLqbuhih1XecSY_EBEPUiJAeR9jn9yq1S7I9PisPyFn3YptqsCsS6U7ao72bgBL_Tqcij_u4JrzYSUTsYS5cRRhUSoDQF06xXB7RK2RSwcUcfSy8QyH3NT08E0XuAuQXlTxUFDtxy6qF1auoYQ-wLY_YRyNARKVBTUfGc9wKJ8e4o7Cv6gEIV-b9CF1FlJmalG0ksEORlGWmsYjWYYa4" />
                            </div>
                            <div class="flex flex-1 flex-col">
                                <p class="text-sm font-medium text-text-main dark:text-white"><span
                                        class="font-bold">Sarah</span> commented on <span
                                        class="text-primary cursor-pointer hover:underline">"The Future of
                                        AI"</span></p>
                                <span class="text-xs text-text-secondary mt-1">2 minutes ago</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 py-4">
                            <div
                                class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                                <span class="material-symbols-outlined text-[18px]">person_add</span>
                            </div>
                            <div class="flex flex-1 flex-col">
                                <p class="text-sm font-medium text-text-main dark:text-white">New user
                                    registration: <span class="font-bold">Mike Ross</span></p>
                                <span class="text-xs text-text-secondary mt-1">45 minutes ago</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 py-4">
                            <div
                                class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                                <span class="material-symbols-outlined text-[18px]">flag</span>
                            </div>
                            <div class="flex flex-1 flex-col">
                                <p class="text-sm font-medium text-text-main dark:text-white">Comment reported
                                    in <span class="font-bold">"Tech Trends"</span></p>
                                <div class="mt-1.5 flex gap-2">
                                    <button
                                        class="rounded bg-red-500 px-2 py-0.5 text-[10px] font-bold text-white hover:bg-red-600">Review</button>
                                    <span class="text-xs text-text-secondary self-center">1 hr ago</span>
                                </div>
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
                                        class="font-bold">David</span> published a new article.</p>
                                <span class="text-xs text-text-secondary mt-1">2 hrs ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>