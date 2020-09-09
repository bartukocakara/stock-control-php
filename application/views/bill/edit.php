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
              <h3 class="box-title">"<?=$params['data']['bill_no'];?>" Edit</h3>
            </div>
            <form role="form" action="<?=SITE_URL?>/bill/update/<?=$params['data']['id'];?>" method="POST">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Type : </label>
                        <select class="form-control" name="type" id="">
                            <option <?php if($params['data']['type'] == 0) { echo "selected"; } ?> value="0">Entry</option>
                            <option <?php if($params['data']['type'] == 1) { echo "selected"; } ?> value="1">Out</option>
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
                                <option <?php if($params['data']['customer_id'] == $value['id']) { echo "selected"; } ?> value="<?=$value['id']?>"><?=$value['name']?></option>

                        <?php  } ?>

                        </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bill No : </label>
                                <input type="number" class="form-control" value="<?=$params['data']['bill_no']?>" name="bill_no" placeholder="Enter Bill No">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount : </label>
                                <input type="number" class="form-control" value="<?=$params['data']['amount']?>" name="amount" placeholder="Enter Amount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Explanation : </label>
                                <input type="text" class="form-control" name="explanation" value="<?=$params['data']['explanation']?>" placeholder="Enter Explanation">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
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