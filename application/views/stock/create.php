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
              <h3 class="box-title">Create Stock</h3>
            </div>
            <form role="form" action="<?=SITE_URL?>/stock/send" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Safe Name : </label>
                  <select class="form-control" name="safe_id" id="<?=$safes['id']?>">
                  <?php 
                  if(count($params['safes']) != 0){
                    foreach($params['safes'] as $key => $value) { ?>
                      <option value="<?=$value['id']?>"><?=$value['name']?></option>
                    <?php } }
                    else 
                    {
                        echo "<option value='0'>Ürün yok</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name : </label>
                  <select class="form-control" name="product_id" id="<?=$products['id']?>">
                  <?php 
                  if(count($params['products']) != 0){
                    foreach($params['products'] as $key => $value) { ?>
                      <option value="<?=$value['id']?>"><?=$value['name']?></option>
                    <?php } }
                    else 
                    {
                        echo "<option value='0'>Ürün yok</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Products Process Type: </label>
                  <select class="form-control" name="process_type" id="">
                    <option value="0">Stock Entry</option>
                    <option value="1">Stock Out</option>
                  </select>                
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Products Quantity: </label>
                  <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Products Price: </label>
                  <input type="text" class="form-control" name="price" placeholder="Enter Price">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer: </label>
                  <select class="form-control" name="customer_id" id="<?=$customers['id']?>">
                    <option value='0'>No Customer</option>
                  <?php 
                  if(count($params['customers']) != 0){
                    foreach($params['customers'] as $key => $value) { ?>
                      <option value="<?=$value['id']?>"><?=$value['name']?></option>
                    <?php } }
                    else 
                    {
                        echo "";
                    } ?>
                  </select>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add</button>
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