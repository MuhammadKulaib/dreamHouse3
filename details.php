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
                    <a class="navbar-link flex items-center" href="login.html">
                        <img class="" src="https://www12.0zz0.com/2024/10/02/02/860951848.png" width="50" height="70"> تسجيل الدخول
                    </a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link flex items-center" href="signup.html">
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
                <button onclick="document.location='index.html'">الرئيسية</button>
                <button onclick="document.location='advertisements.html'">الإعلانات</button><br>
                <button onclick="document.location='booking.html'">الحجوزات</button><br>
                <button onclick="document.location='add_advertisement.html'"> نشر إعلان</button><br>
                <button onclick="document.location='contact.html'">تواصل معنا</button><br>
            </div>
        </aside>
    </div>
    <div class="page-content">
        <div class="container h-100">
            <div class="flex h-100 w-100">
                <div class="flex  items-center justify-evenly mt-4 w-100">
                    <div>
                        <div class="fw-bold">* السعر :</div>
                        <button class="btn-green-outline">34 الف سنويا</button>
                    </div>
                    <div>
                        <div class="fw-bold">* المساحة :</div>
                        <button class="btn-green-outline">173 متر مربع</button>
                    </div>
                    <div>
                        <div class="fw-bold">* عدد الغرف :</div>
                        <button class="btn-green-outline">6 غرف, 3 حمام</button>
                    </div>
                    <div>
                        <div class="fw-bold">* الموقع :</div>
                        <button class="btn-green-outline">حي الرانوناء, شارع الحسين الشماخي</button>
                    </div>
                </div>
                <div class="py-4">
                    <div class="mt-4">
                        <div class="fw-bold">* الصور :</div>
                        <div class="flex flex-gap items-center justify-evenly w-100 mt-4">
                            <div style="height: 350px;">
                                <img class="green-border h-100 w-100" src="assets/images/buildings/bedroom 5.png">
                            </div>
                            <div style="height: 350px;">
                                <img class="green-border h-100 w-100" src="assets/images/buildings/bedroom 6.png">
                            </div>
                            <div style="height: 350px;">
                                <img class="green-border h-100 w-100" src="assets/images/buildings/bedroom 8.png">
                            </div>
                            <div style="height: 350px;">
                                <img class="green-border h-100 w-100" src="assets/images/buildings/bedroom 9.png">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="fw-bold">* معلومات المعلن :</div>
                        <div class="mt-4 flex flex-gap">
                            <button class="btn-green-outline">سلطان الحربي</button>
                            <button class="btn-green-outline" dir="ltr">055 222 5896</button>
                            <button onclick="document.location=''" class="btn-green">حجز موعد اللقاء</button>

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