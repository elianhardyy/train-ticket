<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<style>
    .menu-toggle {
        display: flex;
        flex-direction: column;
        height: 20px;
        justify-content: space-between;
        position: relative;
        left: 3px;
    }

    .menu-toggle input {
        position: absolute;
        width: 30px;
        height: 25px;
        left: -6px;
        top: -1px;
        opacity: 0;
        cursor: pointer;
        z-index: 2;
    }

    .menu-toggle span {
        display: block;
        width: 28px;
        height: 2px;
        background-color: black;
        border-radius: 3px;
    }
</style>
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-2 mb-5 bg-body rounded">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.php"><img src="download.png" alt="kereta api" width="70px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin.php">Kereta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftar-user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stasiun.php">Stasiun</a>
                </li>

            </ul>
            <ul class="navbar-nav">

                <a class="nav-link justify-content" href="../logout.php"><i class="bi bi-box-arrow-left"></i>Log out</a>

            </ul>

        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>