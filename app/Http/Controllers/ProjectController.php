<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $status = $request->input('status');

        $projects = Project::query()
            ->with('customer') // 一覧で顧客名も出したいので
            ->when($q, fn($query) => $query->where('name', 'like', "%{$q}%"))
            ->when($status, fn($query) => $query->where('status', $status))
            ->latest()
            ->get();

        $statuses = ['見込み', '提案中', '進行中', '受注', '失注', '完了'];

        return view('projects.index', compact('projects', 'q', 'status', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $customer = null;

        if ($request->has('customer_id')) {
            $customer = Customer::findOrFail($request->customer_id);
        }

        return view('projects.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'name'        => ['required', 'string', 'max:255'],
            'status'      => ['required', 'string', 'max:255'],
            'amount'      => ['nullable', 'integer'],
            'due_date'    => ['nullable', 'date'],
            'note'        => ['nullable', 'string'],
        ]);

        $project = Project::create($validated);

        return redirect()->route('customers.show', $project->customer_id)
            ->with('success', '案件を登録しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
