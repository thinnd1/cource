<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="{{ route('getInformationLecture') }}"><i class="fa fa-dashboard"></i> Mon Information</a></li>
                <li><a href="{{ route('getCourByTeacher') }}"><i class="fa fa-dashboard"></i> Liste des cours </a></li>
                <li><a href="{{ route('getSchedule') }}"><i class="fa fa-dashboard"></i> Schedules </a></li>
                <li><a href="{{ route('getPlanningEnseignant') }}"><i class="fa fa-dashboard"></i> Planning </a></li>
                <li><a href="{{ route('logout') }}" onclick="return confirm(' Voulez-vous logout ?')"><i class="fa fa-table"></i> Log Out </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
