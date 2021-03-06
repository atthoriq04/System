<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title><?= $Title ?></title>
</head>

<body>
    <?php
    $db = \config\Database::connect();
    $role_id = $Roleid;
    $querymenu = " SELECT *
                FROM `module` JOIN `role_module`
                ON `module` . `Moduleid` = `role_module` . `Moduleid` 
                WHERE `role_module` . `Roleid` =  $role_id  
                ORDER BY `role_module` . `moduleid` Asc
                ";

    $menu = $db->query($querymenu);
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/') ?>">System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($menu->getResultArray() as $row) : ?>

                        <a class="<?php if ($Title == $row['Modulename']) : ?>nav-link active<?php else : ?>nav-link<?php endif; ?>" aria-current="page" href="<?= base_url($row['Moduleurl']) ?>"><?= $row['Modulename']; ?></a>
                        </li>
                    <?php endforeach; ?>


                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/Login/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>