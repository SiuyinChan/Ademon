<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Ads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
 
    public function index()
    {
        $categories = Categories::all();
        $ads = Ads::paginate(8);
        
        return view('ads.ad', ['categories' => $categories, 'ads' => $ads]);
    }

    public function viewAds(request $request, $id)
    {
        $categories = Categories::all();
        $ads = DB::table('ads')
                ->join('categories', 'ads.category_id', '=', 'categories.id')
                ->select('ads.*')
                ->where('categories.id', '=', $id)
                ->paginate(8);

        if ($id == 1) {
            return view('ads.publishedAds.fashionAds', ['categories' => $categories, 'ads' => $ads]);
        }

        else if ($id == 2) {
            return view('ads.publishedAds.homeAds', ['categories' => $categories, 'ads' => $ads]);
        }

        else if ($id == 3) {
            return view('ads.publishedAds.multimediaAds', ['categories' => $categories, 'ads' => $ads]);
        }

        else if ($id == 4) {
            return view('ads.publishedAds.hobbiesAds', ['categories' => $categories, 'ads' => $ads]);
        }

        else if ($id == 5) {
            return view('ads.publishedAds.vehicleAds', ['categories' => $categories, 'ads' => $ads]);
        }

        else if ($id == 6) {
            return view('ads.publishedAds.servicesAds', ['categories' => $categories, 'ads' => $ads]);
        }

        
    }

    public function postAds()
    {
        $categories = Categories::all();
        $cities = Cities::all();
        return view('ads.postAds', ['categories' => $categories, 'cities' => $cities]);
    }

    public function postedAds(Request $request)
    {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productDescription' => 'required',
            'productCategory' => 'required',
            'productCondition' => 'required',
            'productCondition' => 'required',
            'productLocation' => 'required',
            'productPic.*' => 'required|image'
         ]);

        $ad = new Ads;
        if ($request->hasFile('productPic')) {
            $images = $request->file('productPic');
            $pics=[];
            $count = 0;
            $picPath = 'storage/images/ads/';
            foreach ($images as $image) {
                if ($count < 4) {
                    $picName = Str::uuid() . '.' . $image->extension();
                    $image->move($picPath, $picName);
                    array_push($pics, $picName); 
                    $count++;
                }
            }
            $ad->title = $request->input('productName');
            $ad->category_id = $request->input('productCategory');
            $ad->user_id = Auth::id();
            $ad->description = $request->input('productDescription');
            $ad->price = $request->input('productPrice');
            $ad->image = json_encode($pics);
            $ad->condition = $request->input('productCondition');
            $ad->city = $request->input('productLocation');
            $ad->save();
        }

        return redirect('/user-ads');

    }

    public function searchResult(Request $request)
    {
        if ($request->input("searchProduct") !== NULL && $request->input("searchCity") == NULL) {
            $ads = DB::table('ads')
                    ->where('title', 'like', '%' . $request->input("searchProduct") .'%')
                    ->paginate(8);
        }

        if ($request->input("searchProduct") == NULL && $request->input("searchCity") !== NULL) {
            $ads = Ads::where('city', $request->input("searchCity"))->paginate(8);
        }
        
        if ($request->input("searchProduct") !== NULL && $request->input("searchCity") !== NULL) {
            $ads = DB::table('ads')
                    ->where('city', '=', $request->input("searchCity"))
                    ->where('title', 'like', '%' . $request->input("searchProduct") .'%')
                    ->paginate(8);
        }
        
        return view('ads.searchResults', ['ads' => $ads]);
    }

    public function productDetails(request $request, $id)
    {
        $ads = Ads::where('id', $id)->paginate(8);
        $user = DB::table('users')
                ->join('ads', 'ads.user_id', '=', 'users.id')
                ->select('users.*')
                ->where('ads.id', '=', $id)
                ->first();
        return view('ads.productDetails', ['ads' => $ads, 'user' => $user]);
    }

}