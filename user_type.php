<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            </div>
        </aside>
    </div>
    <div class="page-content">
        <div class="container h-100">
            <div class="h-100 flex items-center justify-evenly">
                <div>
                    <a class="rounded-card large-card flex justify-center items-center font-outline decoration-none" href=""> المؤجر</a>
                </div>
                <div>
                    <a class="rounded-card large-card flex justify-center items-center font-outline decoration-none" href=""> المستأجر</a>
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