<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de réservation</title>
</head>
<body>
    <h2>Confirmation de réservation</h2>
    <p>Votre réservation a été confirmée avec succès pour l'événement "{{ $reservation->evenement->nom_evenement }}".</p>
    <p>Date : {{ $reservation->evenement->date }}</p>
    <p>Lieu : {{ $reservation->evenement->lieu }}</p>
    <p>Merci de votre réservation !</p>
</body>
</html>
