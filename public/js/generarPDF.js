function generarPDF() {
    //fecha
    const meses = [
        "enero",
        "febrero",
        "marzo",
        "abril",
        "mayo",
        "junio",
        "julio",
        "agosto",
        "septiembre",
        "octubre",
        "noviembre",
        "diciembre",
    ];
    let fechaActual = new Date();
    let año = fechaActual.getFullYear();
    let mes = meses[fechaActual.getMonth()];

    let dia = fechaActual.getDate();
    //Imagenes
    const IMG1 =
        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASMAAAEjCAYAAAB5IGctAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAEEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSfvu78nIGlkPSdXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQnPz4KPHg6eG1wbWV0YSB4bWxuczp4PSdhZG9iZTpuczptZXRhLyc+CjxyZGY6UkRGIHhtbG5zOnJkZj0naHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyc+CgogPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9JycKICB4bWxuczpBdHRyaWI9J2h0dHA6Ly9ucy5hdHRyaWJ1dGlvbi5jb20vYWRzLzEuMC8nPgogIDxBdHRyaWI6QWRzPgogICA8cmRmOlNlcT4KICAgIDxyZGY6bGkgcmRmOnBhcnNlVHlwZT0nUmVzb3VyY2UnPgogICAgIDxBdHRyaWI6Q3JlYXRlZD4yMDIzLTA4LTA1PC9BdHRyaWI6Q3JlYXRlZD4KICAgICA8QXR0cmliOkV4dElkPmJjOTNiNDE5LWNhM2QtNGE0ZC1hOWI0LTBlNDE2N2NhMjQ4OTwvQXR0cmliOkV4dElkPgogICAgIDxBdHRyaWI6RmJJZD41MjUyNjU5MTQxNzk1ODA8L0F0dHJpYjpGYklkPgogICAgIDxBdHRyaWI6VG91Y2hUeXBlPjI8L0F0dHJpYjpUb3VjaFR5cGU+CiAgICA8L3JkZjpsaT4KICAgPC9yZGY6U2VxPgogIDwvQXR0cmliOkFkcz4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6ZGM9J2h0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvJz4KICA8ZGM6dGl0bGU+CiAgIDxyZGY6QWx0PgogICAgPHJkZjpsaSB4bWw6bGFuZz0neC1kZWZhdWx0Jz5DZXJ0aWZpY2FkbyBEaXBsb21hZG8gZGUgTWFya2V0aW5nIERpZ2l0YWwgU2ltcGxlIEF6dWwgLSAxPC9yZGY6bGk+CiAgIDwvcmRmOkFsdD4KICA8L2RjOnRpdGxl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";
    const IMG2 =
        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASMAAAEjCAYAAAB5IGctAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAEEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSfvu78nIGlkPSdXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQnPz4KPHg6eG1wbWV0YSB4bWxuczp4PSdhZG9iZTpuczptZXRhLyc+CjxyZGY6UkRGIHhtbG5zOnJkZj0naHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyc+CgogPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9JycKICB4bWxuczpBdHRyaWI9J2h0dHA6Ly9ucy5hdHRyaWJ1dGlvbi5jb20vYWRzLzEuMC8nPgogIDxBdHRyaWI6QWRzPgogICA8cmRmOlNlcT4KICAgIDxyZGY6bGkgcmRmOnBhcnNlVHlwZT0nUmVzb3VyY2UnPgogICAgIDxBdHRyaWI6Q3JlYXRlZD4yMDIzLTA4LTA1PC9BdHRyaWI6Q3JlYXRlZD4KICAgICA8QXR0cmliOkV4dElkPmQ1N2FjOTQyLWRjNGQtNDFjNC1iOWYxLTNmODhjMWNhYzZlYzwvQXR0cmliOkV4dElkPgogICAgIDxBdHRyaWI6RmJJZD41MjUyNjU5MTQxNzk1ODA8L0F0dHJpYjpGYklkPgogICAgIDxBdHRyaWI6VG91Y2hUeXBlPjI8L0F0dHJpYjpUb3VjaFR5cGU+CiAgICA8L3JkZjpsaT4KICAgPC9yZGY6U2VxPgogIDwvQXR0cmliOkFkcz4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6ZGM9J2h0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvJz4KICA8ZGM6dGl0bGU+CiAgIDxyZGY6QWx0PgogICAgPHJkZjpsaSB4bWw6bGFuZz0neC1kZWZhdWx0Jz5DZXJ0aWZpY2FkbyBEaXBsb21hZG8gZGUgTWFya2V0aW5nIERpZ2l0YWwgU2ltcGxlIEF6dWwgLSAxPC9yZGY6bGk+CiAgIDwvcmRmOkFsdD4KICA8L2RjOnRpdGxl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";

    var svg = document.getElementById("svg-container").innerHTML;
    if (svg) svg = svg.replace(/\r?\n|\r/g, "").trim();

    let userNameDiv = document.getElementById("user-name");
    let userCertificadoDiv = document.getElementById("user-certificado");
    let nombre = userNameDiv
        ? userNameDiv.getAttribute("data-name")
        : "Sin Nombre";

    let certificado = userCertificadoDiv
        ? userCertificadoDiv.getAttribute("data-certificado")
        : "sin certificado";

    //Creo elemento canvas
    var canvas = document.createElement("canvas");
    var context = canvas.getContext("2d");
    context.clearRect(0, 0, canvas.width, canvas.height);
    canvg(canvas, svg);
    var imgData = canvas.toDataURL("image/png");

    //Centrar

    let doc = new jsPDF("l", "pt", "a4");

    doc.addFont("Helvetica-Bold", "helvetica", "bold", "StandardEncoding");
    doc.setFont("Helvetica-Bold");
    doc.setTextColor(0, 0, 0);
    doc.text("Se otorga la presente", 380, 40);

    doc.setFontSize(60);
    doc.setTextColor(0, 0, 170);
    let constanciaWidth =
        (doc.getStringUnitWidth("CONSTANCIA") * doc.internal.getFontSize()) /
        doc.internal.scaleFactor;
    let constanciaSet = (doc.internal.pageSize.width - constanciaWidth) / 2;
    doc.text(constanciaSet, 100, "CONSTANCIA");

    //a
    doc.setFontSize(25);
    doc.setTextColor(0, 0, 0);
    doc.text("a:", 430, 150);

    //Nombre
    doc.setFontSize(40);
    doc.setTextColor(0, 0, 170);
    let nombreWidth =
        (doc.getStringUnitWidth(nombre) * doc.internal.getFontSize()) /
        doc.internal.scaleFactor;
    let nombreSet = (doc.internal.pageSize.width - nombreWidth) / 2;
    doc.text(nombreSet + 10, 230, nombre);

    // Texto
    doc.setFontSize(14);
    doc.setTextColor(0, 0, 0);
    let textWidth =
        (doc.getStringUnitWidth(
            `La presente hacer constar que el estudiante ${nombre} realizó satisfactoriamente las encuentras TecNM`
        ) *
            doc.internal.getFontSize()) /
        doc.internal.scaleFactor;
    let textSet = (doc.internal.pageSize.width - textWidth) / 2;

    doc.text(
        textSet,
        280,
        `La presente hacer constar que el estudiante ${nombre} realizó satisfactoriamente las encuestas TecNM`
    );
    doc.text(
        textSet,
        300,
        `en la fecha ${
            dia + "/" + mes + "/" + año
        }. La validación de este documento se encuentra en el siguiente QR.`
    );

    doc.addImage(IMG1, 0, 400, 200, 200);
    doc.addImage(IMG2, 650, 0, 200, 200);
    doc.addImage(imgData, 370, 350, 150, 150);

    doc.text(335, 525, `Numero de certificado: ${certificado}`);

    doc.save("Constancia.pdf");
}
