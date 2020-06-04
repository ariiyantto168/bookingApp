<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Internals;
use Illuminate\Http\Request;

class InternalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index()
    {
        $contents = [
            'internals' => Internals::all(),
        ];

        $pagecontent = view('internals.index', $contents);

        // masterpage
        $pagemain = array(
            'title' => 'Internal',
            'menu' => 'master',
            'submenu' => 'internals',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
      $pagecontent = view('internals.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'internals',
          'menu' => 'internals',
          'submenu' => 'internals',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {


        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveInternals = new Internals;
        $saveInternals->name = $request->name;
        $saveInternals->active = $active;
        // return $saveInternals;
        $saveInternals->save();
        return redirect('internals')->with('status_success','Created Internals');
    }

}
