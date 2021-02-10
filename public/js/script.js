$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
let opcionesToastr = {
    "closeButton" : true,
    "debug" : false,
    "newestOnTop" : false,
    "progressBar" : true,
    "positionClass" : "toast-top-center",
    "preventDuplicates" : true,
    "onclick" : null,
    "showDuration" : "300",
    "hideDuration" : "1000",
    "timeOut" : "5000",
    "extendedTimeOut" : "1000",
    "showEasing" : "swing",
    "hideEasing" : "linear",
    "showMethod" : "fadeIn",
    "hideMethod" : "fadeOut"
}
  
let direccion = location.origin;
if(direccion === 'http://localhost' || direccion === 'http://192.168.14.49')
    direccion += '/papeletas'
  
const eliminar = (ruta,nombre,tabla) =>{
    swal({
        title: `Eliminar ${nombre}`,
        text: `Seguro que desea eliminar el/la ${nombre}`,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        console.log('Eliminado');
        if(result.value){
            $.ajax({
                url: ruta,
                method: 'DELETE',
                success:function(data){
                    toastr.options = opcionesToastr;
                    let mensaje = `${nombre.toUpperCase()} se elimino correctamente`;
                    toastr.error(mensaje,'Eliminado!');
                    tabla.ajax.reload(null,false);
                }
            });
        }
    });
};

const imprimir = (ruta) => {
    const pdfFrame = document.getElementById('pdf')
    pdfFrame.setAttribute('src','');
    setTimeout(()=>{
      pdfFrame.setAttribute('src',ruta);
      $('#modal-imprimir').modal('show')
    },200)
}

const form = document.getElementById('form')

form.addEventListener('submit',e => {
    let planilla = document.getElementById('planilla')
    e.preventDefault();
    let ruta = `${direccion}/papeletas/importar`
    let formData = new FormData(form);

    $.ajax({
        url:ruta,
        data: formData,
        method: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $('#btn-submit').button('loading');      
        },
        success:function(data){
            toastr.options = opcionesToastr;
            let mensaje = `Se importo correctamente los datos`;
            toastr.success(mensaje,'Importar!');
            $('#btn-submit').button('reset');    
            $('#modal-importar').modal('hide');
            tabla.ajax.reload(null,false);
        }
    });

})
