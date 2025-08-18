<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar PDF</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .pdf-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .pdf-viewer {
            width: 100%;
            max-width: 800px;
            height: 90vh;
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            background-color: white;
        }
        .no-download {
            margin-top: 10px;
            color: #666;
            font-size: 14px;
        }
        .controls {
            margin-bottom: 15px;
        }
        .btn {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 5px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        // Desabilitar menu de contexto (botão direito)
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
        
        // Desabilitar seleção de texto
        document.addEventListener('selectstart', function(e) {
            e.preventDefault();
        });
        
        // Desabilitar arrastar
        document.addEventListener('dragstart', function(e) {
            e.preventDefault();
        });
        
        // Desabilitar teclas de impressão e outras combinações
        document.addEventListener('keydown', function(e) {
            // Ctrl+P, Ctrl+S, etc.
            if (e.ctrlKey && (e.keyCode === 80 || e.keyCode === 83)) {
                e.preventDefault();
            }
        });
    </script>
</head>
<body>
    <div class="pdf-container">
        <div class="controls">
            <button class="btn" onclick="window.history.back()">Voltar</button>
        </div>
        
        <iframe 
            class="pdf-viewer" 
            src="{{ route('view.pdf', ['id' => $id]) }}#toolbar=0&navpanes=0"
            frameborder="0"
        ></iframe>
        
        <div class="no-download">
            O download e cópia deste conteúdo estão desabilitados.
        </div>
    </div>
</body>
</html>