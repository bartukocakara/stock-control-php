<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="" method="GET">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="">Beginning Date</label>
                        <input type="date" name="startDate" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Ending Date</label>
                        <input type="date" name="endDate" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-info">Search</button>
                    </div>
                </div>
            </form>
        <div class="col-md-12">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product Report List</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Entry</th>
                  <th>Total Entry Product</th>
                  <th>Out</th>
                  <th>Total Out Product</th>
                  <th>Price Remaining</th>
                  <th>Product Remaining</th>
                </tr>
                <?php
                  if(count($params['data']) != 0) { 
                      foreach($params['data'] as $key => $value) {
                          $productRow = $this->model('productModel')->getData($value['product_id']);
                          $totalEntry = $this->model('reportModel')->entryProductTotal($value['product_id']);
                          $totalOut = $this->model('reportModel')->outProductTotal($value['product_id']);
                          $totalPriceRemain = $totalOut-$totalEntry;

                          $entryQuantity = $this->model('reportModel')->entryProductQuantity($value['product_id']);
                          $outQuantity = $this->model('reportModel')->outProductQuantity($value['product_id']);
                          $totalQuantityRemain = $entryQuantity-$outQuantity
                ?>
                <tr>     
                  <td><?=$value['id']?></td>
                  <td><?=$productRow['name']?></td>
                  <td><?=-$totalEntry?></td>
                  <td><?=$entryQuantity?></td>
                  <td><?=$totalOut?></td>
                  <td><?=$outQuantity?></td>
                  <td><?=$totalPriceRemain?></td>  
                  <td><?=$totalQuantityRemain?></td>               
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