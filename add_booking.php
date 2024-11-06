<?php 
include "header.php"; 

// Get house_id from GET parameter
$house_id = isset($_GET['house_id']) ? $_GET['house_id'] : 0;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $detail = $_POST['detail'];
    $house_id = $_POST['house_id'];

    // Get tenant_user_id from session
    $tenant_user_id = $_SESSION['user_data']['id'];

    // Retrieve rented_user_id from the house table
    $houseQuery = "SELECT user_id FROM houses WHERE id = ?";
    $stmt = $conn->prepare($houseQuery);
    $stmt->bind_param("i", $house_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $house = $result->fetch_assoc();
    
    if ($house) {
        $rented_user_id = $house['user_id'];
        
        // Get today's date without time
        $today_date = date("Y-m-d");

        // Check if a booking already exists for this tenant_user_id, house_id, and today_date
        $checkBookingQuery = "
            SELECT COUNT(*) FROM booking 
            WHERE tenant_user_id = ? 
            AND house_id = ? 
            AND DATE(create_at) = ?";
        $stmt = $conn->prepare($checkBookingQuery);
        $stmt->bind_param("iis", $tenant_user_id, $house_id, $today_date);
        $stmt->execute();
        $checkResult = $stmt->get_result();
        $bookingExists = $checkResult->fetch_row()[0];

        // If a booking already exists, display an error
        if ($bookingExists > 0) {
            echo "<p class='text-danger'>لقد قمت بحجز هذا المنزل اليوم مسبقاً.</p>";
        } else {
            // Insert booking data into the booking table
            $create_at = date("Y-m-d H:i:s"); // Set the current date and time

            $bookingQuery = "
                INSERT INTO booking (rented_user_id, tenant_user_id, house_id, detials, status, create_at)
                VALUES (?, ?, ?, ?, 'pending', ?)";
            $stmt = $conn->prepare($bookingQuery);
            $stmt->bind_param("iisss", $rented_user_id, $tenant_user_id, $house_id, $detail, $create_at);

            if ($stmt->execute()) {
                echo "<p class='text-success'>تمت إضافة الحجز بنجاح!</p>";
            } else {
                echo "<p class='text-danger'>حدث خطأ أثناء إضافة الحجز. حاول مرة أخرى.</p>";
            }
        }
    } else {
        echo "<p class='text-danger'>لم يتم العثور على المنزل المحدد.</p>";
    }
}
?>

<!-- Booking form -->
<form action="add_booking.php" method="post">
    <div class="flex justify-center flex-column flex-gap items-center">
        <input type="hidden" name="house_id" id="house_id" value="<?php echo isset($_GET['house_id']) ? $_GET['house_id'] : 0; ?>">
        <div class="rounded-card mt-4">
            <h1 class="text-center text-green">حجز الموعد</h1>
            <div class="mt-4">
                <p class="text-green fw-bold">* اكتب تفاصيل اللقاء: </p>
                <textarea name="detail" class="input-green" cols="30" rows="8" required></textarea> 
            </div>
        </div>
        <div class="flex justify-end w-100">
            <button type="submit" class="btn-green-outline">اتمام الحجز</button>
        </div>
    </div>
</form>

<?php include 'footer.php'; ?>
