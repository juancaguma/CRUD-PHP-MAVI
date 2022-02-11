<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Juan Carlos Gutierrez Martinez" />
        <title>Prueba MAVI </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="../vistas/home.php">Clientes</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Clientes</div>
                            <a class="nav-link" href="../vistas/home.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Control de clientes
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clientes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">CRUD CLientes</li>
                        </ol>
                        <div id="datos_clientes" class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Lista de clientes
                                <button type="button" class="btn btn-success" id="add">Agregar</button>
                            </div>
                            <div class="card-body">
                                <table id="tabla_clientes">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido paterno</th>
                                            <th>Apellido materno</th>
                                            <th>Domicilio</th>
                                            <th>Correo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido paterno</th>
                                            <th>Apellido materno</th>
                                            <th>Domicilio</th>
                                            <th>Correo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="t_body"></tbody>
                                </table>
                            </div>
                        </div>
                        <div id="add_cliente" class="card mb-4" hidden="hidden">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Agregar cliente
                                <a type="button" class="btn btn-info" href="../vistas/home.php">Regresar</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name_cliente">Nombre</label>
                                    <input type="text" class="form-control" id="name_cliente" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="ape_pater">Apellido paterno</label>
                                    <input type="text" class="form-control" id="ape_pater" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="ape_materno">Apellido materno</label>
                                    <input type="text" class="form-control" id="ape_materno" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="dire_cliente">Direccion</label>
                                    <input type="text" class="form-control" id="dire_cliente">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <a type="submit" id="save" class="btn btn-primary">Save</a>
                                </div>
                            </div>
                        </div>
                        <div id="update_cliente" class="card mb-4" hidden="hidden">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Agregar cliente
                                <a type="button" class="btn btn-info" href="../vistas/home.php">Regresar</a>
                            </div>
                            <div class="card-body">
                                <input type="number" name="id_cliente" id="id_cliente" hidden>
                                <div class="form-group">
                                    <label for="name_cliente">Nombre</label>
                                    <input type="text" class="form-control" id="name_cliente_u" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="ape_pater">Apellido paterno</label>
                                    <input type="text" class="form-control" id="ape_pater_u" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="ape_materno">Apellido materno</label>
                                    <input type="text" class="form-control" id="ape_materno_u" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="dire_cliente">Direccion</label>
                                    <input type="text" class="form-control" id="dire_cliente_u">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email_u" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <a type="submit" id="update" class="btn btn-primary">Update</a>
                                </div>
                            </div>
                        </div>
                        <div id="delete_cliente" class="card mb-4" hidden="hidden">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Delete cliente
                                <a type="button" class="btn btn-info" href="../vistas/home.php" >Regresar</a>
                            </div>
                            <div class="card-body">
                                <h2>DELETE cliente</h2>
                            </div>
                        </div>
                        <div id="edit_cliente" class="card mb-4" hidden="hidden">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Editar cliente
                                <a type="button" class="btn btn-info" href="../vistas/home.php" >Regresar</a>
                            </div>
                            <div class="card-body">
                                <h2>Editar cliente</h2>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
        <script src="../js/datatables.js"></script>
    </body>
</html>
