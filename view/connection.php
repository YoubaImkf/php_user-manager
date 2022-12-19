
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link rel="stylesheet" href="css/connection.css">
    <link rel="icon" href="assets/icon/beard-svgrepo-com.svg" />
</head>
<body>
    <div class="container">
        <form class="container__form" action="control" method="post">
            <h1 class="form__title" >Log in</h1>
            <img class="form__img" src="assets/user-svgrepo-com.svg" alt="">

            <label class="form__label" for="email">Email</label>
                <input class="form__input" type="text" name="email" id="email" required>

            <label class="form__label" for="password">Password</label>
                <input class="form__input" type="password" name="password" id="password" required>
                
            <input class="form__input--submit" type="submit" value="Connection">

        </form>
        
        <div class="container__options">
            <span class="options__span"> <a href="create" title="create an Admin user" >create an account #ADMIN?</a> </span>
        </div>
    </div>


</body>
</html>





