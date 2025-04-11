<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>
        <div class="m-8 flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="/img/logo-transparan.png" alt="logo">
                Bloggers
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Please Register
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/register" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  @error('name') border-pink-500 text-pink-600 @enderror" placeholder="name" required="" value={{ old('name') }}>
                            @error('name')
                                <p class="text-pink-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('username') border-pink-500 text-pink-600 @enderror" placeholder="username"  required="" value={{ old('username') }}>
                            @error('username')
                                <p class="text-pink-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-pink-500 text-pink-600 @enderror" placeholder="name@company.com" required="" value={{ old('email') }}>
                            @error('email')
                                <p class="text-pink-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="your password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-pink-500 text-pink-600 @enderror" required="">
                            @error('password')
                                <p class="text-pink-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img class="h-16 w-16 object-cover rounded-full" src="/img/icon-user.jpg" alt="Current profile photo" />
                            </div>
                            <label class="block">
                                <span>Choose profile photo</span>
                                <input type="file" id="image" name="image" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-100 @error('image') border-pink-500 text-pink-600 @enderror
                                "/>
                                @error('image')
                                    <p class="text-pink-600">{{ $message }}</p>
                                @enderror
                            </label>

                        </div>


                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>
                    </form>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        have an account yet? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                    </p>
                </div>
            </div>
        </div>
</x-layout>
