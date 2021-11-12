<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full max-w-lg" method="POST" action="/store">

                        {{-- CSRF token is required in all forms --}}
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="title" type="text" placeholder="Title here" name="title">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <textarea
                                class="form-textarea mt-1 block w-full"
                                rows="3"
                                placeholder="Enter some long form content."
                                name="description"
                            ></textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold pt-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="create-task" type="submit">
                                Create
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold pt-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
