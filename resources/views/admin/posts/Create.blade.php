<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciamento de Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full mb-6">
                            <label for="" class="block mb-2">Title</label>
                            <input type="text" name="title" class="w-full rounded">
                        </div>
                        <div class="w-full mb-6">
                            <label for="" class="block mb-2">Descrição</label>
                            <input type="text" name="description" class="w-full rounded">
                        </div>
                        <div class="w-full mb-6">
                            <label for="" class="block mb-2">Conteúdo</label>
                            <input type="text" name="body" class="w-full rounded">
                        </div>
                        <div class="w-full mb-6">
                            <label for="" class="block mb-2">Status</label>
                            <input type="radio" name="is_active" value="1" checked>Activo
                            <input type="radio" name="is_active" value="0">Inactivo
                        </div>
                        <div class="w-full mb-6 ">
                            <label for="" class="block mb-2">Capa postagem</label>
                            <input type="file" name="thumb" id="">
                        </div>
                        <div class="w-full mb-6">
                                <button class="px-4 py-2 shadow rounded
                                transition ease-in-ou duration-300 text-white text-white text-bold bg-green-700 hover:bg-blue-900">
                                    Cadastra post
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
