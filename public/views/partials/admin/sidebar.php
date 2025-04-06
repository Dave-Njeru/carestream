<div class="lg:col-span-1 bg-slate-400 text-white"><!--sidebar-->
    <nav>
        <ul>
            <a href="/projects/carestream/public/admin">
                <li class="py-3 pl-2 hover-admin-nav-links <?= $view == 'dashboard' ? 'bg-green-400' : '' ?> ">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                </li>
            </a>
            <hr>
            <a href="/projects/carestream/public/admin/doctor">
                <li class="py-3 pl-2 hover-admin-nav-links <?= $view == 'doctors' ? 'bg-green-400' : '' ?> ">
                    <i class="fa fa-user-md" aria-hidden="true"></i> Doctors
                </li>
            </a>
            <hr>
            <a href="#">
                <li class="py-3 pl-2 hover-admin-nav-links <?= $view == 'patients' ? 'bg-green-400' : '' ?>">
                    <i class="fa fa-wheelchair" aria-hidden="true"></i> Patients
                </li>
            </a>
            <hr>
            <a href="#">
                <li class="py-3 pl-2 hover-admin-nav-links <?= $view == 'reports' ? 'bg-green-400' : '' ?>">
                    <i class="fa fa-line-chart" aria-hidden="true"></i> Reports
                </li>
            </a>
            <hr>
        </ul>
    </nav>
</div>