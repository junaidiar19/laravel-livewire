<div>
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kursus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="close"></button>
                </div>
                <div class="modal-body">
                    @if ($statusModal)
                        <p>Apakah anda yakin ingin menghapus kursus <b>"{{ $name }}"</b> ini?</p>
                    @else
                        <p class="text-center">loading...</p>                      
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal" wire:click="close">Kembali</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Ya, Hapus Aja</button>
                </div>
            </div>
        </div>
    </div>

    @push('after-scripts')
    <script>
        window.livewire.on('courseDeleted', () => {
            $("#delete").modal('hide');
        });
    </script>
    @endpush
</div>
