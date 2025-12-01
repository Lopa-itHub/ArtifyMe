
    <?php
    include_once "../navbar.php";
    include "../dbConnect.php";


    if (!isset($_GET['id'])) {
        die("Error: Template ID missing.");
    }

    $template_id = $_GET['id'];

    $qry = "SELECT * FROM templates WHERE id=?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param("i",$template_id);
    $stmt->execute();
    $res = $stmt->get_result();
    $template = $res->fetch_assoc();

    $folder = "../templates/" . $template['folder_name']; 
    $templateHTML = $folder . "/" . $template['template_file'];
    $schemaJSON   = $folder . "/" . $template['schema_file'];
    ?>

    <div class="container-fluid bg-light">
        <div class="row">

            <!-- LEFT: LIVE PREVIEW -->
            <div class="col-md-8">
                <h3>Live Preview</h3>
                <iframe id="previewFrame"></iframe>
                <div class="downloadBtn">
                    <button class="btn btn-success w-25" onclick="downloadPDF()">Download PDF</button>
                </div>
                
            </div>

            <!-- RIGHT: FORM -->
            <div class="col-md-4">
                <h3>Edit Information</h3>
                <form id="editForm" enctype="multipart/form-data"></form>
            </div>
        </div>
    </div>

    <script>
        let formData = {}; // store all updated values

        $(document).ready(function() {

            // Load template into iframe
            $("#previewFrame").attr("src", "<?php echo $templateHTML; ?>");

            // Load schema.json and build form
            $.getJSON("<?php echo $schemaJSON; ?>", function(schema) {

                schema.fields.forEach(field => {
                    let html = "";

                    if (field.type === "text") {
                        html = `
                            <label>${field.label}</label>
                            <input type="text" class="form-control mb-3"
                                onkeyup="updateField('${field.id}', this.value)">
                        `;
                    }

                    if (field.type === "textarea") {
                        html = `
                            <label>${field.label}</label>
                            <textarea class="form-control mb-3"
                                onkeyup="updateField('${field.id}', this.value)"></textarea>
                        `;
                    }

                    if (field.type === "image") {
                        html = `
                            <label>${field.label}</label>
                            <input type="file" class="form-control mb-3" accept="image/*"
                                onchange="updateImageField('${field.id}', event)">
                        `;
                    }

                    $("#editForm").append(html);
                });
            });
        });

        // For text, lists, JSON (projects)
        function updateField(key, value) {
            formData[key] = value;
            let doc = document.getElementById("previewFrame").contentWindow.document;

            // Projects (JSON array)
            if (key === "projects") {
                try {
                    let data = JSON.parse(value);
                    formData[key] = data;

                    let html = "";
                    data.forEach(p => {
                        html += `
                            <li style="margin-bottom:10px;">
                                <h3 class="righth3">${p.title}</h3>
                                <p>${p.description}</p>
                            </li>
                        `;
                    });

                    $(doc).find("[data-key='projects']").html(html);
                } catch(e) {
                    console.log("Invalid JSON for projects");
                }
                return;
            }

            // Handle list fields
            if (key === "skills" || key === "languages" || key === "education") {
                let items = value.split(",").map(i => i.trim()).filter(i => i !== "");
                formData[key] = items;

                let html = items.map(i => `<li>${i}</li>`).join("");
                $(doc).find("[data-key='"+key+"']").html(html);
                return;
            }

            // Normal text fields (THIS KEEPS STYLE)
            let el = $(doc).find("[data-key='"+key+"']");
            if (el.length) {
                el[0].textContent = value;
            }
        }

        // For images
        function updateImageField(key, event) {
            let file = event.target.files[0];
            let reader = new FileReader();

            reader.onload = function() {
                formData[key] = reader.result;

                let doc = document.getElementById("previewFrame").contentWindow.document;
                let el = $(doc).find("[data-key='"+key+"']");
                el.attr("src", reader.result);
            };

            reader.readAsDataURL(file);
        }

        // Send JSON to download.php
        async function downloadPDF() {

            const iframe = document.getElementById("previewFrame");
            const doc = iframe.contentWindow.document;

            // Extract the A4 div (correct)
            const A4 = doc.querySelector("#A4");

            const cleanHtml = `
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                </head>
                <body>${A4.outerHTML}</body>
                </html>
            `;

            let form = document.createElement("form");
            form.method = "POST";
            form.action = "../download.php?id=<?php echo $template_id; ?>";

            let input = document.createElement("input");
            input.type = "hidden";
            input.name = "cleanHtml";
            input.value = cleanHtml;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

    </script>
    <?php
    include_once "../footer.php";
    ?>