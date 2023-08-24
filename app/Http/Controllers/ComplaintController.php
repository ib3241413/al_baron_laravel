<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $complaints = Complaint::all();
        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'type' => 'required|string',
        ]);

        $complaint = new Complaint();
        $complaint->description = $request->input('description');
        $complaint->type = $request->input('type');
        $complaint->Customer_id = Auth::user()->Customer_id;
        $complaint->save();

        return redirect()->route('complaints.index');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('complaints.show', compact('complaint'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
            'type' => 'required|string',
        ]);

       
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        return redirect()->route('complaints.index');
    }
}
