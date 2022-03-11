<?= $this->extend('template/admin_template') ?>

<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Empresas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Contabilidad</a></li>
                    <li class="breadcrumb-item active">Empresas</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-end">
            <a href="/companies/create" class="btn btn-success">
                <i class="fas fa-plus mr-1"></i>Nuevo
            </a>
        </div>

        <div class="mt-4">
            <?php if (session()->getFlashdata('alert-type')): ?>
                <div class="alert <?= session()->getFlashdata('alert-type'); ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fas fa-info mr-1"></i><?= session()->getFlashdata('alert-title'); ?></h5>
                    <?= session()->getFlashdata('alert-message'); ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="mt-4 card">
            <div class="card-header">
                <h3 class="card-title">Listado de Empresas</h3>
                <div class="card-tools">

                    <div class="input-group input-group-sm" style="width: 272px;">
                        <select id="filterBy" class="form-control float-left">
                            <option value="name">Nombre</option>
                            <option value="nit">NIT</option>
                        </select>

                        <input type="text" name="search" style="width: 86px" class="form-control float-right"
                               autocomplete="off" placeholder="Buscar">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>NIT</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if ($companies): ?>

                        <?php foreach ($companies as $company): ?>
                            <tr>
                                <td><?= $company['id']; ?></td>
                                <td><?= $company['name']; ?></td>
                                <td><?= $company['nit']; ?></td>
                                <td>
                                    <a href="/companies/<?= $company['id'] ?>/edit" class="btn btn-info btn-sm"><i
                                                class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td class="text-center" colspan="4">No se encontraron registros.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">

                <div class="d-flex justify-content-between">
                    <div>
                        <?php if ($pager) {
                            echo $pager->links('default', 'bootstrap');
                        } ?>
                    </div>
                    <div>
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="5">5</option>
                            <option value="5">10</option>
                            <option value="5">25</option>
                            <option value="5">50</option>
                            <option value="5">100</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>
