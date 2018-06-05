<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Shop;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * by renken and thehahppybit
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $products = Product::where('deleted',0)->get();
        $categories = Category::all();
        $p = $req->has('page') ? $req->all()['page']  : null;
        $p = $p ?: (Paginator::resolveCurrentPage() ?: 1);
        //$results clearly is instanceof Collection but this will  make it work regardless of the given data.
        $results = $products instanceof Collection ? $products : Collection::make($products);
        $products  = new LengthAwarePaginator($results->forPage($p,15), $results->count(), 15, $p);
        $productsfeactured = array('');
        if (count($results)>9) {
            $productsfeactured  = $results->random(9);
        }
        
        $lastPage = $products->lastPage();
        $currentPage = $products->currentPage();

        //get slides
        $shop = Shop::find(1);
        $slides = \Storage::allFiles(str_replace('storage', 'public', $shop->slides));
        //dd($slides);
        //$slides = implode(" ",str_replace('public', '/storage', $slides ));
        for ($i=0; $i <count($slides) ; $i++) {
            $slides[$i] = str_replace('public', '/storage', $slides[$i] );
        }
    

        return view('homev2',compact("shop","slides","products","productsfeactured","categories","lastPage","currentPage"));
    }
    /**
    * Show the edit page
    *
    * @return view of auth/edit.blade.php
     */
    public function edit()
    {
        //informations needed in the appv2
        $shop=\App\Shop::find(1);
        $categories = Category::all();
        
        return view('auth.edit',compact('shop','user','categories'));
    }

    /**
    * Apply changes to the user
    * @param Request $req
    * @return  view of auth/edit.blade.php
    * by renken
     */
    public function update(Request $req) {
        $user = \Auth::user();

        $validator =  \Validator::make($req->all(), [
            'firstName' => 'required|string|max:30|alpha',
            'lastName' => 'required|string|max:30|alpha',
            'phoneNum' => 'required|string|max:15',
            'adr' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $emailCheck = ($req->input('email') != '') && ($req->input('email') != $user->email);
        if ($emailCheck) {
                $rules = [
                'email' => 'email|max:255|unique:users',
            ];
             $validator = \Validator::make($req->all(), $rules);
        }

        //dd($req->hasFile('avatar'));
        if ($req->hasFile('avatar')) {
                $rules = [
                'avatar' => 'required|image|mimes:jpeg,jpg,bmp,png',
                ];
                 $validator = \Validator::make($req->all(), $rules);
        }

        //validating

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // saving input
        if($emailCheck) {
            $user->email = $req->all()['email'];
        }

        if($req->hasFile('avatar')) {
            \Storage::delete($user->avatar);
            $dirname = 'images/' . 'users';
            \Storage::putFileAs(
                'public/' . $dirname, $req->file("avatar"), $user->username .'.'. $req->file("avatar")->getClientOriginalExtension()
            );

             $avt = '/storage/' . $dirname . '/' . $user->username .'.'. $req->file("avatar")->getClientOriginalExtension();

            $user->avatar = $avt;
        }
        $user->firstName = $req->all()['firstName'];
        $user->lastName = $req->all()['lastName'];
        $user->phoneNum = $req->all()['phoneNum'];

        $user->adr = $req->all()['adr'];
        $user->password = \Hash::make($req->all()['password']);
        $user->save();
        $categories = Category::all();
        $shop=\App\Shop::find(1);
        return view('auth.edit',compact('categories','shop'));
    }
    
    public function contactus(Request $req){
        if ($req->isMethod('get')) {
            //informations needed in the appv2
            $shop=\App\Shop::find(1);
            $user= \Auth::User();
            $categories = Category::all();

            //-------------------------------------------
            return view('widgets.contactus',compact('shop','user','categories'));
        }else{
            //contact msg
            return redirect('/home');
        }
    }

    public function TermsAndConditions(){

        //informations needed in the appv2
        $shop=\App\Shop::find(1);
        $categories = Category::all();
        //-------------------------------------------

        return view('terms',compact('shop','categories'));
    }

    public function About(){

        //informations needed in the appv2
        $shop=\App\Shop::find(1);
        $categories = Category::all();
        //-------------------------------------------

        return view('about',compact('shop','categories'));
    }

}
