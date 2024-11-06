function alertMessage(title, icon = 'success', position = 'bottom-start') {
    Swal.fire({
        position: position,
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: 1500
    });
}

function confirmAlert(title, text, icon, ) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Success!",
                text: "Completed successfully.",
                icon: "success",
                timer: 1500,
                showConfirmButton: false
            });
        }
    });
}

function customAlert(title, text, icon, onConfirm) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            // Call the onConfirm function if provided
            if (typeof onConfirm === 'function') {
                onConfirm(); // Execute the passed function
            }
            // Show success message
            Swal.fire({
                title: "Success!",
                text: "Operation completed successfully.",
                icon: "success",
                timer: 1500,
                showConfirmButton: false
            });
        }
    });
}

// // Usage example
// $("#form-submit").click(function(event) {
//     event.preventDefault(); // Prevent default form submission
//     customAlert(
//         "Are you sure you want to delete this file?",
//         "This action cannot be undone!",
//         "warning",
//         function() {
//             // Action to perform when confirmed
//             // For example, submit the form or perform an AJAX request
//             console.log("Form submitted or file deleted!"); // Replace this with actual logic
//             $("form").submit(); // Example: submitting the form
//         }
//     );
// });