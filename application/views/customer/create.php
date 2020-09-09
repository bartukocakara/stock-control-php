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
              <h3 class="box-title">Create Customer</h3>
            </div>
            <form role="form" action="<?=SITE_URL?>/customer/send" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Name : </label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Surname : </label>
                  <input type="text" class="form-control" name="surname" placeholder="Enter Surname">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Email : </label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Phone : </label>
                  <input type="text" class="form-control" name="phone" placeholder="Enter Customer">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Address : </label>
                  <input type="text" class="form-control" name="address" placeholder="Enter Address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Tc : </label>
                  <input type="text" class="form-control" name="tc" placeholder="Enter Address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customers Note : </label>
                  <input type="text" class="form-control" name="note" placeholder="Enter Note">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Customer Company : </label>
                  <input type="text" class="form-control" name="company" placeholder="Enter Company">
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