<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
    form{
        width: 70%;
        height: 80vh;
        border: 1px solid black;
        align-items: center;
        margin-left: 10%;
        display: flex;
        justify-content: space-between;

    }
    img{
        width: 50%;
        height: 20%;
    }
    input{
        padding: 10px;
        border-radius: 10px;
        width: 50%;
        margin: 10px;
    }
    .input{
        display: flex;
    }
</style>
<form action="{{ route('organisme') }}" method="post" enctype="multipart/form-data">

    @csrf
    <div>
        <img src="{{asset('images/Vector.png')}}" alt="">
    </div>
    <div>
        <div class="input">
            <div>
           
    <div>
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password">
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Confirmation du mot de passe:</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation">
        @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
            <div>{{ $message }}</div>
        @enderror
    </div>
                
             
    <div>
        <label for="adresse">Adresse:</label><br>
        <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}">
        @error('adresse')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="secteur_activité">Secteur d'activité:</label><br>
        <input type="text" id="secteur_activité" name="secteur_activité" value="{{ old('secteur_activité') }}">
        @error('secteur_activité')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="logo">Logo:</label><br>
        <input type="file" id="logo" name="logo">
        @error('logo')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="nina">NINA:</label><br>
        <input type="text" id="nina" name="nina" value="{{ old('nina') }}">
        @error('nina')
            <div>{{ $message }}</div>
        @enderror
    </div>
    
    <div>
        <button type="submit">Envoyer</button>
    </div>
    </div>
                                         </div>
    </div>
</form>

</body>
</html>