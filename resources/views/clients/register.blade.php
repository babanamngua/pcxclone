@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
    <div class="container8">
        <div class="contain4">
    
    
            <div class="links2">
                <div id="formdangnhap001">Đăng ký tài khoản</div>
                <div class="formdangnhap003">Vui lòng điền vào thông tin sau:</div>
                <form action="/khachhangController/insert_dangky" method="POST">
                    <div id="formdangnhap002">
                
                        <div class="form-group1">
                            <input type="text" name="hoten" required>
                            <label for="">Họ và tên</label>
                        </div><br />
                        <div class="form-group1">
                            <input type="text" name="email" required>
                            <label for="">Email</label>
                        </div><br />
                        <div class="form-group1">
                            <input type="password" name="txtPassword" required>
                            <label for="">Mật khẩu</label>
                        </div><br />
                        <div class="form-group1">
                            <input type="submit" value="Đăng ký" id="id-btn-login1">
                        </div>
                    </div>
                </form>
                <div class="formdangnhap003">Trang web này được bảo vệ bằng reCAPTCHA. Ngoài ra, cũng<br />
                    áp dụng Chính sách quyền riêng tư và Điều khoản dịch vụ của<br />
                    Google.</div>
                <div class="formdangnhap004">Bạn đã có tài khoản? <a
                        href="/khachhangController/dangnhap">Đăng nhập</a></div>
    
            </div>
        </div>
    </div>
    
   </section>
   @endsection
   
   @section('css')
   
   @endsection
   @section('js')
   
   @endsection