<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ads;
use App\Models\User;
use App\Models\Categories;
use App\Models\Cities;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInfo()
    {
        $user = Auth::user();
        return view('users.userInfo', ['user' => $user]);
    }

    public function showAds()
    {
        $user = Auth::user();
        $id = Auth::id();
        $ads = Ads::where('user_id', $id)
                ->get();
        return view('users.userAds', ['user' => $user, 'ads' => $ads]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAd($id)
    {
        $ad = Ads::where('id', $id)
                ->first();
        $categories = Categories::all();
        $cities = Cities::all();

        return view('users.userAdDetails', ['ad' => $ad, 'categories' => $categories, 'cities' => $cities,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nickname' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
         ]);

        $user = Auth::user();
        $user->name = request()->input('name');
        $user->nickname =  request()->input('nickname');
        $user->phone =  request()->input('phone');
        $user->email =  request()->input('email');
        $user->save();

        return view('users.userInfo', ['user' => $user]);
    }

    public function updateAd(Request $request, $id)
    {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productDescription' => 'required',
            'productCategory' => 'required',
            'productCondition' => 'required',
            'productLocation' => 'required',
            //'productPic.*' => 'required|image'
         ]);

        $user = Auth::user();
        $userId = Auth::id();
        $ads = Ads::where('user_id', $userId)
                ->get();
        $affected = Ads::where('id', $id)
                    ->update([
                        'title' => $request->input('productName'),
                        'category_id' => $request->input('productCategory'),
                        'description' => $request->input('productDescription'),
                        'price' => $request->input('productPrice'),
                        //'image' = json_encode($pics);
                        'condition' => $request->input('productCondition'),
                        'city' => $request->input('productLocation')
                    ]);

        return view('users.userAds', ['user' => $user, 'ads' => $ads]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyInfo()
    {
        $userId = Auth::id();
        $deleteRows = User::where('id', $userId)->delete();

        return redirect('/');
    }

    public function destroyAd($id)
    {
        $deleteRows = Ads::where('id', $id)->delete();

        return redirect('/user-ads');
    }
}
