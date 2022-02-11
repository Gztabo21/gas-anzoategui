const reportDiario = () =>{
    var doc = new jsPDF({
    orientation: 'landscape',
    unit: 'in',
    format: [6, 2]
    })
doc.text("Hello world!", 1, 1);
doc.save("two-by-four.pdf");}