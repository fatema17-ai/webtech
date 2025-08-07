document.getElementById("donationForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let isValid = true;

    function showError(id, message) {
        document.getElementById(id + "Error").textContent = message;
        isValid = false;
    }

    function clearError(id) {
        document.getElementById(id + "Error").textContent = "";
    }

    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();
    const address1 = document.getElementById("address1").value.trim();
    const city = document.getElementById("city").value.trim();
    const zip = document.getElementById("zip").value.trim();
    const email = document.getElementById("email").value.trim();
    const state = document.getElementById("state").value;
    const country = document.getElementById("country").value;
    const donationRadios = document.getElementsByName("donation");

    ["firstName", "lastName", "address1", "city", "zip", "email", "state", "country", "donation"].forEach(clearError);

    if (firstName === "") showError("firstName", "First Name is required.");
    if (lastName === "") showError("lastName", "Last Name is required.");
    if (address1 === "") showError("address1", "Address is required.");
    if (city === "") showError("city", "City is required.");
    if (state === "") showError("state", "Please select a state.");
    if (country === "") showError("country", "Please select a country.");

    if (!/^\d{5}$/.test(zip)) showError("zip", "Enter a valid 5-digit Zip Code.");

    if (email === "") {
        showError("email", "Email is required.");
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        showError("email", "Enter a valid email address.");
    }

    let donationSelected = false;
    for (let i = 0; i < donationRadios.length; i++) {
        if (donationRadios[i].checked) {
            donationSelected = true;
            break;
        }
    }
    if (!donationSelected) showError("donation", "Please select a donation amount.");

    if (isValid) {
        alert("Form submitted successfully!");
        // this.submit(); // Enable if you want actual form submission
    }
});
