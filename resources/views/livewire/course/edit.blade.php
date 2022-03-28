<div>
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kursus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        @if ($statusModal)
                            <div class="form-group mb-3">
                                <label>Nama Kursus</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select wire:model="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
                                    <option value="">-Silakan Pilih-</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('categoryId')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @else
                            <p class="text-center">loading...</p>                      
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" wire:click="close">Kembali</button>
                        <button type="button" class="btn btn-primary" wire:click="update">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('after-scripts')
    <script>
        window.livewire.on('courseUpdated', () => {
            $("#edit").modal('hide');
        });
    </script>
    @endpush
</div>
