<div>
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="mb-0">Tambah Kursus</h6>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" placeholder="Nama Kursus">
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-3">
                    <select class="form-select @error('categoryId') is-invalid @enderror" wire:model="categoryId">
                        <option value="">-Kategori-</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">Data Kursus</h6>
        </div>
        <div class="card-body">
            {{-- alert success --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row mb-3">
                <div class="col-md-2">
                    <select class="form-select" wire:model="row">
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" wire:model="category">
                        <option value="">-Semua Kategori-</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 offset-3">
                    <input type="text" class="form-control" wire:model="search" placeholder="Pencarian...">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <td>{{ $courses->firstItem()+$loop->index }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->category->name }}</td>
                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete" wire:click="deleteId({{ $course->id }})">Hapus</button>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit" wire:click="edit({{ $course->id }})">Edit</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center">-tidak ada data-</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $courses->links() }}
        </div>
    </div>

    @livewire('course-delete')
    @livewire('course-edit')
    
</div>
