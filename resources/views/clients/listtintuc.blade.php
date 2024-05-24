@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
<div class="container8">
    <div class="contain4">
        <div class="tenlistsanhpham">Trang chủ > Tin tức</div>
        <a id="tencacthuonghieuphanthoi">Tin tức</a>
        <div class="contain4">
            <!-- left -->
            <div class="listsanphamleft1">
                <div class="links2">
                    <div id="formguimail001">Tạo tài khoản</div>
                    <div class="formmail003">Vui lòng điền vào thông tin sau:</div>
                    <form action="">
                        <div id="formdangnhap002">


                            <div class="form-group2">
                                <input type="text" name="email" required>
                                <label for="">Email của bạn</label>
                            </div><br />
                            <div class="form-group2">
                                <input type="submit" value="Đăng ký" id="id-btn-login2">
                            </div>
                        </div>
                    </form>
                    <div class="formdangnhap009">Trang web này được bảo vệ bằng reCAPTCHA. Ngoài ra, cũng</div>

                </div>
            </div>
            <!-- right -->

            <div class="listsanphamright">
                <!-- reall 1 -->

                     <div class="boctintcuc">
                    <div class="bocmoitintuc">
                        <a class="totnhat" href="/tintuc/chitiettin/">
                            <div class="hinhanhtintuc"><img class="hinhanhtrongtintuc"
                                    src="/public/uploads/baiviet"></div>
                            <div class="mieutatintuc"></div>
                            <!-- <div class="thoigian">27 Thg 11, 2022</div> -->
                        </a>
                    </div>
                </div>

                <!-- //// -->
                

            </div>
        </div>
    </div>
</div>
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection