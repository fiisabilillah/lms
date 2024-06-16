<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index()
    {
        return view('frontend.index');
    } // End Method 

    public function UserProfile()
    {

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.edit_profile', compact('profileData'));
    } // End Method 

    public function UserProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        // Tambahkan penyimpanan data tambahan
        $data->g_depan = $request->g_depan;
        $data->g_belakang = $request->g_belakang;
        $data->nip = $request->nip;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jur_fak = $request->jur_fak;
        $data->jenjang_pendidikan = $request->jenjang_pendidikan;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->status_pernikahan = $request->status_pernikahan;
        $data->pangkat = $request->pangkat;
        $data->golongan = $request->golongan;
        $data->jabatan = $request->jabatan;
        $data->unit_kerja = $request->unit_kerja;
        $data->alamat_kantor = $request->alamat_kantor;
        $data->kel_desa_kantor = $request->kel_desa_kantor;
        $data->kab_kantor = $request->kab_kantor;
        $data->prov_kantor = $request->prov_kantor;
        $data->kec_kantor = $request->kec_kantor;
        $data->s_pegawai = $request->s_pegawai;
        $data->alamat_rumah = $request->alamat_rumah;
        $data->kel_desa_rumah = $request->kel_desa_rumah;
        $data->kab_rumah = $request->kab_rumah;
        $data->prov_rumah = $request->prov_rumah;
        $data->kec_rumah = $request->kec_rumah;
    
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->photo = $filename;
        }
    
        $data->save();
    
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
     // End Method 

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // End Method 

    public function UserChangePassword()
    {
        return view('frontend.dashboard.change_password');
    } // End Method 

    public function UserPasswordUpdate(Request $request)
    {

        /// Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        /// Update The new Password 
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } // End Method




}
