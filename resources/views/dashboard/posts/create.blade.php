@extends('dashboard.components.layout');

@section('container')
<div class="min-h-screen w-full flex flex-col justify-start items-start bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-5xl mx-auto py-2 px-6 md:px-12">
        <h2 class="mb-2 text-2xl tracking-tight font-bold text-gray-900 dark:text-white">Create New Post</h2>
        <form class="w-full" method="post" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
                <label for="title" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your title" required />
            </div>

            <div class="mb-3">
                <label for="slug" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your slug" required />
            </div>

            <div class="mb-3">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
                <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert Body</label>
                <input id="x" type="hidden" name="content">
                <trix-editor input="x"></trix-editor>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Post</button>
        </form>
    </div>
</div>


<script>

    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>

@endsection
