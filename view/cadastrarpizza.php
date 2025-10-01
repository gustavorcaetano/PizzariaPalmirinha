<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pizza</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        form {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        h1 {
            text-align: center;
            color: #d32f2f;
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 15px;
        }
        
        h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #ff6b6b, #ffa726);
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
            font-size: 1rem;
        }
        
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f7fafc;
            color: #2d3748;
        }
        
        input[type="text"]:focus, input[type="number"]:focus, input[type="file"]:focus {
            outline: none;
            border-color: #ff6b6b;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
            transform: translateY(-2px);
        }
        
        input[type="text"]:hover, input[type="number"]:hover, input[type="file"]:hover {
            border-color: #cbd5e0;
        }
        
        textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f7fafc;
            color: #2d3748;
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }
        
        textarea:focus {
            outline: none;
            border-color: #ff6b6b;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
            transform: translateY(-2px);
        }
        
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .btn-submit {
            background: linear-gradient(to right, #ff6b6b, #ffa726);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            margin-right: 10px;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .btn-cancel {
            background: #e2e8f0;
            color: #4a5568;
            border: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            margin-left: 10px;
        }
        
        .btn-cancel:hover {
            background: #cbd5e0;
            transform: translateY(-2px);
        }
        
        .file-info {
            font-size: 0.8rem;
            color: #718096;
            margin-top: 5px;
            font-style: italic;
        }
        
        @media (max-width: 600px) {
            form {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .btn-container {
                flex-direction: column;
            }
            
            .btn-submit, .btn-cancel {
                margin: 5px 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <form action="../model/cadastrarproduto.php" method="POST" enctype="multipart/form-data">
        <h1>Cadastrar Pizza</h1>
        
        <div class="form-group">
            <label for="cxnomepizza">Nome da Pizza:</label>
            <input type="text" id="cxnomepizza" name="cxnomepizza" required 
                   placeholder="Ex: Pizza de Calabresa">
        </div>
        
        <div class="form-group">
            <label for="cxprecopizza">Preço (R$):</label>
            <input type="number" id="cxprecopizza" name="cxprecopizza" required 
                   step="0.01" min="0" placeholder="xx,xx">
        </div>
        
        <div class="form-group">
            <label for="cxdescricaopizza">Descrição:</label>
            <textarea id="cxdescricaopizza" name="cxdescricaopizza" required 
                      placeholder="Descreva os ingredientes da pizza..."></textarea>
        </div>
        
        <div class="form-group">
            <label for="cxfotopizza">Fotografia:</label>
            <input type="file" id="cxfotopizza" name="cxfotopizza" accept="image/*" required>
            <div class="file-info">Formatos aceitos: JPG, PNG</div>
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn-submit">Cadastrar Pizza</button>
            <button type="button" class="btn-cancel" onclick="window.location.href='../index.php'">Sair</button>
        </div>
    </form>

    <script>
        // Validação básica do arquivo
        document.getElementById('cxfotopizza').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                
                // Verificar tipo do arquivo
                const allowedTypes = ['image/jpeg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Tipo de arquivo não permitido! Use apenas JPG ou PNG.');
                    e.target.value = '';
                }
            }
        });
        
        // Formatação do preço
        document.getElementById('cxprecopizza').addEventListener('blur', function(e) {
            if (e.target.value) {
                e.target.value = parseFloat(e.target.value).toFixed(2);
            }
        });
    </script>
</body>
</html>