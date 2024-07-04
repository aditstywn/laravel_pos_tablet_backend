<x-app>
    <div class="p-4 border-2 border-gray-200 bg-blue-300  rounded-lg dark:border-gray-700 mt-14">
        <span class="text-3xl font-semibold">Halaman Create Category</span>
     </div>


    <div class="mx-auto mt-8 w-full max-w-3xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="{{route('category.update', $category)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan name</label>
                <input type="text" name="name" value="{{ $category->name }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name') is-invalid @enderror" placeholder="Name" required />
                @error('name')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan description</label>
                <input type="text" name="description" value="{{ $category->description  }}" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('description') is-invalid @enderror" placeholder="Description"  />
                @error('description')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>


            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto produk</label>
                <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  @error('image') is-invalid @enderror"" aria-describedby="file_input_help" id="file_input" type="file">
                @error('image')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 id="file_input_help">PNG, JPG</p>

            </div>

            <div class="flex justify-end w-full">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </div>


        </form>
    </div>
</x-app>
