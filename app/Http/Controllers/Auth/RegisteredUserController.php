<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
      /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('frontend.dashboard.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'g_depan' => ['nullable', 'string', 'max:255'],
            'g_belakang' => ['nullable', 'string', 'max:255'],
            'nip' => ['nullable', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255'],
            'tempat' => ['nullable', 'string', 'max:255'],
            'tgl_lahir' => ['nullable', 'date'],
            'jur_fak' => ['nullable', 'string', 'max:255'],
            'j_pendidikan' => ['nullable', 'string', 'max:255'],
            'jk' => ['required', 'string', 'in:laki-laki,perempuan'],
            'agama' => ['required', 'string', 'in:islam,kristen,katolik,hindu,buddha,konghucu,lainnya'],
            's_pernikahan' => ['required', 'string', 'in:belum_menikah,menikah,janda,duda'],
            'pangkat' => ['nullable', 'string', 'in:non pangkat,IA,IB,IC,ID,IIA,IIB,IIC,IID,IIIA,IIIB,IIIC,IIID,IVA,IVB,IVC,IVD,IVE'],
            'golongan' => ['nullable', 'string', 'in:non golongan,IA,IB,IC,ID,IIA,IIB,IIC,IID,IIIA,IIIB,IIIC,IIID,IVA,IVB,IVC,IVD,IVE'],
            'jabatan' => ['nullable', 'string', 'max:255'],
            'unit_kerja' => ['nullable', 'string', 'max:255'],
            'a_kantor' => ['nullable', 'string', 'max:255'],
            'kel_desa_kantor' => ['nullable', 'string', 'max:255'],
            'kab_kantor' => ['nullable', 'string', 'max:255'],
            'prov_kantor' => ['nullable', 'string', 'max:255'],
            'kec_kantor' => ['nullable', 'string', 'max:255'],
            's_pegawai' => ['required', 'string', 'in:Non ASN,ASN,CASN,PPPK'],
            'a_rumah' => ['nullable', 'string', 'max:255'],
            'kel_desa_rumah' => ['nullable', 'string', 'max:255'],
            'kab_rumah' => ['nullable', 'string', 'max:255'],
            'prov_rumah' => ['nullable', 'string', 'max:255'],
            'kec_rumah' => ['nullable', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'g_depan' => $request->g_depan,
            'g_belakang' => $request->g_belakang,
            'nip' => $request->nip,
            'username' => $request->username,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'jur_fak' => $request->jur_fak,
            'j_pendidikan' => $request->j_pendidikan,
            'jk' => $request->jk,
            'agama' => $request->agama,
            's_pernikahan' => $request->s_pernikahan,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
            'a_kantor' => $request->a_kantor,
            'kel_desa_kantor' => $request->kel_desa_kantor,
            'kab_kantor' => $request->kab_kantor,
            'prov_kantor' => $request->prov_kantor,
            'kec_kantor' => $request->kec_kantor,
            's_pegawai' => $request->s_pegawai,
            'a_rumah' => $request->a_rumah,
            'kel_desa_rumah' => $request->kel_desa_rumah,
            'kab_rumah' => $request->kab_rumah,
            'prov_rumah' => $request->prov_rumah,
            'kec_rumah' => $request->kec_rumah,
            'whatsapp' => $request->whatsapp,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
