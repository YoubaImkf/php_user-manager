<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/connection.css">
    <link rel="icon" href="assets/icon/beard-svgrepo-com.svg" />
</head>
<body>
    <div class="container">
        <form class="container__form" action="created" method="post">
            <h1 class="form__title" >Create an account</h1>
            <img class="form__img" src="assets/add-user-svgrepo-com.svg" alt="">

            <label class="form__label" for="email">Create Email</label>
                <input class="form__input" type="email" name="email" id="email" required>

            <label class="form__label" for="password">Create Password</label>
                <input class="form__input" type="password" name="password" id="password" onChange="onChange()" 
               required>
            <label class="form__label" for="password">Confirm Password</label>
                <input class="form__input" type="password" name="confirm" id="confirm" onChange="onChange()" 
                required >
                
            <input class="form__input--submit" type="submit" value="create">
        </form>
        <div class="container__options">
            <span class="options__span"> <a href="connection">log in ?</a> </span>
        </div>
    </div>
 <!--pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"--> 


    <script>
        function onChange() {
            const password = document.querySelector('input[name=password]');
            const confirm = document.querySelector('input[name=confirm]');
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('Passwords do not match');
            }
        }
    </script>
</body>
</html>





