<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <div>
        <img src="{{ asset('images/image 137.png') }}" alt="">
    </div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ Route('organisme') }}" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <h1 class="titre1">Bienvenue sur <span class="my">My</span><span class="event">Event</span></h1>
        <div>
            <div class="input">
                <div class="input1">

                    <div>
                        <label for="name">Nom:</label><br>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="saisir votre Nom">
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password">Mot de passe:</label><br>
                        <input type="password" id="password" name="password" placeholder="saisir votre Mot de passe">
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation">Confirmation du mot de passe:</label><br>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="confrimer le mot passe">
                        @error('password_confirmation')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="description">Description:</label><br>
                        <textarea id="description" name="description" rows="8" cols="33">{{ old('description') }}</textarea>
                        @error('description')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div>

                    <div class="input3">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="saisire votre Email">
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="adresse">Adresse:</label><br>
                        <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}"
                            placeholder="saisire votre Adresse">
                        @error('adresse')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="secteur_activité">Secteur d'activité:</label><br>
                        <input type="text" id="secteur_activité" name="secteur_activité"
                            value="{{ old('secteur_activité') }}">
                        @error('secteur_activité')
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
                        <label for="logo">Logo:</label><br>
                        <input type="file" id="logo" name="logo">
                        @error('logo')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit">S'inscrire</button>
                    </div>
                    <input type="hidden" id="role" name="role" value="organisme">


                </div>
            </div>
            <p>avez vous un compte?<a href="{{ Route('login') }}">connexion</a></p>
        </div>
    </form>

</body>

</html>
