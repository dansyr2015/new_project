<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\App;
use App\Http\Requests\OfferRequest;


class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function getoffers()
    {
        $lang = app()->getLocale();

        return Offer::select('id','price','details_'.$lang.' as details ','name_'.$lang.' as name ')->get();
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

    
    public function getAllOffers()
    {
        $lang = app()->getLocale();
        $Offers=Offer::select('id','price','details_'.$lang.' as details','name_'.$lang.' as name')->get();
        //return $Offers;
        return view('offers.all',compact('Offers'));
    }

    public function store(OfferRequest $req)
    {
/*
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
*/
        Offer::create([
            'name_ar'=>$req->name_ar,
            'name_en'=>$req->name_en,
            'price'=>$req->price,
            'details_ar'=>$req->details_ar,
            'details_en'=>$req->details_en
         ]);

         //return 'saved done'; success
         return redirect()->back()->with(['success'=>'تمت الاضافة بنجاح']);
    }
/*
    protected function getErrors(){
        return [
            'name.required'=>__('msgs.offer_name_req'),
            'name.max'=>'طول الاسم يجب ان يكون اقل من 20 حرف',
        ];
    }
*/
    public function __construct()
    {

    }

    



    
}
