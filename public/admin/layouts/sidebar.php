  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <h2 class="text-center brand-text font-weight-light">SMARTFL</h2>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://localhost/-project_1/public/client/assets/image/avatar.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Fullname</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo _WEB_HOST_ROOT_ADMIN; ?>" class="nav-link <?php echo empty($_GET['module'])?'active':''; ?>">
              <i class="fa fa-home mx-2"></i>
              <p>
                Bảng điều khiển
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['groups', 'user', 'permission'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['groups', 'user', 'permission'])?'active':''; ?>">
            <i class="fa fa-user mx-2"></i>
              <p>
                Người
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=user&action=staff" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nhân viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=user&action=tearch" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Giáo viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=user&action=client" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="?module=groups" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['blog_type', 'blog'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['blog_type', 'blog'])?'active':''; ?>">
              <i class="fa fa-blog mx-2"></i>
              <p>
                Bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=blog" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=blog_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview <?php echo getActive(['course_type', 'course', 'chapter_course', 'exercise_course'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['course_type', 'course', 'chapter_course', 'exercise_course'])?'active':''; ?>">
              <i class="fa fa-video mx-2"></i>
              <p>
                Khóa học
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=course" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=course_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['exam', 'exam_type', 'question_exam'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['exam', 'exam_type', 'question_exam'])?'active':''; ?>">
              <i class="fab fa-earlybirds mx-2"></i>
              <p>
                Bài kiểm tra
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=exam" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=exam_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['book', 'book_type'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['book', 'book_type'])?'active':''; ?>">
            <i class="fa fa-book mx-2"></i>
              <p>
                Sách
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?module=book" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=book_type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo getActive(['option'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['option'])?'active':''; ?>">
            <i class="fa fa-cog mx-2"></i>
              <p>
                Option
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="?module=option&action=header" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Header</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=option&action=slide" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?module=option&action=footer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Footer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="?module=cart" class="nav-link <?php echo getActive(['cart'])?'active':''; ?>">
              <i class="fa fa-truck mx-1"></i>
              <p>
                Đơn hàng
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview <?php echo getActive(['statistics'])?'menu-open':''; ?>">
            <a href="" class="nav-link <?php echo getActive(['statistics'])?'active':''; ?>">
            <i class="fa fa-align-left mx-2"></i>
              <p>
                Thống kê
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="?module=statistics&action=book" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khóa học</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài kiểm tra</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Test
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

