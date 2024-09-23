<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;

            background-image: radial-gradient(circle, #2a2a2a, #121212);

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #ffffff;

        }

        .password-reset-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .password-reset-box {
            background-color: #1e1e1e;

            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);

            width: 100%;
            max-width: 400px;
        }

        .password-reset-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ffffff;

            text-align: center;
        }

        .password-reset-box form {
            display: flex;
            flex-direction: column;
        }

        .password-reset-box label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #cccccc;

        }

        .password-reset-box input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #444444;

            border-radius: 4px;
            font-size: 16px;
            background-color: #333333;

            color: #ffffff;

        }

        .password-reset-box input:focus {
            border-color: #007BFF;

            outline: none;
        }

        .password-reset-box button {
            padding: 10px;
            background-color: #007BFF;

            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .password-reset-box button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: #ff4c4c;

            font-size: 14px;
            margin-bottom: 10px;
            display: none;
        }


        .error-message {
            color: #ff4c4c;

            font-size: 14px;
            margin-bottom: 10px;
            display: none;
            text-align: center;

        }
    </style>
</head>

<body>
    <div class="password-reset-container">
        <div class="password-reset-box">
            <h2>Reset Your Password</h2>
            <form id="resetPasswordForm" method="post" action="app/password_reset.php">
                <label for="username">License Number</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>

                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password" required>

                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password"
                    required>

                <div id="passwordError" class="error-message"></div>

                <button type="submit">Update Password</button>
            </form>
        </div>
    </div>

    <script>

        document.getElementById('resetPasswordForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const email = document.getElementById('username').value.trim();
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const passwordError = document.getElementById('passwordError');

            let isValid = true;


            passwordError.textContent = '';


            if (newPassword.length < 8) {
                passwordError.textContent = 'Password must be at least 8 characters long.';
                passwordError.style.display = 'block';
                isValid = false;
            } else if (!/[A-Z]/.test(newPassword) || !/[0-9]/.test(newPassword)) {
                passwordError.textContent = 'Password must include at least one uppercase letter and one number.';
                passwordError.style.display = 'block';
                isValid = false;
            }


            if (newPassword !== confirmPassword) {
                passwordError.textContent = 'Passwords do not match.';
                passwordError.style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                passwordError.style.display = 'none';
                this.submit();
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }


    </script>
</body>

</html>