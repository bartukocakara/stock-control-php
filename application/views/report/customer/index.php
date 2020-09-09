<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer Report List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Customer Name Surame</th>
                  <th>Expense Bill </th>
                  <th>Income Bill </th>
                  <th>Total Bought Product</th>
                  <th>Total Sold Product</th>
                  <th>Total Profit</th>
                  <th>Total Loss</th>
                  <th>Remaining</th>
                </tr>
                <?php
                  if(count($params['customer']) != 0) { 
                      foreach($params['customer'] as $key => $value) {
                        $expenseBill = $this->model('reportModel')->billExpense($value['id']);
                        $incomeBill = $this->model('reportModel')->billIncome($value['id']);
                        $totalPriceBought = $this->model('reportModel')->totalPriceBought($value['id']);
                        $totalPriceSold = $this->model('reportModel')->totalPriceSold($value['id']);
                        $totalProfit = $this->model('reportModel')->totalPriceEarned($value['id']);
                        $totalLoss = $this->model('reportModel')->totalPriceLoss($value['id']);
                        $remaining = $totalProfit - $totalLoss - $expenseBill + $incomeBill;
                  ?>
                <tr>     
                  <td><?=$value['id']?></td>
                  <td><?=$value['name'].$value['surname']?></td>
                  <td><?=$expenseBill;?></td>
                  <td><?=$incomeBill;?></td>
                  <td><?=$totalPriceBought?></td>
                  <td><?=$totalPriceSold?></td>
                  <td><?=$totalProfit?></td>
                  <td><?=-$totalLoss?></td>
                  <td><?=$remaining?></td>
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