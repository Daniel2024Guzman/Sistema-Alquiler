function mostrarImagen(event, id) {
    const image = document.getElementById(id);
    image.src = URL.createObjectURL(event.target.files[0]);
    image.style.display = 'block';
}
document.getElementById('p_ci').addEventListener('input', function() {
    const p_ci = this.value;
    if (p_ci.length >= 3) {
        fetch(`/Personas/buscar_ci?ci=${p_ci}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('p_nombre').value = '';
                    document.getElementById('p_paterno').value = '';
                    document.getElementById('p_materno').value = '';
                    document.getElementById('p_direccion').value = '';
                    document.getElementById('p_fecha_nacimiento').value = '';
                    document.getElementById('p_celular').value = '';
                    document.getElementById('p_email').value = '';
                    document.getElementById('masculino').removeAttribute('checked');
                    document.getElementById('femenino').removeAttribute('checked');
                    document.getElementById('otro').removeAttribute('checked');
                    document.getElementById('p_foto').style.display = 'block';
                    document.getElementById('p_foto').setAttribute('required', 'required');
                    document.getElementById('previewFoto').src = '';
                    document.getElementById('previewFoto').style.display = 'none';
                } else {
                    document.getElementById('p_nombre').value = data.p_nombre || '';
                    document.getElementById('p_paterno').value = data.p_paterno || '';
                    document.getElementById('p_materno').value = data.p_materno || '';
                    document.getElementById('p_direccion').value = data.p_direccion || '';
                    document.getElementById('p_fecha_nacimiento').value = data.p_fecha_nacimiento || '';
                    document.getElementById('p_celular').value = data.p_celular || '';
                    document.getElementById('p_email').value = data.p_email || '';
                    if(data.p_sexo === 'M'){
                        document.getElementById('masculino').setAttribute('checked', 'checked');
                    }
                    if(data.p_sexo === 'F'){
                        document.getElementById('femenino').setAttribute('checked', 'checked');
                    }
                    if(data.p_sexo === 'OTRO'){
                        document.getElementById('otro').setAttribute('checked', 'checked');
                    }
                    document.getElementById('p_foto').style.display = 'none';
                    document.getElementById('p_foto').removeAttribute('required');
                    document.getElementById('previewFoto').src = data.p_foto || '';
                    document.getElementById('previewFoto').style.display = 'block';
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('p_nombre').value = '';
        document.getElementById('p_paterno').value = '';
        document.getElementById('p_materno').value = '';
        document.getElementById('p_direccion').value = '';
        document.getElementById('p_fecha_nacimiento').value = '';
        document.getElementById('p_celular').value = '';
        document.getElementById('p_email').value = '';
        document.getElementById('masculino').removeAttribute('checked');
        document.getElementById('femenino').removeAttribute('checked');
        document.getElementById('otro').removeAttribute('checked');
        document.getElementById('p_foto').style.display = 'block';
        document.getElementById('p_foto').setAttribute('required', 'required');
        document.getElementById('previewFoto').src = '';
        document.getElementById('previewFoto').style.display = 'none';
    }
});