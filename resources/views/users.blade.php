<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        h1,
        table {
            text-align: center;
            font-family: 'Arial';
        }

        .form-group {
            display: flex;
            justify-content: center;
            height: 300px;
            align-items: center;
        }

        .form-group input {
            text-align: center;
            border: 1px solid black;
            border-radius: 15px;
            margin: 10px;
            padding: 15px;
        }

        button {
            background-color: transparent;
            padding: 10px;
            border: 1px solid black;
            border-radius: 15px;
            transition: 0.5s;
        }

        button:hover {
            cursor: pointer;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Create | Read | Update | Delete</h1>
    <h1><a href="/api">API GitHub</a></h1>
    <div class="form-group">
        <form action="{{url('/')}}" method="POST">
            <input type="hidden" name="_token" required value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="id" required id="id" value="<?php if(isset($user)) { echo $user['id'];}  ?>">
            <input type="text" name="name" required id="name" value="<?php if(isset($user)) { echo $user['firstname'];}  ?>" placeholder="Digite seu nome">
            <input type="email" name="email" required id="email" value="<?php if(isset($user)) { echo $user['email'];}  ?>" placeholder="Digite seu email">
            <input type="number" name="age" required id="age" value="<?php if(isset($user)) { echo $user['age'];}  ?>" placeholder="Digite sua idade">

            <button type="submit">Enviar</button>
        </form>
    </div>
    @if(isset($users))
    <table align='center' border='1'>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Idade</td>
            <td>Ações</td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user['firstname']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['age']}}</td>
            <td>
                <a href="/delete/{{ $user['id'] }}">Deletar</a>
                |
                <a href="/update/{{ $user['id'] }}">Atualizar</a>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
    </div>
</body>

</html> 