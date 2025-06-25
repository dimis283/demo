
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Επεξεργασία Κειμένου') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('texts.update', $text) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Τίτλος')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" 
                                         :value="old('title', $text->title)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" 
                                         :value="old('slug', $text->slug)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="text" :value="__('Περιεχόμενο')" />
                               <input id="text" type="hidden" name="text" value="{{ old('text', $text->text) }}">
    <trix-editor input="text"></trix-editor>
                            <x-input-error class="mt-2" :messages="$errors->get('text')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Αποθήκευση') }}
                            </x-primary-button>

                            <a href="{{ route('texts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Ακύρωση') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>