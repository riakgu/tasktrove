<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">

                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name d-flex align-items-center me-2">
                                <div class="user-name text-end">
                                    <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                </div>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar bg-secondary me-3">
                                    <span class="avatar-content">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    <span class="avatar-status bg-success"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
