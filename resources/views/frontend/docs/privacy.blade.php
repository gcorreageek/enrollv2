<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10px;
            text-align: justify;
            margin: 50px 70px 50px 70px;
            line-height: 1.5;
        }

        .text-center {
            text-align: center;
        }

        .doc_header {
            margin-top: 75px;
        }

        .doc_body {
            margin-top: 30px;
        }

        .doc_signature {
            margin-top: 80px;
        }
    </style>
</head>

<body>

<div class='doc_title text-center'><h4>CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES</h4></div>

<div class="doc_body">

    <p>De conformidad con lo establecido en la Ley N° 29733, Ley de Protección de Datos Personales, y su Reglamento,
        quedo informado y otorgo mi consentimiento libre, previo, expreso, inequívoco e informado para el tratamiento de
        mi información personal, así como los datos personales de familiares menores de edad, bajo mi tutela o encargo
        según carta poder presentada oportunamente, que asistan a "{{ $event->pre }} {{ $event->name }}"; esto es, para la
        recopilación, registro, almacenamiento, conservación, utilización, transferencia nacional e internacional o
        cualquier otra forma de procesamiento con fines de publicidad y comunicación interna o externa.</p>

    <p>Se me ha informado que los datos suministrados serán incluidos en el banco de datos personales de titularidad de
        {{ $app->owner }}, y serán tratados con la finalidad de informar sobre "{{ $event->pre }} {{ $event->name }}" o
        futuras actualizaciones y/o modificaciones.</p>

    <p>He sido informado que los datos personales serán tratados con el grado de protección adecuado, tomándose las
        medidas de seguridad necesarias para evitar su alteración, pérdida, tratamiento o acceso no autorizado por parte
        de terceros, además que podré ejercer los derechos de acceso, actualización, inclusión, rectificación, supresión
        y oposición reconocidos en la Ley N° 29733 a través de una solicitud y/o consulta a la dirección
        <a href="mailto: {{ $app->owner_mail }}" target="_blank">{{ $app->owner_mail }}</a>.</p>


    <div class="doc_signature">
        <p>{{ $event->city }}, _____ de ___________________ de {{ $event->date->year }}</p>

        <p>FIRMA:</p>

        <p>NOMBRE:</p>

        <p>DNI:</p>

        <p>DIRECCIÓN:</p>

        <p>NUMERO DE INSCRIPCIÓN:</p>

    </div>


</div>
</body>
</html>