<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Reader Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#13ec46",
                        "primary-dark": "#0eb535",
                        "page-bg": "#dfeee0",
                        "card-bg": "#fbfffb",
                        "text-main": "#0d1b11",
                        "text-muted": "#4c9a5e",
                        "custom-bg": "#dfeee0",
                        "custom-card": "#fbfffb",
                        "content-surface": "#fbfffb",
                    },
                    fontFamily: {
                        "display": ["Work Sans", "sans-serif"],
                        "body": ["Work Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Work Sans', sans-serif;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-page-bg text-text-main min-h-screen flex flex-col">

    <?php require __DIR__ . '/header.view.php'; ?>

    <?php require $viewFile; ?>

    <?php require __DIR__ . '/footer.view.php'; ?>

</body>

</html>