async function mostrarInformacionAsiento(id) {
    try {
        const response = await fetch(`http://localhost:8080/api/asientos/buscar/${id}`);
        const data = await response.json();

        // Actualiza la información del asiento en la página
        document.getElementById('numero-asiento').innerText = data.numeroAsiento;
        document.getElementById('clase').innerText = data.clase.nombre;
        document.getElementById('precio').innerText = data.clase.precio;

        // Actualiza la imagen del asiento según la clase
        if (data.clase.nombre === 'Básico') {
            document.getElementById('imagenAsiento').src = "/images/asiento2.jpg"; // Ruta relativa a la ubicación del archivo HTML
        } else if (data.clase.nombre === 'Premium') {
            document.getElementById('imagenAsiento').src = "/images/asiento1.jpg";
        } else {
            document.getElementById('imagenAsiento').src = "/images/asientoPrimeraClase3.jpeg";
        }
    } catch (error) {
        console.error('Error al obtener la información del asiento:', error);
    }
}
