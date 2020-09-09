<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="col-xs-12">
        <a href="<?=SITE_URL?>/excel/export" class="btn btn-info">Download as Excel</a>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php
                  if(count($params['data']) != 0) { 
                      foreach($params['data'] as $key => $value) {
                          $category = $this->model('categoryModel')->getData($value['category_id']);
                  ?>
                <tr>     
                  <td><?=$value['id']?></td>
                  <td><?=$value['name']?></td>
                  <td><?=$category['name']?></td>
                  <td><a href="<?=SITE_URL?>/product/edit/<?=$value['id'];?>"><i class="fa fa-edit"></i></a></td>
                  <td><a href="<?=SITE_URL?>/product/delete/<?=$value['id'];?>"><i class="fa fa-trash"></i></a></td>
                  <?php } 
                } ?>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
      </div>
    </section>
</div>