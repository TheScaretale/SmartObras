<?php
include "navbar.php";
include "./scripts/functions.php";

$isOwner = checkOwner();
?>
<?php
if ($_SESSION["userType"] == "P") {
?>
    <div class="container mt-5" id="jobDetails">

    <?php } elseif ($_SESSION["userType"] == "C" && $isOwner) { ?>
        <div class="container mt-5" id="jobDetailsClient">

        <?php } elseif ($_SESSION["userType"] == "C") { ?>
            <div class="container mt-5" id="jobDetails">

            <?php } else {
        } ?>
            <div class="modal fade" id="propostaModal" tabindex="-1" aria-labelledby="propostaModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="labelProposta">Adicionar proposta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ullam rem voluptas, temporibus provident enim harum laudantium, necessitatibus nisi dolor inventore expedita magnam. Eum corrupti sapiente necessitatibus eveniet quibusdam tempora!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>

                        </div>
                    </div>
                </div>
            </div>


            <?php
            include "footer.php";
            ?>