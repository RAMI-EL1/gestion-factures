@extends('layout')


@section('content')
    <h1>Créer une nouvelle facture</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="client_name" class="form-label">Nom du client</label>
            <input type="text" class="form-control" id="client_name" name="client_name" required>
        </div>
        <div class="mb-3">
            <label for="invoice_date" class="form-label">Date de la facture</label>
            <input type="date" class="form-control" id="invoice_date" name="invoice_date" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Montant</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select class="form-select" id="status" name="status" required>
                <option value="unpaid">Non payé</option>
                <option value="paid">Payé</option>
                <option value="canceled">Annulé</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
