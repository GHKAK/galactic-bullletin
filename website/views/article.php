<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $article['title'] ?>
    </title>
    <link rel="stylesheet" href="./assets/css/style.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <a href="#" class="brand">
                <img class="brand-logo" src="./assets/images/logo.svg" alt="">
                <h1 class="brand-sitename">Галактический вестник</h1>
            </a>
        </div>
    </header>
    <section class="path">
        <div class="container path-string">
            <a class="main-link" href="/home">Главная</a>
            <div class="path-divider">/</div>
            <span class="path-title">
                <?php echo $article['title'] ?>
            </span>
        </div>
    </section>
    <section class="article">
        <div class="container ">
            <h2 class="article-title">
                <?php echo $article['title'] ?>
            </h2>
            <div class="article-container">
                <div class="article-info">
                    <div class="article-date">
                        <?php echo date("d.m.Y", strtotime($article['date'])); ?>
                    </div>
                    <h3 class="article-announce">
                        <?php echo $article['announce'] ?>
                    </h3>
                    <h4 class="article-content">
                        <?php echo $article['content'] ?>
                    </h4>
                    <a href="" class="article-back--button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
                            <path
                                d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z"
                                fill="#841844" />
                        </svg>
                        <span>назад к новостям</span>
                    </a>
                    <script>
                        const linkElement = document.querySelector('.article-back--button');
                        if (document.referrer.indexOf(window.location.hostname) !== -1 && document.referrer.indexOf('home') !== -1) {
                            linkElement.setAttribute('href', document.referrer);
                        } else {
                            linkElement.setAttribute('href', 'http://localhost:3000/home');
                        }
                    </script>
                </div>
                <div class="article-image">
                    <img src="/assets/images/<?php echo $article['image'] ?>" alt="">
                </div>
            </div>

        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="footer-line"></div>
            <p class="copyright">© 2023 — 2412 «Галактический вестник»</p>
        </div>
    </footer>
</body>

</html>