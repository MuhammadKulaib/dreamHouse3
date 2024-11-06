<?php
include "header.php";  // Include the header file


// Check if user is logged in
if (!isset($_SESSION['user_data']['id'])) {
    echo "You must be logged in to view this page.";
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_data']['id'];
// SQL query to get data from booking, houses, and users
$query = "
    SELECT 
        b.id AS booking_id, 
        b.create_at AS booking_create_at, 
        b.replay AS booking_replay, 
        b.detials AS booking_detail, 
        h.id AS house_id, 
        h.title AS house_title, 
        h.price AS house_price, 
        h.distance AS house_distance, 
        h.description AS house_description, 
        h.location AS house_location, 
        h.link_google_map AS house_map_link, 
        u.fname AS user_fname, 
        u.lname AS user_lname, 
        u.phone AS user_phone, 
        u.email AS user_email
    FROM 
        booking b
    JOIN 
        houses h ON b.house_id = h.id
    JOIN 
        users u ON h.user_id = u.id
    WHERE 
        b.tenant_user_id = ?";  // Use prepared statements to prevent SQL injection

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id); // Bind the user ID to the query
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any bookings for the user
if ($result->num_rows > 0) {
    // Start the table
    echo '<div class="container mt-5">';
    echo '<h2 class="text-center text-green">الحجوزات السابقة</h2>';
    echo '<table class="table table-bordered table-striped text-center">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>رقم وعنوان الاعلان </th>';
    echo '<th>اسم المعلن</th>';
    echo '<th>الجوال</th>';
    echo '<th>الايميل</th>';
    echo '<th>تاريخ الحجز</th>';
    echo '<th> تفاصيل اللقاء</th>';
    
    echo '<th>الرد</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output each row of booking data
    while ($row = $result->fetch_assoc()) {
        $replay_text = !empty($row['booking_replay']) ? htmlspecialchars($row['booking_replay']) : "لم يرد";
        $dateTime = new DateTime($row['booking_create_at']);
    $formatted_date = date("F j, Y, g:i a", strtotime($row['booking_create_at']));
        echo '<tr>';
        echo '<td>'. $row['house_id'].'' . $row['house_title'] . '</td>';
        echo '<td>' . $row['user_fname'] . ' ' . $row['user_lname'] . '</td>';
        echo '<td><a href="tel:' . $row['user_phone'] . '">' . $row['user_phone'] . '</a></td>';
        echo '<td><a href="mailto:' . $row['user_email'] . '">' . $row['user_email'] . '</a></td>';
        echo '<td>' . $formatted_date . '</td>';
        echo '<td>' . $row['booking_detail'] . '</td>';
        echo '<td>' . $replay_text . '</td>';
        echo '</tr>';
    }

    // End the table
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "<p>No bookings found for this user.</p>";
}

$stmt->close();
?>

<?php include 'footer.php'; ?>
