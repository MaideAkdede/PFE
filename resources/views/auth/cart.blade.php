<x-layout>
    <x-slot name="title">
        Visualiser mon panier
    </x-slot>
    <x-slot name="content">
        @if($cart->count())
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
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Prix
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantité
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Lot
                                    </th>
                                    <th scope="col"
                                        class="sr-only">
                                        supprimer
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($cart as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img src="{{asset('storage/'.$item->products->image)}}" alt="" class="w-[50px] aspect-square object-contain">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-lato-bold">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a class="link-underline" href="/{{$item->products->category->slug}}s/ {{$item->products->slug}}">
                                                        {{$item->products->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{$item->products->price}} €
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{$item->products->number}} x  {{$item->products->quantity}}{{$item->products->unity}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{$item->pack_number}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-error/60 hover:opacity-100">
                                            <form action="panier/{{$item->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="font-lato-black text-2xl text-error opacity-60 hover:opacity-100">x <span class="sr-only">supprimer de panier</span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            Votre panie est vide :(
        @endif
    </x-slot>
</x-layout>
