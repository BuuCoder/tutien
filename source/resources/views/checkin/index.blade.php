<form action="{{ route('checkin') }}" method="POST">
    @if (session('success'))
        <div style="color: green">
            {{ session('success') }}
        </div>
    @endif
    @if (session('fail'))
        <div style="color: red">
            {{ session('fail') }}
        </div>
    @endif

    @csrf
    Số ngày: {{ $countCheckIn }}
    <button type="submit">Điểm danh hằng ngày</button>
</form>
