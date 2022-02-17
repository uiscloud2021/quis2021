//MENUS
$(document).ready(
    function () {
        $.ajax({
            url: "/dashboard/get_empresa",
            method:'POST',
            data:{ _token:$('input[name="_token"]').val() },
            success:function(data){
                $("#empresa_navbar").val(data);
            }
        })
    }
);

function Menu_Empresas(empresa_id){
    $('#form_emp').submit();
}
