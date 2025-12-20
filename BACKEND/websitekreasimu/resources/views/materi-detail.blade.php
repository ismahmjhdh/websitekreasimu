<form method="POST" action="/materi/{{ $materi->id }}/verify">
    @csrf
    <input type="password" name="password" placeholder="Masukkan password">
    <button type="submit">Akses Materi</button>
</form>
