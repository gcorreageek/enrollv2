<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
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

<div class='doc_title text-center'><h2>AUTORIZACIÓN PARA MENOR DE EDAD</h2></div>

<div class='doc_header'><p>Señores<br/>{{ $event->owner }}<br/>Presente.-</p></div>

<div class="doc_body">
    <p>Estimados señores</p>

    <p>Quien suscribe, ______________________________, identificado(a) con D.N.I. __________,
        padre/madre/tutor legal de ______________________________, identificado(a) con D.N.I. __________,
        manifiesta por este medio la
        autorización al menor de edad en mención, a que participe en el evento {{ $event->pre }} {{ $event->name }}, el
        mismo
        que tendrá lugar en la ciudad de {{ $event->city }} el día {{ $event->longDate() }}.</p>

    <p>Asimismo, declaro haber leído el Reglamento que se encuentra en el sitio web del evento (<a
                href="{{ $event->url_event }}" target="_blank">{{ $event->url_event }}</a>) referido a la Carrera Pedestre
        "{{ $event->pre }} {{ $event->name }}" y acepto
        todos los términos y condiciones, el deslinde de responsabilidad y las políticas de privacidad del mismo.</p>


    <p>Agradeciendo la atención a la presente, les saluda atentamente,</p>

</div>


<div class="doc_signature">
    <p>
        <small>_____________________________<br/>(firma del padre / madre / tutor legal).</small>
    </p>
    <p>
        <small>Se adjunta copia simple del D.N.I. del padre / madre / tutor legal<br/>Se adjunta copia simple del D.N.I.
            del menor
            de edad.
        </small>
    </p>
</div>

</body>
</html>