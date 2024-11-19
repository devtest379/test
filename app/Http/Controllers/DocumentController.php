<?php
namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
   
    public function create()
    {
        return view('document.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:jpg,png,pdf|max:10240', 
        ]);

        $document = $request->file('document');
        $documentPath = $document->store('documents', 'public');
      
        $user = auth()->user();
        $user->document()->create([
            'document_url' => $documentPath,
            'verification_requested' => true, 
        ]);

        return back()->with('success', 'Your document has been uploaded and is pending verification.');
    }
}