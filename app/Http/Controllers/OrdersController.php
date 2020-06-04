<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Orders;
use App\Models\Internals;
use App\Models\Externals;


use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $externals = Externals::all();
        $internals = Internals::all();
        $contents = [
            'externals' => $externals,
            'internals' => $internals,
            'orders' => Orders::with(['internals','externals'])->get(),
        ];

        // return $contents;

        $pagecontent = view('orders.index',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Orders',
            'menu' => 'orders',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $internals = Internals::all();
        $externals = Externals::all();
        $contents = [
            'externals' => $externals,
            'internals' => $internals,
             'orders' => Orders::all(),
          ];
        // return $contents;

        $pagecontent = view('orders.create',$contents);
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Orders',
          'menu' => 'orders',
          'submenu' => '',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {

        // return $request->all();
        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveOrders = new Orders;
        $saveOrders->name = $request->name;
        $saveOrders->active = $active;
        // return $saveOrders;
        $saveOrders->save();

        $saveOrders->externals()->attach($request->externals,[
            'created_at' => date('Y-m-d H:i:s')
            ]);
        
        $saveOrders->internals()->attach($request->internals,[
                                'created_at' => date('Y-m-d H:i:s')
                                ]);

            // return $saveOrders;
        return redirect('orders')->with('status_success','Created Orders');
    }

    public function update_page(Orders $orders)
    {
        $internals = Internals::all();
        $orders = Orders::with(['internals'])
                ->where('idorders',$orders->idorders)
                ->first();


        $data_internals = [];
        foreach($orders->internals as $internal){
            $data_internals[] = $internal->idinternals;
        }

        // return $internal;

        $contents = [
            'data_internals' => $data_internals,
            'internals' => $internals,
            'orders' => $orders,
        ];

        $pagecontent = view('orders.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'update orders',
            'menu' => 'orders',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Orders $orders){

        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveOrders = Orders::find($orders->idorders);
        $saveOrders->name = $request->name;
        $saveOrders->active = $active;
        // return $saveOrders;
        $saveOrders->save();
        $saveOrders->internals()->sync($request->internals);

        return redirect('orders')->with('status_success','Created Orders');

    }

}
