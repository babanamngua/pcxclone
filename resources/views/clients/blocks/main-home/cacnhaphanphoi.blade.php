<div class="container6">
    <div class="container4">
    <a id="tencacthuonghieuphanthoi">Các thương hiệu phân phối</a>
    <div class="container4">
@foreach ($brand2 as $brand)
     <div class="sanphamtrangchu1">
    <a href="#"><img src="{{ asset('storage/block/thuonghieu/' . $brand->url_name) }}"  class="anhtrongsanphamtrangchu1"></a>
    </div>
@endforeach
    </div>
 </div>
</div>