@foreach($members as $member)
    {{ $member['name'] }}
    {{ $member['email'] }}
    {{ $member['TotalReservations'] }}
    {{ $member['UnattendedReservations'] }}
    <br>
@endforeach
