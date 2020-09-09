<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php 
            helper::flashDataView('status');
        ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">"<?=$params['data']['name'];?>" Edit</h3>
            </div>
            <form role="form" action="<?=SITE_URL?>/category/update/<?=$params['data']['id'];?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name : </label>
                  <input type="text" class="form-control" name="name" value="<?=$params['data']['name']?>" placeholder="Enter Category">
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->