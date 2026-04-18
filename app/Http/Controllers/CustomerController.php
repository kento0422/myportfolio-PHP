<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $customers = Customer::query()
            ->when($q, fn($query) => $query->where('company_name', 'like', "%{$q}%"))
            ->latest()
            ->get();

        return view('customers.index', compact('customers', 'q'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'    => ['required', 'string', 'max:255'],
            'contact_person'  => ['nullable', 'string', 'max:100'],
            'phone'           => ['nullable', 'string', 'max:20'],
            'email'           => ['nullable', 'email', 'max:255'],
            'note'            => ['nullable', 'string'],
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')
            ->with('success', '顧客を登録しました。');
    }

    public function show(Customer $customer)
    {
        $customer->load(['projects']); // 関連の案件を一緒に読み込む
        return view('customers.show', compact('customer'));
    }
}
