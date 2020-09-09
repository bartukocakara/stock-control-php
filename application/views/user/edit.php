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
            <form role="form" action="<?=SITE_URL?>/user/update/<?=$params['data']['id'];?>" method="POST">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">User Name : </label>
                  <input type="text" class="form-control" name="name" value="<?=$params['data']['name']?>" placeholder="Enter Name">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">User Email : </label>
                  <input type="text" class="form-control" name="email" value="<?=$params['data']['email']?>" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">User Password : </label>
                  <input type="password" class="form-control" name="password" value="" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">User Permissions : </label>
                  <br>
                  <?php foreach(permission as $key => $value) { ?>
                    <input type="checkbox" <?php if(in_array($key, explode(', ', $params['data']['permission']))){ echo "checked"; }?> name="permission[]"><?=$value;?><br>
                  <?php }  ?>
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