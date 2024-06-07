<?php

namespace App\Http\Controllers;

use App\Mail\PlanPaidInvoice;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Planbooking;
use App\Mail\SentInvoiceToPay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function createInvoice(Request $request, $id)
    {
        $planbooking = Planbooking::findOrFail($id);

        $validateData = $request->validate([
            'totalPrice' => 'required',
        ]);
        $validateData['booking_status'] = 'PAID';

        $planbooking->update($validateData);

        $user_id = $planbooking->user->id;
        $invoice = Invoice::create([
            'user_id' => $user_id,
            'planbooking_id' => $id,
            'invoice_number' => uniqid('INV-'),
            'invoice_date' => now(),
            'amount' => $request->totalPrice,
        ]);

        // Send the email
        Mail::to($planbooking->user->email)->send(new SentInvoiceToPay($invoice, $planbooking));

        return redirect()->route('planBooking')->with('success', 'Successfully Sent');
    }

    public function showInvoice(){
        $user=Auth::user();
        $invoices = Invoice::all();
        return view('Admin.Invoice.View-Invoice', compact('invoices','user'));
    }

    public function markAsPaid($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update(['status' => 'paid']);

        $planbooking = Planbooking::findOrFail($invoice->planbooking_id);

        // Send the email
        Mail::to($planbooking->user->email)->send(new PlanPaidInvoice($invoice, $planbooking));

        return redirect()->back()->with('success', 'Invoice marked as paid and email sent.');
    }
}
