<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Afficher la liste des factures
    public function index()
{   
    $invoices = Invoice::all();
    return view('invoices.index' , compact('invoices'));
}

public function create()
{
    return view('invoices.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'client_name' => 'required|max:255',
        'invoice_date' => 'required|date',
        'amount' => 'required|numeric|min:0',
        'status' => 'required|in:unpaid,paid,canceled',
    ]);

    Invoice::create($validated);

    return redirect()->route('invoices.index')->with('success', 'Facture créée avec succès.');
}

public function edit($id)
{
    $invoice = Invoice::findOrFail($id);
    return view('invoices.edit', compact('invoice'));
}

public function update(Request $request, $id)
{
    $invoice = Invoice::findOrFail($id);

    $validated = $request->validate([
        'client_name' => 'required|max:255',
        'invoice_date' => 'required|date',
        'amount' => 'required|numeric|min:0',
        'status' => 'required|in:unpaid,paid,canceled',
    ]);

    $invoice->update($validated);

    return redirect()->route('invoices.index')->with('success', 'Facture mise à jour avec succès.');
}

public function destroy($id)
{
    $invoice = Invoice::findOrFail($id);
    $invoice->delete();

    return redirect()->route('invoices.index')->with('success', 'Facture supprimée avec succès.');
}
}