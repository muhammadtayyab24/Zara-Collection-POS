
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/dashboard') }}">
          <i class="bi bi-envelope"></i>
          <span>Dashboard</span>
        </a>
      </li>

    
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/order') }}">
          <i class="bi bi-question-circle"></i>
          <span>Order Here</span>
        </a>
      </li>
      {{-- Products --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{ url('admin/product') }}">
              <i class="bi bi-circle"></i><span>Products</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/addproduct') }}">
              <i class="bi bi-circle"></i><span>Add  New Product</span>
            </a>
          </li>
        </ul>
      </li>
      {{-- Stock --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#stock-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Stock</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="stock-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{ url('admin/stock') }}">
              <i class="bi bi-circle"></i><span>Stock</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/addstock') }}">
              <i class="bi bi-circle"></i><span>Add  New Stock</span>
            </a>
          </li>
          
          
        </ul>
      </li>
      {{-- Employees --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#employee-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="employee-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{ url('admin/employee') }}">
              <i class="bi bi-circle"></i><span>Employees</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/addemployee') }}">
              <i class="bi bi-circle"></i><span>Add  New Employee</span>
            </a>
          </li>
          
          
        </ul>
      </li>
      {{-- Customers --}}
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         
          <li>
            <a href="{{ url('admin/customer') }}">
              <i class="bi bi-circle"></i><span>Customers</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/addcustomer') }}">
              <i class="bi bi-circle"></i><span>Add New Customer</span>
            </a>
          </li> 
        </ul>
      </li> --}}
      {{-- Deals --}}
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/expense') }}">
              <i class="bi bi-circle"></i><span>All Expenses</span>
            </a>
          </li>

          <li>
            <a href="{{ url('admin/addexpense') }}">
              <i class="bi bi-circle"></i><span>Add Expenses</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav --> --}}
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#flavours-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Flavour</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="flavours-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/flavour') }}">
              <i class="bi bi-circle"></i><span>All Flavours</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/addflavour') }}">
              <i class="bi bi-circle"></i><span>Add New Flavour</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav --> --}}
      {{-- Admin --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>User/Admin</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/tabledata') }}">
              <i class="bi bi-circle"></i><span>Users/Admin</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/adduser') }}">
              <i class="bi bi-circle"></i><span>Add New User/Admin</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/expense') }}">
          <i class="bi bi-person"></i>
          <span>Expenses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/dailyRecord') }}">
          <i class="bi bi-person"></i>
          <span>Daily Record</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/empAbsense') }}">
          <i class="bi bi-question-circle"></i>
          <span>Employee Absense</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/stock-balance') }}">
          <i class="bi bi-person"></i>
          <span>Account Balance</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/onlinePayment') }}">
          <i class="bi bi-person"></i>
          <span>onlinePayment</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/sale') }}">
          <i class="bi bi-person"></i>
          <span>Revenue</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/edituser/'. auth()->user()->name) }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

     
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/contact') }}">
          <i class="bi bi-question-circle"></i>
          <span>Contact</span>
        </a>
      </li>


    </ul>

  </aside>