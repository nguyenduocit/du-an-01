<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Danh Mục
            <small>List new category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../home/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">List Category</li>
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
            <!-- /.box-body -->
            <div class="box-footer">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                       <div class="col-md-12">
                            <button type="button" class="btn bg-orange btn-flat margin btn-right" onclick="history.go(-1); return false;">Quay lại</button>
                            <a href="index.php?action=add"><button type="button" class="btn bg-olive btn-flat margin btn-right">Thêm mới</button></a>
                           
                       </div>
                    </div>
                    <?php 
                      if(isset($_SESSION['success']))
                      {
                        success($_SESSION['success']);
                        unset($_SESSION['success']);
                      }
                      if(isset($_SESSION['error']))
                      {
                        warning($_SESSION['error']);
                        unset($_SESSION['error']);
                      }
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0"  rowspan="1" colspan="1"  >STT</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Tên danh mục</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Ảnh</th>
                                        <th class="sorting_asc" tabindex="0"  rowspan="1" colspan="1">Thứ tự hiển thị</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Title</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Show Home</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Status</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Edit</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 0; ?>
                                    <?php foreach ($data as $key => $value):?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $stt = $stt +1; ?></td>
                                            <td><?php echo $value['name']  ?></td>
                                            <td><img src="<?php echo url().'upload/category/'.$value['image']; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80"></td>
                                            <td><?php echo $value['sort_order']  ?></td>
                                            <td><?php echo $value['title']  ?></td>
                                            <td>
                                                <?php if ($value['show_home'] == 1):?>
                                                    <i class="fa fa-fw fa-check style-edit" ></i>
                                                <?php elseif( $value['show_home'] == 2 ): ?>
                                                    <i class="fa fa-fw fa-close style-delete" ></i>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($value['status'] == 1):?>
                                                <i class="fa fa-fw fa-check style-edit" ></i>
                                                <?php elseif( $value['status'] == 2 ): ?>
                                                <i class="fa fa-fw fa-close style-delete" ></i>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <a href="index.php?action=edit&id=<?php echo $value['id'] ?>">
                                                  <i class="fa fa-edit style-edit" >
                                                  </i>
                                                </a>
                                            </td>
                                            <td><a href="../../controller/admin/CategoryController.php?action=delete&id=<?php echo $value['id'] ?>" ><i class="fa fa-trash-o style-delete" onclick="confirmDelete('Bạn chắc chắn muốn xóa danh mục')"></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <?php 
                                    $table ='category';
                                    $link = 'index.php';
                                    echo pagination($display,$table,$link,$record); 
                                ?>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>