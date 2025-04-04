//chart.js
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById('healthChart').getContext('2d');

    var healthChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: JSON.parse(document.getElementById('chartData').dataset.labels), // X-axis labels
            datasets: [{
                label: 'BMI Category Count',
                data: JSON.parse(document.getElementById('chartData').dataset.counts), // Y-axis values
                backgroundColor: ['blue', 'red', 'lightgreen', 'purple', 'cyan'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});


document.getElementById('toggle-password').addEventListener('click', function () {
    var passwordInput = document.getElementById('password');
    var icon = this.querySelector('i');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
    }
});
document.getElementById('toggle-password-confirm').addEventListener('click', function () {
    var passwordInput = document.getElementById('password_confirmation');
    var icon = this.querySelector('i');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
    }
});

function checkPasswordMatch() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password_confirmation").value;
    const errorDisplay = document.getElementById("password_error");
    const submitBtn = document.getElementById("submitBtn");

    if (password !== confirmPassword) {
        errorDisplay.style.display = "block";
        submitBtn.disabled = true; // Disable the submit button if passwords don't match
    } else {
        errorDisplay.style.display = "none";
        submitBtn.disabled = false; // Enable the submit button if passwords match
    }
}

function validateForm() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password_confirmation").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false; // Prevent form submission if passwords do not match
    }
    return true; // Allow form submission if passwords match
}

// Attach the checkPasswordMatch function to input events for real-time feedback
document.getElementById("password").addEventListener("input", checkPasswordMatch);
document.getElementById("password_confirmation").addEventListener("input", checkPasswordMatch);
