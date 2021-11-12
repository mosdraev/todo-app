<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Task List
                </div>
                <div class="px-6 pt-5 pb-6">
                    <ul class="list-inside sm:list-outside md:list-inside lg:list-outside xl:list-inside">
                        @foreach ($task as $item)
                            <li>
                                <a href="/view/{{ $item->id }}">
                                    <div class="m-2">
                                        <div class="border-solid border-2 border-gray-400 lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                            <div class="mb-8">
                                                <div class="text-gray-900 font-bold text-xl mb-2">{{ $item->title }}</div>
                                                <p class="text-gray-700 text-base">{{ $item->description }}</p>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="text-sm">
                                                    <p class="text-gray-900 leading-none">{{ $item->users->name }}</p>
                                                    <p class="text-gray-600">Created: {{ $item->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
