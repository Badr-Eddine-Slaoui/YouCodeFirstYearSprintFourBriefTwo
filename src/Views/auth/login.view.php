<div
    class="font-display bg-custom-bg dark:bg-background-dark min-h-screen flex flex-col items-center justify-center p-4">
    <div
        class="w-full max-w-[480px] bg-custom-card dark:bg-[#1e2a20] rounded-xl shadow-xl border border-[#d4e3d7]/50 dark:border-white/5 overflow-hidden">
        <!-- Header Section -->
        <div class="px-8 pt-10 pb-6 text-center">
            <h1 class="text-[#101912] dark:text-white text-[32px] font-bold leading-tight tracking-tight mb-2">Welcome
                Back</h1>
            <p class="text-[#5b8b66] dark:text-gray-400 text-base font-normal leading-normal">
                Manage your stories and connect with readers.
            </p>
        </div>
        <!-- Form Section -->
        <div class="px-8 pb-10">
            <form action="<?= route('login.submit') ?>" class="flex flex-col gap-5" method="POST">
                <!-- Email Field -->
                <div class="flex flex-col gap-2">
                    <label class="text-[#101912] dark:text-gray-200 text-sm font-semibold leading-normal"
                        for="email">Email Address</label>
                    <input
                        class="form-input w-full h-12 rounded-lg border border-[#d4e3d7] dark:border-gray-600 bg-[#f9fbf9] dark:bg-[#2a362c] text-[#101912] dark:text-white px-4 text-base placeholder:text-[#5b8b66]/60 dark:placeholder:text-gray-500 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200"
                        id="email" name="email" placeholder="user@example.com" type="email" />
                </div>
                <!-- Password Field -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center">
                        <label class="text-[#101912] dark:text-gray-200 text-sm font-semibold leading-normal"
                            for="password">Password</label>
                        <a class="text-primary text-sm font-semibold hover:underline" href="#">Forgot password?</a>
                    </div>
                    <div class="relative w-full">
                        <input
                            class="form-input w-full h-12 rounded-lg border border-[#d4e3d7] dark:border-gray-600 bg-[#f9fbf9] dark:bg-[#2a362c] text-[#101912] dark:text-white px-4 pr-12 text-base placeholder:text-[#5b8b66]/60 dark:placeholder:text-gray-500 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200"
                            id="password" name="password" placeholder="Enter your password" type="password" />
                        <button
                            class="absolute right-0 top-0 h-full px-3 text-[#5b8b66] hover:text-primary transition-colors flex items-center justify-center"
                            type="button">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                </div>
                <!-- Submit Button -->
                <button
                    class="mt-2 w-full h-12 bg-primary hover:bg-[#25803b] text-[#f9fbf9] text-base font-bold rounded-lg shadow-sm transition-all duration-200 flex items-center justify-center gap-2"
                    type="submit">
                    <span>Login</span>
                    <span class="material-symbols-outlined">arrow_right_alt</span>
                </button>
            </form>
        </div>
        <!-- Mobile Footer Link -->
        <div class="px-8 pb-8 text-center">
            <span class="text-sm text-[#5b8b66] dark:text-gray-400 font-medium">Don't have an account?</span>
            <a class="text-primary font-bold text-sm hover:underline ml-1" href="<?= route('register') ?>">Sign up</a>
        </div>
    </div>
</div>