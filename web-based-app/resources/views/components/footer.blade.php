<hr>
<footer class="footer">
    <div class="container">
        <img src="{{ asset('assets/logo_.jpg') }}" alt="Company Logo" class="footer-logo">
        <div class="social-media-icons text-center">
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>         
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
        </div>
        <p class="text-center text-muted">Copyright &copy; 2024</p>
    </div>
</footer>
<style>
        .footer {
            background-color: white; /* Dark background color */
            color: black; /* White text color */
            padding: 20px 0; /* Padding for top and bottom */
        }

        .container {
            max-width: 1200px; /* Maximum width for the container */
            margin: 0 auto; /* Center the container */
            text-align: center; /* Center text */
        }

        .footer-logo {
            width: 50px; /* Logo size */
            margin-bottom: 15px; /* Space below the logo */
        }

        .social-media-icons {
            font-size: 20px; /* Size of the icons */
            margin-bottom: 15px; /* Space below the icons */
        }

        .social-icon {
            color: black; /* Icon color */
            margin: 0 10px; /* Space between icons */
            text-decoration: none; /* Remove underline */
        }

        .social-icon:hover {
            color: #007bff; /* Change color on hover (Bootstrap primary color) */
        }

        .text-muted {
            color: #bbb; /* Muted text color for copyright */
            font-size: 14px; /* Font size for copyright */
        }
</style>