@if($engine->assign_method == 'onAge')
    <p>
        La categoría le ha sido asignada automáticamente basada en el cálculo de su edad en el día
        de la carrera.
    </p>
@endif

@if($engine->assign_method == 'onYear')
    <p>
        El evento y/o distancia y/o categoría le ha sido asignada automáticamente basado en su año de nacimiento.
    </p>
@endif

@if($engine->delegate_pickup == true)
    <p>
        En caso de que Ud. no pueda recoger el kit de competencia personalmente, podrá recogerlo un
        tercero si y solo si cuenta con una carta poder simple firmada por el participante, una
        copia simple
        del documento de identidad del participante y una copia simple del documento de identidad
        del tercero.
    </p>
@else
    <p>
        La entrega del kit de competencia es únicamente personal y presentando su documento de
        identidad,
        ningún tercero podrá recoger el kit de competencia a nombre de Ud. bajo ninguna
        circunstancia.
    </p>
@endif

@if($options->size_id > 0)
    <p>
        La disponibilidad de la talla seleccionada del polo de competencia solo se garantiza hasta
        agotar stock. Una vez elegida una talla no se realizarán cambios ni devoluciones en ningún
        caso y bajo ninguna circunstancia.
    </p>
@endif

@if($track->custom_bib == true)
    <p>
        La personalización de los números de competencia con la impresión del nombre o nombre corto
        (apodo) del participante, es ofrecida como una cortesía de los organizadores y sólo por
        tiempo limitado. El participante podrá elegir el nombre corto (apodo) que desee siempre y
        cuando no resulte ofensivo a la moral, al espíritu de competencia ni a ninguna marca
        comercial de las empresas organizadoras y/o patrocinadoras. La empresa organizadora se
        reserva el derecho de eliminar cualquier nombre corto que haga referencia directa o
        indirecta a cualquier tipo de discriminación, racismo, conducta o pensamiento negativo y/o
        antideportivo y usar en su lugar el nombre real del participante.
    </p>
@endif

@if($engine->event_change == 'allowDecrease')
    <p>
        Los cambios de distancia solo y únicamente están permitidos para transferir su inscripción a
        una distancia inferior y están sujetos a la disponibilidad de cupos en la distancia inferior
        elegida; y en caso de ser solicitado a voluntad del participante no existirá compensación ni
        devolución económica en caso de existir diferencias en los costos participación entre ambas
        distancias.
    </p>
@endif

@if($engine->event_change == 'notAllowed')
    <p>
        Los cambios de distancia no están permitidos en ningún caso y bajo ninguna circunstancia.
    </p>
@endif

@if($engine->event_change == 'allowAll')
    <p>
        Los cambios de distancia están permitidos.
    </p>
@endif