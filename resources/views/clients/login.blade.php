@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
<div    class="container8">
    <div class="contain4">


    <div class="links2">
        <div id="formdangnhap001">Đăng nhập</div>
        <div class="formdangnhap003">Nhập email và mật khẩu</div>
  <form action="/khachhangController/login_khachhang" method="POST">
<div id="formdangnhap002">
  
<div class="form-group1">
<input type="text" name="email" required>
<label for="">Email</label>
</div><br/>
<div class="form-group1">
<input type="password" name="password" required>
<label for="">Mật khẩu</label>
</div><br/>
<div class="form-group1">
<input type="submit" value="Đăng nhập" id="id-btn-login1">
</div>
</div> 
</form>
<div class="formdangnhap004">Khách mới? <a href="/khachhangController/dangky">Tạo tài khoản</a></div>
<div class="formdangnhap005">Mất mật khẩu? <a href="#">Khôi phục mật khẩu</a></div>

    </div>
</div>
</div>
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection