<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="icon" href="assets/icon/beard-svgrepo-com.svg" />
</head>

<body>

    <div id="sidenav" class="sidenav">
        <a href="#" class="hamburger"></a>
        <a href="logout">
            <li class="active">Log out</li>
        </a>
        <a href="home">
            <li>Home</li>
        </a>
    </div>

    <div class="container" id="container">
        <ul class="container__list">
            <li class="list__item">firstName</li>
            <li class="list__item">lastName</li>
            <li class="list__item">adress</li>
            <li class="list__item">postalCode</li>
            <li class="list__item">city</li>
            <li class="list__item item--right">actions</li>
        </ul>
        <?php foreach ($users as $user) :  ?>
            <div class="container__lists">
                <ul class="container__list container__list--items">
                    <form class="list__form" action="index.php?uc=admin&action=update&id=<?= $user['id']; ?>" method='post'>
                        <li class="list__item list__item--input">
                            <input class="input__element" type="text" name="firstName" value="<?= $user['firstName']; ?>">
                        </li>

                        <li class="list__item list__item--input">
                            <input class="input__element" type="text" name="lastName" value="<?= $user['lastName']; ?>">
                        </li>
                        <li class="list__item list__item--input">
                            <input class="input__element" type="text" name="adress" value="<?= $user['adress']; ?>">
                        </li>
                        <li class="list__item list__item--input">
                            <input class="input__element" type="text" name="postalCode" value="<?= $user['postalCode']; ?>">
                        </li>
                        <li class="list__item list__item--input">
                            <input class="input__element" type="text" name="city" value="<?= $user['city']; ?>">
                        </li>

                </ul>
                <ul class="container__list">
                    <li class="list__item ">
                        <a class="item__delete" href="index.php?uc=admin&action=delete&id=<?= $user['id']; ?>">
                            <img src="assets/delete-svgrepo-com.svg" title="delete the user" alt="bin">
                        </a>
                    </li>
                    <li class="list__item list__item--button">
                        <button type="submit" class="item__update" title="click on the field to modify it"> Modifier </button>
                    </li>
                </ul>
                </form>
            </div>
        <?php endforeach; ?>

        <section class="container__modal ">
            <a class="link__add" href="#formulaire" title="add a simple user">Add an user</a>
            <form class="add__form display-none container__list--items" action="index.php?uc=admin&action=createUser" method="post">

                <div class="form__left-part" id="formulaire">
                    <label class="form__label" for="firstName">First Name</label>
                    <input class="form__input" type="text" name="firstName" placeholder="firstName">
                    <label class="form__label" for="lastName">Last Name</label>
                    <input class="form__input" type="text" name="lastName" placeholder="lastName">
                    <label class="form__label" for="email">Email</label>
                    <input class="form__input" type="email" name="email" placeholder="email">
                    <label class="form__label" for="password">Password</label>
                    <input class="form__input" type="password" name="password" placeholder="password">
                </div>

                <div class="form__right-part">
                    <label class="form__label" for="adress">Adress</label>
                    <input class="form__input" type="text" name="adress" placeholder="adress">
                    <label class="form__label" for="postalCode">Postal Code</label>
                    <input class="form__input" type="number" name="postalCode" placeholder="postalCode">
                    <label class="form__label" for="city">City</label>
                    <input class="form__input" type="text" name="city" placeholder="city">


                    <button class="form__input input__submit" type="submit" name="submit">Submit</button>
                </div>

    </div>
    </section>

    </div>

    <script>
        // confirm delete
        const deleteButtons = document.querySelectorAll('.item__delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const confirm = window.confirm('Are you sure you want to delete this user ?');
                if (confirm) {
                    window.location.href = button.href;
                }
            })
        })

        var a = document.querySelector('.link__add');
        var form = document.querySelector('.add__form');

        a.addEventListener('click', (e) => {
            // e.preventDefault();
            form.classList.toggle('display-none');
        })

        // let inputs = document.querySelectorAll('.input__element');

        // inputs.forEach(input => {
        //     input.addEventListener('mouseover', function() {
        //     input.classList.remove('input__element');
        //     });
        // });
        // inputs.forEach(input => {
        //     input.addEventListener('mouseout', function() {
        //     input.classList.add('input__element');
        //     });
        // });

        // var inputs = document.querySelectorAll('.input__element');
        // inputs.onmouseover = function(event){
        //         event.classList.toggle("active");
        // }
    </script>

    <script src="js/nav.js"></script>
</body>

</html>