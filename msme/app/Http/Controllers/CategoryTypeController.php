<?php

namespace App\Http\Controllers;

use App\Categorytype;
use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{

    public function getCategories(Request $request)
    {

        $parent_id = $request->cat_id;

        $subcategories = Categorytype::where('id',$parent_id)
            ->with('subcategories')
            ->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
}
