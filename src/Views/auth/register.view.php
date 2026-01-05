<div class="font-display bg-[#dfeee0] min-h-screen flex items-center justify-center p-4">
    <!-- Main Card Container -->
    <div
        class="bg-[#fbfffb] w-full max-w-lg rounded-2xl shadow-xl overflow-hidden my-8 border border-white/50 relative z-10">
        <!-- Header Section -->
        <div class="px-8 pt-10 pb-6 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary/10 mb-4">
                <span class="material-symbols-outlined text-primary text-2xl">auto_stories</span>
            </div>
            <h1 class="text-[#101912] tracking-tight text-3xl font-bold leading-tight mb-2">Create your account</h1>
            <p class="text-gray-500 text-base font-normal">Join our community of readers and writers.</p>
        </div>
        <!-- Form Section -->
        <div class="px-8 pb-10">
            <form action="<?= route('register.submit') ?>" class="flex flex-col gap-5" method="POST">
                <!-- Name Fields -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-[#101912] text-sm font-medium mb-1.5" for="first-name">First
                            Name</label>
                        <input
                            class="form-input w-full rounded-lg border border-[#d4e3d7] bg-white text-[#101912] h-12 px-4 placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                            id="first-name" name="first_name" placeholder="Jane" type="text" />
                        <?php if (session()->hasError('first_name')): ?>
                            <p class="text-xs text-red-500 mt-1.5"><?= session()->getError('first_name') ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="flex-1">
                        <label class="block text-[#101912] text-sm font-medium mb-1.5" for="last-name">Last Name</label>
                        <input
                            class="form-input w-full rounded-lg border border-[#d4e3d7] bg-white text-[#101912] h-12 px-4 placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                            id="last-name" name="last_name" placeholder="Doe" type="text" />
                        <?php if (session()->hasError('last_name')): ?>
                            <p class="text-xs text-red-500 mt-1.5"><?= session()->getError('last_name') ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Email Field -->
                <div>
                    <label class="block text-[#101912] text-sm font-medium mb-1.5" for="email">Email Address</label>
                    <div class="relative">
                        <input
                            class="form-input w-full rounded-lg border border-[#d4e3d7] bg-white text-[#101912] h-12 px-4 pl-10 placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                            id="email" name="email" placeholder="jane@example.com" type="email" />
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">mail</span>
                    </div>
                    <?php if (session()->hasError('email')): ?>
                        <p class="text-xs text-red-500 mt-1.5"><?= session()->getError('email') ?></p>
                    <?php endif; ?>
                </div>
                <!-- Password Field -->
                <div>
                    <label class="block text-[#101912] text-sm font-medium mb-1.5" for="password">Password</label>
                    <div class="relative">
                        <input
                            class="form-input w-full rounded-lg border border-[#d4e3d7] bg-white text-[#101912] h-12 px-4 pl-10 placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                            id="password" placeholder="••••••••" name="password" type="password" />
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">lock</span>
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                            type="button">
                            <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                        </button>
                    </div>
                    <?php if (session()->hasError('password')): ?>
                        <p class="text-xs text-red-500 mt-1.5"><?= session()->getError('password') ?></p>
                    <?php endif; ?>
                </div>
                <!-- Confirm Password Field -->
                <div>
                    <label class="block text-[#101912] text-sm font-medium mb-1.5" for="password">Confirm Password</label>
                    <div class="relative">
                        <input
                            class="form-input w-full rounded-lg border border-[#d4e3d7] bg-white text-[#101912] h-12 px-4 pl-10 placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                            id="confirm-password" placeholder="••••••••" name="password_confirmation" type="password" />
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">lock</span>
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                            type="button">
                            <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                        </button>
                    </div>
                    <?php if (session()->hasError('password_confirmation')): ?>
                        <p class="text-xs text-red-500 mt-1.5"><?= session()->getError('password_confirmation') ?></p>
                    <?php endif; ?>
                </div>
                <!-- Role Selection -->
                <div>
                    <label class="block text-[#101912] text-sm font-medium mb-2">I want to join as a:</label>
                    <div class="grid grid-cols-2 gap-3">
                        <!-- Option: Reader -->
                        <label class="cursor-pointer relative">
                            <input checked="" class="peer sr-only" name="role" type="radio" value="reader" />
                            <div
                                class="flex flex-col items-center justify-center p-4 rounded-xl border border-[#d4e3d7] bg-white text-center transition-all duration-200 hover:bg-gray-50 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5">
                                <span
                                    class="material-symbols-outlined text-gray-500 peer-checked:text-primary mb-2">menu_book</span>
                                <span
                                    class="text-sm font-semibold text-gray-700 peer-checked:text-primary">Reader</span>
                                <span class="text-[10px] text-gray-400 mt-1">Read, like &amp; comment</span>
                            </div>
                        </label>
                        <!-- Option: Author -->
                        <label class="cursor-pointer relative">
                            <input class="peer sr-only" name="role" type="radio" value="author" />
                            <div
                                class="flex flex-col items-center justify-center p-4 rounded-xl border border-[#d4e3d7] bg-white text-center transition-all duration-200 hover:bg-gray-50 peer-checked:border-primary peer-checked:ring-1 peer-checked:ring-primary peer-checked:bg-primary/5">
                                <span
                                    class="material-symbols-outlined text-gray-500 peer-checked:text-primary mb-2">edit_note</span>
                                <span
                                    class="text-sm font-semibold text-gray-700 peer-checked:text-primary">Author</span>
                                <span class="text-[10px] text-gray-400 mt-1">Publish articles</span>
                            </div>
                        </label>
                    </div>
                    <?php if (session()->hasError('role')): ?>
                        <p class="text-xs text-red-500 mt-1.5"><?= session()->getError('role') ?></p>
                    <?php endif; ?>
                </div>
                <!-- Action Button -->
                <button
                    class="w-full bg-primary hover:bg-[#257a39] text-white font-semibold h-12 rounded-lg shadow-sm transition-colors duration-200 mt-2 text-base"
                    type="submit">
                    Create Account
                </button>
            </form>
            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">
                Already have an account?
                <a class="text-primary font-semibold hover:underline decoration-primary" href="<?= route('login') ?>">Log in</a>
            </p>
            <p class="text-center text-xs text-gray-400 mt-8 leading-relaxed px-4">
                By clicking "Create Account", you agree to our <a class="underline" href="#">Terms of Service</a> and <a
                    class="underline" href="#">Privacy Policy</a>.
            </p>
        </div>
    </div>
</div>