var isSubmitting = false;

function submitForm() {
    if (isSubmitting) {
        return;
    }

    isSubmitting = true;

    // Client-side validation
    var name = $('#name').val().trim();
    var email = $('#email').val().trim();
    var message = $('#message').val().trim();

    if (name === '' || email === '' || message === '') {
        alert('Please fill in all the required fields.');
        isSubmitting = false;
        return;
    }

    $('#submitBtn').prop('disabled', true);

    var formData = $('#contactForm').serialize();

    $.ajax({
        type: 'POST',
        url: 'contact-post.php',
        data: formData,
        contentType: 'application/x-www-form-urlencoded',
        success: function (response) {
            alert('Form submitted successfully!');
            cancelForm();
        },
        error: function (xhr, status, error) {
            console.error('Error submitting form:', xhr, status, error);
        },
        complete: function () {
            $('#submitBtn').prop('disabled', false);
            isSubmitting = false;
        }
    });
}

function cancelForm() {
    document.getElementById('contactForm').reset();
}
