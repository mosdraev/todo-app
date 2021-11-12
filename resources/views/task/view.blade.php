<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    View Task
                </div>
                <div class="px-6 pt-5 pb-6">
                    <div class="m-2">
                        <div class="border-solid border-2 border-gray-400 lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <div class="text-gray-900 font-bold text-xl mb-2"><a href="/view/{{ $task->id }}">{{ $task->title }}</a></div>
                                <p class="text-gray-700 text-base">{{ $task->description }}</p>
                            </div>
                            <div class="flex tasks-center">
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">{{ $task->users->name }}</p>
                                    <p class="text-gray-600">Created: {{ $task->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex flex-row-reverse mr-2">
                        <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold pt-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Back
                        </a>
                        <a href="/delete/{{$task->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold mr-3 pt-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="
                            var result = confirm('Are you sure you want to delete this record?');

                            if (result)
                            {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }">
                            Delete
                        </a>

                        <form method="POST" id="delete-form" action="/destroy/{{ $task->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                        </form>

                        <a href="/update/{{ $task->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold mr-3 pt-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Update
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
