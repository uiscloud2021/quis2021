<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- TODO: Cambiar titulo dependiendo del documento o dejarlo como unidad de investigacion en salud -->
    <title>Document</title>
    {{-- <style type="text/css">
        /* @font-face {
        font-family: 'Calibri';
        font-style: italic;
        font-weight: 400;
        src: url(https://fonts.gstatic.com/l/font?kit=J7adnpV-BGlaFfdAhLQo6btP&skey=36a3d5758e0e2f58&v=v11) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
        font-family: 'Calibri';
        font-style: italic;
        font-weight: 700;
        src: url(https://fonts.gstatic.com/l/font?kit=J7aYnpV-BGlaFfdAhLQgUp5aHRge&skey=8b00183e5f6700b6&v=v11) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
        font-family: 'Calibri';
        font-style: normal;
        font-weight: 400;
        src: url(https://fonts.gstatic.com/l/font?kit=J7afnpV-BGlaFfdAhLEY6w&skey=a1029226f80653a8&v=v11) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        } */

        /* @font-face {
        font-family: 'Calibri';
        font-style: normal;
        font-weight: 400;
        src: url({{ storage_path('fonts\Calibri.ttf') }}) format("truetype");
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        } */

	</style> --}}
    @if ($formato['documento_formato_id'] === 1)
        <style type="text/css?2">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 4.2cm; margin-bottom: 2.5cm }
            p { margin-bottom: 0.0in; margin-top: 0.0in; orphans: 4; widows: 4 }
            p.western { line-height: 103%; font-family:Calibri, sans-serif; font-size: 11pt }
            /* p.cjk { font-size: 11pt; so-language: es-ES }
            p.ctl { font-size: 11pt } */
            a:link { color: #0000ff }
            
            footer {
                position: fixed; 
                bottom: -1.63cm; 
                left: 0px; 
                right: 0px;
                height: 1.25cm;

                margin-top: 0.45in; 
                /* margin-bottom: -0.45in;  */
                line-height: 150%;
                /* border: solid red; */
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 10pt;
            }
            table {
                border-collapse: collapse;
            }
            tr {
                /* border: 1px solid black; */
                height: 0.55cm;
                /* border-collapse: collapse; */
            }
            td {
                /* border: 1px solid black ; */
                /* height: 0.56cm; */
                /* border-collapse: collapse; */
                /* border: 1px solid black; */
                padding-top: 0px;
                paddinf-bottom: 0px;
                padding-left: 5px;
                padding-right: 5px;
            }
            b {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 10pt;
            }
            /* header{
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                margin-bottom: 1.12in; 
                line-height: 100%;

                * Extra personal styles *
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            } */
            .pagenum:before {
                content: counter(page);
            }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 2)
        
    @endif
    @if ($formato['documento_formato_id'] === 3)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 3cm; margin-right: 3cm; margin-top: 2.5cm; margin-bottom: 2.5cm }
            p { border: red; margin-bottom: 0.1in; line-height: 150%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", sans-serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
            header {
                position: fixed;
                top: -1.54cm;
                left: 0px;
                right: 0px;
                height: 30;

                /* * Extra personal styles * */
                /* background-color: black; */
                /* color: black; */
                text-align: center;
                line-height: 35px;
            }
            footer {
                position: fixed; 
                bottom: -1.30cm; 
                left: 0px; 
                right: 0px;
                height: 1.25cm;

                /* margin-top: 0.45in;  */
                /* margin-bottom: 0in; */
                line-height: 150%;
                /* background: #5ea6c7; */
                /* border: solid red; */
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 10pt;
            }
            table {
                /* border: 1px solid black; */
                padding-right: 7.5px;
                padding-left: 7.5px;
            }
            tr {
                /* border: 1px solid black; */
            }
            td {
                /* border: 0.5px groove black; */
            }
            .pagenum:before {
                content: counter(page);
            }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 4)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 7)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 4.17cm; margin-bottom: 2.5cm }
            p { margin-bottom: 0.0in; orphans: 4; widows: 4 }
            p.western { line-height: 103%; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 11pt; margin-top: 0px; margin-top: -0.5px;}
            /* p.cjk { font-size: 11pt; so-language: es-ES }
            p.ctl { font-size: 11pt } */
            a:link { color: #0000ff }
            footer {
                position: fixed; 
                bottom: -1.7cm; 
                left: 0px; 
                right: 0px;
                height: 1.25cm;

                /* margin-top: 0.45in;  */
                /* margin-bottom: -0.45in;  */
                line-height: 100%;
                /* border: solid red; */
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 10pt;
            }
            table {
                border-collapse: collapse;
            }
            tr {
                /* border: 1px solid black; */
                height: 0.55cm;
                /* border-collapse: collapse; */
            }
            td {
                /* border: 1px solid black ; */
                /* height: 0.56cm; */
                /* border-collapse: collapse; */
                padding-top: 0px;
                paddinf-bottom: 0px;
                padding-left: 8px;
                padding-right: 8px;
            }
            b {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 9.7pt;
                /* font-size-adjust: 0.5; */
            }
            ul {
                margin-top: 0in;
                margin-bottom: 0in;
            }
            /* header{
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                margin-bottom: 1.12in; 
                line-height: 100%;

                * Extra personal styles *
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            } */
            .pagenum:before {
                content: counter(page);
            }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 8)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 4.17cm; margin-bottom: 2.5cm }
            p { orphans: 2; widows: 2 }
            p.western { line-height: 103%; margin-bottom: 0in; margin-top: -1px; font-family:Calibri, sans-serif; font-size: 11pt; }
            p.western.ul {
                padding-left: 8.39px;
            }
            /* p.cjk { font-size: 12pt; so-language: en-US; font-weight: bold }
            p.ctl { font-size: 10pt } */
            a:link { color: #0000ff }
            footer {
                position: fixed; 
                bottom: -1.50cm; 
                left: 0px; 
                right: 0px;
                height: 1.25cm;

                /* margin-top: 0.45in;  */
                /* margin-bottom: -0.45in;  */
                line-height: 150%;
                /* border: solid red; */
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 10pt;
            }
            table {
                border-collapse: collapse;
            }
            tr {
                /* border: 1px solid black; */
                /* height: 0.55cm; */
                /* border-collapse: collapse; */
            }
            td {
                /* border: 1px solid black ; */
                /* height: 0.56cm; */
                /* border-collapse: collapse; */
                padding-top: 0px;
                paddinf-bottom: 0px;
                padding-left: 7px;
                padding-right: 7px;
            }
            b {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 9.5pt;
                margin-bottom: 0in;
            }
            br {
                height: 0.56cm;
            }
            ul {
                margin-top: 0in;
                margin-bottom: 0in;
            }
            /* header{
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                margin-bottom: 1.12in; 
                line-height: 100%;

                * Extra personal styles *
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            } */
            .pagenum:before {
                content: counter(page);
            }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 9)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 4.17cm; margin-bottom: 2.5cm }
            p { orphans: 2; widows: 2 }
            p.western { line-height: 103%; margin-bottom: 0.1in; margin-top: -1px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 11pt; }
            /* p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt } */
            a:link { color: #0000ff }
            footer {
                position: fixed; 
                bottom: -1.50cm; 
                left: 0px; 
                right: 0px;
                height: 1.25cm;

                /* margin-top: 0.45in;  */
                /* margin-bottom: -0.45in;  */
                line-height: 150%;
                /* border: solid red; */
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 10pt;
            }
            table {
                border-collapse: collapse;
            }
            tr {
                /* border: 1px solid black; */
                /* height: 0.55cm; */
                /* border-collapse: collapse; */
            }
            td {
                /* border: 1px solid black ; */
                /* height: 0.56cm; */
                /* border-collapse: collapse; */
                padding-top: 0px;
                paddinf-bottom: 0px;
                padding-left: 7px;
                padding-right: 7px;
            }
            b {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 9.5pt;
                margin-bottom: 0in;
            }
            br {
                height: 0.56cm;
            }
            /* header{
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                margin-bottom: 1.12in; 
                line-height: 100%;

                * Extra personal styles *
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            } */
            .pagenum:before {
                content: counter(page);
            }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 10)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 11)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 12)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 27)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 28)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 55)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 56)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 57)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            @page:first { margin-top: 0.98in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 58)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 63)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            @page:first { }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 72)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 76)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 77)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 78)
        <!-- TODO: ver donde esta el formato de privacidad y datos -->
    @endif
    @if ($formato['documento_formato_id'] === 79)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 80)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 81)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 82)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 83)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 84)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 85)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 86)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 87)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 88)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 89)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 90)
        <style type="text/css">
            @page { size: 11in 8.5in; margin-left: 0.98in; margin-right: 0.98in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
    @if ($formato['documento_formato_id'] === 91)
        <style type="text/css">
            @page { size: 8.5in 11in; margin-left: 1.18in; margin-right: 1.18in; margin-top: 0.49in; margin-bottom: 0.49in }
            p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; orphans: 2; widows: 2 }
            p.western { font-family: "Arial", serif; font-size: 12pt }
            p.cjk { font-size: 12pt; so-language: es-ES }
            p.ctl { font-size: 12pt }
            a:link { color: #0000ff }
        </style>
    @endif
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
    <br><br><br>
    Datos json {{ $datos[1] }}
    <br><br><br> --}}

    {{-- Presentación --}}
    @if ($formato['documento_formato_id'] === 1)

    {{-- <header>

    </header> --}}

    <footer>
        <p align="center">
            FC-SC-1201 Presentaci&oacute;n, Versi&oacute;n 26-jul-2021 - 
            <span class="pagenum"></span> / 2
        </p>
    </footer>

        <table width="100%">
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western" lang="x-none" align="right">
                        <span lang="es-MX">
                        {{--  Lugar, a Fecha   --}}
                        {{$datos[0]}}, a {{$datos[1]}}
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western">
                        {{-- <b>Dr.Nombre completo </b> --}}
                        <!-- TODO: CAmbiar lo de Dr. -->
                        <b>Dr. {{$datos[2]}}</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff;">
                    <p class="western">
                        {{-- <span lang="es-ES">Especialidad</span> --}}
                        <span lang="es-ES">{{$datos[3]}}</span>
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
                        <!-- TODO: Ver lo de cambiar a Doctor o doctora dependiendo del genero -->
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
                        Gracias por su respuesta al cuestionario de factibilidad, as&iacute; como
                        {{-- su inter&eacute;s por participar en el estudio relacionado a Patolog&iacute;a. --}}
                        su inter&eacute;s por participar en el estudio relacionado a {{$datos[4]}}.
                        Con la presente, le reiteramos nuestra invitaci&oacute;n para
                        colaborar como 
                        {{-- <b>Seleccionar.</b> --}}
                        {{$datos[5]}}.
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
                        En cada investigaci&oacute;n, la UIS se encarga de facilitar el trabajo de 
                        los m&eacute;dicos, ofreci&eacute;ndoles el personal
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
                        {{-- cargo de Autom&aacute;tico. --}}
                        cargo de {{$datos[6]}}.
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
    @endif
    {{-- End Presentación --}}


    {{-- Constancia anual --}}
    @if ($formato['documento_formato_id'] === 2)
        <!-- TODO: Convertir Powerpoint to html o crear el archivo desde cero -->
    @endif
    {{-- END Constancia anual --}}


    {{-- Publicidad --}}
    @if ($formato['documento_formato_id'] === 3)

    <header>
        <p align="right">
            <img src="assets/image/uis-publicidad.jpg" name="UIS logo" align="left" hspace="0" width="126" height="41" border="0" style="position: relative; top: -16px; right: -3.5px;" />


        </p>
        <p lang="x-none" align="right" style="margin-bottom: 0.45in; line-height: 100%">

        </p>
    </header>
    <footer>
        <p align="center">
            FC-SC-1301 Publicidad, Versi&oacute;n 26-jul-2021 - <span class="pagenum"></span> / 1
        </p>
    </footer>

        <table width="100%" cellspacing="0">
            <col width="100%">
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff; border: 0.2px solid #00000a;">
                    <p class="western" align="justify" style="margin-top: 0in; line-height: 133%;"><br />

                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in;">
                        <font size="6" style="font-size: 24pt">&iquest;Padece
                            usted </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 260%;">
                        <font size="6" style="font-size: 24pt"><b>Nombre de la patolog&iacute;a</b></font><font size="6" style="font-size: 24pt">?</font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 135%;"><br />

                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font size="4" style="font-size: 16pt">Le
                            invitamos a participar en la prueba </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 120%;">
                        <font size="4" style="font-size: 16pt">de
                            un medicamento en investigaci&oacute;n</font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 131%;">
                        <font size="4" style="font-size: 16pt">para
                            esta enfermedad.</font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 109%;"><br />

                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font size="4" style="font-size: 16pt">Los
                            requisitos son: &hellip;(especificar los requisitos.)</font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 108%;"><br />

                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font size="4" style="font-size: 16pt">Los
                            participantes ser&aacute;n atendidos</font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 122%;">
                        <font size="4" style="font-size: 16pt">en
                            forma gratuita por m&eacute;dicos especialistas de esta</font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 125%;">
                        <font size="4" style="font-size: 16pt">ciudad.</font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 55%;"><br />

                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font size="4" style="font-size: 16pt"><b>Informes
                                a los tel&eacute;fonos</b></font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 315%;"><a name="_GoBack"></a>
                        <font size="7" style="font-size: 36pt"><b>Seleccionar</b></font>
                    </p>
                    <p class="western" align="right" style="margin-bottom: 0in; line-height: 200%;"><br />

                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in; margin-left: 5px;"><img src="assets/image/UnidadInvestigacion-publicidad.jpg" name="Unidad de investigación en salud" align="left" hspace="1" vspace="1" width="299" height="70" align="bottom"/>
                        <span dir="ltr"
                            style="float: left; width: 6.89cm; height: 1.09cm; border: none; padding: 0.1in; padding-left: 20px;">
                            <p>
                                <font size="4" style="font-size: 16pt">Servicios para la ciencia</font><sup>&reg;</sup>
                            </p>
                        </span>
                    </p>
                    <p class="western" align="center" style="padding-top: 5px; line-height: 160%;"><a href="http://www.uis.com.mx/"><span
                                lang="en-US">www.uis.com.mx</span></a></p>
                </td>
            </tr>
        </table>
        {{-- <p lang="en-US" class="western" style="margin-bottom: 0in; line-height: 100%">
            <br />

        </p> --}}
        {{-- <p align="right" style="margin-bottom: 0in; font-weight: normal; line-height: 115%">
            <br />

        </p> --}}
        {{-- <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p> --}}
    @endif
    {{-- END Publicidad --}}


    {{-- Códigos y titulos --}}
    @if ($formato['documento_formato_id'] === 4)
        <!-- TODO: queda pendiente -->
    @endif
    {{-- END Códigos y titulos --}}


    {{-- Sometimiento --}}
    @if ($formato['documento_formato_id'] === 7)
    <!-- TODO: Detalles pero esta bien -->
        {{-- <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div> --}}
        <footer>
            <p lang="x-none" align="center">
                FC-SC-2201 Sometimiento, Versi&oacute;n 26-jul-2021 - <span class="pagenum"></span> / 1
        </footer>
        <table width="100%">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff border: none;">
                    <p lang="x-none" align="right" style="font-family:Calibri, sans-serif; font-size: 11pt;
                    margin-top: -5px; margin-right: 2px;">
                        Lugar, Fecha
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western">
                        <font style="font-size: 8pt"><b>Dr. Juan Carlos Cant&uacute; Reyes /</b></font>
                        <font style="font-size: 10pt">Presidente
                        del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n</font>
                        <font style="font-size: 8pt"><b>y</b></font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western">
                        <b>Dra. Mar&iacute;a Elena Mart&iacute;nez Tapia /</b>
                        <font style="font-size: 10pt">Presidente del Comit&eacute; de Investigaci&oacute;n</font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in">Unidad de Investigaci&oacute;n en Salud de Chihuahua, S.C.
                    </p>
                    <p class="western" align="justify">
                        P r e s e n t e
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff border: none; padding: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right"><b>C&oacute;digo UIS: </b>C&oacute;digo UIS
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <b>Asunto:</b>
                        Sometimiento CE
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="101px" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <b>C&oacute;digo</b>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        C&oacute;digo.
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="101px" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <b>T&iacute;tulo</b>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <b>T&iacute;tulo</b>
                        .
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="101px" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <b>Patrocinador</b>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        Nombre del patrocinador.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <b>Estimados Doctores:</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        Con la finalidad de realizar el estudio arriba mencionado, por la
                        presente SOMETO a revisi&oacute;n del Comit&eacute; de &Eacute;tica
                        de la Unidad de Investigaci&oacute;n en Salud de Chihuahua, S.C.,
                        integrado por el Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                        y el Comit&eacute; de Investigaci&oacute;n, los siguientes
                        documentos:
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Escribir nombre, versi&oacute;n y fecha documento.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        Sin otro particular por el momento, env&iacute;o un cordial saludo.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        Atentamente,
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <b>Dr. Nombre completo del Investigador principal</b>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        Investigador Principal
                    </p>
                    <p class="western" align="center">
                        Unidad de Investigaci&oacute;n en Salud de Chihuahua, S.C.
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
    @endif
    {{-- END Sometimiento --}}


    {{-- Compromiso --}}
    @if ($formato['documento_formato_id'] === 8)
        {{-- <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; font-weight: normal">

            </p>
        </div> --}}
        <footer>
            <p lang="x-none" align="center">
                FC-SC-2301 Compromisos, Versi&oacute;n 26-jul-2021 - <span class="pagenum"></span> / 2
            </p>
        </footer>
        
        <table width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff" >
                    <p lang="x-none" align="right" class="western" style="line-height: 100%">
                        Seleccionar, Fecha
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff; height: 0.56cm;">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" style="line-height: 98%; margin-top: -2px;">
                        <b>Comisi&oacute;n Federal para la Protecci&oacute;n Contra Riesgos Sanitarios. COFEPRIS. </b>
                    </p>
                    <p class="western" style="line-height: 98%">
                        Comisi&oacute;n de Autorizaci&oacute;n Sanitaria
                    </p>
                    <p class="western" align="justify" style="line-height: 95%">
                        Secretar&iacute;a de Salud
                    </p>
                    <p class="western" align="justify" style="line-height: 98%">
                        P r e s e n t e
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="right" style="line-height: 105%"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="right" style="font-weight: normal">
                        <b>Asunto:</b> Compromisos del Seleccionar
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="97px" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 107%">
                        <b>C&oacute;digo</b>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 107%">
                        C&oacute;digo.
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="97px" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 106%">
                        <b>T&iacute;tulo</b>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 106%">
                        <b>T&iacute;tulo</b>.
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="97px" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 104%">
                        <b>Patrocinador</b>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 104%">
                        Patrocinador.
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="97px" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 100%">
                        <b>Sitio cl&iacute;nico</b>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 100%">
                        Unidad de Investigaci&oacute;n en Salud de Chihuahua, S.C. Autom&aacute;tico.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify"><br>

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 110%;">
                        <b>A quien corresponda:</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="line-height: 104%;">
                        Con la presente, declaro que he recibido la informaci&oacute;n
                        necesaria para llevar a cabo el estudio mencionado. 
                        <b>ACEPTO</b>
                        participar en &eacute;l como 
                        <b>Autom&aacute;tico</b>
                        , asumiendo con ello los siguientes compromisos:
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Conocer
                                y trabajar en apego al Reglamento de la Ley General de Salud en
                                Materia de Investigaci&oacute;n para la Salud y a la
                                NOM-012-SSA3-2012 y sus actualizaciones. 
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Conocer
                                y trabajar en apego a las Buenas pr&aacute;cticas cl&iacute;nicas
                                (GCP) emitidas por la Conferencia Internacional de Armonizaci&oacute;n
                                (ICH). 
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify"">
                                Mantener <b>estricta confidencialidad</b>
                                acerca de los documentos e informaci&oacute;n relacionados al
                                protocolo, as&iacute; como sobre la informaci&oacute;n
                                generada, la cual no podr&eacute; publicar sin previa
                                autorizaci&oacute;n del patrocinador.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Integrar
                                un equipo de trabajo con los recursos humanos necesarios y
                                apropiados para la conducci&oacute;n del estudio. Asegurar su
                                capacitaci&oacute;n y supervisarlo al implementar la
                                investigaci&oacute;n. Removerlo en caso necesario, e informar a
                                la COFEPRIS de cualquier cambio al respecto.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Durante
                                el reclutamiento, no participar como investigador en otro
                                protocolo que requiera el uso de un medicamento para la misma
                                indicaci&oacute;n, o que los criterios de inclusi&oacute;n y
                                exclusi&oacute;n sean similares al protocolo descrito.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Conservar en el Sitio Cl&iacute;nico el archivo de la investigaci&oacute;n,
                                el medicamento de estudio y todos los documentos, materiales y
                                datos relacionados a las personas que participan como sujetos de
                                investigaci&oacute;n.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Proteger los datos de las personas que participen como sujetos de estudio,
                                utilizando &uacute;nicamente iniciales y n&uacute;meros para
                                identificarles fuera del Sitio cl&iacute;nico.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Entregar
                                a cada persona que participe como sujeto de investigaci&oacute;n,
                                la informaci&oacute;n necesaria para establecer contacto en caso
                                de emergencia durante el desarrollo del estudio.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                En
                                apego a la NOM-220-SSA1-2016, relacionada a la instalaci&oacute;n
                                y operaci&oacute;n de la Farmacovigilancia, reportar al
                                Patrocinador, COFEPRIS y Comit&eacute; de &Eacute;tica, todo <b>Evento Adverso Serio</b>
                                (EAS) que se presente durante el estudio.
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <ul>
                        <li>
                            <p class="western ul" align="justify">
                                Asegurar
                                que todos los documentos relacionados a la investigaci&oacute;n
                                sean almacenados en forma controlada, hasta la fecha de
                                depuraci&oacute;n descrita en el protocolo o en sus enmiendas. 
                            </p>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="margin-left: 0.5in; font-weight: normal">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify">
                        As&iacute;
                        mismo, notifico que el Comit&eacute; de &Eacute;tica de la Unidad
                        de Investigaci&oacute;n en Salud de Chihuahua. S.C., integrado por
                        el Comit&eacute; de &Eacute;tica en Investigaci&oacute;n y el
                        Comit&eacute; de Investigaci&oacute;n, revis&oacute; y aprob&oacute;
                        el proyecto mencionado.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify">
                        Finalmente,
                        DELCARO no tener relaci&oacute;n comercial, econ&oacute;mica o
                        profesional directa con el patrocinador. No poseo participaci&oacute;n
                        accionaria en la empresa que patrocina, ni en el producto que se
                        investiga, por lo cual no tengo ning&uacute;n inter&eacute;s en el
                        resultado de la investigaci&oacute;n.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="justify">
                        Sin otro particular por el momento.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center">
                        Atentamente,
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" height="9" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center" style="font-weight: normal"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center">
                        <b>T&iacute;tulo. Nombre completo</b>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center">
                        <b>C&eacute;dula</b>
                        C&eacute;dula profesional
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                    <p class="western" align="center">
                        Rol en la investigaci&oacute;
                    </p>
                    <p class="western" align="center">
                        Unidad de Investigaci&oacute;n en Salud de Chihuahua, S.C.
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="font-weight: normal"><br />

        </p>
    @endif
    {{-- END Compromiso --}}


    {{-- Responsabilidades --}}
    @if ($formato['documento_formato_id'] === 9)
        {{-- <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div> --}}
        <footer>
            <p lang="x-none" align="center">
                FC-SC-2302 Responsabilidades, Versi&oacute;n 17-mayo-2021 - <span class="pagenum"></span> / 2
            </p>
        </footer>
        <table width="100%" cellpadding="0" cellspacing="0">
            {{-- <tbody> --}}
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p lang="x-none" align="right" class="western">
                            Seleccionar, Fecha
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify"><br>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" style="margin-bottom: 0in">
                            <b>Comisi&oacute;n
                            Federal para la Protecci&oacute;n Contra Riesgos Sanitarios.
                            COFEPRIS. </b>
                        </p>
                        <p class="western" style="margin-bottom: 0in">
                            Comisi&oacute;n
                            de Autorizaci&oacute;n Sanitaria
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            Secretar&iacute;a
                            de salud
                        </p>
                        <p class="western" align="justify">
                            P r e s e n t e
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="right"><br>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="right">
                            <b>Asunto:</b>
                            Responsabilidades de investigaci&oacute;n cl&iacute;nica
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify"><br>

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            <b>C&oacute;digo</b>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            C&oacute;digo.
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            <b>T&iacute;tulo</b>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            <b>T&iacute;tulo</b></font>.
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            <b>Patrocinador</b>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            Nombre
                            del patrocinador.
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            <b>Sitio cl&iacute;nico</b>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            Unidad
                            de Investigaci&oacute;n en Salud de Chihuahua, S.C. Autom&aacute;tico.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify"><br>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            <b>A quien corresponda:</b>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify"><br>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify">
                            Con
                            la presente y como Investigador principal del estudio mencionado, <b>DELEGO</b>
                            al siguiente personal las actividades que se describen:
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff">
                        <p class="western" align="justify"><br>

                        </p>
                    </td>
                </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0">
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9; border: 1px solid black">
                        <p class="western" align="center">
                            <b>Nombre</b>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9; border: 1px solid black">
                        <p class="western" align="center">
                            <b>Rol en el estudio</b>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9; border: 1px solid black">
                        <p class="western" align="center">
                            <b>Responsabilidades</b>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9; border: 1px solid black">
                        <p class="western" align="center">
                            <b>Firma</b>
                        </p>
                    </td>
                </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0">
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0">
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr>
                    <td colspan="1" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sin
                                    otro particular por el momento.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0">
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr>
                    <td colspan="11" width="100%" valign="top" bgcolor="#d9d9d9" style="background: #d9d9d9; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Responsabilidades</font>
                            </font>
                        </p>
                    </td>
                </tr>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0">
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">1=Conducir
                                    el estudio</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">11=Registro
                                    de medicamentos </font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">20=Preparaci&oacute;n
                                    de muestras </font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">2=Selecci&oacute;n
                                    de pacientes</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">12=Control
                                    de medicamento</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">21=ECG</font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">3=Firma
                                    de ICF</font>
                            </font>
                        </p>
                    </td>
                    <td rowspan="1" colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border-top: 1px solid #00000a; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">13=Preparaci&oacute;n
                                    y ministraci&oacute;n de producto de investigaci&oacute;n </font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">22=Recolectar
                                    datos </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">4=Confirmar
                                    elegibilidad</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <br>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            23=Captura de datos CRF
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">5=Examen
                                    f&iacute;sico</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">14=Terapias
                                    de rescate</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">24=Actividades
                                    administrativas</font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">6=Signos
                                    vitales</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">15=Finalizar
                                    tratamiento</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">25=Aplicaci&oacute;n
                                    de escalas</font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">7=Aleatorizaci&oacute;n</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">16=Evaluaci&oacute;n
                                    de EA</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">26=T&eacute;cnico
                                    radi&oacute;logo</font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">8=Comunicaci&oacute;n
                                    IVRS</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">17=Informaci&oacute;n
                                    a los sujetos</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">27=Dermat&oacute;logo</font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">9=Prescripci&oacute;n
                                    de producto</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">18=Entrega
                                    de materiales</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">28=T&eacute;cnico
                                    en espirometr&iacute;a</font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr valign="top">
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">10=Dispensar
                                    medicamento</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">19=Obtener
                                    muestras biol&oacute;gicas</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="1" width="100%" bgcolor="#ffffff" style="background: #ffffff; border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt">29=Oftalm&oacute;logo</font>
                            </font>
                        </p>
                    </td>
                </tr>
        </table>
        <table width="100%" cellpadding="0" cellspace="0">
            {{-- </tbody> --}}
            {{-- <tbody> --}}
                <tr>
                    <td colspan="12" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="12" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Nombre completo del Investigador principal</b></font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Investigador
                                    Principal</font>
                            </font>
                        </p>
                        <p class="western" align="center"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                    </td>
                </tr>
            {{-- </tbody> --}}
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
    @endif
    {{-- END Responsabilidades --}}


    {{-- Autorizacion --}}
    @if ($formato['documento_formato_id'] === 10)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Seleccionar,
                                                Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Comisi&oacute;n
                                    Federal para la Protecci&oacute;n Contra Riesgos Sanitarios.
                                    COFEPRIS.</b></font>
                        </font>
                    </p>
                    <p class="western" style="margin-bottom: 0in"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Comisi&oacute;n
                                de Autorizaci&oacute;n Sanitaria</font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Secretar&iacute;a
                                de Salud</font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Autorizaci&oacute;n</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre
                                del Patrocinador.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Sitio
                                    cl&iacute;nico</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C. Autom&aacute;tico.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>A
                                    quien corresponda:</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Con
                                la presente </font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>AUTORIZO</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Por g&eacute;nero Nombre completo del Investigador Principal a que
                                realice el protocolo de investigaci&oacute;n cl&iacute;nica
                                mencionado.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Los
                                documentos relacionados a esa investigaci&oacute;n fueron
                                revisados y aprobados por el Comit&eacute; de &Eacute;tica de la
                                empresa, integrado por los Comit&eacute;s de &Eacute;tica en
                                Investigaci&oacute;n y de Investigaci&oacute;n, mismo que estar&aacute;
                                vigilando su desarrollo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tambi&eacute;n
                                informo que los Eventos Adversos Serios que lo ameriten, ser&aacute;n
                                atendidos en Nombre del Hospital para atenci&oacute;n de
                                urgencias.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dra.
                                    Mar&iacute;a de la Merced Vel&aacute;zquez Quintana </b></font>
                        </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Direcci&oacute;n
                                General</font>
                        </font>
                    </p>
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-2303
                            Autorizaci&oacute;n, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Autorizacion --}}


    {{-- Instalaciones --}}
    @if ($formato['documento_formato_id'] === 11)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.12in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Seleccionar,
                                                a Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Comisi&oacute;n
                                    Federal para la Protecci&oacute;n Contra Riesgos Sanitarios.
                                    COFEPRIS.</b></font>
                        </font>
                    </p>
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Comisi&oacute;n
                                de Autorizaci&oacute;n Sanitaria</font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Secretar&iacute;a
                                de Salud</font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Instalaciones</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Sitio
                                    cl&iacute;nico</b></font>
                        </font>
                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C. Autom&aacute;tico.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Investigador
                                    Principal</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo.
                                    Nombre completo</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>A
                                    quien corresponda:</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Por
                                este medio informo que para realizar el estudio arriba mencionado,
                                la Unidad de Investigaci&oacute;n en Salud de Chihuahua, S.C.
                                cuenta con las siguientes </font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>INSTALACIONES</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">:
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">Consultorios
                                        m&eacute;dicos equipados con b&aacute;scula calibrada y
                                        bauman&oacute;metro.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">Electrocardi&oacute;grafo
                                        de 12 derivaciones.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">&Aacute;rea
                                        cl&iacute;nica con reposet, bomba de infusi&oacute;n y carro rojo
                                        equipado.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">Farmacia
                                        equipada con refrigerador y congelador de -20&deg;C, calibrados,
                                        y con respaldo de energ&iacute;a el&eacute;ctrica.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">&Aacute;rea
                                        para toma de muestras de laboratorio, con centr&iacute;fuga
                                        calibrada.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">Archivo
                                        de expedientes confidenciales, con almac&eacute;n de materiales y
                                        reactivos.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">&Aacute;rea
                                        para monitoreo y capacitaci&oacute;n.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">Control
                                        de temperatura ambiental, conexiones de Internet, tel&eacute;fono
                                        y fax.</span></font>
                            </font>
                        </p>
                        <li />
                        <p class="western" align="justify" style="margin-top: 0.02in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><span lang="es-ES">Recursos
                                        humanos de 12 personas dedicadas a actividades de investigaci&oacute;n
                                        cl&iacute;nica.</span></font>
                            </font>
                        </p>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <table width="100%" cellpadding="7" cellspacing="0">
                        <colgroup>
                            <col width="100%">
                            <col width="100%>
                    </colgroup>
                    <colgroup>
                        <col width=" 100% </colgroup>
                            <colgroup>
                                <col width="100%
                        <col width=" 100%>
                            </colgroup>
                            <colgroup>
                                <col width="100%
                    </colgroup>
                    <colgroup>
                        <col width=" 100% </colgroup>
                            <tr valign="top">
                                <td width="100%" style="border: none; padding: 0in">
                                    <p class="western" align="justify">
                                        <font face="Calibri, serif">
                                            <font size="2" style="font-size: 11pt">Cl&aacute;usula
                                                de proveedores externos</font>
                                        </font>
                                    </p>
                                </td>
                                <td width="100% style=" border-top: none; border-bottom: none; border-left: none;
                                    border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left:
                                    0in; padding-right: 0.08in">
                                    <p class="western" align="justify">
                                        <font face="Calibri, serif">
                                            <font size="2" style="font-size: 11pt">Si</font>
                                        </font>
                                    </p>
                                </td>
                                <td width="100%style=" border: 1px solid #00000a; padding: 0in 0.08in">
                                    <p class="western" align="justify"><br />

                                    </p>
                                </td>
                                <td width="100%style=" border-top: none; border-bottom: none; border-left: 1px solid
                                    #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left:
                                    0.08in; padding-right: 0in">
                                    <p class="western" align="justify"><br />

                                    </p>
                                </td>
                                <td width="100% style=" border-top: none; border-bottom: none; border-left: none;
                                    border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left:
                                    0in; padding-right: 0.08in">
                                    <p class="western" align="justify">
                                        <font face="Calibri, serif">
                                            <font size="2" style="font-size: 11pt">No</font>
                                        </font>
                                    </p>
                                </td>
                                <td width="100%style=" border-top: 1px solid #000001; border-bottom: 1px solid #000001;
                                    border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding: 0in 0.08in">
                                    <p class="western" align="justify"><br />

                                    </p>
                                </td>
                                <td width="100%style=" border-top: none; border-bottom: none; border-left: 1px solid
                                    #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left:
                                    0.08in; padding-right: 0in">
                                    <p class="western" align="justify"><br />

                                    </p>
                                </td>
                            </tr>
                    </table>
                    <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><span lang="es-ES">As&iacute;
                                    mismo, le informo que contamos con los convenios de atenci&oacute;n
                                    necesarios, lo cual consta en los siguientes documentos, que
                                    adjunto a la presente:</span></font>
                        </font>
                    </p>
                    <p lang="es-ES" class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                    <table width="100%" cellpadding="7" cellspacing="0">
                        <col width="100%">
                        <col width="100%">
                        <tr valign="top">
                            <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                                style="border: 1px solid #00000a; padding: 0in 0.08in">
                                <p class="western" align="center">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><b>Servicio</b></font>
                                    </font>
                                </p>
                            </td>
                            <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                                style="border: 1px solid #00000a; padding: 0in 0.08in">
                                <p class="western" align="center">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><b>Proveedor</b></font>
                                    </font>
                                </p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td width="100%" style="border: 1px solid #00000a; padding: 0in 0.08in">
                                <p class="western" align="center"><br />

                                </p>
                            </td>
                            <td width="100%" style="border: 1px solid #00000a; padding: 0in 0.08in">
                                <p class="western" align="center"><br />

                                </p>
                            </td>
                        </tr>
                    </table>
                    <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" height="16" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                        <br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dra.
                                    Mar&iacute;a de la Merced Vel&aacute;zquez Quintana</b></font>
                        </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Direcci&oacute;n
                                General</font>
                        </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-2304
                            Instalaciones, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>2</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>2</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Instalaciones --}}


    {{-- Anticorrupcion --}}
    @if ($formato['documento_formato_id'] === 12)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.12in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Seleccionar,
                                                Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Destinatario</b></font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Anticorrupci&oacute;n</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Por
                                este medio </font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>DECLARO</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                que la Unidad de Investigaci&oacute;n en Salud de Chihuahua, S.C.
                                (UIS), es una empresa comprometida con la &eacute;tica. Por ello,
                                vigila el cumplimiento de todas las leyes y disposiciones
                                anticorrupci&oacute;n aplicables a sus actividades. </font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in"><br />

                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Adem&aacute;s,
                                se asegura de que todos los convenios que establece con terceras
                                partes, cumplan todas las leyes y regulaciones relevantes. </font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in"><br />

                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Por
                                otra parte, mediante su C&oacute;digo de &Eacute;tica, promueve
                                los valores necesarios para que el personal act&uacute;e con
                                integridad, transparencia y tolerancia cero a cualquier actividad
                                de corrupci&oacute;n, que pueda ser cometida ya sea por empleados,
                                funcionarios, o terceras partes que act&uacute;en para o en
                                representaci&oacute;n de la UIS.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="es-ES" class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" height="102" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Las
                                actividades de corrupci&oacute;n que se vigilan incluyen sobornos,
                                pagos de facilitaci&oacute;n, intercambios tipo &ldquo;quid pro
                                quo&rdquo;, o pagos indirectos que se realicen para&nbsp;prop&oacute;sitos
                                inadecuados de influencia o persuasi&oacute;n, o como recompensa
                                para actos de omisi&oacute;n o decisi&oacute;n,&nbsp;a fin de
                                asegurar una ventaja inadecuada,&nbsp;o ayudar de&nbsp;forma
                                incorrecta a la empresa en la&nbsp;obtenci&oacute;n o
                                mantenimiento de cualquier negocio.</font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-top: 0.02in; margin-bottom: 0.02in">
                        <br />
                        <br />

                    </p>
                    <p class="western" align="justify" style="margin-top: 0.02in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Los
                                pagos indirectos incluyen la promesa, oferta, entrega o
                                autorizaci&oacute;n de pagos prohibidos, realizados en efectivo,
                                regalos, servicios, ofertas de empleo, pr&eacute;stamos, gastos de
                                viaje, entretenimiento, contribuciones pol&iacute;ticas,
                                donaciones ben&eacute;ficas, subsidios, pagos diarios,
                                patrocinios, honorarios o entrega de activos, incluso en su valor
                                nominal.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"> </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dra.
                                    Mar&iacute;a de la Merced Vel&aacute;zquez Quintana</b></font>
                        </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Direcci&oacute;n
                                General</font>
                        </font>
                    </p>
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-2305
                            Anticorrupci&oacute;n, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Anticorrupcion --}}


    {{-- Destrucion de materiales --}}
    @if ($formato['documento_formato_id'] === 27)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 0.45in; line-height: 100%">
                <img src="621bfe5aeba88621bfe5aeba89_html_57127a7fee9f9d57.png" name="Picture 5" align="left" hspace="12"
                    width="100%" height="40" border="0" />


            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="1">
            <col width="100%">
            <col width="100%">
            <col width="100%">
            <col width="100%">
            <col width="100%">
            <col width="100%">
            <tbody>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="center">
                            <font face="Calibri, serif">
                                <font size="4" style="font-size: 14pt"><b>Acta
                                        de destrucci&oacute;n de materiales </b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Seleccionar,
                                    Fecha</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Siendo
                                    las Hora horas del d&iacute;a N&uacute;mero del d&iacute;a del
                                    mes de nombre del mes del a&ntilde;o en curso, en las
                                    instalaciones de la Unidad de Investigaci&oacute;n en Salud de
                                    Chihuahua, S.C., ubicadas en Autom&aacute;tico, se procede a
                                    levantar la presente acta, para asentar la destrucci&oacute;n de
                                    materiales relacionados al estudio:</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Los
                                    materiales destruidos consisten en:</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 4.50pt double #00000a; border-left: none; border-right: none; padding: 0in">
                        <p align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Tipo
                                        de kit</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 4.50pt double #00000a; border-left: none; border-right: none; padding: 0in">
                        <p align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha
                                        de caducidad</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 4.50pt double #00000a; border-left: none; border-right: none; padding: 0in">
                        <p align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Cantidad</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 4.50pt double #00000a; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Describir</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 4.50pt double #00000a; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding: 0in 0.08in">
                        <p align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Describir</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 4.50pt double #00000a; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                        <p align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Describir</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Dicha
                                    destrucci&oacute;n se realiza en apego a las instrucciones
                                    proporcionadas por el patrocinador, de acuerdo a lo estipulado en
                                    el PC-SC-3 Farmacia. </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">La
                                    presente acta deber&aacute; integrarse al archivo del estudio.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Persona
                                        que realiz&oacute; la destrucci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Gerente
                                        del Sitio Cl&iacute;nico</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Firma</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Firma</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Nombre</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Nombre</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="right"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-3601
                            Destrucci&oacute;n de materiales,</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Destruccion de materiales --}}


    {{-- Destruccion de productos --}}
    @if ($formato['documento_formato_id'] === 28)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 0.45in; line-height: 100%">
                <img src="621c006dd6e00621c006dd6e02_html_57127a7fee9f9d57.png" name="Picture 5" align="left" hspace="12"
                    width="100%" height="40" border="0" />


            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="center">
                            <font face="Calibri, serif">
                                <font size="4" style="font-size: 14pt"><b>Destrucci&oacute;n
                                        de productos </b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Seleccionar,
                                    Fecha</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Siendo
                                    las Hora horas del d&iacute;a N&uacute;mero del d&iacute;a del
                                    mes de nombre del mes del a&ntilde;o en curso, en las
                                    instalaciones de la Unidad de Investigaci&oacute;n en Salud de
                                    Chihuahua, S.C., ubicadas en Autom&aacute;tico, se procede a
                                    levantar la presente acta, para asentar la destrucci&oacute;n de
                                    productos relacionados al estudio:</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Los
                                    productos que se destruyen son:</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    gen&eacute;rico</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Estado</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nuevo</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Devoluci&oacute;n</font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">N&uacute;mero
                                    de kit</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Cantidad
                                    de unidades en el kit</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Dicha
                                    destrucci&oacute;n se realiza en apego a las instrucciones
                                    proporcionadas por el patrocinador, de acuerdo a lo estipulado en
                                    el PC-SC-3 Farmacia. </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">La
                                    presente acta deber&aacute; integrarse al archivo del estudio.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Persona
                                        que realiz&oacute; la destrucci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Gerente
                                        del Sitio Cl&iacute;nico</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Firma</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Firma</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Nombre</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Nombre</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="right"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-3602
                            Destrucci&oacute;n de productos,</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul-</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Destruccion de productos --}}


    {{-- Tarjeta de bolsillo --}}
    @if ($formato['documento_formato_id'] === 55)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 0in; line-height: 100%">

            </p>
        </div>
        <div id="TextSection" dir="ltr" gutter="48" style="column-count: 2">
            <p lang="x-none" align="justify" style="margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif"><span lang="es-MX"><b>Protocolo Insertar
                            c&oacute;digo </b></span></font>
            </p>
            <p lang="x-none" style="margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif"><span lang="es-MX"><b>Patolog&iacute;a
                            Insertar patolog&iacute;a
                        </b></span></font>
            </p>
            <p class="western" align="center" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="4" style="font-size: 16pt"><b>Criterios
                            de Inclusi&oacute;n</b></font>
                </font>
            </p>
            <ol>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">&gt;18
                                con SMD o LMA (proporci&oacute;n de blastos en la m&eacute;dula
                                &oacute;sea &le;50%) con trombocitopenia causada por la enfermedad
                                o tratamiento previo (Excluye trombocitopenia transitoria).</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Trombocitopenia
                                grado 4 plaquetas &lt;25 Gi/L. Al menos 1 evento de los siguientes
                                eventos durante las 4 semanas de selecci&oacute;n: transfusi&oacute;n
                                plaquetaria, o sangrado sintom&aacute;tico o recuento plaquetario
                                &lt;10Gi/L (fiebre, infecci&oacute;n, enfermedad autoinmune).</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Debe
                                tener informaci&oacute;n de recuentos plaquetarios, sangrado y
                                eventos de transfusi&oacute;n dentro de un periodo de al menos 4
                                semanas previas a la asignaci&oacute;n a Tx.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Descontinuar
                                cualquier Tx sist&eacute;mico previo para malignidad (excepto de
                                hidroxiurea):</span></font>
                    </font>
                </p>
            </ol>
            <ul>
                <li />
                <p lang="en-US" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">M&iacute;nimo
                                4 semanas antes del dia 1: quimioterapia, agentes de-metilantes,
                                lenalidomida, talidomida, clofarabina e IL-11.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">M&iacute;nimo
                                8 semanas antes del d&iacute;a 1: globulina
                                anti-timocito/anti-linfocito.</span></font>
                    </font>
                </p>
            </ul>
            <ol start="5">
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">SCT
                                previo con recurrencia posterior.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Enfermedad
                                estable, capaces de completar un per&iacute;odo de 12 semanas de
                                Tx.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Estatus
                                ECOG 0-2.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Funci&oacute;n
                                adecuada de &oacute;rganos: </span></font>
                    </font>
                </p>
            </ol>
            <ul>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Bilirrubina
                                total &le;1.5xULN </span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">ALT
                                &le;3xULN </span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Creatinina
                                &le;2.5 xULN</span></font>
                    </font>
                </p>
            </ul>
            <ol start="9">
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Mujeres
                                est&eacute;riles o mujeres/hombres con m&eacute;todos
                                anticonceptivos.</span></font>
                    </font>
                </p>
            </ol>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
            <p style="margin-bottom: 0in; line-height: 100%"><img src="621c02d949e8a621c02d949e8b_html_36de848bd5d44d9c.png"
                    name="Imagen 1" align="left" hspace="12" width="187" height="42" border="0" />
                <br />

            </p>
            <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">

            </p>
            <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
                <br />

            </p>
            <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="4" style="font-size: 14pt"><b>Tel&eacute;fono
                            Seleccionar</b></font>
                </font>
            </p>
            <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="4" style="font-size: 14pt"><b>M&oacute;vil
                            Autom&aacute;tico</b></font>
                </font>
            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
            <p align="justify" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
            <p lang="x-none" align="justify" style="margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif"><span lang="es-MX"><b>Protocolo Insertar
                            c&oacute;digo </b></span></font>
            </p>
            <p lang="x-none" style="margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif"><span lang="es-MX"><b>Patolog&iacute;a
                            Insertar patolog&iacute;a </b></span></font>
            </p>
            <p class="western" align="center" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="4" style="font-size: 16pt"><b>Criterios
                            de Exclusi&oacute;n</b></font>
                </font>
            </p>
            <ol>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Sujetos
                                con SMD y riesgo bajo o intermedio (IPSS).</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Dx
                                de leucemia promieloc&iacute;tica aguda o leucemia
                                megacariobl&aacute;stica o LMA secundaria a neoplasia
                                mieloproliferativa.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Historia
                                de Tx con romiplostim u otros agonistas TPO-R.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">QTc&gt;480
                                mseg &oacute; QTc&gt;510 con Bloqueo de Rama de Haz de His.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Sujetos
                                con bazo palpable con di&aacute;metro &le;16 cm.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Leucositosis
                                &ge;25,000/uL en el d&iacute;a 1 de Tx.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Riesgo
                                tromb&oacute;tico.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Embarazo
                                o lactancia. </span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Abuso
                                de drogas o alcohol.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Tx
                                con f&aacute;rmacos en investigaci&oacute;n dentro de 30 d&iacute;as
                                o 5 vidas medias precedentes.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Infecciones
                                activas y no controladas.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Hepatitis
                                B y C o VIH.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Cirrosis
                                hep&aacute;tica</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Ingesta
                                de medicamentos prohibidos por el protocolo.</span></font>
                    </font>
                </p>
                <li />
                <p lang="en-US" align="justify" style="margin-bottom: 0in; line-height: 100%">
                    <font face="Calibri, serif">
                        <font size="2" style="font-size: 11pt"><span lang="es-MX">Hipersensibilidad
                                al eltrombopag o al excipiente.</span></font>
                    </font>
                </p>
            </ol>
            <p style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
            <p align="center" style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
                <img src="621c02d949e8a621c02d949e8b_html_36de848bd5d44d9c.png" name="Imagen 2" align="left" hspace="12"
                    width="187" height="42" border="0" />
                <br />

            </p>
            <p align="justify" style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
                <br />

            </p>
            <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
                <br />

            </p>
            <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
                <br />

            </p>
            <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%"><a name="_GoBack"></a>
                <font face="Calibri, serif">
                    <font size="4" style="font-size: 14pt"><b>Tel&eacute;fono
                            Seleccionar</b></font>
                </font>
            </p>
            <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="4" style="font-size: 14pt"><b>M&oacute;vil
                            Autom&aacute;tico</b></font>
                </font>
            </p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
        </div>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4401
                            Tarjeta de bolsillo, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">0</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">1-oct-2020</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>3</sdfield>
                            / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>3</sdfield>
                        </span></font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Tarjeta de bolsillo --}}


    {{-- Carpeta documento fuente --}}
    @if ($formato['documento_formato_id'] === 56)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 0.45in; line-height: 100%"><br />

            </p>
        </div>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <img src="621c0980e20ec621c0980e20ed_html_e2c0659a8510fa17.gif" align="left" hspace="12" vspace="1" />
            <img src="621c0980e20ec621c0980e20ed_html_116ffe8d40ad7309.png" name="Picture 2" align="left" hspace="12"
                width="100%" height="66" border="0" />
            <span id="Frame1" dir="ltr" style="float: left; width: 2.97in; border: none; padding: 0in; background: #ffffff">
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <font color="#000000">
                        <font face="Century Gothic, serif">
                            <font size="5" style="font-size: 18pt"><b>Documento
                                    fuente</b></font>
                        </font>
                    </font>
                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
            </span><br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>C&oacute;digo
                                    del protocolo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Investigador
                                    principal</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>N&uacute;mero
                                    de sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Iniciales
                                    del sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
        </table>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <font face="Calibri, serif">Sitio cl&iacute;nico </font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%"><a name="_GoBack"></a>
            <font size="1" style="font-size: 8pt">Unidad de Investigaci&oacute;n
                en Salud de Chihuahua, S.C. Seleccionar <a href="http://www.uis.com.mx/">www.uis.com.mx</a></font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <img src="621c0980e20ec621c0980e20ed_html_116ffe8d40ad7309.png" name="Image1" align="left" hspace="12"
                vspace="1" width="100%" height="53" border="0" />
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <img src="621c0980e20ec621c0980e20ed_html_4cde557d8570d963.gif" align="left" hspace="12" />
            <span id="Frame2" dir="ltr" style="float: left; width: 2.97in; border: none; padding: 0in; background: #ffffff">
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <font color="#000000">
                        <font face="Century Gothic, serif">
                            <font size="4" style="font-size: 16pt"><b>Documento
                                    fuente</b></font>
                        </font>
                    </font>
                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
            </span><br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: 2.25pt solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>C&oacute;digo
                                    del protocolo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top" style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border: 2.25pt solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: none; border-bottom: none; border-left: 2.25pt solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: 2.25pt solid #00000a; border-bottom: 2.25pt solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Investigador
                                    principal</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top" style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border: 2.25pt solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: none; border-bottom: none; border-left: 2.25pt solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: 2.25pt solid #00000a; border-bottom: 2.25pt solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>N&uacute;mero
                                    de sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top" style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border: 2.25pt solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: none; border-bottom: none; border-left: 2.25pt solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: 2.25pt solid #00000a; border-bottom: 2.25pt solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Iniciales
                                    del sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top" style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border: 2.25pt solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: none; border-bottom: none; border-left: 2.25pt solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
        </table>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4501
                            Carpeta Documento Fuente, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26-jul-2021</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>2</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>2</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Carpeta documento fuente --}}


    {{-- Hoja inicial --}}
    @if ($formato['documento_formato_id'] === 57)
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <img src="621c156482d54621c156482d56_html_e2c0659a8510fa17.gif" align="left" hspace="12" vspace="1" />
            <img src="621c156482d54621c156482d56_html_116ffe8d40ad7309.png" name="Picture 2" align="left" hspace="12"
                width="100%" height="66" border="0" />
            <span id="Frame1" dir="ltr" style="float: left; width: 2.97in; border: none; padding: 0in; background: #ffffff">
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <font color="#000000">
                        <font face="Century Gothic, serif">
                            <font size="5" style="font-size: 18pt"><b>Documento
                                    fuente</b></font>
                        </font>
                    </font>
                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
            </span><br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>C&oacute;digo
                                    del protocolo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Investigador
                                    principal</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Sub-investigador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Coordinador
                                    de estudios</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>N&uacute;mero
                                    de sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Iniciales
                                    del sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Sexo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Edad</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
        </table>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <font face="Calibri, serif">Sitio cl&iacute;nico </font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%"><a name="_GoBack"></a>
            <font size="1" style="font-size: 8pt">Unidad de Investigaci&oacute;n
                en Salud de Chihuahua, S.C. Seleccionar <a href="http://www.uis.com.mx/">www.uis.com.mx</a></font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4502
                            Hoja inicial, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26-jul-2021</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Hoja inicial --}}


    {{-- Contacto --}}
    @if ($formato['documento_formato_id'] === 58)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 0.45in; line-height: 100%">
                <img src="621c3031ca54a621c3031ca54c_html_57127a7fee9f9d57.png" name="Picture 5" align="left" hspace="12"
                    width="100%" height="40" border="0" />


            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
                <col width="100%">
            </colgroup>
            <tr valign="top">
                <td colspan="4" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>N&uacute;mero
                                    de sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Iniciales
                                    del sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="3" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo
                                    del protocolo</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="13" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="13" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 14pt"><b>Contacto</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="13" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre</font>
                        </font>
                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sexo</font>
                        </font>
                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Fecha
                                nacimiento</font>
                        </font>
                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="13" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td rowspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Domicilio</font>
                        </font>
                    </p>
                </td>
                <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Calle
                                y n&uacute;mero</font>
                        </font>
                    </p>
                </td>
                <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: 1px solid #000001; border-bottom: 1px solid #000001; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Colonia</font>
                        </font>
                    </p>
                </td>
                <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: 1px solid #000001; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Ciudad
                                y estado</font>
                        </font>
                    </p>
                </td>
                <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: 1px solid #000001; border-bottom: 1px solid #00000a; border-left: 1px solid #00000a; border-right: 1px solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo
                                postal</font>
                        </font>
                    </p>
                </td>
                <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                casa</font>
                        </font>
                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                m&oacute;vil</font>
                        </font>
                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                trabajo</font>
                        </font>
                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Correo
                                electr&oacute;nico</font>
                        </font>
                    </p>
                </td>
                <td colspan="10" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="13" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Persona
                                    de contacto 1</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre</font>
                        </font>
                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Domicilio</font>
                        </font>
                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center" style="margin-bottom: 0in"><br />

                    </p>
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Parentesco</font>
                        </font>
                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                casa</font>
                        </font>
                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                m&oacute;vil</font>
                        </font>
                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                trabajo</font>
                        </font>
                    </p>
                </td>
                <td colspan="6" width="100%30" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="5" width="100%30" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="13" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Persona
                                    de contacto 2</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre</font>
                        </font>
                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Domicilio</font>
                        </font>
                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center" style="margin-bottom: 0in"><br />

                    </p>
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Parentesco</font>
                        </font>
                    </p>
                </td>
                <td colspan="11" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                casa</font>
                        </font>
                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                m&oacute;vil</font>
                        </font>
                    </p>
                </td>
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Tel
                                trabajo</font>
                        </font>
                    </p>
                </td>
                <td colspan="6" width="100%30" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
                <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4503
                            Contacto, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">0</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">4</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">ene</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-2021</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Contacto --}}


    {{-- Señalador de visita --}}
    @if ($formato['documento_formato_id'] === 63)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 0.45in; line-height: 100%"><br />

            </p>
        </div>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <img src="621c329acbb52621c329acbb54_html_e2c0659a8510fa17.gif" align="left" hspace="12" vspace="1" />
            <img src="621c329acbb52621c329acbb54_html_57127a7fee9f9d57.png" name="Picture 5" align="left" hspace="12"
                width="100%" height="62" border="0" />
            <span id="Frame1" dir="ltr" style="float: left; width: 2.97in; border: none; padding: 0in; background: #ffffff">
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <font color="#000000">
                        <font face="Century Gothic, serif">
                            <font size="5" style="font-size: 18pt"><b>Documento
                                    fuente</b></font>
                        </font>
                    </font>
                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <font color="#000000">
                        <font face="Century Gothic, serif">
                            <font size="5" style="font-size: 18pt"><b>Nombre
                                    de la visita</b></font>
                        </font>
                    </font>
                </p>
                <p
                    style="margin-bottom: 0in; border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.06in; padding-right: 0in; line-height: 100%">
                    <br />

                </p>
            </span><br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Fecha
                                    de la visita</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>C&oacute;digo
                                    del protocolo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Investigador
                                    principal</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Sub-investigador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Coordinador
                                    de estudios</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" style="border: none; padding: 0in">
                    <p class="western"><br />

                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>N&uacute;mero
                                    de sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western">
                        <font face="Calibri, serif">
                            <font size="4" style="font-size: 16pt"><b>Iniciales
                                    del sujeto</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" valign="top"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
        </table>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <font face="Calibri, serif">Sitio cl&iacute;nico </font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%"><a name="_GoBack"></a>
            <font size="1" style="font-size: 8pt">Unidad de Investigaci&oacute;n
                en Salud de Chihuahua, S.C. Seleccionar <a href="http://www.uis.com.mx/">www.uis.com.mx</a></font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 150%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4508
                            Se&ntilde;alador de visita, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            -</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 11pt"><span lang="es-MX">
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Señalador de visita --}}


    {{-- Recibo ICF --}}
    @if ($formato['documento_formato_id'] === 72)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="center">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt"><b>
                                        <font face="Calibri, serif">
                                            <font size="4" style="font-size: 14pt"><span lang="es-MX">Acuse
                                                    de recibo</span></font>
                                        </font>
                                    </b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="right" style="font-weight: normal"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="right">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                    style="font-weight: normal">Lugar,
                                                    Fecha</span></span></font>
                                    </font>
                                </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p align="right" style="font-weight: normal"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    Acuse de recibo</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>A
                                        quien corresponda</b></font>
                            </font>
                        </p>
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">P
                                    r e s e n t e</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Por
                                    este medio hago constar que </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>RECIB&Iacute;
                                        EL FORMATO DE CONSENTIMIENTO INFORMADO </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">relacionado
                                    con mi participaci&oacute;n en el estudio arriba mencionado.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Dicho
                                    documento fue firmado por el m&eacute;dico, por m&iacute; y por
                                    los dos testigos en cuya presencia se me inform&oacute; sobre mi
                                    participaci&oacute;n en el estudio.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Nombre
                                        del documento</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Versi&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha
                                        de versi&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Nombre
                                        del sujeto</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Firma
                                        del sujeto</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in"><br />

                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in"><br />

                        </p>
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><a name="_GoBack"></a><br />

                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4701
                            Acuse de recibo, Versi&oacute;n 26-jul-2021</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 11pt">
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 11pt"><span lang="es-MX">-
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Recibo ICF --}}


    {{-- Solicitud de resumen --}}
    @if ($formato['documento_formato_id'] === 76)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Lugar,
                                                Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dra.
                                    Mar&iacute;a de la Merced Vel&aacute;zquez Quintana</b></font>
                        </font>
                    </p>
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Direcci&oacute;n
                                General</font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Solicitud de resumen cl&iacute;nico</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre
                                del patrocinador.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Con
                                la presente solicito a usted me proporcione un resumen cl&iacute;nico,
                                elaborado a partir de la informaci&oacute;n obtenida durante mi
                                participaci&oacute;n en el estudio mencionado.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Nombre
                                    y firma de la persona que solicita</b></font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4705
                            Solicitud de resumen, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 11pt"><span lang="es-MX">-
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Solicitud de resumen --}}


    {{-- Privacidad de sujetos --}}
    @if ($formato['documento_formato_id'] === 77)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 0in; line-height: 100%">
                <font size="2" style="font-size: 10pt"> </font><img
                    src="621c36c0df778621c36c0df77a_html_57127a7fee9f9d57.png" name="Picture 5" align="left" hspace="12"
                    width="100%" height="40" border="0" />
            </p>
            <p lang="x-none" style="margin-bottom: 0.45in; line-height: 100%">

            </p>
        </div>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%"><a name="_GoBack"></a>
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <font size="4" style="font-size: 14pt"><b>Aviso de Privacidad para
                    Sujetos en Investigaci&oacute;n</b></font>
        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding: 0in 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding: 0in 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Investigador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding: 0in 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding: 0in 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Sitio
                                    cl&iacute;nico</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding: 0in 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Direcci&oacute;n</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: 1px solid #00000a; padding: 0in 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            La Unidad de Investigaci&oacute;n en Salud | UIS, es responsable del
            resguardo de los datos personales que se recaben durante la
            investigaci&oacute;n mencionada. Dicha informaci&oacute;n se
            utilizar&aacute; para:</p>
        <ul>
            <li />
            <p align="justify" style="margin-bottom: 0in; line-height: 150%">
                Evaluar su participaci&oacute;n en el estudio<i>.</i></p>
            <li />
            <p align="justify" style="margin-bottom: 0in; line-height: 150%">
                En su caso, iniciar y dar seguimiento a la conducci&oacute;n.</p>
        </ul>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            Los datos personales que se recabar&aacute;n son: Nombre, N&uacute;mero
            de identificaci&oacute;n oficial, Fecha de nacimiento, Lugar de
            nacimiento, Sexo, Direcci&oacute;n y N&uacute;meros de contacto.
        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            Adicionalmente, se solicitar&aacute;n los siguientes <b>datos
                considerados sensibles</b>, de acuerdo con la Ley Federal de
            Protecci&oacute;n de Datos Personales en Posesi&oacute;n de
            Particulares: Etnicidad, Historia cl&iacute;nica y Estado de salud.</p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            La Unidad de Investigaci&oacute;n en Salud tomar&aacute; las medidas
            necesarias para garantizar en todo momento el apego a los principios
            de protecci&oacute;n de informaci&oacute;n, establecidos por la Ley
            Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n
            de los Particulares.</p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            Usted tiene derecho a tener acceso a sus datos personales. Puede
            rectificarlos, cuando est&eacute;n desactualizados, o sean inexactos
            o incompletos. Tambi&eacute;n puede cancelarlos, para que eliminemos
            su informaci&oacute;n personal de nuestra base de datos. Puede
            oponerse al uso de su informaci&oacute;n, o retirar el consentimiento
            que haya otorgado previamente. Si decide ejercer cualquiera de estos
            derechos, debe notificarlo al personal del estudio o al personal del
            sitio.</p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 150%">
            <b>Es importante que considere que el retiro de su consentimiento
                implicar&aacute; que NO podr&aacute; continuar participando en el
                estudio cl&iacute;nico mencionado.</b>
        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            Adem&aacute;s, cuando usted realice un cambio al consentimiento
            otorgado previamente a un Aviso de Privacidad, el Investigador deber&aacute;
            notificarlo de inmediato al patrocinador del estudio.</p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            Este Aviso de Privacidad puede sufrir modificaciones o
            actualizaciones, debido a nuevos requerimientos legales para la
            prestaci&oacute;n de servicios o para la conducci&oacute;n de
            estudios cl&iacute;nicos. Si existe alguna modificaci&oacute;n, le
            informaremos por v&iacute;a telef&oacute;nica, para que acuda al
            Sitio Cl&iacute;nico a conocer el nuevo Aviso de Privacidad y si est&aacute;
            de acuerdo, firme nuevamente.
        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            Si usted, como titular de sus datos personales, considera que alguno
            de sus derechos ha sido lesionado por la conducta de un empleado de
            UIS, o presume que en el tratamiento de sus datos personales existe
            alguna violaci&oacute;n a las disposiciones previstas en la Ley
            Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n
            de los Particulares, puede imponer la queja o denuncia
            correspondiente ante el Instituto Federal de Acceso a la Informaci&oacute;n
            y Protecci&oacute;n de Datos (IFAI). Para mayor informaci&oacute;n,
            visite <a href="http://www.ifai.org.mx/">www.ifai.org.mx</a>.</p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <img src="621c36c0df778621c36c0df77a_html_5048f9a58e071cd4.gif" align="left" hspace="13" vspace="1" />

            Acepto y autorizo <font color="#000000">que mis datos
                personales y los datos personales sensibles descritos sean tratados
                conforme a los t&eacute;rminos y condiciones referidos en el presente
                Aviso de Privacidad. </font>
        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 150%">
            <img src="621c36c0df778621c36c0df77a_html_5048f9a58e071cd4.gif" align="left" hspace="13" vspace="1" />
            Entiendo
            que mis datos personales y datos personales sensibles estar&aacute;n
            seguros en todo momento, se conservar&aacute;n en una base de datos
            y/o expediente cl&iacute;nico y ser&aacute;n tratados de manera
            confidencial.
        </p>
        <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" align="justify" style="text-indent: 0.5in; margin-bottom: 0in; line-height: 150%">
            <img src="621c36c0df778621c36c0df77a_html_5048f9a58e071cd4.gif" align="left" hspace="13" vspace="1" />
            Entiendo
            que el acceso a mi informaci&oacute;n personal se limitar&aacute; a
            lo descrito en el presente Aviso de Privacidad.
        </p>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr valign="top">
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font size="2" style="font-size: 11pt"><b>Firma</b></font>
                    </p>
                </td>
                <td width="100%"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font size="2" style="font-size: 11pt"><b>Nombre
                                del sujeto o su representante</b></font>
                    </p>
                </td>
                <td width="100%"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%"
                    style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                    <p class="western" align="right">
                        <font size="2" style="font-size: 11pt"><b>Fecha</b></font>
                    </p>
                </td>
                <td width="100%"
                    style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
        </table>
        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 150%">
            <br />

        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 150%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-4706
                            Privacidad para sujetos,</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        Versi&oacute;n </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">0</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">2</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">sep</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 11pt"><span lang="es-MX">-
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>3</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>3</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Privacidad de sujetos --}}


    {{-- Orden de compra --}}
    @if ($formato['documento_formato_id'] === 79)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 1.11in; line-height: 100%"><br />

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="center">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt"><b>
                                    <font face="Calibri, serif">
                                        <font size="4" style="font-size: 14pt"><span lang="es-MX">Orden
                                                de compra</span></font>
                                    </font>
                                </b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="en-US" class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Lugar,
                                                Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Nombre
                                    del proveedor</b></font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>N&uacute;mero
                                    de documento: UIS-18-XXXXX</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Por
                                este medio solicito que se realicen al paciente Nombre del sujeto
                                los siguientes estudios:</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li />
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del estudio.</font>
                            </font>
                        </p>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Nombre
                                    de la persona que solicita</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Puesto</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5101
                            Orden de compra, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Orden de compra --}}


    {{-- Envio de muestras --}}
    @if ($formato['documento_formato_id'] === 80)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 1.11in; line-height: 100%"><br />

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="center">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt"><b>
                                        <font face="Calibri, serif">
                                            <font size="4" style="font-size: 14pt"><span lang="es-MX">Env&iacute;o
                                                    de muestras</span></font>
                                        </font>
                                    </b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="en-US" class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="right">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                    style="font-weight: normal">Lugar</span></span></font>
                                    </font>
                                </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="8" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="8" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="8" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>#
                                        Sujeto</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>#
                                        Visita</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha
                                        de recolecci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Requisitos
                                        de almac&eacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="6" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Hubo
                                        desviaciones de temperatura durante el almac&eacute;n de la
                                        muestra</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Si</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">No</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Courier</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>N&uacute;mero
                                        de gu&iacute;a</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fecha
                                        de env&iacute;o</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: 1px solid #00000a; border-right: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Hora</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="6" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Temperatura
                                        de salida</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>Nombre
                                        de quien elabora la nota</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>Firma</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100% bgcolor=" #d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>Iniciales</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in"><br />

                        </p>
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100% bgcolor=" #ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><a name="_GoBack"></a><br />

                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5102
                            Env&iacute;o de muestras, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Envio de muestras --}}


    {{-- Orden de compra hospital --}}
    @if ($formato['documento_formato_id'] === 81)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 1.11in; line-height: 100%"><br />

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="center">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt"><b>
                                    <font face="Calibri, serif">
                                        <font size="4" style="font-size: 14pt"><span lang="es-MX">Orden
                                                de compra para hospital</span></font>
                                    </font>
                                </b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Lugar,
                                                Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Nombre
                                    del proveedor</b></font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Por
                                este medio solicito que atenci&oacute;n para:</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li />
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del sujeto.</font>
                            </font>
                        </p>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">La
                                atenci&oacute;n que se solicita incluye los siguientes servicios:</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li />
                        <p align="justify"></p>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">La
                                atenci&oacute;n que se solicita tiene las siguientes
                                restricciones:</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li />
                        <p align="justify"></p>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Nombre
                                    de la persona que solicita</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Puesto</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5101
                            Orden de compra, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Orden de compra hospital --}}


    {{-- Aviso EAS --}}
    @if ($formato['documento_formato_id'] === 82)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Lugar,
                                        Fecha</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Juan Carlos Cant&uacute; Reyes</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    / Presidente del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                                    y </font>
                            </font>
                        </p>
                        <p class="western">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dra.
                                        Mar&iacute;a Elena Mart&iacute;nez Tapia / </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Presidente
                                    del Comit&eacute; de Investigaci&oacute;n</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <table width="100%" cellpadding="7" cellspacing="0">
                            <col width="100%">
                            <tr>
                                <td width="100%" valign="top" style="border: none; padding: 0in">
                                    <p class="western" align="center"><br />

                                    </p>
                                </td>
                            </tr>
                        </table>
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">P
                                    r e s e n t e</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    Aviso EAS</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Estimados
                                        Doctores:</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">En
                                    relaci&oacute;n al estudio mencionado, con la presente </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>NOTIFICO</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    el siguiente Evento Adverso Serio:</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>No.
                                        de sujeto</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>Fecha
                                        reporte</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>Descripci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sin
                                    otro particular por el momento, env&iacute;o un cordial saludo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Nombre completo del Investigador principal</b></font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Investigador
                                    principal</font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%"><a
                                name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5301
                            Aviso EAS, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Aviso EAS --}}


    {{-- Aviso SUSAR --}}
    @if ($formato['documento_formato_id'] === 83)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Lugar,
                                        Fecha</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <table width="100%" cellpadding="7" cellspacing="0">
                            <col width="100%">
                            <tr>
                                <td width="100%" valign="top" style="border: none; padding: 0in">
                                    <p class="western" align="center"><br />

                                    </p>
                                </td>
                            </tr>
                        </table>
                        <p class="western" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Juan Carlos Cant&uacute; Reyes</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    / Presidente del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                                </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>y
                                    </b></font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dra.
                                        Mar&iacute;a Elena Mart&iacute;nez Tapia / </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Presidente
                                    del Comit&eacute; de Investigaci&oacute;n Unidad de Investigaci&oacute;n
                                    en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">P
                                    r e s e n t e</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    Aviso SUSAR</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100% bgcolor=" #ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100% bgcolor=" #ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100% bgcolor=" #ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Estimados
                                        Doctores:</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">En
                                    relaci&oacute;n al estudio mencionado, con la presente </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>NOTIFICO</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    los siguientes reportes internacionales de Sospechas de Reacci&oacute;n
                                    Adversa Inesperada (SUSAR):</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>#
                                        Reporte</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>Fecha
                                        reporte</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>Protocolo</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>Pa&iacute;s</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>Tipo
                                        reporte</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 9pt"><b>Descripci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sin
                                    otro particular por el momento, env&iacute;o un cordial saludo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Nombre completo del Investigador principal</b></font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Investigador
                                    principal</font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%"><a
                                name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5302
                            Aviso SUSAR, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
	    </div>
    @endif
    {{-- END AVISO SUSAR --}}


    {{-- Somete desviacion --}}
    @if ($formato['documento_formato_id'] === 84)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="right">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                    style="font-weight: normal">Lugar,
                                                    Fecha </span></span></font>
                                    </font>
                                </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Juan Carlos Cant&uacute; Reyes</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    / Presidente del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                                </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>y
                                    </b></font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dra.
                                        Mar&iacute;a Elena Mart&iacute;nez Tapia / </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Presidente
                                    del Comit&eacute; de Investigaci&oacute;n</font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">P
                                    r e s e n t e</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo
                                        UIS: </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo
                                    UIS</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    Somete desviaci&oacute;n</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="6" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="6" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="6" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" height="1" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Estimados
                                        Doctores:</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">En
                                    relaci&oacute;n al estudio mencionado, con la presente </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>SOMETO</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    a ese comit&eacute; las siguientes desviaciones:</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>#
                                        Sujeto</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="3" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>#
                                        Visita</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>Fecha</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>Descripci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="3" width="100%" bgcolor="#d9d9d9" style="background: #d9d9d9"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 10pt"><b>Acciones
                                        tomadas</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="5" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sin
                                    otro particular por el momento, env&iacute;o un cordial saludo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Nombre completo del Investigador principal</b></font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Investigador
                                    Principal</font>
                            </font>
                        </p>
                        <p class="western" align="center"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5303
                            Somete desviaci&oacute;n, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield>
                        </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END somete desviacion --}}


    {{-- Aviso al CE --}}
    @if ($formato['documento_formato_id'] === 85)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right" style="margin-top: 0.17in">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Lugar,
                                                Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dr.
                                    Juan Carlos Cant&uacute; Reyes</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                / Presidente del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                            </font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>y
                                </b></font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dra.
                                    Mar&iacute;a Elena Mart&iacute;nez Tapia / </b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Presidente
                                del Comit&eacute; de Investigaci&oacute;n Unidad de Investigaci&oacute;n
                                en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Aviso al CE</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre
                                del patrocinador.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Estimados
                                    Doctores:</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">En
                                relaci&oacute;n al estudio mencionado, con la presente </font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>NOTIFICO</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                a ustedes lo siguiente:</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li />
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Describir
                                    los asuntos que se notifican.</font>
                            </font>
                        </p>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento, env&iacute;o un cordial saludo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dr.
                                    Nombre completo del Investigador principal</b></font>
                        </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Investigador
                                principal</font>
                        </font>
                    </p>
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5304
                            Aviso al CE, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Aviso al CE --}}


    {{-- Fe de erratas --}}
    @if ($formato['documento_formato_id'] === 86)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p lang="x-none" align="right">
                        <font face="Cambria, serif">
                            <font size="4" style="font-size: 16pt">
                                <font face="Calibri, serif">
                                    <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                style="font-weight: normal">Lugar,
                                                Fecha</span></span></font>
                                </font>
                            </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dr.
                                    Juan Carlos Cant&uacute; Reyes</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                / Presidente del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                            </font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>y
                                </b></font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dra.
                                    Mar&iacute;a Elena Mart&iacute;nez Tapia / </b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Presidente
                                del Comit&eacute; de Investigaci&oacute;n</font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Fe de erratas</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre
                                del patrocinador.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Estimados
                                    Doctores:</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">En
                                relaci&oacute;n al estudio mencionado, con la presente </font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>NOTIFICO</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                a ustedes que el documento expedido el fecha, contiene el
                                siguiente error:</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <ul>
                        <li />
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Describir.</font>
                            </font>
                        </p>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento, le env&iacute;o un cordial saludo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Dr.
                                    Nombre completo del Investigador principal</b></font>
                        </font>
                    </p>
                    <p class="western" align="center" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Investigador
                                Principal</font>
                        </font>
                    </p>
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5305
                            Fe de erratas CE, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                        </span></font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Fe de erratas --}}


    {{-- Renovacion anual --}}
    @if ($formato['documento_formato_id'] === 87)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
                <col width="100%">
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="right" style="margin-top: 0.17in">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                    style="font-weight: normal">Lugar,
                                                    Fecha</span></span></font>
                                    </font>
                                </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Juan Carlos Cant&uacute; Reyes</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    / Presidente del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                                </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>y
                                    </b></font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dra.
                                        Mar&iacute;a Elena Mart&iacute;nez Tapia / </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Presidente
                                    del Comit&eacute; de Investigaci&oacute;n Unidad de Investigaci&oacute;n
                                    en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">P
                                    r e s e n t e</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    Renovaci&oacute;n anual</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Sitio
                                        cl&iacute;nico</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Elegir</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fechas
                                        de aprobaci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Comit&eacute;
                                        de &Eacute;tica en Investigaci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Comit&eacute;
                                        de Investigaci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>COFEPRIS</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Estimados
                                        Doctores:</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">En
                                    relaci&oacute;n al estudio mencionado, con la presente </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>SOLICITO
                                        LA RENOVACI&Oacute;N</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    anual de autorizaci&oacute;n. </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Para
                                    ello, encuentre en el sistema electr&oacute;nico el informe
                                    correspondiente.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Estado
                                    del proyecto</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Fecha
                                    de visita de inicio</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    que firmaron ICF</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    activos o en seguimiento</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Total
                                    de informes iniciales de EAS en el sitio</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Total
                                    de desviaciones o violaciones en el sitio</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in"><br />

                        </p>
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sin
                                    otro particular por el momento, le env&iacute;o un cordial
                                    saludo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Nombre completo del Investigador principal</b></font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Investigador
                                    Principal</font>
                            </font>
                        </p>
                        <p class="western" align="center"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5306
                            Renovaci&oacute;n anual, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">03</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">nov</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
	    </div>
    @endif
    {{-- END Renovacion anual --}}


    {{-- Informe tecnico --}}
    @if ($formato['documento_formato_id'] === 88)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
                <col width="100%">
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="right">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                    style="font-weight: normal">Lugar,
                                                    Fecha</span></span></font>
                                    </font>
                                </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Nombre
                                        del Presidente del Comit&eacute;</b></font>
                            </font>
                        </p>
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">P
                                    r e s e n t e</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    Informe t&eacute;cnico seleccionar</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Sitio
                                        cl&iacute;nico</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="7" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C. Elegir</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Fechas
                                        de aprobaci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Comit&eacute;
                                        de &Eacute;tica en Investigaci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Comit&eacute;
                                        de Investigaci&oacute;n</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: none; border-left: none; border-right: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.08in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>COFEPRIS</b></font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>A
                                        quien corresponda:</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Con
                                    la presente, y en atenci&oacute;n a la NOM-012-SSA3-2012 </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><i>Que
                                        establece los criterios para la ejecuci&oacute;n de proyectos de
                                        investigaci&oacute;n para la salud en seres humanos</i></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">,
                                    env&iacute;o el </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>INFORME
                                    </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">del
                                    protocolo mencionado:</font>
                            </font>
                        </p>
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Estado
                                    del proyecto</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Fecha
                                    de visita de inicio</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    que firmaron ICF</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    activos o en seguimiento</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Total
                                    de informes iniciales de EAS en el sitio</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Total
                                    de desviaciones o violaciones en el sitio</font>
                            </font>
                        </p>
                    </td>
                    <td colspan="4" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="8" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
            <font face="Calibri, serif">
                <font size="2" style="font-size: 11pt"><b>Dr.
                    </b></font>
            </font>
            <font face="Calibri, serif">
                <font size="2" style="font-size: 11pt"><b>Nombre
                        completo del Investigador principal</b></font>
            </font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
            <font face="Calibri, serif">
                <font size="2" style="font-size: 11pt">Investigador
                    Principal</font>
            </font>
        </p>
        <p class="western" align="center" style="margin-bottom: 0in; line-height: 100%">
            <font face="Calibri, serif">
                <font size="2" style="font-size: 11pt">Unidad
                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
            </font>
        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5307
                            Informe t&eacute;cnico, Versi&oacute;n 03-nov</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Informe tecnico --}}


    {{-- Aviso de cierre --}}
    @if ($formato['documento_formato_id'] === 89)
        <div title="header">
            <p lang="x-none" align="right" style="margin-bottom: 1.11in; line-height: 100%">

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p lang="x-none" align="right">
                            <font face="Cambria, serif">
                                <font size="4" style="font-size: 16pt">
                                    <font face="Calibri, serif">
                                        <font size="2" style="font-size: 11pt"><span lang="es-MX"><span
                                                    style="font-weight: normal">Lugar,
                                                    Fecha</span></span></font>
                                    </font>
                                </font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Juan Carlos Cant&uacute; Reyes</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    / Presidente del Comit&eacute; de &Eacute;tica en Investigaci&oacute;n
                                </font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>y
                                    </b></font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dra.
                                        Mar&iacute;a Elena Mart&iacute;nez Tapia / </b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Presidente
                                    del Comit&eacute; de Investigaci&oacute;n</font>
                            </font>
                        </p>
                        <p class="western" align="justify" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">P
                                    r e s e n t e</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="right">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                            </font>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">
                                    Aviso de cierre</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">T&iacute;tulo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Nombre
                                    del patrocinador.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Estimados
                                        Doctores:</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">En
                                    relaci&oacute;n al estudio mencionado, con la presente notifico a
                                    usted el cierre de la investigaci&oacute;n. A continuaci&oacute;n,
                                    encuentre el resumen final de las actividades realizadas:</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Fecha
                                    de visita de inicio</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Fecha
                                    de reclutamiento del 1&deg; sujeto</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    que firmaron ICF</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    aleatorizados</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Fallas
                                    de selecci&oacute;n</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Retiros</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    que finalizaron tratamiento</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sujetos
                                    activos o en seguimiento</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Eventos
                                    adversos serios en el Sitio</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Desviaciones
                                    o violaciones</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td colspan="2" width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Fecha
                                    de visita de cierre</font>
                            </font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#f2f2f2" style="background: #f2f2f2"
                        style="border: 1px solid #00000a; padding: 0in 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: 1px solid #00000a; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="justify"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="justify">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Sin
                                    otro particular por el momento, le env&iacute;o un cordial
                                    saludo.</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Atentamente,</font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt"><b>Dr.
                                        Nombre completo del Investigador principal</b></font>
                            </font>
                        </p>
                        <p class="western" align="center" style="margin-bottom: 0in">
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Investigador
                                    principal</font>
                            </font>
                        </p>
                        <p class="western" align="center"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="2" style="font-size: 11pt">Unidad
                                    de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                            </font>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5401
                            Aviso de cierre, Versi&oacute;n 03</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">nov</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Aviso de cierre --}}


    {{-- Archivo muerto --}}
    @if ($formato['documento_formato_id'] === 90)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 0.65in; line-height: 100%"><a name="_Toc372304368"></a>
                <span class="sd-abs-pos" style="position: absolute; top: -0.03in; left: 0in; width: 233px"><img
                        src="621c478deaa58621c478deaa5a_html_e8ca10e0199211a4.png" name="Picture 2" width="100%" height="54"
                        border="0" />
                </span><br />

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <colgroup>
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
                <col width="100%">
            </colgroup>
            <colgroup>
                <col width="100%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="4" width="100%" height="70" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center">
                            <font face="Calibri, serif">
                                <font size="7" style="font-size: 48pt"><b>C&oacute;digo
                                        UIS </b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2" width="100%" height="38" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-top: 0.08in">
                            <font face="Calibri, serif">
                                <font size="7" style="font-size: 36pt"><b>Depurar
                                        en aaaa</b></font>
                            </font>
                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: none; padding: 0in">
                        <p class="western" align="center" style="margin-top: 0.08in"><a name="_GoBack"></a>
                            <font face="Calibri, serif">
                                <font size="6" style="font-size: 26pt"><b>Caja
                                        # / ##</b></font>
                            </font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" width="100%" height="2" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                        style="border-top: none; border-bottom: 1px solid #00000a; border-left: none; border-right: none; padding: 0in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" height="11" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western">
                            <font size="4" style="font-size: 16pt">Carpetas
                                regulatorias</font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western">
                            <font size="4" style="font-size: 16pt">Carpeta
                                de Farmacia</font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western">
                            <font size="4" style="font-size: 16pt">Carpetas
                                de SUSAR</font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western">
                            <font size="4" style="font-size: 16pt">Escalas
                                y elementos de medici&oacute;n</font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" height="9" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western">
                            <font size="4" style="font-size: 16pt">Estudios
                                de gabinete de sujetos</font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western">
                            <font size="4" style="font-size: 16pt">Archivo
                                electr&oacute;nico del cierre de CRF</font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western">
                            <font size="4" style="font-size: 16pt">Expedientes
                                de sujetos participantes</font>
                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td colspan="2" width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                    <td width="100%" bgcolor="#ffffff" style="background: #ffffff"
                        style="border: 1px solid #00000a; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0.08in">
                        <p class="western" align="center"><br />

                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.65in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5402
                            Archivo muerto, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                        1</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">7</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-oct-2020</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
            <p lang="x-none" style="margin-bottom: 0in; line-height: 100%"><br />

            </p>
        </div>
    @endif
    {{-- END Archivo muerto --}}


    {{-- Cambio de domicilio --}}
    @if ($formato['documento_formato_id'] === 91)
        <div title="header">
            <p lang="x-none" style="margin-bottom: 1.11in; line-height: 100%"><br />

            </p>
        </div>
        <table width="100%" cellpadding="7" cellspacing="0">
            <col width="100%">
            <col width="100%">
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Lugar,
                                Fecha</font>
                        </font>
                        <font face="Times New Roman, serif"> </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Nombre
                                    del destinatario</b></font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Puesto</font>
                        </font>
                    </p>
                    <p class="western" align="justify" style="margin-bottom: 0in">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Empresa</font>
                        </font>
                    </p>
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">P
                                r e s e n t e </font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="right">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Asunto:</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">
                                Aviso de cambio de domicilio</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>C&oacute;digo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">C&oacute;digo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>T&iacute;tulo</b></font>
                        </font>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Patrocinador</b></font>
                        </font>
                    </p>
                </td>
                <td width="100%" bgcolor="#ffffff" style="background: #ffffff" style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Nombre
                                del patrocinador.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Estimado
                                    T&iacute;tulo y Apellido del destinatario:</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">En
                                relaci&oacute;n al estudio mencionado, por este medio informo a
                                usted el cambio de domicilio de esta empresa, por lo que a partir
                                de esta fecha, todos los asuntos se atender&aacute;n en:</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Escribir
                                nuevo domicilio</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Sin
                                otro particular por el momento, reciba un cordial saludo.</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Atentamente,</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="justify"><br />

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt"><b>Nombre
                                    de quien notifica</b></font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center">
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Puesto</font>
                        </font>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="100%" valign="top" bgcolor="#ffffff" style="background: #ffffff"
                    style="border: none; padding: 0in">
                    <p class="western" align="center"><a name="_GoBack"></a>
                        <font face="Calibri, serif">
                            <font size="2" style="font-size: 11pt">Unidad
                                de Investigaci&oacute;n en Salud de Chihuahua, S.C.</font>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
        <p class="western" style="margin-bottom: 0in; line-height: 100%"><br />

        </p>
        <div title="footer">
            <p lang="x-none" align="center" style="margin-top: 0.45in; margin-bottom: 0in; line-height: 100%">
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">FC-SC-5403
                            Cambio de domicilio, </span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">Versi&oacute;n
                    </font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">26</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">jul</span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">-202</font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt"><span lang="es-MX">1
                            - <sdfield type=PAGE subtype=RANDOM format=PAGE>1</sdfield></span></font>
                </font>
                <font face="Calibri, serif">
                    <font size="2" style="font-size: 10pt">
                        / <sdfield type=DOCSTAT subtype=PAGE format=PAGE>1</sdfield>
                    </font>
                </font>
            </p>
        </div>
    @endif
    {{-- END Cambio de domicilio --}}

</body>
</html>