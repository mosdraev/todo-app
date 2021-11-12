<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Task') }}
        </h2>
    </x-slot>

    <div class="flex justify-center mt-5">
        <form class="w-full max-w-lg" method="POST" action="/modify">

            {{-- CSRF token is required in all forms --}}
            @csrf

            <input type="hidden" value="{{ $task->id }}" name="id">

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white">
                    <div class="grid">
                        <div class="">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" autocomplete="given-name"
                                value="{{ $task->title }}"
                                placeholder="Title here.."
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="pt-3">
                            <label for="postal-code" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea
                                class="form-textarea mt-1 block w-full border-gray-300 rounded-md"
                                rows="3"
                                placeholder="Enter description.."
                                name="description"
                            >{{ $task->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="px-4 pb-5 bg-gray-50 text-right sm:px-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="update-task" type="submit">
                        Update
                    </button>
                    <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
