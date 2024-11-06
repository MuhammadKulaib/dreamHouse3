<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-free-6.5.2-web/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Page3</title>
</head>

<body>
    <nav class="navbar container">
        <ul class="navbar-list flex justify-between items-center">
            <div style="height: 80px; width: 80px;">
                <img class="h-100 w-100" src="assets/images/logo.png">
            </div>
            <ul>
                <li class="navbar-item">
                    <a class="navbar-link flex items-center" href="login.php">
                        <img class="" src="https://www12.0zz0.com/2024/10/02/02/860951848.png" width="50" height="70"> تسجيل الدخول
                    </a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link flex items-center" href="signup.php">
                        <img class="" src="https://www12.0zz0.com/2024/10/02/02/860951848.png" width="50" height="70"> إنشاء حساب
                    </a>
                </li>
            </ul>
        </ul>
    </nav>
    <div dir="ltr" class="position-relative">
        <aside id="as">
            <i class="aside-toggle">|||</i>
            <div>
                <button onclick="document.location='index.php'">الرئيسية</button>
                <button onclick="document.location='advertisements.php'">الإعلانات</button><br>
                <button onclick="document.location='add_booking.php'">الحجوزات</button><br>
                <button onclick="document.location='add_advertisement.php'"> نشر إعلان</button><br>
                <button onclick="document.location='contact.php'">تواصل معنا</button><br>
                <button onclick="document.location='contact.php'"> تسجيل الخروج</button><br>


            </div>
        </aside>
    </div>
    <div class="page-content">
        <div class="container h-100">
            <div class="h-100 flex-gap flex items-center justify-end flex-column">
                <h1 class="font-outline text-large">ابحث عن بيت أحلامك معنا</h1>
                <div class="rounded-card w-100">
                    <div class="flex flex-gap items-center justify-center w-100">
                        <div class="dropdown">
                            <button class="dropdown-btn">عدد الغرف ▼</button>
                            <div class="dropdown-content">
                                <a href="">1</a>
                                <a href="">2</a>
                                <a href="">3</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-btn">السعر ▼</button>
                            <div class="dropdown-content">
                                <input type="number" class="input">
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-btn">الموقع ▼</button>
                            <div class="dropdown-content">
                                <a href="">موقع 1</a>
                                <a href="">2</a>
                                <a href="">3</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-gap mt-4 items-center justify-center w-100">
                        <div class="dropdown">
                            <button class="dropdown-btn">ايجار ▼</button>
                            <div class="dropdown-content">
                                <a href="">ايجار</a>
                                <a href="">بيع</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-btn text-bg-gray">
                                بحث
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="dropdown-content">
                                <input type="search" class="input">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="container flex justify-evenly items-center">
        <div class="flex justify-center items-center">
            <img src="assets/images/contact/whatsapp.png" width="70" height="70">
            <a class="decoration-none text-green fw-bold" href="https://api.whatsapp.com/send/?phone=966500862595&text&type=phone_number&app_absent=0">خدمة
            العملاء</a>
        </div>
        <div class="flex justify-center items-center">
            <img src="assets/images/contact/instgram.png" width="70" height="90">
            <a class="decoration-none text-green fw-bold" href="https://api.whatsapp.com/send/?phone=966500862595&text&type=phone_number&app_absent=0">Dream_house</a>
        </div>
        <div class="flex justify-center items-center">
            <img src="assets/images/contact/whatsapp.png" width="70" height="70">
            <a class="decoration-none text-green fw-bold" href="https://api.whatsapp.com/send/?phone=966500862595&text&type=phone_number&app_absent=0">0552363908</a>
        </div>
    </footer>

</body>

</html>