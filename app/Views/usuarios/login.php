<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Moderno - White & Glow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/dist/custom.min.css"; rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"; rel="stylesheet">
   
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            /* Sombra de color suave (Azul/Violeta) */
            box-shadow: 0 15px 35px rgba(0, 123, 255, 0.1), 0 5px 15px rgba(102, 16, 242, 0.05);
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #eee;
            background-color: #fdfdfd;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(13, 110, 253, 0.15);
            border-color: #0d6efd;
        }

        .btn-modern {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            /* Sombra del botón */
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        }

        .btn-modern:hover {
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.4);
            transform: scale(1.02);
            color: white;
        }

        .brand-logo {
            width: 60px;
            height: 60px;
            background: #f0f4f8;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #0d6efd;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center">
           
            <div class="login-card">
                <div class="brand-logo">
                    <svg xmlns="http://www.w3.org/2000/svg"; width="30 height="30" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 2.461-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.691 0 8 0m0 5a1.5 1.5 0 0 1 .5 2.915V10a.5.5 0 0 1-1 0V7.915A1.5 1.5 0 0 1 8 5"/>
                    </svg>
                </div>
               
                <h3 class="text-center mb-4 fw-bold" style="color: #333;">Bienvenido</h3>
               
                <form action ="/usuarios/auth" method="POST" >
                    <div class="mb-3">
                        <label class="form-label text-secondary small fw-bold">Correo Electrónico</label>
                        <input name="email" value="<?= old('email') ?>" type="email" class="form-control" placeholder="ejemplo@correo.com" required>
                    </div>
                   
                    <div class="mb-4">
                        <label class="form-label text-secondary small fw-bold">Contraseña</label>
                        <input name="contrasena" type="password" class="form-control" placeholder="••••••••" required>
                    </div>
              
                    <?php if(session()->getFlashdata("msg") ){ ?> 
                         <div class="alert alert-dangerus" style="color: #ee1d4a; font-weight: bold: ">
                            <?= session()->getFlashdata("msg")  ?>
                        </div>  
                    <?php } ?>
                   
                    <div class="d-grid">
                        <button type="submit" class="btn btn-modern">Iniciar Sesión</button>
                    </div>
                   
                    <div class="text-center mt-4">
                        <a href="#" class="text-decoration-none small text-muted">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script&gt;
</body>
</html>
