<p>Esta confirmación ha sido generada por <a href='{{ $app->owner_url }}' target='_blank'>{{ $app->owner_name }}</a>
    a través de su plataforma Enroll Engine como respuesta automática a su inscripción a
    {{ $event->pre }} {{ $event->name }} {{ $event->date->year }}.</p>

<p>Si tiene alguna consulta o desea comunicarse con la organización de este evento, por favor escriba
    a <a href='mailto: {{ $app->support_mail }}'>{{ $app->support_mail }}</a> o llame a nuestra
    línea de atención al participante al número telefónico {{ $app->support_telephone }}
    (Atención: {{ $app->support_availability }})</p>

<p>Esta confirmación de su participación da constancia de que Ud. ha leído y
    aceptado el <a href='{{ $event->url_rules }}' target='_blank'>reglamento del evento</a>,
    los <a href='{!! $event->getEventDisclaimerURL() !!}' target='_blank'>Términos y Condiciones de Participación</a> y
    las <a href='{!! $event->getEventPrivacyURL() !!}' target='_blank'>políticas de privacidad</a> de
    los organizadores y productores del evento.</p>