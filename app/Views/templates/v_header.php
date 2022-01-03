<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    
    <script type="text/javascript" src="assets/js/fusioncharts.js"></script>
    <script type="text/javascript">
        FusionCharts.ready(function () {
        var G1 = new FusionCharts({
            type: "column2d",
            renderAt: "chartLocation",
            width: "100%",
            height: "300",
            dataFormat: "jsonurl",
            dataSource: "/productChart",
        });
        G1.render();
        });
    </script>
    <script
      type="text/javascript"
      src="assets/js/themes/fusioncharts.theme.fint.js"
    ></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">