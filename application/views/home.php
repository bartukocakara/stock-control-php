  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Total Profit</h3>
              <p><?php $totalProfit = $this->model('reportModel')->totalProfit(); echo $totalProfit;?></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Total Loss</h3>
              <p>-<?php $totalLoss = $this->model('reportModel')->totalLoss(); echo $totalLoss;?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Remaining</h3>
              <p><?php $totalRemaining = $totalProfit - $totalLoss; echo $totalRemaining; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
        <?php $totalProductQuantityEntry = $this->model('reportModel')->totalProductQuantityEntry();
              $totalProductQuantityOut = $this->model('reportModel')->totalProductQuantityOut();
          ?>
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Remaining Product</h3>
              <p><?php $totalProductQuantity = $totalProductQuantityEntry - $totalProductQuantityOut; echo $totalProductQuantity; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Product Search Quick</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Please enter keyword">
                </div>
            </div>
            <?php 
              if($_POST)
              {
                
                $data = $this->model('productModel')->search($_POST['name']);
                if(count($data) != 0)
                {
                  foreach($data as $key=>$value)
                  { ?>
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tbody><tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Entry Quantity</th>
                            <th>Out Quantity</th>
                            <th>Remaining</th>
                          </tr>
                          <?php 
                          $entryQuantity = $this->model('reportModel')->entryProductQuantity($value['id']);
                          $outQuantity = $this->model('reportModel')->outProductQuantity($value['id']);                          
                          ?>
                          <tr>     
                            <td><?=$value['id']?></td>
                            <td><?=$value['name']?></td>
                            <td><?=$entryQuantity?></td>
                            <td><?=$outQuantity?></td>
                            <td><?=$entryQuantity-$outQuantity;?></td>
                            <?php } 
                           ?>
                          </tr>
                        </tbody></table>
                      </div>
                <?php }
                else{ helper::flashData('status', "No results found"); }  
              }
                
            ?>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </form>
          </div>

        </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->