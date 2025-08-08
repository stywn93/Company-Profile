<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title) ?> &mdash; <?= esc($subtitle ?? '') ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" href="<?= base_url('assets/img/company/' . ($image ?? 'default.png')) ?>" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?= base_url('vendor/front-end/assets/img/apple-touch-icon.png') ?>">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Nunito:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('vendor/front-end/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/front-end/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/front-end/assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/front-end/assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/front-end/assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/front-end/assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('vendor/front-end/assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>