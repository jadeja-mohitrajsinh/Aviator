 document.getElementById('signInForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const username = this.elements.signInUsername.value;
      const password = this.elements.signInPassword.value;

      // Call a function to handle sign-in using PHP and Firebase
      signInUser(username, password);
    });

    document.getElementById('signUpForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const username = this.elements.signUpUsername.value;
      const email = this.elements.signUpEmail.value;
      const password = this.elements.signUpPassword.value;

      // Call a function to handle sign-up using PHP and Firebase
      signUpUser(username, email, password);
    });

    function signInUser(username, password) {
      fetch('auth-post.php', {
        method: 'POST',
        body: new URLSearchParams({
          action: 'signIn',
          username: username,
          password: password
        }),
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      })
        .then(response => response.json())
        .then(data => {
          // Handle the response data (success or error)
          console.log(data);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

    function signUpUser(username, email, password) {
      // Add AJAX or fetch to send data to your PHP script for sign-up
      // You can use the fetch API or jQuery.ajax
      // Example using fetch:
      fetch('auth.php', {
        method: 'POST',
        body: new URLSearchParams({
          action: 'signUp',
          username: username,
          email: email,
          password: password
        }),
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      })
        .then(response => response.json())
        .then(data => {
          // Handle the response data (success or error)
          console.log(data);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }