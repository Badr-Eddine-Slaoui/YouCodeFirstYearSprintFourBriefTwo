<main class="flex-grow w-full max-w-[1280px] mx-auto px-4 sm:px-6 py-8">
    <!-- Hero / Featured Section -->
    <section class="mb-10 w-full">
        <div class="relative w-full rounded-2xl overflow-hidden shadow-lg group cursor-pointer h-[400px] md:h-[480px]">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                data-alt="Modern bright office workspace with green plants and large windows"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA8_6jg9E1qvsq8H5MqNtbsIXw_oQlJFwkBuXb7IrA7GCptW2tR0uRtZnK-eKXSTNZf8__mEi8vHv7cMdkeEBn21mUOqNSzVT7rbsvLKPuyGXhA1JOqwzKdHGLLRI5NYkxeMnhLUjHcJoSmSSdlLeHII_w8VArEosQW_fvd7uzQj1Wg7ptukoWttboXNfq78vfOx1EppDb8K8T6ya2EiJFZ3N1IxsBBWFBDk4ujMVXxDFhD3QoXjNjMMaqGq1lYC1We13etZBRACMQ");'>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            <div class="absolute bottom-0 left-0 w-full p-6 md:p-10 flex flex-col items-start gap-4">
                <span
                    class="px-3 py-1 bg-primary text-text-main text-xs font-bold uppercase tracking-wider rounded-full shadow-sm">
                    Editor's Pick
                </span>
                <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight max-w-3xl drop-shadow-sm">
                    The Future of Sustainable Web Design
                </h1>
                <p class="text-gray-200 text-base md:text-lg max-w-2xl line-clamp-2">
                    Discover how eco-friendly coding practices and green hosting solutions are shaping the next
                    generation of the internet, reducing carbon footprints one line of code at a time.
                </p>
                <div class="flex items-center gap-4 mt-2">
                    <button
                        class="flex items-center gap-2 bg-white hover:bg-gray-100 text-text-main px-6 py-3 rounded-lg font-bold transition-all shadow-md">
                        <span>Read Story</span>
                        <span class="material-symbols-outlined" style="font-size: 20px;">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Filters & Sort -->
    <section
        class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 sticky top-[72px] z-30 py-2 bg-page-bg/95 backdrop-blur-sm -mx-4 px-4 md:mx-0 md:px-0">
        <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar pb-1 md:pb-0">
            <button
                class="whitespace-nowrap flex items-center gap-2 px-4 py-2 bg-text-main text-white rounded-full text-sm font-medium shadow-md transition-transform active:scale-95">
                <span class="material-symbols-outlined" style="font-size: 18px;">apps</span>
                All
            </button>
            <button
                class="whitespace-nowrap flex items-center gap-2 px-4 py-2 bg-card-bg text-text-main border border-[#cde2cf] hover:border-primary hover:text-primary rounded-full text-sm font-medium transition-colors">
                <span class="material-symbols-outlined" style="font-size: 18px;">code</span>
                Tech
            </button>
            <button
                class="whitespace-nowrap flex items-center gap-2 px-4 py-2 bg-card-bg text-text-main border border-[#cde2cf] hover:border-primary hover:text-primary rounded-full text-sm font-medium transition-colors">
                <span class="material-symbols-outlined" style="font-size: 18px;">palette</span>
                Design
            </button>
            <button
                class="whitespace-nowrap flex items-center gap-2 px-4 py-2 bg-card-bg text-text-main border border-[#cde2cf] hover:border-primary hover:text-primary rounded-full text-sm font-medium transition-colors">
                <span class="material-symbols-outlined" style="font-size: 18px;">local_cafe</span>
                Lifestyle
            </button>
            <button
                class="whitespace-nowrap flex items-center gap-2 px-4 py-2 bg-card-bg text-text-main border border-[#cde2cf] hover:border-primary hover:text-primary rounded-full text-sm font-medium transition-colors">
                <span class="material-symbols-outlined" style="font-size: 18px;">psychology</span>
                Productivity
            </button>
        </div>
        <div class="flex items-center gap-2 shrink-0">
            <span class="text-sm font-medium text-text-muted">Sort by:</span>
            <div class="relative inline-block text-left group">
                <button
                    class="flex items-center gap-1 text-sm font-bold text-text-main hover:text-primary transition-colors">
                    Newest First
                    <span class="material-symbols-outlined" style="font-size: 20px;">keyboard_arrow_down</span>
                </button>
                <!-- Dropdown could go here -->
            </div>
        </div>
    </section>
    <!-- Article Grid -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        <?php foreach ($articles as $article): ?>
            <article
                class="group bg-card-bg rounded-xl overflow-hidden shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] transition-all duration-300 flex flex-col h-full border border-transparent hover:border-[#cde2cf]">
                <div class="relative h-48 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="Close up of code on a computer screen"
                        style='background-image: url("<?= dns() . $article->cover ?>");'>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <img alt="Avatar" class="w-6 h-6 rounded-full object-cover" data-alt="Portrait of male author"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaQPkPgomEDR77_hm8vKXxx37BUgiHrzDIYszYk1xjILGUeKgAG2YzbeW4kODYPSSTSeSCQnQ85FmeBwNG8BhCLxTkjc0A0BMbsV8kDiQ3RRCVtt0xgtnc27BBHW7BURP_9E1r0gPQJiTgBOG6l_wKS2PJGIGV9QpsYh9Xr-B61OCjQ29pG8gjz4UpraNXnGXHEBdXSaafY5W84XnirrEHFtMK0E4VdkXC9SEH7vjF0c1nFdBSMYVXHT5hzd5L0ksVR7Q5OOlYNsk" />
                            <span
                                class="text-xs font-semibold text-text-muted uppercase tracking-wide"><?= ucwords($article->author->getFullName()) ?></span>
                        </div>
                        <span class="text-xs text-text-muted"><?= diffForHuman($article->created_at) ?></span>
                    </div>
                    <h3
                        class="text-xl font-bold text-text-main mb-2 leading-tight group-hover:text-primary transition-colors">
                        <?= $article->title ?></h3>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php foreach ($article->categories as $category): ?>
                            <span
                                class="px-2 py-1 bg-[#e7f3ea] text-text-muted text-xs font-medium rounded-md"><?= $category->name ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="pt-4 mt-auto border-t border-gray-100 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <button
                                class="flex items-center gap-1.5 text-gray-500 hover:text-red-500 transition-colors group/like">
                                <span class="material-symbols-outlined group-hover/like:fill-current"
                                    style="font-size: 20px;">favorite</span>
                                <span class="text-xs font-bold"><?= $article->likes_count ?></span>
                            </button>
                            <button class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 transition-colors">
                                <span class="material-symbols-outlined" style="font-size: 20px;">mode_comment</span>
                                <span class="text-xs font-bold"><?= $article->comments_count ?></span>
                            </button>
                        </div>
                        <a href="<?= route('article') ?>?id=<?= $article->id ?>"
                            class="text-sm font-bold text-primary hover:text-primary-dark flex items-center gap-1 transition-colors">
                            Read More
                            <span class="material-symbols-outlined" style="font-size: 16px;">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
    <!-- Load More -->
    <div class="mt-12 flex justify-center">
        <button
            class="px-8 py-3 bg-white border border-[#cde2cf] text-text-main font-bold rounded-lg shadow-sm hover:bg-gray-50 hover:border-primary hover:text-primary transition-all flex items-center gap-2">
            <span>Load More Articles</span>
            <span class="material-symbols-outlined animate-bounce" style="font-size: 18px;">expand_more</span>
        </button>
    </div>
</main>