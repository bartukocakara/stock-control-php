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
              <h3 class="box-title">Import Product</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="<?=SITE_URL?>/excel/import" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Products Name : </label>
                  <input type="file" class="form-control" name="file">
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Download</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
          var i = $(".selectProperty").length;
          $("#addInput").click(function(){
          var prop ='<div class="col-md-6"><label>Product Property Name:</label><input type="text" class="form-control selectProperty" name="property['+i+'][name]"></div>' +
                    '<div class="col-md-6"><label>Product Property Value:</label><input type="text" class="form-control" name="property['+i+'][value]"></div>';
            $("#productPropertySpace").append(prop);
                i++;
      })
  })
  </script>