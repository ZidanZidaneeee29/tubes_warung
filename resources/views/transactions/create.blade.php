<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-indigo-600">Tambah Transaksi Baru</h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
            <div class="bg-indigo-600 text-white px-6 py-4">
                <strong>Form Tambah Transaksi</strong>
            </div>
            <div class="px-6 py-4">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="code" class="block text-sm font-medium text-gray-700">Kode Transaksi</label>
                        <input type="text" id="code" name="code" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="date" name="date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
                        <input type="number" id="total" name="total" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="produk_id" class="block text-sm font-medium text-gray-700">Produk</label>
                        <select id="produk_id" name="produk_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="" selected disabled>Pilih Produk</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400">Simpan</button>
                        <a href="{{ route('transactions.index') }}" class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-400">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
