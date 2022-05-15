<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animelette</title>
    <!-- Custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom-styles.css')?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
</head>
<?php $fullPath = base_url('Home') ?>
<body class="login-body">
    <nav class="navbar navbar-expand-lg">
        <div class="container text-cemter">
            <a class="navbar-brand" href="index">ANIMELETTE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-6"></div>
                <div class="col-6 ms-4">
                    <div class="container">
                        <ul class="navbar-nav mb-2 mb-lg-0 align-self-end">
                            <li class="nav-item">
                                <a class="nav-link me-2" aria-current="page" href="<?= $fullPath ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" aria-current="page" href="<?= $fullPath."/explore" ?>">Explore</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-4" aria-current="page" href="<?= $fullPath."/reviews" ?>">Reviews</a>
                            </li>
                            <li class="nav-item dropdown align-self-center">
                                <?php if(isset($sessionData)){?>
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $sessionData->username ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a id="profile-option" class="dropdown-item" href="<?= $fullPath."/profile" ?>">Profile</a></li>
                                        <li><a id="profile-option" class="dropdown-item" href="<?= $fullPath."/logout" ?>">Logout</a></li>
                                    </ul>
                                <?php }else{ ?>
                                <button class="btn-purple px-4"><a href="<?= $fullPath."/login" ?>">LOG IN</a></button>
                                <?php } ?>
                            </li>
                        </ul>                         
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="container-fluid login-section py-4">
        <article class="custom-container px-0">
            <div class="d-flex flex-row">
                <div class="col-6 d-none d-xl-block">
                    <div class="container p-0">
                        <!-- Carousel -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= base_url('assets/img/login-banner-1.png') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Share your thougths</h5>
                                        <p>Write reviews and share them with the comunity. Rate and give award to other writters.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/img/login-banner-2.png') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Rate your favourite series</h5>
                                        <p>Add your favourite anime to your list and give it an appropiate score</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>
                
                <div class="col-xl-6 col-lg-12 align-self-center text-start">
                    <div class="container px-5">
                        <p class="main pb-2 mb-0">New Account</p>
                        <p class="sub pb-2 mb-0">Welcome to our site (･‿･) this is gonna be really quick!</p>
                        <?= form_open('Home/register') ?>
                            <div class="mb-4">
                                <label for="username" class="form-label visually-hidden">Username</label>
                                <?php if (isset($error)) { echo "<p class=\"error-form text-start\">Seems that some data is missing or is incorrect, check if everything is ok</p>"; }?>
                                <?= form_input(
                                        'username',
                                        !isset($dataPost['username']) ? '' : $dataPost['username'],
                                        $att = ['class' => 'form-control shadow-none p-3','placeholder' => 'Write a cool name such as "Ninja spaghetti"', 'id' => 'username'],
                                        'text'
                                    ) ;
                                    if (isset($error['username']) && $error['username'] == '*This username is already taken, sorry but you must choose another one') { echo "<p class=\"error-form text-start\">".$error['username']."</p>"; };
                                ?>
                            </div>
                            <div class="mb-4">
                                <label for="passwd1" class="form-label visually-hidden">Password</label>
                                <?= form_input(
                                        'passwd1',
                                        '',
                                        $att = ['class' => 'form-control shadow-none p-3','placeholder' => 'Write a super strong password', 'id' => 'passwd1'],
                                        'password'
                                    ) ;
                                ?>
                            </div>
                            <div class="mb-4">
                                <label for="passwd2" class="form-label visually-hidden">Repeat the password</label>
                                <?= form_input(
                                        'passwd2',
                                        '',
                                        $att = ['class' => 'form-control shadow-none p-3','placeholder' => 'Repeat the super strong password', 'id' => 'passwd2'],
                                        'password'
                                    ) ;
                                    if (isset($error['passwd2']) && $error['passwd2'] == '*Both passwords must match') { echo "<p class=\"error-form text-start\">".$error['passwd2']."</p>"; };
                                ?>
                            </div>
                            <!-- Gender and location -->
                            <div class="row g-3 align-items-center mb-4">
                                <div class="col-6">
                                    <label for="gender" class="form-label visually-hidden" require>Gender</label>
                                    <select class="form-select shadow-none" name="gender" id="gender" aria-label="Coose your gender">
                                        <option selected disabled>How do you see your self?</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Ninja">Ninja!</option>
                                    </select>                                    
                                </div>
                                <div class="col-6">
                                    <label for="location" class="form-label visually-hidden">Location</label>
                                    <select class="form-select shadow-none" name="location" id="location" aria-label="Coose your location" require>
                                        <option selected disabled>Your place in the world</option>
                                        <option value="Europe">Europe</option>
                                        <option value="Asia">Asia</option>
                                        <option value="Africa">Africa</option>
                                        <option value="America  ">America</option>
                                        <option value="Oceania">Oceania</option>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="birth" class="form-label visually-hidden">Birthdate</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text px-4" id="basic-addon1"><span class='bx bxs-cake' id="icon"></span></span>
                                    <?= form_input(
                                            'birth',
                                            !isset($dataPost['birth']) ? '' : $dataPost['birth'],
                                            $att = ['class' => 'form-control shadow-none p-3','placeholder' => 'Birthdate', 'id' => 'birth', 'min' => '1950-01-01', 'max' => '2012-12-31'],
                                            'date'
                                        ) ;
                                    ?>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mb-4">
                                <?= form_input(
                                    'register',
                                    'JOIN NOW',
                                    $att = ['class' => 'btn btn-purple shadow-none'],
                                    'submit'
                                ) 
                                ?>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>

        </article>
    </section>
</body>
</html>