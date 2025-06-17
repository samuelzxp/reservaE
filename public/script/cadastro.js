function mudarParaCadastro() {
    document.getElementById("formulario").innerHTML = `
        <h2>Cadastro</h2>
        <input type="text" name="usuario_cad" placeholder="Usuário" required>
        <input type="password" name="senha_cad" placeholder="Senha" required>
        <input type="password" name="confirmar_senha" placeholder="Confirmar senha" required>
        <input type="text" name="nome" placeholder="Nome Completo" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="date" name="data_nascimento" required>
        <input type="submit" value="Cadastrar">
        <a href="#" onclick="mudarParaLogin()">Já tem uma conta? Faça login</a>
    `;
}

function mudarParaLogin() {
    document.getElementById("formulario").innerHTML = `
        <h2>Login</h2>
        <input type="text" name="usuario_log" placeholder="Usuário" required>
        <input type="password" name="senha_log" placeholder="Senha" required>
        <input type="submit" value="Entrar">
        <a href="#" title="Cadastro" onclick="mudarParaCadastro()">Cadastro</a>
    `;
}

