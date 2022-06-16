<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.html" class="brand-link">
    <img src="{{asset('asset/images/logo-icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Kidspreneurship</span>
  </a>
  <!-- Sidebar -->

  <?php if (Session::get('user_group') == 1) { ?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
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
            <a href="{{ route('backend.dashboard') }}" class="nav-link active">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                School Onboarding
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.schoollist.schoolList') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>School List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.schoolcreate.schoolCreate') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create School </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.schoolnotification.schoolnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notification Message </p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Trainer Onboarding
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.trainerlist.trainerList') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trainer List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.addtrainer.addTrainer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Trainer </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.trainernotification.trainerNotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notification Message </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Trainer Allocation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.trainerallocation.trainerallocation') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Training</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.contentlist.contentList') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Content List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.addcontent.addContent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Content </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.create-assignment') }}" class="nav-link">
              <i class="fas fa-upload"></i>
              <p>
                Student Communication
              </p>
            </a>
          </li>


          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('backend.eventlist.eventlist')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Events List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.createevent.createevent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Others
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.trainerguide.trainerGuide') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trainer Guide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.resources.resources') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Other Resources </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.schoolterms.schoolTerms') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>School Terms of Use & Privacy Policy </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.trainerterms.trainerTerms') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trainers Terms of Use & Privacy Policy </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.studentterms.studentTerms') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Terms of Use & Privacy Policy</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/index.php" class="nav-link ">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

  <?php } ?>

  <?php if (Session::get('user_group') == 2) { ?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ideal School and Collage</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('school.dashboard') }}" class="nav-link active">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('school.profile-edit') }}" class="nav-link">
              <i class="nav-icon ion ion-person-stalker"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="classschedule.php" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Class Schedule
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('school.progress-report') }}" class="nav-link">
              <i class="fas fa-chart-line nav-icon"></i>
              <p>Student Progress Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('school.event-list') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('school.privacy-police') }}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Terms & Privacy Policy
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/index.php" class="nav-link ">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  <?php } ?>

  <!-- /.sidebar -->
</aside>