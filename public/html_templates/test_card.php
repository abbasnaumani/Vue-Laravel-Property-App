<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-size: 14px !important;
        }

        /* ******************* */
        /* Text sizing */
        /* ******************* */
        .text-1 {
            font-size: 0.8em !important;
        }

        .text-2 {
            font-size: 0.9em !important;
        }

        .text-3 {
            font-size: 1em !important;
        }

        .text-4 {
            font-size: 1.2em !important;
        }

        .text-5 {
            font-size: 1.5em !important;
        }

        .text-6 {
            font-size: 1.8em !important;
        }

        .text-7 {
            font-size: 2em !important;
        }

        .text-8 {
            font-size: 2.3em !important;
        }

        /* ******************* */
        /* End Text sizing */
        /* ******************* */

        /* ******************* */
        /* headings sizing */
        /* ******************* */

        h1 {
            font-size: 2.5rem !important;
        }

        h2 {
            font-size: 2rem !important;
        }

        h3 {
            font-size: 1.75rem !important;
        }

        h4 {
            font-size: 1.5rem !important;
        }

        h5 {
            font-size: 1.25rem !important;
        }

        h6 {
            font-size: 1rem !important;
        }

        /* ******************* */
        /* End headings sizing */
        /* ******************* */

        /* ******************* */
        /* font weight */
        /* ******************* */

        .font-weight-medium {
            font-weight: 500 !important;
        }

        .font-weight-semi-bold {
            font-weight: 600 !important;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .font-weight-extra-bold {
            font-weight: 800 !important;
        }

        /* ******************* */
        /* End font weight */
        /* ******************* */

        .letter-spacing {
            letter-spacing: -.05em !important;
        }

        .top-8 {
            top: 8px !important;
        }

        .left-8 {
            left: 8px !important;
        }

        .custom-card-info-type {
            background-color: #1C5FA8 !important;
            padding-top: 0.25rem !important;
            padding-bottom: 0.25rem !important;
            padding-right: 1rem !important;
            padding-left: 1rem !important;
        }

        /* .custom-card-info-img {
            height: 195px !important;
        } */
        .card-anchor:hover {
            text-decoration: none;
        }

        .custom-card-info-header {
            border-bottom: 1px solid #E7E7E7;
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
        }

        .custom-card-info-content {
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
        }

        @media only screen and (max-width: 480px) {
            .custom-card-info-img {
                height: 300px !important;
                width: 100%;
            }

            .custom-card-info-img>img.img-fluid {
                object-fit: contain;
                height: inherit;
                width: inherit;
                object-fit: cover;
            }
        }

        @media only screen and (min-width: 481px) {
            .custom-card-info-img {
                height: 195px !important;
                width: 100%;
            }

            .custom-card-info-img>img.img-fluid {
                object-fit: contain;
                height: inherit;
                width: inherit;
                object-fit: cover;
                background-color: red;
                ;
            }
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 pb-4 mb-1">
                        <div class="card custom-card">
                            <div class="overflow-hidden position-relative z-index-1">
                                <a href="" class="text-decoration-none card-anchor">
                                    <span
                                        class="custom-card-info-type text-light px-3 py-1 text-1 font-weight-semibold text-uppercase position-absolute top-8 left-8">For
                                        Sale</span>
                                    <div class="custom-card-info-img d-block">
                                        <img src="img-3.jpg" class="img-fluid">
                                    </div>
                                    <span class="custom-card-info-header d-block p-relative">
                                        <strong class="text-dark text-4 px-2">$ 1.250.000</strong>
                                    </span>
                                    <span class="custom-card-info-content d-block">
                                        <h4 class="text-dark mb-1 text-5 px-2 font-weight-bold">South Miami</h4>
                                        <ul
                                            class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap">
                                            <li class="mb-0 px-2">
                                                <strong class="text-secondary text-uppercase text-2">Beds: 3</strong>
                                            </li>
                                            <li class="mb-0">
                                                <strong class="text-secondary text-uppercase text-2">Baths: 2</strong>
                                            </li>
                                            <li class="mb-0 px-2">
                                                <strong class="text-secondary text-uppercase text-2">Sq Ft: 500</strong>
                                            </li>
                                        </ul>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>