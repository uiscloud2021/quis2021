@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item active" style="font-size:16px; font-weight:bold;"><a> Bienvenido(a)</a></li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
</div>
@stop

@section('content')


<div class="card">

<div class="card-header">
  <div align="right">
  @if(session('id_empresa') == 1 || session('id_empresa') == 2)
    <button type="button" onclick="Regresar();" class="btn btn-warning"><i class="fa fa-arrow-left"> Regresar</i></button>
  @elseif(session('id_empresa') == 15)
    <button type="button" onclick="RegresarComite();" class="btn btn-warning"><i class="fa fa-arrow-left"> Regresar</i></button>
  @endif
  </div>
</div>

<div class="card-body">

<div class="table-responsive" style="text-align: center;">
  @if(session('id_empresa') == 1 || session('id_empresa') == 2)
    <map name="mapa_modelo"> 
      <area alt="Administración" shape="CIRCLE" coords="292,52,50" href="#" onclick="Modelo(1);">
      <area alt="Comité de Ética" shape="CIRCLE" coords="424,153,50" href="#" onclick="Modelo(2);">
      <area alt="Sitio Clínico" shape="CIRCLE" coords="388,293,50" href="#" onclick="Modelo(3);">
      <area alt="Unidad Clínica" shape="CIRCLE" coords="219,299,50" href="#">
      <area alt="Innovación y Desarrollo" shape="CIRCLE" coords="164,150,50" href="#" onclick="Modelo(4);">
      <area alt="Calidad" shape="RECT" coords="2,379,117,444" href="#" onclick="Modelo(5);">
      <area alt="Capacitación" shape="RECT" coords="119,379,232,444" href="#" onclick="Modelo(6);">
      <area alt="Seguridad" shape="RECT" coords="236,379,351,444" href="#" onclick="Modelo(7);">
      <area alt="Responsabilidad" shape="RECT" coords="354,379,443,444" href="#" onclick="Modelo(8);">
      <area alt="Integridad" shape="RECT" coords="472,379,583,444" href="#" onclick="Modelo(9);"> 
    </map> 
    <img id="modelo" src="../vendor/adminlte/dist/img/modelo.png" border="0" usemap="#mapa_modelo">
    
    <!-- ADMINISTRACION -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_adm"> 
      <area alt="Gestión" shape="RECT" coords="70,165,183,229" href="#" onclick="PC_AD(1);">
      <area alt="Finanzas" shape="RECT" coords="70,280,183,345" href="#" onclick="PC_AD(2);">
      <area alt="Recursos Humanos" shape="RECT" coords="70,397,183,461" href="#" onclick="PC_AD(3);">
      <area alt="Sistemas" shape="RECT" coords="233,165,345,229" href="#" onclick="PC_AD(4);">
      <area alt="Calidad" shape="RECT" coords="233,280,345,345" href="#" onclick="PC_AD(5);"> 
      <area alt="Regulatorio" shape="RECT" coords="233,397,345,461" href="#" onclick="PC_AD(6);"> 
    </map> 
    <img id="procesos_adm" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-AD.png" border="0" usemap="#mapa_adm">
    <!-- PROCESOS 1 -->
    <map name="pc_adm1"> 
      <area alt="Empresa" shape="RECT" coords="205,155,327,223" href="#" onclick="PNO_AD(1);">
      <area alt="Oficina" shape="RECT" coords="205,280,327,351" href="#" onclick="PNO_AD(2);">
      <area alt="Recepción" shape="RECT" coords="205,408,327,477" href="#" onclick="PNO_AD(3);">
    </map> 
    <img id="pc_adm1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-AD-1.png" border="0" usemap="#pc_adm1">
    <!-- PROCESOS 2 -->
    <map name="pc_adm2"> 
      <area alt="Contrata" shape="RECT" coords="195,146,309,211" href="#" onclick="PNO_AD(4);">
      <area alt="Prepara" shape="RECT" coords="195,266,309,331" href="#" onclick="PNO_AD(5);">
      <area alt="Proveedores" shape="RECT" coords="195,386,309,450" href="#" onclick="PNO_AD(6);">
      <area alt="Factura" shape="RECT" coords="195,507,309,568" href="#" onclick="PNO_AD(7);">
    </map> 
    <img id="pc_adm2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-AD-2.png" border="0" usemap="#pc_adm2">
    <!-- PROCESOS 3 -->
    <map name="pc_adm3"> 
      <area alt="Reclutamiento" shape="RECT" coords="153,116,242,167" href="#" onclick="PNO_AD(8);">
      <area alt="Contratación" shape="RECT" coords="153,210,242,258" href="#" onclick="PNO_AD(9);">
      <area alt="Inducción" shape="RECT" coords="153,306,242,352" href="#" onclick="PNO_AD(10);">
      <area alt="Desarrollo" shape="RECT" coords="153,398,242,449" href="#" onclick="PNO_AD(11);">
      <area alt="Evaluación" shape="POLY" coords="155,518,197,493,239,519,197,543" href="#" onclick="PNO_AD(12);">
      <area alt="Terminación" shape="RECT" coords="153,589,242,637" href="#" onclick="PNO_AD(13);">
    </map> 
    <img id="pc_adm3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-AD-3.png" border="0" usemap="#pc_adm3">
    <!-- PROCESOS 4 -->
    <map name="pc_adm4"> 
      <area alt="Control" shape="RECT" coords="22,116,111,164" href="#" onclick="PNO_AD(14);">
      <area alt="Soluciones" shape="RECT" coords="22,323,111,372" href="#" onclick="PNO_AD(15);">
    </map> 
    <img id="pc_adm4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-AD-4.png" border="0" usemap="#pc_adm4">
    <!-- PROCESOS 5 -->
    <map name="pc_adm5"> 
      <area alt="Control" shape="RECT" coords="22,120,112,170" href="#" onclick="PNO_AD(16);">
    </map> 
    <img id="pc_adm5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-AD-5.png" border="0" usemap="#pc_adm5">
    <!-- PROCESOS 6 -->
    <map name="pc_adm6"> 
      <area alt="Control" shape="RECT" coords="24,136,132,197" href="#" onclick="PNO_AD(17);">
    </map> 
    <img id="pc_adm6" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-AD-6.png" border="0" usemap="#pc_adm6">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_adm1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-110.png" border="0">
    <img id="pno_adm2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-120.png" border="0">
    <img id="pno_adm3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-130.png" border="0">
    <img id="pno_adm4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-210.png" border="0">
    <img id="pno_adm5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-220.png" border="0">
    <img id="pno_adm6" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-230.png" border="0">
    <img id="pno_adm7" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-240.png" border="0">
    <img id="pno_adm8" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-310.png" border="0">
    <img id="pno_adm9" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-320.png" border="0">
    <img id="pno_adm10" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-330.png" border="0">
    <img id="pno_adm11" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-340.png" border="0">
    <img id="pno_adm12" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-350.png" border="0">
    <img id="pno_adm13" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-360.png" border="0">
    <img id="pno_adm14" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-410.png" border="0">
    <img id="pno_adm15" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-420.png" border="0">
    <img id="pno_adm16" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-510.png" border="0">
    <img id="pno_adm17" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-AD-610.png" border="0">


    <!-- COMITE DE ETICA -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_ce"> 
      <area alt="Integración" shape="RECT" coords="76,116,167,166" href="#" onclick="PC_CE(1);">
      <area alt="Sometimiento" shape="RECT" coords="76,209,167,260" href="#" onclick="PC_CE(1);">
      <area alt="Revisión" shape="POLY" coords="79,329,122,308,163,329,122,352" href="#" onclick="PC_CE(1);">
      <area alt="Seguimiento" shape="RECT" coords="76,398,167,448" href="#" onclick="PC_CE(1);">
      <area alt="Auditoría" shape="POLY" coords="78,516,121,493,164,518,122,543" href="#" onclick="PC_CE(1);"> 
      <area alt="Cierre" shape="RECT" coords="77,586,167,636" href="#" onclick="PC_CE(1);"> 
    </map> 
    <img id="procesos_ce" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-CE.png" border="0" usemap="#mapa_ce">
    <!-- PROCESOS 1 -->
    <map name="pc_ce1"> 
      <area alt="Integración" shape="RECT" coords="152,134,242,185" href="#" onclick="PNO_CE(1);">
      <area alt="Sometimiento" shape="RECT" coords="285,229,375,280" href="#" onclick="PNO_CE(2);">
      <area alt="Revisión" shape="POLY" coords="287,350,329,324,371,349,330,374" href="#" onclick="PNO_CE(3);">
      <area alt="Seguimiento" shape="POLY" coords="287,444,330,419,371,443,330,469" href="#" onclick="PNO_CE(4);">
      <area alt="Auditoría" shape="POLY" coords="288,538,331,512,371,537,329,562" href="#" onclick="PNO_CE(5);">
      <area alt="Cierre" shape="RECT" coords="285,605,374,656" href="#" onclick="PNO_CE(6);">
    </map> 
    <img id="pc_ce1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-CE-1.png" border="0" usemap="#pc_ce1">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_ce1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-110.png" border="0">
    <img id="pno_ce2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-210.png" border="0">
    <img id="pno_ce3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-310.png" border="0">
    <img id="pno_ce4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-410.png" border="0">
    <img id="pno_ce5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-510.png" border="0">
    <img id="pno_ce6" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-610.png" border="0">


    <!-- SITIO CLINICO -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_sc"> 
      <area alt="Factibilidad" shape="POLY" coords="98,141,142,119,183,140,142,166" href="#" onclick="PC_SC(1);">
      <area alt="Sometimiento" shape="RECT" coords="96,210,186,261" href="#" onclick="PC_SC(2);">
      <area alt="Farmacia" shape="RECT" coords="114,303,169,390" href="#" onclick="PC_SC(3);">
      <area alt="Reclutamiento" shape="RECT" coords="97,398,186,431" href="#" onclick="PC_SC(4);">
      <area alt="Conducción" shape="RECT" coords="97,493,187,523" href="#" onclick="PC_SC(5);"> 
    </map> 
    <img id="procesos_sc" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-SC.png" border="0" usemap="#mapa_sc">
    <!-- PROCESOS 1 -->
    <map name="pc_sc1"> 
      <area alt="Análisis" shape="POLY" coords="192,142,235,115,276,140,235,166" href="#" onclick="PNO_SC(1);">
      <area alt="Cuestionario" shape="POLY" coords="192,236,237,210,277,235,235,259" href="#" onclick="PNO_SC(2);">
      <area alt="Selección" shape="RECT" coords="191,415,281,469" href="#" onclick="PNO_SC(3);">
    </map> 
    <img id="pc_sc1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-SC-1.png" border="0" usemap="#pc_sc1">
    <!-- PROCESOS 2 -->
    <map name="pc_sc2"> 
      <area alt="Equipo" shape="RECT" coords="153,133,243,185" href="#" onclick="PNO_SC(4);">
      <area alt="Sometimiento" shape="RECT" coords="154,324,243,374" href="#" onclick="PNO_SC(5);">
      <area alt="Firmas" shape="RECT" coords="153,473,242,525" href="#" onclick="PNO_SC(6);">
      <area alt="Dossier" shape="RECT" coords="154,567,243,619" href="#" onclick="PNO_SC(7);">
    </map> 
    <img id="pc_sc2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-SC-2.png" border="0" usemap="#pc_sc2">
    <!-- PROCESOS 3 -->
    <map name="pc_sc3"> 
      <area alt="Instalaciones" shape="RECT" coords="285,116,374,168" href="#" onclick="PNO_SC(8);">
      <area alt="Equipamiento" shape="RECT" coords="284,193,375,242" href="#" onclick="PNO_SC(9);">
      <area alt="Carpeta" shape="RECT" coords="284,266,375,318" href="#" onclick="PNO_SC(10);">
      <area alt="Seguridad" shape="RECT" coords="285,341,373,392" href="#" onclick="PNO_SC(11);">
      <area alt="Resguardo" shape="RECT" coords="285,437,374,486" href="#" onclick="PNO_SC(12);">
      <area alt="Entrega" shape="RECT" coords="285,549,374,600" href="#" onclick="PNO_SC(13);">
    </map> 
    <img id="pc_sc3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-SC-3.png" border="0" usemap="#pc_sc3">
    <!-- PROCESOS 4 -->
    <map name="pc_sc4"> 
      <area alt="Verificación" shape="POLY" coords="155,141,199,117,239,143,198,166" href="#" onclick="PNO_SC(14);">
      <area alt="Cronograma" shape="RECT" coords="153,190,243,243" href="#" onclick="PNO_SC(15);">
      <area alt="Visita" shape="RECT" coords="155,285,244,338" href="#" onclick="PNO_SC(16);">
      <area alt="Publicidad" shape="RECT" coords="153,360,244,412" href="#" onclick="PNO_SC(17);">
      <area alt="Documento" shape="RECT" coords="153,435,243,486" href="#" onclick="PNO_SC(18);">
      <area alt="Consentimiento" shape="RECT" coords="154,511,243,563" href="#" onclick="PNO_SC(19);">
      <area alt="Protección" shape="RECT" coords="154,588,243,637" href="#" onclick="PNO_SC(20);">
    </map> 
    <img id="pc_sc4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-SC-4.png" border="0" usemap="#pc_sc4">
    <!-- PROCESOS 5 -->
    <map name="pc_sc5"> 
      <area alt="Preparación" shape="RECT" coords="164,122,260,178" href="#" onclick="PNO_SC(21);">
      <area alt="Consulta" shape="RECT" coords="163,225,261,279" href="#" onclick="PNO_SC(22);">
      <area alt="Seguimiento" shape="RECT" coords="163,324,259,378" href="#" onclick="PNO_SC(23);">
      <area alt="Cierre" shape="RECT" coords="164,424,259,480" href="#" onclick="PNO_SC(24);">
    </map> 
    <img id="pc_sc5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-SC-5.png" border="0" usemap="#pc_sc5">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_sc1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-110.png" border="0">
    <img id="pno_sc2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-120.png" border="0">
    <img id="pno_sc3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-130.png" border="0">
    <img id="pno_sc4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-210.png" border="0">
    <img id="pno_sc5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-220.png" border="0">
    <img id="pno_sc6" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-230.png" border="0">
    <img id="pno_sc7" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-240.png" border="0">
    <img id="pno_sc8" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-310.png" border="0">
    <img id="pno_sc9" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-320.png" border="0">
    <img id="pno_sc10" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-330.png" border="0">
    <img id="pno_sc11" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-340.png" border="0">
    <img id="pno_sc12" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-350.png" border="0">
    <img id="pno_sc13" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-360.png" border="0">
    <img id="pno_sc14" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-410.png" border="0">
    <img id="pno_sc15" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-420.png" border="0">
    <img id="pno_sc16" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-430.png" border="0">
    <img id="pno_sc17" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-440.png" border="0">
    <img id="pno_sc18" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-450.png" border="0">
    <img id="pno_sc19" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-460.png" border="0">
    <img id="pno_sc20" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-470.png" border="0">
    <img id="pno_sc21" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-510.png" border="0">
    <img id="pno_sc22" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-520.png" border="0">
    <img id="pno_sc23" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-530.png" border="0">
    <img id="pno_sc24" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-SC-540.png" border="0">


    <!-- INNOVACION Y DESARROLLO -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_id"> 
      <area alt="Capacita" shape="RECT" coords="214,182,323,244" href="#" onclick="PC_ID(1);">
      <area alt="Consultoría" shape="RECT" coords="215,296,323,355" href="#" onclick="PC_ID(2);">
      <area alt="Diseño" shape="RECT" coords="215,406,322,469" href="#" onclick="PC_ID(3);">
      <area alt="Desarrollo" shape="RECT" coords="216,518,323,580" href="#" onclick="PC_ID(4);">
      <area alt="Incubación" shape="RECT" coords="215,631,322,693" href="#" onclick="PC_ID(5);"> 
    </map> 
    <img id="procesos_id" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-ID.png" border="0" usemap="#mapa_id">
    <!-- PROCESOS 1 -->
    <map name="pc_id1"> 
      <area alt="Capacita a UIS" shape="RECT" coords="20,116,111,165" href="#" onclick="PNO_ID(1);">
      <area alt="Capacita de UIS" shape="RECT" coords="20,266,111,317" href="#" onclick="PNO_ID(2);">
    </map> 
    <img id="pc_id1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-ID-1.png" border="0" usemap="#pc_id1">
    <!-- PROCESOS 2 -->
    <map name="pc_id2"> 
      <area alt="Diagnóstico" shape="RECT" coords="190,116,279,167" href="#" onclick="PNO_ID(3);">
      <area alt="Propiedad" shape="RECT" coords="190,211,279,261" href="#" onclick="PNO_ID(4);">
      <area alt="Vinculación" shape="RECT" coords="190,304,281,356" href="#" onclick="PNO_ID(5);">
      <area alt="Plataforma" shape="RECT" coords="191,398,280,448" href="#" onclick="PNO_ID(6);">
      <area alt="Venta" shape="RECT" coords="190,492,280,544" href="#" onclick="PNO_ID(7);">
    </map> 
    <img id="pc_id2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-ID-2.png" border="0" usemap="#pc_id2">
    <!-- PROCESOS 3 -->
    <map name="pc_id3"> 
      <area alt="Aclaración" shape="RECT" coords="323,115,413,166" href="#" onclick="PNO_ID(8);">
      <area alt="Redacción" shape="RECT" coords="323,304,412,355" href="#" onclick="PNO_ID(9);">
      <area alt="Sometimiento" shape="RECT" coords="323,397,412,450" href="#" onclick="PNO_ID(10);">
      <area alt="Dossier" shape="RECT" coords="324,567,413,617" href="#" onclick="PNO_ID(10);">
    </map> 
    <img id="pc_id3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-ID-3.png" border="0" usemap="#pc_id3">
    <!-- PROCESOS 4 -->
    <map name="pc_id4"> 
      <area alt="Prefactibilidad" shape="POLY" coords="324,142,369,119,409,141,366,167" href="#" onclick="PNO_ID(11);">
      <area alt="Servicios" shape="RECT" coords="323,210,411,259" href="#" onclick="PNO_ID(12);">
      <area alt="Sitios" shape="RECT" coords="322,323,413,373" href="#" onclick="PNO_ID(13);">
      <area alt="Insumos" shape="RECT" coords="323,417,413,467" href="#" onclick="PNO_ID(14);">
    </map> 
    <img id="pc_id4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-ID-4.png" border="0" usemap="#pc_id4">
    <!-- PROCESOS 5 -->
    <map name="pc_id5"> 
      <area alt="Planeación" shape="RECT" coords="192,116,281,167" href="#" onclick="PNO_ID(15);">
      <area alt="Constitución" shape="RECT" coords="191,210,282,260" href="#" onclick="PNO_ID(16);">
      <area alt="Imagen" shape="RECT" coords="191,303,280,355" href="#" onclick="PNO_ID(17);">
    </map> 
    <img id="pc_id5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-ID-5.png" border="0" usemap="#pc_id5">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_id1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-110.png" border="0">
    <img id="pno_id2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-120.png" border="0">
    <img id="pno_id3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-210.png" border="0">
    <img id="pno_id4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-220.png" border="0">
    <img id="pno_id5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-230.png" border="0">
    <img id="pno_id6" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-240.png" border="0">
    <img id="pno_id7" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-250.png" border="0">
    <img id="pno_id8" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-310.png" border="0">
    <img id="pno_id9" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-320.png" border="0">
    <img id="pno_id10" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-330.png" border="0">
    <img id="pno_id11" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-410.png" border="0">
    <img id="pno_id12" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-420.png" border="0">
    <img id="pno_id13" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-430.png" border="0">
    <img id="pno_id14" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-440.png" border="0">
    <img id="pno_id15" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-510.png" border="0">
    <img id="pno_id16" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-520.png" border="0">
    <img id="pno_id17" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-ID-530.png" border="0">


    <!-- A- CALIDAD -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_a"> 
      <area alt="Planeación" shape="RECT" coords="106,107,204,163" href="#" onclick="PC_A(1);">
      <area alt="Implementación" shape="RECT" coords="106,210,205,267" href="#" onclick="PC_A(1);">
      <area alt="Auditoría" shape="POLY" coords="107,341,157,314,201,342,155,370" href="#" onclick="PC_A(1);">
      <area alt="Mejora" shape="RECT" coords="106,417,206,474" href="#" onclick="PC_A(1);">
    </map> 
    <img id="procesos_a" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-A.png" border="0" usemap="#mapa_a">
    <!-- PROCESOS 1 -->
    <map name="pc_a1"> 
      <area alt="Planeación" shape="RECT" coords="153,116,243,166" href="#" onclick="PNO_A(1);">
      <area alt="Implementación" shape="RECT" coords="416,210,638,260" href="#" onclick="PNO_A(2);">
      <area alt="Auditoría" shape="POLY" coords="286,329,329,305,371,330,329,355" href="#" onclick="PNO_A(3);">
      <area alt="Mejora" shape="RECT" coords="153,398,242,449" href="#" onclick="PNO_A(4);">
      <area alt="Mejora" shape="RECT" coords="284,397,637,448" href="#" onclick="PNO_A(4);">
    </map> 
    <img id="pc_a1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-A-1.png" border="0" usemap="#pc_a1">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_a1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-A-101.png" border="0">
    <img id="pno_a2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-A-201.png" border="0">
    <img id="pno_a3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-A-301.png" border="0">
    <img id="pno_a4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-A-401.png" border="0">


    <!-- B- CAPACITACION -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_b"> 
      <area alt="Diagnóstico" shape="RECT" coords="96,135,186,186" href="#" onclick="PC_B(1);">
      <area alt="Plan" shape="RECT" coords="96,229,186,279" href="#" onclick="PC_B(1);">
      <area alt="Contenidos" shape="RECT" coords="94,324,185,373" href="#" onclick="PC_B(1);">
      <area alt="Intervención" shape="RECT" coords="96,416,187,465" href="#" onclick="PC_B(1);">
      <area alt="Evaluación" shape="POLY" coords="100,534,142,512,182,536,141,559" href="#" onclick="PC_B(1);">
    </map> 
    <img id="procesos_b" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-B.png" border="0" usemap="#mapa_b">
    <!-- PROCESOS 1 -->
    <map name="pc_b1"> 
      <area alt="Diagnóstico" shape="RECT" coords="284,117,376,165" href="#" onclick="PNO_B(1);">
      <area alt="Plan" shape="RECT" coords="285,209,376,260" href="#" onclick="PNO_B(2);">
      <area alt="Contenidos" shape="RECT" coords="286,303,375,356" href="#" onclick="PNO_B(3);">
      <area alt="Intervención" shape="RECT" coords="286,399,375,449" href="#" onclick="PNO_B(4);">
      <area alt="Evaluación" shape="RECT" coords="284,493,375,546" href="#" onclick="PNO_B(4);">
    </map> 
    <img id="pc_b1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-B-1.png" border="0" usemap="#pc_b1">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_b1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-B-101.png" border="0">
    <img id="pno_b2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-B-201.png" border="0">
    <img id="pno_b3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-B-301.png" border="0">
    <img id="pno_b4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-B-401.png" border="0">
    <img id="pno_b5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-B-501.png" border="0">


    <!-- C- SEGURIDAD -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_c"> 
      <area alt="Prevención" shape="RECT" coords="155,156,258,216" href="#" onclick="PC_C(1);">
      <area alt="Atención" shape="RECT" coords="155,264,259,325" href="#" onclick="PC_C(1);">
      <area alt="Recuperación" shape="RECT" coords="157,371,258,432" href="#" onclick="PC_C(1);">
    </map> 
    <img id="procesos_c" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-C.png" border="0" usemap="#mapa_c">
    <!-- PROCESOS 1 -->
    <map name="pc_c1"> 
      <area alt="Prevención" shape="RECT" coords="153,133,243,182" href="#" onclick="PNO_C(1);">
      <area alt="Atención" shape="RECT" coords="153,229,242,278" href="#" onclick="PNO_C(2);">
      <area alt="Recuperación" shape="RECT" coords="154,323,242,371" href="#" onclick="PNO_C(3);">
    </map> 
    <img id="pc_c1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-C-1.png" border="0" usemap="#pc_c1">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_c1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-C-101.png" border="0">
    <img id="pno_c2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-C-201.png" border="0">
    <img id="pno_c3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-C-301.png" border="0">


    <!-- D- RESPONSABILIDAD -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_d"> 
      <area alt="Planeación" shape="RECT" coords="114,206,223,268" href="#" onclick="PC_D(1);">
      <area alt="Desarrollo" shape="RECT" coords="115,319,225,379" href="#" onclick="PC_D(1);">
    </map> 
    <img id="procesos_d" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-D.png" border="0" usemap="#mapa_d">
    <!-- PROCESOS 1 -->
    <map name="pc_d1"> 
      <area alt="Planeación" shape="RECT" coords="26,140,135,204" href="#" onclick="PNO_D(1);">
      <area alt="Desarrollo" shape="RECT" coords="26,254,134,316" href="#" onclick="PNO_D(2);">
    </map> 
    <img id="pc_d1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-D-1.png" border="0" usemap="#pc_d1">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_d1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-D-101.png" border="0">
    <img id="pno_d2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-D-201.png" border="0">


    <!-- E- INTEGRIDAD -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_e"> 
      <area alt="Comunicar" shape="RECT" coords="95,134,186,187" href="#" onclick="PC_E(1);">
      <area alt="Asegurar" shape="POLY" coords="95,254,139,232,183,254,140,278" href="#" onclick="PC_E(1);">
      <area alt="Atender" shape="RECT" coords="95,322,185,371" href="#" onclick="PC_E(1);">
    </map> 
    <img id="procesos_e" style="display:none" src="../vendor/adminlte/dist/img/esquemas/MAPA-E.png" border="0" usemap="#mapa_e">
    <!-- PROCESOS 1 -->
    <map name="pc_e1"> 
      <area alt="Comunicar" shape="RECT" coords="21,116,112,166" href="#" onclick="PNO_E(1);">
      <area alt="Asegurar" shape="POLY" coords="23,236,67,214,108,236,67,260" href="#" onclick="PNO_E(2);">
      <area alt="Atender" shape="RECT" coords="21,304,111,354" href="#" onclick="PNO_E(3);">
      <area alt="Atender" shape="RECT" coords="152,305,243,356" href="#" onclick="PNO_E(4);">
    </map> 
    <img id="pc_e1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-E-1.png" border="0" usemap="#pc_e1">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_e1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-E-101.png" border="0">
    <img id="pno_e2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-E-201.png" border="0">
    <img id="pno_e3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-E-301.png" border="0">
    <img id="pno_e4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-E-302.png" border="0">
  


  @elseif(session('id_empresa') == 15)
  
    <!-- COMITE DE ETICA -->
    <!-- MAPA DE PROCESOS -->
    <map name="mapa_ce"> 
      <area alt="Integración" shape="RECT" coords="76,116,167,166" href="#" onclick="PC_CE(1);">
      <area alt="Sometimiento" shape="RECT" coords="76,209,167,260" href="#" onclick="PC_CE(1);">
      <area alt="Revisión" shape="POLY" coords="79,329,122,308,163,329,122,352" href="#" onclick="PC_CE(1);">
      <area alt="Seguimiento" shape="RECT" coords="76,398,167,448" href="#" onclick="PC_CE(1);">
      <area alt="Auditoría" shape="POLY" coords="78,516,121,493,164,518,122,543" href="#" onclick="PC_CE(1);"> 
      <area alt="Cierre" shape="RECT" coords="77,586,167,636" href="#" onclick="PC_CE(1);"> 
    </map> 
    <img id="procesos_ce" src="../vendor/adminlte/dist/img/esquemas/MAPA-CE.png" border="0" usemap="#mapa_ce">
    <!-- PROCESOS 1 -->
    <map name="pc_ce1"> 
      <area alt="Integración" shape="RECT" coords="152,134,242,185" href="#" onclick="PNO_CE(1);">
      <area alt="Sometimiento" shape="RECT" coords="285,229,375,280" href="#" onclick="PNO_CE(2);">
      <area alt="Revisión" shape="POLY" coords="287,350,329,324,371,349,330,374" href="#" onclick="PNO_CE(3);">
      <area alt="Seguimiento" shape="POLY" coords="287,444,330,419,371,443,330,469" href="#" onclick="PNO_CE(4);">
      <area alt="Auditoría" shape="POLY" coords="288,538,331,512,371,537,329,562" href="#" onclick="PNO_CE(5);">
      <area alt="Cierre" shape="RECT" coords="285,605,374,656" href="#" onclick="PNO_CE(6);">
    </map> 
    <img id="pc_ce1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PC-CE-1.png" border="0" usemap="#pc_ce1">
    <!-- PROCEDIMIENTOS -->
    <img id="pno_ce1" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-110.png" border="0">
    <img id="pno_ce2" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-210.png" border="0">
    <img id="pno_ce3" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-310.png" border="0">
    <img id="pno_ce4" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-410.png" border="0">
    <img id="pno_ce5" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-510.png" border="0">
    <img id="pno_ce6" style="display:none" src="../vendor/adminlte/dist/img/esquemas/PNO-CE-610.png" border="0">

  @endif







</div>

</div>
</div>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
      function Modelo(val){
        $('#modelo').hide();
        if(val==1){
          $('#procesos_adm').show();
        }
        else if(val==2){
          $('#procesos_ce').show();
        }
        else if(val==3){
          $('#procesos_sc').show();
        }
        else if(val==4){
          $('#procesos_id').show();
        }
        else if(val==5){
          $('#procesos_a').show();
        }
        else if(val==6){
          $('#procesos_b').show();
        }
        else if(val==7){
          $('#procesos_c').show();
        }
        else if(val==8){
          $('#procesos_d').show();
        }
        else if(val==9){
          $('#procesos_e').show();
        }
      }

      function PC_AD(val){
        $('#procesos_adm').hide();
        $('#pc_adm'+val).show();
      }

      function PNO_AD(val){
        $('#pc_adm1').hide();
        $('#pc_adm2').hide();
        $('#pc_adm3').hide();
        $('#pc_adm4').hide();
        $('#pc_adm5').hide();
        $('#pc_adm6').hide();
        $('#pno_adm'+val).show();
      }

      function PC_CE(val){
        $('#procesos_ce').hide();
        $('#pc_ce'+val).show();
      }

      function PNO_CE(val){
        $('#pc_ce1').hide();
        $('#pno_ce'+val).show();
      }

      function PC_SC(val){
        $('#procesos_sc').hide();
        $('#pc_sc'+val).show();
      }

      function PNO_SC(val){
        $('#pc_sc1').hide();
        $('#pc_sc2').hide();
        $('#pc_sc3').hide();
        $('#pc_sc4').hide();
        $('#pc_sc5').hide();
        $('#pno_sc'+val).show();
      }

      function PC_ID(val){
        $('#procesos_id').hide();
        $('#pc_id'+val).show();
      }

      function PNO_ID(val){
        $('#pc_id1').hide();
        $('#pc_id2').hide();
        $('#pc_id3').hide();
        $('#pc_id4').hide();
        $('#pc_id5').hide();
        $('#pno_id'+val).show();
      }

      function PC_A(val){
        $('#procesos_a').hide();
        $('#pc_a'+val).show();
      }

      function PNO_A(val){
        $('#pc_a1').hide();
        $('#pno_a'+val).show();
      }

      function PC_B(val){
        $('#procesos_b').hide();
        $('#pc_b'+val).show();
      }

      function PNO_B(val){
        $('#pc_b1').hide();
        $('#pno_b'+val).show();
      }

      function PC_C(val){
        $('#procesos_c').hide();
        $('#pc_c'+val).show();
      }

      function PNO_C(val){
        $('#pc_c1').hide();
        $('#pno_c'+val).show();
      }

      function PC_D(val){
        $('#procesos_d').hide();
        $('#pc_d'+val).show();
      }

      function PNO_D(val){
        $('#pc_d1').hide();
        $('#pno_d'+val).show();
      }

      function PC_E(val){
        $('#procesos_e').hide();
        $('#pc_e'+val).show();
      }

      function PNO_E(val){
        $('#pc_e1').hide();
        $('#pno_e'+val).show();
      }

      function RegresarComite(){
        $('#pc_ce1').hide();
        $('#pno_ce1').hide();
        $('#pno_ce2').hide();
        $('#pno_ce3').hide();
        $('#pno_ce4').hide();
        $('#pno_ce5').hide();
        $('#pno_ce6').hide();
        $('#procesos_ce').show();
      }

      function Regresar(){
        location.reload();
      }

    </script>

@stop
