<main class="flex-grow w-full max-w-[900px] mx-auto px-4 py-8 sm:px-6 lg:px-8 overflow-y-auto">
    <!-- Article Card -->
    <article class="bg-sh-content-surface rounded-2xl shadow-sm border border-white/50 overflow-hidden">
        <!-- Article Header Image (Optional hero or just padding) -->
        <div class="w-full h-64 sm:h-80 bg-cover bg-center relative"
            data-alt="Futuristic sustainable greenhouse with lush green plants"
            style='background-image: url("<?= dns() . $article->cover ?>");'>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                <div class="p-8 w-full">
                    <!-- Categories/Chips on Image -->
                    <div class="flex gap-2 mb-4">
                        <?php foreach ($article->categories as $category) : ?>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-sh-primary text-black backdrop-blur-md">
                                <?= $category->name ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-8 sm:px-10 sm:py-10">
            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-sh-text-main leading-[1.1] tracking-tight mb-6">
                <?= $article->title ?>
            </h1>
            <!-- Article Body -->
            <div class="prose prose-lg prose-slate max-w-none text-sh-text-main/80 font-normal leading-relaxed">
                <?= $article->content ?>
            </div>
            <!-- Interaction Bar Footer -->
            <div class="mt-12 pt-8 border-t border-[#e7f3eb] flex flex-wrap gap-4 items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-sh-text-main"><?= $article->likes_count ?></span>
                    <span class="text-text-muted font-medium">Likes</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-sh-text-main"><?= $article->comments_count ?></span>
                    <span class="text-text-muted font-medium">Comments</span>
                </div>
            </div>
        </div>
    </article>
</main>