<div>
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kursus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($name)
                        <p>Apakah Anda yakin ingin menghapus kursus <b>"{{ $name }}"</b> ?</p>
                    @else
                        <p>Loading...</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Ya, Hapus Saja</button>
                </div>
            </div>
        </div>
    </div>

    @push('after-scripts')
    <script type="text/javascript">
        window.livewire.on('courseDeleted', () => {
            $('#delete').modal('hide');
        });
      </script>
    @endpush
</div>
