<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function getoffers()
    {
        return Offer::select('id','name')->get();
    }

    /*
    public function store()
    {
         Offer::create([
            'name'=>'dw',
            'price'=>'234',
            'details'=>'test detials'
         ]);
    }
*/
    public function create()
    {
         return view('offers.create');
    }


    public function store(Request $req)
    {

       
        

      

        $rules=[
            'name'=>'required|max:20',
            'price'=>'required',
            'details'=>'required'
        ];

        $errors= $this->getErrors();


        $valid=validator::make($req->all(),$rules, $errors);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInputs($req->all());


        }

        Offer::create([
            'name'=>$req->name,
            'price'=>$req->price,
            'details'=>$req->details
         ]);

         //return 'saved done'; success
         return redirect()->back()->with(['success'=>'تمت الاضافة بنجاح']);
    }

    protected function getErrors(){
        return [
            'name.required'=>__('msgs.offer_name_req'),
            'name.max'=>'طول الاسم يجب ان يكون اقل من 20 حرف',
        ];
    }

    public function __construct()
    {

    }

    



    
}
