<x-layout>
    <x-slot name="title">
        Contactez-nous
    </x-slot>
    <x-slot name="content">
        <div class="my-10 px-5 pt-10 pb-14 rounded-lg mx-auto">
            <x-title class="relative max-w-max mx-auto">
                <svg
                    class="w-[60px] xs:w-[110px] -z-1 opacity-30 absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2">
                    <use xlink:href="#contact_title"></use>
                </svg>
                Contactez-nous
            </x-title>
            {{-- Infos --}}
            <div class="sm:grid sm:mt-20 sm:items-start sm:grid-cols-5 gap-5 sm:max-w-7xl sm:mx-auto">
                <div
                    class="col-span-2 relative overflow-hidden rounded-md p-2 flex flex-col justify-between items-center py-10 my-10 sm:my-0">
                    <ul class="px-5 grid gap-2">
                        <li class="flex items-center gap-3">
                            <svg class="icon w-[20px] h-auto aspect-square">
                                <use xlink:href="#contact_facebook"></use>
                            </svg>
                            <a href="https://www.facebook.com/topsodamarket/" target="_blank" rel="noopener" class="link-underline">@topsodamarket</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="icon w-[20px] h-auto aspect-square ">
                                <use xlink:href="#contact_wp"></use>
                            </svg>
                            <a href="https://wa.me/324194122195" target="_blank" class="link-underline" rel="noopener">wa.me/324194122195</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="icon w-[20px] h-auto aspect-square">
                                <use xlink:href="#contact_mail"></use>
                            </svg>
                            <a href="mailto:tayfun.akdede@hotmail.com" class="link-underline">mail(at)hotmail.com</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="icon w-[20px] h-auto aspect-square">
                                <use xlink:href="#contact_phone"></use>
                            </svg>
                            <a href="tel:0032494122195" class="link-underline">+32 (0) 494 122 195</a>
                        </li>
                    </ul>
                    <div
                        class="absolute bottom-0 left-0 right-0 -z-1 bg-primary-regular opacity-60 w-full h-full rounded-md overflow-hidden">
                        <svg class="icon w-full h-full">
                            <use xlink:href="#wave"></use>
                        </svg>
                    </div>
                </div>

                <form class="col-span-3 flex flex-col gap-y-6 sm:grid" action="/contact" method="POST">
                    @if(session()->has('message'))
                        <div class="col-span-full bg-green-200 py-2 text-center rounded font-lato-bold mb-6">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                    @csrf

                    <x-form.input label="Nom & Prénom" name="full_name" type="text" placeholder="Jane Doe"
                                  class="col-span-full"/>
                    <x-form.input label="Adresse email" name="email" type="mail" placeholder="Jane Doe"
                                  class="col-span-full"/>
                    <x-form.input label="Sujet" name="subject" type="text" placeholder="Jane Doe"
                                  class="col-span-full"/>

                    <div class="flex flex-col text-left">
                        <label
                            class="ml-2 bg-white px-2 -mb-2 z-1 text-sm uppercase max-w-max @error('text') text-error @enderror text-black"
                            for="text">Message</label>
                        <textarea
                            class="border border-black @error('text') border-red-400 @enderror px-4 py-2 bg-white focus:border-primary-dark border rounded-md outline-none"
                            name="text"
                            id="text" cols="30" rows="10" placeholder="Message ici..."></textarea>
                        <x-form.error-message field="text"/>
                    </div>
                    {{--Bouton d'envoie--}}
                    <x-form.button class="col-span-full">Envoyer</x-form.button>

                </form>
            </div>
        </div>
    </x-slot>
</x-layout>
