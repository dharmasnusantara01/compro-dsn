<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;

class PortfolioController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::active()->paginate(9);
        $categories = CaseStudy::where('is_active', true)->whereNull('deleted_at')->distinct()->orderBy('category')->pluck('category');

        return view('pages.portfolio.index', compact('caseStudies', 'categories'));
    }

    public function show(string $slug)
    {
        $caseStudy = CaseStudy::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $related = CaseStudy::active()->where('id', '!=', $caseStudy->id)->limit(3)->get();

        return view('pages.portfolio.show', compact('caseStudy', 'related'));
    }
}
