<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Database\Eloquent\Collection;
use Motutor\Repo\School\SchoolInterface;

class HomeController extends Controller
{
     protected $school;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolInterface $school)
    {
        $this->middleware('auth');
        $this->school = $school;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    /**
     * List school
     * GET /admin/school
     */
    
        $page = Paginator::resolveCurrentPage();
        //$col = new Collection($users);
        // Candidate for config item
        $perPage = 6;
       // $currentPageSearchResults = $col->slice(($page -1) * $perPage, $perPage )->all();
        //$entries = new Paginator($currentPageSearchResults, count($col), $perPage);

        $pagiData = $this->school->byPage($page, $perPage, true);
        $schools = new Paginator($pagiData->items, $pagiData->totalItems, $perPage);
        //var_dump($schools);
        return view('pages.core.landingpage', ['items' => $schools]);

    }

    public function byPage ()
    {
        $page = Paginator::resolveCurrentPage();
        $perPage = 50;
        $pagiData = $this->school->byPage($page, $perPage, true);
        $schools = new Paginator($pagiData->items, $pagiData->totalItems, $perPage);
        return view('pages.core.schools', ['items'=>$schools]);

    }

    public function byTag ($tag)
    {
        $perPage = 50;
        $pagiData = $this->school
                         ->byTag($tag);
        $schools = new Paginator(
            $pagiData->items, 
            $pagiData->totalItems, 
            $perPage
        );
        return view(
            'pages.core.schools', ['items' => $schools]
        );
    }

    public function bySlug ($slug)
    {
        $school = $this->school->bySlug($slug);

        $school->media = $this->school
                              ->convertStringToArray(',',$school->media);        
        return view('pages.core.school', ['school'=>$school]);
    }

    public function search (Request $request)
    {
        $query = $request->searchQuery;
        $result = \Searchy::driver('fuzzy')
                        ->schools('title', 'address')
                        ->query($query)
                        ->getQuery()->limit(20)
                        ->get();
        return view('pages.core.schools', ['items'=>$result ]);
    }

    public function searchAllItems($items){
        $allSearches = $this->search($items);
        return view("pages.landingpage", ['items' => $allSearches]);
    }
}


