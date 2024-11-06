<?php 
include "header.php"; 
// Fetch houses with their first image
$query = "
    SELECT houses.*, house_images.image
    FROM houses
    LEFT JOIN (
        SELECT house_id, image
        FROM house_images
        GROUP BY house_id
    ) AS house_images ON houses.id = house_images.house_id";
$result = $conn->query($query);
?>

<div class="flex items-center w-100 h-100 overflow-auto justify-center">
    <div class="container h-100">
        <div class="row row-cols-2">
            <?php while ($house = $result->fetch_assoc()): ?>
                <div>
                    <a href="advertisement_detial.php?id=<?php echo $house['id']; ?>">
                        <div class="rounded-card flex flex-gap">
                            <!-- Display the first image or a placeholder if no image is available -->
                            <img src="<?php echo $house['image'] ? "buildings_images/".$house['image'] : 'assets/images/default-placeholder.png'; ?>" height="200" width="150">
                            <div class="text-green fw-bold fa-2xs">
                                <h1 style="font-size: 1.5rem;"><?php echo $house['title']; ?></h1>
                                <div class="mt-4 flex flex-gap flex-column">
                                    <p>
                                        <i class="fa fa-dollar"></i>
                                        <span><?php echo $house['price']; ?> </span>
                                    </p>
                                    <p>
                                        <i class="fa fa-square"></i>
                                        <span><?php echo $house['distance']; ?>  </span>
                                    </p>
                                    <p>
                                        <i class="fa fa-building"></i>
                                        <span><?php echo $house['description']; ?> </span>
                                    </p>
                                    <p>
                                        <i class="fa fa-map-location"></i>
                                        <span><?php echo $house['location']; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
