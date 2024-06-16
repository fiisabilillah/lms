@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')

<div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
    <div class="media media-card align-items-center">
        <div class="media-img media--img media-img-md rounded-full">
            <img class="rounded-full" src="{{ (!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="Foto Profil">
        </div>
        <div class="media-body ml-3">
            <h2 class="section__title fs-30">Selamat datang, {{ $profileData->name }}</h2>
        </div><!-- end media-body -->
    </div><!-- end media -->
</div><!-- end breadcrumb-content -->


<div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
    <div class="setting-body">
        <h3 class="fs-20 font-weight-semi-bold pb-3">Edit Profil</h3>

        <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" class="row pt-4">
            @csrf

            <div class="input-box col-lg-6">
                <label class="label-text">Email</label>
                <div class="form-group">
                    <input class="form-control form--control" type="email" name="email" value="{{ $profileData->email }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <div class="input-box col-lg-6">
                <label class="label-text">Nama Lengkap</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="name" value="{{ $profileData->name }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <div class="input-box col-lg-6">
                <label class="label-text">Gelar Depan</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="g_depan" value="{{ $profileData->g_depan }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <div class="input-box col-lg-6">
                <label class="label-text">Gelar Belakang</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="g_belakang" value="{{ $profileData->g_belakang }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- NIP/NRP -->
            <div class="input-box col-lg-6">
                <label class="label-text">NIP/NRP</label>
                <div class="form-group">
                    <input class="form-control form--control" type="number" name="nip" value="{{ $profileData->nip }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- NIK -->
            <div class="input-box col-lg-6">
                <label class="label-text">NIK</label>
                <div class="form-group">
                    <input class="form-control form--control" type="number" name="username" value="{{ $profileData->username }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Tempat -->
            <div class="input-box col-lg-6">
                <label class="label-text">Tempat</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="tempat_lahir" value="{{ $profileData->tempat_lahir }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Tanggal Lahir -->
            <div class="input-box col-lg-6">
                <label class="label-text">Tanggal Lahir</label>
                <div class="form-group">
                    <input class="form-control form--control" type="date" name="tgl_lahir" value="{{ $profileData->tgl_lahir }}">
                    <span class="la la-calendar input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Jurusan/Fakultas -->
            <div class="input-box col-lg-6">
                <label class="label-text">Jurusan/Fakultas</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="jur_fak" value="{{ $profileData->jur_fak }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Jenjang Pendidikan -->
            <div class="input-box col-lg-6">
                <label class="label-text">Jenjang Pendidikan (Strata)</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="jenjang_pendidikan" value="{{ $profileData->jenjang_pendidikan }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Jenis Kelamin -->
            <div class="input-box col-lg-6">
                <label class="label-text">Jenis Kelamin</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="jk" value="{{ $profileData->jk }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Agama -->
            <div class="input-box col-lg-6">
                <label class="label-text">Agama</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="agama" value="{{ $profileData->agama }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Status Pernikahan -->
            <div class="input-box col-lg-6">
                <label class="label-text">Status Pernikahan</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="status_pernikahan" value="{{ $profileData->status_pernikahan }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Pangkat -->
            <div class="input-box col-lg-6">
                <label class="label-text">Pangkat</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="pangkat" value="{{ $profileData->pangkat }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Golongan -->
            <div class="input-box col-lg-6">
                <label class="label-text">Golongan</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="golongan" value="{{ $profileData->golongan }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Jabatan -->
            <div class="input-box col-lg-6">
                <label class="label-text">Jabatan</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="jabatan" value="{{ $profileData->jabatan }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Unit Kerja -->
            <div class="input-box col-lg-6">
                <label class="label-text">Unit Kerja</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="unit_kerja" value="{{ $profileData->unit_kerja }}">
                    <span class="la la-building input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Alamat Kantor -->
            <div class="input-box col-lg-6">
                <label class="label-text">Alamat Kantor</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="alamat_kantor" value="{{ $profileData->alamat_kantor }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Kelurahan/Desa Kantor -->
            <div class="input-box col-lg-6">
                <label class="label-text">Kelurahan/Desa Kantor</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="kel_desa_kantor" value="{{ $profileData->kel_desa_kantor }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div>
            <!-- end input>

            <!-- Kabupaten Kantor -->
            <div class="input-box col-lg-6">
                <label class="label-text">Kabupaten Kantor</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="kab_kantor" value="{{ $profileData->kab_kantor }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Provinsi Kantor -->
            <div class="input-box col-lg-6">
                <label class="label-text">Provinsi Kantor</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="prov_kantor" value="{{ $profileData->prov_kantor }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Kecamatan Kantor -->
            <div class="input-box col-lg-6">
                <label class="label-text">Kecamatan Kantor</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="kec_kantor" value="{{ $profileData->kec_kantor }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Status Pegawai -->
            <div class="input-box col-lg-6">
                <label class="label-text">Status Pegawai</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="status_pegawai" value="{{ $profileData->status_pegawai }}">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Alamat Rumah -->
            <div class="input-box col-lg-6">
                <label class="label-text">Alamat Rumah</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="alamat_rumah" value="{{ $profileData->alamat_rumah }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Kelurahan/Desa Rumah -->
            <div class="input-box col-lg-6">
                <label class="label-text">Kelurahan/Desa Rumah</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="kel_desa_rumah" value="{{ $profileData->kel_desa_rumah }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Kabupaten Rumah -->
            <div class="input-box col-lg-6">
                <label class="label-text">Kabupaten Rumah</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="kab_rumah" value="{{ $profileData->kab_rumah }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Provinsi Rumah -->
            <div class="input-box col-lg-6">
                <label class="label-text">Provinsi Rumah</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="prov_rumah" value="{{ $profileData->prov_rumah }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <!-- Kecamatan Rumah -->
            <div class="input-box col-lg-6">
                <label class="label-text">Kecamatan Rumah</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="kec_rumah" value="{{ $profileData->kec_rumah }}">
                    <span class="la la-map-marker input-icon"></span>
                </div>
            </div><!-- end input-box -->



            <div class="input-box col-lg-6">
                <label class="label-text">Nomor WhatsApp</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="whatsapp" value="{{ $profileData->whatsapp }}">
                    <span class="la la-whatsapp input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <div class="input-box col-lg-12 py-2">
                <button class="btn btn-primary">Simpan Perubahan</button>
            </div><!-- end input-box -->
        </form>
    </div><!-- end setting-body -->
</div><!-- end tab-pane -->




@endsection