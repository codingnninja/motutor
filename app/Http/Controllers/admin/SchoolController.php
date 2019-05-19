<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Motutor\Repo\School\SchoolInterface;
use Motutor\Repo\Status\StatusInterface;
use Motutor\Service\Form\School\SchoolForm;
use App\Http\Controllers\Controller;
use App\Models\School;

class SchoolController extends Controller
{
	protected $layout = 'layout';

	protected $school,
			  $status,
			  $schoolForm,
			  $request,
			  $schoolModel,
			  $validatedData;

	public function __construct(SchoolInterface $school, Request $request, StatusInterface $status, SchoolForm $schoolForm, School $schoolModel)
    {
        $this->school = $school;
        $this->status = $status;
        $this->schoolModel = $schoolModel;
        $this->schoolForm = $schoolForm;
        $this->request = $request->all();
    }

    public function index()
    {
        return view('pages.core.admin.dashboard');
    }

    /**
     * Redirect admin to school website components
     * @param string url
     * @return redirect to url
    */

    public function getPage($url)
    {
        return view('pages.core.admin.website.'.$url, ['url' => $url]);
    }
    /**
     * Show single school. We only want to show edit form
     * @param  int $id school ID
     * @return Redirect
     */
    public function show($id)
    {
        return redirect('/admin/school/'.$id.'/edit');
    }

    /**
     * Create school form
     * GET /admin/school/create
     */
    public function create()
    {
        $statuses = $this->status->all();
        return view('pages.core.admin.components.create_school', [
            'statuses' => $statuses,
        ]);
    }

    /**
     * Get schools 
     * GET /admin/school
     */
    public function byPage()
    {
        $page = 1;
        $perPage = 100;
        $schools = $this->school->byPage($page, $perPage, true);
        return view('pages.core.admin.components.school', [
            'schools' => $schools->items
        ]);
    }

    /**
     * Create school form
     * GET /admin/school/{id}/edit
     */
    public function edit($id)
    {
        $school = $this->school->byId($id);
        $statuses = $this->status->all();

        $tags = '';
        $school->tags->each(function($tag) use(&$tags)
        {
            $tags .= $tag->tag.', ';
        });

        $tags = substr($tags, 0, -2);
        return view('pages.core.admin.components.edit_school', [
            'school' => $school,
            'tags' => $tags,
            'statuses' => $statuses,
        ]);
    }

    public function store()
    {
        $school = $this->schoolForm->save($this->request);
        return view('pages.core.admin.dashboard', ['school' => $school]);
        if($school === null)
        { 
            return redirect('/');
        }
    }
       
    public function update()
    {
        $result = $this->schoolForm->update($this->request);
        return view('pages.core.admin.components.create_school', ['result' => $result]);
    }

   public function delete($school_id)
    {
        $this->schoolModel
             ->find($school_id)
             ->tags()
             ->detach();
        
             $this->schoolModel
             ->destroy($school_id);
        return $this->byPage();
    }

	public function statusTest ($result, $status)
		{
			if( $result ) //$this->schoolform->save( $input ) 
	        {
            	return request()->wantsJson()
			    ? response()->json($result, $status)
			    : null;

	            // Success!
	            /*return Redirect::to('/admin/school')
	                    ->with('status', 'success');*/
	        } else {

	        	return Redirect::to('/');

	           /* return Redirect::to('/admin/school/create')
	                    ->withInput()
	                    ->withErrors( $this->articleform->errors() )
	                    ->with('status', 'error');*/
	        }
				
		}
}