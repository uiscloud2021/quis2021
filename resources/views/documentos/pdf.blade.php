<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
		@page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 1.65354in; margin-bottom: 1in }
		p { margin-bottom: 0.0in; margin-top: 0.0in; direction: ltr; line-height: 135%; orphans: 2; widows: 2 }
		p.western { font-family:"Calibri"; font-size: 11pt }
		/* p.cjk { font-size: 12pt; so-language: es-ES }
		p.ctl { font-size: 12pt } */
		a:link { color: #0000ff }
	</style>
</head>
<body lang="es-MX" link="#0000ff" dir="ltr">
    {{-- Hola soy tu pdf {{ $id }}
    {{ $formato }}
    <br><br><br>
    ID del formato
    {{ $formato['id'] }}
    <br><br>
    ID documento_formato
    {{ $formato['documento_formato_id'] }}
    <br><br>
    Datos json {{ $formato['datos_json'] }}
    <br><br><br> --}}
    @if ($formato['documento_formato_id'] === 1)
        <table width="100%" cellspacing="0">
            <col width="100%">
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" lang="x-none" align="right">
                        <span lang="es-MX">
                        Lugar, a Fecha   
                    </p>
                </td>
            </tr>
            {{-- <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr> --}}
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western">
                        <b>Dr.Nombre completo </b>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western">
                        <span lang="es-ES">Especialidad</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western">
                        <span lang="es-ES">P r e s e n t e</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="right">
                        <b>Asunto:</b>
                        Presentaci&oacute;n
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="right"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        <b>Estimado Doctor(a):</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        Gracias
                        por su respuesta al cuestionario de factibilidad, as&iacute; como
                        su inter&eacute;s por participar en el estudio relacionado a Patolog&iacute;a.
                        Con la presente, le reiteramos nuestra invitaci&oacute;n para
                        colaborar como 
                        <b>Seleccionar.</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        Queremos
                        destacarle que la Unidad de Investigaci&oacute;n en Salud (UIS)
                        tiene entre sus prop&oacute;sitos conducir protocolos de
                        investigaci&oacute;n cl&iacute;nica, para lo cual integra un
                        equipo de trabajo para cada estudio. Esta actividad tiene como
                        Patrocinador a la industria farmac&eacute;utica nacional y
                        mundial.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        En
                        cada investigaci&oacute;n, la UIS se encarga de facilitar el
                        trabajo de los m&eacute;dicos, ofreci&eacute;ndoles el personal
                        capacitado, necesario para realizar todas las actividades
                        log&iacute;sticas que no tengan que ver directamente con la
                        atenci&oacute;n m&eacute;dica del paciente, como el manejo de
                        muestras de laboratorio, la comunicaci&oacute;n con el
                        patrocinador y sus representantes, el manejo de medicamentos y
                        materiales, etc. Sin embargo, el investigador principal es siempre
                        el responsable legal de la investigaci&oacute;n.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        El
                        proceso completo de un estudio comprende diferentes etapas. En la
                        actual debemos esperar a que el Patrocinador eval&uacute;e la
                        posibilidad de nuestra participaci&oacute;n. En ese caso
                        afirmativo, deberemos integrar el equipo de trabajo, verificar sus
                        calificaciones, formalizar contratos, recibir capacitaciones y
                        solicitar la autorizaci&oacute;n del Comit&eacute; de &Eacute;tica
                        y de las autoridades nacionales de salud (COFEPRIS). La duraci&oacute;n
                        de este periodo es de aproximadamente 6 meses y estar&aacute; a
                        cargo de Autom&aacute;tico.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        Para
                        continuar los tr&aacute;mites, anexo encuentre un documento para
                        su firma. Se trata del Convenio de confidencialidad, mismo que nos
                        permitir&aacute; proporcionarle la informaci&oacute;n relacionada
                        al estudio, conforme se vaya generando por parte del patrocinador.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                        {{-- <p class="western" align="justify" style="margin-bottom: 0in"><br />

                        </p> --}}
                    <p class="western" align="justify">
                        En
                        www.uis.com.mx, en la secci&oacute;n
                        de Documentos &uacute;tiles puede encontrar todos los documentos
                        legales relacionados con la investigaci&oacute;n cl&iacute;nica. A
                        trav&eacute;s de la liga Capacitaci&oacute;n, puede entrar al
                        curso Buenas Pr&aacute;cticas Cl&iacute;nicas, el cual contiene
                        una visi&oacute;n amplia de las regulaciones en torno a la
                        investigaci&oacute;n cl&iacute;nica y su aplicaci&oacute;n local.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        En
                        adelante estaremos contact&aacute;ndole por v&iacute;a telef&oacute;nica
                        y de mensajer&iacute;a. Conforme se generen, le haremos llegar
                        todos los documentos relacionados al estudio, para su conocimiento
                        y firma. 
                    </p>
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        Es
                        necesario destacar que los patrocinadores eval&uacute;an tambi&eacute;n
                        los tiempos de respuesta. Por ello, le pedimos que nos ayude a
                        reducirlos al m&iacute;nimo.
                    </p>
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        Finalmente,
                        le informaremos de manera oportuna acerca de las reuniones o
                        actividades relacionadas con esta investigaci&oacute;n.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify">
                        Quedo
                        a sus &oacute;rdenes para cualquier comentario.
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="center">
                        Atentamente
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="center">
                        <br/>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <b>Dra.
                        Merced Vel&aacute;zquez</b>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        Direcci&oacute;n
                        General
                    </p>
                    <p class="western" align="center"><a name="_GoBack"></a>
                        Unidad
                        de Investigaci&oacute;n en Salud
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <span lang="es-MX">FC-SC-1201
                    Presentaci&oacute;n, Versi&oacute;n 26-jul-2021 - <sdfield type=PAGE subtype=RANDOM format=PAGE>
                        2</sdfield></span>
                / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>2</sdfield>
                    
            </p>
        </div>
    @endif
</body>
</html>