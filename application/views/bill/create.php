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
              <h3 class="box-title">Create Bill</h3>
            </div>
            <form role="form" action="<?=SITE_URL?>/bill/send" method="POST">
              <div class="box-body">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Type : </label>
                  <select class="form-control" name="type" id="">
                    <option value="0">Expense</option>
                    <option value="1">Income</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Customer : </label>
                    <select class="form-control" name="customer_id" id="">
                    <?php 

                        foreach($params['customers'] as $key => $value)
                        { ?>
                            <option value="<?=$value['id']?>"><?=$value['name']?></option>

                    <?php  } ?>

                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bill No : </label>
                            <input type="number" class="form-control" name="bill_no" placeholder="Enter Bill No">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount : </label>
                            <input type="number" class="form-control" name="amount" placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Explanation : </label>
                            <input type="text" class="form-control" name="explanation" placeholder="Enter Explanation">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
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