<?php
require "Usuario.class.php";
$usuario = new Usuario();

$mensagem = "";

// Verifica se o ID foi passado na URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido. <a href='tabela.php'>Voltar</a>");
}

$id  = (int) $_GET['id'];
$con = $usuario->conecta();

if (!$con) {
    die("Banco indisponível. Tente mais tarde.");
}

// Processa o formulário de atualização (POST)
if (isset($_POST['nome'])) {
    $nome  = addslashes(trim($_POST['nome']));
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']); // pode ser vazio (não altera senha)

    $resultado = $usuario->atualizarUsuario($id, $nome, $email, $senha ?: null);

    if ($resultado) {
        $mensagem = ["tipo" => "sucesso", "texto" => "Usuário atualizado com sucesso!"];
    } else {
        $mensagem = ["tipo" => "erro",   "texto" => "Erro ao atualizar. Tente novamente."];
    }
}

// Busca os dados atuais do usuário pelo 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 36px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
            width: 100%;
            max-width: 440px;
        }
        h2 {
            margin: 0 0 6px;
            color: #2c3e50;
            font-size: 22px;
        }
        .subtitulo {
            color: #7f8c8d;
            font-size: 13px;
            margin-bottom: 24px;
        }
        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            color: #555;
            margin-bottom: 4px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 16px;
            transition: border-color 0.2s;
        }
        input:focus {
            border-color: #4a90d9;
            outline: none;
        }
        .hint {
            font-size: 11px;
            color: #aaa;
            margin-top: -12px;
            margin-bottom: 16px;
        }
        .campo-id {
            background: #f7f7f7;
            color: #888;
            cursor: not-allowed;
        }
        .botoes {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }
        button[type="submit"] {
            flex: 1;
            padding: 11px;
            background: #4a90d9;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="submit"]:hover { background: #357abd; }
        .btn-voltar {
            flex: 1;
            padding: 11px;
            background: #ecf0f1;
            color: #555;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
        }
        .btn-voltar:hover { background: #dfe6e9; }
        .mensagem {
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 14px;
        }
        .sucesso { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .erro    { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <div class="card">
        <h2>✏️ Editar Usuário</h2>
        <p class="subtitulo">Altere os dados do usuário abaixo.</p>

        <?php if ($mensagem): ?>
            <div class="mensagem <?php echo $mensagem['tipo']; ?>">
                <?php echo $mensagem['texto']; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="editar.php?id=<?php echo $id; ?>">

            <label for="id">Código (ID)</label>
            <input type="text" id="id" value="<?php echo htmlspecialchars($dados['id']); ?>"
                   class="campo-id" readonly>

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required
                   value="<?php echo htmlspecialchars($dados['nome']); ?>"
                   placeholder="Nome completo">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required
                   value="<?php echo htmlspecialchars($dados['email']); ?>"
                   placeholder="email@exemplo.com">

            <label for="senha">Nova Senha</label>
            <input type="password" id="senha" name="senha"
                   placeholder="Deixe em branco para não alterar">
            <p class="hint">* Preencha apenas se desejar alterar a senha.</p>

            <div class="botoes">
                <a href="tabela.php" class="btn-voltar">← Voltar</a>
                <button type="submit">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
</html>