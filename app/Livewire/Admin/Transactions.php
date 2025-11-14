<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payment;

class Transactions extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filterStatus = '';
    public $paymentId; // for editing
    public $amount, $down_payment, $payment_method, $status;

    protected $rules = [
        'amount' => 'required|numeric|min:0',
        'down_payment' => 'nullable|numeric|min:0',
        'payment_method' => 'required|string|max:50',
        'status' => 'required|string|max:50',
    ];

    // Reset pagination when search/filter changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    // Sorting
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    // Load a payment for editing
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $this->paymentId = $payment->id;
        $this->amount = $payment->amount;
        $this->down_payment = $payment->down_payment;
        $this->payment_method = $payment->payment_method;
        $this->status = $payment->status;
    }

    // Update payment
    public function update()
    {
        $this->validate();

        $payment = Payment::findOrFail($this->paymentId);
        $payment->update([
            'amount' => $this->amount,
            'down_payment' => $this->down_payment,
            'payment_method' => $this->payment_method,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Payment updated successfully.');
        $this->resetInputFields();
    }

    // Delete payment
    public function delete($id)
    {
        Payment::findOrFail($id)->delete();
        session()->flash('message', 'Payment deleted successfully.');
    }

    public function resetInputFields()
    {
        $this->paymentId = null;
        $this->amount = '';
        $this->down_payment = '';
        $this->payment_method = '';
        $this->status = '';
    }

    public function render()
    {
        $payments = Payment::with(['booking.user', 'booking.car'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->whereHas('booking.user', function ($q2) {
                        $q2->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('transaction_id', 'like', '%' . $this->search . '%')
                    ->orWhere('payment_method', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterStatus, function ($query) {
                $query->where('status', $this->filterStatus);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.transactions', compact('payments'));
    }
}
