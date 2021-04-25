<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="{{ route('getInformation') }}"><i class="fa fa-dashboard"></i> Thông tin cá nhân </a></li>
                <li><a href="{{ route('getListUser') }}"><i class="fa fa-dashboard"></i> Quản lý khách hàng </a></li>
                <li><a href="{{ route('getConfirm') }}"><i class="fa fa-dashboard"></i> Confirm User </a></li>
                <li><a href=""><i class="fa fa-bar-chart-o"></i> Quản lý đơn hàng </a></li>
                <li><a href=""><i class="fa fa-bar-chart-o"></i> Quản lý Công ty </a></li>
                <li><a href="{{ route('logout') }}" onclick="return confirm('Bạn chắc chắn muốn đăng xuất ?')"><i class="fa fa-table"></i> Đăng xuất </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
