<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="signup.css">
        <title>Sign Up</title>
    </head>

    <body>
        <section class="container">
            <header><h1>Registration Form</h1></header>
            <form action="addDonor.php" method="post" class="form">
                <div class = "input-box">
                    <label>Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>

                <div class = "input-box">
                    <label>Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class = "input-box">
                    <label>Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>   

                <div class="column">
                    <div class = "input-box">
                        <label>Phone Number:</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div> 

                    <div class = "input-box">
                        <label>Birth Date:</label>
                        <input type="date" id="birthdate" name="birthdate" required>
                    </div> 
                </div>

                <div class="gender-box">
                    <h3>Gender</h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="male" name="gender" value="0" required/>
                            <label for="check">Male</label>
                        </div> 
                        <div class="gender">
                            <input type="radio" id="female" name="gender" value="1" required/>
                            <label for="check">Female</label>
                        </div> 
                    </div>    
                </div>
                
                <button>Submit</button>
                <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
            </form>
        </section>
    </body>
</html>
