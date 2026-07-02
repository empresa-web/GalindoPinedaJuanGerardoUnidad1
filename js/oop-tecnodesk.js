class TecnoDeskUI {

    constructor() {
        this.initEventosMouse();
        this.initAnimaciones();
        this.initTransiciones();
        this.initSincronas();
        this.initAsincronas();
    }

    /* =========================
       FUNCIONES SÍNCRONAS
    ========================= */
    initSincronas() {
        let hora = this.obtenerHora();
        console.log("⏱ Sistema sincronizado:", hora);

        let suma = this.sumaSimple(5, 3);
        console.log("🧮 Operación síncrona:", suma);
    }

    obtenerHora() {
        let fecha = new Date();
        return fecha.getHours() + ":" + fecha.getMinutes() + ":" + fecha.getSeconds();
    }

    sumaSimple(a, b) {
        return a + b;
    }

    /* =========================
       FUNCIONES ASÍNCRONAS
    ========================= */
    initAsincronas() {
        setTimeout(() => {
            console.log("⏳ Carga asíncrona simulada completada (setTimeout)");
        }, 2000);

        this.simularServidor();
    }

    async simularServidor() {
        let promesa = new Promise((resolve) => {
            setTimeout(() => {
                resolve("📡 Datos recibidos desde servidor simulado");
            }, 3000);
        });

        let resultado = await promesa;
        console.log(resultado);
    }

    /* =========================
       EVENTOS DEL MOUSE
    ========================= */
    initEventosMouse() {
        let elementos = document.querySelectorAll("button, .btn, a");

        elementos.forEach(el => {
            el.addEventListener("mouseover", () => {
                el.style.transform = "scale(1.05)";
            });

            el.addEventListener("mouseout", () => {
                el.style.transform = "scale(1)";
            });
        });
    }

    /* =========================
       ANIMACIONES
    ========================= */
    initAnimaciones() {
        let cards = document.querySelectorAll(".tarjeta, .servicio-card");

        cards.forEach(card => {
            card.addEventListener("mouseenter", () => {
                card.style.transform = "translateY(-8px)";
                card.style.transition = "all 0.3s ease";
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

/* Inicializar sistema */
document.addEventListener("DOMContentLoaded", () => {
    new TecnoDeskUI();
});