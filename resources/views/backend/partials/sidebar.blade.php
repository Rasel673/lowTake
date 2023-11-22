
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link" target="_blank">
      <img src="{{asset('public/images/headerIcon.png')}}" alt="company Logo" class="brand-image img-circle elevation-5" style="opacity: .8">
      <span class="brand-text font-weight-light">LowTake</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.home')}}" class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

        <!-- category  route -->
        <li class="nav-item menu-open">
          <a href="" class="nav-link {{ Request::routeIs('createCategory')|| Request::routeIs('allCategories') || Request::routeIs('editCategory') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Category
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('allCategories')}}" class="nav-link  {{ Request::routeIs('allCategories') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Category</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('createCategory')}}" class="nav-link  {{ Request::routeIs('createCategory') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li>

           
          </ul>
        </li>

  <!-- Product  route -->
  <li class="nav-item menu-open">
    <a href="" class="nav-link {{ Request::routeIs('allProducts')|| Request::routeIs('createProduct') || Request::routeIs('editProduct') ? 'active' : '' }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Products
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">

      <li class="nav-item">
        <a href="{{route('allProducts')}}" class="nav-link  {{ Request::routeIs('allProducts') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Product list</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('createProduct')}}" class="nav-link  {{ Request::routeIs('createProduct') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Product</p>
        </a>
      </li>

     
    </ul>
  </li>



<!-- Sale  route -->
<li class="nav-item menu-open">
  <a href="" class="nav-link {{ Request::routeIs('allSales') ? 'active' : '' }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Sales
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

    <li class="nav-item">
      <a href="{{route('allSales')}}" class="nav-link  {{ Request::routeIs('allSales') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Sale list</p>
      </a>
    </li>
   
  </ul>
</li>




<!-- Settings  route -->

<li class="nav-item menu-open">
  <a href="" class="nav-link ">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Settings
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

    <li class="nav-item">
      <a href="{{route('website_setup')}}" class="nav-link {{ Request::routeIs('website_setup') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Websit Setup</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('allSliders')}}" class="nav-link  {{ Request::routeIs('allSliders') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Slider</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.coupons')}}" class="nav-link  {{ Request::routeIs('admin.coupons') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Cupons</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('page_settings')}}" class="nav-link {{ Request::routeIs('page_settings') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Pages</p>
      </a>
    </li>
   
  </ul>
</li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
