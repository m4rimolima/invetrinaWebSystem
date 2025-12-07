<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Invetrina</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300 px-4">

    <div class="w-full max-w-md bg-white/90 backdrop-blur shadow-xl rounded-2xl p-8 border border-gray-200">

        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Acessar sua conta
        </h2>

        @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

   
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                >
                @if($errors->has('email'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('email') }}</p>
                @endif
            </div>

       
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Senha</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                >
                @if($errors->has('password'))
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                >
                <label for="remember_me" class="ml-2 block text-sm text-gray-600">Lembrar de mim</label>
            </div>


            <div class="flex items-center justify-between">
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                        Esqueceu a senha?
                    </a>
                @endif

                <button type="submit" class="ml-3 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-semibold shadow">
                    Entrar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
