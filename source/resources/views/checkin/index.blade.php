<form action="{{ route('checkin') }}" method="POST">
    @csrf
    Số ngày: {{ $countCheckIn }}
    <button type="submit">Điểm danh hằng ngày</button>
</form>
