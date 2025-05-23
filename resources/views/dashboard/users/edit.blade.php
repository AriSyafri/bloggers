@extends('dashboard.components.layout');

@section('container')
<div class="min-h-screen w-full flex flex-col justify-start items-start bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-5xl mx-auto py-2 px-6 md:px-12">
        <h2 class="mb-2 text-2xl tracking-tight font-bold text-gray-900 dark:text-white">Create New User</h2>
        <form method="post" action="/dashboard/users/{{ $user->slug }}" class="w-full" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-pink-500 text-pink-600 @enderror"
                    placeholder="your name" required autofocus value={{ old('name', $user->name) }}>
                    @error('name')
                        <p class="text-pink-600">{{ $message }}</p>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="username" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">username</label>
                <input type="text" id="username" name="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your username" required value={{ old('username', $user->username) }}>
            </div>

            <div class="mb-3">
                <label for="slug" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">slug</label>
                <input type="text" id="slug" name="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your slug" required value={{ old('slug', $user->slug) }}>
            </div>

            <div class="mb-3">
                <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">email</label>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your email" required value={{ old('email', $user->email) }}>
            </div>

            <div class="mb-3">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">password</label>
                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your password" required value={{ old('password') }}>
            </div>


            <div class="flex items-center space-x-6">

                <input type="hidden" name="oldImage" value="{{ $user->image }}">

                <div class="shrink-0">

                    @if ($user->image)
                        <img class="img-preview h-16 w-16 object-cover rounded-full" src="{{ asset('storage/' . $user->image) }}" alt="Current profile photo" />
                    @else
                        <img class="img-preview h-16 w-16 object-cover rounded-full" src="/img/icon-user.jpg" alt="Current profile photo" />
                    @endif


                </div>
                <label class="block">
                    <span>Choose profile photo</span>
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
                <label for="is_admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Role</label>

                    <select id="is_admin" name="is_admin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>User</option>
                    </select>

            </div>



            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create User</button>
        </form>
    </div>
</div>

<script>

    const username = document.querySelector('#username');
    const slug = document.querySelector('#slug');

    username.addEventListener('change', function() {
        fetch('/dashboard/users/checkSlugUser?username=' + username.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


    // preview image
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFRevent) {
            imgPreview.src = oFRevent.target.result; // perbaikan disini
        }
    }

</script>


@endsection
