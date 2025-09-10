<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('notes.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-3 inline-block">
                Tambah Note
            </a>


            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow sm:rounded-lg p-4">
                <ul>
                    @forelse($notes as $note)
                        <li class="border-b py-2 flex justify-between">
                            <div>
                                <strong>{{ $note->title }}</strong><br>
                                <small>{{ $note->content }}</small>
                            </div>
                            <div>
                                <a href="{{ route('notes.edit', $note) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>

                                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                                
                                </form>
                            </div>
                        </li>
                    @empty
                        <li>Tidak ada catatan.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
