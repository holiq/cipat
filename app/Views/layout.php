<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? '' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
