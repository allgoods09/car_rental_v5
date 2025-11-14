<div>
    <!-- Flash message -->
    @if (session()->has('message'))
        <div class="p-3 bg-green-100 text-green-700 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Search & Filter -->
    <div class="flex justify-between items-center mb-4 space-x-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Search by customer, transaction ID, or method..." class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:ring focus:ring-indigo-200 flex-1" />
        
        <select wire:model="filterStatus" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:ring focus:ring-indigo-200">
            <option value="">All Status</option>
            <option value="pending">Pending</option>
            <option value="partial">Partial</option>
            <option value="succeeded">Succeeded</option>
            <option value="cancelled">Cancelled</option>
            <option value="refunded">Refunded</option>
            <option value="fully paid">Fully Paid</option>
        </select>
    </div>

    <!-- Transactions Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('booking.user.name')">Customer</th>
                    <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('booking.car.make')">Car</th>
                    <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('amount')">Amount</th>
                    <th class="px-4 py-3">Down Payment</th>
                    <th class="px-4 py-3">Payment Method</th>
                    <th class="px-4 py-3">Transaction ID</th>
                    <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('status')">Status</th>
                    <th class="px-4 py-3 cursor-pointer" wire:click="sortBy('created_at')">Date</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $payment->booking->user?->name ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $payment->booking->car?->make ?? 'N/A' }} {{ $payment->booking->car?->model ?? '' }}</td>
                        <td class="px-4 py-3 font-semibold text-indigo-600">₱{{ number_format($payment->amount, 2) }}</td>
                        <td class="px-4 py-3">₱{{ number_format($payment->down_payment, 2) }}</td>
                        <td class="px-4 py-3">{{ $payment->payment_method ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $payment->transaction_id ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ [
                                    'partial' => 'bg-yellow-100 text-yellow-700',
                                    'pending' => 'bg-blue-100 text-blue-700',
                                    'succeeded' => 'bg-green-100 text-green-700',
                                    'cancelled' => 'bg-red-100 text-red-700',
                                    'refunded' => 'bg-purple-100 text-purple-700',
                                    'fully paid' => 'bg-emerald-100 text-emerald-700'
                                ][$payment->status] ?? 'bg-gray-100' }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $payment->created_at->format('M d, Y h:i A') }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <button wire:click="edit({{ $payment->id }})" class="text-blue-600">Edit</button>
                            <button wire:click="delete({{ $payment->id }})" class="text-red-600">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-gray-500 py-6">No transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $payments->links() }}
    </div>

    <!-- Edit Modal -->
    @if ($paymentId)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-xl w-96">
            <h3 class="text-lg font-semibold mb-4">Edit Payment</h3>

            <div class="space-y-3">
                <input type="number" wire:model="amount" placeholder="Amount" class="border rounded px-3 py-1 w-full" />
                @error('amount') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror

                <input type="number" wire:model="down_payment" placeholder="Down Payment" class="border rounded px-3 py-1 w-full" />
                @error('down_payment') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror

                <input type="text" wire:model="payment_method" placeholder="Payment Method" class="border rounded px-3 py-1 w-full" />
                @error('payment_method') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror

                <select wire:model="status" class="border rounded px-3 py-1 w-full">
                    <option value="">Select Status</option>
                    <option value="pending">Pending</option>
                    <option value="partial">Partial</option>
                    <option value="succeeded">Succeeded</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="refunded">Refunded</option>
                    <option value="fully paid">Fully Paid</option>
                </select>
                @error('status') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end mt-4 space-x-2">
                <button wire:click="resetInputFields" class="px-3 py-1 border rounded">Cancel</button>
                <button wire:click="update" class="px-3 py-1 bg-indigo-600 text-white rounded">Save</button>
            </div>
        </div>
    </div>
    @endif
</div>
