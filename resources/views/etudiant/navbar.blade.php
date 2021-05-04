<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="{{ route('getInformationStudent') }}"><i class="fa fa-dashboard"></i> Thông tin cá nhân </a></li>
                <li><a href="{{ route('getFormation') }}"><i class="fa fa-dashboard"></i> List Formation </a></li>
                <li><a href="{{ route('getCreateCourceEtudiant') }}"><i class="fa fa-dashboard"></i> Dang ky khoa hoc </a></li>
                <li><a href="{{ route('getListCource') }}"><i class="fa fa-dashboard"></i> Danh sach khoa hoc </a></li>
                <li><a href="{{ route('getListCource') }}"><i class="fa fa-dashboard"></i> 1.3 hien thi lich hoc </a></li>
                <li><a href="{{ route('logout') }}" onclick="return confirm('Are you sure logout ?')"><i class="fa fa-table"></i> Log Out </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
