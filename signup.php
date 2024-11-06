<?php include 'header.php'; ?>
<?php
// Initialize error messages
$errorMessages = [];
$fname = $lname = $phone = $email = $password = $confirmPassword = '';
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Validate fields
    if (empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($password)) {
        $errorMessages[] = "All fields are required.";
    }

    // Validate phone number
    if (!preg_match('/^05\d{8}$/', $phone)) {
        $errorMessages[] = "Phone number must be 10 digits and start with 05.";
    }

    // Check for unique email
    $emailQuery = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $emailQuery->bind_param("s", $email);
    $emailQuery->execute();
    $emailQuery->bind_result($emailCount);
    $emailQuery->fetch();

    if ($emailCount > 0) {
        $errorMessages[] = "Email already exists.";
    }
    // Validate password match
    if ($password !== $confirmPassword) {
        $errorMessages[] = "Passwords do not match.";
    }

    // Free the result set
    $emailQuery->free_result();
    $emailQuery->close();

    // If there are no validation errors, proceed to register the user
    if (empty($errorMessages)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, phone, email, password, user_type) VALUES (?, ?, ?, ?, ?, ?)");
        $userType = 'rented_user'; // Set a default user type
        $stmt->bind_param("ssssss", $fname, $lname, $phone, $email, $hashedPassword, $userType);

        if ($stmt->execute()) {
            echo '<script>
                    alert("Registration successful!");
                        window.location.href = "login.php";
                  </script>';
        } else {
            $errorMessages[] = "Registration failed. Please try again.";
        }

        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>

<?php if (!empty($errorMessages)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errorMessages as $message) : ?>
            <p><?php echo $message; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<div class="pb-3">
    <div class="align-items-center d-flex flex-column justify-content-center gap-2 w-100 h-100">
        <div style="width: 150px;height: 150px;">
            <img class="h-100 w-100" src="assets/images/icons/user.png">
        </div>
        <form action="signup.php" class="row row-cols-3 g-2 w-100" method="POST">
            <div>
                <p class="text-green fw-bold">* الاسم الاول: </p>
                <input type="text" class="input w-100" name="fname" value="<?php echo $fname; ?>">
            </div>
            <div>
                <p class="text-green fw-bold">* الاسم الاخير: </p>
                <input type="text" class="input w-100" name="lname" value="<?php echo $lname; ?>">
            </div>
            <div>
                <p class="text-green fw-bold">* الرقم الجوال: </p>
                <input type="tel" class="input w-100" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div>
                <p class="text-green fw-bold">* كلمة المرور: </p>
                <input type="password" class="input w-100" name="password" value="<?php echo $password; ?>">
            </div>
            <div>
                <p class="text-green fw-bold">* تاكيد كلمة المرور: </p>
                <input type="password" class="input w-100" name="confirm_password" value="<?php echo $confirmPassword; ?>">
            </div>
            <div>
                <p class="text-green fw-bold">* البريد الالكتروني: </p>
                <input type="email" class="input w-100" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <p class="text-green fw-bold">* نوع المستخدم: </p>
                <select name="user_type" class="input w-100">
                    <option value="rented_user">مؤجر</option>
                    <option value="tenant_user">مستاجر</option>
                </select>
            </div>
            <div class="d-flex justify-content-end w-100 mt-4">
                <button class="btn-green rounded-large">التالي</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>