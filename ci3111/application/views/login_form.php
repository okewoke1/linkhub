<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | LEAD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- iPortfolio theme styles -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: "Open Sans", sans-serif;
        }

        .hero-bg {
            background: url("<?= base_url('assets/img/kantor.jpg') ?>") top center no-repeat;
            background-size: cover;
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(1, 22, 39, 0.6);
        }

        .login-card {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            box-shadow: 0px 0 30px rgba(1, 41, 112, 0.2);
        }

        .login-card h1 {
            font-size: 28px;
            font-weight: 600;
            color: #012970;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #4154f1;
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #5969f3;
        }
    </style>
</head>

<body>

    <div class="hero-bg">
        <div class="login-card">
            <h1>Login</h1>

            <?php
            // Display messages
            $message = '';
            if ($this->session->flashdata('pesan')) {
                $message = $this->session->flashdata('pesan');
            } elseif ($this->session->userdata('intended_url')) {
                $message = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Login untuk mengakses sumber daya.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
            if ($message) {
                echo $message;
            }
            ?>

            <form action="<?= base_url('auth/process_login'); ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

        </div>
    </div>

    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>