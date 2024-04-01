<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? '' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cipat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (session()->get('name')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('Dosen::index') ?>">Dosen</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= session()->get('username') ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= url_to('Login::destroy') ?>">Logout</a></li>
                            </ul>
                        </li>

                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('Register::index') ?>">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('Login::index') ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function destroy(event) {
            event.preventDefault();

            const confirmation = confirm("Apakah yakin ingin menghapusnya?");

            if (confirmation) {
                const postUrl = event.target.getAttribute("href");

                const form = document.createElement('form');
                form.method = 'POST';
                form.action = postUrl;

                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'delete';
                form.appendChild(method);

                document.body.appendChild(form);

                form.submit();
            } else {
                return false;
            }
        }
    </script>
</body>

</html>