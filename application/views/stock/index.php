<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stock List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Safe Name</th>
                  <th>Product Name</th>
                  <th>Process Type</th>
                  <th>Total Price</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <?php
                // echo "<pre>";
                // print_r($params['products'][0]['name']);
                // echo "</pre>";
                // exit;
                  if(count($params['stocks']) != 0) { 
                      foreach($params['stocks'] as $key => $value) {
                        $product = $this->model('productModel')->getData($value['product_id']);
                        $safe = $this->model('safeModel')->getData($value['safe_id']);
                      if($value['process_type'] == 0) { 
                        $process = "Stock Entry";
                        $totalPrice = -$value['price']*$value['quantity'];
                      } else {
                         $process = "Stock Out";
                         $totalPrice = +$value['price']*$value['quantity'];
                        }
                  ?>
                <tr>     
                  <td><?=$value['product_id']?></td>
                  <td><?=$safe['name']?></td>
                  <td><?=$product['name']?></td>
                  <td><?=$process?></td>
                  <td><?=$totalPrice?></td>
                  <td><a href="<?=SITE_URL?>/stock/edit/<?=$value['product_id'];?>"><i class="fa fa-edit"></i></a></td>
                  <td><a href="<?=SITE_URL?>/stock/delete/<?=$value['id'];?>"><i class="fa fa-trash"></i></a></td>
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
    </section>,
</div>