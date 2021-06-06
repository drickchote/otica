const attachTreatmentHandler = () => {
    const treatmentId = document.querySelector("#treatments").value;
    const price = document.querySelector("#price").value;

    if (!treatmentId) {
        alert("Selecione 1 tratamento!");
        return;
    }
    const labId = document.URL.split("/")[document.URL.split("/").length - 1];

    fetch(`/labs/${labId}/attach/${treatmentId}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
        body: JSON.stringify({
            price: price,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                document.querySelector("#_treatments").innerHTML =
                    data._treatments;
                Toast.fire({
                    icon: "success",
                    title: "Tratamento vinculado com sucesso!",
                });
            }
            document
            .querySelector("#btn-attach")
            .addEventListener("click", attachTreatmentHandler);
            inicializarMascaras()
        })
        .catch((e) => {
            Toast.fire({
                icon: "error",
                title: "Houve um erro ao atulizar a tela",
            });
            console.log(e);
        });
};

const detachTreatmentHandler = (treatmentId) => {
    const labId = document.URL.split("/")[document.URL.split("/").length - 1];
    fetch(`/labs/${labId}/detach/${treatmentId}`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
    })
        .then((response) => response.json())

        .then((data) => {
            if (data.success) {
                document.querySelector("#_treatments").innerHTML =
                    data._treatments;
                Toast.fire({
                    icon: "success",
                    title: "Tratamento desvinculado com sucesso!",
                });
            }
            document
                .querySelector("#btn-attach")
                .addEventListener("click", attachTreatmentHandler);
                inicializarMascaras()
        })
        .catch((e) => {
            Toast.fire({
                icon: "error",
                title: "Houve um erro ao atulizar a tela",
            });
            console.log(e);
        });
};


document
    .querySelector("#btn-attach")
    .addEventListener("click", attachTreatmentHandler);
