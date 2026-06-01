<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto px-4 py-8 mt-8">
        <div class="max-w-3xl mx-auto bg-surface rounded-lg shadow-md p-6">
            <!-- Header -->
            <div class="mb-6 text-center">
                <div class="flex items-center justify-center mb-4">
                    <p class="text-lg font-medium text-on-surface-variant">Category Name: </p>
                    <h1 class="text-2xl font-bold text-on-surface mb-2">{{ $category->name }}</h1>
                </div>
                <p class="text-sm text-on-surface-variant">
                    {{ $category->description ?? 'No description available.' }}
                </p>
                <h2 class="text-xl font-bold text-on-surface mb-4">Posts in this Category</h2>
                <p>{{ $category->posts->count() }} posts in this category.</p>
            </div>
        </div>
    </div>


</body>

</html>
