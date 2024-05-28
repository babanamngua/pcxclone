
		

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="<?php echo BASE_URL ?>/sanphamController/list_sanpham">Quản lý sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm sản phẩm</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="<?php echo BASE_URL ?>/sanphamController/insert_sanpham" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required name="tensp" class="form-control" placeholder="Tên sản phẩm...">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="gia" type="number" min="0" class="form-control" placeholder="Giá sản phẩm...">
                                </div>
                               
                                <div class="form-group">
                                <label for="email">Số lượng sản phẩm</label>
                                <input type="number" name= "soluong" min="0" class="form-control" placeholder="Số lượng sản phẩm...">
                              </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    
                                    <input required name="hinhsp" type="file" class="form-control">
                                    <br>
                                    
                                </div>
                                
                                <div class="form-group">
                                <label for="pwd">Loại sản phẩm</label>
                                <select class="form-control" name="loaisanpham" id="">
                                <?php 
                                  foreach($loaisanpham as $key => $lsp){
                                  ?>
                                <option value ="<?php echo $lsp['maloai']?>"><?php echo $lsp['tenloai']?></option>
                                <?php 
                                  }
                                  ?>
                                </select> 
                                </div>
                                <div class="form-group">
                                <label for="pwd">Nhà sản xuất</label>
                                <select class="form-control" name="nhasanxuat" id="">
                                <?php 
                                  foreach($nhasanxuat as $key => $nsx){
                                  ?>
                                <option value ="<?php echo $nsx['mansx']?>"><?php echo $nsx['tennsx']?></option>
                                <?php 
                                  }
                                  ?>
                                </select> 
                                </div>
                                <div class="form-group">
                                <label for="pwd">Khuyến mãi</label>
                                <select class="form-control" name="khuyenmai" id="">
                                <?php 
                                  foreach($khuyenmai as $key => $km){
                                  ?>
                                <option value ="<?php echo $km['makm']?>"><?php echo $km['tenkm']?></option>
                                <?php 
                                  }
                                  ?>
                                </select> 
                                </div>
                                <div class="form-group">
                                      <label for="pwd">Mô tả sản phẩm</label>
                                      
                                      <textarea id="chi_tiet_bv" name="mota" style="resize: none;" rows="5" class="form-control"></textarea>
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                              
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	