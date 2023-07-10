function generarPDF() {
    var svg = document.getElementById('svg-container').innerHTML;
    if (svg) svg = svg.replace(/\r?\n|\r/g, '').trim();

    let canvas = document.createElement('canvas');
    var context = canvas.getContext('2d');


    context.clearRect(0, 0, canvas.width, canvas.height);
    canvg(canvas, svg);

    var imgData = canvas.toDataURL('image/png');

    var doc = new jsPDF('l', 'pt', 'a4');
    doc.addFont('Helvetica-Bold', 'helvetica', 'bold', 'StandardEncoding');
    doc.setFont("Helvetica-Bold");
    doc.addImage(imgData, 'PNG', 300, 200, 250, 250);
    doc.text('Imprima o envie este codigo QR', 325, 180)
    doc.save('codigo QR.pdf');
}