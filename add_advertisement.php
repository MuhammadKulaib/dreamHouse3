<?php include "header.php"; ?>
<h1 class="font-outline text-center glass-card">ابحث معنا عن المستاجر المثالي</h1>
            <div class="flex items-center justify-evenly mt-4 w-100">
                <input class="input" placeholder="السعر">
                <input class="input" placeholder="عدد الغرف">
                <input class="input" placeholder="الموقع">
                <input class="input" placeholder="المساحة">
            </div>
            <div class="container py-4">
                <div class="mt-4">
                    <div class="fw-bold">* الصور :</div>
                    <div class="row row-cols-4 mt-4">
                        <div style="height: 350px;">
                            <div class="input flex justify-center items-center h-100 w-100">
                                <input type="file" class="hidden" id="photo1">
                                <label for="photo1" class="text-green fw-bold">اضافة الصور</label>
                            </div>
                        </div>
                        <div style="height: 350px;">
                            <div class="input flex justify-center items-center h-100 w-100">
                                <input type="file" class="hidden" id="photo1">
                                <label for="photo1" class="text-green fw-bold">اضافة الصور</label>
                            </div>
                        </div>
                        <div style="height: 350px;">
                            <div class="input flex justify-center items-center h-100 w-100">
                                <input type="file" class="hidden" id="photo1">
                                <label for="photo1" class="text-green fw-bold">اضافة الصور</label>
                            </div>
                        </div>
                        <div style="height: 350px;">
                            <div class="input flex justify-center items-center h-100 w-100">
                                <input type="file" class="hidden" id="photo1">
                                <label for="photo1" class="text-green fw-bold">اضافة الصور</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <button onclick="document.location=''" class="btn-green">حفظ البيانات</button>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php" ?>