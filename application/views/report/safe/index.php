<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Safe Report List</h3>
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
                </tr>
                <?php
                  if(count($params['safes']) != 0) { 
                      foreach($params['safes'] as $key => $value) {
                          $totalEntry = $this->model('reportModel')->entryProductTotalSafe($value['id']);
                          $totalOut = $this->model('reportModel')->outProductTotalSafe($value['id']);
                          $totalPriceRemain = $totalOut-$totalEntry;

                          $entryQuantity = $this->model('reportModel')->entryProductQuantitySafe($value['id']);
                          $outQuantity = $this->model('reportModel')->outProductQuantitySafe($value['id']);
                ?>
                <tr>     
                  <td><?=$value['id']?></td>
                  <td><?=$value['name']?></td>
                  <td><?=-$totalEntry?></td>
                  <td><?=$entryQuantity?></td>
                  <td><?=$totalOut?></td>
                  <td><?=$outQuantity?></td>
                  <td><?=$totalPriceRemain?></td>  
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