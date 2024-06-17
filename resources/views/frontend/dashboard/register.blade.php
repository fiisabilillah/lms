@extends('frontend.master')
@section('home')

@section('title')
Register Page | Easy Learning
@endsection
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<br>
<section class="contact-area position-relative">
    <span class="ring-shape ring-shape-1"></span>
    <span class="ring-shape ring-shape-2"></span>
    <span class="ring-shape ring-shape-3"></span>
    <span class="ring-shape ring-shape-4"></span>
    <span class="ring-shape ring-shape-5"></span>
    <span class="ring-shape ring-shape-6"></span>
    <span class="ring-shape ring-shape-7"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="card-title text-center fs-24 lh-35 pb-4">Create an Account and <br> Start Learning!</h3>
                        <div class="section-block"></div>

                        <form  id="registerForm" method="POST" class="pt-4" action="{{ route('register') }}">
                            @csrf

                            <!-- <div class="d-flex flex-wrap align-items-center pb-4">
                                <button class="btn theme-btn flex-grow-1 mx-2 mb-2"><i class="la la-google mr-2"></i>Google</button>
                                <button class="btn theme-btn flex-grow-1 mx-2 mb-2"><i class="la la-facebook mr-2"></i>Facebook</button>
                                <button class="btn theme-btn flex-grow-1 mx-2 mb-2"><i class="la la-twitter mr-2"></i>Twitter</button>
                            </div>
                            <div class="text-center pt-3 pb-4">
                                <div class="icon-element icon-element-md fs-25 shadow-sm">Or</div>
                            </div> -->
                            <div class="input-box">
                                <label class="label-text">Nama Lengkap</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="name" type="text" name="name" placeholder="Nama Lengkap" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Gelar Depan</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="g_depan" type="text" name="g_depan" placeholder="Gelar Depan" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Gelar Belakang</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="g_belakang" type="text" name="g_belakang" placeholder="Gelar Belakang" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">NIP/NRP</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="nip" type="number" name="nip" placeholder="NIP/NRP" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">NIK</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="username" type="number" name="username" placeholder="NIK" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Tempat</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="tempat_lahir" type="text" name="tempat_lahir" placeholder="Tempat" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Tanggal Lahir</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="tgl_lahir" type="date" name="tgl_lahir" placeholder="Tempat" required>
                                    <span class="la la-calendar input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Jurusan / Fakultas</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="jur_fak" type="text" name="jur_fak" placeholder="Jurusan / Fakultas" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Jenjang Pendidikan (Strata)</label>
                                <div class="form-group">
                                    <select class="form-control form--control" id="jenjang_pendidikan" name="jenjang_pendidikan" required>
                                        <option value="" disabled selected>Pilih Jenjang Pendidikan</option>
                                        <option value="sma">SMA / SLTA</option>
                                        <option value="d1">D-I</option>
                                        <option value="d2">D-II</option>
                                        <option value="d3">D-III</option>
                                        <option value="d4">D-IV</option>
                                        <option value="s1">S-1</option>
                                        <option value="s2">S-2</option>
                                        <option value="s3">S-3</option>
                                    </select>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Jenis Kelamin</label>
                                <div class="form-group">
                                    <select class="form-control form--control" id="jk" name="jk" required>
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>

                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Agama</label>
                                <div class="form-group">
                                    <select class="form-control form--control" id="agama" name="agama" required>
                                        <option value="" disabled selected>Pilih Agama</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="konghucu">Konghucu</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Status Pernikahan</label>
                                <div class="form-group">
                                    <select class="form-control form--control" id="status_pernikahan" name="status_pernikahan" required>
                                        <option value="" disabled selected>Pilih Status Pernikahan</option>
                                        <option value="belum_menikah">Belum Menikah</option>
                                        <option value="menikah">Menikah</option>
                                        <option value="janda">Janda</option>
                                        <option value="duda">Duda</option>
                                    </select>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Pangkat</label>
                                <div class="form-group">
                                    <select class="form-control form--control" id="pangkat" name="pangkat" required>
                                        <option value="" disabled selected>Pilih Pangkat</option>
                                        <!-- Golongan I (Juru) -->
                                        <option value="non pangkat">Non Pangkat</option>
                                        <optgroup label="Golongan I (Juru)">
                                            <option value="IA">Juru Muda</option>
                                            <option value="IB">Juru Muda Tingkat 1</option>
                                            <option value="IC">Juru</option>
                                            <option value="ID">Juru Tingkat 1</option>
                                        </optgroup>
                                        <!-- Golongan II (Pengatur) -->
                                        <optgroup label="Golongan II (Pengatur)">
                                            <option value="IIA">Pengatur Muda</option>
                                            <option value="IIB">Pengatur Muda Tingkat 1</option>
                                            <option value="IIC">Pengatur</option>
                                            <option value="IID">Pengatur Tingkat 1</option>
                                        </optgroup>
                                        <!-- Golongan III (Penata) -->
                                        <optgroup label="Golongan III (Penata)">
                                            <option value="IIIA">Penata Muda</option>
                                            <option value="IIIB">Penata Muda Tingkat 1</option>
                                            <option value="IIIC">Penata</option>
                                            <option value="IIID">Penata Tingkat 1</option>
                                        </optgroup>
                                        <!-- Golongan IV (Pembina) -->
                                        <optgroup label="Golongan IV (Pembina)">
                                            <option value="IVA">Pembina</option>
                                            <option value="IVB">Pembina Tingkat 1</option>
                                            <option value="IVC">Pembina Utama Muda</option>
                                            <option value="IVD">Pembina Utama Madya</option>
                                            <option value="IVE">Pembina Utama</option>
                                        </optgroup>
                                    </select>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Golongan</label>
                                <div class="form-group">
                                    <select class="form-control form--control" id="golongan" name="golongan" required>
                                        <option value="" disabled selected>Pilih Golongan</option>
                                        <!-- Golongan I (Juru) -->
                                        <option value="non golongan">Non Golongan</option>
                                        <optgroup label="Golongan I (Juru)">
                                            <option value="IA">I-A (Juru Muda)</option>
                                            <option value="IB">I-B (Juru Muda Tingkat 1)</option>
                                            <option value="IC">I-C (Juru)</option>
                                            <option value="ID">I-D (Juru Tingkat 1)</option>
                                        </optgroup>
                                        <!-- Golongan II (Pengatur) -->
                                        <optgroup label="Golongan II (Pengatur)">
                                            <option value="IIA">II-A (Pengatur Muda)</option>
                                            <option value="IIB">II-B (Pengatur Muda Tingkat 1)</option>
                                            <option value="IIC">II-C (Pengatur)</option>
                                            <option value="IID">II-D (Pengatur Tingkat 1)</option>
                                        </optgroup>
                                        <!-- Golongan III (Penata) -->
                                        <optgroup label="Golongan III (Penata)">
                                            <option value="IIIA">III-A (Penata Muda)</option>
                                            <option value="IIIB">III-B (Penata Muda Tingkat 1)</option>
                                            <option value="IIIC">III-C (Penata)</option>
                                            <option value="IIID">III-D (Penata Tingkat 1)</option>
                                        </optgroup>
                                        <!-- Golongan IV (Pembina) -->
                                        <optgroup label="Golongan IV (Pembina)">
                                            <option value="IVA">IV-A (Pembina)</option>
                                            <option value="IVB">IV-B (Pembina Tingkat 1)</option>
                                            <option value="IVC">IV-C (Pembina Utama Muda)</option>
                                            <option value="IVD">IV-D (Pembina Utama Madya)</option>
                                            <option value="IVE">IV-E (Pembina Utama)</option>
                                        </optgroup>
                                    </select>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Jabatan</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="jabatan" type="text" name="jabatan" placeholder="Masukkan Jabatan" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Unit Kerja</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="unit_kerja" type="text" name="unit_kerja" placeholder="Masukkan Unit Kerja" required>
                                    <span class="la la-building input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Alamat Kantor</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="alamat_kantor" type="text" name="alamat_kantor" placeholder="Masukkan Alamat Kantor" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Kelurahan / Desa</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="kel_desa_kantor" type="text" name="kel_desa_kantor" placeholder="Masukkan Kelurahan / Desa Kantor" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Kabupaten</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="kab_kantor" type="text" name="kab_kantor" placeholder="Masukkan Kabupaten Kantor" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Provinsi</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="prov_kantor" type="text" name="prov_kantor" placeholder="Masukkan Provinsi Kantor" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Kecamatan</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="kec_kantor" type="text" name="kec_kantor" placeholder="Masukkan Kecamatan Kantor" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Status Pegawai</label>
                                <div class="form-group">
                                    <select class="form-control form--control" id="s_pegawai" name="s_pegawai" required>
                                        <option value="" disabled selected>Pilih Status Pegawai</option>
                                        <option value="Non ASN">Non ASN</option>
                                        <option value="ASN">ASN</option>
                                        <option value="CASN">CASN</option>
                                        <option value="PPPK">PPPK</option>
                                    </select>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Alamat Rumah</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="alamat_rumah" type="text" name="alamat_rumah" placeholder="Masukkan Alamat Rumah" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Kelurahan / Desa</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="kel_desa_rumah" type="text" name="kel_desa_rumah" placeholder="Masukkan Kelurahan / Desa Rumah" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Kabupaten</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="kab_rumah" type="text" name="kab_rumah" placeholder="Masukkan Kabupaten Rumah" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Provinsi</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="prov_rumah" type="text" name="prov_rumah" placeholder="Masukkan Provinsi Rumah" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Kecamatan</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="kec_rumah" type="text" name="kec_rumah" placeholder="Masukkan Kecamatan Rumah" required>
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->

                            <div class="input-box">
                                <label class="label-text">Nomor WhatsApp</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="whatsapp" type="text" name="whatsapp" placeholder="Masukkan Nomor WhatsApp" required>
                                    <span class="la la-whatsapp input-icon"></span>
                                </div>
                            </div>
                            <!-- end input-box -->



                            <div class="input-box">
                                <label class="label-text">Email</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="email" type="email" name="email" placeholder="email" required>
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Password</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="password" type="password" name="password" placeholder="password">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Confirm Password</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password">
                                    <span class="la la-envelope input-icon"></span>
                                </div>
                            </div><!-- end input-box -->


                            <div class="btn-box">
                                <div class="custom-control custom-checkbox mb-2 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="receiveCheckbox" required>
                                    <label class="custom-control-label custom--control-label lh-20" for="receiveCheckbox">Yes! I want to get the most out of Aduca by receiving emails with exclusive deals, personal recommendations and learning tips!</label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-4 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="agreeCheckbox" required>
                                    <label class="custom-control-label custom--control-label" for="agreeCheckbox">by signing i agree to the
                                        <a href="terms-and-conditions.html" class="text-color hover-underline">terms and conditions</a> and
                                        <a href="privacy-policy.html" class="text-color hover-underline">privacy policy</a>
                                    </label>
                                </div><!-- end custom-control -->
                                <button class="btn theme-btn" type="submit">Register Account <i class="la la-arrow-right icon ml-1"></i></button>
                                <p class="fs-14 pt-2">Already have an account? <a href="{{ route('login') }}" class="text-color hover-underline">Log in</a></p>
                            </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
       END CONTACT AREA
================================= -->
<script>
    // JavaScript validation
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
            
            // Check if password fields match
            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match!");
                event.preventDefault(); // Prevent form submission
                return false;
            }
        });
    });
</script>








@endsection