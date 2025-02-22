<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataset;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $validated = $request->validate([
            "keyword" => "required",
        ]);

        $keyword = $request->keyword;
        // echo $keyword;
        // return;
        $datasets = Dataset::where("title", "LIKE", "%" . $keyword . "%")
            ->orWhere("description", "LIKE", "%" . $keyword . "%")
            ->with("files")
            ->with("organization")
            ->get();

        return view("searchResults", [
            "datasets" => $datasets,
            "keyword" => $keyword,
        ]);
        return view("searchResults");
    }
}
