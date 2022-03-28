<div>
    <a href="{{ route('index') }}">Kembali</a>

    <div class="mt-2">
        <p>ID: <b>{{ $course->id }}</b></p>

        <p>Nama: <b>{{ $course->name }}</b></p>

        <p>Kategori: <b>{{ $course->category->name }}</b></p>
    </div>
</div>
