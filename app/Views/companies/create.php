<?= $this->extend('template/admin_template') ?>

<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nueva Empresa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Contabilidad</a></li>
                    <li class="breadcrumb-item active">Nueva Empresa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-end">
            <a href="/companies" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left mr-1"></i>Ir al listado
            </a>
        </div>

        <?php

        $validation = \Config\Services::validation();

        ?>

        <div class="mt-4 card">

            <div class="card-header">
                <h3 class="card-title">Nueva Empresa</h3>
            </div>

            <form action="/companies" method="post">
                <?= csrf_field() ?>

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name"
                               class="form-control form-control-sm  <?= $validation->getError('name') ? 'is-invalid' : '' ?>"
                               value="<?= old('name') ?>"
                        >
                        <?php
                        if ($validation->getError('name')) {
                            echo '<span class="invalid-feedback">' . $validation->getError('name') . '</span>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea id="address" name="address" rows="3"
                                  class="form-control form-control-sm <?= $validation->getError('address') ? 'is-invalid' : '' ?>"><?= old('address') ?></textarea>
                        <?php
                        if ($validation->getError('address')) {
                            echo '<span class="invalid-feedback mt-2">' . $validation->getError('address') . '</span>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input
                                type="text"
                                id="phone"
                                name="phone"
                                class="form-control form-control-sm <?= $validation->getError('phone') ? 'is-invalid' : '' ?>"
                                data-inputmask="'mask': '9999-9999'"
                                data-mask
                                inputmode="text"
                                value="<?= old('phone') ?>"
                        >
                        <?php
                        if ($validation->getError('phone')) {
                            echo '<span class="invalid-feedback mt-2">' . $validation->getError('phone') . '</span>';
                        }
                        ?>

                    </div>

                    <div class="form-group">
                        <label for="nit">NIT</label>
                        <input
                                type="text"
                                id="nit"
                                name="nit"
                                class="form-control form-control-sm <?= $validation->getError('nit') ? 'is-invalid' : '' ?>"
                                data-inputmask="'mask': '9999-999999-999-9'"
                                data-mask
                                inputmode="text"
                                value="<?= old('nit') ?>"
                        >
                        <?php
                        if ($validation->getError('nit')) {
                            echo '<span class="invalid-feedback mt-2">' . $validation->getError('nit') . '</span>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="nrc">NRC</label>
                        <input
                                type="text"
                                id="nrc"
                                name="nrc"
                                class="form-control form-control-sm <?= $validation->getError('nrc') ? 'is-invalid' : '' ?>"
                                data-inputmask="'mask': '999999-9'"
                                data-mask
                                inputmode="text"
                                value="<?= old('nrc') ?>"
                        >
                        <?php
                        if ($validation->getError('nrc')) {
                            echo '<span class="invalid-feedback mt-2">' . $validation->getError('nrc') . '</span>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="business_line">Giro / Act. económica</label>
                        <input id="business_line" type="text" name="business_line"
                               class="form-control form-control-sm <?= $validation->getError('business_line') ? 'is-invalid' : '' ?>"
                               value="<?= old('business_line') ?>"
                        >
                        <?php
                        if ($validation->getError('business_line')) {
                            echo '<span class="invalid-feedback mt-2">' . $validation->getError('business_line') . '</span>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="legal_representative">Representante legal</label>
                        <input id="legal_representative" type="text" name="legal_representative"
                               class="form-control form-control-sm <?= $validation->getError('legal_representative') ? 'is-invalid' : '' ?>"
                               value="<?= old('legal_representative') ?>"
                        >
                        <?php
                        if ($validation->getError('legal_representative')) {
                            echo '<span class="invalid-feedback mt-2">' . $validation->getError('legal_representative') . '</span>';
                        }
                        ?>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm float-right">
                        <i class="fas fa-save mr-1"></i>Guardar
                    </button>
                </div>

            </form>


        </div>

    </div>
</section>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>

<script>
    $('[data-mask]').inputmask();
</script>

<?= $this->endSection() ?>

