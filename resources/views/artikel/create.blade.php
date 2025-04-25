<form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Judul:</label>
    <input type="text" name="judul" required>

    <label>Konten:</label>
    <textarea name="konten" required></textarea>

    <label>Upload Gambar:</label>
    <input type="file" name="gambar">

    <button type="submit">Simpan</button>
</form>
