 function validateForm() {
      const name = document.forms["contactForm"]["name"].value.trim();
      const email = document.forms["contactForm"]["email"].value.trim();
      const message = document.forms["contactForm"]["message"].value.trim();
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let errorMessage = "";

      if (name === "") {
        errorMessage += "Name is required.\n";
      }
      if (email === "") {
        errorMessage += "Email is required.\n";
      } else if (!emailRegex.test(email)) {
        errorMessage += "Invalid email format.\n";
      }
      if (message === "") {
        errorMessage += "Message is required.\n";
      }

      if (errorMessage !== "") {
        alert(errorMessage);
        return false;
      }

      alert("Message sent successfully!");
      return true;
    }