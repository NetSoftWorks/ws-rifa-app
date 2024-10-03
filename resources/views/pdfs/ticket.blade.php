<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ticket</title>

        <style>
            @page {
                margin-top: 40px;
                margin-bottom: 0px;
                margin-right: 20px;
                margin-left: 20px;
            }

            * {
                font-family: sans-serif;
            }

            .container {
                padding: 0 40px;
            }

            .datos-ticket span {
                font-size: 24px;
                word-spacing: 0px;
                letter-spacing: 1px;
            }

            .datos-ticket .vendedor {
                text-align: right;
            }

            .datos-rifa-table {
                width: 100%;
                table-layout: fixed;
            }

            .datos-rifa-table td {
                font-weight: bold;
            }

            .datos-ticket .empresa {
                font-style: italic;
                font-size: 50px;
                text-align: left;
                padding-top: 30px;
            }

            .datos-ticket .numero {
                font-size: 95px;
                text-align: right;
            }

            .datos-rifa {
                margin-top: 0px;
                background-image: url('images/manos2.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .datos-rifa .valor {
                text-align: center;
                font-weight: bold;
                font-size: 50px;
                margin-top: 0px;
                margin-bottom: 10px;
                letter-spacing: 1px;
            }

            .datos-rifa .precio {
                font-size: 70px;
            }

            .premios-table {
                width: 100%;
                border-collapse: collapse;
            }

            .premios-table td {
                font-size: 40px;
                font-weight: bold;
                padding: 10px;
                text-align: center;
            }

            .premios-table td strong{ 
                font-size: 75px;
            }

            .full-width {
                text-align: center;
            }

            .footer {
                font-size: 22px;
                text-align: center;
            }

            .footer .fecha{
                font-style: italic;
                word-spacing: 250px;
                text-decoration: underline;
                margin: 0 15px 20px 0px;  
            }

            .footer .condiciones {
                font-weight: bold;
            }

            .codigo-qr {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="datos-ticket">
                <div class="vendedor" >
                    <span>vendedor: {{ $ticket['vendedor'] }}</span>
                </div>
                <table class="datos-rifa-table">
                    <tr>
                        <td class="empresa">Miller365</td>
                        <td class="numero">#{{ $ticket['numero'] }}</td>
                    </tr>
                </table>
            </div>

            <div class="datos-rifa" style=" position: relative;">

                <p class="valor">Valor $<strong class="precio">{{ $ticket['valor'] }}</strong></p>

                <table class="premios-table">
                    <tr>
                        <td>1era <strong style="font-size: 75px;">${{ $ticket['premio1'] }}</strong></td>
                        <td>4ta <strong style="font-size: 75px;">${{ $ticket['premio4'] }}</strong></td>
                    </tr>
                    <tr>
                        <td>2da <strong style="font-size: 75px;">${{ $ticket['premio2'] }}</strong></td>
                        <td>5ta <strong style="font-size: 75px;">${{ $ticket['premio5'] }}</strong></td>
                    </tr>
                    <tr>
                        <td>3era <strong style="font-size: 75px;">${{ $ticket['premio3'] }}</strong></td>
                        <td>6ta <strong style="font-size: 75px;">${{ $ticket['premio6'] }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="full-width">7ma <strong style="font-size: 75px;">${{ $ticket['premio7'] }}</strong></td>
                    </tr>
                </table>

            </div>
            <br>
            <div class="codigo-qr">
                <div>{!! $qrCode !!}</div>                
            </div>
            <div class="footer">
                <p class="fecha">{{ $ticket['fecha'] }}                      Miller365</p>

                <p class="condiciones">Todo boleto ganador tiene 7 días de vigencia para reclamar tu premio.</p>
            </div>
        </div>
        
    </body>

</html>