<?php 
include "header.php";
include "database/db_connection.php"; // Include the database connection

// Initialize variables
$title = $price = $distance = $description = $location = $link_google_map = "";
$edit_state = false;
$id = null;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;

    // Fetch advertisement details to pre-fill the form
    $result = $conn->query("SELECT * FROM houses WHERE id = $id");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $price = $row['price'];
        $distance = $row['distance'];
        $description = $row['description'];
        $location = $row['location'];
        $link_google_map = $row['link_google_map'];
    }
}
?>

<form action="crud_advertisement.php" method="POST" enctype="multipart/form-data" class="mb-4">
    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Hidden input to pass id on form submission -->

    <div class="form-row d-flex gap-1 row col">
        <div class="form-group col-md-3">
            <label class="text-green fw-bold">العنوان</label>
            <input type="text" class="input mt-3 w-100" name="title" required value="<?php echo htmlspecialchars($title); ?>">
        </div>
        <div class="form-group col-md-3">
            <label class="text-green fw-bold">السعر</label>
            <input type="text" class="input mt-3 w-100" name="price" required value="<?php echo htmlspecialchars($price); ?>">
        </div>
        <div class="form-group col-md-3">
            <label class="text-green fw-bold"> المساحة</label>
            <input type="text" class="input mt-3 w-100" name="distance" required value="<?php echo htmlspecialchars($distance); ?>">
        </div>
        <div class="form-group col-md-3">
            <label class="text-green fw-bold">الوصف</label>
            <input type="text" class="input mt-3 w-100" name="description" required value="<?php echo htmlspecialchars($description); ?>">
        </div>
        <div class="form-group col-md-3">
            <label class="text-green fw-bold">الموقع</label>
            <input type="text" class="input mt-3 w-100" name="location" required value="<?php echo htmlspecialchars($location); ?>">
        </div>
        <div class="form-group col-md-3">
            <label class="text-green fw-bold">رابط قوقل ماب</label>
            <input type="text" class="input mt-3 w-100" name="link_google_map" required value="<?php echo htmlspecialchars($link_google_map); ?>">
        </div>
        <div class="form-group col-md-3">
            <label class="text-green fw-bold">الصور</label>
            <input type="file" class="input mt-3 w-100" name="images[]" multiple>
        </div>
    </div>
    <button type="submit" name="<?php echo $edit_state ? 'update' : 'save'; ?>" class="btn btn-primary mt-3"><?php echo $edit_state ? 'تحديث' : 'حفظ'; ?></button>
</form>

<?php include 'footer.php'; ?>
