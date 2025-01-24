function daleValorInputProvincia(){


    


    let familia = document.getElementById("familia_formativa").value; // Obtener el valor del select

    // console.log(familia); // Verifica que 'familia' tiene el valor correcto

    if (familia !== "") {
        
        document.getElementById("div-input-especialidades").style.display = "block";
		document.getElementById("div-input-especialidades_fp").style.display = "block";
        const data = new URLSearchParams();
        data.append("familia", familia);
    

     
        fetch("prcs/empresas.php", {
            method: "POST",  
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: data,  
        })
        .then(response => response.json())  
        .then(data => {
            // console.log("Respuesta del servidor:", data); // Ver la respuesta

            const selectElement = document.getElementById("especialidad_empresa");
			const selectElement_fp = document.getElementById("especialidad_empresa_fp");
			  


			//aqui se le da los valores correspondiente a los option de los select con las especialidades si es ef o cp
			selectElement.innerHTML = `<option value "">Seleccione una especialidad</option>`;
			selectElement_fp.innerHTML = `<option value "">Seleccione una especialidad</option>`;
			selectElement.innerHTML += data.data;  // Actualizamos las opciones del select
			selectElement_fp.innerHTML += data.data1;  // Actualizamos las opciones del select


			//aqui controlamos que solo se envie el valor de 1 select al servidor, sino peta, se debera agg especialidades 1 por 1
			//si se selecciona una opcion de un input, el otro se resetea y queda a ""
			selectElement.addEventListener("change",()=>{

				

				if(this.value != ""){
					selectElement_fp.value="";
				}
				if(window.location.pathname == "/index.php" && window.location.search == "?m=empresas&op=buscar"){
					document.getElementById("input-especilidad-oculta").value="cp";
					
					console.log(document.getElementById("input-especilidad-oculta").value);
				}
				
			})

			selectElement_fp.addEventListener("change",()=>{
				
				
				if(this.value != ""){
					selectElement.value="";
				}
				if(window.location.pathname == "/index.php" && window.location.search == "?m=empresas&op=buscar"){
					document.getElementById("input-especilidad-oculta").value="fp";
					console.log(document.getElementById("input-especilidad-oculta").value);
				}
				
			})
			
			  

			
			
        
        })
        .catch(error => console.error("Error al obtener especialidades:", error));
    } else {
        document.getElementById("div-input-especialidades").style.display = "none";
		document.getElementById("div-input-especialidades_fp").style.display = "none";
    }

}