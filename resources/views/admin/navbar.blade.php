<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="{{ route('getInformation') }}"><i class="fa fa-dashboard"></i> Mon Information </a></li>
                <li><a href="{{ route('getListUser') }}"><i class="fa fa-dashboard"></i> Gestion Users </a></li>
                <li><a href="{{ route('getConfirm') }}"><i class="fa fa-dashboard"></i> Confirm Users </a></li>
                <li><a href="{{ route('getCource') }}"><i class="fa fa-bar-chart-o"></i> Gestion Cours </a></li>
                <li><a href="{{ route('getFormationAdmin') }}"><i class="fa fa-bar-chart-o"></i> Formation </a></li>
                <li><a href="{{ route('getPlanning') }}"><i class="fa fa-bar-chart-o"></i>Gestion Planning </a></li>
                <li><a href="{{ route('logout') }}" onclick="return confirm('Voulez-vous logout ?')"><i class="fa fa-table"></i> Log Out </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
