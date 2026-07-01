class TecnoDeskUI {

    constructor() {
        this.initEventosMouse();
        this.initAnimaciones();
        this.initTransiciones();
        this.initFuncionesAsincronas();
        this.initFuncionesSincronas();
    }

    /* =========================
       FUNCIONES SÍNCRONAS
    ========================= */
    initFuncionesSincronas() {
        console.log("Funciones síncronas activadas");

        let hora = this.obtenerHoraActual();
        console.log("Hora del sistema:", hora);
    }

    obtenerHoraActual() {
        let fecha = new Date();
        return fecha.getHours() + ":" + fecha.getMinutes() + ":" + fecha.getSeconds();
    }

    /* =========================
       FUNCIONES ASÍNCRONAS
    ========================= */
    initFuncionesAsincronas() {
        setTimeout(() => {
            console.log("Carga asíncrona simulada (setTimeout)");
        }, 2000);

        this.cargarDatosSimulados();
    }

    async cargarDatosSimulados() {
        console.log("Iniciando carga asíncrona...");

        let promesa = new Promise((resolve) => {
            setTimeout(() => {
                resolve("Datos cargados correctamente desde servidor simulado");
            }, 3000);
        });

        let resultado = await promesa;
        console.log(resultado);
    }

    /* =========================
       EVENTOS DEL MOUSE
    ========================= */
    initEventosMouse() {
        let botones = document.querySelectorAll("button, .btn, a");

        botones.forEach(boton => {
            boton.addEventListener("mouseover", () => {
                boton.style.transform = "scale(1.05)";
            });

            boton.addEventListener("mouseout", () => {
                boton.style.transform = "scale(1)";
            });

            boton.addEventListener("click", () => {
                console.log("Elemento clickeado:", boton.innerText);
            });
        });
    }

    /* =========================
       ANIMACIONES
    ========================= */
    initAnimaciones() {
        let tarjetas = document.querySelectorAll(".tarjeta, .servicio-card");

        tarjetas.forEach(card => {
            card.addEventListener("mouseenter", () => {
                card.style.transition = "all 0.3s ease";
                card.style.transform = "translateY(-8px)";
            });

            card.addEventListener("mouseleave", () => {
                card.style.transform = "translateY(0px)";
            });
        });
    }

    /* =========================
       TRANSICIONES
    ========================= */
    initTransiciones() {
        let elementos = document.querySelectorAll(".btn, .menu a");

        elementos.forEach(el => {
            el.style.transition = "all 0.3s ease";

            el.addEventListener("click", () => {
                el.style.opacity = "0.6";

                setTimeout(() => {
                    el.style.opacity = "1";
                }, 200);
            });
        });
    }
}

/* Inicializar el sistema */
document.addEventListener("DOMContentLoaded", () => {
    new TecnoDeskUI();
});