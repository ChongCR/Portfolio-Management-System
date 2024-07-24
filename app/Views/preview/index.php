<?php
$menuItems = include APPPATH . 'Config/Menu.php';
$assets = config('Pages');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview</title>


    <?php foreach ($assets->globalCSS as $css): ?>
        <link rel="stylesheet" href="<?= $css ?>">
    <?php endforeach; ?>

    <?php
    foreach ($assets->globalJS as $js) {
        echo "<script src=\"$js\"></script>";
    }
    ?>

    <style>


        html {
            background: transparent;
        }


        .svg-line {
            padding-left: 150px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .announcement-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            background: black;
            color: white;
        }


        .main-nav {
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;

            .container {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
            }

            .top-nav {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
            }

            .navbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .navbar ul {
                display: flex;
                align-items: center;
                justify-content: space-between;
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .navbar ul li {
                margin: 0 10px;

                a {
                    text-decoration: none;
                    color: #A7A7A7;
                }

                body:target a[href="#about"],
                body:target a[href="#experiences"],
                body:target a[href="#achievements"],
                body:target a[href="#skills"] {
                    color: black;
                }


            }

        }


        .cv-wrapper {

            width: 70%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;


            .about_us_wrapper {
                padding: 50px 150px;

                .about_us_wrapper_container {


                    .about_us_wrapper_container_personal {
                        display: flex;
                        flex-direction: row;
                        gap: 20px;
                        justify-content: center;
                        align-items: center;

                        div img {
                            width: 200px;
                            height: 200px;
                            border-radius: 50%;
                        }

                        .about_us_wrapper_container_personal_information {
                            display: flex;
                            flex-direction: column;
                            gap: 10px;
                        }


                    }
                }
            }

            .project_experiences_wrapper {
                padding: 50px 0;

                .section-title {
                    h5 {
                        font-family: Sitka Display, serif;
                    }
                }

                .project {
                    padding: 25px;


                    p {
                        font-size: 1rem;
                        color: #343a40;
                        line-height: 170%;

                    }

                    .project_info {

                        margin-top: 20px;
                        margin-bottom: 20px;

                        span {

                        }
                    }
                }


                .my_responsibility {
                    padding: 25px 0 0;

                    .highlight {
                        font-size: 1.3rem;
                        font-weight: bold;
                    }

                    p {
                        margin-top: 5px;
                        font-size: 1rem;
                        color: #343a40;
                        line-height: 170%;
                    }
                }


                .technology-collaborators-references {
                    padding: 25px 0 0;

                    display: flex;
                    gap: 20px;

                    .technology {
                        width: 33.333%;
                    }

                    .collaborators {
                        width: 33.333%;
                    }

                    .references {
                        width: 33.333%;

                    }
                }
            }


        }
    </style>

</head>


<body>


<?php if ($announcement): ?>
    <div class="announcement-container">
        <div class="announcement">
            <small><?= $announcement['title'] ?></small>
        </div>
    </div>
<?php endif; ?>

<div class="main-nav">
    <div class="container">
        <header class="group top-nav">
            <div class="navigation-toggle" data-tools="navigation-toggle" data-target="#navbar-1"
                 style="display: none;">
                <span class="logo">DRACO</span>
            </div>
            <nav id="navbar-1" class="navbar item-nav">
                <ul>
                    <li class="active"><a href="#about">About</a></li>
                    <li><a href="#experiences">Experiences</a></li>
                    <li><a href="#achievements">Achievements</a></li>
                    <li><a href="#skills">Skills</a></li>
                </ul>
            </nav>
        </header>
    </div>
</div>


<div class="cv-wrapper">


    <div class="about_us_wrapper" id="about">
        <div class="about_us_wrapper_container">
            <div class="about_us_wrapper_container_personal">
                <div>
                    <img src="<?= base_url('assets/images/preview/rock_image.png') ?>" alt="Rock">
                </div>
                <div class="about_us_wrapper_container_personal_information">
                    <div>
                        <h5><?= lang('preview.intro') ?></h5>
                    </div>
                    <div>
                        <span><?= lang('preview.description') ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <hr>

    <div class="project_experiences_wrapper" id="experiences">

        <div class="section-title">
            <h5><?= lang('preview.experiences') ?></h5>
        </div>

        <div class="project_experiences_wrapper_container">
            <?php foreach ($projects as $project): ?>
                <div class="project">
                    <h2><?= $project['title'] ?></h2>
                    <p><?= $project['description'] ?></p>


                    <svg class="separator m-auto my-10" width="100" viewBox="0 0 687 155"
                         xmlns="http://www.w3.org/2000/svg">
                        <g stroke="currentColor" stroke-width="7" fill="none" fill-rule="evenodd" stroke-linecap="round"
                           stroke-linejoin="round">
                            <path d="M20 58c27-13.33333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.66666667 80.5 20"
                                  opacity=".1"></path>
                            <path d="M20 78c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"
                                  opacity=".2"></path>
                            <path d="M20 98c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"
                                  opacity=".6"></path>
                            <path d="M20 118c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"></path>
                        </g>
                    </svg>

                    <div class="project_info">
                    <span>This project is
                        <b style="color:
                        <?php
                        if ($project['status'] == 'Completed') {
                            echo 'green';
                        } elseif ($project['status'] == 'Ongoing') {
                            echo 'orange';
                        } else {
                            echo 'red';
                        }
                        ?>
                                ">
                            <?= ucfirst($project['status']) ?>
                        </b>
                        in between
                        <b><?= $project['start_date'] ?> </b>
                        and
                        <b><?= $project['end_date'] ?> </b>
                    </span>
                    </div>

                    <svg class="separator m-auto my-10" width="100" viewBox="0 0 687 155"
                         xmlns="http://www.w3.org/2000/svg">
                        <g stroke="currentColor" stroke-width="7" fill="none" fill-rule="evenodd" stroke-linecap="round"
                           stroke-linejoin="round">
                            <path d="M20 58c27-13.33333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.66666667 80.5 20"
                                  opacity=".1"></path>
                            <path d="M20 78c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"
                                  opacity=".2"></path>
                            <path d="M20 98c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"
                                  opacity=".6"></path>
                            <path d="M20 118c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"></path>
                        </g>
                    </svg>

                    <div class="my_responsibility">
                        <span class="highlight">Responsibility</span>

                        <p>
                            <?= $project['responsibilities'] ?>
                        </p>
                    </div>

                    <svg class="separator m-auto my-10" width="100" viewBox="0 0 687 155"
                         xmlns="http://www.w3.org/2000/svg">
                        <g stroke="currentColor" stroke-width="7" fill="none" fill-rule="evenodd" stroke-linecap="round"
                           stroke-linejoin="round">
                            <path d="M20 58c27-13.33333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.66666667 80.5 20"
                                  opacity=".1"></path>
                            <path d="M20 78c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"
                                  opacity=".2"></path>
                            <path d="M20 98c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"
                                  opacity=".6"></path>
                            <path d="M20 118c27-13.3333333 54-20 81-20 40.5 0 40.5 20 81 20s40.626917-20 81-20 40.123083 20 80.5 20 40.5-20 81-20 40.5 20 81 20 40.626917-20 81-20c26.915389 0 53.748722 6.6666667 80.5 20"></path>
                        </g>
                    </svg>

                    <div class="technology-collaborators-references">

                        <div class="technology">
                            <h5>Technology Utilized</h5>
                            <ul>
                                <?php
                                $technologies = json_decode($project['technologies'], true);
                                $technologies = array_column($technologies, 'value');
                                foreach ($technologies as $technology) {
                                    echo "<li>$technology</li>";
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="collaborators">
                            <h5>Collaborators</h5>
                            <ul>
                                <?php
                                $collaborators = json_decode($project['collaborators'], true);
                                $collaborators = array_column($collaborators, 'value');
                                foreach ($collaborators as $collaborator) {
                                    echo "<li>$collaborator</li>";
                                }

                                ?>
                            </ul>

                            <span>Total team size : <?= $project['team_size'] ?> </span>
                        </div>

                        <div class="references">
                            <h5>References</h5>
                            <?php foreach ($project['references'] as $reference): ?>
                                <span><b><?= $reference['name'] ?></b></span> ( <?= $reference['relationship'] ?> ) <br>
                                <span><?= $reference['email'] ?></span> | <?= $reference['phone'] ?> <br>
                            <?php endforeach; ?>
                        </div>

                    </div>


                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>


</div>


</body>


<script>
    $(document).ready(function () {
        var hash = window.location.hash;
        if (hash) {
            $('.navbar ul li a').css('color', '#A7A7A7');
            $('.navbar ul li a[href="' + hash + '"]').css('color', 'black');
        }
        $(window).on('hashchange', function () {
            hash = window.location.hash;
            $('.navbar ul li a').css('color', '#A7A7A7');
            $('.navbar ul li a[href="' + hash + '"]').css('color', 'black');
        });
    });

</script>
</html>