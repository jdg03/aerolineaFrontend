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
            document.getElementById('imagenAsiento').src = "/images/asiento2.jpg"; 
        } else if (data.clase.nombre === 'Premium') {
            document.getElementById('imagenAsiento').src = "/images/asiento3.jpg";
        } else {
            document.getElementById('imagenAsiento').src = "/images/asientoPrimeraClase3.jpeg";
        }

         // Remueve la clase "seleccionado" de todos los asientos
         const asientos = document.querySelectorAll('.asientos');
         asientos.forEach(asiento => {
             asiento.classList.remove('seleccionado');
         });
 
         // Agrega la clase "seleccionado" al asiento clickeado
         const asientoClickeado = document.querySelector(`[onclick="mostrarInformacionAsiento(${id})"]`);
         asientoClickeado.classList.add('seleccionado');

    } catch (error) {
        console.error('Error al obtener la información del asiento:', error);
    }
}


