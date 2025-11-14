@extends('layouts.admin')

@section('title', 'Transactions')

@section('content')
<section class="p-6 space-y-8">

    <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            Welcome to your <span class="text-indigo-600">Transactions</span>
        </h2>
        <p class="text-gray-600 max-w-2xl">
            Manage all payments, view transaction history, and track payment statuses.
        </p>
    </div>

    <!-- Render the Livewire component -->
    <livewire:admin.transactions />

</section>
@endsection
