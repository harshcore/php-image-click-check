<?php
$images = array(
    array(
        "img_id" => 1,
        "img_title" => "River in middle of forest!",
        "img_url" => "https://insertface.com/fb/848/beautiful-nature-scenery-847548-nfhqx-fb.jpg",
        "validation_req" => 1,
    ),
    array(
        "img_id" => 2,
        "img_title" => "House in a jungle!",
        "img_url" => "https://i.pinimg.com/474x/cf/10/a1/cf10a15b77cfdb2e712091b265c3af45.jpg",
        "validation_req" => 0,
    ),
    array(
        "img_id" => 3,
        "img_title" => "Tree",
        "img_url" => "https://img.artpal.com/165072/5-36-38t.jpg",
        "validation_req" => 1,
    ),
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Image Gallery #SecondWay</h1>
    <div class="gallery">
        <?php foreach ($images as $image) : ?>
            <div class="images-container">
                <img class="image" data-img-id="<?= $image['img_id'] ?>" data-img-title="<?= $image['img_title'] ?>" data-validation-req="<?= $image['validation_req'] ?>" src="<?php echo $image['img_url']; ?>" alt="Image <?php echo $image['img_id']; ?>">
                <p>ID: <?php echo $image['img_id']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validationModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="validationModalBody">
                    Validation is required!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="validateButton">Validate</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.image').click(function() {
                var image_ele = $(this);
                var imgId = image_ele.data('img-id');
                var imgTitle = image_ele.data('img-title');
                var validationReq = image_ele.data('validation-req');
                var src = image_ele.attr("src");
                console.log(image_ele.data('validation-req'));

                if (validationReq === 1) {
                    $("#validationModalLabel").html(imgTitle);
                    $("#validationModalBody").html(`
                        Validation required for this image. <br/> 
                        <small>
                            Image Id: ${imgId} <br/>
                            Image Title: ${imgTitle}
                        </small>
                    `);
                    $("#validateButton").off("click").on("click", function() {
                        // Perform validation logic here if needed
                        // For now, just open the image
                        window.open(src, '_blank');
                        image_ele.data('validation-req', '0');
                        $("#validationModal").modal("hide");
                    });
                    $("#validationModal").modal("show");
                } else {
                    // Open the image directly
                    window.open(image_ele.attr('src'), '_blank');
                }
            });
        });
    </script>
</body>
</html>
