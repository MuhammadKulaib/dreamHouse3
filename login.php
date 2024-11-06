<?php include "header.php" ?>
<?php
// Initialize error message
$errorMessage = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        $errorMessage = "All fields are required.";
    } else {
        // Prepare SQL query to fetch user data by email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            // Fetch user data
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Store the entire user data in the session
                $_SESSION['user_data'] = $row;

                // Redirect based on user_type
                if ($row['user_type'] == 'rented_user') {
                    header("Location: my_advertisements.php");
                } elseif ($row['user_type'] == 'tenant_user') {
                    header("Location: index.php");
                }
                exit;
            } else {
                $errorMessage = "Incorrect password.";
            }
        } else {
            $errorMessage = "No account found with this email.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<?php if (!empty($errorMessage)) : ?>
    <div class="alert alert-danger">
        <?php echo $errorMessage; ?>
    </div>
<?php endif; ?>
<div class="flex justify-center items-center w-100 h-100 flex-column flex-gap">
    <form class="row" method="post" action="login.php">
        <div class="">
            <p class="text-green fw-bold">* الايميل: </p>
            <input type="email" class="input mt-3 w-100" name="email">
        </div>
        <div class="mt-4">
            <p class="text-green fw-bold">* كلمة المرور: </p>
            <input type="password" class="input mt-3 w-100" name="password">
        </div>
        <div class="mt-4">
            <button class="btn-green rounded-large" type="submit">تسجيل الدخول</button>
        </div>
    </form>
</div>

<?php include "footer.php" ?>