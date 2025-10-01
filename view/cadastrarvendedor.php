<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Vendedores</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            color: #5a67d8;
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
            background: linear-gradient(to right, #667eea, #764ba2);
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
        
        input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f7fafc;
            color: #2d3748;
        }
        
        input[type="text"]:focus, input[type="number"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }
        
        input[type="text"]:hover, input[type="number"]:hover, input[type="password"]:hover {
            border-color: #cbd5e0;
        }
        
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .btn-submit {
            background: linear-gradient(to right, #667eea, #764ba2);
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
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
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
        
        .form-footer {
            text-align: center;
            margin-top: 25px;
            color: #718096;
            font-size: 0.9rem;
        }
        
        .form-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="../model/cadastrarvendedor.php" method="POST">  
        <h1>Cadastro de Vendedores</h1>
        
        <div class="form-group">
            <label for="cxnomeven">Nome Completo:</label>
            <input type="text" id="cxnomeven" name="cxnomeven" required>
        </div>
        
        <div class="form-group">
            <label for="cxnovasenhaven">Senha do Vendedor:</label>
            <input type="password" id="cxnovasenhaven" name="cxnovasenhaven" required>
        </div>
        
        <div class="form-group">
            <label for="cxcpfven">CPF:</label>
            <input type="text" id="cxcpfven" name="cxcpfven" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00">
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn-submit">Cadastrar Vendedor</button>
            <button type="button" class="btn-cancel" onclick="window.location.href='loginadm.php'">Sair</button>
        </div>
    </form>

    <script>
        // Máscara para CPF
        document.getElementById('cxcpfven').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
                value = value.replace(/(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
                e.target.value = value;
            }
        });
    </script>
</body>
</html>