<h2>Bienvenido a {{ $event->pre }} {{ $event->name }} {{ $event->date->year }}</h2>

<p>Gracias por inscribirse, por favor conserve una copia de esta información como referencia
    y comprobante de su transacción así mismo sírvase presentar una copia al momento de recoger
    su kit de corredor junto con su documento de identidad.</p>

<p>Los participantes menores de edad deberán, además, presentar la
    <a href='{!! $event->getEventParentalURL() !!}' target='_blank'>autorización para menores de edad</a>
    debidamente firmada y acreditada por su padre y/o tutor y/o representante legal.</p>

<p>Para conocer y tener información de último momento sobre la
    <a href='{{ $event->url_expo }}' target='_blank'>Expo y la Entrega de Kits</a>, por favor
    siga y revise este <a href='{{ $event->url_expo }}' target='_blank'>vínculo</a> con frecuencia.</p>

<p>Se les recuerda que el kit de corredor contiene el polo oficial del evento, el número de competencia,
    el chip de cronometraje y otros materiales publicitarios de los auspiciadores y le es
    entregado en calidad de cortesía por su inscripción.</p>

<p>La organización le desea una buena preparación y éxitos en el evento.</p>