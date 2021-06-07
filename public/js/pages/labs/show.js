const attachTreatmentHandler = () => {
    const treatmentId = document.querySelector("#treatments").value;
    const price = document.querySelector("#price").value;

    if (!treatmentId) {
        alert("Selecione 1 tratamento!");
        return;
    }
    const labId = document.URL.split("/")[document.URL.split("/").length - 1].replace(/[^0-9]/g, "");

    fetch(`/labs/${labId}/attach/${treatmentId}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
        body: JSON.stringify({
            screen: "treatments",
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
    const labId = document.URL.split("/")[document.URL.split("/").length - 1].replace(/[^0-9]/g, "");
    fetch(`/labs/${labId}/detach/${treatmentId}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
        body: JSON.stringify({
            screen: "treatments",
        })
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

const attachLenHandler = () => {
    const lenId = document.querySelector("#lens").value;
    const price = document.querySelector("#price").value;

    if (!lenId) {
        alert("Selecione uma lente!");
        return;
    }
    const labId = document.URL.split("/")[document.URL.split("/").length - 1].replace(/[^0-9]/g, "");

    fetch(`/labs/${labId}/attach/${lenId}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
        body: JSON.stringify({
            screen: "lens",
            price: price,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                document.querySelector("#_lens").innerHTML =
                    data._lens;
                Toast.fire({
                    icon: "success",
                    title: "Lente vinculada com sucesso!",
                });
            }
            document
            .querySelector("#btn-attach")
            .addEventListener("click", attachLenHandler);
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

const detachLenHandler = (treatmentId) => {
    const labId = document.URL.split("/")[document.URL.split("/").length - 1].replace(/[^0-9]/g, "");
    fetch(`/labs/${labId}/detach/${treatmentId}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                .value,
        },
        body: JSON.stringify({
            screen: "lens",
        })
    })
        .then((response) => response.json())

        .then((data) => {
            if (data.success) {
                document.querySelector("#_lens").innerHTML =
                    data._lens;
                Toast.fire({
                    icon: "success",
                    title: "Lente desvinculada com sucesso!",
                });
            }
            document
                .querySelector("#btn-attach")
                .addEventListener("click", attachLenHandler);
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


const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const screen = urlParams.get('screen')

if(screen === "lens"){
    document
    .querySelector("#btn-attach")
    .addEventListener("click", attachLenHandler);
}

if(screen === "treatments"){
    document
        .querySelector("#btn-attach")
        .addEventListener("click", attachTreatmentHandler);
}
