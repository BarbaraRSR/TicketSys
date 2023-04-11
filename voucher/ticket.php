<?php
require_once 'db/conn.php';
$folio = $_GET['folio'];
$datos = $crud->getTicketDetails($folio);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <style type="text/css">
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: normal;
            src: local('Open Sans'), local('OpenSans'), url(http://themes.googleusercontent.com/static/fonts/opensans/v7/yYRnAC2KygoXnEC8IdU0gQLUuEpTyoUstqEm5AMlJo4.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: bold;
            src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://themes.googleusercontent.com/static/fonts/opensans/v7/k3k702ZOKiLJc3WVjuplzMDdSZkkecOE1hvV7ZHvhyU.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Open Sans';
            font-style: italic;
            font-weight: normal;
            src: local('Open Sans Italic'), local('OpenSans-Italic'), url(http://themes.googleusercontent.com/static/fonts/opensans/v7/O4NhV7_qs9r9seTo7fnsVCZ2oysoEQEeKwjgmXLRnTc.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Open Sans';
            font-style: italic;
            font-weight: bold;
            src: local('Open Sans Bold Italic'), local('OpenSans-BoldItalic'), url(http://themes.googleusercontent.com/static/fonts/opensans/v7/PRmiXeptR36kaC0GEAetxrQhS7CD3GIaelOwHPAPh9w.ttf) format('truetype');
        }
        @page {
            margin-top: 1cm;
            margin-bottom: 1cm;
            margin-left: 1.2cm;
            margin-right: 1.2cm;
        }
        body {
            background: #fff;
            color: #000;
            margin: 0cm;
            font-family: 'Open Sans', sans-serif;
            font-size: 9pt;
            line-height: 100%;
            width: 100%;
        }
        h1, h2, h3, h4 {
            font-weight: bold;
            margin: 0;
            text-align: center;
        }
        h1 {
            font-size: 16pt;
            margin: 5mm 0;
        }
        h2 {
            font-size: 14pt;
        }
        h3, h4 {
            font-size: 9pt;
        }
        
        hr {
            color: lightgrey;
            size: 2px;
        }

        p {
            margin: 0;
            padding: 0;
        }
        p + p {
            margin-top: 1.25em;
        }
        a {
            border-bottom: 1px solid;
            text-decoration: none;
        }
        /* Basic Table Styling */
        table {
            border-collapse: collapse;
            border-spacing: 0;
            page-break-inside: always;
            border: 0;
            margin: 0;
            padding: 0;
        }
        th, td {
            vertical-align: top;
            text-align: left;
        }
        table.container {
            width:100%;
            border: 0;
        }
        tr.no-borders,
        td.no-borders {
            border: 0 !important;
            border-top: 0 !important;
            border-bottom: 0 !important;
            padding: 0 !important;
            width: auto;
        }
        /* Header */
        table.head {
            margin-bottom: 12mm;
        }
        td.header img {
            max-height: 1.2cm;
            width: auto;
            text-align: left;
        }
        td.header {
            font-size: 16pt;
            font-weight: 700;
            vertical-align: middle;
            text-align: center;
        }
        td.header-right {
            text-align: right;
        }
        .document-type-label {
            text-transform: uppercase;
        }
        table.order-data-addresses {
            width: 100%;
            margin-bottom: 7mm;
        }
        td.order-data {
            width: 40%;
            padding:5px;
        }
        .invoice .shipping-address {
            width: 30%;
        }
        .packing-slip .billing-address {
            width: 30%;
        }
        td.order-data table th {
            font-weight: normal;
            padding-right: 2mm;
        }

        table.order-details {
            width:100%;
            margin-bottom: 8mm;
        }
        .quantity, .price, .totalprice{
            width: 20%;
        }
        .order-details tr {
            page-break-inside: always;
            page-break-after: auto;
        }
        .order-details td,
        .order-details th {
            border-bottom: 1px #ccc solid;
            border-top: 1px #ccc solid;
            padding: 0.375em;
        }
        .order-details th {
            font-weight: bold;
            text-align: left;
        }
        .order-details thead th {
            color: white;
            background-color: black;
            border-color: black;
        }

        .order-details tr.bundled-item td.product {
            padding-left: 5mm;
        }
        .order-details tr.product-bundle td,
        .order-details tr.bundled-item td {
            border: 0;
        }
        dl {
            margin: 4px 0;
        }
        dt, dd, dd p {
            display: inline;
            font-size: 7pt;
            line-height: 7pt;
        }
        dd {
            margin-left: 5px;
        }
        dd:after {
            content: "\A";
            white-space: pre;
        }

        .customer-notes {
            margin-top: 5mm;
        }
        table.totals {
            width: 100%;
            margin-top: 5mm;
        }
        table.totals th,
        table.totals td {
            border: 0;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
        table.totals tr:last-child td,
        table.totals tr:last-child th {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            font-weight: bold;
        }
        table.totals tr.payment_method {
            display: none;
        }

        #footer {
            position: absolute;
            bottom: -2cm;
            left: 0;
            right: 0;
            height: 2cm;
            text-align: center;
            border-top: 0.1mm solid gray;
            margin-bottom: 0;
            padding-top: 2mm;
        }

        .pagenum:before {
            content: counter(page);
        }
        .pagenum,.pagecount {
            font-family: sans-serif;
        }
        .shop-name {
            margin-top: 40px;
        }
    </style>
</head>
<?php
$folio = sprintf('%05d', $datos['folio']);
?>
<body class="invoice">

<!-- CABECERA -->
<table class="container">
    <tr>
        <td>
            <img src="voucher/logo.png" />
        </td>
        <td class="header">
            <h2>TICKET<br><br>DE SERVICIO</h2>
        </td>
        <td class="header-right">
            <br>
            <p>
                Folio: <b><?=$folio;?></b>
                <br /><br>
                <?=$datos['fecha'];?>
            </p>
        </td>
    </tr>
</table>

<br>
<hr>
<br>

<!-- DATOS DEL CLIENTE -->
<h3 class="document-type-label">Información del cliente</h3>
<br>
<br>

<table class="order-data-addresses">
    <tr>
        <td class="order-data"><b>Nombre: </b><?=$datos['nombre'];?> <?=$datos['apellido'];?></td>
    </tr>
    <tr>
        <td class="order-data"><b>Teléfono: </b><?=$datos['telefono'];?></td>
    </tr>
    <tr>
        <td class="order-data"><b>Correo: </b><?=$datos['correo'];?></td>
    </tr>
</table>

<!-- TABLA DE SERVICIO -->
<table class="order-details">
    <thead>
    <tr>
        <th class="product">Equipo</th>
        <th class="product">Marca y modelo</th>
        <th class="product">Serie</th>
        <th class="product">Servicio</th>
        <th class="price">Precio</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?=$datos['tipo'];?></td>
        <td><?=$datos['marca'];?>, <?=$datos['modelo'];?></td>
        <td><?=$datos['serie'];?></td>
        <td><?=$datos['servicio'];?></td>
        <td>$<?=number_format($datos['estimado'], 2);?></td>
    </tr>
    <tr>
        <td colspan="5"><b>Descripción: </b><?=$datos['descripcion'];?></td>
    </tr>
    </tbody>
    <tfoot>
    <tr class="no-borders">
        <td class="no-borders">
            <div class="customer-notes">
                &nbsp;
            </div>
        </td>
        <?php
        $porcentaje = ($datos['estimado'] * 16) / 100;
        ?>
        <td class="no-borders" colspan="4">
            <table class="totals">
                <tfoot>
                <tr class="cart_subtotal">
                    <td class="no-borders"></td>
                    <th class="description">Subtotal</th>
                    <td class="totalprice"><span class="totals-price"><span class="amount">$<?=number_format($datos['estimado'], 2);?></span></td>
                </tr>
                <tr class="cart_subtotal">
                    <td class="no-borders"></td>
                    <th class="description">Impuestos</th>
                    <td class="totalprice"><span class="totals-price"><span class="amount">$<?=number_format($porcentaje, 2);?></span></span></td>
                </tr>
                <tr class="order_total">
                    <td class="no-borders"></td>
                    <th class="description">Total</th>
                    <td class="totalprice"><span class="totals-price"><span class="amount">$<?=number_format($porcentaje + $datos['estimado'], 2);?></span></span></td>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>
