<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

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
                        <span aria-current="page" class="text-sm font-medium text-text-main dark:text-white">Create
                            Article</span>
                    </li>
                </ol>
            </nav>
        </div>
    </header>
    <div class="flex-1 overflow-y-auto p-6 scroll-smooth">
        <div class="mx-auto max-w-5xl flex flex-col gap-8">
            <div class="flex flex-col gap-1">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-text-main dark:text-white">Create Article</h2>
                </div>
                <p class="text-sm text-text-secondary dark:text-gray-400">Fill out the form below to create a new article</p>
            </div>
            <form id="article-form" action="<?= route('author.articles.store') ?>" method="post" enctype="multipart/form-data" class="flex flex-col gap-6 rounded-2xl bg-background-card dark:bg-[#1a261d] p-8 shadow-soft">
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-text-secondary dark:text-gray-300"
                        for="article-title">Article Title</label>
                    <input name="title"
                        class="w-full rounded-xl border border-[#cfdfd0] bg-white dark:bg-[#253528] dark:border-[#2a382d] p-4 text-xl font-bold text-text-main placeholder-text-secondary/50 shadow-sm focus:border-primary focus:ring-1 focus:ring-primary dark:text-white"
                        id="article-title" placeholder="Enter an engaging title..." type="text" />
                    <?php if (session()->hasError("title")): ?>
                        <span class="text-sm text-red-500">
                            <?= session()->getError("title") ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label class="text-sm font-semibold text-text-secondary dark:text-gray-300"
                            for="categories">Categories</label>
                        <select name="categories[]" class="flex w-full min-h-[50px] flex-wrap items-center gap-2 rounded-xl border border-[#cfdfd0] bg-white dark:bg-[#253528] dark:border-[#2a382d] p-2 pr-10 shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary" id="categories" multiple>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (session()->hasError("categories")): ?>
                            <span class="text-sm text-red-500">
                                <?= session()->getError("categories") ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-col gap-2 md:col-span-1">
                        <label class="text-sm font-semibold text-text-secondary dark:text-gray-300">Cover
                            Image</label>
                        <div
                            class="group relative flex h-[50px] w-full cursor-pointer items-center justify-center rounded-xl border border-dashed border-[#cfdfd0] bg-white dark:bg-[#253528] dark:border-[#2a382d] hover:bg-[#f4fcf5] hover:border-primary transition-colors">
                            <div class="flex items-center gap-2 text-text-secondary group-hover:text-primary">
                                <span class="material-symbols-outlined text-[20px]">image</span>
                                <span class="text-sm font-medium">Upload</span>
                            </div>
                            <input name="cover" class="absolute inset-0 opacity-0 cursor-pointer" type="file" />
                        </div>
                        <?php if (session()->hasError("cover")): ?>
                            <span class="text-sm text-red-500">
                                <?= session()->getError("cover") ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-text-secondary dark:text-gray-300">Content</label>
                    <input type="hidden" name="content" id="content">
                    <div id="editor"></div>
                    <?php if (session()->hasError("content")): ?>
                        <span class="text-sm text-red-500">
                            <?= session()->getError("content") ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="flex items-center justify-end gap-4">
                    <button type="submit"
                        class="hidden sm:flex items-center gap-2 rounded-lg bg-primary hover:bg-primary-dark px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-primary/30 transition-all hover:shadow-primary/40">
                        <span>Publish</span>
                        <span class="material-symbols-outlined text-[20px]">send</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
            ['bold', 'italic', 'underline'],
            [{ header: [1, 2, false] }],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link', 'image'],
            ['clean']
            ]
        }
    });

    new TomSelect('#categories', {
        plugins: ['remove_button'],
        placeholder: 'Add category...',
        create: true
    });

    document.querySelector('#article-form').addEventListener('submit', () => {
        document.getElementById('content').value = quill.root.innerHTML;
    });


</script>