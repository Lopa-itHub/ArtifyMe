document.getElementById("download-btn").addEventListener("click", () => {
    
    const portfolio = document.getElementById("portfolio-container");

    html2canvas(portfolio).then(canvas => {
        const imgData = canvas.toDataURL("image/png");
        const pdf = new jspdf.jsPDF("p", "mm", "a4");

        const width = pdf.internal.pageSize.getWidth();
        const height = (canvas.height * width) / canvas.width;

        pdf.addImage(imgData, "PNG", 0, 0, width, height);
        pdf.save("portfolio.pdf");
    });

});
