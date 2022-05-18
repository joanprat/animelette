<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animelette</title>
    <!-- Custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom-styles.css')?>">
    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>
<?php $fullPath = base_url('Home') ?>
<body class="profile-body">
    <nav class="navbar navbar-expand-lg nav-background-opacity">
        <div class="container text-cemter">
            <a class="navbar-brand" href="<?= $fullPath ?>">ANIMELETTE</a>
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
                                        <li><a id="profile-option" class="dropdown-item" href="<?= $fullPath."/profile"."/".$sessionData->userId ?>">Profile</a></li>
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
    <section class="container-fluid text-center m-0 p-0">
        <article class="container-fluid px-0 profile-head">
            <div class="container-fluid banner px-0">
                <img class="image-fluid" src="<?= base_url('assets/pictures').'/'.$userData['banner']?>" alt="Banner of the user">
            </div>
            <div class="container pfp">
                <img class="image-fluid" src="<?= base_url('assets/pictures').'/'.$userData['profilePic']?>" alt="Profile picture">
                <p class="my-2"><?= $userData['username'] ?></p>
                <p class="engagement my-2"><span class='bx bxs-hot'></span> <?= $userData['engagement'] ?></p>
            </div> 
        </article>
        <article class="container profile-body">
            <div class="d-flex flex-row">
                <div class="col-3 d-none d-lg-block">
                    <!-- User data -->
                    <div class="container">
                        <div class="d-flex flex-row">
                            <button type="submit" class="btn btn-purple me-2"> <a href="<?= $fullPath."/animelist"."/".$userData['idUser']."/0" ?>">AnimeList</a></button>
                            <?php if(!isset($currentUser) && $userData['follow']){ ?>
                            <button class="btn btn-pink-active me-2" onclick="follow(this, <?=$sessionData->userId?>)" value="<?= $userData['idUser'] ?>">Following</button>
                            <?php } ?>
                            <?php if(!isset($currentUser) && !$userData['follow']){ ?>
                            <button class="btn btn-pink me-2" onclick="follow(this, <?=$sessionData->userId?>)" value="<?= $userData['idUser'] ?>">Follow</button>
                            <?php } ?>
                        </div>
                        <div class="container-fluid white-container my-4 p-4 text-start">
                            <div class="d-flex flex-row">
                                <div class="col-6">
                                    <p class="title me-5">Joined</p>                                    
                                </div>
                                <div class="col-6">
                                    <p><?= $userData['joinDate'] ?></p>                                    
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="col-6">
                                    <p class="title me-5">Gender</p>                                    
                                </div>
                                <div class="col-6">
                                    <p><?= $userData['gender'] ?></p>                                    
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="col-6">
                                    <p class="title me-5">Location</p>                                    
                                </div>
                                <div class="col-6">
                                    <p><?= $userData['location'] ?></p>                                    
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="col-6">
                                    <p class="title me-5">Birthday</p>                                    
                                </div>
                                <div class="col-6">
                                    <p><?= $userData['birthDate'] ?></p>                                    
                                </div>
                            </div>
                            <div class="d-flex flex-row engagement">
                                <div class="col-6">
                                    <p class="title me-5">EP <span class='bx bxs-hot'></span></p>                                    
                                </div>
                                <div class="col-6">
                                    <p><?= $userData['engagement'] ?></p>                                    
                                </div>
                            </div>
                            <div class="d-flex flex-row followers">
                                <div class="col-6">
                                    <p class="title me-5">Followers</p>                                    
                                </div>
                                <div class="col-6">
                                    <p><?= $userData['followers'] ?></p> 
                                </div>
                            </div>
                        </div>
                        <!-- Reviews -->
                        <div class="container white-container py-4">
                            <p class="title">Reviews</p>
                            <p>To do</p>
                        </div>  
                    </div>
            
                </div>
                <div class="col-lg-9 col-12 white-container right-container p-4">
                    <div class="container mb-5 d-lg-none d-xl-none">
                        <div class="d-flex flex-row">
                            <button type="submit" class="btn btn-purple me-2"> <a href="<?= $fullPath."/animelist"."/".$userData['idUser'] ?>">AnimeList</a></button>
                            <?php if(!isset($currentUser) && $userData['follow']){ ?>
                            <button class="btn btn-pink-active me-2" onclick="follow(this, <?=$sessionData->userId?>)" value="<?= $userData['idUser'] ?>">Following</button>
                            <?php } ?>
                            <?php if(!isset($currentUser) && !$userData['follow']){ ?>
                            <button class="btn btn-pink me-2" onclick="follow(this, <?=$sessionData->userId?>)" value="<?= $userData['idUser'] ?>">Follow</button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="container text-start">
                        <p class="title">Description</p>
                        <p><?= $userData['bio'] ?></p>
                    </div>    
                    <hr class="my-5">
                    <!-- Graph & statics desktop -->
                    <div class="container text-start">
                        <p class="title">Anime statics</p>
                        <div class="d-flex flex-row ">
                            <div class="container d-none d-md-block col-6 align-self-center text-center">
                                <div class="d-flex flex-row graph">
                                    <div class="col-6">
                                        <p class="green">Watching</p>
                                        <p class="blue">Completed</p>
                                        <p class="yellow">On hold</p>
                                        <p class="red">Dropped</p>
                                        <p class="grey">Planning</p>
                                    </div>     
                                    <div class="col-6">
                                        <p><?= $userData['watching'] ?></p>
                                        <p><?= $userData['completed'] ?></p>
                                        <p><?= $userData['onhold'] ?></p>
                                        <p><?= $userData['dropped'] ?></p>
                                        <p><?= $userData['planning'] ?></p>
                                    </div>                                       
                                </div>
                            </div>
                            <!-- Statics mobile -->
                            <div class="container-fluid d-md-none d-lg-none d-xl-none col-12 text-start p-0">
                                <div class="d-flex flex-row graph">
                                    <div class="col-6">
                                        <p class="green">Watching</p>
                                        <p class="blue">Completed</p>
                                        <p class="yellow">On hold</p>
                                        <p class="red">Dropped</p>
                                        <p class="grey">Planning</p>
                                    </div>     
                                    <div class="col-6">
                                        <p><?= $userData['watching'] ?></p>
                                        <p><?= $userData['completed'] ?></p>
                                        <p><?= $userData['onhold'] ?></p>
                                        <p><?= $userData['dropped'] ?></p>
                                        <p><?= $userData['planning'] ?></p>
                                    </div>                                       
                                </div>
                            </div>
                            <div class="container d-none d-md-block col-6">
                                <canvas id="myChart" width="400" height="400"></canvas>
                                <script>
                                const ctx = document.getElementById('myChart').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {                                            
                                        labels: ['Watching', 'Completed', 'On Hold', 'Dropped', 'Planning'],
                                        datasets: [{
                                            label: 'anime',
                                            data: [<?= $userData['watching'] ?>, <?= $userData['completed'] ?>, <?= $userData['onhold'] ?>, <?= $userData['dropped'] ?>, <?= $userData['planning'] ?>],
                                            backgroundColor: [
                                                '#95CD41',
                                                '#548CFF',
                                                '#FFCC1D',
                                                '#F32424',
                                                '#73777B'
                                            ],
                                            borderColor: [
                                                '#95CD41',
                                                '#548CFF',
                                                '#FFCC1D',
                                                '#F32424',
                                                '#73777B'
                                            ],
                                            borderWidth: 2
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                            display: false
                                            }
                                        }
                                    }
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- Recent updates desktop -->
                    <hr class="my-5">
                    <div class="container text-start d-none d-sm-block">
                        <p class="title">Recent Anime Updates</p>
                        <?php
                            foreach ($recentAnime as $key => $anime) {
                                $txt = '';
                                $color = '';
                                switch ($anime['status']) {
                                    case 'watching':
                                        $color = 'green';
                                        $txt = "Watching";
                                        break;
                                    case 'completed':
                                        $color = 'blue';
                                        $txt = "Completed";
                                        break;
                                    case 'on hold':
                                        $color = 'yellow';
                                        $txt = "On Hold";
                                        break;
                                    case 'dropped':
                                        $color = 'red';
                                        $txt = "Dropped";
                                        break;
                                    case 'planning':
                                        $color = 'grey';
                                        $txt = "Planning";
                                        break;
                                }
                        ?>
                        <div class="container my-4 anime-box py-4">
                            <div class="d-flex flex-row">
                                <div class="col-2 align-self-center me-5">
                                    <div class="container">
                                        <a href="<?= $fullPath."/anime"."/".$anime['idAnime'] ?>"><img class="img-fluid" src="<?= base_url('assets/img')."/".$anime['img'] ?>" alt="Anime<?= $anime['idAnime'] ?>"></a>                                    
                                    </div>
                                </div>
                                <div class="col-10 align-self-center">
                                    <div class="container">
                                        <p class="anime-title"><a href="<?= $fullPath."/anime"."/".$anime['idAnime'] ?>"><?= $anime['nameJap'] ?></a></p>
                                        <div class="d-flex flex-row">
                                            <p class="<?= $color ?> me-4"><?= $txt ?><span class="mx-2"><?= $anime['episodeSeen']." / ".$anime['totalEpisodes'] ?></span> </p>
                                            <p class="score">Score<span class="mx-2"><?= $anime['score'] ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    </div>                 
                </div>
            </div>
        </article>
    </section>
</body>
</html>