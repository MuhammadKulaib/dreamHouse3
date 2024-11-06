<div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <div style="height: 70px;width: 70px;">
                    <img class="h-100 w-100" src="assets/images/logo.png">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <?php if (isset($_SESSION['user_data'])): ?>
                    <li class="nav-item">
                            <a class="nav-link flex items-center" href="#">
                                <img class="" src="https://www12.0zz0.com/2024/10/02/02/860951848.png" width="50" height="70">  مرحبا <?php echo $_SESSION['user_data']['fname'] ?> 
                            </a>

                    </li>                    
                
                <?php else: ?>
                    <li class="nav-item">
                            <a class="nav-link flex items-center" href="login.php">
                                <img class="" src="https://www12.0zz0.com/2024/10/02/02/860951848.png" width="50" height="70"> تسجيل الدخول
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flex items-center" href="signup.php">
                                <img class="" src="https://www12.0zz0.com/2024/10/02/02/860951848.png" width="50" height="70"> إنشاء حساب
                            </a>
                        </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div dir="ltr" class="position-relative">
        <aside id="as">
            <i class="aside-toggle">|||</i>
            <div>
                
                <!-- روابط للكل -->
                <button onclick="document.location='index.php'">الرئيسية</button>
                <button onclick="document.location='contact.php'">تواصل معنا</button><br>
                <button onclick="document.location='advertisements.php'">الإعلانات</button><br>        
                <!-- روابط المؤجر -->
                <?php if (isset($_SESSION['user_data']['user_type']) && $_SESSION['user_data']['user_type']=="rented_user" ):  ?>
                    <button onclick="document.location='my_advertisements.php'">إدارة العقارات</button>
                    <button onclick="document.location='rented_user_booking.php'"> الحجوزات للإجار</button>
                    <button onclick="document.location='add_update_new_advertise.php'"> نشر إعلان</button>
                    
                
                <?php  endif ;?>
                <!-- روابط المستاجر -->
                <?php if (isset($_SESSION['user_data']['user_type']) && $_SESSION['user_data']['user_type']=="tenant_user" ):  ?>
                    <button onclick="document.location='tenant_user_booking.php'"> عرض طلبات الحجوزات </button>
                
                
                <?php  endif ;?>
                <?php if (isset($_SESSION['user_data'])): ?>
                <button onclick="document.location='logout.php'">خروج</button>
                <?php endif; ?>
            </div>
        </aside>
    </div>
</div>