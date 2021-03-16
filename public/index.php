<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog Professionnel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <!-- CSS -->
    <link href="css/blog.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"> 

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Blog // Corenthin FLAMAND</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#presentation">Présentation</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="articles.php">Articles</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="login.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#contact">Inscription</a>
                    </li>
                </ul>
            </div>
         </div>
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <h1>Bienvenue <br><span>sur mon Blog professionnel<span></h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non congue leo, in molestie dui. Nunc sit amet urna sit amet est luctus accumsan id id turpis. In hac habitasse platea dictumst. Donec dolor eros, cursus eget ante eu, facilisis ullamcorper tortor. Morbi orci nibh, semper malesuada ligula in, pretium varius est.
                </p>
            </div>
            <div class="row" id="articles-row">
                <p id="infos-articles">Retrouvez les articles via ce lien</p>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#global_modal" id="articles-button">
                    <a href="articles.php">Page des articles</a>
                </button>
            </div>
        </div>
    </header>

    <!-- Presentation -->
    <section id="presentation">
        <div class="container-fluid">
            <div class="row">
                <h2 id="section-name-presentation">Présentation</h2>
            </div>
            <div class="row" id="presentation-row">
                <div class="col-3" id="profile-pic">
                    <img src="img/anonym.jpg" alt="profile picture">
                </div>
                <div class="col-3" id="name-presentation">
                    <p id="title-name">Corenthin <br>FLAMAND<p>
                </div>
                <div class="col-6">
                    <p id="description-presentation">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non congue leo, in molestie dui. Nunc sit amet urna sit amet est luctus accumsan id id turpis. In hac habitasse platea dictumst. Donec dolor eros, cursus eget ante eu, facilisis ullamcorper tortor.
                    </p>
                </div>
            </div>
            <div class="row">
                <p id="cv-download">Vous pouvez retrouver mon CV<br><span>en cliquant sur le bouton juste en dessous</span></p>
            </div>
            <div class="row" id="cv-row">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#global_modal" id="cv-button">
                    <a download="CVCorenthinFlamand" href="img/pdf/CV_corenthin_flamand.pdf">Download</a>
                </button>
            </div>  
        </div>
    </section>

    <!-- Contact -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <h2 id="section-name-contact">Contact</h2>
            </div>
            <form id="contact-form">
                <div class="row mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nom / Prénom</label>
                    <input type="text" class="form-control">
                </div>
                <div class="row mb-3">
                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="row mb-3">
                    <label for="exampleInputEmail1" class="form-label">Votre message</label>
                    <textarea type="text" class="form-control" aria-describedby="emailHelp"></textarea>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary" id="contact-button">Envoyer</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container-fluid" id="footer-padding">
            <div class="row" id="footer-title">
                <div class="col-6">
                    <h3>Adresse Postale</h3>
                    <p>21, cours Jean Jaures<br>33100 BORDEAUX</p>
                </div>
                <div class="col-6">
                    <h3>Liens Externes</h3>
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="copyright-row">
            <div class="row">
                <p>Copyright © Corenthin FLAMAND 2021</p>
            </div>
        </div>
    </footer>

    
    <!-- 
    issues front back, page articles
    finir le front accueil,
    twig form edit add article inscription,
    -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>