<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function __invoke()
    {
        $services = Service::active()->limit(6)->get();
        $caseStudies = CaseStudy::featured()->limit(3)->get();
        $testimonials = Testimonial::featured()->limit(6)->get();
        $partners = Partner::active()->get();

        return view('pages.home', compact('services', 'caseStudies', 'testimonials', 'partners'));
    }
}
