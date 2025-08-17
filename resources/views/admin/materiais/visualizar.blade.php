@extends('templates/livros_layout')

@section('content')
<div style="height: 100vh;">
    <iframe 
        src="https://mozilla.github.io/pdf.js/web/viewer.html?file={{ urlencode(asset($material->caminho_do_arquivo)) }}#toolbar=0&navpanes=0&scrollbar=0"
        width="100%" 
        height="100%" 
        style="border:none;"
        allowfullscreen
    ></iframe>
</div>

<script>
    // Desativa clique direito
    document.addEventListener('contextmenu', event => event.preventDefault());
    // Bloqueia seleção de texto
    document.addEventListener('selectstart', event => event.preventDefault());
</script>
@endsection
