<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        h1 {
            text-align: center;
            font-family: 'Impact';
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

        .form-group select {
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

        img {
            height: 30px;
            width: 30px;
        }
    </style>
</head>

<body>
    <h1>Find API</h1>
    <h1><a href="/">CRUD</a></h1>
    <div class="form-group">
        <form action="{{url('/relate')}}" method="POST">
            <input type="hidden" name="_token" required value="<?php echo csrf_token(); ?>">
            <select name="id_user" id="id_user">
                <option>Default</option>
                @foreach($users as $user)
                <option value="{{ $user['id'] }}">{{ $user['firstname'] }}</option>
                @endforeach
            </select>
            <select name="id_repos" id="id_repos">
                <option>Default</option>
                @foreach($repos as $repo)
                <option value="{{ $repo['id'] }}">{{ $repo['name'] }}</option>
                @endforeach
            </select>

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

    @if(isset($relates))
    <table align='center' border='1'>
        <tr>
            <td>Usuário</td>
            <td>Repositório</td>
            <td>Ação</td>
        </tr>
        @for ($i = 0; $i < sizeof($relates); $i++) <tr>
            <td>{{ $relates[$i]->firstname }}</td>
            <td>{{ $relates[$i]->name }}</td>
            <td>
                <a href="/delete_relate/{{ $relates[$i]->id_user }}/{{ $relates[$i]->id_repos }}">Deletar</a>
            </td>
            </tr>
            @endfor
    </table>
    @endif
    </div>
</body>

</html> 