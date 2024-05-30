
	
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
                <li><a href="<?php echo BASE_URL ?>/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="<?php echo BASE_URL ?>/sanphamController/list_sanpham">Quản lý sản phẩm</a></li>
				<li class="active">Sửa thông tin </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Sửa thông tin sản phẩm</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                  <?php 
                                  foreach($sanpham as $key => $sp){
                                  ?>
                                <form action="<?php echo BASE_URL ?>/sanphamController/update_sanpham/<?php echo $sp['masp']?>" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                   
                                    <input type="text" value="<?php echo $sp['tensp']?>" name= "tensp" class="form-control" placeholder="Tên sản phẩm...">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" value="<?php echo $sp['gia']?>" name= "gia" class="form-control" placeholder="Giá sản phẩm...">
                                </div>
                                
                                <div class="form-group">
                                <label for="email">Số lượng sản phẩm</label>
                                <input type="text" value="<?php echo $sp['soluong']?>" name= "soluong" class="form-control" placeholder="Số lượng sản phẩm...">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input  name="hinhsp" type="file" class="form-control">
                                    <br>
                                    <div>
                                        <img  style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" width="100px"  height="100px" src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $sp['hinhsp']?>">
                                    </div>
                                </div>
                               <div class="form-group">
                            <label for="pwd">Loại sản phẩm</label>
                            <select class="form-control" name="loaisanpham" id="" >
                            <?php 
                            foreach($loaisanpham as $key => $lsp){
                                
                            ?>
                            <option <?php if($sp['maloai']==$lsp['maloai']) {echo 'selected'  ;} ?> value ="<?php echo 
                            $lsp['maloai']?>"><?php echo $lsp['tenloai']?></option>
                            <?php 
                            }
                            ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="pwd">Nhà sản xuất</label>
                            <select class="form-control" name="nhasanxuat" id="" >
                            <?php 
                            foreach($nhasanxuat as $key => $nsx){
                                
                            ?>
                            <option <?php if($sp['mansx']==$nsx['mansx']) {echo 'selected'  ;} ?> value ="<?php echo 
                            $nsx['mansx']?>"><?php echo $nsx['tennsx']?></option>
                            <?php 
                            }
                            ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="pwd">Khuyến mãi</label>
                            <select class="form-control" name="khuyenmai" id="" >
                            <?php 
                            foreach($khuyenmai as $key => $km){
                                
                            ?>
                            <option <?php if($sp['makm']==$km['makm']) {echo 'selected'  ;} ?> value ="<?php echo 
                            $km['makm']?>"><?php echo $km['tenkm']?></option>
                            <?php 
                            }
                            ?>
                            </select> 
                        </div>
                        
                                    <div class="form-group">
                                    <label for="pwd">Chi tiết sản phẩm</label>
                                    <textarea id="chi_tiet_sp" name="mota" style="resize: none;" row="5" class="form-control" ><?php echo $sp['mota']?></textarea>
                                </div>
                                    
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
