<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Guideline;
use Illuminate\Http\Request;

class GuidelineController extends Controller
{
    public function view(Request $request, $id)
    {
        $guidelines = Guideline::where('product_id', $id);

        return view('staff.guideline-manage', compact('guidelines'));
    }


}
