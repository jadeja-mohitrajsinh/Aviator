var isSubmitting = false;

function submitForm() {
    // Check if the form is already being submitted
    if (isSubmitting) {
        return;
    }

    // Set the flag to indicate that form submission is in progress
    isSubmitting = true;

    // Client-side validation
    var name = $('#name').val().trim();
    var email = $('#email').val().trim();
    var message = $('#message').val().trim();

    if (name === '' || email === '' || message === '') {
        alert('Please fill in all the required fields.');
        // Reset the flag if validation fails
        isSubmitting = false;
        return;
    }

    // Disable the submit button during the AJAX request
    $('#submitBtn').prop('disabled', true);

    // Form submission with AJAX
    var formData = $('#contactForm').serialize();

    $.ajax({
        type: 'POST',
        url: 'contact-post.php',
        data: formData,
        contentType: 'application/x-www-form-urlencoded',
        success: function (response) {
            alert('Form submitted successfully!');
            // Call the cancelForm() function after successful form submission
            cancelForm();
            // You can handle the response as needed
        },
        error: function (xhr, status, error) {
            console.error('Error submitting form:', xhr, status, error);
        },
        complete: function () {
            // Enable the submit button after completion
            $('#submitBtn').prop('disabled', false);
            // Reset the flag after completion
            isSubmitting = false;
        }
    });
}

function cancelForm() {
    // Clear the form
    document.getElementById('contactForm').reset();
}
