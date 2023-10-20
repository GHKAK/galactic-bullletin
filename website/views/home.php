<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>

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

    <section class="banner" style="background-image: url('<?php echo "/assets/images/" . $bannerArticle['image']; ?>')">
        <div class="container">
            <div class="banner-article">
                <h2 class="banner-title">
                    <?php echo $bannerArticle['title']; ?>
                </h2>
                <div class="banner-announce">
                    <?php echo $bannerArticle['announce']; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">

            <h2 class="news-title">Новости</h2>
            <ul class="news-list">
                <?php foreach ($articlesList as $article) { ?>
                    <li class="news-card">

                        <div class="card-date">
                            <?php echo date("d.m.Y", strtotime($article['date'])); ?>
                        </div>
                        <div class="card-title">
                            <?php echo $article['title']; ?>
                        </div>
                        <div class="card-announce">
                            <?php echo $article['announce']; ?>
                        </div>
                        <a href="/article?id=<?php echo $article['id'] ?>" class="card-button">
                            <span class="button-name">Подробнее</span>
                            <svg class="button-arrow" width="27" height="16" viewBox="0 0 27 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path id="Arrow"
                                    d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM26.707 8.70711C27.0975 8.31658 27.0975 7.68342 26.707 7.2929L20.343 0.928934C19.9525 0.538409 19.3193 0.538409 18.9288 0.928934C18.5383 1.31946 18.5383 1.95262 18.9288 2.34315L24.5857 8L18.9288 13.6569C18.5383 14.0474 18.5383 14.6805 18.9288 15.0711C19.3193 15.4616 19.9525 15.4616 20.343 15.0711L26.707 8.70711ZM1 9L25.9999 9L25.9999 7L1 7L1 9Z"
                                    fill="#841844" />
                            </svg>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="pagination">
                <?php
                $startPage = max(1, $page-1);
                $endPage = min($totalPages, $startPage + 2);
                if($totalPages-$startPage < 3){
                    $startPage = $totalPages-2;
                }
                for ($i = $startPage; $i <= $endPage; $i++) {
                ?>
                    <li class="pagination-page 
                    <?php
                    if ($i == $page) {
                        echo ' active">';
                    } else {
                    ?>
                        " onclick="location.href='/home?p=<?php echo $i ?>'">
                    <?php
                    }
                    ?><?php echo $i ?>
                    </li>
                    <?php
                }
                if ($page < $totalPages) { ?>
                    <li class="pagination-next" onclick="location.href='/home?p=<?php echo $page+1 ?>'">
                        <svg class="next-arrow" width="24" height="22" viewBox="0 0 24 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="Frame 315">
                                <path id="Arrow 1"
                                    d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z"
                                    fill="#841844" />
                            </g>
                        </svg>
                    </li>
                <?php
                }
                ?>
            </ul>
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