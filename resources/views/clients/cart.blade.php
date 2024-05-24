@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
    <div class="container8">
        <div class="contain4">
            <div class="boliclistsanpham">Giỏ hàng của tôi</div>
            <div class="contain4">
                <!--  left-->
                <div class="giohangleft">
                    <div class="giohangsanpham"></div>
                    <table class="tablegiohangsanpham">
                        <tr class="tablegiohangsanpham1">
                            <td>Sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Tổng</td>
                        </tr>
                        <!-- real  -->
                        <?php 
                                 
                                        ?>
                               <form action='/giohang/updategiohang' method="POST">
                                     <?php 
                                    
                                        $total = 0;
                                     
                                     ?>
                        <tr class="tablegiohangsanpham2">
                            <td>
                                
                                <div class="bocsanphamgiohang">
                                    <img src="/public/uploads/sanpham/"
                                        class="anhtronggiohang">
                                    <div class="bocsanphamgiohang1">
                                        <div class="bocthuonghieugiohang">LAMZU</div>
                                        <div class="boctengiohang">lamzu 4k 2023</div>
                                        <div>
                                            <a class="boctienold">20000 d</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="wrapper">
                                    <span class="minus">-</span>
                                    <span class="num">01</span>
                                    <span class="plus">+</span>
                                </div>
                            </td>
                            <td><a class="boctienold1">1990000</a>
                            <input type="submit" value="xóa">
    
                        </td>
                            
                        </tr>
                        <?php
                                    
                                
                                ?>
                             </form>
                             <?php
                                    
                                
                                ?>
                    </table>
                </div>
                <!-- right -->
                <div class="giohangright">
                    <div class="giohangsanpham">
                        <a class="tongcongbenhdaynolalam">Tổng cộng:</a>
                        <a class="tongcongbenhdaynolalam">100300 VND</a>
                    </div>
                    <div class="nutdatmuabengiohangnha">
                        <div class="form-group">
                            <input type="submit" value="Thanh toán" id="id-btn-login">
                        </div>
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