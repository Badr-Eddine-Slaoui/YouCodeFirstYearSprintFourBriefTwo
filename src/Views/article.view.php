<?php use App\Models\Like; ?>
<main class="flex-grow w-full max-w-[900px] mx-auto px-4 py-8 sm:px-6 lg:px-8">
    <!-- Article Card -->
    <article class="bg-content-surface rounded-2xl shadow-sm border border-white/50 overflow-hidden">
        <!-- Article Header Image (Optional hero or just padding) -->
        <div class="w-full h-64 sm:h-80 bg-cover bg-center relative"
            data-alt="Futuristic sustainable greenhouse with lush green plants"
            style='background-image: url("http://localhost:8080<?= $article->cover ?>");'>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                <div class="p-8 w-full">
                    <!-- Categories/Chips on Image -->
                    <div class="flex gap-2 mb-4">
                        <?php foreach ($article->categories as $category): ?>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary text-black backdrop-blur-md">
                                <?= $category->name ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-8 sm:px-10 sm:py-10">
            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-text-main leading-[1.1] tracking-tight mb-6">
                <?= $article->title ?>
            </h1>
            <!-- Author Meta -->
            <div class="flex items-center justify-between border-b border-[#e7f3eb] pb-8 mb-8">
                <div class="flex items-center gap-4">
                    <div class="bg-center bg-no-repeat bg-cover rounded-full h-12 w-12 ring-2 ring-[#e7f3eb]"
                        data-alt="Author Jane Doe portrait"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCXXPQcDDjJJGctlOcyTzAi1tGQdnL5KXdcVriKK69QOk5yjLiDVLdZM0ks3J2QitfNZKg8cFfsjfi0_KPpswpWr5wy6B8A2OebltwAcBkIGoockAz-2EOzcx3RZ1Bb-LnStBtRSLOBVqHd-lFVddfRdTDtdHmyprwrePKTxrEB5yPKMjBl0U-aM1siaU-6DSwXJ-JlDjy2lwGFo7dW2wjQJWYgrtS8q_9pEcZGMvVVtwpwa-2H9ET957ptKKPSKHaCvxmvXQ4z2Ro");'>
                    </div>
                    <div class="flex flex-col">
                        <span
                            class="text-text-main font-bold text-lg leading-tight"><?= ucwords($article->author()->getFullName()) ?></span>
                        <span class="text-text-muted text-sm font-medium"><?= $article->created_at->format('F j, Y') ?>
                            • <?= diffForHuman($article->created_at) ?></span>
                    </div>
                </div>
                <?php
                    $is_liked = Like::is_liked_by(session()->get('user_id'), $article->id);
                ?>
                <!-- Article Actions (Top) -->
                <div class="flex items-center gap-2">
                    <?php if ($is_liked): ?>
                        <form action="<?= route('reader.articles.unlike') ?>" method="post">
                            <input type="hidden" name="article_id" value="<?= $article->id ?>">
                            <button type="submit"
                                class="group flex items-center justify-center h-10 w-10 rounded-full  bg-red-50 hover:bg-[#e7f3eb] text-red-500 hover:text-black transition-colors">
                                <span
                                    class="material-symbols-outlined text-[20px] transition-transform group-active:scale-110">favorite</span>
                            </button>
                        </form>
                    <?php else: ?>
                        <form action="<?= route('reader.articles.like') ?>" method="post">
                            <input type="hidden" name="article_id" value="<?= $article->id ?>">
                            <button type="submit"
                                class="group flex items-center justify-center h-10 w-10 rounded-full bg-[#e7f3eb] hover:bg-red-50 hover:text-red-500 transition-colors">
                                <span
                                    class="material-symbols-outlined text-[20px] transition-transform group-active:scale-110">favorite_border</span>
                            </button>
                        </form>
                    <?php endif; ?>
                    <button
                        class="group flex items-center justify-center h-10 w-10 rounded-full bg-[#e7f3eb] hover:bg-blue-50 hover:text-blue-500 transition-colors"
                        title="Share Article">
                        <span class="material-symbols-outlined text-[20px]">ios_share</span>
                    </button>
                    <button
                        class="group flex items-center justify-center h-10 w-10 rounded-full bg-[#e7f3eb] hover:bg-gray-200 transition-colors"
                        title="Report Article">
                        <span class="material-symbols-outlined text-[20px]">flag</span>
                    </button>
                </div>
            </div>
            <!-- Article Body -->
            <div class="prose prose-lg prose-slate max-w-none text-text-main/80 font-normal leading-relaxed">
                <?= $article->content ?>
            </div>
            <!-- Interaction Bar Footer -->
            <div class="mt-12 pt-8 border-t border-[#e7f3eb] flex flex-wrap gap-4 items-center justify-between">
                <button type="submit" class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-text-main"><?= $article->likes_count ?></span>
                    <span class="text-text-muted font-medium">Likes</span>
                </button>
                <div class="flex gap-3">
                    <?php if ($is_liked): ?>
                        <form action="<?= route('reader.articles.unlike') ?>" method="post">
                            <input type="hidden" name="article_id" value="<?= $article->id ?>">
                            <button
                                class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-black font-bold hover:bg-primary/90 transition-all shadow-sm active:scale-95">
                                <span class="material-symbols-outlined text-[20px] fill-1">thumb_up</span>
                                UnLike
                            </button>
                        </form>
                    <?php else: ?>
                        <form action="<?= route('reader.articles.like') ?>" method="post">
                            <input type="hidden" name="article_id" value="<?= $article->id ?>">
                            <button
                                class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-[#e7f3eb] text-text-main font-medium hover:bg-gray-200 transition-all">
                                <span class="material-symbols-outlined text-[20px]">thumb_up</span>
                                Like
                            </button>
                        </form>
                    <?php endif; ?>
                    <button
                        class="flex items-center gap-2 px-6 py-2.5 rounded-lg bg-[#e7f3eb] text-text-main font-medium hover:bg-gray-200 transition-all">
                        <span class="material-symbols-outlined text-[20px]">flag</span>
                        Report
                    </button>
                </div>
            </div>
        </div>
    </article>
    <!-- Comments Section -->
    <section class="mt-8 bg-content-surface rounded-2xl shadow-sm border border-white/50 p-6 sm:p-10">
        <h3 class="text-2xl font-bold text-text-main mb-6 flex items-center gap-3">
            Discussion
            <span
                class="bg-[#e7f3eb] text-text-muted text-sm px-3 py-1 rounded-full align-middle"><?= $article->comments_count ?></span>
        </h3>
        <!-- Add Comment Form -->
        <form action="<?= route('reader.comments.store') ?>" method="post" id="comment-form" class="flex gap-4 mb-10">
            <input type="hidden" name="article_id" value="<?= $article->id ?>">
            <div class="hidden sm:block bg-center bg-no-repeat bg-cover rounded-full h-10 w-10 shrink-0"
                data-alt="Current user avatar"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDg56w6hRjqkeSQp-xARN1r1CJOEmH9UR2TvOY8IMmK-jr985RsgZ5SypJJR8m57K1llTHGliFeCtQcKOUTPFSVOW5x5aWSD2CAFLJkbnMHMoS13yrrLwpM-rwrhgpKWcm6et8VqeQaP1tkNoyO7GeSqWysm01wfBekqJgWzQV5LCl8v7cXQ8yMuNLKsbX84448ssBF5qYTk81VEsqwmIZ2UKWg_gq_ktFE5X4Vlwr2IfLyWqaIhQpCbTBqrwwQ6PUnqOvefQ3nom0");'>
            </div>
            <div class="flex-grow">
                <div class="relative">
                    <textarea name="content"
                        class="w-full bg-[#f8fcf9] border border-[#e7f3eb] rounded-xl p-4 text-text-main placeholder-text-muted focus:ring-2 focus:ring-primary focus:border-transparent resize-none transition-shadow shadow-inner"
                        placeholder="Join the conversation..." rows="3"></textarea>
                    <div class="absolute bottom-3 right-3">
                        <button type="submit"
                            class="bg-primary text-black px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm hover:bg-primary/90 transition-colors">
                            Post
                        </button>
                    </div>
                </div>
                <?php if (session()->hasError("content")): ?>
                    <span class="text-sm text-red-500">
                        <?= session()->getError("content") ?>
                    </span>
                <?php endif; ?>
            </div>
        </form>
        <!-- Comment List -->
        <div class="flex flex-col gap-8">
            <?php if (count($article->comments()) > 0): ?>
                <?php foreach ($article->comments() as $comment): ?>
                    <?php
                        $is_comment_liked = Like::is_liked_by(session()->get('user_id'), $comment->id);
                    ?>
                    <?php if ($comment->reader_id !== session()->get('user_id')): ?>
                        <div class="group flex gap-4">
                            <div class="bg-center bg-no-repeat bg-cover rounded-full h-10 w-10 shrink-0 bg-gray-200"
                                data-alt="User Alex avatar"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB4iz4aoC0F1LWJR26TPzT9JibknSI6CfCSZoSLTS8JlmrWLVrFaogHKOUizvAR9a5tYTgmkpEhk0J2K0POt3Wrli8MZZgLu3qAuuumYjRPmKuC44VrTW1DkDjW_VBa6f3uNMmGUoIsdDZgG48kN07_YPoE5LZTo0sZZIo2RnToI8AIOHhovJGuE6t3P9HPMEqqHDBJlJb_oUFxdWQUqazSacGtDBaAeWl-Ot0ToIuDQYuw2EHMYvxBepObUWVL_oEvL4LrCOSeGpE");'>
                            </div>
                            <div class="flex-grow">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="font-bold text-text-main"><?= ucwords($comment->reader()->getFullName()) ?></span>
                                        <?php if ($article->author_id === $comment->reader_id): ?>
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-primary text-black">AUTHOR</span>
                                        <?php endif; ?>
                                        <span class="text-xs text-text-muted">• <?= diffForHuman($comment->created_at) ?></span>
                                    </div>
                                </div>
                                <div class="text-text-main/90 text-sm leading-relaxed mb-3">
                                    <?= $comment->body ?>
                                </div>
                                <div class="flex items-center gap-4">
                                    <?php if ($is_comment_liked): ?>
                                        <form action="<?= route('reader.comments.unlike') ?>" method="post">
                                            <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                            <button type="submit"
                                                class="flex items-center gap-1.5 text-xs font-medium text-red-500 hover:text-primary transition-colors">
                                                <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                                <?= $comment->likes_count ?>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?= route('reader.comments.like') ?>" method="post">
                                            <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                            <button type="submit"
                                                class="flex items-center gap-1.5 text-xs font-medium text-text-muted hover:text-primary transition-colors">
                                                <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                                <?= $comment->likes_count ?>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <button
                                        class="flex items-center gap-1.5 text-xs font-medium text-text-muted hover:text-red-500 transition-colors">
                                        <span class="material-symbols-outlined text-[16px]">flag</span>
                                        Report
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div id="comment-<?= $comment->id ?>"
                            class="group flex gap-4 bg-[#f0f9f4] -mx-4 p-4 rounded-xl border border-transparent hover:border-primary/20 transition-colors">
                            <div class="bg-center bg-no-repeat bg-cover rounded-full h-10 w-10 shrink-0"
                                data-alt="Current user avatar"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB23U_JhkmwMtWh2CqMlX5J6OpNFojZXQTdGfEqOeYuX1T5lZBCARrUL48dEcNtiZCbPP2bhqbA2w19Za9FO8hi5RMTSBBjP20t1FHbb7tqO7HJUfF8baHd7ET2T3cN9e4Wh8RzJ-0hcibghjrFXs-g8kfRUvK8-M0IbBy9IUSbHrWjH-b9QbWv9PfYqv4KU9D3eS5stxRuWxXo8jhfwbYwq6KwcYkXREh9AAn-fUNQDUBpN6lXSmCSHtoa9hOV65PUDrjLLm4He7I");'>
                            </div>
                            <div class="flex-grow">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-text-main">You</span>
                                        <?php if ($article->author_id === session()->get("user_id")): ?>
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-primary text-black">AUTHOR</span>
                                        <?php endif; ?>
                                        <span class="text-xs text-text-muted">• <?= diffForHuman($comment->created_at) ?></span>
                                    </div>
                                    <div
                                        class="flex items-center gap-1 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
                                        <button onclick="editComment(<?= $comment->id ?>)"
                                            class="p-1.5 rounded hover:bg-white text-text-muted hover:text-primary" title="Edit">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>
                                        <form action="<?= route('reader.comments.destroy') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $comment->id ?>">
                                            <button type="submit"
                                                class="p-1.5 rounded hover:bg-white text-text-muted hover:text-red-500"
                                                title="Delete">
                                                <span class="material-symbols-outlined text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="comment-body text-text-main/90 text-sm leading-relaxed mb-3">
                                    <?= $comment->body ?>
                                </div>
                                <div class="flex items-center gap-4">
                                    <?php if ($is_comment_liked): ?>
                                        <form action="<?= route('reader.comments.unlike') ?>" method="post">
                                            <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                            <button type="submit"
                                                class="flex items-center gap-1.5 text-xs font-medium text-red-500 hover:text-primary transition-colors">
                                                <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                                <?= $comment->likes_count ?>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?= route('reader.comments.like') ?>" method="post">
                                            <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                            <button type="submit"
                                                class="flex items-center gap-1.5 text-xs font-medium text-text-muted hover:text-primary transition-colors">
                                                <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                                <?= $comment->likes_count ?>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <form action="<?= route('reader.comments.update') ?>" method="post"
                            id="update-comment-form-<?= $comment->id ?>" class="flex gap-4 mb-10 hidden">
                            <input type="hidden" name="id" value="<?= $comment->id ?>">
                            <div class="hidden sm:block bg-center bg-no-repeat bg-cover rounded-full h-10 w-10 shrink-0"
                                data-alt="Current user avatar"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDg56w6hRjqkeSQp-xARN1r1CJOEmH9UR2TvOY8IMmK-jr985RsgZ5SypJJR8m57K1llTHGliFeCtQcKOUTPFSVOW5x5aWSD2CAFLJkbnMHMoS13yrrLwpM-rwrhgpKWcm6et8VqeQaP1tkNoyO7GeSqWysm01wfBekqJgWzQV5LCl8v7cXQ8yMuNLKsbX84448ssBF5qYTk81VEsqwmIZ2UKWg_gq_ktFE5X4Vlwr2IfLyWqaIhQpCbTBqrwwQ6PUnqOvefQ3nom0");'>
                            </div>
                            <div class="flex-grow">
                                <div class="relative">
                                    <textarea name="content"
                                        class="w-full bg-[#f8fcf9] border border-[#e7f3eb] rounded-xl p-4 text-text-main placeholder-text-muted focus:ring-2 focus:ring-primary focus:border-transparent resize-none transition-shadow shadow-inner"
                                        placeholder="Join the conversation..." rows="3"></textarea>
                                    <div class="absolute bottom-3 right-3">
                                        <button type="submit"
                                            class="bg-primary text-black px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm hover:bg-primary/90 transition-colors">
                                            Update
                                        </button>
                                        <button onclick="cancelEditComment(<?= $comment->id ?>)" type="button"
                                            class="bg-white text-text-muted px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm hover:bg-white/90 transition-colors">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                                <?php if (session()->hasError("content")): ?>
                                    <span class="text-sm text-red-500">
                                        <?= session()->getError("content") ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </form>
                    <?php endif; ?>
                <? endforeach; ?>
            <? else: ?>
                <div
                    class="flex flex-col items-center justify-center py-12 px-4 rounded-xl border-2 border-dashed border-[#e7f3eb] bg-[#f8fcf9]">
                    <div class="w-20 h-20 bg-[#e7f3eb] rounded-full flex items-center justify-center mb-4 shadow-sm">
                        <span class="material-symbols-outlined text-4xl text-text-muted">chat_bubble_outline</span>
                    </div>
                    <h4 class="text-lg font-bold text-text-main mb-2">No comments yet</h4>
                    <p class="text-text-muted text-center max-w-sm mb-6">
                        Be the first to share your thoughts on this article! Start the conversation by posting a comment
                        above.
                    </p>
                    <a href="#comment-form" class="text-primary font-bold hover:underline flex items-center gap-2 group">
                        Write a comment
                        <span
                            class="material-symbols-outlined text-sm transition-transform group-hover:-translate-y-1">arrow_upward</span>
                    </a>
                </div>
            <? endif; ?>
        </div>
    </section>
</main>

<script>
    function editComment(id) {
        const comment = document.getElementById(`comment-${id}`)
        const body = comment.querySelector('.comment-body').textContent.trim()
        const update_form = document.getElementById(`update-comment-form-${id}`)
        const comment_form = document.getElementById('comment-form')
        comment.classList.add('hidden')
        update_form.classList.remove('hidden')
        comment_form.classList.add('hidden')
        update_form.querySelector('textarea').value = body
    }

    function cancelEditComment(id) {
        const comment = document.getElementById(`comment-${id}`)
        const update_form = document.getElementById(`update-comment-form-${id}`)
        const comment_form = document.getElementById('comment-form')
        comment.classList.remove('hidden')
        update_form.classList.add('hidden')
        comment_form.classList.remove('hidden')
    }
</script>