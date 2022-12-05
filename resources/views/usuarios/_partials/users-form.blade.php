@csrf
    <input type="text" name="name" value="{{ $user->name ?? old("name") }}" placeholder="Digite o seu Nome: ">
    <input type="email" name="email" value="{{ $user->email ?? old("email") }}" placeholder="Digite seu email: ">
    <input type="password" name="password" placeholder="Digite sua senha: ">
    <button type="submit">Enviar</button>