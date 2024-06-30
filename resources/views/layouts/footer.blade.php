<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* public/css/app.css */
        footer {
            background-color: black;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 14px;
            margin-top: 20px;
        }

        footer .footer-content {
            display: flex;
            justify-content: space-around;
        }

        footer .footer-section {
            flex: 1;
            margin-right: 20px;
        }

        footer .footer-section h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        footer .footer-section ul {
            list-style-type: none;
            padding: 0;
        }

        footer .footer-section ul li {
            margin-bottom: 5px;
        }

        footer .footer-section ul li a {
            color: white;
            text-decoration: none;
        }

        footer .footer-section ul li a:hover {
            text-decoration: underline;
        }

        .social-icons img {
            width: 30px; /* Ajustez la taille selon vos besoins */
            margin: 0 10px;
        }
    </style>
</head>
<body>

 <!-- resources/views/includes/footer.blade.php -->

<footer>
    <div class="footer-content">
        <div class="footer-section">
            <h4>Accueil</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ornare cursus sed nunc eget dictum.</p>
            <div class="social-icons">
                <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Twitter"></a>
                <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="Facebook"></a>
                <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a>
            </div>
        </div>
        <div class="footer-section">
            <h4>Entreprise</h4>
            <ul>
                <li><a href="#">À propos de nous</a></li>
                <li><a href="#">Centre d'aide</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contactez-nous</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Liens utiles</h4>
            <ul>
                <li><a href="#">Créer un évènement</a></li>
                <li><a href="#">Faire des réservations</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Termes et conditions</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Ressources</h4>
            <ul>
                <li><a href="#">Tarifs</a></li>
                <li><a href="#">Événements</a></li>
            </ul>
        </div>
    </div>
</footer>
   
</body>
</html>
