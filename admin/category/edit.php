<?php

  /**
  * kế thừa từ hàm
  */
  class viewAdd extends My_Model
  {
   
  }

  $db = new viewAdd();

  if(testInputInt($_GET['id']))
  {
    $id = testInputInt($_GET['id']); 

    $where = "id = ".$id;
    $data = $db->fetchwhere ('category',$where);

    if (empty($data)) {
      # code...
      $_SESSION['error'] = "Danh mục không đã tồn tại (*).";
    }
  }
  else
  {
    
    
    echo "<script> window.location = 'index.php'; </script>";
    
  }

?>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa Danh Mục
            <small>Edit new category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Fixed</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                </div>
            </div>
        <div class="box-body">
            <div class="col-sm-12">
                <a href="index.php?action=add" ><button type="button" class="btn bg-olive btn-flat margin btn-right">Thêm mới</button></a>
                <a href="../category/" ><button type="button" class="btn bg-purple btn-flat margin btn-right">Danh sách</button></a>
            </div>
            <div class="box-body">
                <?php

                    if (isset($_SESSION['error']))
                    {
                      warning($_SESSION['error']);
                      unset($_SESSION['error']);

                    }
                ?>
                    <?php foreach ($data as $key => $value): ?>
                <form action="../../controller/admin/CategoryController.php?action=edit&id=<?php echo $value['id'] ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1">Tên danh mục <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="name" class="form-control" required="required"  placeholder="Tên danh mục" value="<?php echo $value['name'] ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 "></div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Title </label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="title" class="form-control"  placeholder="Title" value="<?php echo $value['title'] ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Thứ tự hiển thị <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="" name="sort_order" class="form-control" required="required"  placeholder="Thứ tự hiển thị" value="<?php echo $value['sort_order'] ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Ảnh <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="file" id="uploadfile" name="image"  value="" placeholder = "" onchange="readURL(this);" >
                                  <div class="preview showimg" id="thumbbox" >
                                      <img id="thumbimage"  src="<?php echo url().'upload/product/'.$value['thunbar']; ?>"  width="30%" alt="Image preview...">
                                      <a class="removeimg" href="javascript:" ></a>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                            
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Hiển thị trang chủ <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="radio" name="show_home" id="show_home" value="1" <?php echo  $value['show_home'] == 1 ? 'checked="checked"': '' ?> > <span>Hiển thị</span>
                                <input type="radio" name="show_home" id="show_home" value="2" <?php echo  $value['show_home'] == 2 ? 'checked="checked"': '' ?>> <span>Không hiển thị</span>
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Trạng thái <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="radio" name="status" id="status" value="1" <?php echo  $value['status'] == 1 ? 'checked="checked"': '' ?>  > <span>Hiển thị</span>
                                <input type="radio" name="status" id="status" value="2" <?php echo  $value['status'] == 2 ? 'checked="checked"': '' ?> > <span>Ẩn</span>
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"><sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="submit" class="btn bg-olive btn-flat margin"  name="" value="Chỉnh sửa">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>