<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        h1 {
            text-align: center;
            font-family: 'Arial';
        }
        table {
            text-align: center;
            font-family: 'Arial';
            border: 1px solid black;
            border-radius: 15px;
        }

        table tr td {
            border: 1px solid black;
            padding: 15px;
        }

        .form-group {
            display: flex;
            justify-content: center;
            height: 100px;
            align-items: center;
        }

        .form-group input {
            text-align: center;
            border: 1px solid black;
            border-radius: 15px;
            margin: 10px;
            padding: 15px;
            outline: none;
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
    <h1><a href="/relate">Relate User with Repos of API</a></h1>
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
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" align="center">
        <strong>{{ $message }}</strong>
    </div>
    @elseif ($message = Session::get('warning')) 
    <div class="alert alert-warning alert-block" align="center">
	    <strong>{{ $message }}</strong>
    </div>
    @endif

    @if(isset($users))
    <table align='center'>
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
</body>

</html> 