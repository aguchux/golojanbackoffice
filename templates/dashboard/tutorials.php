<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?= $assets ?>img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            News
        </div>
        <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon icon ion-ios-search"></i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox"><i class="icon ion-ios-close-circle"></i></a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section tab-content mt-2 mb-2">

            <div class="row">
                <div class="col-6 mb-2">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/_ZYFDdPJA0g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="text">
                                <h4 class="title">What will be the value of bitcoin in the next...</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 mb-2">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/ZtZx72ma6Uk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                            <div class="text">
                                <h4 class="title">Rules you need to know in business</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 mb-2">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/HIj8wU_rGIU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="text">
                                <h4 class="title">10 easy ways to save your money</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 mb-2">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/jTIUgshJjds" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="text">
                                <h4 class="title">Follow the financial agenda with...</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 mb-2">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/YJ6esCo6iio" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="text">
                                <h4 class="title">Does it make sense to invest in cryptocurrencies</h4>
                            </div>
                        </div>
                    </a>
                </div>
            <div>
                <a href="javascript:;" class="btn btn-block btn-primary btn-lg">Load More</a>
            </div>

        </div>

    </div>