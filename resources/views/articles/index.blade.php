<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ strtoupper(Auth::user()->tenant->name) }}
            <a href="{{ route('articles.create') }}" class="btn btn-sm btn-primary">New Article</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">body</th>
                                    <th scope="col">Team</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $article)
                                    <tr>
                                        <th scope="row">{{ $article->id }}</th>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->body }}</td>
                                        <td>{{ $article->tenant?->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No articles found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>