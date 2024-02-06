<div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
        
        <ul class="navbar-item theme-brand flex-row  text-center">
                   
                    <li class="nav-item theme-text">
                        <a href="#" class="nav-link"> SISTEM MONITORING LAMPU JALAN UMUM </a>
                    </li>
                </ul>

            <ul class="navbar-item flex-row ml-md-auto">
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="<?php echo base_url('login/logout'); ?>" class="nav-link dropdown-toggle user" >
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out
                    </div>
                    </a>
                </li>
            </ul>
        </header>
    </div>
        
 <!--  BEGIN NAVBAR  -->

 <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <?php
						    if($title2 == 'dashboard'){
							echo "<li class='breadcrumb-item'><a href='javascript:void(0);'>Dashboard</a></li>";
						    }if($title2 == 'Maps'){
                                echo "<li class='breadcrumb-item'><a href='javascript:void(0);'>Maps</a></li>";
                                }if($title2 == 'Data kategori'){
                                    echo "<li class='breadcrumb-item'><a href='javascript:void(0);'>Kategori</a></li>";
                                    }if($title2 == 'Data Lampu'){
                                        echo "<li class='breadcrumb-item'><a href='javascript:void(0);'>Data Lampu</a></li>";
                                        }
						?>
                                
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-auto ">
                <li class="nav-item more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-value="Settings" href="<?php echo base_url('setting'); ?>">Settings</a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="<?php echo base_url('dashboard'); ?>" data-active="<?php if($title2 == 'dashboard'){echo "true";} ?>"   aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?php echo base_url('admin'); ?>" data-active="<?php if($title2 == 'Maps'){echo "true";} ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                <span>Maps</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?php echo base_url('kategori'); ?>" data-active="<?php if($title2 == 'Data kategori'){echo "true";} ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>Kategori</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?php echo base_url('lokasi'); ?>" data-active="<?php if($title2 == 'Data Lampu'){echo "true";} ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M17 14v2.639c0 1.776-1.625 2.608-2 4.361h-6c-.369-1.782-2-2.582-2-4.361v-2.639h10zm-2.25 8h-5.5l1.451 1.659c.19.216.465.341.752.341h1.094c.287 0 .562-.125.752-.341l1.451-1.659zm-1.25-22c-1.381 0-2.5 1.119-2.5 2.5v10.5h2v-10.5c0-.276.225-.5.5-.5s.5.224.5.5v10.5h2v-10.5c0-1.381-1.119-2.5-2.5-2.5zm-3.5 2.5c0-.953.386-1.817 1.006-2.449-.163-.033-.333-.051-.506-.051-1.381 0-2.5 1.119-2.5 2.5v10.5h2v-10.5z"/></svg>
                                <span>Data Lampu</span>
                            </div>
                        </a>
                    </li>


                </ul>
                <!-- <div class="shadow-bottom"></div> -->
            </nav>
        </div>
        <!--  END SIDEBAR  -->
       
       <!-- <header>                
                <nav>
                <a href="#" class="logo" style="text-decoration: none; text-align: center;"><?php echo $title ?></a>
                  <ul>
                    <li><a class="tombol-neon-navbar" style="text-decoration:none;"href="<?php echo base_url('admin'); ?>">Peta</a></li>
                    <li><a class="tombol-neon-navbar" style="text-decoration:none;"href="<?php echo base_url('kategori'); ?>">Kategori</a></li>
                    <li><a class="tombol-neon-navbar" style="text-decoration:none;"href="<?php echo base_url('lokasi'); ?>">Data Lampu</a></li>
                    <li><a class="tombol-neon-navbar" style="text-decoration:none;"href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
                  </ul>
                </nav>
              </header>
          //Page Content 
        <div id="page-wrapper" class="w3-dark-grey" style="margin-left: 0; border-left: none; min-height: 800px">
            <div class="container-fluid" class="w3-dark-grey">
                <div class="row">
                    <div class="col-lg-12 w3-animate-top" style="animation-duration: 0.7s;">
                        <h3 class="header-page w3-center"><?php echo $title2; ?></h3> -->
