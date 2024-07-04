<x-app>
    <div class="p-4 border-2 border-gray-200 bg-blue-300 rounded-lg dark:border-gray-700 mt-14">
        <span class="text-3xl font-semibold">Halaman Detail Product</span>
    </div>

    <div class="flex flex-wrap mt-6 justify-around">
        <div class="p-4 border-2 bg-white rounded-lg h-full">
            <img src="{{ asset('storage/products/' . $product->image) }}" alt="" width="400" class="">
        </div>
        <div class="relative w-full sm:w-1/2 mt-4 sm:mt-0 overflow-x-auto sm:rounded-lg mb-4 ml-4">
            <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                            <span class="font-bold text-xl">Detail Product :</span>
                        </th>
                        <td class="px-6 py-4 text-right ">
                            <a href="{{route('product.edit', $product)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline ">Edit Product</a>

                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                            Name
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                            Category
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $product->category->name }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                            Status
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                            Price
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $product->price }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                            Stock
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $product->stock }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                            Favorite
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $product->is_favorite == 1 ? 'Yes' : 'No' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</x-app>
