<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Externals;
use Illuminate\Http\Request;

class ExternalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index()
    {
        $contents = [
            'externals' => Externals::all(),
        ];

        $pagecontent = view('externals.index', $contents);

        // masterpage
        $pagemain = array(
            'title' => 'Fasilitas External',
            'menu' => 'master',
            'submenu' => 'externs',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
      $pagecontent = view('externals.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Fasilitas Externals',
          'menu' => 'externs',
          'submenu' => 'externs',
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

        $saveExterns = new Externals;
        $saveExterns->name = $request->name;
        $saveExterns->active = $active;
        // return $saveInternals;
        $saveExterns->save();
        return redirect('externals')->with('status_success','Created Externals');
    }
}
