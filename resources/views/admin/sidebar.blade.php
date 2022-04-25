<style>
    .dropdown-btn {
        display: block;
        width: 100%;
        text-align: left;
        background-color: #242849;
        border: none;
        color: #7a80b4;
        font-size: 14px;
        padding: 12px;
        outline: none;
    }

    .fa-caret-down {
        float: right;
    }

    /*.active {
    background-color: #3f176f;
    color: white;
    }*/

    .dropdown-container {
        display: block;
        background-color: #262626;
        padding-left: 8px;
    }

    .dropdown-container a {
        display: block;
        padding-left: 8px;
        text-decoration: none;
        width: 100%;
        text-align: left;
        background-color: transparent;
        border: none;
        color: #7a80b4;
        font-size: 14px;
        padding: 12px;
        outline: none;
    }
</style>
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="d-xl-none d-lg-none">Menu</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/admins/dashboard"><i class="fa fa-fw fa-folder-open"></i>Dashboard <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admins/user/data"><i class="fa fa-fw fa-user"></i>Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admins/company/data" aria-expanded="false"><i class="fas fa-fw fa-industry"></i>Perusahaan</a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="/admins/advertisement/active" aria-expanded="false"><i
                                class="fas fa-fw fa-tv"></i>Iklan</a>
                    </li> -->
                    <li class="nav-item">
                        <button class="dropdown-btn"><i class="fas fa-fw fa-tv"></i> Iklan
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href="/admins/advertisement/active">Iklan Aktif</a>
                            <a href="/admins/advertisement/inactive">Iklan Tidak Aktif</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admins/vacancy/data" aria-expanded="false"><i class="fas fa-fw fa-id-badge"></i>Lamaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admins/magang/data" aria-expanded="false"><i class="fas fa-fw fa-id-badge"></i>Magang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admins/beasiswa/data" aria-expanded="false"><i class="fas fa-fw fa-id-badge"></i>Beasiswa</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>