@isset($erro)
    <div style="position: absolute; bottom:50px">
        <body onload="jsMensErro('{{ $erro['erro'] }}')"></body>
    </div>
@endisset

@isset($msg)
    <div style="position: absolute; bottom:50px">
        <body onload="jsMens('{{ $msg['msg'] }}')"></body>
    </div>
@endisset

<script>

function jsMens(msg){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
})

Toast.fire({
  icon: 'success',
  title: msg
})
}


function jsMensErro(msg){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
})

Toast.fire({
  icon: 'error',
  title: msg
})
jsCarregaCKEditor();
}

function jsCarregaCKEditor() {
        CKEDITOR.replace('editor',{
        customConfig: "{{ asset('js/ckeditor_config.js')}}"
        });

        CKEDITOR.replace('texto_opcao',{
        customConfig: "{{ asset('js/ckeditor_config.js')}}"
        });
    };
</script>

