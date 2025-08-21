@extends('templates/login_layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Visualização do PDF</h2>
    <div id="pdf-viewer-container" style="border:1px solid #ccc; min-height:600px;">
        <iframe
            id="pdf-js-viewer"
            src="{{ asset('pdfjs/web/viewer.html') }}?file={{ urlencode(asset('storage/books/padroes-de-projecto.pdf')) }}"
            width="100%"
            height="700"
            style="border:none;"
            allowfullscreen
            webkitallowfullscreen
            oncontextmenu="return false;"
        ></iframe>
    </div>
</div>

<script>
// Impede seleção de texto e clique direito dentro do iframe
document.addEventListener('DOMContentLoaded', function() {
    const iframe = document.getElementById('pdf-js-viewer');
    iframe.onload = function() {
        try {
            const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
            iframeDoc.body.style.userSelect = 'none';
            iframeDoc.body.oncontextmenu = function() { return false; };
        } catch (e) {
            // Cross-origin, não acessível, mas o PDF.js já oculta download por padrão
        }
    };
});
</script>
@endsection