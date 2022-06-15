<x-layout>
    <x-slot name="title">
        Toutes les marques
    </x-slot>
    <x-slot name="content">
        <div class="max-w-7xl px-5 mx-auto">
            <a href="/admin" title="Page d'administration"
               class="text-white bg-black inline-flex items-center px-3 py-1 button-primary gap-2 text-xs fill-white hover:fill-black">
                <svg class="icon h-[20px] w-[30px] rotate-90">
                    <use xlink:href="#arrow_down"></use>
                </svg>
                <span>Administration</span>
            </a>
            <h1 class="title-primary text-center my-8">
                Toutes les marques
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
                                        Image
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom
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
                                @foreach($brands as $brand)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img class="w-[50px]" src="{{asset('storage/'.$brand->thumbnail)}}" alt=""{{$brand->name}}>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-lato-bold">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a class="link-underline" href="/categories/{{$brand->slug}}">
                                                        {{ $brand->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/marques/{{$brand->id}}/modifier" class="text-blue-500 hover:text-blue-600">Modifier</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="/admin/marques/{{$brand->id}}" method="POST">
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
