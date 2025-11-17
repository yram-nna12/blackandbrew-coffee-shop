// Handle contact form submission with SweetAlert + fetch
document.addEventListener('DOMContentLoaded', () => {

  // Get the form element
  const form = document.getElementById('contactForm');
  if (!form) return; // Stop if form doesn't exist

  // CSRF hidden input (CodeIgniter auto-generates csrf_xxx)
  const csrfInput = form.querySelector('input[name^="csrf_"]');

  // When the form is submitted
  form.addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent default page reload

    const formData = new FormData(form); // Collect form data

    // Show "sending" loading popup
    Swal.fire({
      title: 'Sending...',
      text: 'Please wait.',
      allowOutsideClick: false,
      didOpen: () => Swal.showLoading()
    });

    try {
      // Send form via AJAX to controller
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData
      });

      // Parse JSON response
      const data = await response.json();

      // Update CSRF token if backend returns new one
      if (data.csrf && csrfInput) {
        csrfInput.value = data.csrf;
      }

      // Success message
      if (data.status === 'success') {
        Swal.fire({
          icon: 'success',
          title: 'Sent!',
          text: data.message,
          timer: 3000,
          showConfirmButton: false
        });
        form.reset(); // Clear form
      }

      // Validation errors (field errors)
      else if (data.status === 'error' && data.errors) {
        Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: Object.values(data.errors).join('\n')
        });
      }

      // General / unknown errors
      else {
        const debugHtml = data.debug
          ? `<pre style="text-align:left;max-height:200px;overflow:auto">${data.debug}</pre>`
          : '';

        Swal.fire({
          icon: 'error',
          title: 'Error',
          html: (data.message || 'Something went wrong.') + debugHtml
        });
      }
    }

    // Network/server error (offline, server down, etc.)
    catch (err) {
      Swal.fire({
        icon: 'error',
        title: 'Network Error',
        text: 'Please try again later.'
      });
    }
  });

  // LocalStorage email autofill
  const emailInput = document.getElementById('email');
  if (emailInput) {

    // If saved email exists and user hasn't typed yet — preload it
    if (localStorage.getItem('contactEmail') && !emailInput.value) {
      emailInput.value = localStorage.getItem('contactEmail');
    }

    // Save email automatically when user edits the field
    emailInput.addEventListener('change', () => {
      localStorage.setItem('contactEmail', emailInput.value);
    });
  }
});
