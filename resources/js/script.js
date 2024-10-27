
    alert('3')
    
    document.getElementById('payment_proof').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden'); // Tampilkan gambar
            }

            reader.readAsDataURL(file);
        }
    });
