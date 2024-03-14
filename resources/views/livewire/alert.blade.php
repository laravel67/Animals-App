<div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('show-confirmation', event => {
            Swal.fire({
                title: "Yakin",
                text: "Data akan terhapus secara permanen",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('deleteConfirmed');
        }
        });
        });
    </script>
</div>