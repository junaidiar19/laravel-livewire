<div>
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="update">
                <div class="modal-body">
                    @if ($courseId)
                        <div class="form-group mb-3">
                            <label>Nama Kursus</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" placeholder="Nama Kursus">
                            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-select @error('categoryId') is-invalid @enderror" wire:model="categoryId">
                                <option value="">-Kategori-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" wire:key="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categoryId') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    @else
                        <p>Loading...</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @push('after-scripts')
    <script type="text/javascript">
        window.livewire.on('courseUpdated', () => {
            $('#edit').modal('hide');
        });
      </script>
    @endpush
</div>
