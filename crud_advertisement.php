<?php
session_start();
include "database/db_connection.php";
$edit_state = false;
$id = '';

// Handle Insert
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    // Gather house data from form
    $title = $_POST['title'];
    $price = $_POST['price'];
    $distance = $_POST['distance'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $link_google_map = $_POST['link_google_map'];
    $user_id = $_SESSION['user_data']['id'];
    $create_at = date('Y-m-d H:i:s');
    $status = "false";

    // Insert house data
    $stmt = $conn->prepare("INSERT INTO houses (title, price, distance, description, location, link_google_map, create_at, user_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $title, $price, $distance, $description, $location, $link_google_map, $create_at, $user_id, $status);
    
    if ($stmt->execute()) {
        $house_id = $stmt->insert_id;

        // Insert multiple images
        foreach ($_FILES['images']['name'] as $index => $image_name) {
            $target_dir = "buildings_images/";
            $target_file = $target_dir . basename($image_name);
            if (move_uploaded_file($_FILES['images']['tmp_name'][$index], $target_file)) {
                $img_stmt = $conn->prepare("INSERT INTO house_images (house_id, image) VALUES (?, ?)");
                $img_stmt->bind_param("is", $house_id, $image_name);
                $img_stmt->execute();
            }
        }
         echo '<script>
                        window.location.href = "my_advertisements.php";
                  </script>';
    }
    $stmt->close();
}

// Handle Edit Request (Form Filling)
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $result = $conn->query("SELECT * FROM houses WHERE id=$id");
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Populate form fields with house data
        // Fetch house images for display in the form
        $image_result = $conn->query("SELECT * FROM house_images WHERE house_id=$id");
        $images = $image_result->fetch_all(MYSQLI_ASSOC);
    }
}

// Handle Update (Form Submission for Edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    // Gather house data from form
    $title = $_POST['title'];
    $price = $_POST['price'];
    $distance = $_POST['distance'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $link_google_map = $_POST['link_google_map'];
    $status = "false";

    // Update house data
    $stmt = $conn->prepare("UPDATE houses SET title=?, price=?, distance=?, description=?, location=?, link_google_map=?, status=? WHERE id=?");
    $stmt->bind_param("ssssssii", $title, $price, $distance, $description, $location, $link_google_map, $status, $id);
    $stmt->execute();
    
    // Handle new images if uploaded
    foreach ($_FILES['images']['name'] as $index => $image_name) {
        $target_dir = "buildings_images/";
        $target_file = $target_dir . basename($image_name);
        
        if (move_uploaded_file($_FILES['images']['tmp_name'][$index], $target_file)) {
            $img_stmt = $conn->prepare("INSERT INTO house_images (house_id, image) VALUES (?, ?)");
            $img_stmt->bind_param("is", $id, $target_file);
            $img_stmt->execute();
        }
    }
    $stmt->close();
    echo '<script>
    window.location.href = "my_advertisements.php";
</script>';
}

// Handle Delete House and Its Images
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM houses WHERE id=$id");

    // Fetch and delete images
    $images_result = $conn->query("SELECT image FROM house_images WHERE house_id=$id");
    while ($img = $images_result->fetch_assoc()) {
        unlink($img['image']); // Delete image file
    }
    $conn->query("DELETE FROM house_images WHERE house_id=$id"); // Delete image records
    echo '<script>
    window.location.href = "my_advertisements.php";
</script>';
}

?>
