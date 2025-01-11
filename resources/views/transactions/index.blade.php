<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold text-indigo-600">Daftar Transaksi</h1>
                <a href="{{ route('transactions.create') }}" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out">+ Tambah Transaksi</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded-lg mb-4">
                    {{ session('success') }}
                    <button type="button" class="text-green-700 ml-2" data-bs-dismiss="alert" aria-label="Close">×</button>
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
                <div class="bg-indigo-600 text-white px-6 py-4">
                    <strong>Daftar Semua Transaksi</strong>
                </div>
                <div class="px-6 py-4">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-indigo-100 text-indigo-800">
                            <tr>
                                <th class="px-4 py-2 text-left font-medium">ID</th>
                                <th class="px-4 py-2 text-left font-medium">Kode</th>
                                <th class="px-4 py-2 text-left font-medium">Tanggal</th>
                                <th class="px-4 py-2 text-left font-medium">Total</th>
                                <th class="px-4 py-2 text-left font-medium">Produk</th>
                                <th class="px-4 py-2 text-left font-medium">Tanggal Dibuat</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($transactions as $transaction)
                                <tr class="hover:bg-gray-100 transition duration-200 ease-in-out">
                                    <td class="px-4 py-2">{{ $transaction->id }}</td>
                                    <td class="px-4 py-2">{{ $transaction->code }}</td>
                                    <td class="px-4 py-2">{{ $transaction->date->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2 text-right text-green-600">Rp {{ number_format($transaction->total, 2) }}</td>
                                    <td class="px-4 py-2">{{ $transaction->product->name }}</td>
                                    <td class="px-4 py-2">{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($transactions->isEmpty())
                        <div class="text-center text-gray-500 py-6">
                            <em>Belum ada transaksi yang tercatat.</em>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
