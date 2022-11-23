<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pdf Mascotas</title>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Open+Sans:600,700';

        * {
            font-family: 'Open Sans', sans-serif;
        }

        .rwd-table {
            margin: auto;
            min-width: 300px;
            max-width: 100%;
            border-collapse: collapse;
        }

        .rwd-table tr {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            background-color: #f5f9fc;
        }

        .rwd-table tr:nth-child(odd):not(:first-child) {
            background-color: #ebf3f9;
        }

        .rwd-table th {
            display: none;
        }

        .rwd-table td {
            display: block;
        }

        .rwd-table td:first-child {
            margin-top: .5em;
        }

        .rwd-table td:last-child {
            margin-bottom: .5em;
        }

        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 120px;
            display: inline-block;
            color: #000;
        }

        .rwd-table th,
        .rwd-table td {
            text-align: left;
        }

        .rwd-table {
            color: #333;
            border-radius: .4em;
            overflow: hidden;
        }

        .rwd-table tr {
            border-color: #bfbfbf;
        }

        .rwd-table th,
        .rwd-table td {
            padding: .5em 1em;
        }

        @media screen and (max-width: 601px) {
            .rwd-table tr:nth-child(2) {
                border-top: none;
            }
        }

        @media screen and (min-width: 600px) {
            .rwd-table tr:hover:not(:first-child) {
                background-color: #d8e7f3;
            }

            .rwd-table td:before {
                display: none;
            }

            .rwd-table th,
            .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }

            .rwd-table th:first-child,
            .rwd-table td:first-child {
                padding-left: 0;
            }

            .rwd-table th:last-child,
            .rwd-table td:last-child {
                padding-right: 0;
            }

            .rwd-table th,
            .rwd-table td {
                padding: 1em !important;
            }
        }


        /* THE END OF THE IMPORTANT STUFF */

        /* Basic Styling */
        body {
            background: #4B79A1;
            background: -webkit-linear-gradient(to left, #4B79A1, #283E51);
            background: linear-gradient(to left, #4B79A1, #283E51);
        }

        h1 {
            text-align: center;
            font-size: 2.4em;
            color: black;
        }

        .container {
            display: block;
            text-align: center;
        }

        h3 {
            display: inline-block;
            position: relative;
            text-align: center;
            font-size: 1.5em;
            color: #cecece;
        }

        h3:before {
            content: "\25C0";
            position: absolute;
            left: -50px;
            -webkit-animation: leftRight 2s linear infinite;
            animation: leftRight 2s linear infinite;
        }

        h3:after {
            content: "\25b6";
            position: absolute;
            right: -50px;
            -webkit-animation: leftRight 2s linear infinite reverse;
            animation: leftRight 2s linear infinite reverse;
        }

        @-webkit-keyframes leftRight {
            0% {
                -webkit-transform: translateX(0)
            }

            25% {
                -webkit-transform: translateX(-10px)
            }

            75% {
                -webkit-transform: translateX(10px)
            }

            100% {
                -webkit-transform: translateX(0)
            }
        }

        @keyframes leftRight {
            0% {
                transform: translateX(0)
            }

            25% {
                transform: translateX(-10px)
            }

            75% {
                transform: translateX(10px)
            }

            100% {
                transform: translateX(0)
            }
        }

        /*
    Don't look at this last part. It's unnecessary. I was just playing with pixel gradients... Don't judge.
*/
        /*
@media screen and (max-width: 601px) {
  .rwd-table tr {
    background-image: -webkit-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -moz-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -o-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -ms-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
  }
  .rwd-table tr:nth-child(odd) {
    background-image: -webkit-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -moz-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -o-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -ms-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
  }
}*/
    </style>
</head>

<body>

    <div class="container">
        <h1>Adopción</h1>
        <table class="rwd-table">
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $adopcione['nombre'] }}</td>
                </tr>
                <tr>
                    <th>Rut</th>
                    <td>{{ $adopcione['rut'] }}</td>
                </tr>
                <tr>
                    <th>Domicilio</th>
                    <td>{{ $adopcione['domicilio'] }}</td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <td>{{ $adopcione['correo'] }}</td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td>{{ $adopcione['telefono'] }}</td>
                </tr>
                <tr>
                    <th>Nombre mascota</th>
                    <td>{{ $adopcione->mascota['nombre'] }}</td>
                </tr>
                <tr>
                    <th>Especie</th>
                    <td>{{ $adopcione->mascota['especie'] }}</td>
                </tr>
                <tr>
                    <th>Raza</th>
                    <td>{{ $adopcione->mascota['raza'] }}</td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td><img width="100" height="100"
                        src="{{ storage_path('app/public/'.$adopcione->mascota->foto) }}" alt=""></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
