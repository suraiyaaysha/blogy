<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cms;

class CmsController extends Controller
{
    public function home(){
        $cms = Cms::first();
        return view('admin.settings.index', compact('cms'));
    }

    public function homeUpdate(Request $request){
        // Validate data
        $request->validate([
            'home_banner_img'=> 'nullable|mimes:jpeg,jpg,png|max:15000',
            'app_logo'=> 'nullable|mimes:jpeg,jpg,png,svg|max:15000',
            'footer_about'=> 'required',
            'facebook_url'=> 'required|url',
            'twitter_url'=> 'required|url',
            'instagram_url'=> 'required|url',
            'youtube_url'=> 'required|url',
            'company_name'=> 'required',
            'company_url'=> 'required|url',
        ]);

        $cms = Cms::first();
        $cms->update([
            // 'home_banner_img'=> $request->home_banner_img,
            'footer_about'=> $request->footer_about,
            'facebook_url'=> $request->facebook_url,
            'twitter_url'=> $request->twitter_url,
            'instagram_url'=> $request->instagram_url,
            'youtube_url'=> $request->youtube_url,
            'company_name'=> $request->company_name,
            'company_url'=> $request->company_url,
        ]);

        if(isset($request->home_banner_img)) {
            $file = $request->home_banner_img;

            $url = $file->move('uploads/cms' , $file->hashName());
            $cms->update(['home_banner_img' => $url]);
        }

        if(isset($request->app_logo)) {
            $file2 = $request->app_logo;

            $url2 = $file2->move('uploads/cms' , $file2->hashName());
            $cms->update(['app_logo' => $url2]);
        }

        return back()->withSuccess('Home Page Updated Successfully');
    }

}
