<x-app>
    <div class="p-4 border-2 border-gray-200 bg-blue-300  rounded-lg dark:border-gray-700 mt-14">
        <span class="text-3xl font-semibold">Halaman Create Products</span>
     </div>


    <div class="mx-auto mt-8 w-full max-w-3xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan name</label>
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name') is-invalid @enderror" placeholder="Name" required />
                @error('name')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan description</label>
                <input type="text" name="description" value="{{ old('description') }}" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('description') is-invalid @enderror" placeholder="Description"  />
                @error('description')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan price</label>
                <input type="number" name="price" value="{{ old('price') }}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('price') is-invalid @enderror" placeholder="price"  required/>
                @error('price')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan stock</label>
                <input type="number" name="stock" value="{{ old('stock') }}" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('stock') is-invalid @enderror" placeholder="stock"  required/>
                @error('stock')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Category</label>
                <select id="countries" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('category_id') is-invalid @enderror">
                  <option selected>Pilih Category</option>
                  @foreach ($categories as $categori)

                  <option value="{{$categori->id}}">{{$categori->name}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <p class="text-sm m-1 text-red-700 ">{{$message}}</p>
                @enderror
            </div>

            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan status</label>

                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="active" type="radio" value="1" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="active" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="inactive" type="radio" value="0" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="inactive" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                        </div>
                    </li>

            </div>
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Favorite</label>

                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="yes" type="radio" value="1" name="is_favorite" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="no" type="radio" value="0" name="is_favorite" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                        </div>
                    </li>

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
