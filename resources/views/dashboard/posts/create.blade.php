@extends('dashboard.components.layout');

@section('container')
<div class="min-h-screen w-full flex flex-col justify-start items-start bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-5xl mx-auto py-2 px-6 md:px-12">
        <h2 class="mb-2 text-2xl tracking-tight font-bold text-gray-900 dark:text-white">Create New Post</h2>
        <form method="post" action="/dashboard/posts" class="w-full" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') border-pink-500 text-pink-600 @enderror"
                    placeholder="your title" required autofocus value="{{ old('title') }}">
                    @error('title')
                        <p class="text-pink-600">{{ $message }}</p>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your slug" required value="{{ old('slug') }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($categories as $category)
                        @if(old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="flex items-center space-x-6 mb-4">
                <div class="shrink-0">
                    <img class="img-preview h-60 object-cover" src="/img/thumb-post.png" alt="Post image" />
                </div>
                <label class="block">
                    <span>Choose Image Post</span>
                    <input type="file" id="image" name="image" class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-violet-50 file:text-violet-700
                    hover:file:bg-violet-100 @error('image') border-pink-500 text-pink-600 @enderror
                    " onchange="previewImage()"/>
                    @error('image')
                        <p class="text-pink-600">{{ $message }}</p>
                    @enderror
                </label>

            </div>

            <div class="mb-3">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Insert Body</label>
                @error('body')
                    <p class="text-pink-600">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
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

    // preview image
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFRevent) {
            imgPreview.src = oFRevent.target.result;
        }


    }


</script>

@endsection
