<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,600;0,8..60,700;1,8..60,400&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-low": "#f3f3f3",
                        "on-tertiary-container": "#ffe0cd",
                        "on-secondary-fixed": "#1c1b1b",
                        "on-primary-fixed-variant": "#5a00c6",
                        "error": "#ba1a1a",
                        "tertiary-fixed-dim": "#ffb784",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed": "#25005a",
                        "on-tertiary": "#ffffff",
                        "inverse-surface": "#2f3131",
                        "on-error": "#ffffff",
                        "primary": "#630ed4",
                        "inverse-on-surface": "#f1f1f1",
                        "error-container": "#ffdad6",
                        "outline-variant": "#ccc3d8",
                        "on-secondary-fixed-variant": "#474746",
                        "on-primary": "#ffffff",
                        "on-error-container": "#93000a",
                        "surface-dim": "#dadada",
                        "on-tertiary-fixed": "#301400",
                        "surface": "#f9f9f9",
                        "primary-container": "#7c3aed",
                        "secondary": "#5f5e5e",
                        "secondary-fixed": "#e5e2e1",
                        "on-secondary": "#ffffff",
                        "on-background": "#1a1c1c",
                        "on-secondary-container": "#636262",
                        "on-primary-container": "#ede0ff",
                        "surface-variant": "#e2e2e2",
                        "surface-container-highest": "#e2e2e2",
                        "inverse-primary": "#d2bbff",
                        "tertiary-container": "#a15100",
                        "surface-bright": "#f9f9f9",
                        "background": "#f9f9f9",
                        "outline": "#7b7487",
                        "tertiary": "#7d3d00",
                        "on-surface": "#1a1c1c",
                        "primary-fixed": "#eaddff",
                        "secondary-container": "#e2dfde",
                        "primary-fixed-dim": "#d2bbff",
                        "on-tertiary-fixed-variant": "#713700",
                        "secondary-fixed-dim": "#c8c6c5",
                        "on-surface-variant": "#4a4455",
                        "tertiary-fixed": "#ffdcc6",
                        "surface-tint": "#732ee4",
                        "surface-container": "#eeeeee",
                        "surface-container-high": "#e8e8e8"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "section-gap": "4rem",
                        "article-max": "720px",
                        "container-max": "1200px",
                        "margin-mobile": "1rem",
                        "gutter": "1.5rem"
                    },
                    "fontFamily": {
                        "display-lg": ["Source Serif 4"],
                        "ui-button": ["Inter"],
                        "display-lg-mobile": ["Source Serif 4"],
                        "ui-label": ["Inter"],
                        "metadata": ["Inter"],
                        "body-md": ["Source Serif 4"],
                        "headline-md": ["Source Serif 4"],
                        "body-lg": ["Source Serif 4"]
                    },
                    "fontSize": {
                        "display-lg": ["48px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "ui-button": ["16px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.02em",
                            "fontWeight": "600"
                        }],
                        "display-lg-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "ui-label": ["14px", {
                            "lineHeight": "1.4",
                            "letterSpacing": "0.01em",
                            "fontWeight": "500"
                        }],
                        "metadata": ["12px", {
                            "lineHeight": "1.4",
                            "fontWeight": "400"
                        }],
                        "body-md": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-md": ["32px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["20px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            background-color: #f9f9f9;
            color: #1a1c1c;
        }
    </style>
</head>

<body class="bg-surface font-body-md text-on-surface">
    <!-- TopNavBar -->
    <nav class="bg-surface border-b border-outline-variant fixed top-0 w-full z-50">
        <div class="flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-16">
            <!-- Brand -->
            <div class="flex items-center gap-8">
                <span class="font-display-lg-mobile text-display-lg-mobile font-bold text-on-surface">Ink &amp;
                    Paper</span>
                <div class="hidden md:flex gap-6 items-center">
                    <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 font-ui-label text-ui-label"
                        href="#">Feed</a>
                    <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 font-ui-label text-ui-label"
                        href="#">Authors</a>
                    <a class="text-primary font-bold border-b-2 border-primary pb-1 font-ui-label text-ui-label"
                        href="#">Dashboard</a>
                </div>
            </div>
            <!-- Search & Actions -->
            <div class="flex items-center gap-4">
                <div class="relative hidden lg:block">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                    <input
                        class="bg-surface-container-low border border-outline-variant rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary outline-none transition-all w-64"
                        placeholder="Search dashboard..." type="text" />
                </div>
                <div class="flex items-center gap-2">
                    <button class="p-2 text-on-surface-variant hover:bg-surface-variant rounded-full transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button class="p-2 text-on-surface-variant hover:bg-surface-variant rounded-full transition-colors">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                    <div
                        class="h-8 w-8 rounded-full bg-surface-container-highest border border-outline-variant overflow-hidden ml-2">
                        <img alt="User Avatar" class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0AYb_SHcteKZzA-SbEUz8ndeK8HYHXH5KLM8omksC7XXB8Ygy442KMbE6_5OUCdxHG2LfMVk3e0Tn2TGYhzIw5lF5gMHUESCT2cRtHbSpF_dcIGmCdtmYruZMPYCXXytGmp0pCrYE9CyODJ8IxpjlsUHSm0bLrdTmEu6WGMqNNq4VnrTykETO5SvEVgz6vUaHFuZDQGm-Azwc9rNSbwZ7eXWSvOnxqjBHDzhEj7SJ5GW3ly_p9B_9By8mqsIh9stkZEVOlgZrua_V" />
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="pt-24 pb-section-gap px-gutter max-w-container-max mx-auto">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="max-w-2xl">
                <h1 class="font-display-lg text-display-lg text-on-surface mb-2">Category Management</h1>
                <p class="font-body-md text-on-surface-variant">Organize your content structure, monitor performance
                    metrics, and refine your editorial taxonomy for maximum audience engagement.</p>
            </div>
            <a href="{{ route('dashboard.categories.create') }}"
                class="bg-primary text-on-primary px-6 py-3 rounded-lg font-ui-button text-ui-button shadow-sm hover:opacity-90 active:scale-95 transition-all flex items-center gap-2 whitespace-nowrap">
                <span class="material-symbols-outlined">add</span>
                Create Category
            </a>
        </header>
        <!-- Search and Layout Toggle -->
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between mb-8">
            <div class="relative w-full md:w-96">
                <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                <input
                    class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl pl-12 pr-4 py-3 font-ui-label text-ui-label focus:border-primary outline-none transition-all"
                    placeholder="Filter categories by name..." type="text" />
            </div>
            <div class="flex items-center gap-2 bg-surface-container-low p-1 rounded-lg">
                <button class="p-2 bg-surface-container-lowest text-primary rounded shadow-sm">
                    <span class="material-symbols-outlined">grid_view</span>
                </button>
                <button class="p-2 text-on-surface-variant">
                    <span class="material-symbols-outlined">list</span>
                </button>
            </div>
        </div>

        <!-- Table View For Bulk Actions (Secondary Section) -->
        <section class="mt-20">
            <h3 class="font-headline-md text-headline-md text-on-surface mb-8">All Categories</h3>
            <div class="overflow-x-auto bg-surface-container-lowest border border-outline-variant rounded-xl">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low border-b border-outline-variant">
                            <th
                                class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider">
                                Category Name</th>
                            <th
                                class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider">
                                Status</th>
                            <th
                                class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider">
                                Post Count</th>

                            <th
                                class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-surface transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-headline-md text-xl font-bold">{{ $category->name }}</div>
                                    <div class="font-metadata text-metadata text-on-surface-variant">
                                        /categories/{{ $category->name }}</div>
                                </td>


                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-bold">Active</span>
                                </td>
                                <td class="px-6 py-4 font-ui-label text-ui-label">{{ $category->posts_count ?? 0 }}</td>


                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                            class="text-on-surface-variant hover:text-primary"><span
                                                class="material-symbols-outlined">edit</span></a>
                                        <a href="{{ route('dashboard.categories.show', $category->id) }}"
                                            class="text-on-surface-variant hover:text-primary"><span
                                                class="material-symbols-outlined">visibility</span></a>

                                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this category?')"
                                                class="text-on-surface-variant hover:text-error"><span
                                                    class="material-symbols-outlined">delete</span></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-surface border-t border-outline-variant mt-20">
        <div
            class="w-full py-section-gap px-gutter max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex flex-col items-center md:items-start gap-2">
                <span class="font-headline-md text-headline-md text-on-surface">Ink &amp; Paper</span>
                <p class="font-metadata text-metadata text-secondary">© 2024 Ink &amp; Paper Platform. All rights
                    reserved.</p>
            </div>
            <div class="flex gap-8">
                <a class="font-body-md text-body-md text-secondary hover:text-on-surface hover:underline transition-all"
                    href="#">About</a>
                <a class="font-body-md text-body-md text-secondary hover:text-on-surface hover:underline transition-all"
                    href="#">Privacy</a>
                <a class="font-body-md text-body-md text-secondary hover:text-on-surface hover:underline transition-all"
                    href="#">Terms</a>
                <a class="font-body-md text-body-md text-secondary hover:text-on-surface hover:underline transition-all"
                    href="#">API</a>
                <a class="font-body-md text-body-md text-secondary hover:text-on-surface hover:underline transition-all"
                    href="#">Help</a>
            </div>
            <div class="flex gap-4">
                <button
                    class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-full hover:bg-primary hover:text-on-primary transition-all focus:outline-none ring-2 ring-primary">
                    <span class="material-symbols-outlined text-sm">mail</span>
                </button>
                <button
                    class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-full hover:bg-primary hover:text-on-primary transition-all focus:outline-none ring-2 ring-primary">
                    <span class="material-symbols-outlined text-sm">share</span>
                </button>
            </div>
        </div>
    </footer>
</body>

</html>
