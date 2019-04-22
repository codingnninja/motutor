<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ParentController extends Controller
{
    protected $parent,
			  $request;

	public function __construct(User $parent, Request $request)
    {
        $this->parent = $parent;
        $this->request = $request->all();
    }

       /**
     * Get students
     * GET /admin/students
     */
    public function byPage()
    {
        $parent = $this->parent->where('type', 'parent')->paginate(20);
        return view('pages.core.admin.components.list', [
            'students' => $parent,
        ]);
    }
}
