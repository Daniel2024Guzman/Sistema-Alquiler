document.getElementById('code').addEventListener('input', function() {
    const code = this.value;
    if (code.length >= 3) { // Empieza la búsqueda cuando se escriban al menos 3 caracteres
        fetch(`/Heramientas/buscar_code?code=${code}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    //console.log('CI no encontrado');
                    document.getElementById('h_nombre').value = '';
                    document.getElementById('h_descripcion').value = '';
                    document.getElementById('h_marca').value = '';
                    document.getElementById('h_modelo').value = '';
                    document.getElementById('h_codigo').value = '';
                    document.getElementById('tipo_heramienta').value = '';
                    document.getElementById('id_heramienta').value = '';
                } else {
                    //console.log(data);
                    document.getElementById('h_nombre').value = data.h_nombre || '';
                    document.getElementById('h_descripcion').value = data.h_descripcion || '';
                    document.getElementById('h_marca').value = data.h_marca || '';
                    document.getElementById('h_modelo').value = data.h_modelo || '';
                    document.getElementById('h_codigo').value = data.h_codigo || '';
                    document.getElementById('tipo_heramienta').value = data.th_descripcion || '';
                    document.getElementById('id_heramienta').value = data.id_heramienta || '';
                    // Rellena otros campos del formulario aquí
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        // Limpia los campos si el input es menos de 3 caracteres
        document.getElementById('h_nombre').value = '';
        document.getElementById('h_descripcion').value = '';
        document.getElementById('h_marca').value = '';
        document.getElementById('h_modelo').value = '';
        document.getElementById('h_codigo').value = '';
        document.getElementById('tipo_heramienta').value = '';
        document.getElementById('id_heramienta').value = '';
    }
});