<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Models\SiteSetting;


class SettingController extends Controller
{
    public function SmtpSetting(){

        $smpt = SmtpSetting::find(1);
        return view('admin.backend.setting.smpt_update',compact('smpt'));

    }// End Method

    public function SmtpUpdate(Request $request){

        $smtp_id = $request->id;

        SmtpSetting::find($smtp_id)->update([
            'mailer' =>  $request->mailer,
            'host' =>  $request->host,
            'port' =>  $request->port,
            'username' =>  $request->username,
            'password' =>  $request->password,
            'encryption' =>  $request->encryption,
            'from_address' =>  $request->from_address, 
        ]);

        $notification = array(
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);  

    }// End Method 

    public function SiteSetting(){

        $site = SiteSetting::find(1);
        return view('admin.backend.site.site_update',compact('site'));

    }// End Method 

    public function UpdateSite(Request $request){

        $site_id = $request->id;

        if ($request->file('logo')) {

            // $image = $request->file('logo');  
            // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            // Image::make($image)->resize(140,41)->save('upload/logo/'.$name_gen);
            // $save_url = 'upload/logo/'.$name_gen;

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('logo')->getClientOriginalExtension();
            $img = $manager->read($request->file('logo'));
            $img = $img->resize(140,41);
    
            $img->toJpeg(80)->save(base_path('public/upload/logo/' . $name_gen));
            $save_url = 'upload/logo/' . $name_gen;

            SiteSetting::find($site_id)->update([
                'phone' => $request->phone, 
                'email' => $request->email, 
                'address' => $request->address, 
                'facebook' => $request->facebook, 
                'twitter' => $request->twitter, 
                'copyright' => $request->copyright,  
                'logo' => $save_url,        

            ]);

            $notification = array(
                'message' => 'Site Setting Updated with image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);  

        } else {

            SiteSetting::find($site_id)->update([
                'phone' => $request->phone, 
                'email' => $request->email, 
                'address' => $request->address, 
                'facebook' => $request->facebook, 
                'twitter' => $request->twitter, 
                'copyright' => $request->copyright,  

            ]);

            $notification = array(
                'message' => 'Site Setting Updated without image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);  

        } // end else 

    }// End Method 


}
