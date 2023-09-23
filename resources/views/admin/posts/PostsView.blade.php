<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciamento de Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-end mb-10">
                <a href="{{route('admin.post.create')}}"
                                class="px-4 py-2 shadow rounded
                                transition ease-in-ou duration-300 text-white text-white text-bold bg-green-700 hover:bg-blue-900">Novo Post</a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
            <table class="w-full bg-white rounded">
                <thead>
                    <tr>
                        <th class="px-2 py-4 text-left">#</th>
                        <th class="px-2 py-4 text-left">Title</th>
                        <th class="px-2 py-4 text-left">Estado</th>
                        <th class="px-2 py-4 text-left">Criado</th>
                        <th class="px-2 py-4 text-left">Acção</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td class="px-2 py-4 text-left">{{$post->id}}</td>
                            <td class="px-2 py-4 text-left">{{$post->title}}</td>
                            <td class="px-2 py-4 text-left">{{$post->created_at->format('d-m-Y H:i:s')}}</td>
                            <td>
                                <span>{{$post->is_active == 0 ? 'Inativo' : 'Activo'}}</span>
                            </td>
                            <td class="px-2 py-4 text-left flex gap-2">
                                <a href="{{route('admin.post.edite',$post)}}"
                                    class="px-4 py-2 shadow rounded
                                    transition ease-in-ou duration-300 text-white text-white text-bold bg-blue-700 hover:bg-blue-900">Editar</a>
                                        <form action="{{route('admin.post.delete',['post'=>$post->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button  class="px-4 py-2 shadow rounded
                                            transition ease-in-ou duration-300 text-white text-white text-bold bg-red-700 hover:bg-blue-900">
                                                Eliminar
                                            </button>
                                        </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
                </div>
                {{$posts->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
