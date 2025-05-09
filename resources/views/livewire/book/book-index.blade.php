<div class="p-6">
    <section class="px-4 py-6">
        
        <!-- Judul -->
        <h2 class="text-3xl font-bold mb-6 text-center">BOOKS</h2>
        
        <!-- flash message addbook -->     
        @if (session()->has('message'))
            <div class="mt-4 text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <!-- Tombol & Search Input -->
        <div class="flex justify-center items-center gap-4 mb-8 flex-wrap">
            <button wire:click="addBook" class="bg-blue-600 text-white px-6 py-3 w-60 rounded hover:bg-blue-700 transition">
                Tambah Buku
            </button>
            <input
                type="text"
                placeholder="Search"
                class="border border-gray-300 rounded px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
        </div>

        <!-- flip buku -->
         

        <!-- Ukuran Grid Buku  -->
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach (range(1, 6) as $index)
                        <div class="relative group w-full max-w-xs mx-auto">
                            
                            <!-- Kartu utama -->
                            <div class="bg-white border rounded shadow p-4 z-10 flex flex-col justify-between">
                            <div class="h-32 bg-gray-200 rounded mb-4 flex items-center justify-center font-semibold">
                                Buku {{ $index }}
                            </div>
                            <div class="flex flex-row justify-center gap-2">
                                <button class="bg-green-500 text-white px-4 py-2 rounded text-sm">
                                Pinjam
                                </button>
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded text-sm">
                                Edit
                                </button>
                            </div>
                        </div>

                        <!-- Panel deskripsi kanan (muncul setelah hover 1 detik) -->
                        <div class="absolute top-0 left-full ml-4 w-64 h-full bg-white border rounded shadow px-4 py-3 opacity-0 pointer-events-none
                                    opacity-0 pointer-event-none z-50
                                    group-hover:opacity-100 group-hover:pointer-events-auto
                                    transition-opacity duration-50 delay-50">
                        <h3 class="font-bold text-lg mb-2">Buku {{ $index }}</h3>
                        <p class="text-sm text-gray-600">
                            Ini deskripsi singkat buku ke-{{ $index }} yang akan muncul setelah kursor disentuh selama 1 detik.
                        </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
