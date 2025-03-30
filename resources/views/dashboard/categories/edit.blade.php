@extends('dashboard.components.layout');

@section('container')
<div class="min-h-screen w-full flex flex-col justify-start items-start bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-5xl mx-auto py-2 px-6 md:px-12">
        <h2 class="mb-2 text-2xl tracking-tight font-bold text-gray-900 dark:text-white">Create New Post</h2>
        <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="w-full">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-pink-500 text-pink-600 @enderror"
                    placeholder="your category" required autofocus value="{{ old('name', $category->name) }}">
                    @error('name')
                        <p class="text-pink-600">{{ $message }}</p>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your slug" required value="{{ old('slug', $category->slug) }}">
            </div>

            <div class="mb-3">
                <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Color</label>
                @php
                    $colors = ['red' => 'Red', 'green' => 'Green', 'blue' => 'Blue', 'yellow' => 'Yellow'];
                    $selectedColor = old('color', $category->color);
                @endphp

                <select id="color" name="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($colors as $value => $label)
                        <option value="{{ $value }}" {{ $selectedColor == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Post</button>
        </form>
    </div>
</div>


<script>

    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/categories/checkSlugCategory?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

</script>

@endsection
