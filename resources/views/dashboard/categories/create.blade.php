<x-layout>
    <main
        class="flex-grow flex flex-col items-center justify-center py-section-gap px-margin-mobile md:px-margin-desktop bg-surface-container-low/30 min-h-screen mt-10">
        <!-- حاوية النموذج: تم تصغير العرض إلى max-w-2xl وإضافة إطار خارجي أنيق -->
        <div
            class="w-full max-w-2xl animate-in fade-in slide-in-from-bottom-4 duration-700 border-2 border-surface-container-highest/60 rounded-2xl p-2 bg-surface-container-lowest shadow-md">

            <div class="border border-surface-container-highest/8xl rounded-xl p-6 md:p-10 bg-surface-container-lowest">
                <!-- Header Section -->
                <div class="mb-8 text-center border-b border-surface-container-highest pb-6">
                    <span
                        class="font-label-caps text-label-caps text-primary uppercase tracking-widest mb-2 block text-xs font-semibold">
                        Editorial Administration
                    </span>
                    <h2 class="font-headline-lg text-2xl md:text-3xl font-bold text-on-surface mb-3">
                        Create New Section
                    </h2>
                    <p class="font-body-md text-sm text-on-surface-variant max-w-md mx-auto leading-relaxed">
                        Define a new category to organize your editorial content and guide your readers through the
                        platform's intellectual landscape.
                    </p>
                </div>

                <!-- Form -->
                <form class="space-y-5" action="{{ route('dashboard.categories.store') }}" method="POST">
                    @csrf
                    <!-- Row: Name & Slug (توزيع مرن لحجم أصغر وأرتب) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Name Field -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface block uppercase tracking-wider"
                                for="section-name">
                                Section Name
                            </label>
                            <input
                                class="w-full bg-surface-container-low border border-surface-container-highest rounded-lg px-3 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-on-surface-variant/40 outline-none"
                                id="section-name" name="name" placeholder="e.g., Culture, Technology"
                                type="text" />
                        </div>

                        <!-- Slug Field -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface block uppercase tracking-wider"
                                for="section-slug">
                                URL Slug
                            </label>
                            <div
                                class="flex items-stretch bg-surface-container-low border border-surface-container-highest rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-primary/20 focus-within:border-primary transition-all">
                                <span
                                    class="flex items-center px-3 bg-surface-container-high text-on-tertiary-fixed-variant text-xs font-medium border-r border-surface-container-highest text-gray-500 selection:bg-transparent">
                                    ink-paper.com/
                                </span>
                                <input
                                    class="flex-1 bg-transparent border-none px-3 py-3 text-sm outline-none placeholder:text-on-surface-variant/40"
                                    id="section-slug" name="slug" placeholder="e.g., culture" type="text" />
                            </div>
                        </div>
                    </div>


                    <!-- Description Textarea -->
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-on-surface block uppercase tracking-wider"
                            for="description">
                            Description
                        </label>
                        <textarea
                            class="w-full bg-surface-container-low border border-surface-container-highest rounded-lg px-3 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-on-surface-variant/40 resize-none outline-none"
                            id="description" name="description"
                            placeholder="Describe the scope of this section and what type of content readers can expect..." rows="3"></textarea>
                    </div>
                    <!-- Form Actions -->
                    <div
                        class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-5 border-t border-surface-container-highest mt-6">
                        <button
                            class="w-full sm:w-auto px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition-all text-center"
                            type="button">
                            Cancel
                        </button>
                        <button
                            class="w-full sm:w-auto px-6 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider bg-primary text-white hover:bg-primary/90 transition-all shadow-sm active:opacity-90 text-center"
                            type="submit">
                            Create Section
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>
    <script>
        const nameInput = document.getElementById('section-name');
        const slugInput = document.getElementById('section-slug');

        nameInput.addEventListener('input', function() {
            slugInput.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '') // remove special characters
                .replace(/\s+/g, '-') // replace spaces with -
                .replace(/--+/g, '-'); // remove duplicate -
        });
    </script>
</x-layout>
