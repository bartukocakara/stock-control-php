<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=IMG_PATH;?>/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->myuserInfo['name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/category/create"><i class="fa fa-circle-o"></i>New Category</a></li>
            <li><a href="<?=SITE_URL;?>/category/"><i class="fa fa-circle-o"></i> Category List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/product/create"><i class="fa fa-circle-o"></i>New Product</a></li>
            <li><a href="<?=SITE_URL;?>/product/"><i class="fa fa-circle-o"></i> Product List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/customer/create"><i class="fa fa-circle-o"></i>New Customer</a></li>
            <li><a href="<?=SITE_URL;?>/customer/"><i class="fa fa-circle-o"></i> Customer List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Stocks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/stock/create"><i class="fa fa-circle-o"></i>New Stock</a></li>
            <li><a href="<?=SITE_URL;?>/stock/"><i class="fa fa-circle-o"></i> Stock List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/report/product"><i class="fa fa-circle-o"></i> Product List</a></li>
            <li><a href="<?=SITE_URL;?>/report/customer"><i class="fa fa-circle-o"></i> Customer List</a></li>
            <li><a href="<?=SITE_URL;?>/report/date"><i class="fa fa-circle-o"></i> Date Related Report</a></li>
            <li><a href="<?=SITE_URL;?>/report/safe"><i class="fa fa-circle-o"></i> Safe Report</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Safe</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/safe/create"><i class="fa fa-circle-o"></i> Create Safe</a></li>
            <li><a href="<?=SITE_URL;?>/safe"><i class="fa fa-circle-o"></i> Safe List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Bill</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/bill/create"><i class="fa fa-circle-o"></i> Create Bill</a></li>
            <li><a href="<?=SITE_URL;?>/bill"><i class="fa fa-circle-o"></i> Bill List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=SITE_URL;?>/user/create"><i class="fa fa-circle-o"></i> Create User</a></li>
            <li><a href="<?=SITE_URL;?>/user"><i class="fa fa-circle-o"></i> User List</a></li>
          </ul>
        </li>
        <li><a href="<?=SITE_URL;?>/logout"><i class="fa fa-circle"></i>Logout</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>