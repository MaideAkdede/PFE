<x-layout>
    <x-slot name="title">
        Tous les produits
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl px-5 mx-auto">
            <x-admin-back/>
            <h1 class="title-primary text-center my-8">
                Tous les produits
            </h1>
            <div class="flex flex-col mb-10">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Produit
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Prix
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       En stock
                                    </th>

                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a class="link-underline" href="/{{$product->category->slug}}s/{{$product->slug}}">
                                                        {{ $product->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-lato-bold">
                                         {{$product->price}}€
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($product->out_of_stock)
                                                {{-- Produit en rupture de stock--}}
                                                <div class="rounded-full h-4 w-4 aspect-square bg-error">
                                                    <span class="sr-only">En rupture de stock</span>
                                                </div>
                                            @else
                                                <div class="rounded-full h-4 w-4 aspect-square bg-green-500">
                                                    <span class="sr-only">En stock</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/produits/{{$product->id}}/modifier" class="text-blue-500 hover:text-blue-600">Modifier</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{--<a href="/admin/posts/{{$post->id}}/edit" class="text-red-400 hover:text-blue-600">Delete</a>--}}
                                            <form action="/admin/produits/{{$product->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-red-200 hover:text-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-layout>
