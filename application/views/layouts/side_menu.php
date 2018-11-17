    <!-- ##### SIDEBAR LOGO ##### -->
    <div class="kt-sideleft-header">
      <div class="kt-logo"><a href="index.html">Admin</a></div>
      <div id="ktDate" class="kt-date-today"></div>
      <div class="input-group kt-input-search">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn mg-0">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span>
      </div><!-- input-group -->
    </div><!-- kt-sideleft-header -->
<?php
$id = $this->session->userdata('login')['id'];
$user = userData($id);
echo $user->role_id; 
?>
    <!-- ##### SIDEBAR MENU ##### -->
    <div class="kt-sideleft">
      <label class="kt-sidebar-label">Navigation</label>
      <ul class="nav kt-sideleft-menu">
        <li class="nav-item">
          <a href="<?php echo base_url().'welcome'; ?>" class="nav-link active">
            <i class="icon ion-ios-home-outline"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- nav-item -->
        
      
<?php 
if($user->role_id == '1'){ ?>
<li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-gear-outline"></i>
            <span>Master</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item">
              <a href="<?php echo base_url().'master/gold'; ?>" class="nav-link">Add Gold</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link">Add FD</a></li>
            <li class="nav-item"><a href="<?php echo base_url().'master/rd'; ?>" class="nav-link">Add RD</a></li>
          </ul>
        </li><!-- nav-item -->
        

<?php }
 if($user->role_id == '1' || $user->role_id == '2' || $user->role_id == '3'){ ?>
  <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-gear-outline"></i>
            <span>Member</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item">
              <a href="<?php echo base_url().'welcome/member'; ?>" class="nav-link">Add Member</a>
            </li>
            <li class="nav-item"><a href="<?php echo base_url().'welcome/member_view'; ?>" class="nav-link">View Member</a></li>
            <li class="nav-item"><a href="form-validation.html" class="nav-link">Archive Member</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-filing-outline"></i>
            <span>Customer</span>
          </a>

          <ul class="nav-sub">
            <li class="nav-item"><a href="<?php echo base_url().'customer' ?>" class="nav-link">Add Customer</a></li>
            <li class="nav-item"><a href="<?php echo base_url().'customer/view_customer' ?>" class="nav-link">View Customer</a></li>
            </ul>
  </li>
  
<?php }
 if($user->role_id == '1' || $user->role_id == '2' || $user->role_id == '3'){ ?>

       
<?php }
 if($user->role_id == '1' || $user->role_id == '2' || $user->role_id == '3' || $user->role_id == '4'){ ?>
 <li class="nav-item">
          <a href="" class="nav-link with-sub">
            <i class="icon ion-ios-filing-outline"></i>
            <span>New Sheme</span>
          </a>

          <ul class="nav-sub">
            <!-- <li class="nav-item"><a href="<?php //echo base_url().'customer' ?>" class="nav-link">Open FD</a></li> -->
              <li class="nav-item"><a href="<?php echo base_url().'scheme' ?>" class="nav-link">Open RD</a></li>

            <li class="nav-item"><a href="<?php echo base_url().'scheme/viewRd' ?>" class="nav-link">View RD</a></li>
            </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url().'scheme/deposit' ?>" class="nav-link"><i class="icon ion-ios-filing-outline"></i>
          <span>Diposit</span></a>
        </li>
<?php }else if($user->role_id == '5'){ ?>
<li class="nav-item">
  <a href="<?php echo base_url().'scheme/instalment' ?>" class="nav-link"><i class="icon ion-ios-filing-outline"></i>
    <span>Instalment</span></a>
</li>
<?php } ?>
        
      
      </ul>
    </div><!-- kt-sideleft -->

    <!-- ##### HEAD PANEL ##### -->
    <div class="kt-headpanel">
      <div class="kt-headpanel-left">
        <a id="naviconMenu" href="" class="kt-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconMenuMobile" href="" class="kt-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
      </div><!-- kt-headpanel-left -->

      <div class="kt-headpanel-right">
        <div class="dropdown dropdown-notification">
          <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
            <i class="icon ion-ios-bell-outline tx-24"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
            <!-- end: if statement -->
          </a>

          <?php $user= userData($this->session->userdata('login')['id']);
           ?>
          <div class="dropdown-menu wd-300 pd-0-force">
            <div class="dropdown-menu-header">
              <label>Notifications</label>
              <a href="">Mark All as Read</a>
            </div><!-- d-flex -->

            <div class="media-list">
              <!-- loop starts here -->
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <div class="media-body">
                    <span class="pull-left">Gold</span> 
                    <span class="pull-right bages"><?php echo $user->gold; ?></span>
                  </div>

                  </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <div class="media-body">
                    <span class="pull-left">Silver</span> 
                    <span class="pull-right bages"><?php echo $user->silver; ?></span>
                  </div>
                  
                  </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <div class="media-body">
                    <span class="pull-left">Amount</span> 
                    <span class="pull-right bages"><?php echo $user->amount; ?></span>
                  </div>
                  
                  </div><!-- media -->
              </a>
              
              <div class="media-list-footer">
                <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
              </div>
            </div><!-- media-list -->
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-profile">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
            <span class="logged-name"><span class="hidden-xs-down"><?php echo $this->session->userdata('login')['fname'] ?></span> <i class="fa fa-angle-down mg-l-3"></i></span>
          </a>
          <div class="dropdown-menu wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
              <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
              <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
              <li><a href="<?php echo base_url().'login/logout' ?>"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- kt-headpanel-right -->
    </div><!-- kt-headpanel -->
    <div class="kt-breadcrumb">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="index.html">Katniss</a>
        <span class="breadcrumb-item active"><?php echo $title; ?></span>
      </nav>
    </div><!-- kt-breadcrumb -->
}
