<h2>Daftar Artikel</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('artikel.create') }}">+ Tambah Artikel</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Judul</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    @foreach ($artikels as $artikel)
        <tr>
            <td>{{ $artikel->judul }}</td>
            <td>
                @if ($artikel->gambar)
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar" width="100">
                @else
                    Tidak ada gambar
                @endif
            </td>
            <td>
                <a href="{{ route('artikel.edit', $artikel->id) }}">Edit</a> |
                <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
