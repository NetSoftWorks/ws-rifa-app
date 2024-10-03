<html style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #464646; margin: 0; padding: 0;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="format-detection" content="telephone=no">
    <title>Activación de Cuenta</title>
</head>
<body bgcolor="#498600" class="generic-template" style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #498600; margin: 0; padding: 0;">
    <!-- Header Start -->
    <div class="bg-white header" bgcolor="#ffffff" style="background-color: white; width: 100%;">
        <table align="center" bgcolor="#ffffff" style="border-left: 10px solid white; border-right: 10px solid white; max-width: 600px; width: 100%;">
            <tr height="80">
                <td align="left" class="vertical-align-middle" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: middle;">
                    <a href="http://localhost:4200" target="_blank" style="-webkit-text-decoration-color: #F16522; color: #F16522; text-decoration: none; text-decoration-color: #F16522;">
                        <img src="{{ url('https://i.imgur.com/rMRNILV.png') }}" alt="Miller365" height="100" style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <!-- Header End -->

    <!-- Content Start -->
    <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#498600" align="center" style="max-width: 600px;">
        <tr bgcolor="#498600">
            <td height="50" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
        </tr>

        <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->
        <tr bgcolor="#498600">
            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                <!-- Seperator Start -->
                <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#498600" align="center" style="max-width: 600px; width: 100%;">
                    <tr bgcolor="#498600">
                        <td height="30" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    </tr>
                </table>
                <!-- Seperator End -->

                <!-- Generic Pod Left Aligned Start -->
                <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white" class="bordered-left-right" style="border-left: 10px solid #498600; border-right: 10px solid #498600; max-width: 600px; width: 100%;">
                    <tr height="50"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                    <tr align="center">
                        <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        <td class="text-primary" style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                            <h2 style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 700; line-height: 28px; margin-bottom: 0; margin-top: 0;">Cuenta creada</h2>
                        </td>
                        <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    </tr>
                    <tr height="30"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                    <tr align="left">
                        <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                        <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                            <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Hola {{ $datos['usuario'] }},</p>
                            <br>
                            <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; text-align: justify;">Su cuenta ha sido creada y activada para la gestión del sistema Miller 365.</p>
                            <br/>
                            <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"> Su rol asignado es: <strong> {{ $datos['rol'] }} </strong>.</p>
                            <br/>
                            <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Sus credenciales son: <br> <strong> Correo: </strong> {{ $datos['correo'] }} <br> <strong>Clave temporal: </strong> {{ $datos['password'] }} </p>
                            <br/>
                            <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Ingrese <strong><a href="http://localhost:4200/login" style="color: inherit; text-decoration: none;">aquí</a></strong> para dirigirse al sistema. </p>
                            <br/>
                            <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Saludos cordiales,</p>
                            <br/>
                            <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Equipo Miller 365.</p>

                        </td>
                    </tr>
                    <tr height="50"><td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
                </table>
                <!-- Generic Pod Left Aligned End -->

                <!-- Seperator Start -->
                <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#498600" align="center" style="max-width: 600px; width: 100%;">
                    <tr bgcolor="#498600">
                        <td height="50" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    </tr>
                </table>
                <!-- Seperator End -->

            </td>
        </tr>
    </table>
    <!-- Content End -->

    <!-- Footer Start -->
    <div class="bg-gray-dark footer" bgcolor="#464646" height="165" style="background-color: #464646; width: 100%;">
        <table align="center" bgcolor="#464646" style="max-width: 600px; width: 100%;">
            <tr height="15"><td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
            <tr>
                <td align="center" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                    <a href="http://localhost:4200" target="_blank" style="-webkit-text-decoration-color: #F16522; color: #F16522; text-decoration: none; text-decoration-color: #F16522;">
                        <img src="{{ url('https://imgur.com/9EtcyyY.png') }}" alt="Miller365" height="60" style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                    </a>
                </td>
            </tr>
            <tr height="2"><td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
            <tr>
                <td align="center" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                    <p class="text-white" style="color: white; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">© 2024 Todos los derechos reservados. Miller 365. ®</p>
                </td>
            </tr>
            <tr height="15"><td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>

            <tr height="10"><td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td></tr>
        </table>
    </div>
    <!-- Footer End -->
</body>
</html>
