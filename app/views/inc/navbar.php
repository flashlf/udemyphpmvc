    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="First navbar example">
     <div class="container-fluid">
        <a class="navbar-brand" href="<?= URLROOT ?>"><?= SITENAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample01">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT ?>/pages/about">About</a>
            </li>
            </ul>

            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= URLROOT ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT ?>/users/login">Login</a>
            </li>
            </ul>
        </div>
     </div>
    </nav>