<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Motutor\Repo\Status\StatusInterface;
use Motutor\Service\Form\School\SchoolForm;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;

class AdminController extends Controller
{

	protected $admin,
			  $request;

	public function __construct(User $admin, Request $request)
    {
        $this->admin = $admin;
        $this->request = $request->all();
    }

    public function index()
    {
        return view('pages.core.admin.dashboard');
    }
}
