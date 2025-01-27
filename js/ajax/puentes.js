function daleValorInputComunidadesProvincias() {


    let comunidad = document.getElementById("comunidad_autonoma").value; // Obtener el valor del select

    // console.log(familia); // Verifica que 'familia' tiene el valor correcto

    if (comunidad !== "") {
        
        document.getElementById("div-provincia").style.display = "block";
		
        const data = new URLSearchParams();
        data.append("comunidad", comunidad);
    

     
        fetch("prcs/busqueda.php", {
            method: "POST",  
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: data,  
        })
        .then(response => response.json())  
        .then(data => {
            // console.log("Respuesta del servidor:", data); // Ver la respuesta
			
			
            const selectElement = document.getElementById("provincia");
		
			  


			//aqui se le da los valores correspondiente a los option de los select con las especialidades si es ef o cp
           
			selectElement.innerHTML="";
            selectElement.innerHTML = data.data;  // Actualizamos las opciones del select
			


			//aqui controlamos que solo se envie el valor de 1 select al servidor, sino peta, se debera agg especialidades 1 por 1
			//si se selecciona una opcion de un input, el otro se resetea y queda a ""
		
			
			
        
        })
        .catch(error => console.error("Error al obtener provincias:", error));
    } else {
        document.getElementById("provincia").style.display = "none";
		
    }
}


function enviarFormularioCv(event,form){

    event.preventDefault();

    let formData = new FormData(form);


    fetch("prcs/busqueda.php", {
		method: "POST",
		body: formData
	})
		.then(response => response.text())  // Primero, obtener la respuesta como texto para poder examinarla
		.then(text => {
			try {
				const data = JSON.parse(text);  // Intenta convertir el texto a JSON
				if (data.status === "success") {
					console.log("Formulario procesado correctamente:", data.message);

					const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.onmouseenter = Swal.stopTimer;
							toast.onmouseleave = Swal.resumeTimer;
						}
					});
					Toast.fire({
						icon: "success",
						title: "CV guardado con éxito"
					});



					setTimeout(() => {
						window.location.reload()
					}, 1500)


				} else {
					console.error("Error en el formulario:", data.message);
					alert("Error en el formulario: " + data.message);
				}
			} catch (error) {
				console.error("Error al procesar la respuesta JSON:", error);
				console.error("Respuesta recibida:", text);

				Swal.fire({
					position: "top-end",
					icon: "error",
					title: "Informe no se pudo procesar",
					showConfirmButton: false,
					timer: 1500
				});
			}
		})
		.catch(error => {
			console.error("Error en la solicitud:", error);
			alert("Hubo un error en la solicitud.");
		});

}


function enviarFormularioOferta(event,form){

    event.preventDefault();

    let formData = new FormData(form);


    fetch("prcs/oferta.php", {
		method: "POST",
		body: formData
	})
		.then(response => response.text())  // Primero, obtener la respuesta como texto para poder examinarla
		.then(text => {
			try {
				const data = JSON.parse(text);  // Intenta convertir el texto a JSON
				if (data.status === "success") {
					console.log("Formulario procesado correctamente:", data);

					const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.onmouseenter = Swal.stopTimer;
							toast.onmouseleave = Swal.resumeTimer;
						}
					});
					Toast.fire({
						icon: "success",
						title: "Oferta creada con éxito"
					});



					setTimeout(() => {
						window.location.reload()
					}, 1500)


				} else {
					console.error("Error en el formulario:", data.message);
					alert("Error en el formulario: " + data.message);
				}
			} catch (error) {
				console.error("Error al procesar la respuesta JSON:", error);
				console.error("Respuesta recibida:", text);

				Swal.fire({
					position: "top-end",
					icon: "error",
					title: "Informe no se pudo procesar",
					showConfirmButton: false,
					timer: 1500
				});
			}
		})
		.catch(error => {
			console.error("Error en la solicitud:", error);
			alert("Hubo un error en la solicitud.");
		});

}
