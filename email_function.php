use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

function sendEmail($email, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Expressauto005@gmail.com'; // your email address
        $mail->Password = 'nptozytnbqbqfjfu';         // your email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipient and content
        $mail->setFrom('Expressauto005@gmail.com', 'Your Name');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send email
        if ($mail->send()) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'تم ارسال رمز التاكيد بنجاح',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.replace('verify.php');
                });
            </script>
            ";
        }
    } catch (Exception $e) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطأ في الارسال',
                text: 'حدث خطأ أثناء إرسال الرسالة: {$mail->ErrorInfo}',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.replace('login.php');
            });
        </script>
        ";
    }
}

// Example usage
$email = 'recipient@example.com';
$subject = 'رمز التاكيد';
$code = '123456';
$body = "<h1 style='color:green;text-align:center'> رمز التاكيد <br> {$code}</h1>";
sendEmail($email, $subject, $body);
