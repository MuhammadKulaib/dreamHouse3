<?php
include "header.php";
$house_id = $_GET['id'] ?? null;

if (!$house_id) {
    echo "Invalid house ID.";
    exit;
}

// Fetch house details
$house_query = "SELECT houses.*, users.fname AS advertiser_name, users.phone AS advertiser_phone 
                FROM houses 
                JOIN users ON houses.user_id = users.id 
                WHERE houses.id = ?";
$stmt = $conn->prepare($house_query);
$stmt->bind_param("i", $house_id);
$stmt->execute();
$house = $stmt->get_result()->fetch_assoc();


// Check if the house exists
if (!$house) {
    echo "House not found.";
    exit;
}

// Fetch house images
$images_query = "SELECT image FROM house_images WHERE house_id = ?";
$img_stmt = $conn->prepare($images_query);
$img_stmt->bind_param("i", $house_id);
$img_stmt->execute();
$images_result = $img_stmt->get_result();
?>


<div class="flex items-center justify-evenly mt-4 w-100">
    <div class="btn-green" style="display: grid">
        <span> السعر</span>
        <span><?php echo htmlspecialchars($house['price']); ?> سنويا</span>
    </div>
    <div class="btn-green" style="display: grid">
        <span> المساحة</span>
        <span><?php echo htmlspecialchars($house['distance']); ?></span>
    </div>
    <div class="btn-green" style="display: grid">
        <span> عدد الغرف</span>
        <span><?php echo htmlspecialchars($house['description']); ?></span>
    </div>
    <div class="btn-green" style="display: grid">
        <span> الموقع</span>
        <span><?php echo htmlspecialchars($house['location']); ?></span>
    </div>
</div>

<div class="container py-4">
    <div class="mt-4">
        <div class="fw-bold">* الصور :</div>
        <div class="row row-cols-4 mt-4">
            <?php while ($image = $images_result->fetch_assoc()) : ?>


                <div class="card">
                    <div style="height: 400px; width:370px;">
                        <?php $img_path = "buildings_images/{$image['image']}"; ?>
                        <img class="h-100 w-100" src="<?php echo $img_path; ?>" />
                    </div>

                </div>
            <?php endwhile; ?>
        </div>
        <div class="container py-4">
            
            <div class="mt-4">
                <h3 class="fw-bold d-inline">* الموقع على الخريطة:</h3>
                <div>
                    <?php if (!empty($house['link_google_map'])) : ?>
                        <a width="100%" height="100%" 
                        class="fw-bold"
                        href="<?php echo($house['link_google_map']); ?>"> <?php echo $house['title'] ?>
                      </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-4">
                <h3 class="fw-bold">* معلومات المعلن :</h3>
                <div class="flex items-center justify-evenly mt-4 w-100">
                    <span class="btn-green" style="color: #fff !important;"><?php echo htmlspecialchars($house['advertiser_name']); ?></span>
                    <span class="input btn-green"><?php echo htmlspecialchars($house['advertiser_phone']); ?></span>
                    <button onclick="document.location='add_booking.php?house_id=<?php echo $house['id']; ?>'" class="btn-green"> حجز موعد اللقاء</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>