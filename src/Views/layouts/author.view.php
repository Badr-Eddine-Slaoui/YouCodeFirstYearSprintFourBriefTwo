<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Author Article Analytics</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&amp;display=swap"
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
                        "primary": "#428950",
                        "primary-dark": "#2f683a",
                        "secondary": "#4a654f",
                        "background-light": "#dfeee0",
                        "background-card": "#fbfffb",
                        "text-main": "#3b4441",
                        "text-secondary": "#4a654f",
                        "background-dark": "#141e16",
                        "sh-primary": "#13ec5b",
                        "sh-background-light": "#dfeee0", 
                        "sh-background-dark": "#102216",
                        "sh-content-surface": "#fbfffb",
                        "sh-text-main": "#0d1b12",
                        "sh-text-muted": "#4c9a66",
                        "card-light": "#fbfffb",
                        "border-light": "#c8dac9",
                        "action-green": "#428950",
                        "background-dark": "#141e16",
                        "border-light": "#c8dac9",
                        "modal-bg": "#fbfffb",
                        "modal-text": "#3b4441",
                        "red-primary": "#ec1313",
                        "toast-bg": "#fbfffb",
                        "error": "#d32f2f"
                    },
                    fontFamily: {
                        "display": ["Work Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.375rem", // rounded-md approx
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    boxShadow: {
                        "soft": "0 4px 20px -2px rgba(0, 0, 0, 0.05)",
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .icon-filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-text-main antialiased selection:bg-primary selection:text-white">
    <div class="flex h-screen w-full overflow-hidden">
        <?php require __DIR__ . '/author_sidebar.view.php'; ?>

        <?php require $viewFile; ?>

        <?php require __DIR__ . '/../partials/flash.message.php'; ?>
    </div>
</body>

</html>