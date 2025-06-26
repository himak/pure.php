<script>
    $(function() {
        const $form = $("#contactForm");
        const $submitBtn = $form.find("button[type=submit]");
        const $modal = $("#contactModal");
        const $tableBody = $("table tbody");

        function showAlert(message, type = "success") {

            $(".dynamic-alert").remove();

            const alertHtml = $(`
              <div class="alert alert-${type} alert-dismissible fade show dynamic-alert" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
                ${message}
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
              </div>
            `);

            $("body").append(alertHtml);
            setTimeout(() => alertHtml.alert('close'), 5000);
        }

        $form.on("submit", function(e) {
            e.preventDefault();
            $form.find(".form-control").removeClass("is-invalid").next(".invalid-feedback").text("");

            const name = $("#name").val().trim();
            const email = $("#email").val().trim();

            let hasError = false;
            if (!name) {
                $("#name").addClass("is-invalid").next(".invalid-feedback").text("Meno je povinné.");
                hasError = true;
            }
            if (!email) {
                $("#email").addClass("is-invalid").next(".invalid-feedback").text("Email je povinný.");
                hasError = true;
            }
            if (hasError) return;

            $submitBtn.prop("disabled", true).text("Ukladá sa...");

            $.ajax({
                url: "routes/api/contacts/store.php",
                method: "POST",
                dataType: "json",
                data: { name, email },
                timeout: 10000,
                success: function(response) {
                    if (response.success) {
                        $modal.modal("hide");
                        showAlert("Kontakt bol úspešne uložený.", "success");
                        if (response.row) {
                            $tableBody.prepend(response.row);
                        }
                        $form[0].reset();
                    } else if (response.errors) {
                        if (response.errors.name) {
                            $("#name").addClass("is-invalid").next(".invalid-feedback").text(response.errors.name);
                        }
                        if (response.errors.email) {
                            $("#email").addClass("is-invalid").next(".invalid-feedback").text(response.errors.email);
                        }
                    } else {
                        showAlert("Neočakávaná chyba na serveri.", "danger");
                    }
                },
                error: function(_, textStatus) {
                    const msg = textStatus === "timeout"
                        ? "Vypršal čas na odozvu servera, skúste to znova."
                        : "Chyba pri komunikácii so serverom.";
                    showAlert(msg, "danger");
                },
                complete: function() {
                    $submitBtn.prop("disabled", false).text("Uložiť");
                }
            });
        });

        $modal.on("hidden.bs.modal", () => {
            $form[0].reset();
            $form.find(".form-control").removeClass("is-invalid").next(".invalid-feedback").text("");
        });
    });
</script>
