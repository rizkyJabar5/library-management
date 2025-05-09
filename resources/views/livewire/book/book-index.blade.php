<section class="px-4 py-6">
    <!-- Judul -->
    <h2 class="text-3xl font-bold mb-6 text-center">BOOKS</h2>

    <!-- Tombol & Search Input -->
    <div class="flex justify-center items-center gap-4 mb-8 flex-wrap">
        <button class="bg-blue-600 text-white px-6 py-3 w-60 rounded hover:bg-blue-700 transition">
            Tambah Buku
        </button>
        <input
            type="text"
            placeholder="Search"
            class="border border-gray-300 rounded px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
    </div>

    <!-- Grid Buku (tetap seperti sebelumnya) -->
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach (range(1, 6) as $index)
                <div class="w-full max-w-xs mx-auto bg-white border rounded shadow p-4 flex flex-col justify-between">
                    <div class="h-32 bg-gray-200 rounded mb-4 flex items-center justify-center font-semibold">
                        Buku {{ $index }}
                    </div>
                    <div class="flex flex-row justify-center gap-2">
                        <button class="bg-green-500 text-white px-4 py-2 rounded text-sm">Pinjam</button>
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded text-sm">Edit</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
