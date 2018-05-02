<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Shop;
use Illuminate\Support\Facades\File;
class SettingsController extends Controller
{
    public function editText(Request $req) {


	$validator = \Validator::make($req->all(), [
           		'name' => 'required|string',
	            'description' => 'required',
	            'link' => 'required|url',
	            'email' => 'required|string|email',
	            'terms' => 'required',
	            'addr' => 'required|max:255',
	            'phone_num' => 'required|max:15',
	            'fb_link' => 'url',
	            'insta_link' => 'url',
	            'twitter_link' => 'url',
      ]);
	if ($validator->fails()) {
		return back()->withErrors($validator)->withInput();
	}

	$shop = Shop::find(1);
	$shop->name = $req->all()['name'];
	$shop->description = $req->all()['description'];
	$shop->link = $req->all()['link'];
	$shop->email = $req->all()['email'];
	$shop->terms = $req->all()['terms'];
	$shop->addr = $req->all()['addr'];
	$shop->phone_num = $req->all()['phone_num'];
	$shop->fb_link = $req->all()['fb_link'];
	$shop->insta_link = $req->all()['insta_link'];
	$shop->twitter_link = $req->all()['twitter_link'];
	$shop->quotes = $req->all()['quotes'];
	$shop->save();

	return redirect('/admin');

    }

    public function editVisual(Request $req) {
    	// dd($req);
    	
    	$rules = [
    		'logo' => 'image|mimes:jpeg,bmp,png',
    	];
    	$validator = \Validator::make($req->all(), $rules);
	if ($validator->fails()) {
		return back()->withErrors($validator)->withInput();
	}
	$shop = Shop::find(1);

	$dirname = 'images/' . 'shop/';
	
	$relurl = '/storage/' . $dirname;
	$dirname = 'public/' . $dirname;
	$shop->slides = $relurl . 'slides/';
	//dd($shop->slides);
	if ($req->file('logo')) {
		if ($shop->logo != NULL) {
			\Storage::delete(str_replace('storage', 'public', $shop->logo));
		}
		$shop->logo = 'logo' . '.' . $req->file('logo')->getClientOriginalExtension();
		\Storage::putFileAs(
				$dirname, $req->file('logo'),$shop->logo
			);
		$shop->logo = $relurl . $shop->logo;
	}
	
	for ($i=1; $i <= 3; $i++) {
		if ($req->file('slide'. $i)) {
		//\Storage::delete(str_replace('storage', 'public', $shop->slides . 'slide' . $i . '.*'));
		File::delete(File::glob(str_replace('storage', 'public', $shop->slides . 'slide' . $i .'*')));
		$slide = 'slide'. $i . '.' . $req->file('slide'. $i)->getClientOriginalExtension();
		\Storage::putFileAs(
				$dirname . 'slides/' , $req->file('slide'. $i), $slide
			);
		}
	}

	$shop->save();
	return redirect('/admin');
    }


    /*
    * Show Settings page.
    */
    public function index() {
    		$shop = Shop::find(1);
    		$slides = \Storage::allFiles(str_replace('storage', 'public', $shop->slides));
    		//$slides = implode(" ",str_replace('public', '/storage', $slides ));
    		for ($i=0; $i <count($slides) ; $i++) { 
    			$slides[$i] = str_replace('public', '/storage', $slides[$i] );
    		}

    		//dd($slides);

     		return view('admin.settings', compact('shop','slides'));
    }

}
