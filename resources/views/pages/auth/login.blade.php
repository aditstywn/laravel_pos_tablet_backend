<x-auth>

<div class="flex items-center justify-center h-screen">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="{{route('login')}}" method="POST">
            @csrf
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Masuk Kedalam Akun Anda</h5>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan email</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('email') is-invalid @enderror" placeholder="name@company.com" required />
                @error('email')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan password</label>
                <input type="password" name="password" value="{{ old('password') }}" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('password') is-invalid @enderror" required />
                @error('password')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masukan Ke Akun Anda</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Belum Punya Akun? <a href="{{route('register')}}" class="text-blue-700 hover:underline dark:text-blue-500">Register</a>
            </div>
        </form>
    </div>
</div>

</x-auth>
