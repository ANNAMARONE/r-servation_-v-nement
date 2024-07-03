<!DOCTYPE html>
<html>
<head>
    <title>Notification de rejet de réservation</title>
</head>
<body>
    <h2>Notification de rejet de réservation</h2>
    <p>Votre réservation pour l'événement "{{ $reservation->evenement->nom_evenement }}" a été rejetée.</p>
    <p>Date : {{ $reservation->evenement->date }}</p>
    <p>Lieu : {{ $reservation->evenement->lieu }}</p>
    <p>Nous vous remercions pour votre intérêt.</p>
</body>
</html>
