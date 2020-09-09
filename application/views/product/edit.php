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
              <h3 class="box-title">"<?=$params['data']['name'];?>" Edit</h3>
            </div>
            <form role="form" action="<?=SITE_URL?>/product/update/<?=$params['data']['id'];?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name : <?=$params['data']['name']?></label>
                  <input type="text" class="form-control" name="name" value="<?=$params['data']['name']?>" placeholder="Enter Category">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Products Category : </label>
                  <select class="form-control" name="categoryId">
                  <?php foreach($params['category'] as $key => $value) { ?>
                      <option <?php if($params['data']['category_id'] == $value['id']) { echo "selected"; }?> value="<?=$value['id']?>"><?=$value['name'];?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                    <label style="display:block">Product Properties</label>
                    <button type="button" id="addInput" class="btn btn-info">Add New Property</button>
                    <div id="productPropertySpace">
                        <?php if(count(json_decode($params['data']['properties'], true)) != 0) { 
                                foreach(json_decode($params['data']['properties'], true) as $key => $value){ ?>
                                    <div class="col-md-6"><label>Product Property Name:</label><input type="text" value="<?=$value['name'];?>" class="form-control selectProperty" name="property[<?=$key;?>][name]"></div>
                                    <div class="col-md-6"><label>Product Property Value:</label><input type="text" value="<?=$value['value'];?>" class="form-control" name="property[<?=$key;?>][value]"></div>
                                <?php } ?>
                        
                        <?php } ?>
                    </div>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
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