async function mostrarInformacionAsiento(id) {
    try {
        const response = await fetch(`http://localhost:8080/api/asientos/buscar/${id}`);
        const asiento = await response.json();

        console.log(asiento);

        // Actualiza la información del asiento en la página
        document.getElementById('numero-asiento').innerText = asiento.numeroAsiento;
        document.getElementById('clase').innerText = asiento.clase.nombre;
        document.getElementById('precio').innerText = asiento.clase.precio;

        // Actualiza la imagen del asiento según la clase
        if (asiento.clase.nombre === 'Básico') {
            document.getElementById('imagenAsiento').src = "/images/asiento2.jpg"; 
        } else if (asiento.clase.nombre === 'Premium') {
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

         const botonComprar = document.querySelector('.contenedor-boton a');

        // Cambiar el estilo para mostrar el elemento
        botonComprar.style.display = 'block';

         //actualiza la ruta del boton comprar
         var idVuelo = window.location.pathname.split('/').pop();//id del vuelo de la url

         document.getElementById('formulario').action = `/realizarCompra/${asiento.idAsiento}/${idVuelo} `;

    } catch (error) {
        console.error('Error al obtener la información del asiento:', error);
    }
}


