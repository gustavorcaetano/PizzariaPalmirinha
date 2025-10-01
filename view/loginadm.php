<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Pizzaria</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: relative;
        }
        
        .btn-voltar {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgba(255, 107, 53, 0.8);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        
        .btn-voltar:hover {
            background-color: rgba(255, 107, 53, 1);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }
        
        .btn-voltar:active {
            transform: translateY(0);
        }
        
        .login-container {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo h1 {
            font-size: 2.5rem;
            color: #ff6b35;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
        }
        
        .logo p {
            color: #f8f9fa;
            font-size: 1rem;
            margin-top: 5px;
            opacity: 0.8;
        }
        
        form {
            display: flex;
            flex-direction: column;
        }
        
        label {
            margin-bottom: 8px;
            font-weight: 600;
            color: #ffcc5c;
        }
        
        input[type="text"], input[type="password"] {
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #ff6b35;
            background-color: white;
            box-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
        }
        
        .btn-login {
            background: linear-gradient(to right, #ff6b35, #f7931e);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-login:hover {
            background: linear-gradient(to right, #f7931e, #ff6b35);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
        }
    </style>
</head>
<body>
    <button class="btn-voltar">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 19L5 12L12 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Voltar
    </button>
    
    <div class="login-container">
        <div class="logo">
            <h1>PIZZARIA DA VÓ</h1>
            <p>Área do Administrador</p>
        </div>
        <form action="../model/admlogin.php" method="POST">
            <label for="cxloginadm">Usuário:</label>
            <input type="text" id="cxloginadm" name="cxloginadm">
            
            <label for="cxsenhaadm">Senha:</label>
            <input type="password" id="cxsenhaadm" name="cxsenhaadm">
            
            <button type="submit" class="btn-login">Entrar</button>
        </form>
    </div>

    <script>
        document.querySelector('.btn-voltar').addEventListener('click', function() {
            window.location.href="../index.php";
        });
    </script>
</body>
</html>