<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Guideline;
use Illuminate\Http\Request;

class GuidelineController extends Controller
{
    public function view(Request $request, $id)
    {
        $guidelines = Guideline::where('product_id', $id)->get();
        $product_id = $id;

        return view('staff.guideline-manage', compact('guidelines','product_id'));
    }

   
    public function index()
    {
        // Fetch all guidelines, with optional pagination
        $guidelines = Guideline::paginate(10); // Change 10 to the number of items per page
        return view('guidelines.index', compact('guidelines'));
    }

  
    public function create()
    {
        return view('guidelines.create'); // Create a form view
    }

   
    public function store(Request $request)
    {
        // Validate the request 
        $validated = $request->validate([
            'product_id' => 'required|integer', // Ensure product_id is an integer
            'title' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,docx,txt,jpg,png,jpeg|max:2048', // Validate file upload
            
            'remark' => 'nullable|string',
        ]);

        // Handle file upload
        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('guidelines','public'); // Save file to storage/app/guidelines
        }
        
        // Create the guideline
        Guideline::create($validated);

        // Redirect with success message
        return redirect()->back()->with('success', 'Guideline created successfully.');
    }

    public function show(Guideline $guideline)
    {
        return view('guidelines.show', compact('guideline')); // Show a single guideline
    }

    public function edit(Guideline $guideline)
    {
        return view('guidelines.edit', compact('guideline')); // Form for editing
    }

  
    public function update(Request $request, Guideline $guideline)
    {
        // Validate the request
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:pdf,docx,txt|max:2048', // Validate file upload
            'file_type' => 'required|string',
            'remark' => 'nullable|string',
        ]);

        // Handle file upload if a new file is provided
        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('guidelines'); // Save new file
        }

        // Update the guideline
        $guideline->update($validated);

        // Redirect with success message
        return redirect()->route('guidelines.index')->with('success', 'Guideline updated successfully.');
    }

 
    public function destroy(Guideline $guideline)
    {
    
        return redirect()->route('guidelines.index')->with('success', 'Guideline deleted successfully.');
    }

    public function viewGuideline($id)
    {
        $guideline = Guideline::findOrFail($id);

        $path = storage_path('app/public/' . $guideline->file_path); 

        if (!file_exists($path)) {
            abort(404);
        }

        // Determine the content type based on the file extension
        $mimeType = mime_content_type($path);

        return response()->file($path, [
            'Content-Type' => $mimeType, // Use the correct MIME type
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
        ]);
    }
}
