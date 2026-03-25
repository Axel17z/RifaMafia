<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIFAS CHILAS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 80px;
            --bg-light: #f8f9fa;
            --primary-color: #4e73df;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            overflow-x: hidden;
        }

        #wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        /* Sidebar Estilos */
        #sidebar {
            min-width: var(--sidebar-width);
            max-width: var(--sidebar-width);
            background: #ffffff;
            min-height: 100vh;
            box-shadow: 4px 0 15px rgba(0,0,0,0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        #sidebar.active {
            margin-left: calc(-1 * var(--sidebar-width));
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-link {
            color: #6c757d;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 10px;
            margin: 5px 15px;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }

        .nav-link i {
            font-size: 1.2rem;
            margin-right: 12px;
        }

        .nav-link:hover, .nav-link.active {
            background-color: #f0f4ff;
            color: var(--primary-color);
        }

        /* Contenido */
        #content {
            width: 100%;
            padding: 30px;
            transition: all 0.3s;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            padding: 20px;
        }

        #sidebarCollapse {
            background: white;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            padding: 8px 12px;
        }

        @media (max-width: 768px) {
            #sidebar { margin-left: calc(-1 * var(--sidebar-width)); }
            #sidebar.active { margin-left: 0; }
        }
    </style>
</head>
<body>

<div id="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4 class="fw-bold text-primary mb-0">RIFAS <span class="text-dark">CHILAS</span></h4>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/usuarios" class="nav-link <?= (url_is('usuarios*')) ? 'active' : '' ?>">
                    <i class="bi bi-person-fill"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-ticket-perforated"></i>
                    <span>Rifas</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-wallet2"></i>
                    <span>Pagos</span>
                </a>
            </li>
        </ul>

        <div class="position-absolute bottom-0 w-100 p-3">
            <a href="#" class="nav-link text-danger">
                <i class="bi bi-box-arrow-left"></i>
                <span>Cerrar Sesión</span>
            </a>
        </div>
    </nav>

    <div id="content">
        <nav class="navbar navbar-expand-lg mb-4">
            <div class="container-fluid p-0">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="bi bi-list"></i>
                </button>
                
                <div class="ms-auto d-flex align-items-center">
                    <div class="me-3 text-end d-none d-sm-block">
                        <p class="mb-0 fw-bold">Admin Usuario</p>
                        <small class="text-muted">Administrador</small>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=4e73df&color=fff" class="rounded-circle" width="40">
                </div>
            </div>
        </nav>

        <div class="container-fluid p-0">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Toggle Sidebar
        const toggleBtn = document.getElementById('sidebarCollapse');
        const sidebar = document.getElementById('sidebar');

        if(toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }
    });
</script>

</body>
</html>