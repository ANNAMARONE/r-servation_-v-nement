
<div class="modal fade reservation" id="reservationModal-{{ $evenement->id }}" tabindex="-1" aria-labelledby="reservationModalLabel-{{ $evenement->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel-{{ $evenement->id }}">Confirmation de réservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="stars">
                        <img src="{{ asset('images/star2.jpg') }}" alt="" class="star2">
                        <img src="{{ asset('images/star1.jpg') }}" alt="" class="star1">
                    </div>
                    <div class="container">
                        <h1>Valider votre Réservation</h1><br>
                        <h3>{{ $evenement->nom_evenement }}</h3>
                        <div class="date_lieu">
                            <p class="info-item">
                                <span class="icon-circle"><i class="fas fa-calendar-alt"></i></span>
                                <strong>Date :</strong>
                                {{ \Carbon\Carbon::parse($evenement->date)->format('d-m-Y') }}
                            </p>
                            <p class="info-item">
                                <span class="icon-circle"><i class="fas fa-map-marker-alt"></i></span>
                                <strong>Lieu :</strong> {{ $evenement->lieu }}
                            </p>
                        </div>
                        <div class="date_lieu">
                            <p class="info-item">
                                <span class="icon-circle"><i class="fas fa-users"></i></span>
                                <strong>Places restantes :</strong>
                                {{ $evenement->nbr_place - $evenement->reservations()->count() }}
                            </p>
                            <p class="info-item">
                                <span class="icon-circle"><i class="fas fa-calendar-times"></i></span>
                                <strong>Date limite :</strong>
                                {{ \Carbon\Carbon::parse($evenement->date_limite)->format('d-m-Y') }}
                            </p>
                        </div>
                    </div>
                    <form action="{{ route('reservation.store', $evenement->id) }}" method="POST">
                        @csrf
                        <div class="boutons">
                            <button type="button" class="btn btn-annuler" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-valider">Valider</button>
                        </div>
                    </form>
                    <div class="stars_end">
                        <img src="{{ asset('images/star2.jpg') }}" alt="" class="star1">
                        <img src="{{ asset('images/star1.jpg') }}" alt="" class="star2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
